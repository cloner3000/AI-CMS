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
 * Contents Model
 *
 * @property \App\Model\Table\ContentsCategoriesTable|\Cake\ORM\Association\BelongsTo $ContentsCategories
 * @property \App\Model\Table\LinksTable|\Cake\ORM\Association\HasMany $Links
 *
 * @method \App\Model\Entity\Content get($primaryKey, $options = [])
 * @method \App\Model\Entity\Content newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Content[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Content|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Content|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Content patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Content[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Content findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentsTable extends Table
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

        $this->setTable('contents');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ContentsCategories', [
            'foreignKey' => 'contents_category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Links', [
            'foreignKey' => 'content_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('ContentsDataAttributes', [
            'foreignKey' => 'content_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('ContentsFiles', [
            'foreignKey' => 'content_id',
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
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'picture' => [
                'fields' => [
                    'dir' => 'picture_dir',
                ],
                'path' => 'webroot{DS}assets{DS}uploaded_data{DS}img{DS}contents{DS}{year}{DS}{month}',
                'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                    $imagineComponent = new Imagine;

                    $defaultAppSettings = Configure::read('defaultAppSettings');
                    //create SMALL
                    $extension  = pathinfo($data['name'], PATHINFO_EXTENSION);
                    $tmp        = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                    $source     = $data['tmp_name'];
                    $explodeSize = explode("X",$defaultAppSettings['Thumbnail.SM']);
                    $width      = $explodeSize[0];
                    $height     = $explodeSize[1];
                    $imagineComponent->gdImageCropAndSave($source, $tmp,['width'=>$width,'height'=>$height]);
                    //CREATE MEDIUM SIZE
                    $tmp_2        = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                    $source     = $data['tmp_name'];
                    $explodeSize = explode("X",$defaultAppSettings['Thumbnail.MD']);
                    $width      = $explodeSize[0];
                    $height     = $explodeSize[1];
                    $imagineComponent->gdImageCropAndSave($source, $tmp_2,['width'=>$width,'height'=>$height]);
                    //CREATE LARGE SIZE
                    $tmp_3        = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                    $source     = $data['tmp_name'];
                    $explodeSize = explode("X",$defaultAppSettings['Thumbnail.LG']);
                    $width      = $explodeSize[0];
                    $height     = $explodeSize[1];
                    $imagineComponent->gdImageCropAndSave($source, $tmp_3,['width'=>$width,'height'=>$height]);
                    $name = str_replace("-","_",$entity->slug);
                    return [
                        $data['tmp_name'] => $name.'.'.$extension,
                        $tmp => $defaultAppSettings['Thumbnail.SM']. '_' . $name.'.'.$extension,
                        $tmp_2 => $defaultAppSettings['Thumbnail.MD']. '_' . $name.'.'.$extension,
                        $tmp_3 => $defaultAppSettings['Thumbnail.LG']. '_' . $name.'.'.$extension,
                    ];
                },
                'nameCallback' => function($table,$entity,$data,$field,$settings){
                    $name = str_replace("-","_",$entity->slug);
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
            ->integer('contents_category_id')
            ->notEmpty('contents_category_id','Harap pilih kategori konten');

        $validator
            ->scalar('title')
            ->maxLength('title', 225)
            ->notEmpty('title','Harap masukan judul konten');

        $validator
            ->scalar('node')
            ->maxLength('node', 225)
            ->notEmpty('node','Harap masukan node',function($context){
                if(empty($context['data'])){
                    if(!empty($context['providers']['entity'])){
                        $content_category_id = $context['providers']['entity']['contents_category_id'];
                        $node = $context['providers']['entity']['node'];
                    }else{
                        $content_category_id = NULL;
                        $node = NULL;
                    }
                    
                }else{
                    $content_category_id = $context['data']['contents_category_id'];
                    $node = $context['data']['node'];
                }
                if($content_category_id == 2 && empty($node)){
                    return true;
                }else{
                    return false;
                }
            });

        $validator
            ->scalar('slug')
            ->maxLength('slug', 225)
            ->allowEmptyString('slug');

        $validator
            ->add('picture', 'file', [
            'rule' => ['mimeType', ['image/jpeg', 'image/png']],
            'on' => function ($context) {
                return !empty($context['data']['picture']);
            },
            'message'=>'Hanya file JPEG dan PNG yang diperbolehkan'])
            ->allowEmpty('picture');

        $validator
            ->scalar('body')
            ->allowEmptyString('body');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->integer('sort')
            ->allowEmptyString('sort');

        $validator
            ->scalar('meta_description')
            ->allowEmptyString('meta_description');

        $validator
            ->scalar('meta_keyword')
            ->allowEmptyString('meta_keyword');

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
    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity, 
    \ArrayObject $options)
    {
        $slug = Inflector::slug(strtolower($entity->title));
        $entity->slug = strtolower($slug);
        return true;
    }
}
