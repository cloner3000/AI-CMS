<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppSettings Model
 *
 * @method \App\Model\Entity\AppSetting get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppSetting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppSetting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppSetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppSetting|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppSetting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppSetting findOrCreate($search, callable $callback = null, $options = [])
 */
class AppSettingsTable extends Table
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

        $this->setTable('app_settings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('App_Name')
            ->maxLength('App_Name', 200,'Invalid max length')
            ->requirePresence('App_Name', 'create')
            ->notEmpty('App_Name');
            
        $validator
            ->add('App_Logo', 'file', [
            'rule' => ['mimeType', ['image/jpeg', 'image/png']],
            'on' => function ($context) {
                return !empty($context['data']['App_Logo']);
            },
            'message'=>'Hanya file JPEG dan PNG yang diperbolehkan'])
            ->allowEmpty('App_Logo');

        $validator
            ->add('App_Logo_Login', 'file', [
            'rule' => ['mimeType', ['image/jpeg', 'image/png']],
            'on' => function ($context) {
                return !empty($context['data']['App_Logo_Login']);
            },
            'message'=>'Hanya file JPEG dan PNG yang diperbolehkan'])
            ->allowEmpty('App_Logo_Login');
   
    
        $validator
            ->add('App_Favico', 'file', [
            'rule' => ['mimeType', ['image/jpeg', 'image/png','image/x-icon']],
            'on' => function ($context) {
                return !empty($context['data']['App_Favico']);
            },
            'message'=>'Hanya file JPEG dan PNG yang diperbolehkan'])
            ->allowEmpty('App_Favico');
        

        

        return $validator;
    }
}
