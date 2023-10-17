<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SaleLines Model
 *
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\BelongsTo $Sales
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\SaleLine newEmptyEntity()
 * @method \App\Model\Entity\SaleLine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SaleLine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SaleLine get($primaryKey, $options = [])
 * @method \App\Model\Entity\SaleLine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SaleLine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SaleLine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SaleLine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleLine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SaleLine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleLine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleLine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SaleLine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SaleLinesTable extends Table
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

        $this->setTable('sale_lines');
        $this->setDisplayField(['sale_id', 'line_number']);
        $this->setPrimaryKey(['sale_id', 'line_number']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
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
            ->integer('product_id')
            ->notEmptyString('product_id');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

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
        $rules->add($rules->existsIn('sale_id', 'Sales'), ['errorField' => 'sale_id']);
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }
}
