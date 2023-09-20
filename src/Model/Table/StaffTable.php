<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staff Model
 *
 * @method \App\Model\Entity\Staff newEmptyEntity()
 * @method \App\Model\Entity\Staff newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staff findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Staff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staff|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StaffTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('staff');
        $this->setDisplayField('staffID');
        $this->setPrimaryKey('staffID');
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
            ->scalar('FirstName')
            ->maxLength('FirstName', 30)
            ->requirePresence('FirstName', 'create')
            ->notEmptyString('FirstName');

        $validator
            ->scalar('MiddleName')
            ->maxLength('MiddleName', 30)
            ->requirePresence('MiddleName', 'create')
            ->notEmptyString('MiddleName');

        $validator
            ->scalar('LastName')
            ->maxLength('LastName', 30)
            ->requirePresence('LastName', 'create')
            ->notEmptyString('LastName');

        $validator
            ->date('DateofBirth')
            ->requirePresence('DateofBirth', 'create')
            ->notEmptyDate('DateofBirth');

        $validator
            ->integer('AddressID')
            ->requirePresence('AddressID', 'create')
            ->notEmptyString('AddressID');

        $validator
            ->integer('StaffAcID')
            ->allowEmptyString('StaffAcID');

        $validator
            ->scalar('Password')
            ->maxLength('Password', 60)
            ->requirePresence('Password', 'create')
            ->notEmptyString('Password');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 50)
            ->allowEmptyString('Email');

        return $validator;
    }
}
