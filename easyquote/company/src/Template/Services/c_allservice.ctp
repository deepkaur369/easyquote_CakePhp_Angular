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
			foreach ($workingHours as $workingHour){ 
				//print_r($workingHour);
				$serviceid[$workingHour->service_id]=$workingHour->service_id;
			} $i=0;
		}?>
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Services
			<!--<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>WorkingHours/addservicehour">
				<i class="fa fa-plus" style="font-size:25px"> </i>
				<span class="iHover" style="display:block">New Services</span>
			</a></br></br>-->
		</header>
		<div class="panel-body">
		<section id="unseen">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
				<tr>
					<th><?= $this->Paginator->sort('category_id') ?></th>
					<th><?= $this->Paginator->sort('name') ?></th>
					<!--<th><?= $this->Paginator->sort('active') ?></th>-->
					<th><?php echo 'alreadyhave'; ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
				</thead>
				<tbody>
				
				<?php  foreach ($services as $service): ?>
				<?php if(h($service->active)==1){ ?>
					<tr>
						<td>
							<?= $service->has('category') ? $this->Html->link($service->category->name, ['controller' => 'Categories', 'action' => 'view', $service->category->id]) : '' ?>
						</td>
						<td><?= h($service->name) ?></td>
						<!--<td><?//= h($service->active) ?><?php if(h($service->active)==1){ echo "active"; }else{ echo "deactive"; }?></td>-->
						<?php if($workingHours){ 
								if(!empty($serviceid[$service->id])){
								if($serviceid[$service->id] == h($service->id)){?>
									<td><?php  echo "yes";  ?></td>
								<?php } } else { ?>
										<td><?php echo "no"; ?></td>
									<?php }  ?>
						 <?php }else{ ?>
							<td><?php echo "no"; ?></td>
						<?php }?>
						<td class="actions">
						
							<?/*= $this->Html->link(__('View'), ['action' => 'view', $service->id])*/ ?>
							<!--<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Services/view/".$service->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>-->
							
							<?php // if($serviceid[$i] == h($service->id)){ if(empty($serviceid[$i])){?>
							<?php if($workingHours){ 
								if(empty($serviceid[$service->id])){
								?>
							<a class="tooltips" data-original-title="Add" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."WorkingHours/addservicehour/".$service->id?>">
								<i class="fa fa-plus-circle"></i>
							</a><?php }} ?>
							
							<?php if($workingHours){ 
								if(!empty($serviceid[$service->id])){
								if($serviceid[$service->id] == h($service->id)){?>
							<?/*= $this->Html->link(__('Edit'), ['action' => 'edit', $service->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."WorkingHours/editservicehour/".$service->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a></a><?php }}} ?>
							
							<?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)])*/ ?>
							
							<?php if($workingHours){ 
								if(!empty($serviceid[$service->id])){
								if($serviceid[$service->id] == h($service->id)){?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"   style="cursor:pointer;" onclick="confm(<?php echo $service->id; ?>)" >
								<i class="fa fa-trash-o fa-lg" ></i>
								<!--href="<?php echo BASE_PATH."WorkingHours/delete/".$service->id; ?>"-->
							</a><?php }} } ?>
						</td>
					</tr>
				<?php } ?>
				<?php endforeach;  ?>
				</tbody>
			</table>
			</section>
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
