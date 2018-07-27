<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['controller' => 'Services', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['controller' => 'Services', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Question Flows'), ['controller' => 'QuestionFlows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question Flow'), ['controller' => 'QuestionFlows', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="questions view large-10 medium-9 columns">
    <h2><?= h($question->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Service') ?></h6>
            <p><?= $question->has('service') ? $this->Html->link($question->service->name, ['controller' => 'Services', 'action' => 'view', $question->service->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($question->id) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Is Multiple Choice') ?></h6>
            <p><?= $question->is_multiple_choice ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Question') ?></h6>
            <?= $this->Text->autoParagraph(h($question->question)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Options') ?></h4>
    <?php if (!empty($question->options)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Question Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Icon') ?></th>
            <th><?= __('Is Chargeable') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($question->options as $options): ?>
        <tr>
            <td><?= h($options->id) ?></td>
            <td><?= h($options->question_id) ?></td>
            <td><?= h($options->name) ?></td>
            <td><?= h($options->icon) ?></td>
            <td><?= h($options->is_chargeable) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Options', 'action' => 'view', $options->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Options', 'action' => 'edit', $options->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Options', 'action' => 'delete', $options->id], ['confirm' => __('Are you sure you want to delete # {0}?', $options->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related QuestionFlows') ?></h4>
    <?php if (!empty($question->question_flows)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Question Id') ?></th>
            <th><?= __('Option Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($question->question_flows as $questionFlows): ?>
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
