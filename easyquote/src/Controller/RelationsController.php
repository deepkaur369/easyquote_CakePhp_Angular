<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OptionQuestions Controller
 *
 * @property \App\Model\Table\OptionQuestionsTable $OptionQuestions
 */
class RelationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Options', 'Questions']
        ];
        $this->set('relations', $this->paginate($this->Relations));
        $this->set('_serialize', ['relations']);
    }

    /**
     * View method
     *
     * @param string|null $id Option Question id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relations = $this->Relations->get($id, [
            'contain' => ['Options', 'Questions']
        ]);
        $this->set('relations', $relations);
        $this->set('_serialize', ['relations']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relations = $this->Relations->newEntity();
        if ($this->request->is('post')) {
            $relations = $this->Relations->patchEntity($relations, $this->request->data);
            if ($this->Relations->save($relations)) {
                $this->Flash->success('The option question has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The option question could not be saved. Please, try again.');
            }
        }
        $options = $this->Relations->Options->find('list', ['limit' => 200]);
        $questions = $this->Relations->Questions->find('list', ['limit' => 200]);
        $this->set(compact('relations', 'options', 'questions'));
        $this->set('_serialize', ['relations']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Option Question id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relations = $this->Relations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relations = $this->Relations->patchEntity($relations, $this->request->data);
            if ($this->Relations->save($relations)) {
                $this->Flash->success('The option question has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The option question could not be saved. Please, try again.');
            }
        }
        $options = $this->Relations->Options->find('list', ['limit' => 200]);
        $questions = $this->Relations->Questions->find('list', ['limit' => 200]);
        $this->set(compact('relations', 'options', 'questions'));
        $this->set('_serialize', ['relations']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Option Question id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relations = $this->Relations->get($id);
        if ($this->Relations->delete($relations)) {
            $this->Flash->success('The option question has been deleted.');
        } else {
            $this->Flash->error('The option question could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	/**
     * getback method
     *
     * @param string|null $id Question id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	public function getback($serid = null)
    {
		if($this->request->is('post')){
			$this->loadModel('Options');
			$this->loadModel('Services');
			$this->loadModel('Questions');
			//print_r($this->request->data);exit;
			$serid0=$this->request->data['data']['servit'];
			
			$cat_id= $_COOKIE['categoryid'];
			/*$serv = explode("_", $s_id);
			$servid0 = $serv[0];
			$servid1 = $serv[1];
			$select['serviceid']=$serv[1];*/
			
			if($serid0=="undefined" || $serid0==0){
			
				$options = $this->Services->find()->where(['Services.category_id' =>$cat_id,'Services.active' =>1])->all();
				foreach($options as $option){
					$dat[] = $option; 
				}
				//print_r($quesdat);exit;
				//$options = $this->Questions->find()->where(['Questions.id' =>$quesdat])->contain(['Options']);
				//foreach($options as $option){
					//$dat = $option; 
				//}
				
				echo json_encode($dat);
				exit;
			
			
			}else{
		
				$question = $this->Options->find()->where(['Options.id' =>$serid]);
				foreach($question as $ques){
					$quesdat = $ques['question_id']; 
				}
				//print_r($quesdat);exit;
				$options = $this->Questions->find()->where(['Questions.id' =>$quesdat])->contain(['Options']);
				foreach($options as $option){
					$dat = $option; 
				}
				
				echo json_encode($dat);
				exit;
			}
		}	
	}
	
	public function gobackfirst($catid=null){
	
		$this->loadModel('Categories');
		$options = $this->Categories->find()->where(['Categories.active' => 1])->all();
		foreach($options as $option){
			$dat[] = $option; 
		}
		//print_r($quesdat);exit;
		//$options = $this->Questions->find()->where(['Questions.id' =>$quesdat])->contain(['Options']);
		//foreach($options as $option){
			//$dat = $option; 
		//}
		
		echo json_encode($dat);
		exit;
	
	}
}
