<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 */
class ServicesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
	 /*Admin side*/
    public function index()
    {
		$this->getA();
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $this->set('services', $this->paginate($this->Services));
        $this->set('_serialize', ['services']);
    }
	
	/**
     * Index method
     *
     * @return void
     */
    public function allservice()
    {	

		$this->getA();
		$this->loadModel('WorkingHours');
		$workingHour = $this->WorkingHours->find('all')->where(['WorkingHours.user_id' =>$this->request->session()->read('id')])->distinct(['service_id']);
		if($workingHour){
				
			//echo "not";
			$this->paginate = [
			'contain' => ['Categories','Questions']
			];
			$this->set('services', $this->paginate($this->Services));
			$this->set('_serialize', ['services']);
			
			/*foreach($workingHour as $wkghrs){
				$data = $wkghrs;
			}
			$serv_id=$data['service_id'];*/
			$this->set('workingHours', $workingHour);
			$this->set('_serialize', ['workingHours']);
		}else{
			/*foreach($workingHour as $wkghrs){
				$data = $wkghrs;
			}
			$serv_id=$data['service_id'];
			$this->set('workingHours', $workingHour);
			$this->set('_serialize', ['workingHours']);
			exit;*/
			
			
			$this->paginate = [
			'contain' => ['Categories','Questions']
			];
			$this->set('services', $this->paginate($this->Services));
			$this->set('_serialize', ['services']);
		}
		  
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {		

		$this->getA();
        $service = $this->Services->get($id, [
            'contain' => ['Categories', 'HourlyRates', 'Projects', 'Questions', 'WorkingHours']
        ]);
        $this->set('service', $service);
        $this->set('_serialize', ['service']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->getA();
        $service = $this->Services->newEntity();
        if ($this->request->is('post')) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {
                $this->Flash->success('The service has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The service could not be saved. Please, try again.');
            }
        }
        $categories = $this->Services->Categories->find('list', ['limit' => 200]);
        $this->set(compact('service', 'categories'));
        $this->set('_serialize', ['service']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->getA();
        $service = $this->Services->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {
                $this->Flash->success('The service has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The service could not be saved. Please, try again.');
            }
        }
        $categories = $this->Services->Categories->find('list', ['limit' => 200]);
        $this->set(compact('service', 'categories'));
        $this->set('_serialize', ['service']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
		$this->getA();
        $this->request->allowMethod(['post', 'get','delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error('The service could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	/* add service name in top form */
	public function setService(){
		
		$this->getA();
		$service = $this->Services->newEntity();
        if ($this->request->is('post')) {
			$name = $this->request->data['name'];
			/*check existence services start*/
			$services = $this->Services->find()->where(['Services.name'=>$name]);
			foreach($services as $serv){
				$servs=$serv['id'];
			}
			/*check existence services end*/
			if(!empty($servs)){
				echo "no";
				exit;
			}else{
				$service = $this->Services->patchEntity($service, $this->request->data);
				if ($result = $this->Services->save($service)) {
					
					echo $result->id;
				} else {
					echo 'sorry';
				}
			}
        }
		exit;
	}
	
	/**
     * getservices method
     *
     * @param string|null $id Service id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function getservice($cat = null)
    {

		$this->getA();
       if ($cat) {
			$question = $this->Services->find()->where(['Services.category_id' => $cat ])->all();
		
			foreach($question as $ques){
				$data[] = $ques; 
			}
			//echo "<pre>"; print_r($data);echo "</pre>";exit;
			echo json_encode($data);
			exit;
			     
		}
		
    }

    public function apiGetService($cat=null)
    {
        
        $this->getA();
       if ($cat) {
            $question = $this->Services->find()->where(['Services.category_id' => $cat ])->all();
        
            foreach($question as $ques){
                $data[] = $ques; 
            }
            //echo "<pre>"; print_r($data);echo "</pre>";exit;
            echo json_encode($data);
            exit;
                 
        }
        
    }
	
	
	
		/*****    Company Controller's function starts    ******/
		
		
		
	
	/* company's Index method */
	 public function c_index()
    {
		$this->layout= 'c_default';
		$this->getC();
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $this->set('services', $this->paginate($this->Services));
        $this->set('_serialize', ['services']);
    }
	
	/* company's allservice method */
	public function c_allservice()
    {
		$this->layout= 'c_default';
		$this->getC();
		$this->loadModel('WorkingHours');
		$workingHour = $this->WorkingHours->find('all')->where(['WorkingHours.user_id' =>$this->request->session()->read('id')])->distinct(['service_id']);
		if($workingHour){
			
			$this->paginate = [
			'contain' => ['Categories','Questions']
			];
			$this->set('services', $this->paginate($this->Services));
			$this->set('_serialize', ['services']);
			
			$this->set('workingHours', $workingHour);
			$this->set('_serialize', ['workingHours']);
		}else{
			
			$this->paginate = [
			'contain' => ['Categories','Questions']
			];
			$this->set('services', $this->paginate($this->Services));
			$this->set('_serialize', ['services']);
		}
		  
    }
	
	/* company's view method */
	 public function c_view($id = null)
    {
		$this->getC();
        $service = $this->Services->get($id, [
            'contain' => ['Categories', 'HourlyRates', 'Projects', 'Questions', 'WorkingHours']
        ]);
        $this->set('service', $service);
        $this->set('_serialize', ['service']);
    }
	
	/* company's add method */
	 public function c_add()
    {				
		$this->getC();
        $service = $this->Services->newEntity();
        if ($this->request->is('post')) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {
                $this->Flash->success('The service has been saved.');
                return $this->redirect(['action' => 'c_index']);
            } else {
                $this->Flash->error('The service could not be saved. Please, try again.');
            }
        }
        $categories = $this->Services->Categories->find('list', ['limit' => 200]);
        $this->set(compact('service', 'categories'));
        $this->set('_serialize', ['service']);
    }
	
	/* company's edit method */
	 public function c_edit($id = null)
    {
		$this->getC();
        $service = $this->Services->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($this->Services->save($service)) {
                $this->Flash->success('The service has been saved.');
                return $this->redirect(['action' => 'c_index']);
            } else {
                $this->Flash->error('The service could not be saved. Please, try again.');
            }
        }
        $categories = $this->Services->Categories->find('list', ['limit' => 200]);
        $this->set(compact('service', 'categories'));
        $this->set('_serialize', ['service']);
    }
	
	/* company's delete method */
	 public function c_delete($id = null)
    {
		$this->getC();
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            $this->Flash->success('The service has been deleted.');
        } else {
            $this->Flash->error('The service could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'c_index']);
    }
	
	/* company's setService method */
	public function c_setService(){
		
		$this->getC();
		$service = $this->Services->newEntity();
        if ($this->request->is('post')) {
            $service = $this->Services->patchEntity($service, $this->request->data);
            if ($result = $this->Services->save($service)) {
                
                echo $result->id;
            } else {
                echo 'sorry';
            }
        }
		exit;
	}
	
	/* company's getservice method */
	public function c_getservice($cat = null)
    {
		$this->getC();
        if ($cat) {
			$question = $this->Services->find()->where(['Services.category_id' => $cat ])->all();
			foreach($question as $ques){
				$data[] = $ques; 
			}
			echo json_encode($data);
			exit;     
		}
		
    }
	
	
		/*****     Company Controller's function ends      ******/
}
