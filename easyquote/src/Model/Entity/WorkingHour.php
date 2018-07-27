<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkingHour Entity.
 */
class WorkingHour extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'service_id' => true,
        'option_id' => true,
        'hours' => true,
        'date' => true,
        'user' => true,
        'service' => true,
        'option' => true,
    ];
}
