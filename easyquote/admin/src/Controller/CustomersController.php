<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\ForbiddenException;
use Cake\Event\Event;
use Cake\Controller\Component\FlashComponent;
use Cake\ORM\TableRegistry;
/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
	 
	/*admin side*/ 
    public function index()
    {
		$this->getA();
		$admin=$this->request->session()->read('type')=="admin";
		if(($admin)){ 
			$this->set('customers', $this->paginate($this->Customers));
			$this->set('_serialize', ['customers']);
		}else{
			$customer = $this->Customers->get(1);
			$this->set('customers', $customer);
		}
		
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
					$session->write('id', $user['id']);
					$session->write('name', $user['name']);
					$session->write('email', $user['email']);
					
						return $this->redirect($this->Auth->redirectUrl());
					
				} else {
					$this->Flash->error(
					__('Username or password is incorrect'),
					'default',
					[],
					'auth'
					);
				}
			}
		}else{
			return $this->redirect(['action'=>'index']);
		}
	}
	
	/**
     * change password method
     *
     * @param string|null $id Customer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	 
	public function changepass(){
		
		$this->getA();
		$this->layout = false;
		if ($this->request->is('post')) {
			$customers = $this->Customers->get($this->request->session()->read('id'), [
				'contain' => []
			]);
			$pass = $this->request->data['data']['Customers']['oldpassword'];
			$new = $this->request->data['data']['Customers']['password'];
			if(!empty($customers)){
			
				if($this->request->data['data']['Customers']['cpassword']==$this->request->data['data']['Customers']['oldpassword']){
					$this->request->data['password']=$new;
					$customer = $this->Customers->patchEntity($customers, $this->request->data);
					
					if ($this->Customers->save($customer)) {
						$this->Flash->success('Password has been successfully updated.');
						return $this->redirect(['action' => 'index']);
					}
				}else{
					$this->Flash->success('Wrong Password. Please try again.');
					return $this->redirect(['action' => 'index']);
				}
				
			}else{
				$this->Flash->success('Wrong Password. Please try again.');
				return $this->redirect(['action' => 'index']);
			}
		}
		
	}


    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	 
	 
    public function view($id = null)
    {
		$this->getA();
        $customer = $this->Customers->get($id, [
            'contain' => ['Hires', 'Selections']
        ]);
        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
    }

	
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
	 
	 
    public function add()
    {
		$this->getA();
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success('The customer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The customer could not be saved. Please, try again.');
            }
        }
        $this->set(compact('customer'));
        $this->set('_serialize', ['customer']);
    }

    public function apiAddCustomer()
    {   
    	$image = $_POST['image'];
    	$cname = $_POST['cname'];
    	$email = $_POST['email'];
    	$password = $_POST['password'];
    	$company = $_POST['company'];
    	$website = $_POST['website'];
    	$address = $_POST['address'];
    	$ip = $_POST['ip'];


        $articlesTable = TableRegistry::get('customers');
		$article = $articlesTable->newEntity();

		$article->name = $cname;
		$article->email = $email;
		$article->password = $password;
		$article->company = $company;

		$article->website = $website;
		$article->address = $address;

		$article->image = $image;
		$article->ip = $ip;
        try {
		        	
		    $articlesTable->save($article);

		    echo json_encode(['saved']);
		  
		}

		catch (customException $e) {

		  echo json_encode(['fail']);
		  
		}
		exit;
     }



    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->getA();
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
		
			if(empty($this->request->data['password'])){
				unset($this->request->data['password']);
			}
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success('The customer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The customer could not be saved. Please, try again.');
            }
        }
        $this->set(compact('customer'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->getA();
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success('The customer has been deleted.');
        } else {
            $this->Flash->error('The customer could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	
	/**
     * forgot method
     *
     * @param string|null $id Customer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	
	
	public function forgot(){
	
		$this->layout=false;
		if ($this->request->is('post')) {
			$UserName=$this->request->data['Customer']['email'];
			$tmp="welcome123";
			//$customer = $this->Customer->find('first',array('conditions'=>array('Customer.email'=>$UserName)));
			$customer = $this->Customer->find()->where(['Customer.email' =>$UserName])->contain([]);
			if(!empty($customer)){
				$Name=$customer['Customer']['name'];
				$this->request->data['Customer']['password'] = $tmp;
				$this->request->data['Customer']['email'] = $UserName;
				$this->request->data['Customer']['id'] = 	$customer['Customer']['id'];
				$this->Customer->save($this->request->data);
				
				/* send email start */
				App::import('Vendor', 'PHPMailer', array ('file'=>'PHPMailer'.DS.'class.phpmailer.php'));
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
				$mail->Send();
				
				/* send email end */
				return $this->redirect(array('action' => 'login','?true'));
			}else	{
				return $this->redirect(array('action' => 'login','?false'));	
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
		if($this->request->session()->check('id')==1){
			$this->Flash->success('Good-Bye');
			
			$this->request->session()->delete('id');
			$this->request->session()->delete('name');
			$this->request->session()->delete('username');
			$this->request->session()->delete('logo');
			$this->request->session()->delete('type');
			$this->request->session()->destroy();
			return $this->redirect($this->Auth->logout());
		}else{
		echo "error";exit;
			return $this->redirect(['action'=>'login']);
		}
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
	
	/* Company's index method */
	 public function c_index()
    {
		$this->layout= 'c_default';
		$this->getC();
		$admin=$this->request->session()->read('type')=="admin";
		if(($admin)){ 
			$this->set('customers', $this->paginate($this->Customers));
			$this->set('_serialize', ['customers']);
		}else{
			$customer = $this->Customers->get(1);
			$this->set('customers', $customer);
		}
		
    }
	
	/* Company's login method */
	public function c_login() {
		
		if($this->request->session()->check('id')==0){
			$this->layout=false;
			
			if ($this->request->is('post')) {
				$user = $this->Auth->identify();
				if ($user) {
					$this->Auth->setUser($user);
					$session = $this->request->session();
					$session->write('id', $user['id']);
					$session->write('name', $user['name']);
					$session->write('email', $user['email']);
					
						return $this->redirect($this->Auth->redirectUrl());
					
				} else {
					$this->Flash->error(
					__('Username or password is incorrect'),
					'default',
					[],
					'auth'
					);
				}
			}
		}else{
			return $this->redirect(['action'=>'c_index']);
		}
	}
	
	/* Company's changepass method */
	public function c_changepass(){
		
		$this->getC();
		$this->layout = false;
		if ($this->request->is('post')) {
			$customers = $this->Customers->get($this->request->session()->read('id'), [
				'contain' => []
			]);
			$pass = $this->request->data['data']['Customers']['oldpassword'];
			$new = $this->request->data['data']['Customers']['password'];
			if(!empty($customers)){
			
				if($this->request->data['data']['Customers']['cpassword']==$this->request->data['data']['Customers']['oldpassword']){
					$this->request->data['password']=$new;
					$customer = $this->Customers->patchEntity($customers, $this->request->data);
					
					if ($this->Customers->save($customer)) {
						$this->Flash->success('Password has been successfully updated.');
						return $this->redirect(['action' => 'c_index']);
					}
				}else{
					$this->Flash->success('Wrong Password. Please try again.');
					return $this->redirect(['action' => 'c_index']);
				}
				
			}else{
				$this->Flash->success('Wrong Password. Please try again.');
				return $this->redirect(['action' => 'c_index']);
			}
		}
	}
	
	/* Company's view method */
	 public function c_view($id = null)
    {
		$this->layout= 'c_default';
		$this->getC();
        $customer = $this->Customers->get($id, [
            'contain' => ['Hires', 'Selections']
        ]);
        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
    }
	
	/* Company's add method */
	 public function c_add()
    {
		$this->getC();
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success('The customer has been saved.');
                return $this->redirect(['action' => 'c_index']);
            } else {
                $this->Flash->error('The customer could not be saved. Please, try again.');
            }
        }
        $this->set(compact('customer'));
        $this->set('_serialize', ['customer']);
    }
	
	/* Company's edit method */
	 public function c_edit($id = null)
    {
		$this->getC();
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
		
			if(empty($this->request->data['password'])){
				unset($this->request->data['password']);
			}
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success('The customer has been saved.');
                return $this->redirect(['action' => 'c_index']);
            } else {
                $this->Flash->error('The customer could not be saved. Please, try again.');
            }
        }
        $this->set(compact('customer'));
        $this->set('_serialize', ['customer']);
    }
	
	/* Company's delete method */
	public function c_delete($id = null)
    {
		$this->getC();
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success('The customer has been deleted.');
        } else {
            $this->Flash->error('The customer could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'c_index']);
    }
	
	/* Company's forgot method */
	public function c_forgot(){
	
		$this->layout=false;
		if ($this->request->is('post')) {
			$UserName=$this->request->data['Customer']['email'];
			$tmp="welcome123";
			$customer = $this->Customer->find()->where(['Customer.email' =>$UserName])->contain([]);
			if(!empty($customer)){
				$Name=$customer['Customer']['name'];
				$this->request->data['Customer']['password'] = $tmp;
				$this->request->data['Customer']['email'] = $UserName;
				$this->request->data['Customer']['id'] = 	$customer['Customer']['id'];
				$this->Customer->save($this->request->data);
				
				/* send email start */
				App::import('Vendor', 'PHPMailer', array ('file'=>'PHPMailer'.DS.'class.phpmailer.php'));
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
				$mail->Send();
				
				/* send email end */
				return $this->redirect(array('action' => 'c_login','?true'));
			}else	{
				return $this->redirect(array('action' => 'c_login','?false'));	
			}	
		}
	}
	
	/* Company's logout method */
	public function c_logout() {
		if($this->request->session()->check('id')==1){
			$this->Flash->success('Good-Bye');
			$this->request->session()->delete('id');
			$this->request->session()->delete('name');
			$this->request->session()->delete('username');
			$this->request->session()->delete('logo');
			$this->request->session()->delete('type');
			$this->request->session()->destroy();
			return $this->redirect($this->Auth->logout());
		}else{
		echo "error";exit;
			return $this->redirect(['action'=>'c_login']);
		}
	}
	
	
	
	
	
			/******       Company Controller's function ends     *******/
}
