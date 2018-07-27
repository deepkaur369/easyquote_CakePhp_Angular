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
				   <img src="<?php echo BASE_PATH."webroot/".$customer->image;?>" alt=""/>
			   </div>
		   </div>
		  
		   <div class="col-md-6">
			   <div class="profile-desk">
			  
				   <h1><?= $customername ?></h1>
				 <!--   <span class="text-muted"><?= $customerid ?></span> -->
			<!-- 	   <p>
					   <?//= $this->Text->autoParagraph($hireselectionid); ?>
				   </p> -->
				   <p><?= h($customer->ip); ?></p>
			   </div>
		   </div>
		   <div class="col-md-3">
			   <div class="profile-statistics">
				   <h1><?= __('Email') ?></h1>
				   <p><?= $customeremail ?></p>
				   <h1><?= __('Address') ?></h1>
				   <p><?= $customeraddress ?></p>
				  
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
														
							<div class="prf-box">
								
								
								<div class="profile-statistics">
									
									<h2 class="red"><?= __('Company') ?></h2>
									<p><?= $customercompany ?></p>
								
								</div>
								<div class="profile-statistics">
									
									<h2 class="red"><?= __('Website') ?></h2>
									<p><a style="color:red;" target="_blank" href="http://<?= $customerwebsite ?>" class="terques"> <?= $customerwebsite ?></a></p>
									
								</div>
								
							</div>
						</div>
					   
					</div>
				</div>
			   
				
			   
			</div>
		</div>
	</section>
</div>



