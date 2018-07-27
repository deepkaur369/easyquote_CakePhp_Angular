<style>
	.fa-at:before {
	  content: "\f1fa";
	}
	.fa-key:before {
		content: "\f084";
	}
	.fa-group:before,
	.fa-users:before {
	  content: "\f0c0";
	}
	.fa-unlink:before,
	.fa-chain-broken:before {
	  content: "\f127";
	}
	.fa-map-marker:before {
	  content: "\f041";
	}
	.fa-navicon:before,
	.fa-reorder:before,
	.fa-bars:before {
	  content: "\f0c9";
	}
</style>

<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Edit Customers
			
		</header>
		<div class="panel-body">
			<?php echo $this->Form->create($customer,['role'=>"form",'class'=>"form-horizontal "]); ?>
			<?php   echo $this->Form->input('id',['type'=>"hidden"]);	?>
			<div class="form-group ">
				<label class="col-lg-2 control-label">Name</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-user"></i></span>
						<?php echo $this->Form->input('name',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-2 control-label">Email</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success">@</span>
						<?php echo $this->Form->input('email',['label'=>false,'class'=>"form-control",'type'=>"email",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-2 control-label">Password</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-key"></i></span>
						<?php echo $this->Form->input('password',['label'=>false,'class'=>"form-control",'type'=>"password",'placeholder'=>"Enter New password if you want to change it.",'autocomplete'=>'off','value'=>'']); ?>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-2 control-label">Company</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-group"></i></span>
						<?php echo $this->Form->input('company',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-2 control-label">Website</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-unlink"></i></span>
						<?php echo $this->Form->input('website',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-2 control-label">Address</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-map-marker"></i></span>
						<?php echo $this->Form->input('address',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-2 control-label">IP</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-navicon"></i></span>
						<?php echo $this->Form->input('ip',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
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
