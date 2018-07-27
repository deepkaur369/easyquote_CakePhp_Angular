<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Option'), ['action' => 'edit', $option->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Option'), ['action' => 'delete', $option->id], ['confirm' => __('Are you sure you want to delete # {0}?', $option->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Question Flows'), ['controller' => 'QuestionFlows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question Flow'), ['controller' => 'QuestionFlows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Working Hours'), ['controller' => 'WorkingHours', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Working Hour'), ['controller' => 'WorkingHours', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="options view large-10 medium-9 columns">
    <h2><?= h($option->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Question') ?></h6>
            <p><?= $option->has('question') ? $this->Html->link($option->question->id, ['controller' => 'Questions', 'action' => 'view', $option->question->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($option->name) ?></p>
            <h6 class="subheader"><?= __('Icon') ?></h6>
            <p><?= h($option->icon) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($option->id) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Is Chargeable') ?></h6>
            <p><?= $option->is_chargeable ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related QuestionFlows') ?></h4>
    <?php if (!empty($option->question_flows)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Question Id') ?></th>
            <th><?= __('Option Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($option->question_flows as $questionFlows): ?>
        <tr>
            <td><?= h($questionFlows->id) ?></td>
            <td><?= h($questionFlows->question_id) ?></td>
            <td><?= h($questionFlows->option_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'QuestionFlows', 'action' => 'view', $questionFlows->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'QuestionFlows', 'action' => 'edit', $questionFlows->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuestionFlows', 'action' => 'delete', $questionFlows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionFlows->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related WorkingHours') ?></h4>
    <?php if (!empty($option->working_hours)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Service Id') ?></th>
            <th><?= __('Option Id') ?></th>
            <th><?= __('Hours') ?></th>
            <th><?= __('Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($option->working_hours as $workingHours): ?>
        <tr>
            <td><?= h($workingHours->id) ?></td>
            <td><?= h($workingHours->user_id) ?></td>
            <td><?= h($workingHours->service_id) ?></td>
            <td><?= h($workingHours->option_id) ?></td>
            <td><?= h($workingHours->hours) ?></td>
            <td><?= h($workingHours->date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'WorkingHours', 'action' => 'view', $workingHours->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'WorkingHours', 'action' => 'edit', $workingHours->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'WorkingHours', 'action' => 'delete', $workingHours->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workingHours->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
