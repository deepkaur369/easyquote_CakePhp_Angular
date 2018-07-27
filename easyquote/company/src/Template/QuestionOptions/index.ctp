<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Question Option'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="questionOptions index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('question_id') ?></th>
            <th><?= $this->Paginator->sort('option_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($questionOptions as $questionOption): ?>
        <tr>
            <td><?= $this->Number->format($questionOption->id) ?></td>
            <td>
                <?= $questionOption->has('question') ? $this->Html->link($questionOption->question->id, ['controller' => 'Questions', 'action' => 'view', $questionOption->question->id]) : '' ?>
            </td>
            <td>
                <?= $questionOption->has('option') ? $this->Html->link($questionOption->option->name, ['controller' => 'Options', 'action' => 'view', $questionOption->option->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $questionOption->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionOption->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionOption->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
