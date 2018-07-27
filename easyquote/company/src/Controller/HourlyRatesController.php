<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HourlyRates Controller
 *
 * @property \App\Model\Table\HourlyRatesTable $HourlyRates
 */
class HourlyRatesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		/*$admin=$this->request->session()->read('type')=="admin";
		$user=$this->request->session()->read('type')=="user";
		if($admin){ 
			$this->paginate = [
				'contain' => ['Users', 'Services']
			];
			$this->set('hourlyRates', $this->paginate($this->HourlyRates));
			$this->set('_serialize', ['hourlyRates']);
		}else{*/
			//$user = $this->Selections->get($this->request->session()->read('id'));
			$hourlyRate = $this->HourlyRates->find()->where(['HourlyRates.user_id' =>$this->request->session()->read('id')])->contain(['Users', 'Services']);
			$this->set('hourlyRates', $hourlyRate);
		/*}*/
    }

    /**
     * View method
     *
     * @param string|null $id Hourly Rate id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hourlyRate = $this->HourlyRates->get($id, [
            'contain' => ['Users', 'Services']
        ]);
        $this->set('hourlyRate', $hourlyRate);
        $this->set('_serialize', ['hourlyRate']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hourlyRate = $this->HourlyRates->newEntity();
        if ($this->request->is('post')) {
            $hourlyRate = $this->HourlyRates->patchEntity($hourlyRate, $this->request->data);
            if ($this->HourlyRates->save($hourlyRate)) {
                $this->Flash->success('The hourly rate has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The hourly rate could not be saved. Please, try again.');
            }
        }
        $users = $this->HourlyRates->Users->find('list', ['limit' => 200]);
		
		$servid=array();
		$allservices = $this->HourlyRates->find()->where(['HourlyRates.user_id'=> $this->request->session()->read('id')]);
		
		foreach($allservices as $allservice){
		$servid[]=$allservice['service_id'];
		
		}
		
       // $services = $this->HourlyRates->Services->find('list',['limit' => 200]);
	   
		$services = $this->HourlyRates->Services->find('list', ['conditions' => ['NOT' => [ 
      'Services.id in' => $servid]]]);
			
		
        $this->set(compact('hourlyRate', 'users', 'services'));
        $this->set('_serialize', ['hourlyRate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hourly Rate id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hourlyRate = $this->HourlyRates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hourlyRate = $this->HourlyRates->patchEntity($hourlyRate, $this->request->data);
            if ($this->HourlyRates->save($hourlyRate)) {
                $this->Flash->success('The hourly rate has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The hourly rate could not be saved. Please, try again.');
            }
        }
        $users = $this->HourlyRates->Users->find('list', ['limit' => 200]);
        $services = $this->HourlyRates->Services->find('list', ['limit' => 200]);
        $this->set(compact('hourlyRate', 'users', 'services'));
        $this->set('_serialize', ['hourlyRate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hourly Rate id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hourlyRate = $this->HourlyRates->get($id);
        if ($this->HourlyRates->delete($hourlyRate)) {
            $this->Flash->success('The hourly rate has been deleted.');
        } else {
            $this->Flash->error('The hourly rate could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
