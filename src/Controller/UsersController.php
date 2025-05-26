<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        
        // Load the Authentication component
        $this->loadComponent('Authentication.Authentication');


        // Allow unauthenticated access to login
        $this->Authentication->addUnauthenticatedActions([
            'login', 
            'signup', 
            'confirm',
            'register',
            'add',
            'view',
            'edit'
        ]);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // Check if the confirmation checkbox is ticked
            if (empty($user['confirm'])) 
            {
                $this->Flash->error('You must confirm the infromation.');
                return;
            } else {
                $this->request->getSession()->write('FromData.User', $user);
                return $this->redirect(['action' => 'confirm']);
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function signup()
    {
        
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('You have signed up successfully.'));

                return $this->redirect(['action' => 'login']);
            }

            $this->Flash->error(__('Unable to sign up. Please check the form.'));
        }

        $this->set(compact('user'));

    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);

        $result = $this->Authentication->getResult();

        // If user is logged in successfully
        if ($result->isValid()) {
            $target = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'login',
                'home',
            ]);

            return $this->redirect($target);
        }

        // If login POST failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    public function confirm()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            // debug($data); exit;

            // Validate before confirm
            $user = $this->Users->newEntity($data);
            debug($user);exit;


            if ($user->getErrors()) {
                $this->Flash->error('Please correct the errors.');
                return $this->redirect(['action' => 'signup']);
            }

            // Store data in session for submit
            $this->request->getSession()->write('FormData.User', $data);
            $this->set(compact('user'));
        } else {
            return $this->redirect(['action' => 'signup']);
        }
    }
    public function Register()
    {
        $session = $this->request->getSession();
        $data = $session->read('FormData.User');

        if (empty($data)) {
            $this->Flash->error('No data to submit.');
            return $this->redirect(['action' => 'add']);
        }

        $user = $this->Users->newEntity($data);

        if ($this->Users->save($user)) {
            $session->delete('FormData.User');
            $this->Flash->success('User saved successfully!');
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error('Could not save user.');
        return $this->redirect(['action' => 'add']);
    }
}
