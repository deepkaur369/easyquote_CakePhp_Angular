<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hourly Rates'), ['controller' => 'HourlyRates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hourly Rate'), ['controller' => 'HourlyRates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Working Hours'), ['controller' => 'WorkingHours', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Working Hour'), ['controller' => 'WorkingHours', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="services view large-10 medium-9 columns">
    <h2><?= h($service->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Category') ?></h6>
            <p><?= $service->has('category') ? $this->Html->link($service->category->name, ['controller' => 'Categories', 'action' => 'view', $service->category->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($service->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($service->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date') ?></h6>
            <p><?= h($service->date) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= $service->active ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related HourlyRates') ?></h4>
    <?php if (!empty($service->hourly_rates)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Service Id') ?></th>
            <th><?= __('Rate') ?></th>
            <th><?= __('Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($service->hourly_rates as $hourlyRates): ?>
        <tr>
            <td><?= h($hourlyRates->id) ?></td>
            <td><?= h($hourlyRates->user_id) ?></td>
            <td><?= h($hourlyRates->service_id) ?></td>
            <td><?= h($hourlyRates->rate) ?></td>
            <td><?= h($hourlyRates->date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'HourlyRates', 'action' => 'view', $hourlyRates->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'HourlyRates', 'action' => 'edit', $hourlyRates->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'HourlyRates', 'action' => 'delete', $hourlyRates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hourlyRates->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Projects') ?></h4>
    <?php if (!empty($service->projects)): ?>
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
        <?php foreach ($service->projects as $projects): ?>
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
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Questions') ?></h4>
    <?php if (!empty($service->questions)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Service Id') ?></th>
            <th><?= __('Question') ?></th>
            <th><?= __('Is Multiple Choice') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($service->questions as $questions): ?>
        <tr>
            <td><?= h($questions->id) ?></td>
            <td><?= h($questions->service_id) ?></td>
            <td><?= h($questions->question) ?></td>
            <td><?= h($questions->is_multiple_choice) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>

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
    <?php if (!empty($service->working_hours)): ?>
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
        <?php foreach ($service->working_hours as $workingHours): ?>
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
