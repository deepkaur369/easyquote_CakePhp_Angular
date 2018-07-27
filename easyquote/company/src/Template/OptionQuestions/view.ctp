<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Option Question'), ['action' => 'edit', $optionQuestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Option Question'), ['action' => 'delete', $optionQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $optionQuestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Option Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="optionQuestions view large-10 medium-9 columns">
    <h2><?= h($optionQuestion->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Option') ?></h6>
            <p><?= $optionQuestion->has('option') ? $this->Html->link($optionQuestion->option->name, ['controller' => 'Options', 'action' => 'view', $optionQuestion->option->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Question') ?></h6>
            <p><?= $optionQuestion->has('question') ? $this->Html->link($optionQuestion->question->id, ['controller' => 'Questions', 'action' => 'view', $optionQuestion->question->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($optionQuestion->id) ?></p>
        </div>
    </div>
</div>
