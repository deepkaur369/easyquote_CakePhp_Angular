<script>
function confm(id){
	
	var r = confirm("Do you really wants to delete id no" +id);
	
	if (r == true) {
		$.ajax({
		url: "<?php echo BASE_PATH ?>Projects/delete/" +id,
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

<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Projects
			<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>Projects/add">
				<i class="fa fa-plus" style="font-size:25px"> </i>
				<span class="iHover" style="display:block">New Projects</span>
			</a></br></br>
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
				?>

				<?php foreach ($projects as $project){
				?>
					<tr>
						<td><?= $project->user->company ?></td>
						<td><?= $project->name ?></td>
						<td><?= $project->url ?></td>
						<td class="actions">
						
							<!--<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Projects/view/".$project->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>-->
							
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Projects/edit/".$project->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom" style="cursor:pointer;" onclick="confm(<?php echo $project->id; ?>)"   >
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
							<!--href="<?php echo BASE_PATH."Projects/delete/".$project->id; ?>"-->	
						</td>
					</tr>
				
				<?php } ?>
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
