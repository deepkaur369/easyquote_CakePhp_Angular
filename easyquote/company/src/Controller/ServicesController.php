<?php
namespace App\Controller;

use App\Controller\AppController;

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
	 /*Company side*/
    public function index()
    {
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
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            $this->Flash->success('The service has been deleted.');
        } else {
            $this->Flash->error('The service could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	/* add service name in top form */
	public function setService(){
		
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
	
	/**
     * getservices method
     *
     * @param string|null $id Service id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function getservice($cat = null)
    {
       if ($cat) {
			$question = $this->Services->find()->where(['Services.category_id' => $cat ])->all();
		
			foreach($question as $ques){
				$data[] = $ques; 
			}
			echo json_encode($data);
			exit;     
		}
		
    }
}
