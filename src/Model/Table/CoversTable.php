<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Behavior\Imagine as Imagine;
use Cake\Core\Configure;
use Cake\Utility\Inflector;
/**
 * Covers Model
 *
 * @method \App\Model\Entity\Cover get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cover newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cover[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cover|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cover|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cover patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cover[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cover findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoversTable extends Table
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

        $this->setTable('covers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->belongsTo('CreatedUsers', [
            'foreignKey' => 'created_by',
            'className'=>'Users'
        ]);
        $this->belongsTo('ModifiedUsers', [
            'foreignKey' => 'modified_by',
            'className'=>'Users'
        ]);
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'file' => [
                'fields' => [
                    'dir' => 'file_dir',
                ],
                'path' => 'webroot{DS}assets{DS}uploaded_data{DS}img{DS}covers{DS}{year}{DS}{month}',
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $imagineComponent = new Imagine;

                    $defaultAppSettings = Configure::read('defaultAppSettings');
                    //create SMALL
                    $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
                    $tmp        = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                    $source     = $data['tmp_name'];
                    $explodeSize = explode("X",$defaultAppSettings['Cover.SM']);
                    $width      = $explodeSize[0];
                    $height     = $explodeSize[1];
                    $imagineComponent->gdImageCropAndSave($source, $tmp,['width'=>$width,'height'=>$height]);
                    //CREATE MEDIUM SIZE
                    $tmp_2        = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                    $source     = $data['tmp_name'];
                    $explodeSize = explode("X",$defaultAppSettings['Cover.MD']);
                    $width      = $explodeSize[0];
                    $height     = $explodeSize[1];
                    $imagineComponent->gdImageCropAndSave($source, $tmp_2,['width'=>$width,'height'=>$height]);
                    //CREATE LARGE SIZE
                    $tmp_3        = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                    $source     = $data['tmp_name'];
                    $explodeSize = explode("X",$defaultAppSettings['Cover.LG']);
                    $width      = $explodeSize[0];
                    $height     = $explodeSize[1];
                    $imagineComponent->gdImageCropAndSave($source, $tmp_3,['width'=>$width,'height'=>$height]);
                    $slug = Inflector::slug($entity->name);
                    $title = strtolower($slug);
                    $name = str_replace("-","_",$title);
                    $name = str_replace("-","_",$title);
                    return [
                        $data['tmp_name'] => $name.'.'.$extension,
                        $tmp => $defaultAppSettings['Cover.SM']. '_' . $name.'.'.$extension,
                        $tmp_2 => $defaultAppSettings['Cover.MD']. '_' . $name.'.'.$extension,
                        $tmp_3 => $defaultAppSettings['Cover.LG']. '_' . $name.'.'.$extension,
                    ];
                },
                'nameCallback' => function($table,$entity,$data,$field,$settings){
                    $slug = Inflector::slug($entity->name);
                    $title = strtolower($slug);
                    $name = str_replace("-","_",$title);
                    $name = str_replace("-","_",$title);
                    $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
                    return $name.'.'.$extension;
                },
                'keepFilesOnDelete' => false
            ]
        ]);
        $this->addBehavior('AuditStash.AuditLog');
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
            ->allowEmptyString('name', false,'Harap masukan nama');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 225)
            ->allowEmptyString('slug',false,'Harap masukan slug page');

        $validator
            ->requirePresence('file', 'create')
            ->add('file', 'file', [
            'rule' => ['mimeTypes', ['image/jpeg', 'image/png']],
            'on' => function ($context) {
                return !empty($context['data']['file']);
            },
            'message'=>'Hanya file JPEG dan PNG yang diperbolehkan'])
            ->allowEmpty('file',false,'Harap upload gambar');

        $validator
            ->integer('sort')
            ->allowEmptyString('sort');

        return $validator;
    }
}
