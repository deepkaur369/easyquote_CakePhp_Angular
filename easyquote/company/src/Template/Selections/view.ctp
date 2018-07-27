<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Selection'), ['action' => 'edit', $selection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Selection'), ['action' => 'delete', $selection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $selection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Selections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Selection'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hires'), ['controller' => 'Hires', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hire'), ['controller' => 'Hires', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="selections view large-10 medium-9 columns">
    <h2><?= h($selection->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Customer') ?></h6>
            <p><?= $selection->has('customer') ? $this->Html->link($selection->customer->name, ['controller' => 'Customers', 'action' => 'view', $selection->customer->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($selection->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($selection->date) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Is Complete') ?></h6>
            <p><?= $selection->is_complete ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Selections') ?></h6>
            <?= $this->Text->autoParagraph(h($selection->selections)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Hires') ?></h4>
    <?php if (!empty($selection->hires)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Customer Id') ?></th>
            <th><?= __('Selection Id') ?></th>
            <th><?= __('Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($selection->hires as $hires): ?>
        <tr>
            <td><?= h($hires->id) ?></td>
            <td><?= h($hires->user_id) ?></td>
            <td><?= h($hires->customer_id) ?></td>
            <td><?= h($hires->selection_id) ?></td>
            <td><?= h($hires->date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Hires', 'action' => 'view', $hires->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Hires', 'action' => 'edit', $hires->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hires', 'action' => 'delete', $hires->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hires->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
