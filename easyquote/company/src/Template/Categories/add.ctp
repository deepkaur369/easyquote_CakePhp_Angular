<style>
	.fa-th-large:before {
	  content: "\f009";
	}
</style>
	
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Add Category
				
			</header>
			<div class="panel-body">
				<?php echo $this->Form->create($category,['role'=>"form",'class'=>"form-horizontal "]); ?>
				<div class="form-group ">
					<label class="col-lg-3 control-label">Name</label>
					<div class="col-lg-6">
						<div class="input-group m-bot15">
							<span class="input-group-addon btn-success"><i class="fa fa-th"></i></span>
							<?php echo $this->Form->input('name',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
						</div>
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
