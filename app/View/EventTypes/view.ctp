<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-facetime-video"></span>'.__('Event Types'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb(h($eventType['EventType']['name']), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo h($eventType['EventType']['name']); ?></h1>
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
                <th><?php echo __('Event Type Id'); ?></th>
                <td>
                    <?php echo h($eventType['EventType']['event_type_id']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Name'); ?></th>
                <td>
                    <?php echo h($eventType['EventType']['name']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Color'); ?></th>
                <td>
                    <?php echo __(h($eventType['EventType']['color'])); ?>
                    &nbsp;
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <hr/>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Lectures'); ?></h3>
            <?php if (!empty($eventType['Lecture'])): ?>
                <div class="panel panel-default">
                    <!-- Default panel contents -->

                    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
                        <thead class="panel-heading">
                        <tr>
                            <th><?php echo __('Number'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Semester'); ?></th>
                            <th><?php echo __('Link'); ?></th>
                            <th><?php echo __('User'); ?></th>
                            <th><?php echo __('Host'); ?></th>
                            <th><?php echo __('Type'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($eventType['Lecture'] as $lecture): ?>
                            <tr>
                                <td><?php echo $lecture['number']; ?></td>
                                <td><?php echo $lecture['name']; ?></td>
                                <td><?php echo $lecture['semester']; ?></td>
                                <td>
                                    <?php if (!empty($lecture['link'])) echo $this->Html->link(
                                        $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-link')),
                                        h($lecture['link']), array('full_base' => true, 'escape' => false));
                                    ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($lecture['User']['username'], array('controller' => 'users', 'action' => 'view', $lecture['User']['user_id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($lecture['Host']['name'], array('controller' => 'hosts', 'action' => 'view', $lecture['Host']['host_id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->create('EventTypes', array('url' => array('controller' => 'eventTypes', 'action' => 'view', $lecture['EventType']['event_type_id'])));?>

                                    <button type="submit" title="<?php echo $lecture['EventType']['name']; ?>"
                                            class="btn-color eventColor<?php echo $lecture['EventType']['color']; ?>"></button>

                                    <?php echo $this->Form->end() ?>
                                </td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'lectures', 'action' => 'view', $lecture['lecture_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon el-icon-file-edit"></span>', array('controller' => 'lectures', 'action' => 'edit', $lecture['lecture_id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'lectures', 'action' => 'delete', $lecture['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['lecture_id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer"></div>
                </div>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
        </div>
        <!-- end col md 12 -->
    </div>

    <hr/>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Events'); ?></h3>
            <?php if (!empty($eventType['Event'])): ?>
                <div class="panel panel-default">
                    <!-- Default panel contents -->

                    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
                        <thead class="panel-heading">
                        <tr>
                            <th><?php echo __('Title'); ?></th>
                            <th><?php echo __('Start'); ?></th>
                            <th><?php echo __('End'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                            <th><?php echo __('Link'); ?></th>
                            <th><?php echo __('Event Type'); ?></th>
                            <th><?php echo __('Schedule'); ?></th>
                            <th><?php echo __('Capture'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($eventType['Event'] as $event): ?>
                            <tr>
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
                                    <?php echo $this->Form->create('EventTypes', array('url' => array('controller' => 'eventTypes', 'action' => 'view', $event['EventType']['event_type_id'])));?>

                                    <button type="submit" title="<?php echo $event['EventType']['name']; ?>"
                                            class="btn-color eventColor<?php echo $event['EventType']['color']; ?>"></button>

                                    <?php echo $this->Form->end() ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link('#' . $event['schedule_id'], array('controller' => 'schedules', 'action' => 'view', $event['schedule_id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($event['Capture']['name'], array('controller' => 'captures', 'action' => 'view', $event['capture_id'])); ?>
                                </td>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-file-edit"></span>' . __('Edit Event Type'), array('action' => 'edit', $eventType['EventType']['event_type_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>' . __('Delete Event Type'), array('action' => 'delete', $eventType['EventType']['event_type_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $eventType['EventType']['event_type_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Event Types'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event Type'), array('action' => 'add'), array('escape' => false)); ?> </li>

                </ul>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-th-list"></span><?php echo __('Lectures');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
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