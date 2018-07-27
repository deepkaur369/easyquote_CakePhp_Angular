<!-- Drawings frame start -->
<style>
	.aLabel{  
		display:none!important;
	}
	.q{
		background-color:#1fb5ad;
	}
	#topBar{
		text-align:left;
	}
	.xy{
		width:100px;
		float:left;
	}
</style> 
<div id="main">
<?php 
	$limit = 200;
	$optionLimit = 500;
?>
<script>
	var q = Number(<?php echo $limit-1;?>);
	var o = Number(<?php echo $optionLimit;?>);	
	function getQuestionObject(){
		$('#xxx').fadeOut(500);
		$('#yyy').fadeOut(500);
		document.getElementById(q).style.visibility  = 'visible';
		q--;
	}
	function getOptionObject(){
		$('#xxx').fadeOut(500);
		$('#yyy').fadeOut(500);
		document.getElementById(o).style.visibility  = 'visible';
		o--;
	}
	
jQuery(
  function($)
  {
	$('#statemachine-demo').bind('scroll', function()
	{
		if($(this).scrollTop() + $(this).innerHeight()>=$(this)[0].scrollHeight)
		{
		 // alert('end reached');
			var oldheight= $("#statemachine-demo").height();
			//alert(oldheight);
			//$('#statemachine-demo').innerHeight();
			var addheight=+oldheight + +200;
			//alert(addheight);
			$('#statemachine-demo').css("height",+addheight);
		}
	})
  }
);
	
</script>
<div id="topBar" style="visibility:hidden;">


	<div style="width:50%;float:left;text-align:left">
		<a href="javascript:getQuestionObject()" class="btn btn-success"> Add Question </a>
		<a href="javascript:getOptionObject()" class="btn btn-success"> Add Options </a>
		<a href="#" id="xxx" style="text-align:left;display:none;" class="btn btn-success"><div id="xx"></div> </a>
		<a href="#" id="yyy" style="text-align:left;display:none;" class="btn btn-success"><div id="yy"></div> </a>
	</div>

	<div style="width:50%;float:left;text-align:right">
		<a onclick="saveService('no')" href="#" id="saveService" style="display:none;" class="btn btn-success"> Save Flow </a>
		<a onclick="saveService('yes')" href="#" id="save_Service" style="display:none;" class="btn btn-success"> Save and New </a>
	</div>
	

</div>
<br/><br/>
    <div class="demo statemachine-demo" id="statemachine-demo" style="visibility:hidden;">

	
<!--  Dynamic Stacks for questions and options start  -->
	
		<div style="width:15%;height:50px!important;padding:10px;!important;">
		
<!--##################### Stack for Questions #############################-->
		
			<div style="width:20%!important;float:left!important;">
				<?php 
				for($i = 1; $i<=$limit;$i++){
					if($i==$limit){
					/* Create empty start object */
				?>
				<div class="w q" id="<?php echo $i ?>">
					<input type="hidden"  id="type<?php echo $i ?>" value="question_Star" />
					<input type="hidden" value="0" autocomplete="off" id="last_insert_id_<?php echo $i ?>" />
						<a style="color:white;" href="javascript:void(0)">Start</a>  
					<div class="ep" style="color:white;margin-top:3px;" id="drag<?php echo $i ?>">&nbsp;Drag Area &nbsp;</div>
				</div>
				<?php   
					}else{
					/* Create Question Object */
					?>
					<div class="w q" ondrag="getPositions(this)"  style="visibility:hidden;" id="<?php echo $i ?>">
					<button type="button" id="queClose" style="margin-top: -19px;margin-right: -15px;" onclick="Closeequediv(<?php echo $i ?>)" class="close" >&times;</button>
						<!-- Parents ids container -->
						<div id="parents<?php echo $i ?>"> </div>

						<!-- hidden container -->
						<input type="hidden"  id="type<?php echo $i ?>" value="question" />
						<input type="hidden" autocomplete="off" id="last_insert_id_<?php echo $i ?>" />
						<input type="hidden" id="parent_id_<?php echo $i ?>" value="" />
						<input type="hidden" id="style_<?php echo $i ?>" value="" />
				
							<!-- Add Button  -->
							<a href="#question" id="add1<?php echo $i ?>" onclick="setID(<?php echo $i ?>,'question')" data-toggle="modal" data-target="#question" > </a>
							
							<a style="color:white;" id="adddv<?php echo $i ?>" href="javascript:getClk(<?php echo $i ?>)" >Add Questions</a>
							
							
							<!-- Update Button -->
						<span style="display:none;color:white;" id="pree<?php echo $i ?>">Q:&nbsp;</span>
						<a style="color:white;" href="#question" data-original-title="Question" data-content="" data-placement="right" data-trigger="hover" class="popovers" style="display:none" id="edit<?php echo $i ?>" onclick="setID(<?php echo $i ?>,'question'),editQuestion(<?php echo $i ?>);" data-toggle="modal" data-target="#question" ></a>
							
				
						<div class="ep" style="visibility:hidden;color:white;margin-top:3px;" id="drag<?php echo $i ?>">&nbsp;Drag Area &nbsp;</div>
					</div>
					
					<?php  
					}
				} ?>
			</div>
			
<!--######################### Stack for Options ##########################-->	
			
			<div style="width:15%!important;float:right!important;text-align:right;">
				<?php for($i = $limit+10; $i<=$optionLimit;$i++){?>
					<div ondrag="getPositions(this)" style="visibility:hidden;background-color:#f5f5f5;text-align: center;" class="w" id="<?php echo $i ?>">
						<button type="button" id="optClose" style="margin-top: -19px;margin-right: -15px;" onclick="Closeeoptdiv(<?php echo $i ?>)" class="close" >&times;</button>
						<!-- hidden container -->
						<input type="hidden"  id="qdiv<?php echo $i ?>" />
						<input type="hidden"  id="type<?php echo $i ?>" value="option" />
						<input type="hidden" id="last_insert_id_<?php echo $i ?>" value="" />
						<input type="hidden" id="parent_id_<?php echo $i ?>" value="" />
						<input type="hidden" id="style_<?php echo $i ?>" value="" />
					
						<a href="#option" id="clickMe_<?php echo $i ?>" onclick="setID(<?php echo $i ?>,'option')" data-toggle="modal" data-target="#option" ></a>
						
					<!-- Add Button -->
						<a id="add<?php echo $i ?>" href="javascript:getClick(<?php echo $i ?>,'dummy')" >Add Options</a>
					<!-- Update Button -->
					<span style="display:none;color:black" id="pree<?php echo $i ?>">O:&nbsp;</span>	
					<a data-original-title="Option" data-content="" data-placement="right" data-trigger="hover" class="popovers" style="display:none" id="edit<?php echo $i ?>" href="javascript:getClick(<?php echo $i ?>,'getdata')" > </a>
						
						
						<div class="ep" style="visibility:hidden;color:white" id="drag<?php echo $i ?>">&nbsp;Drag Area &nbsp;</div>
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
				<button type="button" id="qClose" onclick="closee()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
											<input type="text"  class="form-control" maxlength="20" id="questionTitle" placeholder="Question Title (Required)(It should be less than 21 words)">
										</div>
										
										
										<div class="form-group">
											<textarea autocomplete="off" placeholder="Question Text (Required)"  id="question_text" name="question_text" rows="8" cols="83" style="margin-top:20px;"></textarea>
										</div>
									

										<div class="form-group">
											<div class="col-lg-offset-0 col-lg-12">
							  					<div class="checkbox">
													<label>
														<input id="multiple" name="multiple" type="checkbox"> Multiple Choice?
														<input id="qstyle" name="qstyle" type="hidden"> 
													</label>
												</div>
											</div>
										</div>
										
										<button id="qsubmit" type="button" onclick="setQuestion()" class="btn btn-default">Save</button>
										<img style="display:none;" id="qimg" src='<?php echo BASE_PATH  ?>img/loader.gif' />
										<button style="display:none;" id="qmsg" type="button" class="btn btn-default">Saved</button>
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
				<button type="button" id="oClose" onclick="optClosee()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
											<input type="text"  class="form-control" maxlength="20" id="optionTitle" placeholder="Option Title (Required)(It should be less than 21 words)">
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
													<input type="hidden" id="icon" value=""/>
													<span id="status" ></span>
													</div>
												</div>
												
												
												<div class="form-group">
													<div class="col-lg-offset-0 col-lg-12">
														<div class="checkbox">
															<label>
																<input id="charge" name="multiple" type="checkbox"> Chargeable?
															</label>&nbsp;&nbsp;
															<label>
																<input id="comment" name="comment" type="checkbox"><a href="#" title="Take input from user like how many pages they want to display in the app."> Comment-able?</a>
																<input id="style" name="style" type="hidden"> 
															</label>
														</div>
													</div>
												</div>
												
												
												
											</form>	
											<br/>
										<button id="osubmit" type="button"  onclick="setOption()" class="btn btn-default">Save</button>
										<img style="display:none;" id="oimg" src='<?php echo BASE_PATH  ?>img/loader.gif' />
										<button style="display:none;" id="omsg" type="button" class="btn btn-default">Saved</button>
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
<script src="<?php echo ADMIN_PATH; ?>flow/ajaxupload.3.5.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_PATH; ?>flow/jquery-1.3.2.js" type="text/javascript"></script>
<script>


/* Icon image upload with AJAX */
$(function(){
//alert("ok");
	var btnUpload=$('#upload');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: '<?php echo BASE_PATH  ?>questions/uploadImage',
		name: 'icon',
		onSubmit: function(file, ext){
			 
			status.text('Uploading...');
		},
		onComplete: function(file, response){
		
			if(response=="no"){
				alert("Please upload only .jpeg, .jpg, .png extensions file");
				status.text('Uploading...');
			}else{
				$("#icon").val(response);
				status.text('');	
			}
		}
	});
	
});

/*close the question object*/
function Closeequediv(i){
	var lastID = $('#parent_id_'+i).val();
	if(lastID==""){
		$('#'+i).remove();
	}else{
		alert("first delete the child/path");
	}
}
function Closeeoptdiv(i){
	var lastID = $('#parent_id_'+i).val();
	if(lastID==""){
		$('#'+i).remove();
	}else{
		alert("first delete its child/path");
	}


}

/* get connection source and target to perform further action */
function setConnection(src, trg, conn){
	
	/* Parent ID */
	var lastID = $('#last_insert_id_'+src).val();
	
	
	/* remove connection if parent object don't have last insert id */
	if(lastID==''){
		alert('Please add content to parent object first! ');
		jsPlumb.ready(function (){
			removeConnection(trg,conn);
			
		});
	}
	
	/* target object type */
	var type = $('#type'+trg).val();
	
	var target_parent_id = $('#parent_id_'+trg).val()
	
	/* remove multiple connection to option object */
	if(type == 'option' && target_parent_id != ''){
		alert('You can not assign multiple connection to option object!');
		jsPlumb.ready(function (){
			jsPlumb.detach(conn);
			instance.detach(conn);
		});
	}else{
		/* set parent id in child object */
		$('#parent_id_'+trg).val(lastID);
		if(type == 'option'){
		
			$('#qdiv'+trg).val(src);
			
		}
	}
	
	/* Check First object of flow if it is option then remove it */
	if(lastID == 0 && type == 'option'){
		alert("Please add Question as a first lavel Object.");
		jsPlumb.ready(function (){
			$('#parent_id_'+trg).val('');
			jsPlumb.detach(conn);
			
			
		});
	}
	
	/* remove connection if parent and child both are option objects */
	
	var s = $('#type'+src).val();
	var t = $('#type'+trg).val();
	if(s==t){
		alert("Sorry! Your can't assign Same object to another same object.");
		jsPlumb.ready(function (){
			jsPlumb.detach(conn);
			instance.detach(conn);
		});
	}
	/* Source record id */
	var sid = $("#last_insert_id_"+src).val();
	/*  Target record id */
	var tid = $("#last_insert_id_"+trg).val();
	
	/* add Option parent ids to child questions */
	if(type=='question'){
		var txt = '<input type="hidden" class="belongto'+trg+'" id="'+src+'-'+trg+'" value="'+sid+'">';
		$('#parents'+trg).append(txt);	
	}
	
	/* Update option_question table in question already saved  */
	if(type=='question' && tid != ''){
		setSingleOptions(sid, tid, src, trg);
	}
}

function setSingleOptions(optionID, questionsID, src, trg){
	var data = 'option_id='+ optionID 
	+'&option_div='+ src 
	+'&question_div='+ trg 
	+'&question_id='+ questionsID ; 	
	$.ajax({
			url: "<?php echo BASE_PATH  ?>questions/setSingleOptions",	
			type: "POST",
			data: data,		
			cache: false,  
			success: function (data) {
				/*alert(data);*/
			}		
	});
	return false;
}

function getClk(id){

	var pid = $('#parent_id_'+id).val();
	
	if(pid != '' ){
		$('#add1'+id).click();
		var style = $('#style_'+id).val();
		$('#qstyle').val(style);

	}else{
		alert('Please make connection with parent first.');
	}
}


/* add and update question form */
function setQuestion(){
	var qdata = $('#question_text').val();
	var qqdata = $('#questionTitle').val();
	var id = $("#QID").val();
	if( qqdata != '' && qdata != ''){
	
		/* submit button status */
		$('#qsubmit').hide();
		$('#qimg').show();
		var div_id =  $('#questionObjectId').val();
		var text = $('#question_text').val();
		var data = 'id='+ $("#QID").val()
		+'&service_id='+ $("#serviceID").val()
		+'&divId='+ div_id
		+'&question='+ text
		+'&style='+  $("#qstyle").val()
		+'&title='+ $('#questionTitle').val()
		+'&is_multiple_choice='+ $('#multiple').is(":checked"); 	

		$.ajax({
			url: "<?php echo ADMIN_PATH  ?>questions/setQuestion",	
			type: "POST",
			data: data,		
			cache: false,  
			success: function (data) {
				//console.log(data);
				/* submit button status */
				setTimeout(function(){$('#qimg').hide();$('#qmsg').show();},1000);
				
				/* get object id */
				var id =  $('#questionObjectId').val();

				/* get record id and close pop-up*/
				$('#last_insert_id_'+id).val(data);
				
				setTimeout(function(){$('#qClose').click();$('#qmsg').hide();$('#qsubmit').show();},1500);
				
				/* empty form */				
				$('#QID').val('');
				$('#question_text').val('');
				
				$('#multiple').attr('checked', false);
				
				/* replace add link with update lionk*/
				document.getElementById('drag'+id).style.visibility  = 'visible';
				//document.getElementById('add'+id).style.display='none';

				$('#adddv'+id).hide();
				//$('#add'+id).attr('dis', false);
				$('#edit'+id).show();
				$('#pree'+id).show();
				
				/* set question title */
				$('#edit'+id).text($('#questionTitle').val());
				$('#questionTitle').val('');
				
				/* set data for tool-tip */
				var button = document.getElementById('edit'+id);
				button.setAttribute('data-content', text);

				/* update connection table*/
				var qid = $('#last_insert_id_'+id).val();
				setOptionQuestion(id, qid);
			}		
		});
		return false;
	}else{
		alert('Please enter data in required fields!');
	}	
}

/* update connection table with AJAX  */
function setOptionQuestion(questionObj, questionId){

	var x = document.getElementsByClassName("belongto"+questionObj);
	var options = '';
	var optionDiv = '';
	var questionDiv = '';
	for(var i = 0; i < x.length; i++){
		options+=x[i].value + ",";
		var tmp = x[i].id;
		tmp = tmp.split("-");
		optionDiv+=tmp[0]+ ",";
		questionDiv+=tmp[1]+ ",";

	}
	
	var data = 'option_id='+ options 
	+'&odiv='+ optionDiv  	
	+'&qdiv='+ questionDiv 	
	+'&question_id='+ questionId ; 
	//console.log(data)	;
	$.ajax({
			url: "<?php echo BASE_PATH  ?>questions/setOptionQuestion",	
			type: "POST",
			data: data,		
			cache: false,  
			success: function (data) {
				//console.log(data);
			}		
	});
	return false;
}



/* set data in edit question form */
function editQuestion(objid){
	
	var id = $('#last_insert_id_'+objid).val();
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
			$('#qstyle').val(obj.style);					
			if(obj.is_multiple_choice==true){
				document.getElementById("multiple").checked = true;
			}
			/* set question title */	
			var title = $('#edit'+objid).text();
			$('#questionTitle').val(title);
			
		}		
	});
	return false;
}



/* option add and update AJAX */
function setOption(){
	
/* validate icontext and iconimage field */


	
	var icon_text =$('#icon_text').val()
	var icon_img=$('#icon').val()
	
	if((icon_text == "") && (icon_img == "")){
		confirm('Please enter either icon text or icon image');
		
	}else{

		var vdata = $('#optionTitle').val();
		
		if($('#option_text').val() !='' &&  vdata != ''){
		
			/* submit button status */
			$('#osubmit').hide();
			$('#oimg').show();
		
			var text =  $('#option_text').val();
			var  id = $('#optionObjectId').val();
			
			var  qDiv = $('#qdiv'+id).val();
			
			var data =  'id='+ $('#OID').val()
			+'&question_id='+ $('#parent_id_'+id ).val() 
			+'&option_div='+ id 
			+'&question_div='+ qDiv
			+'&name='+ text
			+'&title='+ $('#optionTitle').val()
			+'&icon='+ $('#icon_text').val()
			+'&image='+ $('#icon').val()	
			+'&is_chargeable='+ $('#charge').is(":checked")
			+'&is_comment='+ $('#comment').is(":checked")
			+'&style='+ $('#style').val();
			$.ajax({
				url: "<?php echo BASE_PATH  ?>questions/setOption",	
				type: "POST",
				data: data,		
				cache: false,  
				success: function (data) {
				
					/* submit button status */
					setTimeout(function(){$('#oimg').hide();$('#omsg').show();},1000);
					
					/* replace add link with update link*/
					document.getElementById('drag'+id).style.visibility  = 'visible';
					$('#add'+id).hide();
					$('#edit'+id).show();
					$('#pree'+id).show();
					/* Set Option title */
					$('#edit'+id).text($('#optionTitle').val());
					
					/* set data for tool tip */
					var button = document.getElementById('edit'+id);
					button.setAttribute('data-content', text);
			
					/* get record id and close pop up */
					$('#last_insert_id_'+id).val(data);
				
					setTimeout(function(){$('#oClose').click();$('#omsg').hide();$('#osubmit').show();},1500);
				
					/* empty option form */
					$('#OID').val('');
					$('#option_text').val('');
					$('#icon_text').val('');
					$('#image').val('');
					$('#optionTitle').val('');
					$('#charge').attr('checked', false); 
					$('#comment').attr('checked', false);
					
				}		
			});
			return false;
		}else{
			alert('Please enter data in required fields!');
		}
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
				//alert(data);
					if(data == 'sorry'){
						alert("Opps! somthing went wrong. Please try again.");
					}else if(data == "no"){
						document.getElementById("service").value="";
						alert("This service name is already exists. Please try with different service name.");
					}else{
						/* open canvas */
						document.getElementById("topBar").style.visibility  = 'visible';
						document.getElementById("statemachine-demo").style.visibility  = 'visible';
						/* get service id */
						$("#serviceID").val(data);
						
						$("#saveService").fadeIn(1000);
						$("#save_Service").fadeIn(1000);
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
				console.log(data);
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
		var style = $('#style_'+id).val();
		$('#style').val(style);
		$('#clickMe_'+id).click();
	}
}

/* set data in edit question form */
function editOption(objid){
	
	var id = $('#last_insert_id_'+objid).val();
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
			$('#style').val(obj.style);
		
			if(obj.is_chargeable==true){	
				document.getElementById("charge").checked = true;
			}
			
			if(obj.is_comment==true){	
				document.getElementById("comment").checked = true;
			}
			
			/* Set Option title */
			var title = $('#edit'+objid).text();
			$('#optionTitle').val(title);
		}		
	});
	return false;
}

function removeConnection(tid, co){


	if(confirm("Parent and child connection will also remove from database. Do you want to cuntinue?")){

		jsPlumb.ready(function (){
			jsPlumb.detach(co);
		});
	
		var lid = $('#last_insert_id_'+tid).val();
		var pid = $('#parent_id_'+tid).val();
		
		var type = $('#type'+tid).val();
		if(type == 'option'){
			$('#last_insert_id_'+tid).val('');
		}	
		$('#parent_id_'+tid).val('');
		$('#edit'+tid).val('');
		$('#edit'+tid).hide();
		$('#pree'+tid).hide();
		$('#adddv'+tid).show();
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
function getPositions(obj){

	
	var offset = $(obj).offset();
	var top = Math.round(offset.top);
	top = top - 117;
	var left = Math.round(offset.left);
	$('#xxx').fadeIn(500);
	$('#yyy').fadeIn(500);
	$('#xx').text("Y: "+top);
	$('#yy').text("X: "+left);
	var style = 'style="top:'+top+'px; left:'+left+'px;"';
	$('#style_'+obj.id).val(style);

}

/*make empty fields after click on close of question model*/
function closee(){

	$('#questionTitle').val('');
	$('#question_text').val('');
	$('#multiple').attr('checked', false);
	$('#QID').val('');
	$('#qstyle').val('');

}

/*make empty fields after click on close of option model*/
function optClosee(){

	$('#optionTitle').val('');
	$('#option_text').val('');
	$('#optionObjectId').val('');
	$('#OID').val('');
	$('#icon_text').val('');
	$('#icon').val('');
	$('#charge').attr('checked', false);
	$('#comment').attr('checked', false);
	$('#style').val('');

}

/* implement login for enable editing for update View start */
function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname +"=" + cvalue + ";expires=" + expires  + ";path=/";
}
setCookie('js_status', 'True', 1);
function getCookie(w){
	cName = "";
	pCOOKIES = new Array();
	pCOOKIES = document.cookie.split('; ');
	for(bb = 0; bb < pCOOKIES.length; bb++){
		NmeVal  = new Array();
		NmeVal  = pCOOKIES[bb].split('=');
		if(NmeVal[0] == w){
			cName = unescape(NmeVal[1]);
		}
	}
	return cName;
}

/* implement login for enable editing for update View end */
</script>
z