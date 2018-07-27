<script>

function confm(id){
	
	var r = confirm("Do you really wants to delete " +"'"+id+"'");
	
	if (r == true) {
		$.ajax({
		url: "<?php echo BASE_PATH ?>Categories/delete/" +id,
		type: "POST",
		success: function(abcd) {
			location.reload();
			//alert(abcd+' '+window.location.href );
			if(abcd=='ok'){
				location.reload();
				// location.assign(window.location.href );
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
			<header class="panel-heading" style="height: 62px;" >
				Categories
				<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>Categories/add">
					<i class="fa fa-plus" style="font-size:25px"> </i>
					<span class="iHover" style="display:block">New Categories</span>
				</a>
			</header>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
					<tr>
						<th><?= $this->Paginator->sort('name') ?></th>
						<th><?= $this->Paginator->sort('active') ?></th>
						<!--<th><?= $this->Paginator->sort('date') ?></th>-->
						<th class="actions"><?= __('Actions') ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($categories as $category): ?>
						<tr>
							<td><?= h($category->name) ?></td>
							<td><?php $cat=h($category->active);
								if($cat==1){
									echo "active";
								}else{
									echo "deactive";
								}
							?></td>
							<!--<td><?= h($category->date) ?></td>-->
							<td class="actions">
							
								
						
								<?= $this->Html->link(__('Edit'), ['action' => 'edit',$category->id])?>
								<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Categories/edit/".$category->id?>">
									<i class="fa fa-edit fa-lg"></i>
								</a>
								
								<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete {0}?', "'".$category->name."'")]) ?>
								<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"  style="cursor:pointer;" onclick="confm(<?php echo "'".$category->id."'"; ?>)" >
								<!-- href="<?php echo BASE_PATH."Categories/delete/".$category->id; ?>"-->
									<i class="fa fa-trash-o fa-lg" ></i>
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
