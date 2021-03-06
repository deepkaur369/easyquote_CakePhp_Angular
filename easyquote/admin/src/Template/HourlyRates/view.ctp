
<!--<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Hourly Rate'), ['action' => 'edit', $hourlyRate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hourly Rate'), ['action' => 'delete', $hourlyRate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hourlyRate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hourly Rates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hourly Rate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
    </ul>
</div>-->



<div class="col-sm-12">
    <section class="panel">
         <div class="panel-body">
            <div class="tab-content tasi-tab">
                <div id="overview" class="tab-pane active">
                    <div class="row">
                    
                        <div class="col-sm-12">
                                                        
                            <div class="prf-box">
                                
                                
                                <div class="profile-statistics">
                                    
                                    <h2 class="red"><?= __('User') ?></h2>
                                    <p><?= $hourlyRate->has('user') ? $this->Html->link($hourlyRate->user->name, ['controller' => 'Users', 'action' => 'view', $hourlyRate->user->id]) : '' ?></p>
                                
                                </div>
                                <div class="profile-statistics">
                                    
                                    <h2 class="red"><?= __('Service') ?></h2>
                                    <p><?= $hourlyRate->has('service') ? $this->Html->link($hourlyRate->service->name, ['controller' => 'Services', 'action' => 'view', $hourlyRate->service->id]) : '' ?></p>
                                    
                                </div>
                                <div class="profile-statistics">
                                    
                                    <h2 class="red"><?= __('Rate') ?></h2>
                                    <p><?= h($hourlyRate->rate) ?></p>
                                    
                                </div>
                                <div class="profile-statistics">
                                    
                                    <h2 class="red"><?= __('Id') ?></h2>
                                     <p><?= $this->Number->format($hourlyRate->id) ?></p>
                                    
                                </div>
                                <div class="profile-statistics">
                                    
                                    <h2 class="red"><?= __('Date') ?></h2>
                                    <p><?= h($hourlyRate->date) ?></p>
                                    
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                </div>     
            </div>
        </div>
    </section>
</div>




<!--<div class="hourlyRates view large-10 medium-9 columns">
    <h2><?= h($hourlyRate->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $hourlyRate->has('user') ? $this->Html->link($hourlyRate->user->name, ['controller' => 'Users', 'action' => 'view', $hourlyRate->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Service') ?></h6>
            <p><?= $hourlyRate->has('service') ? $this->Html->link($hourlyRate->service->name, ['controller' => 'Services', 'action' => 'view', $hourlyRate->service->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Rate') ?></h6>    
            <p><?= h($hourlyRate->rate) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($hourlyRate->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($hourlyRate->date) ?></p>
        </div>
    </div>
</div>-->
