<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Question Option'), ['action' => 'edit', $questionOption->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question Option'), ['action' => 'delete', $questionOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionOption->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Question Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question Option'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="questionOptions view large-10 medium-9 columns">
    <h2><?= h($questionOption->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Question') ?></h6>
            <p><?= $questionOption->has('question') ? $this->Html->link($questionOption->question->id, ['controller' => 'Questions', 'action' => 'view', $questionOption->question->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Option') ?></h6>
            <p><?= $questionOption->has('option') ? $this->Html->link($questionOption->option->name, ['controller' => 'Options', 'action' => 'view', $questionOption->option->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($questionOption->id) ?></p>
        </div>
    </div>
</div>
