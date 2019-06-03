<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContentsCategory Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $status
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Content[] $contents
 */
class ContentsCategory extends Entity
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
        'title' => true,
        'slug' => true,
        'status' => true,
        'created_by' => true,
        'created' => true,
        'modified_by' => true,
        'modified' => true,
        'contents' => true,
        'contents_slug' => true,
    ];
}
