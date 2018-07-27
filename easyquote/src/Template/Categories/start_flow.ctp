<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- CSS -->
		<link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>css/styles.css" media="all">
		<link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>css/style.css" media="all">
	
		<link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>css/bootstrap.min.css" media="all">
		<link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>css/font-awesome.css" media="all">

		<!-- TypeKit -->
		<script src="<?php echo ADMIN_PATH; ?>js/analytics.js" async="" type="text/javascript"></script>
		<script src="<?php echo ADMIN_PATH; ?>js/analytics_002.js" async="" type="text/javascript"></script>
		<script src="<?php echo ADMIN_PATH; ?>js/widgets.js" id="twitter-wjs"></script>
		<script src="<?php echo ADMIN_PATH; ?>js/sdk.js" id="facebook-jssdk"></script>
		<script src="<?php echo ADMIN_PATH; ?>js/fdh7aco.js"></script>

		<link href="<?php echo ADMIN_PATH; ?>css/d.css" rel="stylesheet">
		<script src="<?php echo ADMIN_PATH; ?>js/main.js"></script>
<style>
.icon-troph:before {  content: "\f0c2";}
.fa-apple:before {content: "\f179";}
.icon-cogd:before {  content: "\f10b";}
.icon-rockd:before {  content: "\f13b";}
.icon-beake:before {  content: "\f07a";}
.fa-android:before {   content: "\f17b";}
.pluginButton{padding:0 6px!important;margin-top: 6px!important;}
.timeline-footer{display:none!important;} 
.pluginCountBox{display:none!important;}

/*
  Hide radio button (the round disc)
  we will use just the label to create pushbutton effect
*/
input[type=radio] {
    display:none;
    //margin:10px;
}
 
/*
  Change the look'n'feel of labels (which are adjacent to radiobuttons).
  Add some margin, padding to label
*/
input[type=radio] + label {
    display:inline-block;
    //margin:-2px;
    //padding: 4px 12px;
   // background-color: #e7e7e7;
   // border-color: #ddd;
}
/*
 Change background color for label next to checked radio button
 to make it look like highlighted button
*/
input[type=radio]:checked + label {
  // background-image: none;
   // background-color:#d0d0d0;
}




</style>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "http://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=299081770271318&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


	<script>

	
	function validate2(){
		var txt=document.getElementById('text2');
		if(isNaN(txt.value))
        {
        alert("Please only enter numeric characters only(Allowed input:0-9)");
        }
	
	}
	
	function validate1(){
		var txt=document.getElementById('text1');
		if(isNaN(txt.value))
        {
        alert("Please only enter numeric characters only(Allowed input:0-9)");
        }
	
	}
	
	/*start cookie*/
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

	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname +"=" + cvalue + ";expires=" + expires  + ";path=/";
	}
	
	
	function printCookies(w){
		cStr = "";
		pCOOKIES = new Array();
		pCOOKIES = document.cookie.split('; ');
		for(bb = 0; bb < pCOOKIES.length; bb++){
			NmeVal  = new Array();
			NmeVal  = pCOOKIES[bb].split('=');
			if(NmeVal[0]){
				cStr += NmeVal[0] + '=' + unescape(NmeVal[1]) + '; ';
			}
		}
		return cStr;
	}

	/*end cookie*/

	
	function multiplechoice(servid,quesid,questno,icon,numb,indexee){
		var iconclass=document.getElementById('iconimg'+servid).className;
		var imgg=document.getElementById('iconimg'+servid).src;
		var chpath="<?php echo ADMIN_PATH; ?>admin/img/uploads/011_yes-128.png";
		if(iconclass=="icon-3x fa-check" || imgg==chpath){
		
			var	index=getCookie('index');
			for(var i=0;i < index; i++){
				var deltid=getCookie('step'+i);
				var served = new Array();
				// this will return an array with strings "1", "2", etc.
				served = deltid.split("_");

				if(served[0]==questno && served[1] == servid){
					
					setCookie('step'+i, 0+'_'+0, 1);	
				}

			
			}
			if(numb==1){
				document.getElementById('iconimg'+servid).src="<?php echo ADMIN_PATH; ?>admin/img/uploads/"+icon;
			

			}else{
				document.getElementById('iconimg'+servid).className="";
				document.getElementById('iconimg'+servid).className="icon-3x "+icon;
			}
		}else{	
			if(numb==1){
				document.getElementById('iconimg'+servid).src="<?php echo ADMIN_PATH; ?>admin/img/uploads/011_yes-128.png";
			}else{
				document.getElementById('iconimg'+servid).className="";
				document.getElementById('iconimg'+servid).className="icon-3x fa-check";	
			}
			document.getElementById('links1').style.display="inline-block";	
			var	index=getCookie('index');
			var ind= +index + +1;
			setCookie('index', ind, 1);
			setCookie('step'+index, questno+"_"+servid, 1);	
		}
		
		/*get links1 again none*/
		var	index=getCookie('index');
		var gg=0;
		for(var i=1;i <= index; i++){
			var deltid=getCookie('step'+i);
			var served = new Array();
			// this will return an array with strings "1", "2", etc.
			served = deltid.split("_");

			if(served[0]!=questno){
				var gg=0;
			}else{
				var gg=1;
				break;
			}
		}
		if(gg==0){
			document.getElementById('links1').style.display="none";
		}
			/**/
				
		
	}

	function newdata(servid,quesid,questno,multi){
		
		setCookie('serviceid', servid, 1);
		var dat="data[Question][sol]="+quesid;
		var getopt=document.getElementById(servid).value;
	
		if(multi != 2){
		var	index=getCookie('index');
		var ind= +index + +1;
		setCookie('index', ind, 1);
		setCookie('step'+index, questno+"_"+servid, 1);
		}
		
		$.ajax({
			url: "<?php echo ADMIN_PATH; ?>questions/newdata/" + servid ,
				type: 'POST',
				data: dat,
				success: function (result) {
					if(result!="null"){
						var obj=$.parseJSON(result);
						$("#main1").fadeOut(200);
						$("#main1").html('');
						var queid = 1;
						
						var options = obj.options;
						
						setCookie('optionid'+obj.id, servid, 1);
						if(obj.is_multiple_choice==1){
							
							var	indexe=getCookie('index');
							
							
							/*go previous button*/
							$("#back").html('');
							var backbutt='<div class="top-nav clearfix" id="" style="float:left"><ul class="nav pull-right top-menu"><li class="dropdown"><a  class="dropdown-toggle" onclick="goback('+servid+','+obj.id+','+questno+','+2+')"  >  Go Previous</a></li></ul></div>';
							$("#back").append(backbutt);
							/*end of previous button*/
						
							for(var i = 0; i < options.length; i++){
							
								$questions="<h2>"+obj.question+"</h2>";
								$("#headingques1").html($questions);
								var str1="'"+options[i].icon+"'";
								var str=String(str1);
								if(options[i].is_comment==1){
								
									if(options[i].icon==""){
										var img1="'"+options[i].image+"'";
										var imggee=String(img1);
										var imggeeno=1;
									
										var itag='<i class="icon-3x"  style="cursor:pointer"><img src="<?php echo ADMIN_PATH; ?>admin/img/uploads/'+options[i].image+'" id="iconimg'+options[i].id+'" style="cursor:pointer" class="icon-3x"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+imggee+',1,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else if(options[i].icon=="" && options[i].image==""){
										var itag='<i class="icon-3x" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+str+',2,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else{
										var img1="'"+options[i].icon+"'";
										var imggee=String(img1);
										
										var itag='<i class="icon-3x '+options[i].icon+'" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+str+',3,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}
								
									var html='<div  class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  href="#Modal" onclick="return coment1('+options[i].id+','+options[i].question_id+','+1+','+imggee+','+imggeeno+');" data-toggle="modal" data-target="#Modal" data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+options[i].id+'">'+itag+'</label></span></a><p class="text-primary">'+options[i].name+'</p></div>';
								}else{
								
									if(options[i].icon==""){
										var img1="'"+options[i].image+"'";
										var imggee=String(img1);
										
										var itag='<i class="icon-3x"  style="cursor:pointer"><img src="<?php echo ADMIN_PATH; ?>admin/img/uploads/'+options[i].image+'" id="iconimg'+options[i].id+'" style="cursor:pointer" class="icon-3x"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+imggee+',1,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else if(options[i].icon=="" && options[i].image==""){
										var itag='<i class="icon-3x" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+str+',2,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else{
										var itag='<i class="icon-3x '+options[i].icon+'" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+str+',3,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									} 
									
									var html='<div  class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+options[i].id+'" >'+itag+'</label></span></a><p class="text-primary">'+options[i].name+'</p></div>';
								
								}
								var linked='<div id="links1" style="display:none" class="answer answer-not-selected"><a class="icon-button js-answer"   data-question="type" data-answer="android" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+','+2+')"><span class="block-thumbnail maxheight col" style="height: 76px;"><i class="icon-3x fa fa-arrow-circle-right" style="cursor:pointer"><i class="circle-border"></i></i></span></a></div>';
								
								$("#main1").append(html);	   	
							}
						
						
							$("#main1").append(linked);
						
						}else{
						
							/*go previous button*/
							$("#back").html('');
							var backbutt='<div class="top-nav clearfix" id="" style="float:left"><ul class="nav pull-right top-menu"><li class="dropdown"><a  class="dropdown-toggle" onclick="goback('+servid+','+obj.id+','+questno+')"  >  Go Previous</a></li></ul></div>';
							$("#back").append(backbutt);
							/*end of previous button*/
							
							for(var i = 0; i < options.length; i++){
							
								$questions="<h2>"+obj.question+"</h2>";
								$("#headingques1").html($questions);
							
								if(options[i].is_comment==1){
								
									if(options[i].icon==""){
										var itag='<i class="icon-3x"  style="cursor:pointer"><img src="<?php echo ADMIN_PATH; ?>admin/img/uploads/'+options[i].image+'" id="iconimg'+options[i].id+'" style="cursor:pointer" class="icon-3x"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else if(options[i].icon=="" && options[i].image==""){
										var itag='<i class="icon-3x" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else{
										var itag='<i class="icon-3x '+options[i].icon+'" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									} 
									var html='<div  class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  href="#myModal" onclick="return coment('+options[i].id+','+options[i].question_id+');" data-toggle="modal" data-target="#myModal" data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+options[i].id+'">'+itag+'</label></span></a><p class="text-primary">'+options[i].name+'</p></div>';
								}else{
									if(options[i].icon==""){
										var itag='<i class="icon-3x"  style="cursor:pointer"><img src="<?php echo ADMIN_PATH; ?>admin/img/uploads/'+options[i].image+'" id="iconimg'+options[i].id+'" style="cursor:pointer" class="icon-3x"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else if(options[i].icon=="" && options[i].image==""){
										var itag='<i class="icon-3x" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else{
										var itag='<i class="icon-3x '+options[i].icon+'" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									} 
									
									var html='<div  class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+options[i].id+'">'+itag+'</label></span></a><p class="text-primary">'+options[i].name+'</p></div>';
								
								}
								
								$("#main1").append(html);	   	
							}
						}
						
						$("#main1").fadeIn(1000);
					}else{
						//alert("not ok");
						$("#back").html('');
						
						$.ajax({
							url: "<?php echo ADMIN_PATH; ?>WorkingHours/hourcalculation/",
							type: 'POST',
							
							success: function (result) {
							
								if(result=="null"){
								
									$("#para").html('');
									$("#headingques1").html('');
									$("#main1").html('');
									$("#back").html('');
									var html='<div class="estimate col-lg-12 col-md-7 col-sm-10 col-centered text-center fadeIn"><div class="price-container"><h1>Your app estimation </h1><h2>no data found</h2></div><div id="breakdown" class="js-breakdown"><div class="pick-crew"><p style="margin-left:25px;">Find a pro app or website maker. On Crew, we have the best app and website makers out there. Every single one carefully handpicked. Click below to get started or <a href="<?php echo ADMIN_PATH; ?>categories/start_flow" target="_blank" style="color:red">click here</a>for examples of the work being done on Crew.</p><form method="post" name="myform" action="../site_page/from.php"><input type="hidden" value="" name="userchooseid"><input type="hidden" value="" name="selection_list"><input id="userid" type="hidden" value="" name="user_id"><input type="hidden" value="" name="total_mul"><input type="hidden" value="" name="company_name"></form></div></div></div>';
										
									$("#lastdiv").append(html);
								
								}else{
									
									
									var obj=$.parseJSON(result);
									$("#para").html('');
									$("#headingques1").html('');
									$("#main1").html('');
									$("#back").html('');
									for(var i=0;i< obj.length;i++){
										var html='<div class="estimate col-lg-12 col-md-7 col-sm-10 col-centered text-center fadeIn"><div class="price-container"><h1>Your app estimation </h1><h2>$'+obj[i]+'</h2></div><div id="breakdown" class="js-breakdown"><div class="pick-crew"><p style="margin-left:25px;">Find a pro app or website maker. On Crew, we have the best app and website makers out there. Every single one carefully handpicked. Click below to get started or<a href="<?php echo ADMIN_PATH; ?>categories/start_flow" target="_blank" style="color:red">click here</a>for examples of the work being done on Crew.</p><form method="post" name="myform" action="../site_page/from.php"><input type="hidden" value="" name="userchooseid"><input type="hidden" value="" name="selection_list"><input id="userid" type="hidden" value="" name="user_id"><input type="hidden" value="" name="total_mul"><input type="hidden" value="" name="company_name"></form></div></div></div>';
										
										$("#lastdiv").append(html);
									
									}
								}
								
							}
						});
					}
				}
			});	
	}



	function goback(optid,questid,service,multi) {
	
		var getopt=document.getElementById(optid);
		
		var	index=getCookie('index');
		var indee= +index - +1;
		
		if(service == undefined){
			var	indei=getCookie('index');
			var indeo= +indei - +1;
			setCookie('index', indeo, 1);
		
		}
		for(var i=1;i <= indee; i++){
		
			
			var deltid=getCookie('step'+i);
			
			
			// this will return an array with strings "1", "2", etc.
			served = deltid.split("_");

			
			if(served[0]==service || served[0] > service ){
				var	inde=getCookie('index');
				var inde= +inde - +1;
				setCookie('index', inde, 1);
				
			}
			
			
		}
		
		var dat="data[servit]=" +service;
		
		$.ajax({
			url: "<?php echo ADMIN_PATH; ?>Relations/getback/" + optid ,
			type: 'POST',
			data: dat,
			success: function (result) {
				var obj=$.parseJSON(result);
				$("#main1").fadeOut(200);
				$("#main1").html('');
				var queid = 1;
				var options = obj.options;
				
				
				if(!(options)){
				
					var ques_id = 0;
					
					/*go previous button*/
					var catgy=getCookie("categoryid");
					$("#back").html('');
					var backbutt='<div class="top-nav clearfix" id="" style="float:left"><ul class="nav pull-right top-menu"><li class="dropdown"><a  class="dropdown-toggle" onclick="gofirstpage('+ catgy +')" >  Go Previous</a></li></ul></div>';
					$("#back").append(backbutt);
					/*end of previous button*/
					
					for(var i=0; i < obj.length; i++){
						
						$questions="<h2>What type of app are you building?</h2>";
						$("#headingques1").html($questions);
						
						var html='<div class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+obj[i].id+'"><i class="icon-3x icon-rockd" style="cursor:pointer" ><i class="circle-border"><input type="radio" name="'+obj[i].id+'" value="'+obj[i].id+'" onclick="newdata('+obj[i].id+','+ques_id+')" id= "'+obj[i].id+'" class="circle-border" /></i></i></label></span></a><p class="text-primary">'+obj[i].name+'</p></div>';
						
						$("#main1").append(html);
						$("#show"+i).fadeIn(2000);
					}	
					
				
				
				
				}else{
				
					var	it=getCookie('index');
					var inde= +it - +1;
					var	takeit=getCookie('step'+inde);
					
					var temp = new Array();
					temp = takeit.split("_");
					
					/*multiple choice strat div*/
					
					if(obj.is_multiple_choice==1){
					
						var	indexe=getCookie('index');
						
						/*go previous button*/
						$("#back").html('');
						var backbutt='<div class="top-nav clearfix" id="" style="float:left"><ul class="nav pull-right top-menu"><li class="dropdown"><a  class="dropdown-toggle" onclick="goback('+getCookie('optionid'+obj.id)+','+obj.id+','+temp[0]+','+2+')" >  Go Previous</a></li></ul></div>';
						$("#back").append(backbutt);
						/*end of previous button*/
						
						for(var i = 0; i < options.length; i++){
						
							$questions="<h2>"+obj.question+"</h2>";
							$("#headingques1").html($questions);
							
							var str1="'"+options[i].icon+"'";
							var str=String(str1);
							if(options[i].is_comment==1){
								
								
								if(options[i].icon==""){
								
										var img1="'"+options[i].image+"'";
										var imggee=String(img1);
										var imggeeno=1;
									
										var itag='<i class="icon-3x"  style="cursor:pointer"><img src="<?php echo ADMIN_PATH; ?>admin/img/uploads/'+options[i].image+'" id="iconimg'+options[i].id+'" style="cursor:pointer" class="icon-3x"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+imggee+',1,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else if(options[i].icon=="" && options[i].image==""){
										var itag='<i class="icon-3x" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+str+',2,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else{
										var img1="'"+options[i].icon+"'";
										var imggee=String(img1);
									
										var itag='<i class="icon-3x '+options[i].icon+'" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+str+',3,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									} 
								
								var html='<div  class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  href="#Modal" onclick="return coment1('+options[i].id+','+options[i].question_id+','+options[i].icon+','+imggee+','+imggeeno+');" data-toggle="modal" data-target="#Modal" data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+options[i].id+'">'+itag+'</label></span></a><p class="text-primary">'+options[i].name+'</p></div>';
								
							}else{
								
								if(options[i].icon==""){
								
										var img1="'"+options[i].image+"'";
										var imggee=String(img1);
								
										var itag='<i class="icon-3x"  style="cursor:pointer"><img src="<?php echo ADMIN_PATH; ?>admin/img/uploads/'+options[i].image+'" id="iconimg'+options[i].id+'" style="cursor:pointer" class="icon-3x"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+imggee+',1,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else if(options[i].icon=="" && options[i].image==""){
										var itag='<i class="icon-3x" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+str+',2,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									}else{
										var itag='<i class="icon-3x '+options[i].icon+'" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="return multiplechoice('+options[i].id+','+queid+','+options[i].question_id+','+str+',3,'+indexe+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
									} 
								var html='<div  class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+options[i].id+'">'+itag+'</label></span></a><p class="text-primary">'+options[i].name+'</p></div>';
								
							}
							var linked='<div id="links1" style="display:none" class="answer answer-not-selected" ><a class="icon-button js-answer"  data-question="type" data-answer="android" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+','+2+')"><span class="block-thumbnail maxheight col" style="height: 76px;"><i class="icon-3x fa fa-arrow-circle-right" style="cursor:pointer"><i class="circle-border"></i></i></span></a></div>';
						
							$("#main1").append(html);	   	
						}
					
					
						$("#main1").append(linked);
						
					}else{
					
					
						/*go previous button*/
						$("#back").html('');
						var backbutt='<div class="top-nav clearfix" id="" style="float:left"><ul class="nav pull-right top-menu"><li class="dropdown"><a  class="dropdown-toggle" onclick="goback('+getCookie('optionid'+obj.id)+','+obj.id+','+temp[0]+')" >  Go Previous</a></li></ul></div>';
						$("#back").append(backbutt);
						/*end of previous button*/
					
						for(var i = 0; i < options.length; i++){
						
							$questions="<h2>"+obj.question+"</h2>";
							$("#headingques1").html($questions);
							
							
							if(options[i].is_comment==1){
									
								if(options[i].icon==""){
									var itag='<i class="icon-3x"  style="cursor:pointer"><img src="<?php echo ADMIN_PATH; ?>admin/img/uploads/'+options[i].image+'" id="iconimg'+options[i].id+'" style="cursor:pointer" class="icon-3x"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
								}else if(options[i].icon=="" && options[i].image==""){
									var itag='<i class="icon-3x" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
								}else{
									var itag='<i class="icon-3x '+options[i].icon+'" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
								} 
								var html='<div  class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  href="#myModal" onclick="return coment('+options[i].id+','+options[i].question_id+','+temp[1]+');" data-toggle="modal" data-target="#myModal" data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+options[i].id+'">'+itag+'</label></span></a><p class="text-primary">'+options[i].name+'</p></div>';
							}else{
							
								if(options[i].icon==""){
									var itag='<i class="icon-3x"  style="cursor:pointer"><img src="<?php echo ADMIN_PATH; ?>admin/img/uploads/'+options[i].image+'" id="iconimg'+options[i].id+'" class="icon-3x"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
								}else if(options[i].icon=="" && options[i].image==""){
									var itag='<i class="icon-3x" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
								}else{
									var itag='<i class="icon-3x '+options[i].icon+'" id="iconimg'+options[i].id+'" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].id+'" onclick="newdata('+options[i].id+','+queid+','+options[i].question_id+')" id="'+options[i].id+'" class="circle-border" /></i></i>';
								} 
								var html='<div  class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+options[i].id+'">'+itag+'</label></span></a><p class="text-primary">'+options[i].name+'</p></div>';
							}
							
							$("#main1").append(html);	   	
						}
					}
				}
				
				$("#main1").fadeIn(1000);
			}
		});
		return false;
		
	}


	function getservice(cat){
		$("#once").html('');
		setCookie('index', 1, 1);
		setCookie('categoryid', cat, 1);
		
		$.ajax({
			url: "<?php echo ADMIN_PATH; ?>Services/getservice/" + cat,
				type: 'POST',
				success: function (result) {
				
					var obj=$.parseJSON(result);
					
					var ques_id = 0;
					$("#main1").html('');
					
					/*go previous button*/
					var catgy=getCookie("categoryid");
					$("#back").html('');
					var backbutt='<div class="top-nav clearfix" id="" style="float:left"><ul class="nav pull-right top-menu"><li class="dropdown"><a  class="dropdown-toggle" onclick="gofirstpage('+ cat +')" >  Go Previous</a></li></ul></div>';
					$("#back").append(backbutt);
					/*end of previous button*/
					
					for(var i=0; i < obj.length; i++){
					
						
						var html='<div class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+obj[i].id+'"><i class="icon-3x icon-rockd" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+obj[i].id+'" value="'+obj[i].id+'" onclick="newdata('+obj[i].id+','+ques_id+')" id= "'+obj[i].id+'" class="circle-border" /></i></i></label></span></a><p class="text-primary">'+obj[i].name+'</p></div>';
						
						$("#main1").append(html);
						$("#show"+i).fadeIn(2000);
					}	
					
				}
			});
			
		return false;

	}
	
	function comment(){
	
		var txtval=document.getElementById('text1').value;
		var opt=document.getElementById('optid').value;
		
		var que=document.getElementById('optid1').value;
		var del=document.getElementById('delid').value;
		var dat = { 'data[Options][comment]': txtval , 'data[Options][delid]': del, 'data[Options][question_id]': que};
		$.ajax({
			url: "<?php echo ADMIN_PATH; ?>Options/comment/"+opt,
				type: 'POST',
				data: dat,
				success: function (result) {
					document.getElementById('text2').value="";
					$("#close").click();
					
					document.getElementById('iconimg'+opt).className="";
					document.getElementById('iconimg'+opt).className="icon-3x fa-check";
					newdata(opt,1,que);
				return true;	
				}
			});
	
	}
	function coment(val,ques,temp){
		if(temp){
			document.getElementById('delid').value=temp;
		}else{
			document.getElementById('delid').value="0";
		}
		document.getElementById('optid').value=val;
		document.getElementById('optid1').value=ques;
	}
	
	function coment1(val,ques,temp,iconimgg,iconnumb){
		
		if(temp){
			document.getElementById('deleid').value=temp;
		}else{
			document.getElementById('deleid').value="0";
		}
		document.getElementById('optid2').value=val;
		document.getElementById('queid2').value=ques;
		
		
		document.getElementById('iconimggg').value=iconimgg;
		document.getElementById('iconnumbbb').value=iconnumb;
	}
	
	
	function addcomment(){
	
		
		document.getElementById('links1').style.display="inline-block";
		var txtval=document.getElementById('text2').value;
		var opt=document.getElementById('optid2').value;
		
		var iconimgg=document.getElementById('iconimggg').value;
		var iconnumb=document.getElementById('iconnumbbb').value;
		var imgg=document.getElementById('iconimg'+opt).src;
		var chpath="<?php echo ADMIN_PATH; ?>admin/img/uploads/011_yes-128.png";
		if(imgg==chpath){
			if(iconnumb==1){
				document.getElementById('iconimg'+opt).src="<?php echo ADMIN_PATH; ?>admin/img/uploads/"+iconimgg;
			}
		}else{
			if(iconnumb==1){
				document.getElementById('iconimg'+opt).src="<?php echo ADMIN_PATH; ?>admin/img/uploads/011_yes-128.png";
			}
		}
		
		var que=document.getElementById('queid2').value;
		var del=document.getElementById('deleid').value;
		var dat = { 'data[Options][comment]': txtval , 'data[Options][delid]': del, 'data[Options][question_id]': que};
		$.ajax({
			url: "<?php echo ADMIN_PATH; ?>Options/addcomment/"+opt,
				type: 'POST',
				data: dat,
				success: function (result) {
				
				var	index=getCookie('index');
				var ind= +index + +1;
				setCookie('index', ind, 1);
				setCookie('step'+index, que+"_"+opt, 1);
				$("#closee").click();
				
				document.getElementById('iconimg'+opt).className="";
				document.getElementById('iconimg'+opt).className="icon-3x fa-check";
				}
			});
	
	}
	
	function closesh(){
		document.getElementById('text2').value="";
		var txtvalget = $('#text2').val();
		var opt=document.getElementById('optid2').value;
		var iconimgg=document.getElementById('iconimggg').value;
		var iconnumb=document.getElementById('iconnumbbb').value;
		var imgg=document.getElementById('iconimg'+opt).src;
		var quess=document.getElementById('queid2').value;
		
		
		
		var chpath="<?php echo ADMIN_PATH; ?>admin/img/uploads/011_yes-128.png";
		if(txtvalget==""){
			if(imgg==chpath){
				var	index=getCookie('index');
				for(var i=0;i < index; i++){
					var deltid=getCookie('step'+i);
					var served = new Array();
					// this will return an array with strings "1", "2", etc.
					served = deltid.split("_");

					if(served[0]==quess && served[1] == opt){
						
						setCookie('step'+i, 0+'_'+0, 1);	
					}
				
				}
			
				/*get links1 back to none*/
				var	index=getCookie('index');
				for(var i=0;i < index; i++){
					var deltid=getCookie('step'+i);
					var served = new Array();
					// this will return an array with strings "1", "2", etc.
					served = deltid.split("_");

					if(served[0]!=quess){
						var gg=0;
					}else{
						var gg=1;
						break;
					}
				}
				if(gg==0){
					document.getElementById('links1').style.display="none";
				}
				/**/
		
				document.getElementById('iconimg'+opt).src="<?php echo ADMIN_PATH; ?>admin/img/uploads/"+iconimgg;
				$("#closee").click();
				
				
			}
		}
	}
	
	
	function gofirstpage(catid){
	
		var	index=getCookie('index');
		setCookie('step'+index, 0, 1);
		setCookie('index', 0, 1);
		setCookie('categoryid', 0, 1);
		setCookie('optionid', 0, 1);
		setCookie('serviceid', 0, 1);
		
		$.ajax({
			url: "<?php echo ADMIN_PATH; ?>Relations/gobackfirst/"+catid,
			type: 'POST',
			success: function (result) {
			
				var obj=$.parseJSON(result);
				
				var ques_id = 0;
				$("#main1").html('');
				$("#back").html('');
				for(var i=0; i < obj.length; i++){
					
					$questions="<h2>What type of app are you building?</h2>";
					$("#headingques1").html($questions);
					
					var html='<div class="answer answer-not-selected" id="show1" ><a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+obj[i].id+'"><i class="icon-3x icon-rockd" style="cursor:pointer"><i class="circle-border"><input type="radio" name="'+obj[i].id+'" value="'+obj[i].name+'" onclick="getservice('+obj[i].id+')" id= "'+obj[i].id+'" class="circle-border" /></i></i></label></span></a><p class="text-primary">'+obj[i].name+'</p></div>';
					
					$("#main1").append(html);
					$("#show"+i).fadeIn(2000);
				}	
				$("#main1").fadeIn(1000);				
			}
		});
	
	}
	</script>

	<style>
		.icon-list:before { content: "\f03a"; }
		.fa-check:before { content: "\f00c"; }
		.fa-question:before { content: "\f128"; }
		.fa-ban:before { content: "\f05e"; }
		.fa-sellsy:before { content: "\f213"; }
		.fa-newspaper-o:before { content: "\f1ea"; }
		.fa-file-text-o:before { content: "\f0f6"; }
		.fa-file-image-o:before { content: "\f1c5"; }
		.fa-video-camera:before { content: "\f03d"; }
		.fa-bullhorn:before { content: "\f0a1"; }
		.fa-question:before { content: "\f128"; }

		.fa-user:before {  content: "\f007";}
		.fa-facebook-official:before {  content: "\f230";}
		.fa-twitter:before {  content: "\f099";}
		.fa-google-plus-square:before {  content: "\f0d4";}
		.fa-exclamation-triangle:before {  content: "\f071";}
		.fa-desktop:before {  content: "\f108";}
		.icon-broadcast:before {  content: "\e00c";}
		.fa-barcode:before {  content: "\f02a";}
		.fa-database:before {  content: "\f1c0";}
		.fa-wifi:before { content: "\f1eb"; } 
		.fa-star-half-o:before {  content: "\f123"; } 
		.fa-check:before { content: "\f00c"; }
		
		.fa-map-marker:before { content: "\f041"; }
		.fa-file-text:before { content: "\f15c"; }
		.icon-troph:before {  content: "\f0c2";}
		.icon-cogd:before {  content: "\f10b";}
		.icon-rockd:before {  content: "\f13b";}
		.icon-beake:before {  content: "\f07a";}
		.pluginButton{padding:0 6px!important;margin-top: 6px!important;}
		.timeline-footer{display:none!important;} 
		.pluginCountBox{display:none!important;}
		
		.corners{
			font-size:8px;
		}
		.corner--t-l {
			margin-right: 5px;
			
		}
		.corner--t-r {
			margin-left: 5px;
			
		}
	</style>

	<div id="main">
		<div id="modalshow0" >
			<div class="corner-wrapper" >
				<div class="corners-top-wrapper">
					<div class="corners corner--t-l" id="back">
						<a href="<?php echo ADMIN_PATH; ?>users/add">Register as our partner</a>
					</div>
					<div class="corners corner--t-m hidden-xs">
						<span class="js-sitename" style="margin: 0px; background: none repeat scroll 0px 0px rgb(246, 246, 246); padding: 5px 8px; border-radius: 8px;">
							How Much to Make website and App</span>
						&nbsp;
					</div>
					<div class="corners corner--t-r" id="once">
						<a href="<?php echo ADMIN_PATH; ?>customers/add">Register as a customer</a>			
					</div>

				</div>
				
			</div>

			<!-- Content -->
			<div class="content" >
				<div class="container">
					<div class="js-page">
						<div class="question-header text-center">
							<div id="headingques1">
							<h2>What type of app are you building?</h2>
							</div>
							<p id="para">Apple iOS is a better choice to reach a more engaged user base. 
						Android has a broader reach, however, particularly in emerging markets, 
						like Asia and Africa.</p>
						</div>
						<div id="lastdiv"></div>
						<div class="question-answers text-center clearfix container-fluid" id="main1" style="margin-top:90px;">
						<?php foreach($categories as $category){ 
							?>
							<div class="answer answer-not-selected" id="show1" >

								<a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android">
									<span class="block-thumbnail maxheight col" style="height: 76px;"> 
										
										<label for="<?php echo h($category->id); ?>"><i class="icon-3x icon-rockd" style="cursor:pointer"><i class="circle-border"><input type="radio" name="<?php echo h($category->id) ?>" value="<?php echo h($category->name); ?>" onclick="getservice('<?php echo h($category->id)?>')" id="<?php echo h($category->id); ?>" class="circle-border" /></i></i></label>
										
									</span>
									
								</a>
								<p class="text-primary"><?php echo h($category->name); ?></p>
							</div>
							<?php } ?>

							
																			
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:50%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Required number of pages</h4>
			</div>
			<div class="modal-body row" style="padding-top:0px;">
				<div class="row">
					<div class="col-sm-12">
						<section class="panel">
							<div class="panel-body " style="padding-top:0px;">
								<div class="form-group" style="margin-top:0px;">
								   <div class="col-sm-12">
										<!--<form action="<?php echo ADMIN_PATH; ?>Options/comment/" method="post">-->
											<label>Enter no. of pages</label>
											<input type="hidden" name="data[Options][id]" id="optid"/>
											<input type="hidden"  id="optid1"/>
											<input type="hidden"  id="delid" />
											<input type="text" id="text1" name="data[Options][comment]" onblur="validate1()" placeholder="Enter the No. of pages" class="form-control input-sm m-bot15"/></br>
											<button type="submit" class="btn btn-danger" id="formbtn1" onclick="comment()" >Submit</button>
										<!--</form>-->
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
	<!-- modal -->
	
	
	
	<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:50%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onfocus="closesh();" id="closee" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Required number of pages</h4>
			</div>
			<div class="modal-body row" style="padding-top:0px;">
				<div class="row">
					<div class="col-sm-12">
						<section class="panel">
							<div class="panel-body " style="padding-top:0px;">
								<div class="form-group" style="margin-top:0px;">
								   <div class="col-sm-12">
										<!--<form action="<?php echo ADMIN_PATH; ?>Options/comment/" method="post">-->
											<label>Enter no. of pages</label>
											<input type="hidden" name="data[Options][id]" id="optid2"/>
											<input type="hidden" id="iconimggg"/>
											<input type="hidden" id="iconnumbbb"/>
											<input type="hidden"  id="queid2"/>
											<input type="hidden"  id="deleid" />
											<input type="text" id="text2" name="data[Options][comment]" onblur="validate2()" placeholder="Enter the No. of pages" class="form-control input-sm m-bot15"/></br>
											<button type="submit" class="btn btn-danger" id="formbtn1" onclick="addcomment()" >Submit</button>
										<!--</form>-->
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
	<!-- modal -->
	
<script type="text/javascript">
  var analytics=analytics||[];(function(){var e=["identify","track","trackLink","trackForm","trackClick","trackSubmit","page","pageview","ab","alias","ready","group"],t=function(e){return function(){analytics.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var n=0;n<e.length;n++)analytics[e[n]]=t(e[n])})(),analytics.load=function(e){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src=("https:"===document.location.protocol?"https://":"http://")+"d2dq2ahtl5zl1z.cloudfront.net/analytics.js/v1/"+e+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(t,n)};
  analytics.load("kwoii5a28o");
</script>



