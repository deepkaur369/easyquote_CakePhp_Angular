<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $optionQuestion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $optionQuestion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Option Questions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Options'), ['controller' => 'Options', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['controller' => 'Options', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="optionQuestions form large-10 medium-9 columns">
    <?= $this->Form->create($optionQuestion); ?>
    <fieldset>
        <legend><?= __('Edit Option Question') ?></legend>
        <?php
            echo $this->Form->input('option_id', ['options' => $options]);
            echo $this->Form->input('question_id', ['options' => $questions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
