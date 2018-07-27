	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Categories
				
			</header>
			<div class="panel-body">
				<table class="table">
					<thead>
					<tr>
						<th><?= $this->Paginator->sort('name') ?></th>
						<th><?= $this->Paginator->sort('date') ?></th>
						<th class="actions"><?= __('Actions') ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($categories as $category): ?>
						<tr>
							<td><?= h($category->name) ?></td>
							<td><?= h($category->date) ?></td>
							<td class="actions">
							
								<?/*= $this->Html->link(__('View'), ['action' => 'view', $category->id])*/ ?>
								<!--<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Categories/view/".$category->id?>">
									<i class="fa fa-eye fa-lg"></i>
								</a>-->
						
								<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id])*/ ?>
								<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Categories/edit/".$category->id?>">
									<i class="fa fa-edit fa-lg"></i>
								</a>
								
								<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) */?>
								<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Categories/delete/".$category->id; ?>">
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
