<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OptionQuestion Entity.
 */
class Relation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'option_id' => true,
        'question_id' => true,
        'option' => true,
        'question' => true,
    ];
}
