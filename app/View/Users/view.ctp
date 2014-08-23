<? if ($this->Session->read('Auth.User.user_id') === h($user['User']['user_id'])): ?>

    <? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-user"></span>' . __('Users'), '/users', array('class' => 'active')); ?>
    <? $this->Breadcrumbs->addCrumb(h($this->Session->read('Auth.User.username')), '/users/view/' . $this->Session->read('Auth.User.user_id')); ?>
    <? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-address-book-alt"></span>' . __('My Profile'), '/users/profile/' . $this->Session->read('Auth.User.user_id')); ?>


<? else: ?>
    <? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-user"></span>' . __('Users'), '/users', array('class' => 'active')); ?>
    <? $this->Breadcrumbs->addCrumb(h($user['User']['username']), '#', array('class' => 'active')); ?>

<? endif; ?>

<div class="row">
    <div class="col-md-1 column" style="padding: 0;">
        <div class="glyphicon-headline hidden-sm hidden-xs">
            <!--span class="glyphicon glyphicon-user"></span-->
            <?php echo $this->Gravatar->identicon(h($user['User']['email']),
                array(
                    'default' => 'identicon',
                    'size' => 128,
                    'class' => 'pull-right',
                    'height' => '64'
                )); ?>
        </div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo h($user['User']['username']) ?></h1>
        </div>
    </div>
</div>


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

<?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
<div class="panel panel-default badger-right badger-default"
     data-badger="<? echo __('User') . ' #' . h($user['User']['user_id']); ?>">

    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <tbody>
        <!--<tr>
            <th><?php /*echo __('User Id'); */?></th>
            <td>
                <?php /*echo h($user['User']['user_id']); */?>
                &nbsp;
            </td>
        </tr>-->
        <tr>
            <th><?php echo __('Username'); ?></th>
            <td><span class="glyphicon el-icon-user"></span>
                <?php echo h($user['User']['username']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Email'); ?></th>
            <td><span class="glyphicon glyphicon-envelope"></span>
                <?php echo h($user['User']['email']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Language'); ?></th>
            <td><span class="glyphicon el-icon-flag"></span>
                <?php echo h($user['User']['language']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Group'); ?></th>
            <td><span class="glyphicon el-icon-group"></span>
                <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['group_id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Created'); ?></th>
            <td>
                <?php if (!empty($user['User']['created'])) echo

                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                    $this->Html->link( // <a>

                        $this->Time->nice(strtotime(h($user['User']['created'])), 'CET', '%A, %d.%m.%Y'), // Date
                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($user['User']['created']))), // Calendar-Link
                        array('escape' => false)) .
                    '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                    $this->Time->nice(strtotime(h($user['User']['created'])), 'CET', '%H:%M')                       // Time
                ?>
            </td>
        </tr>
        <tr>
            <th><?php echo __('Modified'); ?></th>
            <td>
                <?php if (!empty($user['User']['modified'])) echo

                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                    $this->Html->link( // <a>

                        $this->Time->nice(strtotime(h($user['User']['modified'])), 'CET', '%A, %d.%m.%Y'), // Date
                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($user['User']['modified']))), // Calendar-Link
                        array('escape' => false)) .
                    '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                    $this->Time->nice(strtotime(h($user['User']['modified'])), 'CET', '%H:%M')                       // Time
                ?>
            </td>
        </tr>

        <tr>
            <th><?php echo __('Notification'); ?></th>
            <td><span class="glyphicon el-icon-rss"></span>
                <?php if (h($user['User']['notification'] <= 0)): echo '<span class="glyphicon glyphicon-ban-circle"></span>'; ?>
                <?php else: echo '<span class="glyphicon glyphicon-ok"></span>'; ?><?php endif; ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<hr/>

<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Related Lectures'); ?></h3>
        <?php if (!empty($user['Lecture'])): ?>
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive table-hover">
                    <thead class="panel-heading">
                    <tr>
                        <th><?php echo __('Number'); ?></th>
                        <th><?php echo __('Lecture name'); ?></th>
                        <th><?php echo __('Host'); ?></th>
                        <th><?php echo __('Semester'); ?></th>
                        <th><?php echo __('Link'); ?></th>
                        <th><?php echo __('User'); ?></th>
                        <th><?php echo __('Type'); ?></th>
                        <th class="actions"></th>

                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($user['Lecture'] as $lecture): ?>
                        <tr onclick="document.location = '<? echo Router::url(array('controller' => 'lectures', 'action' => 'view', $lecture['lecture_id'])); ?>';">
                            <td><?php echo $lecture['number']; ?></td>
                            <td><?php echo $lecture['name']; ?></td>
                            <td>
                                <?php echo $this->Html->link($lecture['Host']['name'], array('controller' => 'hosts', 'action' => 'view', $lecture['Host']['host_id'])); ?>
                            </td>

                            <td><?php echo $lecture['semester']; ?></td>
                            <td>
                                <?php if (!empty($lecture['link'])) echo $this->Html->link(
                                    $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-link')),
                                    h($lecture['link']), array('full_base' => true, 'escape' => false));
                                ?>
                            </td>
                            <td style="white-space: nowrap;"><p>
                                    <?php echo $this->Html->link($this->Gravatar->identicon($lecture['User']['email']), array('controller' => 'users', 'action' => 'view', $lecture['User']['user_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link($lecture['User']['username'], array('controller' => 'users', 'action' => 'view', $lecture['User']['user_id'])); ?>
                                </p>
                            </td>
                            <td>
                                <?php echo $this->Form->create('EventTypes', array('url' => array('controller' => 'eventTypes', 'action' => 'view', $lecture['EventType']['event_type_id'])));?>

                                <button type="submit" title="<?php echo $lecture['EventType']['name']; ?>"
                                        class="btn-color eventColor<?php echo $lecture['EventType']['color']; ?>"></button>

                                <?php echo $this->Form->end() ?>
                            </td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'lectures', 'action' => 'view', $lecture['lecture_id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'lectures', 'action' => 'edit', $lecture['lecture_id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'lectures', 'action' => 'delete', $lecture['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['lecture_id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="panel-footer"></div>
            </div>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
    </div>
    <!-- end col md 12 -->
</div>

<hr/>

<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Related Captures'); ?></h3>
        <?php if (!empty($user['Capture'])): ?>
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive table-hover">
                    <thead class="panel-heading">
                    <tr>
                        <th><?php echo __('Name'); ?></th>
                        <th><?php echo __('Lecture'); ?></th>
                        <th><?php echo __('Responsible'); ?></th>
                        <th><?php echo __('Status'); ?></th>
                        <th><?php echo __('Workflow'); ?></th>
                        <th class="actions"></th>


                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($user['Capture'] as $capture): ?>
                        <tr onclick="document.location = '<? echo Router::url(array('controller' => 'captures', 'action' => 'view', h($capture['capture_id']))); ?>';">
                            <td><?php echo $capture['name']; ?></td>
                            <td>
                                <?php echo $this->Html->link($capture['Lecture']['number'] . ' ' . $capture['Lecture']['name'] . ' (' . $capture['Lecture']['semester'] . ')', array('controller' => 'lectures', 'action' => 'view', $capture['lecture_id'])); ?>
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

<hr/>

<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Related Tickets'); ?></h3>
        <?php if (!empty($user['Ticket'])): ?>
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive table-hover">
                    <thead class="panel-heading">
                    <tr>
                        <th><?php echo __('Ticket Id'); ?></th>
                        <th><?php echo __('Task'); ?></th>
                        <th><?php echo __('Event'); ?></th>
                        <th><?php echo __('Responsible'); ?></th>
                        <th><?php echo __('Status'); ?></th>
                        <th><?php echo __('Created'); ?></th>
                        <th><?php echo __('Ended'); ?></th>
                        <th class="actions"></th>

                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($user['Ticket'] as $ticket): ?>
                        <tr onclick="document.location = '<? echo Router::url(array('controller' => 'tickets', 'action' => 'view', $ticket['ticket_id'])); ?>';">
                            <td><?php echo h($ticket['ticket_id']); ?>&nbsp;</td>
                            <td>
                                <?php echo $ticket['Task']['name']; ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['event_id'])); ?>
                            </td>

                            <td style="white-space: nowrap;"><p>
                                    <?php echo $this->Html->link($this->Gravatar->identicon($ticket['User']['email']), array('controller' => 'users', 'action' => 'view', $ticket['User']['user_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link($ticket['User']['username'], array('controller' => 'users', 'action' => 'view', $ticket['User']['user_id'])); ?>
                                </p>
                            </td>
                            <td class="labels lower-labels"><?php $statuses = Configure::read('TICKET.STATUSES');
                                $class = $statuses[$ticket['status']]; ?>

                                <span class="label label-<? echo $class ?>"><? echo __(h($ticket['status'])) ?></span>
                            </td>


                            <td>
                                <?php if (!empty($ticket['created'])) echo

                                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                                    $this->Html->link( // <a>

                                        $this->Time->nice(strtotime(h($ticket['created'])), 'CET', '%a, %d.%m.%Y'), // Date
                                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($ticket['created']))), // Calendar-Link
                                        array('escape' => false)) .
                                    '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                                    $this->Time->nice(strtotime(h($ticket['created'])), 'CET', '%H:%M')                       // Time
                                ?>
                            </td>

                            <td>
                                <?php if (!empty($ticket['ended'])) echo

                                    '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                                    $this->Html->link( // <a>

                                        $this->Time->nice(strtotime(h($ticket['ended'])), 'CET', '%a, %d.%m.%Y'), // Date
                                        '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($ticket['ended']))), // Calendar-Link
                                        array('escape' => false)) .
                                    '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                                    $this->Time->nice(strtotime(h($ticket['ended'])), 'CET', '%H:%M')                       // Time
                                ?>
                            </td>

                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'tickets', 'action' => 'view', $ticket['ticket_id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'tickets', 'action' => 'edit', $ticket['ticket_id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'tickets', 'action' => 'delete', $ticket['ticket_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $ticket['ticket_id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="panel-footer"></div>
            </div>
        <?php endif; ?>

        <div class="actions">
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>' . __('Edit User'), array('action' => 'edit', $user['User']['user_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete User') . '</span>', array('action' => 'delete', $user['User']['user_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['user_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Users'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New User'), array('action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Groups') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Groups'), array('controller' => 'groups', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Group'), array('controller' => 'groups', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Tickets') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Tickets'), array('controller' => 'tickets', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false)); ?> </li>
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