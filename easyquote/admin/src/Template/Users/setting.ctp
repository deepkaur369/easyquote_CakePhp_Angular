

<link href="<?php echo BASE_PATH;?>css/toggleswitch.css" media="all" rel="stylesheet">
<script>
function getstatus(id,val){
	//alert(id);
	//var ids = document.getElementById('active'+id);
	var dat="active=" +val;
	$.ajax({
		url: "<?php echo ADMIN_PATH; ?>users/setting/" + id ,
			type: 'POST',
			data: dat,
			success: function (result) {
			
				//alert(result);
				if(result=="ok0"){
					confirm("Are You Sure! You want to ask for registeration after front_flow ends");
				}
				if(result=="ok1"){
					confirm("Are You Sure! You want to ask for registeration before front_flow starts");
				}
				return false;	
				
			}
		});
		
	
}
</script>



<script>

function delconfirm(id){
	if(id){
		confirm("Are you sure you want to delete # {0}?", +id);
	}
}

</script>

<div class="col-lg-12">
	<section class="panel">
	
	
		<header class="panel-heading" style="height: 62px;">
			Settings
				
		</header>
		
		
		<div class="panel-body">
			<table class="table">
				<thead>
				<tr>
					<th>Information</th>
					<th>Active</th>
				</tr>
				</thead>
				<tbody>
				<?php
							foreach($setting as $settings){
								$sett=$settings['active'];
								
								$dataid=$settings['id'];
								
								
								
							}
							if(empty($sett)){
									$sett=0;
								}
							 $tmp=$sett==1?'Checked':'Unchecked'; 
							 if(empty($dataid)){
								$dataid=0;
							 }
								$hid=$dataid;
							?>	
				
					<tr>
						<td>Change it if you want to ask the customer for registration before or after the front_flow starts</td>
						
						
						<!-- toogle switch starts -->
						<td class="inbox-small-cells">
							
							<div class="switch">
							  <input type="radio" class="switch-input" name="active<?php echo $hid;?>" value="1" id="week<?php echo $hid;?>" <?php if($sett==1){echo "checked";}?> onclick="getstatus(<?php echo $hid;?>,this.value)">
							  <label for="week<?php echo $hid;?>" class="switch-label switch-label-off">Before</label>
							  <input type="radio" class="switch-input" name="active<?php echo $hid;?>" value="0" id="month<?php echo $hid;?>" <?php if($sett==0){echo "checked";}?> onclick="getstatus(<?php echo $hid;?>,this.value)">
							  <label for="month<?php echo $hid;?>" class="switch-label switch-label-on">After</label>
							  <span class="switch-selection"></span>
							</div>	
							
						</td>
						
						<!-- toogle switch ends  -->
					</tr>
										
				</tbody>
			</table>
		</div>
	 </section>
</div>

