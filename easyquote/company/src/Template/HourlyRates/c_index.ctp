<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Hourly Rates
			<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>HourlyRates/add">
				<i class="fa fa-plus" style="font-size:25px"> </i>
				<span class="iHover" style="display:block">New Hourly Rates</span>
			</a></br></br>
		</header>
		<div class="panel-body">
		<section id="unseen">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
				<tr>
					<th><?= $this->Paginator->sort('service') ?></th>
					<th><?= $this->Paginator->sort('website') ?></th>
					<th><?= $this->Paginator->sort('rate') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
				</thead>
				<tbody>
				<?php 
				$admin=($this->request->session()->read('type')== "admin");
				$user=($this->request->session()->read('type')== "user");
				$client=($this->request->session()->read('type')== "client");
				?> 
				<?php foreach ($hourlyRates as $hourlyRate){
				?>
					<tr>
						<td><?= h($hourlyRate->service->name) ?></td>
						<td><?= h($hourlyRate->user->website) ?></td>
						<td><?= $hourlyRate->rate ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<!--<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."HourlyRates/view/".$hourlyRate->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>-->
							
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."HourlyRates/edit/".$hourlyRate->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."HourlyRates/delete/".$hourlyRate->id; ?>">
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
								
						</td>
					</tr>
				
				<?php } ?>
				</tbody>
			</table>
			</section>
		</div>

		
		<!--<div class="col-sm-8">
			<div class="paginator">
				<ul class="pagination">
					<?= $this->Paginator->prev('< ' . __('previous')) ?>
					<?= $this->Paginator->numbers() ?>
					<?= $this->Paginator->next(__('next') . ' >') ?>
				</ul>
				<p><?= $this->Paginator->counter() ?></p>
			</div>
		</div>-->
		
	</section>
</div>
