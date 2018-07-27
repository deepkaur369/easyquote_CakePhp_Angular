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
	 /*admin side*/
    public function index()
    {
		$this->getA();
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
		$this->getA();
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
		$this->getA();
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
        $options = $this->WorkingHours->Options->find('list');
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
		$this->getA();
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
        $options = $this->WorkingHours->Options->find('list');
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
  //   public function delete($id = null)
  //   {

		// $this->getA();
		// $workinghour = $this->WorkingHours->find()->where(['WorkingHours.service_id' =>$id,'WorkingHours.user_id' =>$this->request->session()->read('id')]);

		// foreach($workinghour as $workinghours){
		// 	$wrksid=$workinghours['id'];
		// 	$workingHour = $this->WorkingHours->get($wrksid);
		// 	if ($this->WorkingHours->delete($workingHour)) {
		// 		$this->Flash->success('The working hour has been deleted.');
		// 	} else {
		// 		$this->Flash->error('The working hour could not be deleted. Please, try again.');
		// 	}
			
		// }
		// return $this->redirect(['action' => 'index']);
  //   }
	
	    public function delete($id = null)
    {
		$this->getA();
        $this->request->is(['post', 'delete']);
        $workinghour = $this->WorkingHours->get($id);
        if ($this->WorkingHours->delete($workinghour)) {
			return $this->redirect(['action' => 'index']);
            //$this->Flash->success('The project has been deleted.');
        } else {
			
           $this->Flash->error('The project could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
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
		$this->getA();
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
		$this->getA();
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
	
	
	
		/*****    Company Controller's function starts    ******/
	
	/* Company's Index method  */
    public function c_index()
    {
		$this->layout= 'c_default';
		$this->getC();
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
	
	/* Company's view method  */
	 public function c_view($id = null)
    {
		$this->getC();
        $workingHour = $this->WorkingHours->get($id, [
            'contain' => ['Users', 'Services', 'Options']
        ]);
        $this->set('workingHour', $workingHour);
        $this->set('_serialize', ['workingHour']);
    }
	
	/* Company's add method  */
	 public function c_add()
    {
		$this->getC();
        $workingHour = $this->WorkingHours->newEntity();
        if ($this->request->is('post')) {
            $workingHour = $this->WorkingHours->patchEntity($workingHour, $this->request->data);
			
            if ($this->WorkingHours->save($workingHour)) {
                $this->Flash->success('The working hour has been saved.');
                return $this->redirect(['action' => 'c_index']);
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
	
	/* Company's edit method  */
	 public function c_edit($id = null)
    {
		$this->getC();
        $workingHour = $this->WorkingHours->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workingHour = $this->WorkingHours->patchEntity($workingHour, $this->request->data);
            if ($this->WorkingHours->save($workingHour)) {
                $this->Flash->success('The working hour has been saved.');
                return $this->redirect(['action' => 'c_index']);
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

	/* Company's delete method  */
	 public function c_delete($id = null)
    {
		$this->getC();
		$workinghour = $this->WorkingHours->find()->where(['WorkingHours.service_id' =>$id,'WorkingHours.user_id' =>$this->request->session()->read('id')]);
		
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
    }
	
	/* Company's addservicehour method  */
	 public function c_addservicehour($servid = null)
    {
		$this->layout= 'c_default';
		$this->getC();
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
			
			foreach($opts as $opt){
				$optsid=$opt['id'];
				$workingHour = $this->WorkingHours->newEntity();
				$this->request->data['WorkingHour']['user_id']=$this->request->session()->read('id');
				$this->request->data['WorkingHour']['service_id']=$servid;
				$this->request->data['WorkingHour']['option_id']=$this->request->data['data']['WorkingHour']['option_id']['option_id'.$optsid];
				$this->request->data['WorkingHour']['hours']=$this->request->data['data']['WorkingHour']['hours']['working_hours'.$optsid];
				
				$workingHour = $this->WorkingHours->patchEntity($workingHour, $this->request->data['WorkingHour']);
				if ($this->WorkingHours->save($workingHour)) {
					echo 'The working hour has been saved.<br/><br/>';
				} else {
					echo 'The working hour could not be saved. Please, try again.<br/><br/>';
				}
			}	
			return $this->redirect(['controller'=>'services','action' => 'c_allservice']);
		}
    }
	
	/* Company's editservicehour method  */
	public function c_editservicehour($servid = null)
    {
		$this->layout= 'c_default';
		$this->getC();
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
			
			foreach($opts as $opt){
				$optsid=$opt['id'];
				
				$this->request->data['WorkingHour']['id']=$this->request->data['data']['WorkingHour']['id']['id'.$optsid];
				$this->request->data['WorkingHour']['user_id']=$this->request->session()->read('id');
				$this->request->data['WorkingHour']['service_id']=$servid;
				$this->request->data['WorkingHour']['option_id']=$this->request->data['data']['WorkingHour']['option_id']['option_id'.$optsid];
				$this->request->data['WorkingHour']['hours']=$this->request->data['data']['WorkingHour']['hours']['working_hours'.$optsid];
				
				$workingHour = $this->WorkingHours->get(['id'=>$this->request->data['WorkingHour']['id']]);
				$workingHour = $this->WorkingHours->patchEntity($workingHour, $this->request->data['WorkingHour']);
				if ($this->WorkingHours->save($workingHour)) {
					echo 'The working hour has been saved.<br/><br/>';
				} else {
					echo 'The working hour could not be saved. Please, try again.<br/><br/>';
				}
			}	
			return $this->redirect(['controller'=>'services','action' => 'c_allservice']);
		}
    }
	
	
	public function apiCalculator(){

		$count = $_POST['count'];
		$service_id = $_POST['serviceID'];
		$ques_id = array();
		$opt_id = array();

		for($i=3 ; $i<=$count; $i++){
			$ques_id[] = $_POST['queid'.$i];
			$opt_id[] = $_POST['optionid'.$i];

		}
		$this->loadModel('Selections');
		$serial=serialize($service_id);

		$total_hrs = $this->WorkingHours->find()->where(['WorkingHours.service_id' =>$service_id , 'WorkingHours.option_id IN' => $opt_id])->groupBy('user_id');

		$add_hrs=0;
		foreach($total_hrs as $key=>$total_hr){
			foreach($total_hr as $totalHr){
				if($key==$totalHr['user_id']){
					$u_id = $totalHr['user_id'];
					$add_hrs = $totalHr['hours']+$add_hrs;
					$arr[$u_id] = $add_hrs;
				}
			}
			$add_hrs=0;
		}
	//echo json_encode($arr);
	$this->loadModel('HourlyRates');
	$total=array();
	foreach($arr as $key=>$total_hr){
		$hrsrates = $this->HourlyRates->find()->where(['HourlyRates.user_id' =>$key , 'HourlyRates.service_id' => $service_id])->contain(['users']);

			foreach($hrsrates as $hrsrate){
				$User_name = $hrsrate->Users['name'];
				$hrsrt=$hrsrate['rate'];		
			}
			$total[]=['name'=>$User_name, 'price'=>$total_hr*$hrsrt];		
		}
		echo json_encode($total);exit;
	}		
}
