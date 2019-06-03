<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cover Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property string $file
 * @property string $file_dir
 * @property int|null $sort
 * @property bool $status
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Cover extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'slug' => true,
        'file' => true,
        'file_dir' => true,
        'sort' => true,
        'status' => true,
        'created_by' => true,
        'created' => true,
        'modified_by' => true,
        'modified' => true
    ];
}
