<script>

function confm(id){
	
	var r = confirm("Do you really wants to delete " +"'"+id+"'");
	
	if (r == true) {
		$.ajax({
		url: "<?php echo BASE_PATH ?>Services/delete/" +id,
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
		<header class="panel-heading">
			Service's Flow
			<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>Questions/flow">
				<i class="fa fa-plus" style="font-size:25px"> </i>
				<span class="iHover" style="display:block">New Flow</span>
			</a></br></br>
		</header>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th><?= $this->Paginator->sort('service') ?></th>
					<!--<th><?= $this->Paginator->sort('category_id') ?></th>
					<th><?= $this->Paginator->sort('name') ?></th>
					<th><?= $this->Paginator->sort('active') ?></th>
					<th><?= $this->Paginator->sort('date') ?></th>-->
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($services as $service): ?>
					<?php if($service->active!=0){ ?>
					<tr>
						<!--<td><?= $this->Number->format($service->id) ?></td>
						<td>
							<?= $service->has('category') ? $this->Html->link($service->category->name, ['controller' => 'Categories', 'action' => 'view', $service->category->id]) : '' ?>
						</td>-->
						<td><?= h($service->name) ?></td>
						<!--<td><?= h($service->active) ?></td>
						<td><?= h($service->date) ?></td>-->
						<td class="actions">
						
							<?= $this->Html->link(__('View'), ['action' => 'view', $service->id]) ?>
							
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Services/view/".$service->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->id]) ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" target="_blank" title="" href="<?php echo BASE_PATH."Questions/update/".$service->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete {0}?', "'".$service->name."'")]) ?>
							
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"  style="cursor:pointer;" onclick="confm(<?php echo "'".$service->id."'"; ?>)" >
								<!-- href="<?php echo BASE_PATH."Services/delete/".$service->id; ?>"-->
									<i class="fa fa-trash-o fa-lg" ></i>
						</td>
					</tr>
					<?php } ?>
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
