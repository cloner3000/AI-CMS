<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LinksMaps Model
 *
 * @property \App\Model\Table\LinksMapsTable|\Cake\ORM\Association\BelongsTo $ParentLinksMaps
 * @property \App\Model\Table\LinksTable|\Cake\ORM\Association\HasMany $Links
 * @property \App\Model\Table\LinksMapsTable|\Cake\ORM\Association\HasMany $ChildLinksMaps
 *
 * @method \App\Model\Entity\LinksMap get($primaryKey, $options = [])
 * @method \App\Model\Entity\LinksMap newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LinksMap[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LinksMap|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LinksMap|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LinksMap patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LinksMap[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LinksMap findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class LinksMapsTable extends Table
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

        $this->setTable('links_maps');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentLinksMaps', [
            'className' => 'LinksMaps',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Links', [
            'foreignKey' => 'links_map_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->belongsTo('CreatedUsers', [
            'foreignKey' => 'created_by',
            'className'=>'Users'
        ]);
        $this->belongsTo('ModifiedUsers', [
            'foreignKey' => 'modified_by',
            'className'=>'Users'
        ]);
        $this->hasMany('ChildLinksMaps', [
            'className' => 'LinksMaps',
            'foreignKey' => 'parent_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->addBehavior('AuditStash.AuditLog', []);
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
            ->scalar('name')
            ->maxLength('name', 225)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);


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

        return $rules;
    }
}
