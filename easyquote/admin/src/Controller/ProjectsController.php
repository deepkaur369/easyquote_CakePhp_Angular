<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$this->getA();
		$admin=$this->request->session()->read('type')=="admin";
		$user=$this->request->session()->read('type')=="user";
		if($admin){ 
			$this->paginate = [
				'contain' => ['Users', 'Services', 'Hires']
			];
			$this->set('projects', $this->paginate($this->Projects));
			$this->set('_serialize', ['projects']);
		}else if($user){
			$project = $this->Projects->find()->where(['Projects.user_id' =>$this->request->session()->read('id')])->contain(['Users', 'Services', 'Hires']);
			$this->set('projects', $project);
		}
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->getA();
        $project = $this->Projects->get($id, [
            'contain' => ['Users', 'Services', 'Hires']
        ]);
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->getA();
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
		
			if(empty($this->request->data['screenshot']['name'])) {
				$this->set('error', 'error');
				$this->Flash->error('ijo9juioji');
					
			}	
		
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success('The project has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The project could not be saved. Please, try again.');
            }
        }
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
        $services = $this->Projects->Services->find('list', ['limit' => 200]);
        $hires = $this->Projects->Hires->find('list', ['limit' => 200]);
        $this->set(compact('project', 'users', 'services', 'hires'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->getA();
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
		
			/*if(!empty($this->request->data['screenshot']['name'])) {
			
				$file = $this->request->data['screenshot']; 
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
				$arr_ext = ['jpg', 'jpeg', 'gif']; 

				if(in_array($ext, $arr_ext)) {
					move_uploaded_file($file['tmp_name'], UPLOAD_IMAGE . $file['name']);
					$this->request->data['screenshot'] = $file['name'];
				}
					
			}*/
		
		
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success('The project has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The project could not be saved. Please, try again.');
            }
        }
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
        $services = $this->Projects->Services->find('list', ['limit' => 200]);
        $hires = $this->Projects->Hires->find('list', ['limit' => 200]);
        $this->set(compact('project', 'users', 'services', 'hires'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->getA();
        $this->request->is(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
			return $this->redirect(['action' => 'index']);
            //$this->Flash->success('The project has been deleted.');
        } else {
			
           $this->Flash->error('The project could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
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
			
	/*Company's index method*/
	public function c_index()
    {
		$this->layout= 'c_default';
		$this->getC();
		$admin=$this->request->session()->read('type')=="admin";
		$user=$this->request->session()->read('type')=="user";
		if($admin){ 
			$this->paginate = [
				'contain' => ['Users', 'Services', 'Hires']
			];
			$this->set('projects', $this->paginate($this->Projects));
			$this->set('_serialize', ['projects']);
		}else{
			$project = $this->Projects->find()->where(['Projects.user_id' =>$this->request->session()->read('id')])->contain(['Users', 'Services', 'Hires']);
			$this->set('projects', $project);
		}
    }
	
	/*Company's view method*/
	public function c_view($id = null)
    {
		$this->getC();
        $project = $this->Projects->get($id, [
            'contain' => ['Users', 'Services', 'Hires']
        ]);
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }
	
	/*Company's add method*/
	public function c_add()
    {
		$this->layout= 'c_default';
		$this->getC();
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success('The project has been saved.');
                return $this->redirect(['action' => 'c_index']);
            } else {
                $this->Flash->error('The project could not be saved. Please, try again.');
            }
        }
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
        $services = $this->Projects->Services->find('list', ['limit' => 200]);
        $hires = $this->Projects->Hires->find('list', ['limit' => 200]);
        $this->set(compact('project', 'users', 'services', 'hires'));
        $this->set('_serialize', ['project']);
    }
	
	/*Company's edit method*/
	public function c_edit($id = null)
    {
		$this->layout= 'c_default';
		$this->getC();
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success('The project has been saved.');
                return $this->redirect(['action' => 'c_index']);
            } else {
                $this->Flash->error('The project could not be saved. Please, try again.');
            }
        }
        $users = $this->Projects->Users->find('list', ['limit' => 200]);
        $services = $this->Projects->Services->find('list', ['limit' => 200]);
        $hires = $this->Projects->Hires->find('list', ['limit' => 200]);
        $this->set(compact('project', 'users', 'services', 'hires'));
        $this->set('_serialize', ['project']);
    }
	
	/*Company's delete method*/
	public function c_delete($id = null)
    {
		$this->getC();
        $this->request->is('post');
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
			echo "ok";
			exit;
        } else {
			echo "no";
			exit;
        }
    }
	
	
			/******       Company Controller's function ends     *******/
}
