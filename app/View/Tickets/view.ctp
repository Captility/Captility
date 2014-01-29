<? $this->Breadcrumbs->addCrumb(__('Team'), '/pages/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-tags"></span>' . __('Tickets'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-tags"></span>' . __('Ticket') . ' #' . h($ticket['Ticket']['ticket_id']), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Ticket') . ' #' . h($ticket['Ticket']['ticket_id']); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>

    <?php $statuses = Configure::read('TICKET.STATUSES');
    $class = $statuses[$ticket['Ticket']['status']]; ?>

    <div class="panel panel-<? echo $class ?> badger-right badger-<? echo $class ?>"
         data-badger="<?php echo __('Ticket') . ' #' . h($ticket['Ticket']['ticket_id']); ?>">


        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tbody>
            <!--<tr>
                <th><?php /*echo __('Ticket Id'); */?></th>
                <td>
                    <?php /*echo h($ticket['Ticket']['ticket_id']); */?>
                    &nbsp;
                </td>
            </tr>-->

            <tr>
                <th><?php echo __('Task'); ?></th>
                <td>
                    <span class="glyphicon glyphicon-tags"></span>
                    <?php echo $this->Html->link($ticket['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $ticket['Task']['task_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Event'); ?></th>
                <td>
                    <span class="glyphicon glyphicon-play-circle"></span>
                    <?php echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['event_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Status'); ?></th>

                <td class="labels">

                    <span class="glyphicon glyphicon-tasks"></span>


                    <span class="label label-<? echo $class ?>"><? echo __(h($ticket['Ticket']['status'])) ?></span>
                </td>
            </tr>
            <tr>
                <th><?php echo __('User'); ?></th>
                <td>
                    <span class="glyphicon glyphicon-user"></span>
                    <?php echo $this->Html->link($ticket['User']['username'], array('controller' => 'users', 'action' => 'view', $ticket['User']['user_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Created'); ?></th>
                <td>
                    <?php if (!empty($ticket['Ticket']['created'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Html->link( // <a>

                            $this->Time->nice(strtotime(h($ticket['Ticket']['created'])), 'CET', '%A, %d.%m.%Y'), // Date
                            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($ticket['Ticket']['created']))), // Calendar-Link
                            array('escape' => false)) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($ticket['Ticket']['created'])), 'CET', '%H:%I')                       // Time
                    ?>
                </td>
            </tr>
            <tr>
                <th><?php echo __('Modified'); ?></th>
                <td>
                    <?php if (!empty($ticket['Ticket']['modified'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Html->link( // <a>

                            $this->Time->nice(strtotime(h($ticket['Ticket']['modified'])), 'CET', '%A, %d.%m.%Y'), // Date
                            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($ticket['Ticket']['modified']))), // Calendar-Link
                            array('escape' => false)) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($ticket['Ticket']['modified'])), 'CET', '%H:%I')                       // Time
                    ?>
                </td>
            </tr>
            <tr>
                <th><?php echo __('Ended'); ?></th>
                <td>
                    <?php if (!empty($ticket['Ticket']['ended'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Html->link( // <a>

                            $this->Time->nice(strtotime(h($ticket['Ticket']['ended'])), 'CET', '%A, %d.%m.%Y'), // Date
                            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($ticket['Ticket']['ended']))), // Calendar-Link
                            array('escape' => false)) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($ticket['Ticket']['ended'])), 'CET', '%H:%I')                       // Time
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>


    <? if (!empty($ticket['Ticket']['comment'])): ?>
        <strong><?php echo __('Comment'); ?></strong>

        <div class="comment-content well well-lg">
            <?php echo $ticket['Ticket']['comment']; ?>
        </div>

        <hr/>

    <? endif; ?>


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
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Ticket'), array('action' => 'edit', $ticket['Ticket']['ticket_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete Ticket') . '</span>', array('action' => 'delete', $ticket['Ticket']['ticket_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $ticket['Ticket']['ticket_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Tickets'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Ticket'), array('action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Events') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Tasks') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Tasks'), array('controller' => 'tasks', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false)); ?> </li>
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