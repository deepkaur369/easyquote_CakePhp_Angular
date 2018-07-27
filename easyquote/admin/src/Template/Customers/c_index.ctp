<div class="col-lg-12">
	
	
				
	

	<section class="panel">
		<header class="panel-heading">
			Customers
			
		</header>
		<div class="panel-body">
		<section id="unseen">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
				<tr>
					<th><?= $this->Paginator->sort('name') ?></th>
					<th><?= $this->Paginator->sort('email') ?></th>
					<th><?= $this->Paginator->sort('website') ?></th>
					<th><?= $this->Paginator->sort('address') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$admin=($this->request->session()->read('type')== "admin");
				$user=($this->request->session()->read('type')== "user");
				$client=($this->request->session()->read('type')== "client");
				if($admin){
				foreach ($customers as $customer): 
			?>
				<tr>
					<td><?= h($customer->name) ?></td>
					<td><?= h($customer->email) ?></td>
					<td><?= h($customer->website) ?></td>
					<td><?= h($customer->address) ?></td>
					<td class="actions">
					
						<?/*= $this->Html->link(__('View'), ['action' => 'view', $customer->id])*/ ?>
						<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Customers/c_view/".$customer->id?>">
							<i class="fa fa-eye fa-lg"></i>
						</a>
							
						<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id])*/ ?>
						<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Customers/c_edit/".$customer->id?>">
							<i class="fa fa-edit fa-lg"></i>
						</a>
						
						<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) */?>
						<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Customers/c_delete/".$customer->id; ?>">
							<i class="fa fa-delete fa-lg" ></i>
						</a>
					</td>
				</tr>

			<?php endforeach; }else{
				
				?>
				
				<tr>
						<td><?= $customers->name ?></td>
						<td><?= $customers->email ?></td>
						<td><?= $customers->website ?></td>
						<td><?= $customers->address ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Customers/c_view/".$customers->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php if(!($user || $client || $admin)){ ?>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Customers/c_edit/".$customers->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Customers/c_delete/".$customers->id; ?>">
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
							
							<?php } ?>
								
						</td>
					</tr>
				
				<?php } ?>
			</tbody>
		</table>
		</section>
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
