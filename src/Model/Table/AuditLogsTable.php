<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AuditLogs Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\AuditLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\AuditLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AuditLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AuditLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuditLog|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AuditLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AuditLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AuditLog findOrCreate($search, callable $callback = null, $options = [])
 */
class AuditLogsTable extends Table
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

        $this->setTable('audit_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->dateTime('timestamp')
            ->requirePresence('timestamp', 'create')
            ->allowEmptyDateTime('timestamp', false);

        $validator
            ->scalar('controller')
            ->maxLength('controller', 225)
            ->allowEmptyString('controller');

        $validator
            ->scalar('_action')
            ->maxLength('_action', 225)
            ->allowEmptyString('_action');

        $validator
            ->scalar('type')
            ->maxLength('type', 250)
            ->allowEmptyString('type');

        $validator
            ->integer('primary_key')
            ->allowEmptyString('primary_key');

        $validator
            ->scalar('source')
            ->maxLength('source', 250)
            ->allowEmptyString('source');

        $validator
            ->scalar('parent_source')
            ->maxLength('parent_source', 250)
            ->allowEmptyString('parent_source');

        $validator
            ->scalar('original')
            ->allowEmptyString('original');

        $validator
            ->scalar('changed')
            ->allowEmptyString('changed');

        $validator
            ->scalar('meta')
            ->allowEmptyString('meta');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
