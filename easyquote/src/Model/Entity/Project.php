<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity.
 */
class Project extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'service_id' => true,
        'hire_id' => true,
        'name' => true,
        'info' => true,
        'url' => true,
        'screenshot' => true,
        'active' => true,
        'date' => true,
        'user' => true,
        'service' => true,
        'hire' => true,
    ];
}
