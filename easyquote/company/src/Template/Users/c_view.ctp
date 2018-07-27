<style>
#edit:hover{
text-decoration:underline;
}
.fa-check:before {
  content: "\f00c";
}
.fa-check-square-o:before {
  content: "\f046";
}
</style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script>
function showprofile(id){
	//alert(id);
	
	document.getElementById('allinone').innerHTML="";
	var allinonehtml='<div class="form-group "><label class="col-lg-2 control-label">Name</label><div class="col-lg-6"><?php echo $this->Form->input('name',['label'=>false,'id'=>"nam1", 'class'=>"form-control",'placeholder'=>"",'value'=>"$user->name"]); ?></div></div></br></br><div class="form-group "><label class="col-lg-2 control-label">Info</label><div class="col-lg-6"><?php echo $this->Form->input('info',['label'=>false,'id'=>"inf1",'class'=>"form-control",'placeholder'=>"",'type'=>"textarea",'value'=>"$user->info"]); ?></div></div></div></br>';
	
	
	
	var img=document.getElementById('allinone').innerHTML=allinonehtml;
	
	document.getElementById('username1').innerHTML="";
	var username1html='<div class="form-group "><div class="col-lg"><?php echo $this->Form->input('username',['label'=>false,'id'=>"uname1",'class'=>"form-control",'placeholder'=>"",'value'=>"$user->username"]); ?></div></div></div></br>';
	var img=document.getElementById('username1').innerHTML=username1html;
	
	document.getElementById('address1').innerHTML="";
	var address1html='<div class="form-group "><div class="col-lg"><?php echo $this->Form->input('address',['label'=>false,'id'=>"add1",'class'=>"form-control",'placeholder'=>"",'value'=>"$user->address"]); ?></div></div></div></br>';
	var img=document.getElementById('address1').innerHTML=address1html;
	
	
	document.getElementById('company1').innerHTML="";
	var company1html='<div class="form-group "><div class="col-lg-6"><?php echo $this->Form->input('company',['label'=>false,'id'=>"compny1",'class'=>"form-control",'placeholder'=>"",'value'=>"$user->company"]); ?></div></div></div></br>';
	var img=document.getElementById('company1').innerHTML=company1html;
	
	document.getElementById('website1').innerHTML="";
	var website1html='<div class="form-group "><div class="col-lg-6"><?php echo $this->Form->input('website',['label'=>false,'id'=>"websit1",'class'=>"form-control",'placeholder'=>"",'value'=>"$user->website"]); ?></div></div></div></br>';
	var img=document.getElementById('website1').innerHTML=website1html;
	
	document.getElementById('phone1').innerHTML="";
	var phone1html='<div class="form-group "><div class="col-lg-6"><?php echo $this->Form->input('phone',['label'=>false,'id'=>"phn1",'class'=>"form-control",'placeholder'=>"",'value'=>"$user->phone"]); ?></div></div></div></br>';
	var img=document.getElementById('phone1').innerHTML=phone1html;
	
	document.getElementById('hide1').innerHTML="";
	var imghtml='<a class="tooltips" data-original-title="ok" data-toggle="tooltip " data-placement="bottom" title="" onclick="return editprofile(<?php echo h($user->id); ?>)" style="cursor:pointer;" ><img id="icon1" src="<?php echo BASE_PATH ?>webroot/img/ok-sign-32.png" /></a>';
	document.getElementById('hide1').innerHTML=imghtml;
	
		
}
function editprofile(id){
	//alert(id);
	var phno=document.getElementById('phn1').value;
	var websit=document.getElementById('websit1').value;
	var cmpny=document.getElementById('compny1').value;
	var address=document.getElementById('add1').value;
	var username=document.getElementById('uname1').value;
	var info=document.getElementById('inf1').value;
	var name=document.getElementById('nam1').value;
	//alert(phno);alert(cmpny);alert(username);alert(type);alert(name);alert(websit);
	data={"name":name,"info":info,"username":username,"address":address,"company":cmpny,"website":websit,"phone":phno,};
	
	$.ajax({
		url: "<?php echo BASE_PATH ?>users/edit/" +id,
		type: "POST",
		data: data,
		success: function(abcd) {
			//alert(abcd+' '+window.location.href );
			if(abcd=='ok'){
				location.assign(window.location.href );
			}
			/*$("#myModal").modal("hide")
			document.getElementById("UserUsername2").value="";*/
		}
	});
	return false;
}

</script>

<div class="col-md-12">
	<section class="panel">
		<div class="panel-body profile-information">
		   <div id="img1" class="col-md-3">
			   <div  class="profile-pic text-center">
				   <img  src="<?php echo BASE_PATH. "webroot/". h($user->logo)?>" alt=""/>
			   </div>
		   </div>
		   <div class="col-md-6">
			   <div id="allinone" class="profile-desk">
				   <h1 id="head1"><?= h($user->name) ?></h1></br>
				   <p id="paragrph1">
					   <?= $this->Text->autoParagraph(h($user->info)); ?>
				   </p>
				   
			   </div>
		   </div>
		   <div class="col-md-3">
			   <div class="profile-statistics">
					<div id="hide1">
					   <a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" onclick="return showprofile(<?php echo h($user->id); ?>)" style="cursor:pointer;" >
							<img id="icon1" src="<?php echo BASE_PATH ?>webroot/img/file_edit.png" />
						</a>
					</div>
				   <h1 id="head2"><?= __('Email') ?></h1>
				   <p id="username1"><?= h($user->username) ?></p>
				   <h1><?= __('Address') ?></h1>
				   <p id="address1"><?= h($user->address) ?></p>
				  
			   </div>
		   </div>
		</div>
	</section>
</div>
<div class="col-sm-12">
	<section class="panel">
		 <div class="panel-body">
			<div class="tab-content tasi-tab">
				<div id="overview" class="tab-pane active">
					<div class="row">
						<div class="col-sm-12">
														
							<div class="prf-box">
								
								
								<div class="profile-statistics">
									
									<h2 class="red"><?= __('Company') ?></h2>
									<p id="company1"><?= h($user->company) ?></p>
								
								</div>
								<div class="profile-statistics">
									
									<h2 class="red"><?= __('Website') ?></h2>
									<p id="website1"><a  style="color:red;" href="http://<?= h($user->website) ?>" target="_blank" class="terques"> <?= h($user->website) ?></a>.</p>
									
								</div>
								<div class="profile-statistics">
									
									<h2 class="red"><?= __('Phone') ?></h2>
									<p id="phone1"> <?= h($user->phone) ?> </p>
									
								</div>
								
							</div>
						</div>
					   
					</div>
				</div>
			   
				
			   
			</div>
		</div>
	</section>
</div>

