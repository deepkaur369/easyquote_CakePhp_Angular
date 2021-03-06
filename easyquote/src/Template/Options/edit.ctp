<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Add Options
			<span class="tools pull-right">
				<a class="fa fa-chevron-down" href="javascript:;"></a>
				<a class="fa fa-cog" href="javascript:;"></a>
				<a class="fa fa-times" href="javascript:;"></a>
			 </span>
		</header>
		<div class="panel-body">
			<?php echo $this->Form->create($option,['role'=>"form",'class'=>"form-horizontal "]); ?>
			<?php   echo $this->Form->input('id',['type'=>"hidden"]);	?>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Question Id</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('question_id',['options' => $questions,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Name</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('name',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Icon</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('icon',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Is Chargeable</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('is_chargeable',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
				
			<div class="form-group">
				<div class="col-lg-offset-3 col-lg-6">
					<?= $this->Form->button('Submit',['label'=>false, 'class'=>"btn btn-primary", 'type'=>"submit"]) ?>
				</div>
			</div>
			<?php echo $this->Form->end() ?>
		</div>
	</section>						
</div>
			
