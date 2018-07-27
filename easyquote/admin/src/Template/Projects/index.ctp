<script>

function confm(id){
	
	var r = confirm("Do you really wants to delete " +"'"+id+"'");
	
	if (r == true) {
		$.ajax({
		url: "<?php echo BASE_PATH ?>Projects/delete/" +id,
		type: "POST",
		success: function(abcd) {
			location.reload();
			//alert(abcd+' '+window.location.href );
			if(abcd=='ok'){
				location.reload();
				//location.assign(window.location.href );
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
			Projects
			<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>Projects/add">
					<i class="fa fa-plus" style="font-size:25px"> </i>
					<span class="iHover" style="display:block">New Project</span>
				</a>
		</header>
		<div class="panel-body">
			<section id="unseen">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('company') ?></th>
						<th><?= $this->Paginator->sort('name') ?></th>
						<th><?= $this->Paginator->sort('url') ?></th>
						<th class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$admin=($this->request->session()->read('type')== "admin");
				$user=($this->request->session()->read('type')== "user");
				if($admin){
					foreach ($projects as $project): ?>
					<tr>
			
						<td>
						<?php if(isset($project->user)){
						echo ($project->user->company) ;
						} ?>
						</td>
						<td><?= h($project->name) ?></td>
						<td><?= h($project->url) ?></td>
						<td class="actions">
						
							<?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>

							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Projects/view/".$project->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>

							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id])?>
							
						
							<?php if(isset($project->user)){
							if(h($project->user->id)==$this->request->session()->read('id')){ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Projects/edit/".$project->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							<?php }}?>
							
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete {0}?', "'".$project->name."'")]) ?>
							
							<?php if(isset($project->user)){
							 if(h($project->user->id)==$this->request->session()->read('id')){ ?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"  style="cursor:pointer;" onclick="confm(<?php echo "'".$project->id."'"; ?>)" >
							<i class="fa fa-trash-o fa-lg" ></i>
							<!--href="<?php echo BASE_PATH."Projects/delete/".$project->id; ?>"-->
								
							</a>
							<?php }} ?>
						</td>
					</tr>

				<?php endforeach; }?><!--else {
				foreach ($projects as $project){
				?>
					<tr>
						<td><?= $project->id ?></td>
						<td><?= $project->user->name ?></td>
						<td><?= $project->service->name ?></td>
						<td><?= $project->hire->id ?></td>
						<td><?= $project->name ?></td>
						<td><?= $project->url ?></td>
						<td><?= $project->screenshot ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Projects/view/".$project->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Projects/edit/".$project->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom" style="cursor:pointer;" onclick="confm(<?php echo $project->id; ?>)"    >-->
							<!--href="<?php echo BASE_PATH."Projects/delete/".$project->id; ?>"-->
								<!--<i class="fa fa-trash-o fa-lg" ></i>
							</a>
								
						</td>
					</tr>
				
				<?php// } } ?>-->
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
