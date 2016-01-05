<?php
$studentArray = array();

?>
<?php foreach($sessions as $session) :?>
    <?php if(!array_key_exists($session->student_id,$studentArray)) :?>
            <?php $studentArray[$session->student_id] = $session->duration ?>
        <?php else:?>
            <?php $studentArray[$session->student_id] += $session->duration ?>
        <?php endif;?>
<?php endforeach ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
    </ul>
</nav>

<div class="sessions index large-9 medium-8 columns content">
    <h3><?= __('Total Training Time') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Student Name') ?></th>
            <th><?= __('Student Id') ?></th>
            <th><?= __('Total Time') ?></th>
        </tr>
        <?php foreach($students as $student) :?>
            <?php if(!array_key_exists($student->id,$studentArray)):?>
                <?php $studentArray[$student->id] = 0 ?>
            <?php endif ?>
            <tr>
                <td><?php echo h($student->name)?></td>
                <td><?php echo h($student->id)?></td>
                <td><?php echo h($studentArray[$student->id])?></td>
            </tr>
        <?php endforeach?>
    </table>
</div>
