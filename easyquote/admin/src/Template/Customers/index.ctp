<script>

function confm(id){
	
	var r = confirm("Do you really wants to delete " +"'"+id+"'");
	
	if (r == true) {
		$.ajax({
		url: "<?php echo BASE_PATH ?>Customers/delete/" +id,
		type: "POST",
		success: function(abcd) {
			location.reload();
			//alert(abcd+' '+window.location.href );
			if(abcd=='ok'){
				location.reload();
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
			Customers
			<a class="btn btn-primary btn-sm user" style="margin-right:16px;float:right;margin-top:-12px;" href="<?php echo BASE_PATH;?>Customers/add">
					<i class="fa fa-plus" style="font-size:25px"> </i>
					<span class="iHover" style="display:block">New Customer</span>
				</a>
		</header>
		<div class="panel-body">
			<section id="unseen">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
				<tr>
					<th><?= $this->Paginator->sort('name') ?></th>
					<th><?= $this->Paginator->sort('email') ?></th>
					<th><?= $this->Paginator->sort('website') ?></th>
					<th><?= $this->Paginator->sort('address') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$admin=($this->request->session()->read('type')== "admin");
				$user=($this->request->session()->read('type')== "user");
				if($admin){
				foreach ($customers as $customer): 
			?>
				<tr>
					<td><?= h($customer->name) ?></td>
					<td><?= h($customer->email) ?></td>
					<td><?= h($customer->website) ?></td>
					<td><?= h($customer->address) ?></td>
					<td class="actions">
					
						<?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
						<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Customers/view/".$customer->id?>">
							<i class="fa fa-eye fa-lg"></i>
						</a>
							
						<?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id])?>
						<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Customers/edit/".$customer->id?>">
							<i class="fa fa-edit fa-lg"></i>
						</a>
						
						<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete {0}?', '"'.$customer->name.'"')]) ?>
						<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"  style="cursor:pointer;" onclick="confm(<?php echo "'".$customer->id."'"; ?>)" >
								<!-- href="<?php echo BASE_PATH."Customers/delete/".$customer->id; ?>"-->
									<i class="fa fa-trash-o fa-lg" ></i>
							
						</a>
					</td>
				</tr>

			<?php endforeach; }else{
				
				?>
				
				<tr>
						<td><?= $customers->id ?></td>
						<td><?= $customers->name ?></td>
						<td><?= $customers->email ?></td>
						<td><?= $customers->password ?></td>
						<td><?= $customers->company ?></td>
						<td><?= $customers->website ?></td>
						<td><?= $customers->address ?></td>
						<td class="actions">
						
							<?php /*echo  $this->Html->link(__('View'), ['action' => 'view', $user->id])*/ ?>
							<a class="tooltips" data-original-title="View" data-toggle="tooltip " data-placement="bottom" href="<?php echo BASE_PATH."Customers/view/".$customers->id?>">
								<i class="fa fa-eye fa-lg"></i>
							</a>
							
							<?php /*echo  $this->Html->link(__('Edit'), ['action' => 'edit', $user->id])*/ ?>
							<a class="tooltips" data-original-title="Edit" data-toggle="tooltip " data-placement="bottom" title="" href="<?php echo BASE_PATH."Customers/edit/".$customers->id?>">
								<i class="fa fa-edit fa-lg"></i>
							</a>
							
							
							<?php /*echo  $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) */?>
							<a class="tooltips" data-original-title="Delete" data-toggle="tooltip " data-placement="bottom"    href="<?php echo BASE_PATH."Customers/delete/".$customers->id; ?>">
								<i class="fa fa-trash-o fa-lg" ></i>
							</a>
								
						</td>
					</tr>
				
				<?php } ?>
			</tbody>
		</table>
		</section>
	</div>

	<?php if($admin || $user){?>
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
