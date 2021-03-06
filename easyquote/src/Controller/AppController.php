<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Controller\Component\AuthComponent;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\View\Helper\SessionHelper;
use Cake\Controller\Component\FlashComponent;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

   
	 
	 public $components = [
        'Auth' ,
        'Flash'
    ];
	
	 /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
   public $helpers = ['Form'];
	
	 public function initialize()
    {
		
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
			'authorize' => ['Controller'],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
		$this->loadComponent('Cookie');
		//$this->Cookie->config('path', '	/easyquote/Categories/');
		$this->Cookie->config([
			'expires' => '+10 days',
			'httpOnly' => true
		]);
		
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add','forgot','start_flow','getservices','newdata','hourcalculation','getback','comment','gobackfirst','addcomment','image_crop','save_image','apiCalculator' ]);
    }
	
	 public function isAuthorized() {
      return true;
   }
}
