
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
