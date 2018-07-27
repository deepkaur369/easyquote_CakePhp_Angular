
<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hires'), ['controller' => 'Hires', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hire'), ['controller' => 'Hires', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="projects view large-10 medium-9 columns">-->



<div class="col-md-12">
    <section class="panel">
        <div class="panel-body profile-information">
           <div class="col-md-3">
               <div class="profile-pic text-center">

                        <img src="<?php echo BASE_PATH."webroot/".(h($project->screenshot)); ?>" alt="Screenshot"/>

               </div>
           </div>
           <div class="col-md-6">
               <div class="profile-desk">
                   <h1><?= h($project->name) ?></h1>
                   <p>
                       <?= $this->Text->autoParagraph(h($project->info)); ?>
                   </p>
                   
               </div>
           </div>
           <div class="col-md-3">
               <div class="profile-statistics">
                   <h1><?= __('URL') ?></h1>
                   <p><?= h($project->url) ?></p>
                   <h1><?= __('Service Name') ?></h1>
                   <?php if(isset($project->service)){ ?>
                   <p><?= h($project->service->name) ?></p>
                  <?php } ?>
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
                                    
                                    <h2 class="red"><?= __('User Name') ?></h2>
                                    <?php if(isset($project->user)){ ?>
                                    <p><?= h($project->user->name) ?></p>
                                <?php } ?>
                                </div>
                 
                                <div class="profile-statistics">
                                    
                                    <h2 class="red"><?= __('Hire ID') ?></h2>
                                    <?php if(isset($project->hire)){ ?>
                                    <p> <?= h($project->hire->id) ?> </p>
                                    <?php } ?> 
                                </div>

                                <div class="profile-statistics">
                                    
                                    <h2 class="red"><?= __('Date') ?></h2>
                                    <p> <?= h($project->date) ?> </p>
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>


  <!--  <h2><?= h($project->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $project->has('user') ? $this->Html->link($project->user->name, ['controller' => 'Users', 'action' => 'view', $project->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Service') ?></h6>
            <p><?= $project->has('service') ? $this->Html->link($project->service->name, ['controller' => 'Services', 'action' => 'view', $project->service->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Hire') ?></h6>
            <p><?= $project->has('hire') ? $this->Html->link($project->hire->id, ['controller' => 'Hires', 'action' => 'view', $project->hire->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($project->name) ?></p>
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($project->url) ?></p>
            <h6 class="subheader"><?= __('Screenshot') ?></h6>
            <p><img src="<?php echo BASE_PATH."webroot/".(h($project->screenshot));?>" alt=""/></p>

        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($project->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($project->date) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= $project->active ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Info') ?></h6>
            <?= $this->Text->autoParagraph(h($project->info)); ?>

        </div>
    </div>
</div>-->
