<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb(__('Records'), '/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-th-list"></span>' . __('Lectures'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb(' #' . h($lecture['Lecture']['number']) . ' ' . h($lecture['Lecture']['name']), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-th-list"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo ' #' . h($lecture['Lecture']['number']) . ' ' . h($lecture['Lecture']['name']); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

<?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>

<div class="panel panel-default badger-right badger-default"
     data-badger="<? echo __('Lecture') . ' #' . h($lecture['Lecture']['lecture_id']) ?>">

    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <tbody>

        <tr>
            <th><?php echo __('Number of Lecture'); ?></th>
            <td><span><strong>#</strong></span>
                <?php echo h($lecture['Lecture']['number']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Name of lecture'); ?></th>
            <td><span class="glyphicon glyphicon-th-list"></span>
                <?php echo h($lecture['Lecture']['name']); ?>
                &nbsp;
            </td>
        </tr>

        <tr>
            <th><?php echo __('Host'); ?></th>
            <td><span class="glyphicon cp-icon-lecturer"></span>
                <?php echo $this->Html->link($lecture['Host']['name'], array('controller' => 'hosts', 'action' => 'view', $lecture['Host']['host_id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Event Type'); ?></th>
            <td>
                <?php echo $this->Form->create('EventTypes', array('url' => array('controller' => 'eventTypes', 'action' => 'view', $lecture['EventType']['event_type_id'])));?>
                <span class="glyphicon glyphicon-facetime-video"></span>
                <?php echo $this->Html->link($lecture['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $lecture['EventType']['event_type_id'])); ?>

                <button type="submit" title="<?php echo $lecture['EventType']['name']; ?>"
                        style=" margin-left: 5px; margin-top: -5px;vertical-align: bottom;"
                        class="btn-color eventColor<?php echo $lecture['EventType']['color']; ?>"></button>
                <?php echo $this->Form->end() ?>

            </td>
        </tr>
        <tr>
            <th><?php echo __('Semester'); ?></th>
            <td><span class="glyphicon glyphicon-calendar"></span>
                <?php echo h($lecture['Lecture']['semester']); ?>

            </td>
        </tr>

        <tr>
            <th><?php echo __('Start'); ?></th>
            <td>
                <?php if (!empty($lecture['Lecture']['start'])) echo

                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                    $this->Html->link( // <a>

                        $this->Time->nice(strtotime(h($lecture['Lecture']['start'])), 'CET', '%A, %d.%m.%Y'), // Date
                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($lecture['Lecture']['start']))), // Calendar-Link
                        array('escape' => false));
                ?>
            </td>
        </tr>
        <tr>
            <th><?php echo __('End'); ?></th>
            <td>
                <?php if (!empty($lecture['Lecture']['end'])) echo

                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                    $this->Html->link( // <a>

                        $this->Time->nice(strtotime(h($lecture['Lecture']['end'])), 'CET', '%A, %d.%m.%Y'), // Date
                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($lecture['Lecture']['end']))), // Calendar-Link
                        array('escape' => false));
                ?>
            </td>
        </tr>
        <tr>
            <th><?php echo __('Responsible'); ?></th>
            <td>
                <?php echo $this->Html->link($this->Gravatar->identicon($lecture['User']['email']) . ' ' . $lecture['User']['username'], array('controller' => 'users', 'action' => 'view', $lecture['User']['user_id']), array('escape' => false)); ?>
            </td>
        </tr>
        <tr>
            <th><?php echo __('Link'); ?></th>
            <td><span class="glyphicon glyphicon-link"></span>
                <?php echo $this->Html->link($this->Captility->trimLink($lecture['Lecture']['link']), h($lecture['Lecture']['link'])); ?>
            </td>
        </tr>
        <tr>
            <th><?php echo __('Pwd'); ?></th>
            <td><span class="glyphicon el-icon-lock"></span>
                <?php echo h($lecture['Lecture']['pwd']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Created'); ?></th>
            <td>
                <?php if (!empty($lecture['Lecture']['created'])) echo

                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                    $this->Html->link( // <a>

                        $this->Time->nice(strtotime(h($lecture['Lecture']['created'])), 'CET', '%A, %d.%m.%Y'), // Date
                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($lecture['Lecture']['created']))), // Calendar-Link
                        array('escape' => false));
                ?>
            </td>
        </tr>
        <tr>
            <th><?php echo __('Modified'); ?></th>
            <td>
                <?php if (!empty($lecture['Lecture']['modified'])) echo

                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                    $this->Html->link( // <a>

                        $this->Time->nice(strtotime(h($lecture['Lecture']['modified'])), 'CET', '%A, %d.%m.%Y'), // Date
                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($lecture['Lecture']['modified']))), // Calendar-Link
                        array('escape' => false));
                ?>
            </td>
        </tr>

        <tr>
            <th><?php echo __('Type'); ?></th>
            <td><span class="glyphicon el-icon-question-sign"></span>
                <?php echo h($lecture['Lecture']['type']); ?>
                &nbsp;
            </td>
        </tr>

        </tbody>
    </table>
</div>


<? if (!empty($lecture['Lecture']['comment'])): ?>
    <strong><?php echo __('Comment'); ?></strong>

    <div class="comment-content well well-lg">
        <?php echo $lecture['Lecture']['comment']; ?>
    </div>

    <hr/>

<? endif; ?>

<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Related Captures'); ?></h3>
        <?php if (!empty($lecture['Capture'])): ?>
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive table-hover">
                    <thead class="panel-heading">
                    <tr>
                        <th><?php echo __('Name'); ?></th>
                        <th><?php echo __('Lecture'); ?></th>
                        <th><?php echo __('User'); ?></th>
                        <th><?php echo __('Status'); ?></th>
                        <th><?php echo __('Workflow'); ?></th>
                        <th class="actions"></th>

                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($lecture['Capture'] as $capture): ?>
                        <tr class="tr-linked" onclick="document.location = '<? echo Router::url(array('controller' => 'captures', 'action' => 'view', h($capture['capture_id']))); ?>';">
                            <td><?php echo h($capture['name']); ?>&nbsp;</td>

                            <td>
                                <?php echo $this->Html->link($capture['Lecture']['number'] . ' ' . $capture['Lecture']['name'] . ' (' . $capture['Lecture']['semester'] . ')', array('controller' => 'lectures', 'action' => 'view', $capture['Lecture']['lecture_id'])); ?>
                            </td>
                            <td style="white-space: nowrap;"><p>
                                    <?php echo $this->Html->link($this->Gravatar->identicon($capture['User']['email']), array('controller' => 'users', 'action' => 'view', $capture['User']['user_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link($capture['User']['username'], array('controller' => 'users', 'action' => 'view', $capture['User']['user_id'])); ?>
                                </p>
                            </td>
                            <td class="labels lower-labels"><?php $statuses = Configure::read('CAPTURE.STATUSES');
                                $class = $statuses[$capture['status']]; ?>

                                <span
                                    class="label label-<? echo $class ?>"><? echo __(h($capture['status'])) ?></span>
                            </td>
                            <td>
                                <?php echo $this->Html->link($capture['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $capture['Workflow']['workflow_id'])); ?>
                            </td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'captures', 'action' => 'view', $capture['capture_id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'captures', 'action' => 'edit', $capture['capture_id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'captures', 'action' => 'delete', $capture['capture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $capture['capture_id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="panel-footer"></div>
            </div>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Lecture'), array('action' => 'edit', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete Lecture') . '</span>', array('action' => 'delete', $lecture['Lecture']['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['Lecture']['lecture_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Captures') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Hosts') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Hosts'), array('controller' => 'hosts', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Host'), array('controller' => 'hosts', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Event Types') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
        </div>
        <!-- end panel -->
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->

<!--</div>-->
<!--</div>-->