<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Inflector;

/**
 * ContentsCategories Model
 *
 * @property \App\Model\Table\ContentsTable|\Cake\ORM\Association\HasMany $Contents
 *
 * @method \App\Model\Entity\ContentsCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContentsCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContentsCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContentsCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentsCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentsCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContentsCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContentsCategory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentsCategoriesTable extends Table
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

        $this->setTable('contents_categories');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Contents', [
            'foreignKey' => 'contents_category_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->hasMany('ContentsAttributes', [
            'foreignKey' => 'contents_category_id',
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
            ->scalar('title')
            ->maxLength('title', 225)
            ->requirePresence('title', 'create')
            ->notEmpty('title', 'Masukan judul kategori konten');

        return $validator;
    }
    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity, 
    \ArrayObject $options)
    {
        $slug = Inflector::slug(strtolower($entity->title));
        $entity->slug = strtolower($slug);
        return true;
    }
    public function afterSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity, 
    \ArrayObject $options)
    {
        

        return true;
    }
}
