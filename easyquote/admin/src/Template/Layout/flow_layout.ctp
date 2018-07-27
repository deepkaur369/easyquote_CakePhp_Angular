<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset() ?>
    <link rel="shortcut icon" href="<?php echo ADMIN_PATH; ?>webroot/img/favicon.png">
    <title>
        <?php echo $this->fetch('title') ?>
	</title>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>
    <link href="<?php echo ADMIN_PATH; ?>bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>css/bootstrap-reset.css" rel="stylesheet">
	 <link href="<?php echo ADMIN_PATH; ?>bs3.0/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo ADMIN_PATH; ?>css/style.css" rel="stylesheet">


</head>
<body>

<section id="container">

<header class="header fixed-top clearfix">

<div class="brand">
    <a href="<?php echo ADMIN_PATH; ?>" class="logo">  <img src="<?php echo ADMIN_PATH; ?>webroot/images/logo.png" alt="logo"> </a>
</div>

<div class="nav notify-row" id="top_menu">

	<?php 
		if(!empty($services)){ 
			$cat=0;$ser=0; $catgy_name=0;$catgy_id=0; 
			foreach($services as $service){
				$cat=$service->category_id;
				$ser=$service->name;
				if(isset($service->category)){
				$catgy_id=$service->category->id;
				}
				if($cat==$catgy_id){
					$catgy_name=$service->category->name;
				}
			} 
			
		}else{ 
			$catgy_name="Select Category";
			$ser=""; 
		} ?>
		
		
	<div style="width:180px;float:left">
		<?php echo $this->Form->input('category_id',['options' => $categories,'label'=>false,'class'=>"form-control",'placeholder'=>"",'empty'=>$catgy_name,'id'=>'category']); ?>
	</div>
	
	<div style="width:180px;float:left;margin-left:10px;">	
		<input type="text" id="service" value="<?php echo $ser; ?>" class="form-control" placeholder="Service Name" />
		
	</div>

	<div style="width:300px;float:left;margin-left:10px;">	
		<button type="submit" id="creatService" onclick="setService()" class="btn btn-default">Create Flow</button>
		
	</div>	

</div>

<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li class="dropdown">
            <a  class="dropdown-toggle" href="<?php echo ADMIN_PATH; ?>Services/index">
              &nbsp;  Go Back
            </a>
        </li>   
    </ul>
</div>
</header>
	<section id="main-content" style="margin-left:0px!important">
		<section class="wrapper" style="  margin-top: 0px!important">
	
		
<!--mini statistics start  AND FLOW CSS AND JQUERY -->

			<link href="<?php echo ADMIN_PATH; ?>flow/font-awesome.css" rel="stylesheet">
			<link href="<?php echo ADMIN_PATH; ?>flow/jsplumb.css" rel="stylesheet">
			<link rel="stylesheet" href="<?php echo ADMIN_PATH; ?>flow/demo.css">

			<div class="row">
				<?php echo $this->fetch('content') ?>
			</div>

			<script src="<?php echo ADMIN_PATH; ?>flow/jquery-1.9.0-min.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/jquery-ui-1.9.2.min.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/jquery.ui.touch-punch-0.2.2.min.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/jsBezier-0.7.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/mottle-0.6.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/biltong-0.2.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/util.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/browser-util.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/jsPlumb.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/dom-adapter.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/overlay-component.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/endpoint.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/connection.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/anchors.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/defaults.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/connectors-bezier.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/connectors-statemachine.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/connectors-flowchart.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/connector-editors.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/renderers-svg.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/renderers-vml.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/base-library-adapter.js"></script>
			<script src="<?php echo ADMIN_PATH; ?>flow/jquery.jsPlumb.js"></script>

			<script>

			function setCookie(cname, cvalue, exdays) {
				var d = new Date();
				d.setTime(d.getTime() + (exdays*24*60*60*1000));
				var expires = "expires="+d.toUTCString();
				document.cookie = cname +"=" + cvalue + ";expires=" + expires  + ";path=/";
			}
			setCookie('js_status', 'null', 1);
			
			jsPlumb.ready(function () {

				var instance = jsPlumb.getInstance({
					Endpoint: ["Dot", {radius: 0.1}],
					HoverPaintStyle: {strokeStyle: "#1e8151", lineWidth: 2 },
					ConnectionOverlays: [
						[ "Arrow", {
							location: 1,
							id: "arrow",
							length: 5,
							foldback: 0.6
						} ],
						[ "Label", { label: "Flow", id: "label", cssClass: "aLabel" }]
					],
					Container: "statemachine-demo"
				});

				window.jsp = instance;

				var windows = jsPlumb.getSelector(".statemachine-demo .w");

				instance.draggable(windows);

				instance.bind("click", function (c) {
					var target = c.targetId;
					var source = c.sourceId;
					var type = $('#type'+target).val();
					if(type=='question'){
						$('#'+source+'-'+target).remove();	
					}	
					var status = getCookie("js_status");
					if(status != 'null'){
					
						var l_insert_id = $('#last_insert_id_'+target).val();
						var parent_id_ = $('#last_insert_id_'+target).val();
						var data = {'type':type,'li_id':l_insert_id};		
						$.ajax({
							url: "<?php echo BASE_PATH  ?>questions/checkchild/"+target,	
							type: "POST",
							data: data,		
							cache: false,  
							success: function (data) {
								if(data=="ok"){
									removeConnection(c.targetId,c);
								}else{
									alert("you cannot delete it without deleting its child");
								}
							}		
						});
						return false;
							
						
						
					}else{
						alert('Please click on the enable editing button');
					}
				});

				/* Custom code to detect drag & Drop */
				instance.bind("connection", function (info) {
			
					info.connection.getOverlay("label").setLabel(info.connection.id);
					var conn = info.connection;
					var target = info.targetId;
					var source = info.sourceId;
					var status = getCookie("js_status");
					if(status != 'null'){
						
						setConnection(source,target,conn);
						
					}
					
				});

				instance.batch(function () {
					instance.makeSource(windows, {
						filter: ".ep",
						anchor: "Continuous",
						connector: [ "StateMachine", { curviness: 20 } ],
						connectorStyle: { strokeStyle: "#1fb5ad", lineWidth: 1, outlineColor: "transparent", outlineWidth: 4 },
						maxConnections: 1,
						onMaxConnections: function (info, e) {
							alert("Maximum connections (" + info.maxConnections + ") reached");
						}
					});

					instance.makeTarget(windows, {
						dropOptions: { hoverClass: "dragHover" },
						anchor: "Continuous",
						allowLoopback: true
					});
						
					// from relation
					<?php
					if(isset($options)){
						
						foreach($relations as $data){
					?>
							
						instance.connect({ source: "<?php echo $data['source']; ?>", target: "<?php echo $data['target']; ?>" });	
						
					<?php	
						}
					?>
	
					//from options
					<?php
					
						foreach($options as $data){
						
					?>
							
						instance.connect({ source: "<?php echo $data['source']; ?>", target: "<?php echo $data['target']; ?>" });
						
					<?php	
						
						
						} }
					?>
							
					
				});

				jsPlumb.fire("jsPlumbDemoLoaded", instance);
				
				
			
			});
			

	
</script>


			
			</script>
			<script src="<?php echo ADMIN_PATH; ?>flow/demo-list.js"></script>
			
<!--mini statistics end  AND FLOW CSS AND JQUERY -->
			
		</section>
	</section>
</section>

<script src="<?php echo ADMIN_PATH; ?>bs3/js/bootstrap.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>js/scripts.js"></script>
</body>
</html>