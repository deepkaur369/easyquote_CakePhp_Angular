<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Options Controller
 *
 * @property \App\Model\Table\OptionsTable $Options
 */
class OptionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions']
        ];
        $this->set('options', $this->paginate($this->Options));
        $this->set('_serialize', ['options']);
    }

    /**
     * View method
     *
     * @param string|null $id Option id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $option = $this->Options->get($id, [
            'contain' => ['Questions', 'QuestionFlows', 'WorkingHours']
        ]);
        $this->set('option', $option);
        $this->set('_serialize', ['option']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $option = $this->Options->newEntity();
        if ($this->request->is('post')) {
            $option = $this->Options->patchEntity($option, $this->request->data);
            if ($this->Options->save($option)) {
                $this->Flash->success('The option has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The option could not be saved. Please, try again.');
            }
        }
        $questions = $this->Options->Questions->find('list', ['limit' => 200]);
        $this->set(compact('option', 'questions'));
        $this->set('_serialize', ['option']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Option id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $option = $this->Options->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $option = $this->Options->patchEntity($option, $this->request->data);
            if ($this->Options->save($option)) {
                $this->Flash->success('The option has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The option could not be saved. Please, try again.');
            }
        }
        $questions = $this->Options->Questions->find('list', ['limit' => 200]);
        $this->set(compact('option', 'questions'));
        $this->set('_serialize', ['option']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Option id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $option = $this->Options->get($id);
        if ($this->Options->delete($option)) {
            $this->Flash->success('The option has been deleted.');
        } else {
            $this->Flash->error('The option could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	/*save comment*/
	public function comment($id=null){
	
		$options = $this->Options->get($id, [
				'contain' => []
			]);
        if ($this->request->is('post')) {
			
			$delid=$this->request->data['data']['Options']['delid'];
			$this->request->data['data']['at']['Options']['comment']="0";
			$ques=$this->request->data['data']['Options']['question_id'];
			$new="0";
			
			if($ques){
			
			
			$question = $this->Options->find()->where(['Options.question_id' => $ques ])->all();
			foreach($question as $questions){
				$did=$questions['id'];
				$opt = $this->Options->get($did);
				$opts = $this->Options->patchEntity($opt, $this->request->data['data']['at']);
			
				$que=$questions['comment'];
				if($que!="NULL" || $que!="0"){
				$this->Options->save($opts);
				}
				
			}
			
			}
			
            $option = $this->Options->patchEntity($options, $this->request->data['data']);
			
           if($this->Options->save($option)){
				echo "saved";exit;
		   }else{
			echo "not saved";exit;
		   }
			 
        }
	}
	
	/*save addcomment*/
	public function addcomment($id=null){
	
		$options = $this->Options->get($id, [
				'contain' => []
			]);
        if ($this->request->is('post')) {
			
			$delid=$this->request->data['data']['Options']['delid'];
			$this->request->data['data']['at']['Options']['comment']="0";
			$ques=$this->request->data['data']['Options']['question_id'];
			$new="0";
			
			if($ques){
			
			
				$opt = $this->Options->get($id);
				$opts = $this->Options->patchEntity($options, $this->request->data['data']);
			
				if($this->Options->save($opts)){
					echo "saved";exit;
				}else{
					echo "not saved";exit;
				}
			}
		
		}
	}
}
