<?php


namespace App\Controller;
use App\Controller\AppController;
use Cake\Network\Exception\ForbiddenException;
use Cake\Event\Event;
use Cake\Controller\Component\FlashComponent;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Network\Email\Email;
use Cake\ORM\TableRegistry;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

	public function initialize()
    {
        parent::initialize();
		$this->loadComponent('Flash');
    }


    /**
     * Index method
     *
     * @return void
     */
	 /*Admin side*/
    public function index()
    {
		$admin=$this->request->session()->read('type');
		if($admin=="admin"){
			$this->getA();
			$this->set('users', $this->paginate($this->Users));
			$this->set('_serialize', ['users']);
		}else if($admin=="client"){
			$this->layout= 'c_default';
			$this->getC();
			return $this->redirect(['action'=>'c_view']);
		}
		
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->getA();
		$user = $this->Users->get($id, [
			'contain' => ['Hires', 'HourlyRates', 'Projects', 'WorkingHours']
		]);
		$this->set('user', $user);
		$this->set('_serialize', ['user']);
		
    }
	
	
	
	/**
 * login method
 *
 * @return void
 */
	
	
	public function login() {
		if($this->request->session()->check('id')==0){
			$this->layout=false;

			if ($this->request->is('post')) {
				$user = $this->Auth->identify();
				if ($user) {
					$this->Auth->setUser($user);
					$session = $this->request->session();
					$this->request->session()->renew('id');
					$session->write('id', $user['id']);
					$session->write('name', $user['name']);
					$session->write('username', $user['username']);
					$session->write('logo', $user['logo']);
					$session->write('type', $user['type']);
					$session->write('active', $user['active']);
					
					$active1=$this->request->session()->read('active');
					
					if($active1==1){
					$admin=$this->request->session()->read('type');

						if($admin){
							if($admin == 'admin'){

								return $this->redirect($this->Auth->redirectUrl());
							}else if($admin == 'client'){
								
								return $this->redirect(['action'=>'c_login']);
							}else{
								return $this->redirect(['action'=>'logout']);
							}
						}else{
							return $this->redirect(['action'=>'logout']);
						}
					}else{
						return $this->redirect(['action' => 'logout']);
					}
					
				}else {
					$this->Flash->error(
					__('Username or password is incorrect')
					, ['key' => 'auth']
					);
				}
		}
		}else{
			return $this->redirect(['action' => 'index']);
		}
	}

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
	
		$this->getA();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			$this->request->data['active']=0;
            $user = $this->Users->patchEntity($user, $this->request->data);	
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
	
	/*getstatus method*/
	
	public function getstatus($id=null){
	
		$this->getA();
		$user = $this->Users->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
		
			$this->request->data['dat']['active']=$this->request->data['data']['active'];
			$user = $this->Users->patchEntity($user, $this->request->data['dat']);
			if ($this->Users->save($user)) {
				echo "saved";exit;
			} else {
				echo "not saved";exit;
			}
		}
	}
	
	public function apiAddPartner()
    {   
    	// echo json_encode($_POST);
    	// exit;
    	$image = $_POST['image'];
    	$pname = $_POST['pname'];
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$company = $_POST['company'];
    	$website = $_POST['website'];
    	$address = $_POST['address'];
    	$phone = $_POST['phone'];
    	$info = $_POST['info'];
    	$type = $_POST['types'];
    	$active = $_POST['active'];

        $articlesTable = TableRegistry::get('users');
		$article = $articlesTable->newEntity();

		$article->name = $pname;
		$article->username = $username;
		$article->password = $password;
		$article->company = $company;

		$article->website = $website;
		$article->address = $address;

		$article->logo = $image;
		$article->phone = $phone;

		$article->info = $info;
		$article->type = $type;
		$article->active = $active;
        try {
		        	
		    $articlesTable->save($article);

		    echo json_encode(['saved']);
		  
		}

		catch (customException $e) {

		  echo json_encode(['fail']);
		  
		}
		exit;
     }


	
	public function changepass(){

		$this->getA();
		if ($this->request->is('post')) {

			$users = $this->Users->get($this->request->session()->read('id'), [
				'contain' => []
			]);
			
			$this->request->data['username'] = $this->request->session()->read('username');
			
			$user = $this->Auth->identify();
			

			if(!empty($user)){
			
				$this->request->data['password']=$this->request->data['newpassword'];

					$user = $this->Users->patchEntity($users, $this->request->data);

					if ($this->Users->save($user)) {

						echo "saved";
						exit;
					}
			
			}else{
				echo "wrong";
				exit;
			}
		}
		
	}
	

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->getA();
		$user = $this->Users->get($id, [
			'contain' => []
		]);

			
		if ($this->request->is(['patch', 'post', 'put'])) {	

			if(empty($this->request->data['password'])){
				unset($this->request->data['password']);
			}

			$hash = $user->password;
			if(!empty($this->request->data['password'])){
				if (password_verify($this->request->data['password'], $hash)) {
			    	$user = $this->Users->patchEntity($user, $this->request->data);

				if ($this->Users->save($user)) {
					$this->Flash->success('The user has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The user could not be saved. Please, try again.');
				}
			} else {
			    $this->Flash->error('Invalid Password');
			}
		}


			// $user = $this->Users->patchEntity($user, $this->request->data);

			// if ($this->Users->save($user)) {
			// 	$this->Flash->success('The user has been saved.');
			// 	return $this->redirect(['action' => 'index']);
			// } else {
			// 	$this->Flash->error('The user could not be saved. Please, try again.');
			// }
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

		$this->getA();
		$this->request->is(['post', 'delete']);
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			return $this->redirect(['action' => 'index']);
		} else {
			echo "no";
			exit;
		}
		return $this->redirect(['action' => 'index']);
    }
	
	/**
     * forgot method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	 
	public function forgot(){
	
		$this->layout=false;
		if ($this->request->is('post')) {
		
			$UserName=$this->request->data['data']['User']['Username'];
			$tmp="welcome";
			$user = $this->Users->find()->where(['Users.username' =>$UserName]);
			
			foreach($user as $users){
				$nam=$users['name'];
				$uid=$users['id'];
			}
			
			
			if(empty($uid)){
				echo "wrong username";
				exit;
			}else{
				
				$Name=$nam;
				$this->request->data['password'] = $tmp;
				$this->request->data['username'] = $UserName;
				$this->request->data['id'] = $uid;	
				$user = $this->Users->get($uid);
				$user = $this->Users->patchEntity($user, $this->request->data);
				if($this->Users->save($user)){
					echo "ok";
					exit;
				}else{
					echo "no";
					exit;
				}
			}
		}
	}
	
	/**
     * logout method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	 
	public function logout() {
		$this->Flash->success('Good-Bye');
		$this->request->session()->delete('id');
		$this->request->session()->delete('name');
		$this->request->session()->delete('username');
		$this->request->session()->delete('logo');
		$this->request->session()->delete('type');
		return $this->redirect($this->Auth->logout());
	}
	
	
	/*settings method*/
	
	public function setting($id=null) {
	
		$this->getA();
		$this->loadModel('Settings');
		if($id!=""){
			
			if($id==0){
				$seting = $this->Settings->newEntity();
				if($this->request->is('post')){
				
					$falert = $this->request->data['active'];
					$seting = $this->Settings->patchEntity($seting, $this->request->data);
					
					if ($this->Settings->save($seting)) {
						if($falert==1){
							echo "ok1";
						}else{
							echo "ok0";
						}
						exit;
					}else{
						echo "not saved";
						exit;
					}
				}
			}else{
				$seting = $this->Settings->get($id);			
				if($this->request->is('post')){
				
					$falert = $this->request->data['active'];
					$seting = $this->Settings->patchEntity($seting, $this->request->data);
					if ($this->Settings->save($seting)) {
						if($falert==1){
							echo "ok1";
						}else{
							echo "ok0";
						}
						exit;
					}else{
						echo "not saved";
						exit;
					}
				}
			}
		}
		$setting = $this->Settings->find();
		$this->set(compact('setting'));
	}
	
	/* crop and save image */
	
	function image_crop(){

			$imgUrl = $_POST['imgUrl'];
			/*explored image URL and get image name*/
			$expImgUrl=explode("/", $imgUrl);
			$LengthOfArray = sizeof($expImgUrl);
			$imageName = $LengthOfArray-1;
			$imgName = $expImgUrl[$imageName];
			$imgInitW = $_POST['imgInitW'];
			$imgInitH = $_POST['imgInitH'];
			$imgW = $_POST['imgW'];
			$imgH = $_POST['imgH'];
			$imgY1 = $_POST['imgY1'];
			$imgX1 = $_POST['imgX1'];
			$cropW = $_POST['cropW'];
			$cropH = $_POST['cropH'];

			$jpeg_quality = 100;
			$rand = rand();
			$output_filename = "../webroot/img/uploads/croppedImg_".$rand;
			$oname = "img/uploads/croppedImg_".$rand;
			$Pname = "img/uploads/";
			$path = BASE_PATH;

			$what = getimagesize($Pname."/".$imgName);
			
			switch(strtolower($what['mime']))
			{
				case 'image/png':
					$img_r = imagecreatefrompng($Pname."/".$imgName);
					$source_image = imagecreatefrompng($Pname."/".$imgName);
					$type = '.png';
					break;
				case 'image/jpeg':
					$img_r = imagecreatefromjpeg($Pname."/".$imgName);
					$source_image = imagecreatefromjpeg($Pname."/".$imgName);
					$type = '.jpeg';
					break;
				case 'image/gif':
					$img_r = imagecreatefromgif($Pname."/".$imgName);
					$source_image = imagecreatefromgif($Pname."/".$imgName);
					$type = '.gif';
					break;
				default: die('image type not supported');
			}
				
			$resizedImage = imagecreatetruecolor($imgW, $imgH);
			imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, 
						$imgH, $imgInitW, $imgInitH);	
			
			
			$dest_image = imagecreatetruecolor($cropW, $cropH);
			imagecopyresampled($dest_image, $resizedImage, 0, 0, $imgX1, $imgY1, $cropW, 
						$cropH, $cropW, $cropH);	


			imagejpeg($dest_image, $output_filename.$type, $jpeg_quality);
			
			$response = array(
					"status" => 'success',
					"url" => $oname.$type, 
					"base" => $path 
				  );
			 print json_encode($response);
			 exit;
	}
	
	
	function save_image(){
		$imagePath = "../webroot/img/uploads/";
		$Path= BASE_PATH.'img/uploads/';
		$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
		$temp = explode(".", $_FILES["img"]["name"]);
		$extension = end($temp);

		if ( in_array($extension, $allowedExts))
		  {
		  if ($_FILES["img"]["error"] > 0)
			{
				 $response = array(
					"status" => 'error',
					"message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
				);
				echo "Return Code: " . $_FILES["img"]["error"] . "<br>";
			}
		  else
			{
				
			  $filename = $_FILES["img"]["tmp_name"];
			  list($width, $height) = getimagesize( $filename );

			  move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);

			  $response = array(
				"status" => 'success',
				"url" => $Path.$_FILES["img"]["name"],
				"width" => $width,
				"height" => $height
			  );
			  
			}
		  }
		else
		  {
		   $response = array(
				"status" => 'error',
				"message" => 'something went wrong',
			);
		  }
		  
		  print json_encode($response);
		exit;
	}
	
	/*****    Company Controller's function starts    ******/
	
	 /* company's Index method */
    public function c_index()
    {
		$this->layout= 'c_default';
		$this->getC();
		return $this->redirect(['action'=>'c_view']);	
    }
	
	/* company's View method */
	 public function c_view($id = null)
    {
		$this->layout= 'c_default';
		$this->getC();
		if(empty($id)){
			$id=$this->request->session()->read('id');
		}
		$user = $this->Users->get($id, [
			'contain' => ['Hires', 'HourlyRates', 'Projects', 'WorkingHours']
		]);
		$this->set('user', $user);
		$this->set('_serialize', ['user']);
	
    }
	
	/* company's login method */
	public function c_login() {
		
		$this->request->data['_method']="POST";
		$this->request->data['username']=$_COOKIE['username'];
		$this->request->data['password']=$_COOKIE['password'];
		$this->request->data['active']=1;
		$this->layout=false;
		if (1) {
	
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				$session = $this->request->session();
				$this->request->session()->renew('id');
				$session->write('id', $user['id']);
				$session->write('name', $user['name']);
				$session->write('username', $user['username']);
				$session->write('logo', $user['logo']);
				$session->write('type', $user['type']);
				
				$client=$this->request->session()->read('type')=="client";
				if($client=="client"){ 
					return $this->redirect($this->Auth->redirectUrl());
				}else{
				return $this->redirect(['action'=>'c_logout']);
				}
				
			} else {
				$this->Flash->error(
				__('Username or password is incorrect'),
				'default',
				[],
				'auth'
				);
			}
			
		}
	}
	
	/* company's add method */
	 public function c_add()
    {
		$this->layout= 'c_default';
		$this->getC();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
		
			/*if(!empty($this->request->data['logo']['name'])) {
				$file = $this->request->data['logo']; 
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
				$arr_ext = ['jpg', 'jpeg', 'gif']; 
				if(in_array($ext, $arr_ext)) {
					move_uploaded_file($file['tmp_name'], UPLOAD_IMAGE . $file['name']);
					$this->request->data['logo'] = $file['name'];
				}	
			}*/
            $user = $this->Users->patchEntity($user, $this->request->data);
			
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'c_index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
	
	/* company's changepass method */
	public function c_changepass(){

		$this->getC();	
		if ($this->request->is('post')) {

			$users = $this->Users->get($this->request->session()->read('id'), [
				'contain' => []
			]);
		
			$this->request->data['username'] = $this->request->session()->read('username');
			$user = $this->Auth->identify();
			
			if(!empty($user) && ($this->request->data['cpassword']== $this->request->data['newpassword'])){
			
				$this->request->data['password']=$this->request->data['newpassword'];
				$user = $this->Users->patchEntity($users, $this->request->data);
					
				if ($this->Users->save($user)) {
				
					/*============send email===========*/
					//$email = $this->request->session()->read('username');
					//$email="zeenat.dx@gmail.com";
					//$name=$this->request->session()->read('name');
					// Sample smtp configuration.
					/*Email::configTransport('gmail', [
						'host' => 'ssl://smtp.gmail.com',
						'port' => 465,
						'username' => 'my@gmail.com',
						'password' => 'secret',
						'className' => 'Smtp'
					]);
					$email = new Email('default');
					$email->from(['me@example.com' => 'My Site'])
						->to('zeenat.dx@gmail.com')
						->subject('About')
						->send('My message');*/
						/*$msg="Hello ".$name.", Your password is changed. Your new password is - ".$this->request->data['password'].", Thanks";
						mail($email,"Change Password",$msg);  */ 
					 
					/*============send email end===========*/
				
					echo "saved";
					exit;
				}
			
			}else{
				echo "wrong";
				exit;
			}
		}
	}
	
	/* company's Edit method */
	public function c_edit($id = null){
		
		$this->getC();
		$user = $this->Users->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {

			if(empty($this->request->data['password'])){
				unset($this->request->data['password']);
			}
			
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				echo "ok";
				exit;
			} else {
			echo "not saved";
			exit;
				$this->Flash->error('The user could not be saved. Please, try again.');
			}
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
    }
	
	/* company's delete method */
	 public function c_delete($id = null)
    {
		$this->getC();
		if($this->request->is(['post', 'delete'])){
			$user = $this->Users->get($id);
			if ($this->Users->delete($user)) {
				$this->Flash->success('The user has been deleted.');
			} else {
				$this->Flash->error('The user could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'c_index']);
		}
		
    }
	
	/* company's forgot method */
	public function c_forgot(){
	
		$this->layout=false;
		if ($this->request->is('post')) {
		
			$UserName=$this->request->data['data']['User']['Username'];
			$tmp="welcome";
			$user = $this->Users->find()->where(['Users.username' =>$UserName,'Users.type' =>"client"]);
			
			foreach($user as $users){
				$nam=$users['name'];
				$uid=$users['id'];
			}
			
			
			if(empty($uid)){
				echo "wrong username";
				exit;
			}else{
				
				$Name=$nam;
				$this->request->data['password'] = $tmp;
				$this->request->data['username'] = $UserName;
				$this->request->data['id'] = $uid;	
				$user = $this->Users->get($uid);
				$user = $this->Users->patchEntity($user, $this->request->data);
				if($this->Users->save($user)){
				
					/* send email start */
					/*App::import('Vendor', 'PHPMailer', array ('file'=>'PHPMailer'.DS.'class.phpmailer.php'));
					date_default_timezone_set('America/Toronto');
					$mail             = new PHPMailer();
					$body             = "Hello ".$Name." .<br/>You can Reset your Password by login thorogh this password ".$tmp." <br/>Thanks";
					$mail->IsSMTP(); 
					$mail->Host       = "stmp.gmail.com"; 
					$mail->SMTPDebug  = 1;                     
					$mail->SMTPAuth   = true;                 
					$mail->SMTPSecure = "ssl";                
					$mail->Host       = "smtp.gmail.com";     
					$mail->Port       = 465;                   
					$mail->Username   = EMAILUSER; 
					$mail->Password   = EMAILPASS;           
					$mail->SetFrom(EMAILUSER);
					$mail->Subject    = 'DSX:MISCWORK - Password Changed';
					$mail->AltBody    = ""; 
					$mail->MsgHTML($body);
					$mail->AddAddress($UserName);
					$mail->Send();*/
					
					/* send email end */
					echo "ok";
					exit;
				}else{
					echo "no";
					exit;
				}
			}
		}
	}
	
	/* company's logout method */
	public function c_logout() {
		$this->Flash->success('Good-Bye');
		
		$this->request->session()->delete('id');
		$this->request->session()->delete('name');
		$this->request->session()->delete('username');
		$this->request->session()->delete('logo');
		$this->request->session()->delete('type');
		
	
		return $this->redirect(['action' => 'login']);
	}
	
	
	/******       Company Controller's function ends     *******/
}
