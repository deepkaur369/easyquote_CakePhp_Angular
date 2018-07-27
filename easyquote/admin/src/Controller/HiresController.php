<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hires Controller
 *
 * @property \App\Model\Table\HiresTable $Hires
 */
class HiresController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$admin=$this->request->session()->read('type')=="admin";
		$user=$this->request->session()->read('type')=="user";
		if($admin){ 
			$this->paginate = [
				'contain' => ['Users', 'Customers', 'Selections']
			];
			$this->set('hires', $this->paginate($this->Hires));
			$this->set('_serialize', ['hires']);
		}else{
			//$user = $this->Selections->get($this->request->session()->read('id'));
			$hire = $this->Hires->find()->where(['Hires.customer_id' => 1])->contain(['Users', 'Customers', 'Selections']);
			$this->set('hires', $hire);
		}
    }

    /**
     * View method
     *
     * @param string|null $id Hire id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hire = $this->Hires->get($id, [
            'contain' => ['Users', 'Customers', 'Selections', 'Projects']
        ]);
        $this->set('hire', $hire);
        $this->set('_serialize', ['hire']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hire = $this->Hires->newEntity();
        if ($this->request->is('post')) {
            $hire = $this->Hires->patchEntity($hire, $this->request->data);
            if ($this->Hires->save($hire)) {
                $this->Flash->success('The hire has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The hire could not be saved. Please, try again.');
            }
        }
        $users = $this->Hires->Users->find('list', ['limit' => 200]);
        $customers = $this->Hires->Customers->find('list', ['limit' => 200]);
        $selections = $this->Hires->Selections->find('list', ['limit' => 200]);
        $this->set(compact('hire', 'users', 'customers', 'selections'));
        $this->set('_serialize', ['hire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hire id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hire = $this->Hires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hire = $this->Hires->patchEntity($hire, $this->request->data);
            if ($this->Hires->save($hire)) {
                $this->Flash->success('The hire has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The hire could not be saved. Please, try again.');
            }
        }
        $users = $this->Hires->Users->find('list', ['limit' => 200]);
        $customers = $this->Hires->Customers->find('list', ['limit' => 200]);
        $selections = $this->Hires->Selections->find('list', ['limit' => 200]);
        $this->set(compact('hire', 'users', 'customers', 'selections'));
        $this->set('_serialize', ['hire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hire id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hire = $this->Hires->get($id);
        if ($this->Hires->delete($hire)) {
            $this->Flash->success('The hire has been deleted.');
        } else {
            $this->Flash->error('The hire could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
