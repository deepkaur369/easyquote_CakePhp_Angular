
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Add Hours
		</header>
		<div class="panel-body">
		
			<?php  foreach ($question as $questions){  $quests=$questions->options; } if(empty($quests)){?>
		
				<h2>No Data Found</h2>
			<?php }else{ ?>
		
			<?php echo $this->Form->create('WorkingHour',array('class'=>'form-horizontal bucket-form','id'=>'saveForm')); ?>
			<?php $i=0; $ques_name="";?>
				<?php  foreach ($question as $questions){ //echo "<pre>";print_r($questions);echo "</pre>";?>
				
				
				
				<div class="form-group">
				
				<label class="col-sm-3 control-label col-lg-3" ><?php echo h($questions->question);?></label>
				<div class="col-lg-8">
				<?php  $quessize=sizeof($questions->options); for($j=0; $j < $quessize; $j++){
				//echo $questions->options[$j]->name;

				
				?>
				<?php if( h($questions->options[$j]->is_chargeable) == 1){?>
				
					<!--<li>
						<?php echo $questions->options[$j]->name;?>
					</li>-->
					
					<input type="hidden" class="form-control" value="<?php echo $questions->options[$j]->id;?>" name="data[WorkingHour][option_id][option_id<?php echo $questions->options[$j]->id;?>]" />
					
					<div class="col-lg-4">
					<?php echo $questions->options[$j]->name;?>
					<input type="text" class="form-control" value="" name="data[WorkingHour][hours][working_hours<?php echo $questions->options[$j]->id;?>]" placeholder="<?php echo $questions->options[$j]->name;?>"/>
					</div>
				<?php } }  ?></div></div><?php $i++; }?></br>
			<div class="col-lg-offset-2 col-lg-10">
				<?php echo $this->Form->input('Submit',array('label'=>false,'class'=>"btn btn-danger",'type'=>'submit')); ?>
			</div>
			<?php } ?>
		</div>

		
	</section>
</div>






<!--<div class="form-group">
				<?php //$ques="0"; $i="0";?>
				
				<?php // foreach ($option as $options){  print_r($options);?>
				
				<?php// if(h($options->question->id)==$ques){?>
				<?php //$ques=h($options->question_id);?>
				
					
					<!--<?php //echo h($options->name);?>-->
					
					<!--<input type="hidden" class="form-control" value="<?php //echo h($options->id);?>" name="data[WorkingHour][option_id][option_id<?php //echo $i;?>]" />
					<input type="text" value="" class="form-control" name="data[WorkingHour][hours][working_hours<?php //echo $i;?>]" placeholder="<?php //echo h($options->name);?>"/>
					
				
				<?php //$i++;?>
				<?php //}else{ ?>
				</br>
				<div class="col-lg-6">
				<?php //$ques=h($options->question_id);?>
				<label class="col-sm-3 control-label col-lg-3" ><?php //echo h($options->question->question);?></label>
				
				<div class="input-group m-bot15">
					<!--<li>
					<?php //echo h($options->name);?>
					</li>-->
					<!--<input type="hidden" class="form-control" value="<?php //echo h($options->id);?>" name="data[WorkingHour][option_id][option_id<?php //echo $i;?>]" />
					<input type="text" class="form-control" value="" name="data[WorkingHour][hours][working_hours<?php //echo $i;?>]" placeholder="<?php //echo h($options->name);?>"/>
					
				</div>
				<?php //$i++;?>
				</div>
				<?php //}?><?php //} ?>
				<hr>
				</div>-->