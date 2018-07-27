<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Working Hour'), ['action' => 'edit', $workingHour->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Working Hour'), ['action' => 'delete', $workingHour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workingHour->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Working Hours'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Working Hour'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="workingHours view large-10 medium-9 columns">
    <h2><?= h($workingHour->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $workingHour->has('user') ? $this->Html->link($workingHour->user->name, ['controller' => 'Users', 'action' => 'view', $workingHour->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Service') ?></h6>
            <p><?= $workingHour->has('service') ? $this->Html->link($workingHour->service->name, ['controller' => 'Services', 'action' => 'view', $workingHour->service->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Option') ?></h6>
            <p><?= $workingHour->has('option') ? $this->Html->link($workingHour->option->name, ['controller' => 'Options', 'action' => 'view', $workingHour->option->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Hours') ?></h6>
            <p><?= h($workingHour->hours) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($workingHour->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($workingHour->date) ?></p>
        </div>
    </div>
</div>
