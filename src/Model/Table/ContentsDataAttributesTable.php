<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContentsDataAttributes Model
 *
 * @property \App\Model\Table\ContentsTable|\Cake\ORM\Association\BelongsTo $Contents
 * @property \App\Model\Table\ContentsAttributesTable|\Cake\ORM\Association\BelongsTo $ContentsAttributes
 *
 * @method \App\Model\Entity\ContentsDataAttribute get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContentsDataAttribute newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContentsDataAttribute[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContentsDataAttribute|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentsDataAttribute|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentsDataAttribute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContentsDataAttribute[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContentsDataAttribute findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentsDataAttributesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('contents_data_attributes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Contents', [
            'foreignKey' => 'content_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ContentsAttributes', [
            'foreignKey' => 'contents_attribute_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('data')
            ->allowEmptyString('data');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['content_id'], 'Contents'));
        $rules->add($rules->existsIn(['contents_attribute_id'], 'ContentsAttributes'));

        return $rules;
    }
}
