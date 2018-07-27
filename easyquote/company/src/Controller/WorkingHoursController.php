<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WorkingHours Controller
 *
 * @property \App\Model\Table\WorkingHoursTable $WorkingHours
 */
class WorkingHoursController extends AppController
{



    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$customer=$this->request->session()->read('type')=="customer";
		$user=$this->request->session()->read('type')=="user";
		if(!($customer || $user)){ 
			
			$this->paginate = [
				'contain' => ['Users', 'Services', 'Options']
			];
			$this->set('workingHours', $this->paginate($this->WorkingHours));
			$this->set('_serialize', ['workingHours']);
		}else{
				$workingHour = $this->WorkingHours->find()->where(['WorkingHours.user_id' => $this->request->session()->read('id')])->contain(['Users', 'Services', 'Options']);
				
				$this->set('workingHours', $workingHour);
				
		}
    }

    /**
     * View method
     *
     * @param string|null $id Working Hour id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workingHour = $this->WorkingHours->get($id, [
            'contain' => ['Users', 'Services', 'Options']
        ]);
        $this->set('workingHour', $workingHour);
        $this->set('_serialize', ['workingHour']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workingHour = $this->WorkingHours->newEntity();
        if ($this->request->is('post')) {
            $workingHour = $this->WorkingHours->patchEntity($workingHour, $this->request->data);
			
            if ($this->WorkingHours->save($workingHour)) {
                $this->Flash->success('The working hour has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The working hour could not be saved. Please, try again.');
            }
        }
        $users = $this->WorkingHours->Users->find('list', ['limit' => 200]);
        $services = $this->WorkingHours->Services->find('list', ['limit' => 200]);
        $options = $this->WorkingHours->Options->find('list', ['limit' => 200]);
        $this->set(compact('workingHour', 'users', 'services', 'options'));
        $this->set('_serialize', ['workingHour']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Working Hour id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workingHour = $this->WorkingHours->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workingHour = $this->WorkingHours->patchEntity($workingHour, $this->request->data);
            if ($this->WorkingHours->save($workingHour)) {
                $this->Flash->success('The working hour has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The working hour could not be saved. Please, try again.');
            }
        }
        $users = $this->WorkingHours->Users->find('list', ['limit' => 200]);
        $services = $this->WorkingHours->Services->find('list', ['limit' => 200]);
        $options = $this->WorkingHours->Options->find('list', ['limit' => 200]);
        $this->set(compact('workingHour', 'users', 'services', 'options'));
        $this->set('_serialize', ['workingHour']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Working Hour id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['delete']);
        // $workingHour = $this->WorkingHours->get($id);
		$workinghour = $this->WorkingHours->find()->where(['WorkingHours.service_id' =>$id,'WorkingHours.user_id' =>$this->request->session()->read('id')]);
		//$wrkhrs=0;
		
		foreach($workinghour as $workinghours){
			$wrksid=$workinghours['id'];
			$workingHour = $this->WorkingHours->get($wrksid);
			if ($this->WorkingHours->delete($workingHour)) {
				$this->Flash->success('The working hour has been deleted.');
			} else {
				$this->Flash->error('The working hour could not be deleted. Please, try again.');
			}
			
		}
		echo "ok";
		exit;
		//return $this->redirect(['controller'=>'services','action' => 'allservice']);
    }
	
	/**
     * addservicehour method
     *
     * @param string|null $id Working Hour id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function addservicehour($servid = null)
    {
		$this->loadModel('Questions');
		$this->loadModel('Options');
		$question = $this->Questions->find()->where(['Questions.service_id' =>$servid])->contain(['Options']);

		$this->set('question', $question);
        $this->set('_serialize', ['question']);
		
		if($this->request->is(['patch', 'post', 'put'])){
			
			foreach($question as $questions){
				$quesid[]=$questions['id'];
			}
			
			$opts  = $this->Options->find()->where(['Options.question_id in' =>$quesid,'Options.is_chargeable' =>1]);
	
			//$optid=$this->request->data['data']['WorkingHour']['option_id'];
			//$wrkhrsid[]=$this->request->data['data']['WorkingHour']['hours'];
			
			foreach($opts as $opt){
				$optsid=$opt['id'];
				$workingHour = $this->WorkingHours->newEntity();
				$this->request->data['WorkingHour']['user_id']=$this->request->session()->read('id');
				$this->request->data['WorkingHour']['service_id']=$servid;
				$this->request->data['WorkingHour']['option_id']=$this->request->data['data']['WorkingHour']['option_id']['option_id'.$optsid];
				$this->request->data['WorkingHour']['hours']=$this->request->data['data']['WorkingHour']['hours']['working_hours'.$optsid];
				
				$workingHour = $this->WorkingHours->patchEntity($workingHour, $this->request->data['WorkingHour']);
				//print_r($this->request->data['WorkingHour']);
				if ($this->WorkingHours->save($workingHour)) {
					echo 'The working hour has been saved.<br/><br/>';
				} else {
					echo 'The working hour could not be saved. Please, try again.<br/><br/>';
				}

			}	
			return $this->redirect(['controller'=>'services','action' => 'allservice']);
		}
    }
	
	
	
	/**
     * editservicehour method
     *
     * @param string|null $id Working Hour id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	public function editservicehour($servid = null)
    {
		$this->loadModel('Questions');
		$this->loadModel('Options');
		$question = $this->Questions->find()->where(['Questions.service_id' =>$servid])->contain(['Options']);

		$this->set('question', $question);
        $this->set('_serialize', ['question']);
		
		$workinghours = $this->WorkingHours->find()->where(['WorkingHours.service_id' =>$servid,'WorkingHours.user_id' =>$this->request->session()->read('id')]);
		$this->set('workinghours', $workinghours);
        $this->set('_serialize', ['workinghours']);
		
		if($this->request->is(['patch', 'post', 'put'])){
			
			foreach($question as $questions){
				$quesid[]=$questions['id'];
			}
			
			$opts  = $this->Options->find()->where(['Options.question_id in' =>$quesid,'Options.is_chargeable' =>1]);
	
			//$optid=$this->request->data['data']['WorkingHour']['option_id'];
			//$wrkhrsid[]=$this->request->data['data']['WorkingHour']['hours'];
			
			foreach($opts as $opt){
				$optsid=$opt['id'];
				
				$this->request->data['WorkingHour']['id']=$this->request->data['data']['WorkingHour']['id']['id'.$optsid];
				$this->request->data['WorkingHour']['user_id']=$this->request->session()->read('id');
				$this->request->data['WorkingHour']['service_id']=$servid;
				$this->request->data['WorkingHour']['option_id']=$this->request->data['data']['WorkingHour']['option_id']['option_id'.$optsid];
				$this->request->data['WorkingHour']['hours']=$this->request->data['data']['WorkingHour']['hours']['working_hours'.$optsid];
				
				$workingHour = $this->WorkingHours->get(['id'=>$this->request->data['WorkingHour']['id']]);
				$workingHour = $this->WorkingHours->patchEntity($workingHour, $this->request->data['WorkingHour']);
				//print_r($this->request->data['WorkingHour']);
				if ($this->WorkingHours->save($workingHour)) {
					echo 'The working hour has been saved.<br/><br/>';
				} else {
					echo 'The working hour could not be saved. Please, try again.<br/><br/>';
				}

			}	
			return $this->redirect(['controller'=>'services','action' => 'allservice']);
		}
    }
	
	
}
