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
 
 /*company side*/
 
 
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
                'action' => 'view'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
		
    }

    public function beforeFilter(Event $event)
    {
        
		$admin=$this->request->session()->read('type');
		if($admin=="admin"){
			$this->action = 'index';
			$this->name='users';
			$url = USER_PATH.$this->name.'/'.$this->action;
			return $this->redirect($url);
			
		}
		/*if($admin!="client"){
			$this->action = 'login';
			$this->name='users';
			$url = USER_PATH.$this->name.'/'.$this->action;
			return $this->redirect($url);
			
		}*/
		
			$this->Auth->allow(['add','forgot','image_crop','save_image']);
			//$this->Cookie->config('name', 'CookieMonster');
    }
	
	 public function isAuthorized() {
      return true;
   }
}
