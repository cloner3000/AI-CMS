<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Link Entity
 *
 * @property int $id
 * @property string $title
 * @property int $links_map_id
 * @property string $_type
 * @property string $target
 * @property string|null $url
 * @property int|null $content_id
 * @property int|null $parent_id
 * @property string|null $picture
 * @property string|null $picture_dir
 * @property int|null $lft
 * @property int|null $rght
 * @property int|null $level
 * @property int|null $sort
 * @property bool $status
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\LinksMap $links_map
 * @property \App\Model\Entity\Content $content
 * @property \App\Model\Entity\Link $parent_link
 * @property \App\Model\Entity\Link[] $child_links
 */
class Link extends Entity
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
        'links_map_id' => true,
        '_type' => true,
        'target' => true,
        'url' => true,
        'content_id' => true,
        'parent_id' => true,
        'picture' => true,
        'picture_dir' => true,
        'lft' => true,
        'rght' => true,
        'level' => true,
        'sort' => true,
        'status' => true,
        'created_by' => true,
        'created' => true,
        'modified_by' => true,
        'modified' => true,
        'links_map' => true,
        'content' => true,
        'parent_link' => true,
        'child_links' => true
    ];
}
