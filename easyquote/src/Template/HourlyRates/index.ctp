<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Hourly Rates
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
					<th><?= $this->Paginator->sort('service_id') ?></th>
					<th><?= $this->Paginator->sort('rate') ?></th>
					<th><?= $this->Paginator->sort('date') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
				</thead>
				<tbody>
				<?php 
				$admin=($this->request->session()->read('type')== "admin");
				$user=($this->request->session()->read('type')== "user");
				if($admin){
					foreach ($hourlyRates as $hourlyRate): ?>
					<tr>
						<td><?= $this->Number->format($hourlyRate->id) ?></td>
						<td>
							<?= $hourlyRate->has('user') ? $this->Html->link($hourlyRate->user->name, ['controller' => 'Users', 'action' => 'view', $hourlyRate->user->id]) : '' ?>
						</td>
						<td>
							<?= $hourlyRate->has('service') ? $this->Html->link($hourlyRate->service->name, ['controller' => 'Services', 'action' => 'view', $hourlyRate->service->id]) : '' ?>
						</td>
						<td><?= h($hourlyRate->rate) ?></td>
						<td><?= h($hourlyRate->date) ?></td>
						<td class="actions">
						
							<?/*= $this->Html->link(__('View'), ['action' => 'view', $hourlyRate->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."HourlyRates/view/".$hourlyRate->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $hourlyRate->id]) */?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."HourlyRates/edit/".$hourlyRate->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hourlyRate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hourlyRate->id)])*/ ?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."HourlyRates/delete/".$hourlyRate->id; ?>">
								<i class="fa fa-delete fa-lg" ></i>
							</a>
							
						</td>
					</tr>

				<?php endforeach; }else {
				foreach ($hourlyRates as $hourlyRate){
				?>
					<tr>
						<td><?= $hourlyRate->id ?></td>
						<td><?= $hourlyRate->user->name ?></td>
						<td><?= $hourlyRate->service->name ?></td>
						<td><?= $hourlyRate->rate ?></td>
						<td><?= $hourlyRate->date ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."HourlyRates/view/".$hourlyRate->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."HourlyRates/edit/".$hourlyRate->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."HourlyRates/delete/".$hourlyRate->id; ?>">
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
