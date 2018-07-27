
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
				<?php if(empty($users)){?><a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-30px;" href="<?php echo BASE_PATH;?>admin/Users/add">
					<i class="fa fa-plus" style="font-size:25px"> </i>
					<span class="iHover" style="display:block">New Users</span>
				</a><?php } ?>
						
			</div>
		<header class="panel-heading">
			Users
			
			<span class="tools pull-right">
				<a href="javascript:;" class="fa fa-chevron-down"></a>
				<a href="javascript:;" class="fa fa-cog"></a>
				<a href="javascript:;" class="fa fa-times"></a>
			 </span>
		</header>
		<div class="panel-body">
			<table class="table">
				<thead>
				<tr>
					<th><?php echo  $this->Paginator->sort('name') ?></th>
					<th><?php echo  $this->Paginator->sort('username') ?></th>
					<th><?php echo  $this->Paginator->sort('password') ?></th>
					<th><?php echo  $this->Paginator->sort('company') ?></th>
					<th><?php echo  $this->Paginator->sort('logo') ?></th>
					<th><?php echo  $this->Paginator->sort('type') ?></th>
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
							$datapassword=h($user->password);
							$datacompany=h($user->company);
							$datalogo=h($user->logo);
							$datatype=h($user->type);
				
				?>
					<tr>
						<td><?php echo $dataname; //h($user->name) ?></td>
						<td><?php echo $datausername; // h($user->username) ?></td>
						<td><?php echo $datapassword; //h($user->password) ?></td>
						<td><?php echo $datacompany; //h($user->company) ?></td>
						<td><?php echo $datalogo; //h($user->logo) ?></td>
						<td><?php echo $datatype; ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Users/view/".$user->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Users/edit/".$user->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Users/delete/".$user->id; ?>">
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
								
						</td>
					</tr>

				<?php endforeach; }else{
				
				//print_r($users);exit;
							$dataid=$users->id;
							$dataname=$users->name;
							$datausername=$users->username;
							$datapassword=$users->password;
							$datacompany=$users->company;
							$datalogo=$users->logo;
							$datatype=$users->type;
				?>
				
				<tr>
						<td><?php echo $dataname; //h($user->name) ?></td>
						<td><?php echo $datausername; // h($user->username) ?></td>
						<td><?php echo $datapassword; //h($user->password) ?></td>
						<td><?php echo $datacompany; //h($user->company) ?></td>
						<td><?php echo $datalogo; //h($user->logo) ?></td>
						<td><?php echo $datatype; ?></td>
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
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Users/delete/".$users->id; ?>">
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
								
						</td>
					</tr>
				
				<?php } ?>
				
				
				</tbody>
			</table>
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

