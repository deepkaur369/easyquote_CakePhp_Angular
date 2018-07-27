<style>
	.fa-plus-circle:before {
	  content: "\f055";
	}
</style>

	<?php 
		foreach ($workingHours as $workingHour){ 
			
			$serviceid[$workingHour->service_id]=$workingHour->service_id;
			
		}  $i=0;//print_r($serviceid);exit;
	?>

<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Questions
			
		</header>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						
						<th><?= $this->Paginator->sort('service_id') ?></th>
						<th><?php echo 'updated'; ?></th>
						<th class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($questions as $question): ?>
					<tr>
						
						<td>
							<?= $question->has('service') ? $this->Html->link($question->service->name, ['controller' => 'Services', 'action' => 'view', $question->service->id]) : '' ?>
						</td>
						
						<?php if($workingHours){ 
								if(!empty($serviceid[$question->service->id])){
								if($serviceid[$question->service->id] == $question->service->id){?>
									<td><?php  echo "yes";  ?></td>
								<?php } } else { ?>
										<td><?php echo "no"; ?></td>
									<?php }  ?>
						 <?php }else{ ?>
							<td><?php echo "no"; ?></td>
						<?php }?>
						
						<td class="actions">
						
							<?/*= $this->Html->link(__('View'), ['action' => 'view', $question->id])*/ ?>
							<!--<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Questions/view/".$question->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>-->
							
							<!--<?php //if($workingHours){ 
								//if(empty($serviceid[$question->$service->id])){
								?>
							<a class="tooltips" data-original-title="Add" data-toggle="tooltip " data-placement="bottom" href="<?php //echo BASE_PATH."WorkingHours/addservicehour/".//$question->$service->id?>">
								<i class="fa fa-plus-circle"></i>
							</a><?php //}//} ?>-->
							
								<?php if($workingHours){ 
									if(empty($serviceid[$question->service->id])){
								?>
									<a class="tooltips" data-original-title="Add" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."WorkingHours/addservicehour/".$question->service->id?>">
										<i class="fa fa-plus-circle"></i>
									</a>
								<?php }} ?>
							
							<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id])*/ ?>
							<?php if($workingHours){ 
								if(!empty($serviceid[$question->service->id])){
								if($serviceid[$question->service->id] == $question->service->id){?>
									<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."WorkingHours/editservicehour/".$question->service->id?>">
										<i class="fa fa-edit fa-lg"></i>
									</a>
							<?php }}} ?>
							
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