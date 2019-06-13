<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContentsFile Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $file
 * @property string|null $file_dir
 * @property string|null $file_type
 * @property bool|null $status
 */
class ContentsFile extends Entity
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
        'description' => true,
        'file' => true,
        'file_dir' => true,
        'file_type' => true,
        'status' => true
    ];
}
