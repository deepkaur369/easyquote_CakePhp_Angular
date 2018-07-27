<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HourlyRate Entity.
 */
class HourlyRate extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'service_id' => true,
        'rate' => true,
        'date' => true,
        'user' => true,
        'service' => true,
    ];
}
