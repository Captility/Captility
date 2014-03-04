<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb(__('Records'), '/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-film"></span>' . __('Captures'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb('#' . h($capture['Capture']['capture_id']) . ' ' . h($capture['Capture']['name']), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-film"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo '#' . h($capture['Capture']['capture_id']) . ' ' . h($capture['Capture']['name']); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

<?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
<div class="panel panel-default badger-right badger-default"
     data-badger="<? echo __('Lecture') . ' #' . h($capture['Capture']['capture_id']); ?>">

    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <tbody>
        <tr>
            <th><?php echo __('Capture'); ?></th>
            <td><span class="glyphicon glyphicon-film"></span>
                <?php echo h($capture['Capture']['name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Status'); ?></th>
            <td>
                <span class="glyphicon glyphicon-barcode"></span>
                <?php $statuses = Configure::read('CAPTURE.STATUSES');
                $class = $statuses[$capture['Capture']['status']]; ?>
                <span class="label label-<? echo $class ?>"><? echo __(h($capture['Capture']['status'])) ?></span>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Lecture'); ?></th>
            <td><span class="glyphicon glyphicon-th-list"></span>
                <?php echo $this->Html->link($capture['Lecture']['name'], array('controller' => 'lectures', 'action' => 'view', $capture['Lecture']['lecture_id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Responsible'); ?></th>
            <td><span class="glyphicon glyphicon-user"></span>
                <?php echo $this->Html->link($capture['User']['username'], array('controller' => 'users', 'action' => 'view', $capture['User']['user_id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Workflow'); ?></th>
            <td><span class="glyphicon el-icon-random"></span>
                <?php echo $this->Html->link($capture['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $capture['Workflow']['workflow_id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Created'); ?></th>
            <td>
                <?php if (!empty($capture['Capture']['created'])) echo

                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                    $this->Html->link( // <a>

                        $this->Time->nice(strtotime(h($capture['Capture']['created'])), 'CET', '%A, %d.%m.%Y'), // Date
                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($capture['Capture']['created']))), // Calendar-Link
                        array('escape' => false)) .
                    '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                    $this->Time->nice(strtotime(h($capture['Capture']['created'])), 'CET', '%H:%M')                       // Time
                ?>
            </td>
        </tr>
        <tr>
            <th><?php echo __('Modified'); ?></th>
            <td>
                <?php if (!empty($capture['Capture']['modified'])) echo

                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                    $this->Html->link( // <a>

                        $this->Time->nice(strtotime(h($capture['Capture']['modified'])), 'CET', '%A, %d.%m.%Y'), // Date
                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($capture['Capture']['modified']))), // Calendar-Link
                        array('escape' => false)) .
                    '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                    $this->Time->nice(strtotime(h($capture['Capture']['modified'])), 'CET', '%H:%M')                       // Time
                ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<hr/>

<? if (!empty($capture['Capture']['comment'])): ?>
    <strong><?php echo __('Comment'); ?></strong>

    <div class="comment-content well well-lg">
        <?php echo $capture['Capture']['comment'] ?>
    </div>

    <hr/>

<? endif; ?>

<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Related Schedules'); ?></h3>
        <?php if (!empty($capture['Schedule'])): ?>
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
                    <thead class="panel-heading">
                    <tr>
                        <th><?php echo __('Schedule Id'); ?></th>
                        <th><?php echo __('Type'); ?></th>
                        <th><?php echo __('Events'); ?></th>
                        <th><?php echo __('Time'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($capture['Schedule'] as $schedule): ?>

                        <?php $regular = (empty($schedule['interval_end'])) ? false : true; ?>
                        <tr>
                            <td><?php echo $schedule['schedule_id']; ?></td>

                            <td>
                                <?php echo (!$regular) ? __('once') : __('regular');?>
                            </td>

                            <td>
                                <? // REGULAR SCHEDULES
                                if ($regular) {


                                    echo //VON
                                        '<span class="glyphicon glyphicon-calendar"></span>' .
                                        $this->Captility->linkDate($schedule['interval_start'], '%d.%m.%Y');
                                    echo ' ' . __('to') . ' ' .
                                        $this->Captility->linkDate($schedule['interval_end'], '%d.%m.%Y');


                                    echo ', ' . __('every') . ' ';
                                    echo ($schedule['repeat_week'] == 1) ? '' : $schedule['repeat_week'] . '.';
                                    echo __($schedule['repeat_day']) . '  ';

                                }
                                else { // SINGLE SCHEDULE

                                    echo //VON
                                        '<span class="glyphicon glyphicon-calendar"></span>' .
                                        $this->Captility->linkDate($schedule['interval_start'], '%A, %d.%m.%Y');
                                }
                                ?>
                            </td>
                            <td>
                                <?
                                echo '<span class="glyphicon glyphicon-time"></span>' .
                                    $this->Captility->calcDate($schedule['repeat_time'], '%H:%M');

                                echo ' - ' . $this->Captility->calcDate($schedule['duration'], '%H:%M'); //durationToTime($schedule['repeat_time'], $schedule['duration']);
                                ?>
                            </td>

                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'schedules', 'action' => 'view', $schedule['schedule_id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'schedules', 'action' => 'edit', $schedule['schedule_id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'schedules', 'action' => 'delete', $schedule['schedule_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $schedule['schedule_id'])); ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="panel-footer"></div>
            </div>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Schedule'), array('controller' => 'schedules', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
    </div>
    <!-- end col md 12 -->
</div>

<hr/>

<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Related Events'); ?></h3>
        <?php if (!empty($capture['Event'])): ?>
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
                    <thead class="panel-heading">
                    <tr>
                        <th><?php echo __('Event Id'); ?></th>
                        <!--<th><?php /*echo __('Title'); */?></th>-->
                        <th><?php echo __('Date'); ?></th>
                        <th><?php echo __('Time'); ?></th>
                        <th><?php echo __('Status'); ?></th>
                        <th><?php echo __('Link'); ?></th>
                        <th><?php echo __('Type'); ?></th>
                        <th><?php echo __('Schedule Id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($capture['Event'] as $event): ?>
                        <tr>
                            <td><?php echo $event['event_id']; ?></td>
                            <!--<td><?php /*echo $event['title']; */?></td>-->
                            <td>

                                <?php echo //VON
                                    '<span class="glyphicon glyphicon-calendar"></span>' .
                                    $this->Captility->linkDate($event['start'], '%a, %d.%m.%Y');?>

                            </td>
                            <td>
                                <?
                                echo '<span class="glyphicon glyphicon-time"></span>' .
                                    $this->Captility->calcDate($event['start'], '%H:%M');

                                echo ' - ' .
                                    $this->Captility->calcDate($event['end'], '%H:%M');
                                ?>
                            </td>
                            <td class="labels lower-labels"><?php $statuses = Configure::read('EVENT.STATUSES');
                                $class = $statuses[$event['status']]; ?>

                                <span class="label label-<? echo $class ?>"><? echo __(h($event['status'])) ?></span>
                            </td>
                            <td>
                                <?php if (!empty($event['link'])) echo $this->Html->link(
                                    $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-link')),
                                    h($event['link']), array('full_base' => true, 'escape' => false));
                                ?>
                            </td>

                            <td>
                                <?php echo $this->Form->create('EventTypes', array('url' => array('controller' => 'eventTypes', 'action' => 'view', $event['event_type_id'])));?>
                                <!--<form action="captility/eventTypes/view/<?php /*echo $event['event_type_id'] */?>">-->
                                <button type="submit" title="<?php echo $event['EventType']['name']; ?>"
                                        class="btn-color eventColor<?php echo $event['EventType']['color']; ?>"></button>

                                <?php echo $this->Form->end() ?>
                            </td>


                            <td><?php echo $this->Html->link('#' . $event['schedule_id'], array('controller' => 'scheduled', 'action' => 'view', $event['capture_id'])); ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'events', 'action' => 'view', $event['event_id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'events', 'action' => 'edit', $event['event_id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'events', 'action' => 'delete', $event['event_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['event_id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="panel-footer"></div>
            </div>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
    </div>
    <!-- end col md 12 -->
</div>


</div>
<!-- end col md 9 -->

<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Capture'), array('action' => 'edit', $capture['Capture']['capture_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete Capture') . '</span>', array('action' => 'delete', $capture['Capture']['capture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $capture['Capture']['capture_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-list"></span><?php echo __('Lectures');?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <div><span class="glyphicon el-icon-random"></span><?php echo __('Workflows');?></div>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Workflows'), array('controller' => 'workflows', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Workflow'), array('controller' => 'workflows', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->

<!--</div>-->
<!--</div>-->