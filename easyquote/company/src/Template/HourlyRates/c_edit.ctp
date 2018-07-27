<style>
	.fa-dollar:before,
	.fa-usd:before {
	  content: "\f155";
	}
	.fa-th-large:before {
	  content: "\f009";
	}
	.fa-group:before,
	.fa-users:before {
	  content: "\f0c0";
	}
</style>

<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Edit Hourly Rates
			
		</header>
		<div class="panel-body">
			<?php echo $this->Form->create($hourlyRate,['role'=>"form",'class'=>"form-horizontal "]); ?>
			<?php   echo $this->Form->input('id',['type'=>"hidden"]);	?>
			<!--<div class="form-group ">
				<label class="col-lg-3 control-label">Users Id</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-user"></i></span>
						<?php echo $this->Form->input('user_id',['options' => $users,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>-->
			<div class="form-group ">
				<label class="col-lg-3 control-label">Services Name</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-th"></i></span>
						<?php echo $this->Form->input('service_id',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Rate</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-dollar"></i></span>
						<?php echo $this->Form->input('rate',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
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
