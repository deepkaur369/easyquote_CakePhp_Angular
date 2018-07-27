
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Questions
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
						<th><?= $this->Paginator->sort('service_id') ?></th>
						<th><?= $this->Paginator->sort('is_multiple_choice') ?></th>
						<th class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($questions as $question): ?>
					<tr>
						<td><?= $this->Number->format($question->id) ?></td>
						<td>
							<?= $question->has('service') ? $this->Html->link($question->service->name, ['controller' => 'Services', 'action' => 'view', $question->service->id]) : '' ?>
						</td>
						<td><?= h($question->is_multiple_choice) ?></td>
						<td class="actions">
						
							<?/*= $this->Html->link(__('View'), ['action' => 'view', $question->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Questions/view/".$question->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Questions/edit/".$question->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Questions/delete/".$question->id; ?>">
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
<script>
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
   // document.cookie = cname + "=" + cvalue + "; " + expires;
	document.cookie = cname +"=" + cvalue + ";expires=" + expires  + ";path=/";
}

setCookie('test', 'tested okjhgjh gjhg jhfgjhfgfghfghfghf', 1);
</script>