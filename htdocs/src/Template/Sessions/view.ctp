<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Course Date') ?></th>
            <td><?= h($session->course_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Student') ?></th>
            <td><?= $session->has('student') ? $this->Html->link($session->student->name, ['controller' => 'Students', 'action' => 'view', $session->student->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Duration') ?></th>
            <td><?= h($session->duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($session->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($session->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($session->modified) ?></td>
        </tr>
    </table>
</div>
