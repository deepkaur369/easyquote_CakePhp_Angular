<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

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
		
		
		
        /*$this->paginate = [
            'contain' => ['Services']
        ];*/
		
		$this->loadModel('WorkingHours');
		$workingHour = $this->WorkingHours->find('all')->where(['WorkingHours.user_id' =>$this->request->session()->read('id')])->distinct(['service_id']);
		if($workingHour){
			
			//echo "not";
			$this->paginate = [
            'contain' => ['Services']
			];
			$this->set('questions', $this->paginate($this->Questions));
			$this->set('_serialize', ['questions']);
			
			
			$this->set('workingHours', $workingHour);
			$this->set('_serialize', ['workingHours']);
		}else{
			
			
			
			$this->paginate = [
            'contain' => ['Services']
			];
			$this->set('questions', $this->paginate($this->Questions));
			$this->set('_serialize', ['questions']);
		}
		
        /*$this->set('questions', $this->paginate($this->Questions));
        $this->set('_serialize', ['questions']);*/
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

		$data = ['id'=>$question->id,'service_id'=>$question->service_id,'question'=>$question->question,'is_multiple_choice'=>$question->is_multiple_choice,'style'=>$question->style];
		print_r(json_encode($data));
		exit;	
    }
	
	/* get data for edit options form */
	public function getOptionData($id = null)
    {
         $options = $this->Questions->Options->get($id, [
            'contain' => []
        ]);

		$data = ['id'=>$options->id,'question_id'=>$options->question_id,'name'=>$options->name,'icon'=>$options->icon,'image'=>$options->image,'is_chargeable'=>$options->is_chargeable,'is_comment'=>$options->is_comment,'style'=>$options->style];
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
	
	
	/* Flow canvas */
	public function flow(){
		
		$this->layout = 'flowlayout';
		$this->loadModel('Categories');
		
		$categories = $this->Categories->find('list');
        $this->set(compact('categories'));
		
    }
	
	/* Flow canvas */
	public function update($id=null){

		$this->layout = 'flow_layout';
		$this->loadModel('Categories');
		$this->loadModel('Services');

		$categories = $this->Categories->find('list');
        $this->set(compact('categories'));
		$questions = $this->Questions->find()->where(['Questions.service_id'=>$id])->contain(['Options','Relations']);
		$services = $this->Services->find()->where(['Services.id'=>$id])->contain(['Categories']);		

		$this->set(compact('services'));

		$temp = [];
		$options = [];
		$tempQ = [];
		$tempO = [];

		foreach($questions as $question){

			$relations = [];
			/* Build relations data for dynamic js binding */
			$temp[] = $question->relations;	
			foreach($temp as $tmp){
				foreach($tmp as $v){
					
					$tmp = array('option'=>$v->option_id,'question'=>$v->question_id,'source'=>$v->option_div,'target'=>$v->question_div);	
			
					$relations[] = $tmp;
					$tempQ[] = $v->question_div;
					$tempO[] = $v->option_div;
				
				}
				
			}	
		//print_r($relations);exit;
			/* Build option data for dynamic js binding */
			foreach($question->options as $v){
			
				$options[] = array('option'=>$v->id,'question'=>$v->question_id,'target'=>$v->option_div,'source'=>$v->question_div);
			}
		}

		$this->set('options');
	
		$optn_ecpt = [];
		foreach($options as $v){
			
			$optn_ecpt[] = $v['source']; 
			$optn_ecpt[]	= $v['target'];		
			
		}
		$optn_ecpt = array_unique($optn_ecpt);
		
		$rltn_ecpt = [];
		//$relations = [];
		foreach($relations as $v){
			$rltn_ecpt[] = $v['source']; 
			$rltn_ecpt[]	= $v['target'];		
			
		}
		$rltn_ecpt = array_unique($rltn_ecpt);

		$this->set(compact('questions','relations','options','rltn_ecpt','optn_ecpt'));
		//print_r($rltn_ecpt);print_r($optn_ecpt);exit;
    }
	
	
	/* add and update question form */
	public function setQuestion(){

        $articles = TableRegistry::get('questions');
		$query = $articles->find()->where(['service_id' => $this->request->data['service_id'] ]);
        $checkIsfirst =[];
        $this->request->data['is_first']=1;
		foreach ($query as $row) {
		     $checkIsfirst[] = $row;
		}
		if(count($checkIsfirst)>0){
			$this->request->data['is_first']=0;
		}
		$this->request->data['is_multiple_choice'] = 0;
		if($this->request->data['is_multiple_choice'] == 'true'){
			$this->request->data['is_multiple_choice'] = 1;
		}

		if(empty( $this->request->data['id'])){
			unset($this->request->data['id']);
			$question = $this->Questions->newEntity();
		}else{
			
			$question = $this->Questions->get($this->request->data['id'], [
				'contain' => []
			]);	
		}

        if ($this->request->is('post')) {

            $articlesTable = TableRegistry::get('questions')->find()->where(['service_id' => $this->request->data['service_id'] ]);
            $questions = $this->Questions->patchEntity($question, $this->request->data);
            
            if ($res = $this->Questions->save($questions)) {
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
			
		$temp = trim($this->request->data['option_id'],',');
		$ids = array_unique(explode(',',$temp));
		
		
		$odiv = trim($this->request->data['odiv'],',');
		$odiv = (explode(',',$odiv));
		
		
		$qdiv = trim($this->request->data['qdiv'],',');
		
		$qdiv = (explode(',',$qdiv));
		
		unset($this->request->data['odiv']);
		unset($this->request->data['qdiv']);
		
		$i = 0;
		foreach($ids as $v){
			//print_r($ids);
			$this->request->data['option_id'] = $v;
			$this->request->data['option_div'] = $odiv[$i];
			$this->request->data['question_div'] = $qdiv[$i];

			if($this->request->data['option_id']==0){
				unset($this->request->data['option_id']);

				/* Update question table as first question of service */
				$question = $this->Questions->get($this->request->data['question_id'], [ 'contain' => [] ]);	
				$question = $this->Questions->patchEntity($question, ['is_first'=>1]);
				$this->Questions->save($question);
			}

			$relations = $this->Questions->Relations->newEntity();
			if($this->request->is('post')){
				
				$option_questions = $this->Questions->Relations->patchEntity($relations, $this->request->data);
				$this->Questions->Relations->save($option_questions);
			}
			$i++;
		}	
		exit;
	}	
	
	/* set data in edit question form */
	public function setSingleOptions(){

		if($this->request->data['option_id']==0){

			unset($this->request->data['option_id']);

			/* Update question table as first question of service */
			$question = $this->Questions->get($this->request->data['question_id'], [ 'contain' => [] ]);	
			$question = $this->Questions->patchEntity($question, ['is_first'=>1]);
			$this->Questions->save($question);
		}

		$relations = $this->Questions->Relations->newEntity();
		if($this->request->is('post')){
			
			$option_questions = $this->Questions->Relations->patchEntity($relations, $this->request->data);
			$this->Questions->Relations->save($option_questions);
		}

		exit;
	}	
	
	
	/* Icon image upload with AJAX */
	public function uploadImage(){
		
		if(!empty($this->request->data['logo']['name'])) {
			
				$file = $this->request->data['logo']; 
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
				$arr_ext = ['jpg', 'jpeg', 'gif']; 

				if(in_array($ext, $arr_ext)) {
					move_uploaded_file($file['tmp_name'], UPLOAD_IMAGE . $file['name']);
					$this->request->data['logo'] = $file['name'];
				}
					
			}
		
		
		$file = $this->request->data['icon']; 
		$name = time().$file['name'];
		
		$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
		$arr_ext = ['jpg', 'jpeg', 'gif']; 
		
		if(in_array($ext, $arr_ext)) {
			move_uploaded_file($file['tmp_name'], UPLOAD_IMAGE . $name);
			echo $name;
			exit;
		}else{
			echo "no";
			exit;
		}
		
	}
	
	/* update service  */
	public function saveService($id = null){
		$this->Questions->Services->updateAll(['active'=>1],['id'=>$id]);
		exit;
	}
	/* Remove connection if target object is Question Object */
	public function removeConnection($qid, $oid){
		
		$this->Questions->Relations->deleteAll(['option_id'=>$oid, 'question_id'=>$qid], false);
		
		$question = $this->Questions->get($qid);
        $this->Questions->delete($question) ;
		
		exit;
	}
	
	/* Remove option if target object is Option Object */
	public function removeOption($id){
		
		$option = $this->Questions->Options->get($id);
        $this->Questions->Options->delete($option) ;
		
		exit;
	}
	
	public function sample(){
		$this->layout = false;	
		
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
				//print_r($optionid);exit;
				//if($this->request->is('post')){
				//$servid=$this->request->data);
				$this->loadModel('Relations');
				$relations = $this->Relations->find()->where(['Relations.option_id' =>$serid ]);
				foreach($relations as $quesopt){
					$dataopt = $quesopt; 
				}
				$que_id=$dataopt['question_id'];
				//print_r($dataopt);exit;
			
				$question = $this->Questions->find()->where(['Questions.id' =>$que_id])->contain(['Options']);
			
				foreach($question as $ques){
					$dat = $ques; 
				}
				echo json_encode($dat);exit;
				exit;
				//}
			}
		}
		
		
    }
	
	public function apiGetQuestions(){

		$id = $_POST['id'];
		try {
		         
            $articlesTable = TableRegistry::get('questions')->find()->where(['service_id' => $id])->where(['is_first' => 1]);
            if($articlesTable->is_multiple_choice=1){
            	$question = TableRegistry::get('questions')->find()->where(['service_id' => $id])->where(['is_first' => 1])->contain(['Options']);
				echo json_encode($question);
				
            }else{
            	 echo json_encode($articlesTable);
            }
            //echo json_encode(['saved']);
            //echo json_encode($articlesTable);
          
        }

        catch (customException $e) {

          echo json_encode(['fail']);
          
        }
        exit;
	}
	

	public function apiGetQuestion(){

		$optID = $_POST['optID'];
		$que_id = $_POST['quesId'];

		try {     
       		
			$this->loadModel('Relations');
			$relations = $this->Relations->find()->where(['Relations.option_id' =>$optID ]);
			$relation = $this->Relations->find()->where(['Relations.option_id' =>$optID ])->count();

				if($relation==0){
					echo json_encode([]);
			}else{
				
					foreach($relations as $quesopt){
					$dataopt = $quesopt; 
				}
				$que_id=$dataopt['question_id'];
				$question = $this->Questions->find()->where(['Questions.id' =>$que_id])->contain(['Options']);
			
				// foreach($question as $ques){
				// 	$dat = $ques; 
				// }
				echo json_encode($question);
			}

        }

        catch (customException $e) {

          echo json_encode(['fail']);
          
        }
        exit;

	}


	public function apigoback($serid= null){

		$this->loadModel('Options');
			$this->loadModel('Services');
			$this->loadModel('Questions');

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
	
	public function checkchild($target=null){
	
		$this->loadModel('Relations');
		$this->loadModel('Options');
		$types=$this->request->data['type'];
		$last_id=$this->request->data['li_id'];
		if($types=="option"){
			$relation = $this->Relations->find()->where(['Relations.option_id' =>$last_id]);
			foreach($relation as $relate){
				$rel_opt=$relate['option_div'];
				
			}
			if(empty($rel_opt)){
				echo "ok";
				exit;
			}else{
				echo "not ok";
				exit;
			}
		}else{
			$option = $this->Options->find()->where(['Options.question_id' =>$last_id]);
			foreach($option as $options){
				$rel_opt=$options['option_div'];
				
			}
			if(empty($rel_opt)){
				echo "ok";
				exit;
			}else{
				echo "not ok";
				exit;
			}
		
		}
	}
	
}

?>