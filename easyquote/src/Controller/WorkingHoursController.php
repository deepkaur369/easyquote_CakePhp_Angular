<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Controller\Component\CookieComponent;
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
    public function index()
    {
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
        $options = $this->WorkingHours->Options->find('list', ['limit' => 200]);
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
        $options = $this->WorkingHours->Options->find('list', ['limit' => 200]);
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workingHour = $this->WorkingHours->get($id);
        if ($this->WorkingHours->delete($workingHour)) {
            $this->Flash->success('The working hour has been deleted.');
        } else {
            $this->Flash->error('The working hour could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function hourcalculation(){
		
		$this->loadModel('Options');
		$s_id= $_COOKIE['step1'];
		$serv = explode("_", $s_id);
		$servid = $serv[1];
		$select['serviceid']=$serv[1];
		$opts=array();
		for($i=2; $i < $_COOKIE['index']; $i++){
		
			$req=$_COOKIE['step'.$i];
			$select['step'.$i]=$_COOKIE['step'.$i];
			//echo $_COOKIE['step'.$i];
			$pieces = explode("_", $req);
			$opt_id[] = $pieces[1];	
			$ques_id[] = $pieces[0];
			
			/*for calculation of option comment start*/
			$forcomment=$pieces[1];
			
			//$optcmnts=$this->Options->find('first')->where(['Options.id' =>$forcomment]);
			if($forcomment!=0){
				$optcmnts=$this->Options->get($forcomment);
				if($optcmnts['comment']!=0 && $optcmnts['comment']!="" && $optcmnts['comment']!="NULL"){
					$opts[$forcomment]=$optcmnts['comment'];
				}
			}
			/*for calculation of option comment end*/
		}

		$this->loadModel('Selections');
		$selection = $this->Selections->newEntity();
		$serial=serialize($select);
		$this->request->data['selections']=$serial;
		$this->request->data['is_complete']=1;
		
		$this->request->data['customer_id']=1;
        $selection = $this->Selections->patchEntity($selection, $this->request->data);
		$this->Selections->save($selection);
			
		
		$total_hrs = $this->WorkingHours->find()->where(['WorkingHours.service_id' =>$servid , 'WorkingHours.option_id IN' => $opt_id]);
		$u_id=0;
		$add_hrs=0;
		$arr=array();
		$t=array();
		foreach($total_hrs as $total_hr){
		$t[]=$total_hr;
		}
		//print_r($t);exit;
		if(empty($t)){
			//print_r($t);exit;
			echo "null";exit;
			
		}else{
		
			$j=count($t);
			//print_r($j);
			foreach($total_hrs as $total_hr){
				
				if($j < 2){
				
					if(!empty($opts)){
						$multi_cmmnt=0;
						foreach($opts as $key=>$opttss){	 
							if($key == $total_hr['option_id']){
								$multi_cmmnt=$opttss*$total_hr['hours'];
							} 
						}
						if(!empty($multi_cmmnt)){
							$u_id = $total_hr['user_id'];
							$add_hrs=$multi_cmmnt+$add_hrs;
							$arr[$u_id]=$add_hrs;
						}else{
						 
							$u_id = $total_hr['user_id'];
							$add_hrs=$total_hr['hours'];
							$arr[$u_id]=$add_hrs;
						}
					}else{
				
					$u_id = $total_hr['user_id'];
					$add_hrs=$total_hr['hours'];
					$arr[$u_id]=$add_hrs;
					}
				}else{
				
					if($u_id==$total_hr['user_id']){
					
						/*for calculating the total hrs by multipling comment and totalhrs  starts */
						if(!empty($opts)){
							$multi_cmmnt=0;
							foreach($opts as $key=>$opttss){	 
								if($key == $total_hr['option_id']){
									$multi_cmmnt=$opttss*$total_hr['hours'];
								} 
							}
							if(!empty($multi_cmmnt)){
							
								$add_hrs=$multi_cmmnt+$add_hrs;
								$arr[$u_id]=$add_hrs;
							}else{
							 
							$add_hrs=$total_hr['hours']+$add_hrs;
							$arr[$u_id]=$add_hrs;
							}
							//echo $multi_cmmnt.'/t';
							///*************/////////
						}else{
			
							
								 
								$add_hrs=$total_hr['hours']+$add_hrs;
								$arr[$u_id]=$add_hrs;
									
							
							
							
						}
						
						/********//////
						
						
					}else{	

						if(!empty($opts)){
							$multi_cmmnt=0;
							foreach($opts as $key=>$opttss){	 
								if($key == $total_hr['option_id']){
									$multi_cmmnt=$opttss*$total_hr['hours'];
								} 
							}
							if(!empty($multi_cmmnt)){
								$u_id = $total_hr['user_id'];
								$add_hrs=$multi_cmmnt+$add_hrs;
								$arr[$u_id]=$add_hrs;
							}else{
							 
								$u_id = $total_hr['user_id'];
								$add_hrs=$total_hr['hours'];
							}
							//echo $multi_cmmnt.'/t';
							/////******************/////
						}else{
							$u_id = $total_hr['user_id'];
							$add_hrs=$total_hr['hours'];
						
						}
					/////******************//////
						/*$u_id = $total_hr['user_id'];
						$add_hrs=$total_hr['hours'];*/
					}
					
				}
				
				 //echo $add_hrs;echo '/n';
			}
			//print_r($arr);
			//exit;
			
			$this->loadModel('HourlyRates');
			$i=0;$total=array();
			
			foreach($arr as $key=>$total_hr){
				//$uid=$total_hr['user_id'];
				
				$hrsrates = $this->HourlyRates->find()->where(['HourlyRates.user_id' =>$key , 'HourlyRates.service_id' => $servid]);
				//echo "<pre>"; print_r($hrsrates);echo "</pre>";exit;
				//$hrsrt=0;
				foreach($hrsrates as $hrsrate){
					$hrsrt=$hrsrate['rate'];
					
				}
				
				if(empty($hrsrt)){
					echo "null";exit;
				
				}
				$total[$i]=$total_hr*$hrsrt;
				
				$i++;
				
			}
			
			if(empty($total)){
			
				echo "null";exit;
			}else{			
				echo json_encode($total);exit;
			}
		}
		
	}


}
