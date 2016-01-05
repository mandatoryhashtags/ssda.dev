<?php $totalTime = null; ?>
<?php foreach($sessions as $session) :?>
<?php $totalTime += $session->duration ?>
<?php endforeach?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($student->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Student Id') ?></th>
            <td><?= h($student->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Hours') ?></th>
            <td><?= h($totalTime) ?></td>
        </tr>
    </table>
</div>


<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h('All sessions associated') ?></h3>
    <table>
        <thead>
        <tr>
            <th><?= __('Session Id') ?></th>
            <th><?= __('Session Date') ?></th>
            <th><?= __('Duration') ?></th>
        </tr>
        </thead>

        <?php foreach ($sessions as $session) :?>
            <tr>
                <td><?php echo $this->Html->link($session->id, ['controller' => 'Sessions', 'action' => 'view', $session->id])?></td>
                <td><?= h($session->course_date) ?></td>
                <td><?= h($session->duration) ?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>

