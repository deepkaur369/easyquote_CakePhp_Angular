<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Hires
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
					<th><?= $this->Paginator->sort('user_id') ?></th>
					<th><?= $this->Paginator->sort('customer_id') ?></th>
					<th><?= $this->Paginator->sort('selection_id') ?></th>
					<th><?= $this->Paginator->sort('date') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
				</thead>
				<tbody>
				<?php 
					$admin=($this->request->session()->read('type')== "admin");
					$user=($this->request->session()->read('type')== "user");
					if($admin || $user){
					foreach ($hires as $hire): ?>
					<tr>
						<td><?= $this->Number->format($hire->id) ?></td>
						<td>
							<?= $hire->has('user') ? $this->Html->link($hire->user->name, ['controller' => 'Users', 'action' => 'view', $hire->user->id]) : '' ?>
						</td>
						<td>
							<?= $hire->has('customer') ? $this->Html->link($hire->customer->name, ['controller' => 'Customers', 'action' => 'view', $hire->customer->id]) : '' ?>
						</td>
						<td>
							<?= $hire->has('selection') ? $this->Html->link($hire->selection->id, ['controller' => 'Selections', 'action' => 'view', $hire->selection->id]) : '' ?>
						</td>
						<td><?= h($hire->date) ?></td>
						<td class="actions">
						
							<?/*= $this->Html->link(__('View'), ['action' => 'view', $hire->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Hires/view/".$hire->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $hire->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Hires/edit/".$hire->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hire->id)])*/ ?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Hires/delete/".$hire->id; ?>">
								<i class="fa fa-delete fa-lg" ></i>
							</a>
						</td>
					</tr>

				<?php endforeach; }else{
				foreach ($hires as $hire){
				?>
					<tr>
						<td><?= $hire->id ?></td>
						<td><?= $hire->user->name ?></td>
						<td><?= $hire->customer->name ?></td>
						<td><?= $hire->selection->id ?></td>
						
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Hires/view/".$hire->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Hires/edit/".$hire->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Hires/delete/".$hire->id; ?>">
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
								
						</td>
					</tr>
				
				<?php } } ?>
				</tbody>
			</table>
		</div>

		<?php if($admin){ ?>
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
