<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
/*use Cake\Auth\DefaultPasswordHasher;*/
/**
 * Customer Entity.
 */
class Customer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'password' => true,
        'company' => true,
        'website' => true,
        'address' => true,
        'ip' => true,
        'date' => true,
        'hires' => true,
        'selections' => true,
    ];
	/*protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }*/
}
