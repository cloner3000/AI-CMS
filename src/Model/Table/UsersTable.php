<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \App\Model\Table\UserGroupsTable|\Cake\ORM\Association\BelongsTo $UserGroups
 * @property |\Cake\ORM\Association\HasMany $AuditLogs
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AuditLogs', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasOne('Aros', [
            'foreignKey' => 'foreign_key',
            'joinType' => 'INNER',
            'conditions' => [
                'Aros.model' => 'Users'
            ]
        ]);
        $this->belongsTo('CreatedUsers', [
            'foreignKey' => 'created_by',
            'className'=>'Users'
        ]);
        $this->belongsTo('ModifiedUsers', [
            'foreignKey' => 'modified_by',
            'className'=>'Users'
        ]);
        $this->addBehavior('AuditStash.AuditLog', [
            'blacklist' => ['password']
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
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 60)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('name')
            ->maxLength('name', 225)
            ->notEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        return $validator;
    }
    public function validationEditProfile(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'update')
            ->notEmpty('username','Harap masukan username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message'=>'Username telah digunakan harap pilih username yang lain']);

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name','Harap masukan nama');

        $validator
            ->scalar('email')
            ->email('email','Harap masukan format email dengan benar')
            ->maxLength('email', 255)
            ->requirePresence('email', 'create')
            ->notEmpty('email','Harap masukan email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message'=>'Email telah terdaftar silahkan masukan email lain']);

        $validator
            ->scalar('password')
            ->maxLength('password', 60)
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->allowEmptyString('password','update');

        $validator
            ->scalar('current_password')
            ->maxLength('current_password', 60)
            ->requirePresence('current_password', 'create')
            ->notEmpty('current_password')
            ->allowEmptyString('current_password','update')
            ->add('current_password', [
                'checkCurrentPassword'=>[
                    'rule' => 'checkCurrentPassword',
                    'provider' => 'table',
                    'message' => 'Password yang sebelumnya salah silahkan ulangi kembali'
                ]
            ]);

        return $validator;
    }


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function checkCurrentPassword($value, $context){
        $user = $this->get($context['data']['id']);
        $hasher = new DefaultPasswordHasher;
        $hasherd = $hasher->hash($context['data']['current_password']);  
        
        if($hasher->check($context['data']['current_password'],$user->password)){
            return true;
        }else{
            return false;
        }
        
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));

        return $rules;
    }
    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity, 
    \ArrayObject $options)
    {
        if(!empty($entity->password)){
            $hasher = new DefaultPasswordHasher;
            $entity->password = $hasher->hash($entity->password);   
        }

        return true;
    }
}
