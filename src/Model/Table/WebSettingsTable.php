<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppSettings Model
 *
 * @method \Web\Model\Entity\AppSetting get($primaryKey, $options = [])
 * @method \Web\Model\Entity\AppSetting newEntity($data = null, array $options = [])
 * @method \Web\Model\Entity\AppSetting[] newEntities(array $data, array $options = [])
 * @method \Web\Model\Entity\AppSetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Web\Model\Entity\AppSetting|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Web\Model\Entity\AppSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Web\Model\Entity\AppSetting[] patchEntities($entities, array $data, array $options = [])
 * @method \Web\Model\Entity\AppSetting findOrCreate($search, callable $callback = null, $options = [])
 */
class WebSettingsTable extends Table
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

        $this->setTable('web_settings');
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
            ->scalar('Web_Name')
            ->maxLength('Web_Name', 200,'Invalid max length')
            ->requirePresence('Web_Name', 'create')
            ->notEmpty('Web_Name');
            
        $validator
                ->requirePresence('Web_Logo', 'create')
                ->add('Web_Logo', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'on' => function ($context) {
                    return !empty($context['data']['Web_Logo']);
                },
                'message'=>'Hanya file JPEG dan PNG yang diperbolehkan'])
                ->allowEmpty('Web_Logo');
       
        
        $validator
                ->requirePresence('Web_Favico', 'create')
                ->add('Web_Favico', 'file', [
                'rule' => ['mimeType', ['image/jpeg', 'image/png','image/x-icon']],
                'on' => function ($context) {
                    return !empty($context['data']['Web_Favico']);
                },
                'message'=>'Hanya file JPEG dan PNG yang diperbolehkan'])
                ->allowEmpty('Web_Favico');

        $validator
            ->requirePresence('Google_Robots', 'create')
            ->add('Google_Robots', 'file', [
            'rule' => ['mimeType', ['text/plain']],
            'on' => function ($context) {
                return !empty($context['data']['Google_Robots']);
            },
            'message'=>'Hanya file .txt yang diperbolehkan'])
            ->allowEmpty('Google_Robots');

        return $validator;
    }
}
