<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Add Projects
			<span class="tools pull-right">
				<a class="fa fa-chevron-down" href="javascript:;"></a>
				<a class="fa fa-cog" href="javascript:;"></a>
				<a class="fa fa-times" href="javascript:;"></a>
			 </span>
		</header>
		<div class="panel-body">
			<?php echo $this->Form->create($project,['role'=>"form",'class'=>"form-horizontal "]); ?>
			<div class="form-group ">
				<label class="col-lg-3 control-label">User Id</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('user_id',['options' => $users,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Service Id</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('service_id',['options' => $services,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Hire Id</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('hire_id',['options' => $hires, 'empty' => true,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Name</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('name',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Information</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('info',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">URL</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('url',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Screen Shot</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('screenshot',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Active</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('active',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
   
			<div class="form-group">
				<div class="col-lg-offset-3 col-lg-6">
					<?php echo $this->Form->button('Submit',['label'=>false, 'class'=>"btn btn-primary", 'type'=>"submit"]) ?>
				</div>
			</div>
			<?php echo $this->Form->end() ?>
		</div>
	</section>						
</div>
