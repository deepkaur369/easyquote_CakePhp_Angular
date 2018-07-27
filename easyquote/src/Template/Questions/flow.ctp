<!-- Drawings frame start -->

<div id="main">

<script type="text/javascript" src="<?php echo ADMIN_PATH  ?>js/jquery-1.3.2.js" ></script>
<script type="text/javascript" src="<?php echo ADMIN_PATH  ?>js/ajaxupload.3.5.js" ></script>

    <div class="demo statemachine-demo" id="statemachine-demo" style="display:none;">
	
<!--  Dynamic Stacks for questions and options start  -->
	
		<div style="width:15%;height:50px!important;padding:10px;!important;">
		
<!--##################### Stack for Questions #############################-->
		
			<div style="width:20%!important;float:left!important;">
				<?php 
				$limit = 50;
				for($i = 1; $i<=$limit;$i++){
					if($i==$limit){
					/* Create empty start object */
				?>
				<div class="w" id="<?php echo $i ?>">
					<input type="hidden"  id="type<?php echo $i ?>" value="question" />
					<input type="hidden" value="0" autocomplete="off" id="last_insert_id_<?php echo $i ?>" />
						Start  
					<div class="ep"></div>
				</div>
				<?php 
					}else{
					/* Create Question Object */
					?>
					<div class="w" id="<?php echo $i ?>">
					
						<input type="hidden"  id="type<?php echo $i ?>" value="question" />
						<input type="hidden" autocomplete="off" id="last_insert_id_<?php echo $i ?>" />
						<input type="hidden" id="parent_id_<?php echo $i ?>" value="" />
				
				<!-- Add Button  -->
				<a href="#question" id="add1<?php echo $i ?>" onclick="setID(<?php echo $i ?>,'question')" data-toggle="modal" data-target="#question" > </a>
				
				<a id="add<?php echo $i ?>" href="javascript:getClk(<?php echo $i ?>)" >Add Questions</a>
				
				
				<!-- Update Button -->
				<a href="#question" data-original-title="Question" data-content="" data-placement="right" data-trigger="hover" class="popovers" style="display:none" id="edit<?php echo $i ?>" onclick="setID(<?php echo $i ?>,'question'),editQuestion(<?php echo $i ?>);" data-toggle="modal" data-target="#question" ></a>
				
				
						<div class="ep"></div>
					</div>
					
					<?php  
					}
				} ?>
			</div>
			
<!--######################### Stack for Options ##########################-->	
			
			<div style="width:15%!important;float:right!important;text-align:right;">
				<?php for($i = 100; $i<=200;$i++){?>
				<div class="w" id="<?php echo $i ?>">
					
					
					<input type="hidden"  id="type<?php echo $i ?>" value="option" />
					<input type="hidden" id="last_insert_id_<?php echo $i ?>" value="" />
					<input type="hidden" id="parent_id_<?php echo $i ?>" value="" />
				
					<a href="#option" id="clickMe_<?php echo $i ?>" onclick="setID(<?php echo $i ?>,'option')" data-toggle="modal" data-target="#option" ></a>
					
				<!-- Add Button -->
					<a id="add<?php echo $i ?>" href="javascript:getClick(<?php echo $i ?>,'dummy')" >Add Options</a>
				<!-- Update Button -->
					<a data-original-title="Option" data-content="" data-placement="right" data-trigger="hover" class="popovers" style="display:none" id="edit<?php echo $i ?>" href="javascript:getClick(<?php echo $i ?>,'getdata')" > </a>
					
					
					<div class="ep"></div>
				</div>
				<?php } ?>
			</div>
			
	
			
		</div>


	</div>
</div>

<!-- Drawings frame end -->


<!--############################ Question Model #####################################-->
<div class="modal fade" id="question" tabindex="-1" role="dialog" aria-labelledby="question" aria-hidden="true">
	<div class="modal-dialog" style="width:50%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="qClose" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				Add question's content.
			</div>
			<div class="modal-body row" style="padding-top:0px;">
				<div class="row">
					<div class="col-sm-12">
						<section class="panel">
							<div class="panel-body " style="padding-top:0px;">
								<div class="form-group" style="margin-top:0px;">
								   <div class="col-sm-12">
								   
				<!-- Work Area of Pop-up -->
										
										
										<!-- Store last insert id of question from database -->
										<input type="hidden" id="questionObjectId" />
										<input type="hidden" autocomplete="off" id="QID" />
										<br/><br/>
										<div class="form-group">
											<label class="sr-only"  for="exampleInputEmail2">Question Title</label>
											<input type="text"  class="form-control" maxlength="20" id="questionTitle" placeholder="Question Title (Required)">
										</div>
										
										
										<div class="form-group">
											<textarea autocomplete="off" placeholder="Question Text (Required)"  id="question_text" name="question_text" rows="8" cols="83" style="margin-top:20px;"></textarea>
										</div>
									

										<div class="form-group">
											<div class="col-lg-offset-0 col-lg-12">
												<div class="checkbox">
													<label>
														<input id="multiple" name="multiple" type="checkbox"> Multiple Choice?
													</label>
												</div>
											</div>
										</div>
										
										<button type="button" onclick="setQuestion()" class="btn btn-default">Save</button>
 									</div>		
								</div>			
							</div>
						</section>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>

<!--############################# Option Model ######################################-->
<div class="modal fade" id="option" tabindex="-1" role="dialog" aria-labelledby="option" aria-hidden="true">
	<div class="modal-dialog" style="width:50%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="oClose" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				Add option's content.
			</div>
			<div class="modal-body row" style="padding-top:0px;">
				<div class="row">
					<div class="col-sm-12">
						<section class="panel">
							<div class="panel-body " style="padding-top:0px;">
								<div class="form-group" style="margin-top:0px;">
								   <div class="col-sm-12">
								   
			<!-- Work Area of Pop-up -->
										<br/>
										<div class="form-group">
											<label class="sr-only"  for="exampleInputEmail2">Option Title</label>
											<input type="text"  class="form-control" maxlength="20" id="optionTitle" placeholder="Option Title (Required)">
										</div>
						
										<div class="form-group">
											<textarea autocomplete="off" placeholder="Option Text (Required)"  id="option_text" rows="4" cols="83" style="margin-top:20px;"></textarea>
										</div>
			
											<form class="form-inline" role="form">

												<input type="hidden" id="optionObjectId" />
												<input type="hidden" autocomplete="off" id="OID" />
												<div class="form-group">
													<label class="sr-only"  for="exampleInputEmail2">icon Code</label>
													<input type="email" class="form-control" id="icon_text" placeholder="icon code">
												</div>
												OR
												<div class="form-group">
													<div class="col-lg-offset-0 col-lg-12">
													
													<button id="upload" type="button" class="btn btn-default">ICON Image</button>
													<input type="hidden" id="icon" />
													<span id="status" ></span>
													</div>
												</div>
												
												
												<div class="form-group">
													<div class="col-lg-offset-0 col-lg-12">
														<div class="checkbox">
															<label>
																<input id="charge" name="multiple" type="checkbox"> Chargeable?
															</label>
														</div>
													</div>
												</div>
												
												
												
											</form>	
											<br/>
										<button type="button" onclick="setOption()" class="btn btn-default">Save</button>
 									</div>		
								</div>			
							</div>
						</section>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>

<script>


/* Icon image upload with AJAX */
$(function(){
	var btnUpload=$('#upload');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: '<?php echo BASE_PATH  ?>questions/uploadImage',
		name: 'icon',
		onSubmit: function(file, ext){
			 
			status.text('Uploading...');
		},
		onComplete: function(file, response){
			$("#icon").val(response);
			status.text('');				
		}
	});
	
});


/* get connection source and target to perform further action */
function setConnection(src, trg, conn){

	var lastID = $('#last_insert_id_'+src).val();

	/* remove connection if parent object don't have last insert id */
	if(lastID==''){
		alert('Please add content to parent object first! ');
		jsPlumb.ready(function (){
			jsPlumb.detach(conn);
			instance.detach(conn);
		});
	}
	
	/* remove connection if parent and child both are option objects */
	$('#parent_id_'+trg).val(lastID);
	var s = $('#type'+src).val();
	var t = $('#type'+trg).val();
	if(s=='option' && (s==t)){
		alert("Sorry! Your can't assign option object to another option object.");
		jsPlumb.ready(function (){
			jsPlumb.detach(conn);
			instance.detach(conn);
		});
	}
	/* Source record id */
	var sid = $("#last_insert_id_"+src).val();
	/*  Target record id */
	var tid = $("#last_insert_id_"+trg).val();
	
	/* multiple connection to option object */
	if( t == 'option' ){
		jsPlumb.ready(function (){
		
				
		});
	}
}

function getClk(id){

	var pid = $('#parent_id_'+id).val();
	if(pid != '' ){
		$('#add1'+id).click();
	}else{
		alert('Please make connection with parent first.');
	}
}


/* add and update question form */
function setQuestion(){
	var qdata = $('#question_text').val();
	var qqdata = $('#questionTitle').val();
	if( qqdata != '' && qdata != ''){
		var text = $('#question_text').val();
		var data = 'id='+ $("#QID").val()
		+'&service_id='+ $("#serviceID").val()
		+'&question='+ text
		+'&is_multiple_choice='+ $('#multiple').is(":checked"); 	
		$.ajax({
				url: "<?php echo ADMIN_PATH  ?>questions/setQuestion",	
				type: "POST",
				data: data,		
				cache: false,  
				success: function (data) {
					
					/* get object id */
					var id =  $('#questionObjectId').val();

					/* get record id and close pop-up*/
					$('#last_insert_id_'+id).val(data);
					$('#qClose').click();
					
					/* conformation */
					alert("Question has been successfuly added to database!");
					
					/* empty form */				
					$('#QID').val('');
					$('#question_text').val('');
					
					$('#multiple').attr('checked', false);
					
					/* replace add link with update lionk*/
					$('#add'+id).hide();
					$('#edit'+id).show();
					/* set question title */
					$('#edit'+id).text($('#questionTitle').val());
					$('#questionTitle').val('');
					
					
					/* set data for tool-tip */
					var button = document.getElementById('edit'+id);
					button.setAttribute('data-content', text);

					/* update connection table*/
					var qid = $('#last_insert_id_'+id).val();
					var pid = $('#parent_id_'+id).val();
					setOptionQuestion(pid, qid);
				}		
		});
		return false;
	}else{
		alert('Please enter data in required fields!');
	}	
}
/* set data in edit question form */
function editQuestion(id){
	
	var id = $('#last_insert_id_'+id).val();
	var data = ''; 	
	$.ajax({
		url: "<?php echo BASE_PATH  ?>questions/getData/"+id,	
		type: "POST",
		data: data,		
		cache: false,  
		success: function (data) {
		
			var obj = JSON.parse(data);
			$('#QID').val(obj.id);
			$('#serviceID').val(obj.service_id);
			$('#question_text').val(obj.question);			
			if(obj.is_multiple_choice==true){
				document.getElementById("multiple").checked = true;
			}
			/* set question title */	
			var title = document.getElementById('#edit'+id).innerHTML;
			$('#questionTitle').val(title);
			
		}		
	});
	return false;
}

/* update connection table with AJAX  */
function setOptionQuestion(optionId, questionId){
	
	var data = 'option_id='+ optionId 
	+'&question_id='+ questionId ; 	
	$.ajax({
			url: "<?php echo BASE_PATH  ?>questions/setOptionQuestion",	
			type: "POST",
			data: data,		
			cache: false,  
			success: function (data) {
				/*alert(data);*/
			}		
	});
	return false;
}

/* option add and update AJAX */
function setOption(){
	
	var vdata = $('#optionTitle').val();
	if($('#option_text').val() !='' &&  vdata != ''){
		var text =  $('#option_text').val();
		var  id = $('#optionObjectId').val();
		
		var data =  'id='+ $('#OID').val()
		+'&question_id='+ $('#parent_id_'+id ).val() 
		+'&name='+ text
		+'&icon='+ $('#icon_text').val()
		+'&image='+ $('#icon').val()	
		+'&is_chargeable='+ $('#charge').is(":checked"); 	
		$.ajax({
			url: "<?php echo BASE_PATH  ?>questions/setOption",	
			type: "POST",
			data: data,		
			cache: false,  
			success: function (data) {
			
			
				/* replace add link with update lionk*/
				$('#add'+id).hide();
				$('#edit'+id).show();
				/* Set Option title */
				$('#edit'+id).text($('#optionTitle').val());
				
				/* set data for tool tip */
				var button = document.getElementById('edit'+id);
				button.setAttribute('data-content', text);

				
				/* get record id and close pop up */
				$('#last_insert_id_'+id).val(data);
				$('#oClose').click();
				
				alert("Option has been successfuly added to database!");
				
				
				/* empty option form */
				$('#OID').val('');
				$('#option_text').val('');
				$('#icon_text').val('');
				$('#image').val('');
				$('#optionTitle').val('');
				$('#charge').attr('checked', false);
				
			}		
		});
		return false;
	}else{
		alert('Please enter data in required fields!');
	}	
}

/* add service name in top form */
function setService(){
	
	if($('#category').val() !="" && $('#service').val() !=""){
	
		var data = 'category_id='+ $('#category').val()
		+'&name='+ $('#service').val()
		+'&active=0';		
		$.ajax({
				url: "<?php echo BASE_PATH  ?>/services/setService",	
				type: "POST",
				data: data,		
				cache: false,  
				success: function (data) {
					if(data == 'sorry'){
						alert("Opps! somthing went wrong. Please try again.");
					}else{
						/* open canvas */
						$("#statemachine-demo").slideDown(1000); 
						/* get service id */
						$("#serviceID").val(data);
						$("#creatService").hide();
						$("#saveService").show();
						$("#save_Service").show();
					}
				}		
		});
		return false;
	}else{
		alert("All fields are required.");
	}
}


/* update service  */
function saveService(mode){
	
	if(mode=='no'){
		$("#saveService").html("<img src='<?php echo BASE_PATH  ?>img/loader.gif' />");
	}else{
		$("#save_Service").html("<img src='<?php echo BASE_PATH  ?>img/loader.gif' />");
	}

	var sid = $("#serviceID").val();
	var data = '';		
	$.ajax({
			url: "<?php echo BASE_PATH  ?>questions/saveService/"+sid,	
			type: "POST",
			data: data,		
			cache: false,  
			success: function (data) {
				$("#saveService").html("Saved");
				$("#save_Service").html("Save and New");
				if(mode=='yes'){
					 location.reload();
				}
			}		
	});
	return false;

}


/* set object id to question and option pop up */
function setID(id, model){
	if(model=='question'){
	
		$('#questionObjectId').val(id);
		
	}else{
		$('#optionObjectId').val(id);
	}
}

/* check parent connection */
function getClick(id,mode){
	
	if(mode == 'getdata'){
		editOption(id);
	}

	var val = $('#parent_id_'+id).val();
	if(val ==''){
		alert('Please make connection with question first.');
	}else{
		$('#clickMe_'+id).click();
	}
}

/* set data in edit question form */
function editOption(id){
	
	var id = $('#last_insert_id_'+id).val();
	var data = ''; 	
	$.ajax({
		url: "<?php echo BASE_PATH  ?>questions/getOptionData/"+id,	
		type: "POST",
		data: data,		
		cache: false,  
		success: function (data) {
	
			var obj = JSON.parse(data);
			$('#OID').val(obj.id);
			$('#parent_id_').val(obj.question_id);
			$('#option_text').val(obj.name);
			$('#icon_text').val(obj.icon);
			$('#image').val(obj.id);
		
			if(obj.is_chargeable==true){	
				document.getElementById("charge").checked = true;
			}
			
			/* Set Option title */
			var title = document.getElementById('#edit'+id).innerHTML;
			$('#optionTitle').val(title);
		}		
	});
	return false;
}

function removeConnection(tid){

	if(confirm("Parent and child connection will also remove from database. Do you want to cuntinue?")){
		
		
		var lid = $('#last_insert_id_'+tid).val();
		var pid = $('#parent_id_'+tid).val();
		
		
		var type = $('#type'+tid).val();
		$('#last_insert_id_'+tid).val('');
		$('#parent_id_'+tid).val('');
		$('#edit'+tid).val('');
		$('#edit'+tid).hide();
		$('#add'+tid).show();
		$('#edit'+tid).val('');
		
		if(type=='question' && lid != '' && pid != '' ){
			/* Remove connection */
			var data = '';		
			$.ajax({
				url: "<?php echo BASE_PATH  ?>questions/removeConnection/"+lid+'/'+pid,	
				type: "POST",
				data: data,		
				cache: false,  
				success: function (data) {
				}		
			});
			return false;
			
		}else if(lid != '' && pid != ''){
			/* Remove option */
			var data = '';		
			$.ajax({
				url: "<?php echo BASE_PATH  ?>questions/removeOption/"+lid,	
				type: "POST",
				data: data,		
				cache: false,  
				success: function (data) {
					
				}		
			});
			return false;
		}	
	}
}
</script>