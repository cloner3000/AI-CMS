<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContentsFiles Model
 *
 * @method \App\Model\Entity\ContentsFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContentsFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContentsFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContentsFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentsFile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContentsFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContentsFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContentsFile findOrCreate($search, callable $callback = null, $options = [])
 */
class ContentsFilesTable extends Table
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

        $this->setTable('contents_files');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 225)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('file')
            ->maxLength('file', 225)
            ->allowEmptyFile('file');

        $validator
            ->scalar('file_dir')
            ->maxLength('file_dir', 225)
            ->allowEmptyFile('file_dir');

        $validator
            ->scalar('file_type')
            ->maxLength('file_type', 225)
            ->allowEmptyFile('file_type');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        return $validator;
    }
}
