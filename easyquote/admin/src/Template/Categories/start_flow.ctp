
<!-- CSS -->
		<link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>css/styles.css" media="all">
		<link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>css/style.css" media="all">
		<link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>css/bootstrap-theme.min.css" media="all">
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
function newdata(servid,quesid){

var dat="data[Question][sol]="+quesid;
//alert(dat);
	$.ajax({
		url: "<?php echo ADMIN_PATH; ?>questions/newdata/" + servid ,
			type: 'POST',
			data: dat,
			success: function (result) {
			
				var obj=$.parseJSON(result);
				$("#main1").fadeOut(500);
				$("#main1").html('');
				var queid = 1;
				
				var options = obj.options;
				for(var i = 0; i < options.length; i++){
				
					$questions="<h2>"+obj.question+"</h2>";
					$("#headingques1").html($questions);
					
					
					var html='<div style="display:none" class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+options[i].id+'"><i class="icon-3x icon-rockd"><i class="circle-border"><input type="radio" name="'+options[i].id+'" value="'+options[i].name+'" onclick="newdata('+options[i].id+','+queid+')" id="'+options[i].id+'" class="circle-border" /></i></i></label></span><p class="text-primary">'+options[i].name+'</p></a></div>';
					
					$("#main1").append(html);
					$("#show"+i).fadeIn(1000);
					
				}
				
			}
		});
		
	return false;

}

function getservice(cat){

	$.ajax({
		url: "<?php echo ADMIN_PATH; ?>Services/getservice/" + cat,
			type: 'POST',
			success: function (result) {
			
				var obj=$.parseJSON(result);
				
				var ques_id = 0;
				$("#main1").fadeOut(1000);
				$("#main1").html('');
				
				for(var i=0; i < obj.length; i++){
				
					/*$questions="<h2>"+obj.question+"</h2>";
					$("#headingques1").html($questions);*/
					
					var html='<div class="answer answer-not-selected" id="show'+i+'" ><a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android"><span class="block-thumbnail maxheight col" style="height: 76px;"><label for="'+obj[i].id+'"><i class="icon-3x icon-rockd"><i class="circle-border"><input type="radio" name="'+obj[i].id+'" value="'+obj[i].name+'" onclick="newdata('+obj[i].id+','+ques_id+')" id= "'+obj[i].id+'" class="circle-border" /></i></i></label></span><p class="text-primary">'+obj[i].name+'</p></a></div>';
					
					$("#main1").append(html);
					//$("#show"+i).fadeIn(2000);
				}	
				$("#main1").fadeIn(1000);
			}
		});
		
	return false;

}
</script>

<div id="main">
	<div id="modalshow0" >
		<div class="corner-wrapper" >
			<div class="corners-top-wrapper">
				<div class="corners corner--t-l">
									<!--<a class="js-back" id="pq0" href="#" onclick="prov(0)" style="display:none;">← Previous Question</a></br>-->
								<!--<a class="js-startover" style="" href="index.php">← Start Again</a>-->
				</div>
				<div class="corners corner--t-m hidden-xs">
					<span class="js-sitename" style="">
						How Much to Make website and App</span>
					&nbsp;
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
						<p>Apple iOS is a better choice to reach a more engaged user base. 
					Android has a broader reach, however, particularly in emerging markets, 
					like Asia and Africa.</p>
					</div>

					<div class="question-answers text-center clearfix container-fluid" id="main1" style="margin-top:90px;">
					<?php foreach($categories as $category){ ?>
						<div class="answer answer-not-selected" id="show1" >
						
							
							<a class="icon-button js-answer" id="rd1"  data-question="type" data-answer="android">
								<span class="block-thumbnail maxheight col" style="height: 76px;"> 
									
									<label for="<?php echo h($category->id); ?>"><i class="icon-3x icon-rockd"><i class="circle-border"><input type="radio" name="<?php echo h($category->id) ?>" value="<?php echo h($category->name); ?>" onclick="getservice('<?php echo h($category->id)?>')" id="<?php echo h($category->id); ?>" class="circle-border" /></i></i></label>
									
								</span>
								<p class="text-primary"><?php echo h($category->name); ?></p>
							</a>
							
						</div>
						<?php } ?>

						<!--<div class="answer answer-not-selected">
							
							<a class="icon-button js-answer" id="rd2"  data-question="type" data-answer="ios">
								<span class="block-thumbnail maxheight col" style="height: 76px;">
												
									<i class="icon-3x icon-beake"><i class="circle-border"></i></i>
								</span>
								<p class="text-primary">Ecommerce Site </p>
							</a>
						</div>
						<div class="answer answer-not-selected">
							
							<a class="icon-button js-answer"  id="rd3" data-question="type" data-answer="ios-android">
								<span class="block-thumbnail maxheight col" style="height: 76px;">
									
									<i class="icon-3x icon-cogd"><i class="circle-border"></i></i>
								</span>
								<p class="text-primary"> Mobile App </p>
							</a>
						</div>-->
																		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
  var analytics=analytics||[];(function(){var e=["identify","track","trackLink","trackForm","trackClick","trackSubmit","page","pageview","ab","alias","ready","group"],t=function(e){return function(){analytics.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var n=0;n<e.length;n++)analytics[e[n]]=t(e[n])})(),analytics.load=function(e){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src=("https:"===document.location.protocol?"https://":"http://")+"d2dq2ahtl5zl1z.cloudfront.net/analytics.js/v1/"+e+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(t,n)};
  analytics.load("kwoii5a28o");
</script>



