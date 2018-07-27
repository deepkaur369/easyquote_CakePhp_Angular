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
	 /*company side*/
    public function index()
    {
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

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
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
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
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
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
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
        $this->request->is('post');
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
			echo "ok";
			exit;
            //$this->Flash->success('The project has been deleted.');
        } else {
			echo "no";
			exit;
            //$this->Flash->error('The project could not be deleted. Please, try again.');
        }
        //return $this->redirect(['action' => 'index']);
    }
	
	
	/* crop and save image */
	
	function image_crop(){
			$imgUrl = $_POST['imgUrl'];
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
			$path = BASE_PATH;

			$what = getimagesize($imgUrl);
			switch(strtolower($what['mime']))
			{
				case 'image/png':
					$img_r = imagecreatefrompng($imgUrl);
					$source_image = imagecreatefrompng($imgUrl);
					$type = '.png';
					break;
				case 'image/jpeg':
					$img_r = imagecreatefromjpeg($imgUrl);
					$source_image = imagecreatefromjpeg($imgUrl);
					$type = '.jpeg';
					break;
				case 'image/gif':
					$img_r = imagecreatefromgif($imgUrl);
					$source_image = imagecreatefromgif($imgUrl);
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
}
