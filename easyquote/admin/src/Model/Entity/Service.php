<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity.
 */
class Service extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'category_id' => true,
        'name' => true,
        'active' => true, 
        'category' => true,
        'hourly_rates' => true,
        'projects' => true,
        'questions' => true,
        'working_hours' => true,
    ];
}
