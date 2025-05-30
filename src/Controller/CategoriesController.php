<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController; 

/**
 * Categories Controller
 *
 * @property \App\Model\Table\TownshipsTable $Townships
 * @property \App\Model\Table\CategoriesTable $Categories
 */

class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Load related models if not associated automatically
        $this->getTableLocator()->get('Townships');
        $this->getTableLocator()->get('Categories');

        // Prepare filters
        $townships = $this->Townships->find('list')->toArray();
        $categories = $this->Categories->find('list')->toArray();

        // Optional: Filter cakes based on query
        $query = $this->request->getQuery();
        $conditions = [];

        if (!empty($query['township_id'])) {
            $conditions['Cakes.township_id'] = $query['township_id'];
        }

        if (!empty($query['category_id'])) {
            $conditions['Cakes.category_id'] = $query['category_id'];
        }

        if (!empty($query['keywords'])) {
            $conditions['OR'] = [
                'Cakes.name LIKE' => '%' . $query['keywords'] . '%',
                'Cakes.description LIKE' => '%' . $query['keywords'] . '%',
            ];
        }

        $cakes = $this->Cakes->find('all', [
            'conditions' => $conditions,
            'contain' => ['Townships', 'Categories'] // if associations exist
        ]);

        // Pass variables to view
        $this->set(compact('cakes', 'townships', 'categories'));

    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, contain: []);
        $this->set(compact('category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
