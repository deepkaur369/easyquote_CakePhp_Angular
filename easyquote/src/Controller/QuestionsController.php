<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Services']
        ];
        $this->set('questions', $this->paginate($this->Questions));
        $this->set('_serialize', ['questions']);
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Services', 'Options', 'QuestionFlows']
        ]);
        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success('The question has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The question could not be saved. Please, try again.');
            }
        }
        $services = $this->Questions->Services->find('list', ['limit' => 200]);
        $this->set(compact('question', 'services'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success('The question has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The question could not be saved. Please, try again.');
            }
        }
        $services = $this->Questions->Services->find('list', ['limit' => 200]);
        $this->set(compact('question', 'services'));
        $this->set('_serialize', ['question']);
    }
	
	
	/* get data for edit question form */
	public function getData($id = null)
    {
         $question = $this->Questions->get($id, [
            'contain' => []
        ]);

		$data = ['id'=>$question->id,'service_id'=>$question->service_id,'question'=>$question->question,'is_multiple_choice'=>$question->is_multiple_choice];
		print_r(json_encode($data));
		exit;	
    }
	
	/* get data for edit options form */
	public function getOptionData($id = null)
    {
         $options = $this->Questions->Options->get($id, [
            'contain' => []
        ]);

		$data = ['id'=>$options->id,'question_id'=>$options->question_id,'name'=>$options->name,'icon'=>$options->icon,'image'=>$options->image,'is_chargeable'=>$options->is_chargeable];
		print_r(json_encode($data));
		exit;	
    }
	

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success('The question has been deleted.');
        } else {
            $this->Flash->error('The question could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	
	/**
     * front_flow method
     *
     * @param string|null $id Question id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	public function front_flow()
    {
        $this->layout = 'site_page';
        if ($this->request->is('post')) {
             return $this->redirect(['controller'=>'Categories','action' => 'start_flow']);
        }
    }
	
	/**
     * newdata method
     *
     * @param string|null $id Question id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	
	public function newdata($serid = null)
    {
		if($this->request->is('post')){
		$optid=$this->request->data['data']['Question']['sol'];
			if($optid==0){
			
				//print_r($optionid);exit;
				$question = $this->Questions->find()->where(['Questions.service_id' =>$serid , 'Questions.is_first' => 1])->contain(['Options']);
			
				foreach($question as $ques){
					$dat = $ques; 
				}
				echo json_encode($dat);exit;
				exit;
					
			
			}else if($optid==1){
			$this->Cookie->write('inc',1);
				//print_r($optionid);exit;
				//if($this->request->is('post')){
				//$servid=$this->request->data);
				$this->loadModel('Relations');
				$questionOption = $this->Relations->find()->where(['Relations.option_id' =>$serid ]);
				
				
				foreach($questionOption as $quesopt){
					$dataopt = $quesopt; 
				}
				if(empty($dataopt)){
					echo "null";exit;
				}else{
					$que_id=$dataopt['question_id'];
					//print_r($dataopt);exit;
				
					$question = $this->Questions->find()->where(['Questions.id' =>$que_id])->contain(['Options']);
				
					foreach($question as $ques){
						$dat = $ques; 
					}
					if(empty($dat)){
						echo "null";exit;
					}else{
						echo json_encode($dat);exit;
						exit;
					}
				}
			}
		}
		
		
    }
		
	
	
	
	/* Flow canvas */
	public function flow(){
		
		
		print_r($_COOKIE);exit;
		
		$this->layout = 'flow_layout';
		$this->loadModel('Categories');
		
		$categories = $this->Categories->find('list');
        $this->set(compact('categories'));
		
    }
	
	
	/* add and update question form */
	public function setQuestion(){

		$this->request->data['is_multiple_choice'] = $this->request->data['is_multiple_choice']=='true'?1:0;
		
		if(empty( $this->request->data['id'])){
			unset($this->request->data['id']);
			$question = $this->Questions->newEntity();
		}else{
			
			$question = $this->Questions->get($this->request->data['id'], [
				'contain' => []
			]);	
		}

        if ($this->request->is('post')) {
			
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($res = $this->Questions->save($question)) {
               echo $res->id;
            } else {
				echo '!ok';
            }
        }
		exit;
    }
	/* option add and update AJAX */
	public function setOption(){
		
		
		if(empty( $this->request->data['id'])){
			unset($this->request->data['id']);
			$options = $this->Questions->Options->newEntity();
		}else{
			
			$options = $this->Questions->Options->get($this->request->data['id'], [
				'contain' => []
			]);	
		}

		if($this->request->data['question_id']==0){
			unset($this->request->data['question_id']);
		}
		
		$this->request->data['is_chargeable'] = $this->request->data['is_chargeable']=='true'?1:0;
		
        if ($this->request->is('post')) {
            $options = $this->Questions->Options->patchEntity($options, $this->request->data);
            if ($res = $this->Questions->Options->save($options)) {
               echo $res->id;
            } else {
               echo '!ok';
            }
        }
		exit;
    }

	/* set data in edit question form */
	public function setOptionQuestion(){
		
		if($this->request->data['option_id']==0){
			
			unset($this->request->data['option_id']);
		}

		$optionquestions = $this->Questions->OptionQuestions->newEntity();
		if($this->request->is('post')){
			
			$option_questions = $this->Questions->OptionQuestions->patchEntity($optionquestions, $this->request->data);
			if ($res = $this->Questions->OptionQuestions->save($option_questions)) {
               echo $res->id;
            } else {
                echo '!ok';
            }
		}
		exit;
	}	
	
	/* Icon image upload with AJAX */
	public function uploadImage(){
		
		$file = $this->request->data['icon']; 
		$name = time().$file['name'];
		move_uploaded_file($file['tmp_name'], UPLOAD_IMAGE . $name);
		echo $name;
		exit;
		
	}
	
	/* update service  */
	public function saveService($id = null){
		$this->Questions->Services->updateAll(['active'=>1],['id'=>$id]);
		exit;
	}
	/* Remove connection */
	public function removeConnection($qid, $oid){
		
		$this->Questions->OptionQuestions->deleteAll(['option_id'=>$oid, 'question_id'=>$qid], false);
		
		$question = $this->Questions->get($qid);
        $this->Questions->delete($question) ;
		exit;
	}
	
	/* Remove option */
	public function removeOption($id){
		
		$option = $this->Questions->Options->get($id);
        $this->Questions->Options->delete($option) ;
		
		exit;
	}
}
