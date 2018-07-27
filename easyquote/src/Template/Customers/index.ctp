<div class="col-lg-12">
	
	<!--<div class="form-group" style="margin:0px;margin-bottom:20px;margin-top:40px;">
				
		&nbsp;&nbsp;
		<?php //foreach ($customers as $customer){
		//$customer_data=$customer->id;
		//}
		//if(empty($customers)){?><a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-30px;" href="<?php echo BASE_PATH;?>WorkingHours/add">
			<i class="fa fa-plus" style="font-size:25px"> </i>
			<span class="iHover" style="display:block">New Working Hours</span>
		</a><?php// } ?>-->
				
	</div>

	<section class="panel">
		<header class="panel-heading">
			Customers
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
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('name') ?></th>
					<th><?= $this->Paginator->sort('email') ?></th>
					<th><?= $this->Paginator->sort('password') ?></th>
					<th><?= $this->Paginator->sort('company') ?></th>
					<th><?= $this->Paginator->sort('website') ?></th>
					<th><?= $this->Paginator->sort('address') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$admin=($this->request->session()->read('type')== "admin");
				$user=($this->request->session()->read('type')== "user");
				if($admin){
				foreach ($customers as $customer): 
			?>
				<tr>
					<td><?= $this->Number->format($customer->id) ?></td>
					<td><?= h($customer->name) ?></td>
					<td><?= h($customer->email) ?></td>
					<td><?= h($customer->password) ?></td>
					<td><?= h($customer->company) ?></td>
					<td><?= h($customer->website) ?></td>
					<td><?= h($customer->address) ?></td>
					<td class="actions">
					
						<?/*= $this->Html->link(__('View'), ['action' => 'view', $customer->id])*/ ?>
						<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Customers/view/".$customer->id?>">
							<i class="fa fa-eye fa-lg"></i>
						</a>
							
						<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id])*/ ?>
						<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Customers/edit/".$customer->id?>">
							<i class="fa fa-edit fa-lg"></i>
						</a>
						
						<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) */?>
						<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Customers/delete/".$customer->id; ?>">
							<i class="fa fa-delete fa-lg" ></i>
						</a>
					</td>
				</tr>

			<?php endforeach; }else{
				
				?>
				
				<tr>
						<td><?= $customers->id ?></td>
						<td><?= $customers->name ?></td>
						<td><?= $customers->email ?></td>
						<td><?= $customers->password ?></td>
						<td><?= $customers->company ?></td>
						<td><?= $customers->website ?></td>
						<td><?= $customers->address ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Customers/view/".$customers->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Customers/edit/".$customers->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Customers/delete/".$customers->id; ?>">
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
								
						</td>
					</tr>
				
				<?php } ?>
			</tbody>
		</table>
	</div>

	<?php if($admin || $user){?>
		<div class="col-sm-8">
			<div class="paginator">
				<ul class="pagination">
					<?= $this->Paginator->prev('< ' . __('previous')) ?>
					<?= $this->Paginator->numbers() ?>
					<?= $this->Paginator->next(__('next') . ' >') ?>
				</ul>
				<p><?= $this->Paginator->counter() ?></p>
			</div>
		</div>
		<?php } ?>
	</section>
</div>
