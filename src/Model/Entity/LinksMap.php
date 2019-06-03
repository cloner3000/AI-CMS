<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LinksMap Entity
 *
 * @property int $id
 * @property string $name
 * @property bool $status
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $lft
 * @property int|null $rght
 * @property int|null $parent_id
 *
 * @property \App\Model\Entity\LinksMap $parent_links_map
 * @property \App\Model\Entity\Link[] $links
 * @property \App\Model\Entity\LinksMap[] $child_links_maps
 */
class LinksMap extends Entity
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
        'status' => true,
        'created_by' => true,
        'created' => true,
        'modified_by' => true,
        'modified' => true,
        'lft' => true,
        'rght' => true,
        'parent_id' => true,
        'parent_links_map' => true,
        'links' => true,
        'child_links_maps' => true
    ];
}
