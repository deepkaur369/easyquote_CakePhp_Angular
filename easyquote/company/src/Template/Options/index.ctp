<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Options
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
					<th><?= $this->Paginator->sort('question_id') ?></th>
					<th><?= $this->Paginator->sort('name') ?></th>
					<th><?= $this->Paginator->sort('icon') ?></th>
					<th><?= $this->Paginator->sort('is_chargeable') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($options as $option): ?>
				<tr>
					<td><?= $this->Number->format($option->id) ?></td>
					<td>
						<?= $option->has('question') ? $this->Html->link($option->question->id, ['controller' => 'Questions', 'action' => 'view', $option->question->id]) : '' ?>
					</td>
					<td><?= h($option->name) ?></td>
					<td><?= h($option->icon) ?></td>
					<td><?= h($option->is_chargeable) ?></td>
					<td class="actions">
					
						<?/*= $this->Html->link(__('View'), ['action' => 'view', $option->id])*/ ?>
						<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Options/view/".$option->id?>">
								<i class="fa fa-eye fa-lg"></i>
						</a>
							
						<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $option->id])*/ ?>
						<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Options/edit/".$option->id?>">
								<i class="fa fa-edit fa-lg"></i>
						</a>
							
						<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $option->id], ['confirm' => __('Are you sure you want to delete # {0}?', $option->id)])*/ ?>
						<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Options/delete/".$option->id; ?>">
								<i class="fa fa-delete fa-lg" ></i>
						</a>
					</td>
				</tr>

			<?php endforeach; ?>
			</tbody>
		</table>
	</div>

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
	</section>
</div>
