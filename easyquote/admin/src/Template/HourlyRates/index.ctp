<script>

function confm(id){
	
	var r = confirm("Do you really wants to delete id no" +id);
	
	if (r == true) {
		$.ajax({
		url: "<?php echo BASE_PATH ?>HourlyRates/delete/" +id,
		type: "POST",
		success: function(abcd) {
			location.reload();
			//alert(abcd+' '+window.location.href );
			if(abcd=='ok'){
				location.assign(window.location.href );
			}
			/*$("#myModal").modal("hide")
			document.getElementById("UserUsername2").value="";*/
			}
		});
		return false;
	} else {
		txt = "You pressed Cancel!";
	}
}
</script>

<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading" style="height: 62px;">
			Hourly Rates
			<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>HourlyRates/add">
					<i class="fa fa-plus" style="font-size:25px"> </i>
					<span class="iHover" style="display:block">New Rates</span>
				</a>
		</header>
		<div class="panel-body">
			<section id="unseen">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
				<tr>
					<th><?= $this->Paginator->sort('name') ?></th>
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
				if($admin){
					foreach ($hourlyRates as $hourlyRate): ?>
					<tr>
						<?php if(isset($hourlyRate->user)){ ?>
						<td><?= h($hourlyRate->user->name) ?></td>
						<td><?= h($hourlyRate->service->name) ?></td>
						<td><?= h($hourlyRate->user->website) ?></td>
						<?php } ?>
						<td><?= h($hourlyRate->rate) ?></td>
						<td class="actions">
						
							<?= $this->Html->link(__('View'), ['action' => 'view', $hourlyRate->id]) ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."HourlyRates/view/".$hourlyRate->id?>">
							<i class="fa fa-eye fa-lg"></i>	
							</a>
							
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $hourlyRate->id]) ?>
							
							<?php 
							if(isset($hourlyRate->user)){
							if(h($hourlyRate->user->id == $this->request->session()->read('id'))){ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."HourlyRates/edit/".$hourlyRate->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							<?php } }?>
							
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hourlyRate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hourlyRate->id)]) ?>
							

							<?php
							if(isset($hourlyRate->user)){
							 if(h($hourlyRate->user->id == $this->request->session()->read('id'))){ ?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"  style="cursor:pointer;" onclick="confm(<?php echo $hourlyRate->id; ?>)"  >
							<!--href="<?php echo BASE_PATH."HourlyRates/delete/".$hourlyRate->id; ?>"-->
							<i class="fa fa-trash-o fa-lg" ></i>	
							</a>
							<?php }} ?>
							
						</td>
					</tr>

				<?php endforeach; }else {
				foreach ($hourlyRates as $hourlyRate){
				?>
					<tr>
						<td><?= h($hourlyRate->service->name) ?></td>
						<td><?= $hourlyRate->user->company ?></td>
						<td><?= h($hourlyRate->user->website) ?></td>
						<td><?= $hourlyRate->rate ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<!--<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."HourlyRates/view/".$hourlyRate->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>-->
							
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
			</section>
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
