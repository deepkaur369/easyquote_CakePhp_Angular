<script>

function confm(id){
	
	var r = confirm("Do you really wants to delete id no" +id);
	
	if (r == true) {
		$.ajax({
		url: "<?php echo BASE_PATH ?>WorkingHours/delete/" +id,
		type: "POST",
		success: function(abcd) {
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
<style>
.fa-user-plus:before {
  content: "\f234";
}
.fa-plus-circle:before {
  content: "\f055";
}
</style>
<?php  if($workingHours){
		/*foreach ($workingHours as $workingHour){ 
	
				$serviceid[$workingHour->service_id]=$workingHour->service_id;
			} $i=0; */
		}?>
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			My Services
	
		</header>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th><?= $this->Paginator->sort('category_id') ?></th>
					<th><?= $this->Paginator->sort('name') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
				</thead>
				<tbody>
				
				<?php  foreach ($services as $service): ?>
					<?php if($service->active!=0){ ?>
					<tr>
						<td>
							<?= $service->has('category') ? $this->Html->link($service->category->name, ['controller' => 'Categories', 'action' => 'view', $service->category->id]) : '' ?>
						</td>
						<td><?= h($service->name) ?></td>
						
					
						<td class="actions">
						
							
							<?php if($workingHours){ 
								if(empty($serviceid[$service->id])){
								?>
							<?= $this->Html->link(__('Add'), ['action' => 'view', $service->id]) ?>
							<a class="tooltips" data-original-title="Add" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."WorkingHours/addservicehour/".$service->id?>">
								<i class="fa fa-plus-circle"></i>
							</a><?php }} ?>

							<?php if($workingHours){ 
								if(empty($serviceid[$service->id])){
								?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->id]) ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."WorkingHours/editservicehour/".$service->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a><?php }} ?>
							
							<!--<?php if($workingHours){ 
								if(!empty($serviceid[$service->id])){
								if($serviceid[$service->id] == h($service->id)){?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->id]) ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."WorkingHours/editservicehour/".$service->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a></a><?php }}} ?>-->
							
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete {0}?', "'".$service->name."'")]) ?>
								<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."WorkingHours/addservicehour/delete".$service->id?>">
							<i class="fa fa-trash-o fa-lg" ></i>
							
							<?php if($workingHours){ 
								if(!empty($serviceid[$service->id])){
								if($serviceid[$service->id] == h($service->id)){?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"  style="cursor:pointer;" onclick="confm(<?php echo $service->id; ?>)"  >
							<!--href="<?php echo BASE_PATH."WorkingHours/delete/".$service->id; ?>"-->
								<i class="fa fa-trash-o fa-lg" ></i>
							</a><?php }} } ?>
						</td>
					</tr>
					<?php } ?>
				<?php endforeach;  ?>
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
