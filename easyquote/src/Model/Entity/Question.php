<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity.
 */
class Question extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'service_id' => true,
        'question' => true,
		'is_first' => true,
        'is_multiple_choice' => true,
        'service' => true,
        'options' => true,
        'relations' => true,
    ];
}
