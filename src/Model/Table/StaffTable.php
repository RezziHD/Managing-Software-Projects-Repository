<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\DateTime;
use Cake\I18n\Date;

/**
 * Staff Model
 *
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\HasMany $Sales
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsToMany $Roles
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
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Sales', [
            'foreignKey' => 'staff_id',
        ]);
        $this->belongsToMany('Roles', [
            'foreignKey' => 'staff_id',
            'bindingKey'=>'id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'staff_roles',
        ]);
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
            ->scalar('first_name')
            ->maxLength('first_name', 50, 'too long')
            ->minLength('first_name', 3, 'not long enough')
            ->requirePresence('first_name', 'create')
            ->requirePresence('first_name', 'update')
            ->notEmptyString('first_name', "not empty");

        $validator
            ->scalar('middle_name')
            ->maxLength('middle_name', 50, 'too long')
            ->allowEmptyString('middle_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50, 'too long')
            ->minLength('first-name', 2, 'not long enough')
            ->requirePresence('last_name', 'create')
            ->requirePresence('last_name', 'update')
            ->notEmptyString('last_name', 'not empty');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->requirePresence('date_of_birth', 'update')
            ->notEmptyDate('date_of_birth', 'Date of Birth cannot be empty')
            ->add('date_of_birth', 'too young', [
                'rule' => function ($value, $context) {
                    // Parse the date_of_birth string into a Date object
                    $dateOfBirth = new Date($value);
                    // Calculate the age based on the date_of_birth
                    $today = new Date();
                    $age = $today->diff($dateOfBirth)->y;
                    // Check if the person is at least 18 years old
                    return $age >= 18;
                }
            ])
            ->add('date_of_birth', 'too old', [
                'rule' => function ($value, $context) {
                    // Parse the date_of_birth string into a Date object
                    $dateOfBirth = new Date($value);
                    // Calculate the age based on the date_of_birth
                    $today = new Date();
                    $age = $today->diff($dateOfBirth)->y;
                    // Check if the person is not older than 100 years
                    return $age <= 100;
                }
            ]);
        $validator
            ->scalar('street')
            ->maxLength('street', 70, 'too long')
            ->minLength('street', 5, 'not long enough')
            ->requirePresence('street', 'create')
            ->requirePresence('street', 'update')
            ->notEmptyDate('street', 'not empty');

        $validator
            ->scalar('city')
            ->maxLength('city', 70, 'too long')
            ->minLength('city', 3, 'not long enough')
            ->requirePresence('city', 'create')
            ->requirePresence('city', 'update')
            ->notEmptyString('city', 'not empty');

        $validator
            ->scalar('state')
            ->maxLength('state', 10)
            ->requirePresence('state', 'create')
            ->requirePresence('state', 'update')
            ->notEmptyString('state', 'Please Select a state');

        $validator
            ->scalar('zip')
            ->maxLength('zip', 10)
            ->add('zip', 'validZip', [
                'rule' => ['custom', '/^\d{4}$/'],
                'message' => 'Postcode code must be 4 digits.',
            ]);

        $validator
            ->requirePresence('password', 'create')
            ->notEmptyString('password', 'Password cannot be empty');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->requirePresence('email', 'update')
            ->notEmptyString('email', 'Email cannot be empty')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
            ->add('email', 'valid_email', ['rule' => 'email', 'message' => 'Invalid email']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email'], ['message' => 'Email is being used already for another staff']), ['errorField' => 'email']);

        return $rules;
    }
}
