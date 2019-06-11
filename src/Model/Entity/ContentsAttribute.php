<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContentsAttribute Entity
 *
 * @property int $id
 * @property int $contents_category_id
 * @property string $type
 * @property string $label
 * @property string|null $validations
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\ContentsCategory $contents_category
 * @property \App\Model\Entity\ContentsDataAttribute[] $contents_data_attributes
 */
class ContentsAttribute extends Entity
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
        'contents_category_id' => true,
        'type' => true,
        'label' => true,
        'validations' => true,
        'options' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'contents_category' => true,
        'contents_data_attributes' => true
    ];
}
