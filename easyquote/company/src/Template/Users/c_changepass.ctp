<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<div class="panel-body">
				
				<?php echo $this->Form->create('User',array('class'=>'form-horizontal bucket-form','type'=>'file')); ?>
				
					<div class="form-group">
						<label class="col-sm-3 control-label">Old Password</label>
						<div class="col-sm-6">
							<div class="input-group ">
								<span class="input-group-addon btn-white"><i class="fa fa-key" style="padding:0px "></i></span>
							<?php echo $this->Form->input('oldpassword',array('label'=>false,'div'=>false,'class'=>'form-control input-sm m-bot15','required'=>true,'placeholder' => 'Old Password','autocomplete'=>"off" ,'type'=>'password')); ?>
							<div id='p' style='display:none;font-size:11px;color:red;'>This username is already taken. Please Choose Another!</div> 
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">New Password</label>
						<div class="col-sm-6">
						<div class="input-group ">
								<span class="input-group-addon btn-white"><i class="fa fa-key" style="padding:0px "></i></span>
							<?php echo $this->Form->input('password',array('label'=>false,'div'=>false,'class'=>'form-control input-sm m-bot15','required'=>true,'placeholder' => 'New Password','autocomplete'=>"off",'type'=>'password')); ?>
							<div id='p' style='display:none;font-size:11px;color:red;'>This username is already taken. Please Choose Another!</div> 
						</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Confirm Password</label>
						<div class="col-sm-6">
						<div class="input-group m-bot15">
								<span class="input-group-addon btn-white"><i class="fa fa-key" style="padding:0px "></i></span>
							<?php echo $this->Form->input('cpassword',array('label'=>false,'div'=>false,'class'=>'form-control input-sm m-bot15','required'=>true,'placeholder' => 'Confirm Password','autocomplete'=>"off",'type'=>'password')); ?>
							<div id='p' style='display:none;font-size:11px;color:red;'>This username is already taken. Please Choose Another!</div> 
						</div>
						</div>
					</div>
					
					<div class="col-lg-offset-2 col-lg-10">
						<input type="submit" Value="Save" id ="UserSave" onclick ="checkemail()" class="btn btn-danger">
					</div>
					
				</form>
			</div>
		</section>
	</div>
</div>