
<div class="col-lg-12">
	<div class="form-group" style="margin:0px;margin-bottom:20px;margin-top:40px;">
				
		&nbsp;&nbsp;
		<?php foreach ($workingHours as $workingHour){
		$working_Hours=$workingHour->id;
		}
		if(empty($working_Hours)){?><a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-30px;" href="<?php echo BASE_PATH;?>WorkingHours/c_add">
			<i class="fa fa-plus" style="font-size:25px"> </i>
			<span class="iHover" style="display:block">New Working Hours</span>
		</a><?php } ?>
				
	</div>
	
	<section class="panel">
		
		<header class="panel-heading">
		
			Working Hours
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
					<!--<th><?//= $this->Paginator->sort('option_id') ?></th>-->
					<th><?= $this->Paginator->sort('hours') ?></th>
					<th><?= $this->Paginator->sort('date') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
				</thead>
				<tbody>
					<?php 
					$customer=($this->request->session()->read('type')== "customer");
					$user=($this->request->session()->read('type')=="user");
					if(!( $customer || $user )){
					foreach ($workingHours as $workingHour): ?>
					<tr>
						<td><?= $this->Number->format($workingHour->id) ?></td>
						<td>
							<?= $workingHour->has('user') ? $this->Html->link($workingHour->user->name, ['controller' => 'Users', 'action' => 'view', $workingHour->user->id]) : '' ?>
						</td>
						<td>
							<?= $workingHour->has('service') ? $this->Html->link($workingHour->service->name, ['controller' => 'Services', 'action' => 'view', $workingHour->service->id]) : '' ?>
						</td>
						<td>
							<?= $workingHour->has('option') ? $this->Html->link($workingHour->option->name, ['controller' => 'Options', 'action' => 'view', $workingHour->option->id]) : '' ?>
						</td>
						<td><?= h($workingHour->hours) ?></td>
						<td><?= h($workingHour->date) ?></td>
						<td class="actions">
						
							<?/*= $this->Html->link(__('View'), ['action' => 'view', $workingHour->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."WorkingHours/c_view/".$workingHour->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $workingHour->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."WorkingHours/c_edit/".$workingHour->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
						
							<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workingHour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workingHour->id)])*/ ?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."WorkingHours/c_delete/".$workingHour->id; ?>">
								<i class="fa fa-delete fa-lg" ></i>
							</a>
						
						</td>
					</tr>

					<?php endforeach; }else{
				foreach ($workingHours as $workingHour){
				
							$dataid=$workingHour->id;
							$datausername=$workingHour->user->name;
							$dataservicename=$workingHour->service->name;
							$dataoptionname=$workingHour->option->name;
							$datahours=$workingHour->hours;
							$datadate=$workingHour->date;
				?>
				
				<tr>
						<td><?php echo $datausername; //h($user->name) ?></td>
						<td><?php echo $dataservicename; // h($user->username) ?></td>
						<td><?php echo $dataoptionname; //h($user->password) ?></td>
						<td><?php echo $datahours; //h($user->company) ?></td>
						<td><?php echo $datadate; //h($user->logo) ?></td>
						<td class="actions">
						
							<?/*= $this->Html->link(__('View'), ['action' => 'view', $workingHour->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."WorkingHours/c_view/".$workingHour->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $workingHour->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."WorkingHours/c_edit/".$workingHour->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
						
							<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workingHour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workingHour->id)])*/ ?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."WorkingHours/c_delete/".$workingHour->id; ?>">
								<i class="fa fa-delete fa-lg" ></i>
							</a>
								
						</td>
					</tr>
				
				<?php } } ?>
				
				
				</tbody>
			</table>
		</div>
		<?php if(!( $customer || $user )){ ?>
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
