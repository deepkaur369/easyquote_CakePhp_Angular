<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'username' => true,
        'password' => true,
        'company' => true,
        'logo' => true,
        'website' => true,
        'address' => true,
        'phone' => true,
        'info' => true,
        'type' => true,
        'active' => true,
        'date' => true,
        'hires' => true,
        'hourly_rates' => true,
        'projects' => true,
        'working_hours' => true,
    ];
	
	protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
