  <?php  //foreach ($customer as $hires){ 
  //print_r($hires);exit;
           $customerid= h($customer->id);
		   $customeremail= h($customer->email);
		    $customername= h($customer->name);
			$customerwebsite= h($customer->website);
			$customercompany= h($customer->company);
			$customeraddress= h($customer->address);
           // $hireuserid= h($customer->hire->id); 
            $hirecustomerid= h($customer->customer_id);
           //$hireselectionid= h($customer->selection->name); 
        $hiredate= h($customer->date); 
 //} ?>
<div class="col-md-12">
	<section class="panel">
		<div class="panel-body profile-information">
		   <div class="col-md-3">
			   <div class="profile-pic text-center">
				   <img src="images/lock_thumb.jpg" alt=""/>
			   </div>
		   </div>
		  
		   <div class="col-md-6">
			   <div class="profile-desk">
			  
				   <h1><?= $customername ?></h1>
				   <span class="text-muted"><?= $hirecustomerid ?></span>
				   <p>
					   <?//= $this->Text->autoParagraph($hireselectionid); ?>
				   </p>
				   
			   </div>
		   </div>
		   <div class="col-md-3">
			   <div class="profile-statistics">
				   <h1><?= __('Email') ?></h1>
				   <p><?= $customeremail ?></p>
				   <h1><?= __('Address') ?></h1>
				   <p><?= $customeraddress ?></p>
				   <ul>
					   <li>
						   <a href="#">
							   <i class="fa fa-facebook"></i>
						   </a>
					   </li>
					   <li class="active">
						   <a href="#">
							   <i class="fa fa-twitter"></i>
						   </a>
					   </li>
					   <li>
						   <a href="#">
							   <i class="fa fa-google-plus"></i>
						   </a>
					   </li>
				   </ul>
			   </div>
		   </div>
		</div>
	</section>
</div>
<div class="col-sm-12">
	<section class="panel">
		 <div class="panel-body">
			<div class="tab-content tasi-tab">
				<div id="overview" class="tab-pane active">
					<div class="row">
						<div class="col-sm-12">
							
								<h1>Basic Information</h1>
							
							<div class="prf-box">
								
								
								<div class="profile-statistics">
									
									<h2 class="red"><?= __('Company') ?></h2>
									<p><?= $customercompany ?></p>
								
								</div>
								<div class="profile-statistics">
									
									<h2 class="red"><?= __('Website') ?></h2>
									<p>The website of <?= $customercompany ?> is  <a style="color:red;" href="http://<?= $customerwebsite ?>" class="terques"> <?= $customerwebsite ?></a>.</p>
									
								</div>
								
							</div>
						</div>
					   
					</div>
				</div>
			   
				
			   
			</div>
		</div>
	</section>
</div>



