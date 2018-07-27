<style>
	.fa-plus-circle:before {
	  content: "\f055";
	}
</style>


<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading" style="height: 62px;" >
			Service's Flow
			<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>Questions/flow">
					<i class="fa fa-plus" style="font-size:25px"> </i>
					<span class="iHover" style="display:block">New Flow</span>
				</a>
		</header>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						
						<th><?= $this->Paginator->sort('service_id') ?></th>
						
						<th class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($questions as $question): ?>
					<tr>
						
						<td>
							<?php echo $question->service->name ?>
						</td>
						
						<td class="actions">

							<a class="tooltips" data-original-title="Update" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Questions/update/".$question->service->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>

							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Questions/delete/".$question->service->id; ?>">
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