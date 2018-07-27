<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Selections Controller
 *
 * @property \App\Model\Table\SelectionsTable $Selections
 */
class SelectionsController extends AppController
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
				'contain' => ['Customers']
			];
			$this->set('selections', $this->paginate($this->Selections));
			$this->set('_serialize', ['selections']);
		}else if(!($admin || $user)){
			//$user = $this->Selections->get($this->request->session()->read('id'));
			$selection = $this->Selections->find()->where(['Selections.customer_id' => 1])->contain(['Customers']);
			$this->set('selections', $selection);
		}
    }

    /**
     * View method
     *
     * @param string|null $id Selection id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $selection = $this->Selections->get($id, [
            'contain' => ['Customers', 'Hires']
        ]);
        $this->set('selection', $selection);
        $this->set('_serialize', ['selection']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $selection = $this->Selections->newEntity();
        if ($this->request->is('post')) {
            $selection = $this->Selections->patchEntity($selection, $this->request->data);
            if ($this->Selections->save($selection)) {
                $this->Flash->success('The selection has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The selection could not be saved. Please, try again.');
            }
        }
        $customers = $this->Selections->Customers->find('list', ['limit' => 200]);
        $this->set(compact('selection', 'customers'));
        $this->set('_serialize', ['selection']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Selection id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $selection = $this->Selections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $selection = $this->Selections->patchEntity($selection, $this->request->data);
            if ($this->Selections->save($selection)) {
                $this->Flash->success('The selection has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The selection could not be saved. Please, try again.');
            }
        }
        $customers = $this->Selections->Customers->find('list', ['limit' => 200]);
        $this->set(compact('selection', 'customers'));
        $this->set('_serialize', ['selection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Selection id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $selection = $this->Selections->get($id);
        if ($this->Selections->delete($selection)) {
            $this->Flash->success('The selection has been deleted.');
        } else {
            $this->Flash->error('The selection could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
