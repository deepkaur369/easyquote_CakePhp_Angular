
<script>

function delconfirm(id){
	if(id){
		confirm("Are you sure you want to delete # {0}?", +id);
	}
}

</script>

<div class="col-lg-12">
	<section class="panel">
	
		
		<div class="form-group" style="margin:0px;">
				
				&nbsp;&nbsp;
				<?php if(empty($users)){?><a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-30px;" href="<?php echo BASE_PATH;?>admin/Users/c_add">
					<i class="fa fa-plus" style="font-size:25px"> </i>
					<span class="iHover" style="display:block">New Users</span>
				</a><?php } ?>
						
			</div>
		<header class="panel-heading">
			Users
			
		</header>
		<div class="panel-body">
			<table class="table">
				<thead>
				<tr>
					<th><?php echo  $this->Paginator->sort('name') ?></th>
					<th><?php echo  $this->Paginator->sort('email') ?></th>
					<th><?php echo  $this->Paginator->sort('company') ?></th>
					<th><?php echo  $this->Paginator->sort('phone no') ?></th>
					<th class="actions"><?php echo  __('Actions') ?></th>
				</tr>
				</thead>
				<tbody>
				<?php  
				$customer=($this->request->session()->read('type')== "customer");
				$user=($this->request->session()->read('type')=="user");
				$client=($this->request->session()->read('type')=="client");
				if(!( $customer || $user || $client)){
							
							foreach ($users as $user): 
						
							$dataid=h($user->id);
							$dataname=h($user->name);
							$datausername=h($user->username);
							$datacompany=h($user->company);
							$datalogo=h($user->logo);
							$dataphno=h($user->phone);
				
				?>
					<tr>
						<td><?php echo $dataname; //h($user->name) ?></td>
						<td><?php echo $datausername; // h($user->username) ?></td>
						<td><?php echo $datacompany; //h($user->company) ?></td>
						<td><?php echo $dataphno; //h($user->phone) ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Users/c_view/".$user->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Users/c_edit/".$user->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Users/c_delete/".$user->id; ?>">
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
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Users/c_view/".$users->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Users/c_edit/".$users->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Users/c_delete/".$users->id; ?>">
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
								
						</td>
					</tr>
				
				<?php } ?>
				
				
				</tbody>
			</table>
		</div>
		
		<!--<?php if($client){ ?>
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
		<?php } ?>-->
	 </section>
</div>

