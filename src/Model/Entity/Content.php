<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $id
 * @property int $contents_category_id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $picture
 * @property string|null $picture_dir
 * @property string|null $body
 * @property bool|null $status
 * @property int|null $sort
 * @property string|null $meta_description
 * @property string|null $meta_keyword
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modified_by
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ContentsCategory $contents_category
 * @property \App\Model\Entity\Link[] $links
 */
class Content extends Entity
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
        'node' => true,
        'title' => true,
        'slug' => true,
        'picture' => true,
        'picture_dir' => true,
        'body' => true,
        'status' => true,
        'sort' => true,
        'meta_description' => true,
        'meta_keyword' => true,
        'created_by' => true,
        'created' => true,
        'modified_by' => true,
        'modified' => true,
        'contents_category' => true,
        'links' => true
    ];
}
