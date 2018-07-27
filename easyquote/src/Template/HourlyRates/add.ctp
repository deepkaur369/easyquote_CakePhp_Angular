<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Add Hourly Rates
			<span class="tools pull-right">
				<a class="fa fa-chevron-down" href="javascript:;"></a>
				<a class="fa fa-cog" href="javascript:;"></a>
				<a class="fa fa-times" href="javascript:;"></a>
			 </span>
		</header>
		<div class="panel-body">
			<?php echo $this->Form->create($hourlyRate,['role'=>"form",'class'=>"form-horizontal "]); ?>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Users Id</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('user_id',['options' => $users,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Services Id</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('service_id',['options' => $services,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Rate</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('rate',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
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
