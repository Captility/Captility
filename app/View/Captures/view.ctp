<? $this->Html->addCrumb(__('Capture'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Capture'); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <tbody>
        <tr>
            <th><?php echo __('Capture Id'); ?></th>
            <td>
                <?php echo h($capture['Capture']['capture_id']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Comment'); ?></th>
            <td>
                <?php echo h($capture['Capture']['comment']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Name'); ?></th>
            <td>
                <?php echo h($capture['Capture']['name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Status'); ?></th>
            <td>
                <?php echo h($capture['Capture']['status']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Lecture'); ?></th>
            <td>
                <?php echo $this->Html->link($capture['Lecture']['name'], array('controller' => 'lectures', 'action' => 'view', $capture['Lecture']['lecture_id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('User'); ?></th>
            <td>
                <?php echo $this->Html->link($capture['User']['username'], array('controller' => 'users', 'action' => 'view', $capture['User']['user_id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Workflow'); ?></th>
            <td>
                <?php echo $this->Html->link($capture['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $capture['Workflow']['workflow_id'])); ?>
                &nbsp;
            </td>
        </tr>
        </tbody>
    </table>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Events'); ?></h3>
            <?php if (!empty($capture['Event'])): ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo __('Event Id'); ?></th>
                        <th><?php echo __('Title'); ?></th>
                        <th><?php echo __('Start'); ?></th>
                        <th><?php echo __('End'); ?></th>
                        <th><?php echo __('Status'); ?></th>
                        <th><?php echo __('Link'); ?></th>
                        <th><?php echo __('Event Type'); ?></th>
                        <th><?php echo __('Schedule Id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($capture['Event'] as $event): ?>
                        <tr>
                            <td><?php echo $event['event_id']; ?></td>
                            <td><?php echo $event['title']; ?></td>
                            <td><?php echo $event['start']; ?></td>
                            <td><?php echo $event['end']; ?></td>
                            <td><?php echo $event['status']; ?></td>
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


                            <td><?php echo $this->Html->link('#'.$event['schedule_id'], array('controller' => 'scheduled', 'action' => 'view', $event['capture_id'])); ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'events', 'action' => 'view', $event['event_id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'events', 'action' => 'edit', $event['event_id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'events', 'action' => 'delete', $event['event_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['event_id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
        </div>
        <!-- end col md 12 -->
    </div>
    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Schedules'); ?></h3>
            <?php if (!empty($capture['Schedule'])): ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo __('Schedule Id'); ?></th>
                        <th><?php echo __('Interval Start'); ?></th>
                        <th><?php echo __('Interval End'); ?></th>
                        <th><?php echo __('Duration'); ?></th>
                        <th><?php echo __('Repeat Time'); ?></th>
                        <th><?php echo __('Repeat Day'); ?></th>
                        <th><?php echo __('Repeat Week'); ?></th>
                        <th><?php echo __('Created'); ?></th>
                        <th><?php echo __('Modified'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($capture['Schedule'] as $schedule): ?>
                        <tr>
                            <td><?php echo $schedule['schedule_id']; ?></td>
                            <td><?php echo $schedule['interval_start']; ?></td>
                            <td><?php echo $schedule['interval_end']; ?></td>
                            <td><?php echo $schedule['duration']; ?></td>
                            <td><?php echo $schedule['repeat_time']; ?></td>
                            <td><?php echo $schedule['repeat_day']; ?></td>
                            <td><?php echo $schedule['repeat_week']; ?></td>
                            <td><?php echo $schedule['created']; ?></td>
                            <td><?php echo $schedule['modified']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'schedules', 'action' => 'view', $schedule['schedule_id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'schedules', 'action' => 'edit', $schedule['schedule_id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'schedules', 'action' => 'delete', $schedule['schedule_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $schedule['schedule_id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Schedule'), array('controller' => 'schedules', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
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
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Capture'), array('action' => 'edit', $capture['Capture']['capture_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>Delete Capture'), array('action' => 'delete', $capture['Capture']['capture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $capture['Capture']['capture_id'])); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Captures'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Capture'), array('action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Workflows'), array('controller' => 'workflows', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Workflow'), array('controller' => 'workflows', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Schedules'), array('controller' => 'schedules', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Schedule'), array('controller' => 'schedules', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar)) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets)) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->

<!--</div>-->
<!--</div>-->