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
 * Links Model
 *
 * @property \App\Model\Table\LinksMapsTable|\Cake\ORM\Association\BelongsTo $LinksMaps
 * @property \App\Model\Table\ContentsTable|\Cake\ORM\Association\BelongsTo $Contents
 * @property \App\Model\Table\LinksTable|\Cake\ORM\Association\BelongsTo $ParentLinks
 * @property \App\Model\Table\LinksTable|\Cake\ORM\Association\HasMany $ChildLinks
 *
 * @method \App\Model\Entity\Link get($primaryKey, $options = [])
 * @method \App\Model\Entity\Link newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Link[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Link|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Link|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Link patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Link[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Link findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class LinksTable extends Table
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

        $this->setTable('links');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('LinksMaps', [
            'foreignKey' => 'links_map_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Contents', [
            'foreignKey' => 'content_id'
        ]);
        $this->belongsTo('ParentLinks', [
            'className' => 'Links',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildLinks', [
            'className' => 'Links',
            'foreignKey' => 'parent_id',
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
                'path' => 'webroot{DS}assets{DS}img{DS}links{DS}{year}{DS}{month}',
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
                    $slug = Inflector::slug($entity->title);
                    $title = strtolower($slug);
                    $name = str_replace("-","_",$title);
                    return [
                        $data['tmp_name'] => $name.'.'.$extension,
                        $tmp => $defaultAppSettings['Thumbnail.SM']. '_' . $name.'.'.$extension,
                        $tmp_2 => $defaultAppSettings['Thumbnail.MD']. '_' . $name.'.'.$extension,
                        $tmp_3 => $defaultAppSettings['Thumbnail.LG']. '_' . $name.'.'.$extension,
                    ];
                },
                'nameCallback' => function($table,$entity,$data,$field,$settings){
                    $slug = Inflector::slug($entity->title);
                    $title = strtolower($slug);
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
            ->scalar('title')
            ->maxLength('title', 225)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false,'Harap masukan judul');

        $validator
            ->scalar('_type')
            ->maxLength('_type', 225)
            ->requirePresence('_type', 'create')
            ->allowEmptyString('_type', false,'Harap pilih jenis link');

        $validator
            ->scalar('url')
            ->maxLength('url', 225)
            ->notEmpty('url','Harap masukan url',function($context){
                if(empty($context['data'])){
                    if(!empty($context['providers']['entity'])){
                        $type = $context['providers']['entity']['_type'];
                        $url = $context['providers']['entity']['url'];
                    }else{
                        $type = NULL;
                        $url = NULL;
                    }
                    
                }else{
                    $type = $context['data']['_type'];
                    $url = $context['data']['url'];
                }
                if($type == 'EXTERNAL' && empty($url)){
                    return true;
                }else{
                    return false;
                }
            });

        $validator
            ->scalar('content_id')
            ->maxLength('content_id', 225)
            ->notEmpty('content_id','Harap pilih konten',function($context){
                if(empty($context['data'])){
                    if(!empty($context['providers']['entity'])){
                        $type = $context['providers']['entity']['_type'];
                        $content_id = $context['providers']['entity']['content_id'];
                    }else{
                        $type = NULL;
                        $content_id = NULL;
                    }
                    
                }else{
                    $type = $context['data']['_type'];
                    $content_id = $context['data']['content_id'];
                }
                if($type == 'CONTENT' && empty($content_id)){
                    return true;
                }else{
                    return false;
                }
            });

        $validator
            ->integer('links_map_id')
            ->requirePresence('links_map_id', 'create')
            ->allowEmptyString('links_map_id', false,'Harap pilih sitemap');

        $validator
            ->scalar('target')
            ->requirePresence('target', 'create')
            ->allowEmptyString('target', false,'Harap pilih target');


        $validator
            ->add('picture', 'file', [
            'rule' => ['mimeType', ['image/jpeg', 'image/png']],
            'on' => function ($context) {
                return !empty($context['data']['picture']);
            },
            'message'=>'Hanya file JPEG dan PNG yang diperbolehkan'])
            ->allowEmpty('picture');

        $validator
            ->integer('sort')
            ->allowEmptyString('sort');

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
