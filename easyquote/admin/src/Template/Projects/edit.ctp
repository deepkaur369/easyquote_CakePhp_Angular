<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PATH; ?>css/capcha/css/croppic.css" />

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

<script>

function remove(){
	var data='<div class="fileupload fileupload-new" data-provides="fileupload"><div id="profilepic" class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img  src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /></div><div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div><div><span class="btn btn-white btn-file"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span><input type="file" name="logo" class="default" id="UserImage"></span><a href="javascript:remove()" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a></div></div>';
	$('#NewImage').html(data);
}

function getImage(){
	var src =	$('#croppic11').prop('class');
	var path = src.split(" ");
	
	$('#immmg').val(path[1]);
	//alert('testt');
}
</script>

<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Edit Projects
			
		</header>
		<div class="panel-body">
			<?php echo $this->Form->create($project,['role'=>"form",'class'=>"form-horizontal "]); ?>
			<?php   echo $this->Form->input('id',['type'=>"hidden"]);	?>
			<?php echo $this->Form->input('user_id',['value' => $this->request->session()->read('id'),'label'=>false,'class'=>"form-control",'placeholder'=>"",'type'=>"hidden"]); ?>
			<!--<div class="form-group ">
				<label class="col-lg-3 control-label">User Id</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-user"></i></span>
						<?php echo $this->Form->input('user_id',['options' => $users,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>-->
			<div class="form-group ">
				<label class="col-lg-3 control-label">Service Name<sup>*</sup></label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-th"></i></span>
						<?php echo $this->Form->input('service_id',['options' => $services,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<!--<div class="form-group ">
				<label class="col-lg-3 control-label">Hire Id</label>
				<div class="col-lg-6">
					 <?php echo $this->Form->input('hire_id',['options' => $hires, 'empty' => true,'label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
				</div>
			</div>-->
			<div class="form-group ">
				<label class="col-lg-3 control-label">Name<sup>*</sup></label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-male"></i></span>
						<?php echo $this->Form->input('name',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">Information</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-info"></i></span>
						<?php echo $this->Form->input('info',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label class="col-lg-3 control-label">URL<sup>*</sup></label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<span class="input-group-addon btn-success"><i class="fa fa-unlink"></i></span>
						<?php echo $this->Form->input('url',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
					</div>
				</div>
			</div>
			<!--<div class="form-group ">
				<label class="col-lg-3 control-label">Screen Shot</label>
				<div class="col-lg-6">
					<div class="input-group m-bot15">
						<?php echo $this->Form->input('screenshot',['label'=>false,'type' => 'file']); ?>
					</div>	
				</div>
			</div>-->
			
			
			<input type="hidden" id="immmg" name="screenshot" value="<?php echo $project->screenshot;?>"/>
					
			<div class="form-group">
				<label class="col-sm-3 control-label">Screen Shot<sup>*</sup></label>
			
				
				<div  class="col-lg-6 cropHeaderWrapper">
					<div id="croppic">
					<img src="<?php echo BASE_PATH."webroot/".$project->screenshot;?>" alt="client" id="ImageShow">
					</div>
					<span class="fileupload-new btn btn-white" id="cropContainerHeaderButton">Select image</span>
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
					<?php echo $this->Form->button('Submit',['label'=>false, 'class'=>"btn btn-primary", 'onclick'=>"getImage()",  'type'=>"submit"]) ?>
				</div>
			</div>
			<?php echo $this->Form->end() ?>
		</div>
	</section>						
</div>


<script src="<?php echo ADMIN_PATH; ?>js/croppic_jquery.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>js/croppic.js"></script>

    <script>
		var croppicHeaderOptions = {
				uploadUrl:'<?php echo BASE_PATH ?>projects/save_image',
				
				cropData:{
					"dummyData":1,
					"dummyData2":"asdas"
				},
				cropUrl:'<?php echo BASE_PATH ?>projects/image_crop',
				customUploadButtonId:'cropContainerHeaderButton',
				modal:false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') }
		}	
		var croppic = new Croppic('croppic', croppicHeaderOptions);
				
		var croppicContainerModalOptions = {
				uploadUrl:'<?php echo BASE_PATH ?>projects/save_image',
				cropUrl:'<?php echo BASE_PATH ?>projects/image_crop',
				modal:true,
				imgEyecandyOpacity:0.4,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
		}
		var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);
		
		
		var croppicContaineroutputOptions = {
				uploadUrl:'<?php echo BASE_PATH ?>projects/save_image',
				cropUrl:'<?php echo BASE_PATH ?>projects/image_crop', 
				outputUrlId:'cropOutput',
				modal:false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
		}
		var cropContaineroutput = new Croppic('cropContaineroutput', croppicContaineroutputOptions);
		
		var croppicContainerEyecandyOptions = {
				uploadUrl:'<?php echo BASE_PATH ?>projects/save_image',
				cropUrl:'<?php echo BASE_PATH ?>projects/image_crop',
				imgEyecandy:false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
		}
		var cropContainerEyecandy = new Croppic('cropContainerEyecandy', croppicContainerEyecandyOptions);
		
	</script>