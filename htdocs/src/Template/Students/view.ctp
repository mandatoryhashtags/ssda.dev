<?php $this->layout = 'standard';?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($student->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($student->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($student->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Age') ?></th>
            <td><?= h($student->age) ?></td>
        </tr>
        <tr>
            <th><?= __('Rank') ?></th>
            <td><?= h($student->rank) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($student->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($student->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($student->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($student->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sessions') ?></h4>
        <p><?= $this->Html->link(__('Total Time'), ['controller' => 'Sessions', 'action' => 'time', $student->id]) ?></p>
        <?php if (!empty($student->sessions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Duration') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->sessions as $sessions): ?>
            <tr>
                <td><?= h($sessions->id) ?></td>
                <td><?= h($sessions->class_id) ?></td>
                <td><?= h($sessions->student_id) ?></td>
                <td><?= h($sessions->duration) ?></td>
                <td><?= h($sessions->created) ?></td>
                <td><?= h($sessions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sessions', 'action' => 'view', $sessions->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sessions', 'action' => 'edit', $sessions->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sessions', 'action' => 'delete', $sessions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sessions->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
