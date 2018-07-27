<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_PATH; ?>css/capcha/css/croppic.css" />

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
	.fa-phone:before {
	  content: "\f095";
	}
	.fa-info:before {
	  content: "\f129";
	}
	.fa-male:before {
	  content: "\f183";
	}
</style>

<script>
function remove(){
	var data='<div class="fileupload fileupload-new" data-provides="fileupload"><div id="profilepic" class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img  src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /></div><div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div><div><span class="btn btn-white btn-file"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span><input type="file" name="logo" class="default" id="UserImage"></span><a href="javascript:remove()" class="btn btn-danger fileupload-exists"><i class="fa fa-trash"></i> Remove</a></div></div>';
	$('#NewImage').html(data);
}

function getImage(){
	var src =	$('#croppic11').prop('class');
	var path = src.split(" ");
	
	$('#immmg').val(path[1]);
}

<!-- not accept the first space in input field  -->
$(document).ready(function () {
$("input").on("keypress", function(e) {
    var startPos = e.currentTarget.selectionStart;
    if (e.which === 32 && startPos==0)
        e.preventDefault();
});
})

</script>

<?php  
	$empt=$this->request->session()->read('type')=="";
?>

<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
		<?php if($empt){ ?>
			New Registration
		<?php }else{ ?>
			Add Users
		<?php } ?>
			
		</header>
		<div class="panel-body">
			<?php echo $this->Form->create($user,['role'=>"form",'class'=>"form-horizontal ",'type' => 'file']); ?>
				<div class="form-group ">
					<label class="col-lg-3 control-label">Name</label>
					<div class="col-lg-6">
						<div class="input-group m-bot15">
							<span class="input-group-addon btn-success"><i class="fa fa-user"></i></span>
							<?php echo $this->Form->input('name',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<label class="col-lg-3 control-label">Username</label>
					<div class="col-lg-6">
						<div class="input-group m-bot15">
							<span class="input-group-addon btn-success">@</span>
							<?php echo $this->Form->input('username',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<label class="col-lg-3 control-label">Password</label>
					<div class="col-lg-6">
						<div class="input-group m-bot15">
							<span class="input-group-addon btn-success"><i class="fa fa-key"></i></span>
							<?php echo $this->Form->input('password',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<label class="col-lg-3 control-label">Company</label>
					<div class="col-lg-6">
						<div class="input-group m-bot15">
							<span class="input-group-addon btn-success"><i class="fa fa-group"></i></span>
							<?php echo $this->Form->input('company',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
						</div>
					</div>
				</div>
				<!--<div class="form-group ">
					<label class="col-lg-3 control-label">Logo</label>
					<div class="col-lg-6">
						 <?php echo $this->Form->input('logo',['label'=>false,'type' => 'file']); ?>
					</div>
				</div>-->
				
				<input type="hidden" id="immmg" name="logo"/>
				<div class="form-group">
					<label class="col-lg-3 control-label">Image</label>
											
					<div  class="col-lg-6 cropHeaderWrapper">
						<div id="croppic" style="margin-left:0px;"></div>
						<span class="fileupload-new btn btn-white" id="cropContainerHeaderButton">Select image</span>
					</div>
				</div>
				
				
				<div class="form-group ">
					<label class="col-lg-3 control-label">Website</label>
					<div class="col-lg-6">
						<div class="input-group m-bot15">
							<span class="input-group-addon btn-success"><i class="fa fa-unlink"></i></span>
							<?php echo $this->Form->input('website',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<label class="col-lg-3 control-label">Address</label>
					<div class="col-lg-6">
						<div class="input-group m-bot15">
							<span class="input-group-addon btn-success"><i class="fa fa-map-marker"></i></span>
							<?php echo $this->Form->input('address',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<label class="col-lg-3 control-label">Phone</label>
					<div class="col-lg-6">
						<div class="input-group m-bot15">
							<span class="input-group-addon btn-success"><i class="fa fa-phone"></i></span>
							<?php echo $this->Form->input('phone',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
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
					<label class="col-lg-3 control-label">Type</label>
					<div class="col-lg-6">
						<div class="input-group m-bot15">
							<span class="input-group-addon btn-success"><i class="fa fa-male"></i></span>
							<?php echo $this->Form->input('type',['label'=>false,'class'=>"form-control",'placeholder'=>""]); ?>
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
						<?php echo $this->Form->button('Submit',['label'=>false, 'class'=>"btn btn-primary",'onclick'=>"getImage()", 'type'=>"submit"]) ?>
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
				uploadUrl:'<?php echo BASE_PATH ?>users/save_image',
				
				cropData:{
					"dummyData":1,
					"dummyData2":"asdas"
				},
				cropUrl:'<?php echo BASE_PATH ?>users/image_crop',
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
				uploadUrl:'<?php echo BASE_PATH ?>users/save_image',
				cropUrl:'<?php echo BASE_PATH ?>users/image_crop',
				modal:true,
				imgEyecandyOpacity:0.4,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
		}
		var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);
		
		
		var croppicContaineroutputOptions = {
				uploadUrl:'<?php echo BASE_PATH ?>users/save_image',
				cropUrl:'<?php echo BASE_PATH ?>users/image_crop', 
				outputUrlId:'cropOutput',
				modal:false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
		}
		var cropContaineroutput = new Croppic('cropContaineroutput', croppicContaineroutputOptions);
		
		var croppicContainerEyecandyOptions = {
				uploadUrl:'<?php echo BASE_PATH ?>users/save_image',
				cropUrl:'<?php echo BASE_PATH ?>users/image_crop',
				imgEyecandy:false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
		}
		var cropContainerEyecandy = new Croppic('cropContainerEyecandy', croppicContainerEyecandyOptions);
		
</script>