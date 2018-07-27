<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hire Entity.
 */
class Hire extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'customer_id' => true,
        'selection_id' => true,
        'date' => true,
        'user' => true,
        'customer' => true,
        'selection' => true,
        'projects' => true,
    ];
}
