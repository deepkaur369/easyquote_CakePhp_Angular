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
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success('The project has been deleted.');
        } else {
            $this->Flash->error('The project could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
