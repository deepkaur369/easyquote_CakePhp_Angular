

<link href="<?php echo BASE_PATH;?>css/toggleswitch.css" media="all" rel="stylesheet">
<script>
function getstatus(id,val){
	//alert(id);
	//var ids = document.getElementById('active'+id);
	var dat="data[active]=" +val;
	$.ajax({
		url: "<?php echo ADMIN_PATH; ?>users/getstatus/" + id ,
			type: 'POST',
			data: dat,
			success: function (result) {
			
				//alert(result);
				return false;	
				
			}
		});
		
	
}
</script>



<script>

function delconfirm(name){
	if(id){
		confirm("Are you sure you want to delete " +"'"+name+"'");
	}
}

function confm(id){
	
	var r = confirm("Do you really wants to delete " +"'"+id+"'");
	
	if (r == true) {
		$.ajax({
		url: "<?php echo BASE_PATH ?>Users/delete/" +id,
		type: "POST",
		success: function(abcd) {
			location.reload();
			//alert(abcd+' '+window.location.href );
			if(abcd=='ok'){
				location.reload();
			}
			/*$("#myModal").modal("hide")
			document.getElementById("UserUsername2").value="";*/
			}
		});
		return false;
	} else {
		txt = "You pressed Cancel!";
	}
}
</script>

<div class="col-lg-12">
	<section class="panel">
	
	
		<header class="panel-heading" style="height: 62px;">
			Users
				<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>Users/add">
					<i class="fa fa-plus" style="font-size:25px"> </i>
					<span class="iHover" style="display:block">New Users</span>
				</a>
		</header>
		
		
		<div class="panel-body">
			<section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                <thead>
				<tr>
					<th><?php echo  $this->Paginator->sort('name') ?></th>
					<th><?php echo  $this->Paginator->sort('email') ?></th>
					<th><?php echo  $this->Paginator->sort('company') ?></th>
					<th><?php echo  $this->Paginator->sort('phone no') ?></th>
					<th><?php echo  $this->Paginator->sort('active') ?></th>
					<th class="actions"><?php echo  __('Actions') ?></th>
				</tr>
				</thead>
				<tbody>
				<?php  
				$customer=($this->request->session()->read('type')== "customer");
				$user=($this->request->session()->read('type')=="user");
				if(!( $customer || $user )){
							
							foreach ($users as $user): 
						
							$dataid=h($user->id);
							$dataname=h($user->name);
							$datausername=h($user->username);
							$datacompany=h($user->company);
							$datalogo=h($user->logo);
							$dataphno=h($user->phone);
							$dataactive=h($user->active);
				
				?>
					<tr>
						<td><?php echo $dataname; //h($user->name) ?></td>
						<td><?php echo $datausername; // h($user->username) ?></td>
						<td><?php echo $datacompany; //h($user->company) ?></td>
						<td><?php echo $dataphno; //h($user->phone) ?></td>
						
						<!-- toogle switch starts -->
						<td class="inbox-small-cells">
							<?php
							$tmp=$dataactive==1?'Checked':'Unchecked'; 
							$hid=$dataid; 
							?>
							<div class="switch">
							  <input type="radio" class="switch-input" name="active<?php echo $hid;?>" value="1" id="week<?php echo $hid;?>" <?php if($dataactive==1){echo "checked";}?> onclick="getstatus(<?php echo $hid;?>,this.value)">
							  <label for="week<?php echo $hid;?>" class="switch-label switch-label-off">Enable</label>
							  <input type="radio" class="switch-input" name="active<?php echo $hid;?>" value="0" id="month<?php echo $hid;?>" <?php if($dataactive==0){echo "checked";}?> onclick="getstatus(<?php echo $hid;?>,this.value)">
							  <label for="month<?php echo $hid;?>" class="switch-label switch-label-on">Disable</label>
							  <span class="switch-selection"></span>
							</div>			
						</td>
						
						<!-- toogle switch ends  -->
						
						<td class="actions">
						
							<?php echo  $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Users/view/".$user->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php if($user->id == $this->request->session()->read('id')){ ?>
							<?php echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Users/edit/".$user->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							<?php } ?>
							
							<?php echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete {0}?', '"'.$user->name.'"')]) ?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"  style="cursor:pointer;" onclick="confm(<?php echo $user->id;?>)" >

							<!--href="<?php echo BASE_PATH."Users/delete/".$user->id; ?>"-->
								<i class="fa fa-trash-o fa-lg" ></i>

							</a>
								
						</td>
					</tr>

				<?php endforeach; }else{
				
				//print_r($users);exit;
							$dataid=$users->id;
							$dataname=$users->name;
							$datausername=$users->username;
							$datacompany=$users->company;
							$datalogo=$users->logo;
							$dataphno=$users->phone;
				?>
				
				<tr>
						<td><?php echo $dataname; //h($user->name) ?></td>
						<td><?php echo $datausername; // h($user->username) ?></td>
						<td><?php echo $datacompany; //h($user->company) ?></td>
						<td><?php echo $dataphno; //h($user->phone) ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Users/view/".$users->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Users/edit/".$users->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"   style="cursor:pointer;" onclick="confm(<?php echo $user->id; ?>)" >
							<!--href="<?php echo BASE_PATH."Users/delete/".$users->id; ?>"-->
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
								
						</td>
					</tr>
				
				<?php } ?>
				
				
				</tbody>
			</table>
			</section>
		</div>
		
		<?php if(!( $customer || $user )){ ?>
		<div class="col-sm-8">
			<div class="paginator">
				<ul class="pagination">
					<?php echo  $this->Paginator->prev('< ' . __('previous')) ?>
					<?php echo  $this->Paginator->numbers() ?>
					<?php echo  $this->Paginator->next(__('next') . ' >') ?>
				</ul>
				<p><?php echo  $this->Paginator->counter() ?></p>
			</div>
		</div>
		<?php } ?>
	 </section>
</div>

