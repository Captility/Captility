<? $this->Breadcrumbs->addCrumb(__('Task'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-tags"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Task'); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-default badger-right badger-default"
         data-badger="<? echo __('Task') . ' #' . h($task['Task']['task_id']); ?>">

        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tbody>
            <!--<tr>
                <th><?php /*echo __('Task Id'); */?></th>
                <td>
                    <?php /*echo h($task['Task']['task_id']); */?>
                    &nbsp;
                </td>
            </tr>-->
            <tr>
                <th><?php echo __('Name'); ?></th>
                <td><span class="glyphicon glyphicon-tag"></span>
                    <?php echo h($task['Task']['name']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Description'); ?></th>
                <td><span class="glyphicon glyphicon-info-sign"></span>
                    <?php echo h($task['Task']['description']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Workflow'); ?></th>
                <td><span class="glyphicon el-icon-random"></span>
                    <?php echo $this->Html->link($task['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $task['Workflow']['workflow_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Step'); ?></th>
                <td><span class="glyphicon glyphicon-barcode"></span>
                    <?php echo h($task['Task']['step']); ?>
                    &nbsp;
                </td>
            </tr>
            </tbody>
        </table>
    </div>


    <hr/>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Tickets'); ?></h3>
            <?php if (!empty($task['Ticket'])): ?>
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
                        <?php foreach ($task['Ticket'] as $ticket): ?>
                            <tr class="tr-linked" onclick="document.location = '<? echo Router::url(array('controller' => 'tickets', 'action' => 'view', $ticket['ticket_id'])); ?>';">
                                <td><?php echo h($ticket['ticket_id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link($ticket['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $ticket['Task']['task_id'])); ?>
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

                                    <span
                                        class="label label-<? echo $class ?>"><? echo __(h($ticket['status'])) ?></span>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Task'), array('action' => 'edit', $task['Task']['task_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete Task') . '</span>', array('action' => 'delete', $task['Task']['task_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $task['Task']['task_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Tasks'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Task'), array('action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon el-icon-random"></span><? echo __('Workflows') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Workflows'), array('controller' => 'workflows', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Workflow'), array('controller' => 'workflows', 'action' => 'add'), array('escape' => false)); ?> </li>
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