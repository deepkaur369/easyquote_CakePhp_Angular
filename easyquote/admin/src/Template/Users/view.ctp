

<div class="col-md-12">
	<section class="panel">
		<div class="panel-body profile-information">
		   <div class="col-md-3">
			   <div class="profile-pic text-center">
			   
					<?php if( h($user->type)=="client"){ ?>
						 <img src="<?php echo CLIENT_PATH. "webroot/". h($user->logo)?>" alt=""/>
					<?php }else{ ?>
						<img src="<?php echo BASE_PATH. "webroot/". h($user->logo)?>" alt=""/>
					<?php } ?>
			   </div>
		   </div>
		   <div class="col-md-6">
			   <div class="profile-desk">
				   <h1><?= h($user->name) ?></h1>
				   <span class="text-muted"><?= h($user->type) ?></span>
				   <p>
					   <?= $this->Text->autoParagraph(h($user->info)); ?>
				   </p>
				   
			   </div>
		   </div>
		   <div class="col-md-3">
			   <div class="profile-statistics">
				   <h1><?= __('Email') ?></h1>
				   <p><?= h($user->username) ?></p>
				   <h1><?= __('Address') ?></h1>
				   <p><?= h($user->address) ?></p>
				  
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
									<p><?= h($user->company) ?></p>
								
								</div>
								<div class="profile-statistics">
									
									<h2 class="red"><?= __('Website') ?></h2>
									<p><a style="color:red;" href="http://<?= h($user->website) ?>" target="_blank" class="terques"> <?= h($user->website) ?></a>.</p>
									
								</div>
								<div class="profile-statistics">
									
									<h2 class="red"><?= __('Phone') ?></h2>
									<p> <?= h($user->phone) ?> </p>
									
								</div>
								
							</div>
						</div>
					   
					</div>
				</div>
			   
				
			   
			</div>
		</div>
	</section>
</div>



<!--<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($user->name) ?></p>
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
            <h6 class="subheader"><?= __('Company') ?></h6>
            <p><?= h($user->company) ?></p>
            <h6 class="subheader"><?= __('Logo') ?></h6>
            <p><?= h($user->logo) ?></p>
            <h6 class="subheader"><?= __('Website') ?></h6>
            <p><?= h($user->website) ?></p>
            <h6 class="subheader"><?= __('Address') ?></h6>
            <p><?= h($user->address) ?></p>
            <h6 class="subheader"><?= __('Phone') ?></h6>
            <p><?= h($user->phone) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= h($user->type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($user->date) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= $user->active ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Info') ?></h6>
            <?= $this->Text->autoParagraph(h($user->info)); ?>

        </div>
    </div>
</div>-->