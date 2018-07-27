<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Projects
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
						<th><?= $this->Paginator->sort('hire_id') ?></th>
						<th><?= $this->Paginator->sort('name') ?></th>
						<th><?= $this->Paginator->sort('url') ?></th>
						<th><?= $this->Paginator->sort('screenshot') ?></th>
						<th class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$admin=($this->request->session()->read('type')== "admin");
				$user=($this->request->session()->read('type')== "user");
				if($admin){
					foreach ($projects as $project): ?>
					<tr>
						<td><?= $this->Number->format($project->id) ?></td>
						<td>
							<?= $project->has('user') ? $this->Html->link($project->user->name, ['controller' => 'Users', 'action' => 'view', $project->user->id]) : '' ?>
						</td>
						<td>
							<?= $project->has('service') ? $this->Html->link($project->service->name, ['controller' => 'Services', 'action' => 'view', $project->service->id]) : '' ?>
						</td>
						<td>
							<?= $project->has('hire') ? $this->Html->link($project->hire->id, ['controller' => 'Hires', 'action' => 'view', $project->hire->id]) : '' ?>
						</td>
						<td><?= h($project->name) ?></td>
						<td><?= h($project->url) ?></td>
						<td><?= h($project->screenshot) ?></td>
						<td class="actions">
						
							<?/*= $this->Html->link(__('View'), ['action' => 'view', $project->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Projects/view/".$project->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Projects/edit/".$project->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)])*/ ?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Projects/delete/".$project->id; ?>">
								<i class="fa fa-delete fa-lg" ></i>
							</a>
						</td>
					</tr>

				<?php endforeach; }else {
				foreach ($projects as $project){
				?>
					<tr>
						<td><?= $project->id ?></td>
						<td><?= $project->user->name ?></td>
						<td><?= $project->service->name ?></td>
						<td><?= $project->hire->id ?></td>
						<td><?= $project->name ?></td>
						<td><?= $project->url ?></td>
						<td><?= $project->screenshot ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Projects/view/".$project->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Projects/edit/".$project->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Projects/delete/".$project->id; ?>">
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
