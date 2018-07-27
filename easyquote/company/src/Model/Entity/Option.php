<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Option Entity.
 */
class Option extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'question_id' => true,
        'title' => true,
		'name' => true,
        'icon' => true,
		'image' => true,
        'is_chargeable' => true,
		'is_comment' => true,
		'comment' => true,
		'style' => true,
        'question' => true,
        'relations' => true,
        'working_hours' => true,
    ];
}
