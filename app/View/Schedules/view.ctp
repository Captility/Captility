<? $this->Breadcrumbs->addCrumb(__('Schedule'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Schedule'); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-default">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tbody>
            <tr>
                <th><?php echo __('Schedule Id'); ?></th>
                <td>
                    <?php echo h($schedule['Schedule']['schedule_id']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Interval Start'); ?></th>
                <td>
                    <?php echo  $this->Time->nice(strtotime($schedule['Schedule']['interval_start']), 'CET', '%d.%m.%Y');?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Interval End'); ?></th>
                <td>
                    <?php echo  $this->Time->nice(strtotime($schedule['Schedule']['interval_end']), 'CET', '%d.%m.%Y');?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Duration'); ?></th>
                <td>
                    <?php echo h($schedule['Schedule']['duration']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Repeat Time'); ?></th>
                <td>
                    <?php echo h($schedule['Schedule']['repeat_time']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Repeat Day'); ?></th>
                <td>
                    <?php echo h($schedule['Schedule']['repeat_day']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Repeat Week'); ?></th>
                <td>
                    <?php echo h($schedule['Schedule']['repeat_week']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Created'); ?></th>
                <td>
                    <?php echo  $this->Time->nice(strtotime($schedule['Schedule']['created']), 'CET', '%d.%m.%Y');?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Modified'); ?></th>
                <td>
                    <?php echo h($schedule['Schedule']['modified']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Capture'); ?></th>
                <td>
                    <?php echo $this->Html->link($schedule['Capture']['name'], array('controller' => 'captures', 'action' => 'view', $schedule['Capture']['capture_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <hr/>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Events'); ?></h3>
            <?php if (!empty($schedule['Event'])): ?>
                <div class="panel panel-default">
                    <!-- Default panel contents -->

                    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
                        <thead class="panel-heading">
                        <tr>
                            <th><?php echo __('Event Id'); ?></th>
                            <th><?php echo __('Title'); ?></th>
                            <th><?php echo __('Comment'); ?></th>
                            <th><?php echo __('Start'); ?></th>
                            <th><?php echo __('End'); ?></th>
                            <th><?php echo __('All Day'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                            <th><?php echo __('Link'); ?></th>
                            <th><?php echo __('Created'); ?></th>
                            <th><?php echo __('Modified'); ?></th>
                            <th><?php echo __('Event Type Id'); ?></th>
                            <th><?php echo __('Schedule Id'); ?></th>
                            <th><?php echo __('Capture Id'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($schedule['Event'] as $event): ?>
                            <tr>
                                <td><?php echo $event['event_id']; ?></td>
                                <td><?php echo $event['title']; ?></td>
                                <td><?php echo $event['comment']; ?></td>
                                <td><?php echo $event['start']; ?></td>
                                <td><?php echo $event['end']; ?></td>
                                <td><?php echo $event['all_day']; ?></td>
                                <td><?php echo $event['status']; ?></td>
                                <td><?php echo $event['link']; ?></td>
                                <td><?php echo $event['created']; ?></td>
                                <td><?php echo $event['modified']; ?></td>
                                <td><?php echo $event['event_type_id']; ?></td>
                                <td><?php echo $event['schedule_id']; ?></td>
                                <td><?php echo $event['capture_id']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'events', 'action' => 'view', $event['event_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon el-icon-file-edit"></span>', array('controller' => 'events', 'action' => 'edit', $event['event_id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'events', 'action' => 'delete', $event['event_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['event_id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer"></div>
                </div>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-file-edit"></span>' . __('Edit Schedule'), array('action' => 'edit', $schedule['Schedule']['schedule_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>' . __('Delete Schedule'), array('action' => 'delete', $schedule['Schedule']['schedule_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $schedule['Schedule']['schedule_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Schedules'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Schedule'), array('action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->

<!--</div>-->
<!--</div>-->