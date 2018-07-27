<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Hire'), ['action' => 'edit', $hire->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hire'), ['action' => 'delete', $hire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hire->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hires'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hire'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Selections'), ['controller' => 'Selections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Selection'), ['controller' => 'Selections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="hires view large-10 medium-9 columns">
    <h2><?= h($hire->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $hire->has('user') ? $this->Html->link($hire->user->name, ['controller' => 'Users', 'action' => 'view', $hire->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Customer') ?></h6>
            <p><?= $hire->has('customer') ? $this->Html->link($hire->customer->name, ['controller' => 'Customers', 'action' => 'view', $hire->customer->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Selection') ?></h6>
            <p><?= $hire->has('selection') ? $this->Html->link($hire->selection->id, ['controller' => 'Selections', 'action' => 'view', $hire->selection->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($hire->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($hire->date) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Projects') ?></h4>
    <?php if (!empty($hire->projects)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Service Id') ?></th>
            <th><?= __('Hire Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Info') ?></th>
            <th><?= __('Url') ?></th>
            <th><?= __('Screenshot') ?></th>
            <th><?= __('Active') ?></th>
            <th><?= __('Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($hire->projects as $projects): ?>
        <tr>
            <td><?= h($projects->id) ?></td>
            <td><?= h($projects->user_id) ?></td>
            <td><?= h($projects->service_id) ?></td>
            <td><?= h($projects->hire_id) ?></td>
            <td><?= h($projects->name) ?></td>
            <td><?= h($projects->info) ?></td>
            <td><?= h($projects->url) ?></td>
            <td><?= h($projects->screenshot) ?></td>
            <td><?= h($projects->active) ?></td>
            <td><?= h($projects->date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
