<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContentsAttributes Model
 *
 * @property \App\Model\Table\ContentsCategoriesTable|\Cake\ORM\Association\BelongsTo $ContentsCategories
 * @property \App\Model\Table\ContentsDataAttributesTable|\Cake\ORM\Association\HasMany $ContentsDataAttributes
 *
 * @method \App\Model\Entity\ContentsAttribute get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContentsAttribute newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContentsAttribute[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContentsAttribute|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentsAttribute|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentsAttribute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContentsAttribute[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContentsAttribute findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentsAttributesTable extends Table
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

        $this->setTable('contents_attributes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ContentsCategories', [
            'foreignKey' => 'contents_category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ContentsDataAttributes', [
            'foreignKey' => 'contents_attribute_id'
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
            ->scalar('type')
            ->maxLength('type', 225)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->scalar('label')
            ->maxLength('label', 225)
            ->requirePresence('label', 'create')
            ->allowEmptyString('label', false);

        $validator
            ->scalar('validations')
            ->maxLength('validations', 225)
            ->allowEmptyString('validations');

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
        $rules->add($rules->existsIn(['contents_category_id'], 'ContentsCategories'));

        return $rules;
    }
}
