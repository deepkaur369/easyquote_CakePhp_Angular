<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Selection Entity.
 */
class Selection extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'customer_id' => true,
        'selections' => true,
        'is_complete' => true,
        'date' => true,
        'customer' => true,
        'hires' => true,
    ];
}
