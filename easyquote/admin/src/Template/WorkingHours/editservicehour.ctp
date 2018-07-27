
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Edit Hours
		</header>
		<div class="panel-body">
		
		<?php foreach ($workinghours as $workinghour){ 
		$optsid[$workinghour->option_id]=$workinghour->option_id;
		$wrkhrs[$workinghour->option_id]=$workinghour->id;
		$wrkhours[$workinghour->option_id]=$workinghour->hours;//echo "<pre>";print_r($optsid);print_r($wrkhours);echo "</pre>";
		}?>
		
			<?php echo $this->Form->create('WorkingHour',array('class'=>'form-horizontal bucket-form','id'=>'saveForm')); ?>
			
				<?php  foreach ($question as $questions){?>
				
				
				
				<div class="form-group">
				
					<label class="col-sm-3 control-label col-lg-3" ><?php echo h($questions->question);?></label>
					<div class="col-lg-8">
					
						<?php  $quessize=sizeof($questions->options); for($j=0; $j < $quessize; $j++){
					

						
						?>
						<?php if( h($questions->options[$j]->is_chargeable) == 1){?>
						
							<!--<li>
								<?php echo $questions->options[$j]->name;?>
							</li>-->
							<?php if($optsid[$questions->options[$j]->id]==$questions->options[$j]->id){ ?>
							
							<input type="hidden" value="<?php echo $wrkhrs[$questions->options[$j]->id];?>" name="data[WorkingHour][id][id<?php echo $questions->options[$j]->id;?>]" />
							<input type="hidden" class="form-control" value="<?php echo $questions->options[$j]->id;?>" name="data[WorkingHour][option_id][option_id<?php echo $questions->options[$j]->id;?>]" />
							
							<div class="col-lg-4">
							<?php echo $questions->options[$j]->name;?>
								<input type="text" class="form-control" value="<?php echo $wrkhours[$questions->options[$j]->id]; ?>" name="data[WorkingHour][hours][working_hours<?php echo $questions->options[$j]->id;?>]" placeholder="<?php echo $questions->options[$j]->name;?>"/>
							</div>
							
						<?php } } } ?>
					</div>
				</div>
				<?php  }?></br>
			<div class="col-lg-offset-2 col-lg-10">
				<?php echo $this->Form->input('Submit',array('label'=>false,'class'=>"btn btn-danger",'type'=>'submit')); ?>
			</div>
		</div>

		
	</section>
</div>






