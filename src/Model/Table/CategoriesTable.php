<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categories');
        $this->setDisplayField('categories_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('categories_id')
            ->maxLength('categories_id', 255)
            ->requirePresence('categories_id', 'create')
            ->notEmptyString('categories_id');
            
        $validator
            ->scalar('categories_name')
            ->maxLength('categories_name', 255)
            ->requirePresence('categories_name', 'create')
            ->notEmptyString('categories_name');

        $validator
            ->scalar('sub_categories_name')
            ->maxLength('sub_categories_name', 255)
            ->requirePresence('sub_categories_name', 'create')
            ->notEmptyString('sub_categories_name');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        return $validator;
    }
}
