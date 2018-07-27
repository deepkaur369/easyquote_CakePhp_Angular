<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('categories', $this->paginate($this->Categories));
        $this->set('_serialize', ['categories']);
    }
    public function apiShowService()
    {
        // echo json_encode(['saved']);exit;
         try {
                    
            $articlesTable = TableRegistry::get('categories')->find();
            //echo json_encode(['saved']);
            echo json_encode($articlesTable);
          
        }

        catch (customException $e) {

          echo json_encode(['fail']);
          
        }
        exit;
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Services']
        ]);
        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success('The category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The category could not be saved. Please, try again.');
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success('The category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The category could not be saved. Please, try again.');
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->is(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
			$this->redirect(['controller'=>'Categories','action'=>'index']);
            //$this->Flash->success('The category has been deleted.');
        } else {
			echo "no";
			exit;
            //$this->Flash->error('The category could not be deleted. Please, try again.');
        }
        //return $this->redirect(['action' => 'index']);
    }
	
	
	/**
     * start_flow method
     *
     * @param string|null $id Category id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	public function start_flow()
    {
        $this->layout = 'site_page';
        if ($this->request->is('post')) {
             return $this->redirect(['controller'=>'Categories','action' => 'start_flow']);
        }
		$this->set('categories', $this->paginate($this->Categories));
        $this->set('_serialize', ['categories']);
		
    }
}
