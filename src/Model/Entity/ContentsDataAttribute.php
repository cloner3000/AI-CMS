<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContentsDataAttribute Entity
 *
 * @property int $id
 * @property int $content_id
 * @property int $contents_attribute_id
 * @property string|null $data
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\Content $content
 * @property \App\Model\Entity\ContentsAttribute $contents_attribute
 */
class ContentsDataAttribute extends Entity
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
        'content_id' => true,
        'contents_attribute_id' => true,
        'data' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'content' => true,
        'contents_attribute' => true
    ];
}
