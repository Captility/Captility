<? $this->Breadcrumbs->addCrumb(__('Team'), '/pages/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-tags"></span>'.__('Tickets'), '#', array('class' => 'active')); ?>
<!--<div class=" index">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Tickets'); ?></h1>
        </div>
    </div>
    <!-- end col md 12 -->
</div><!-- end row -->


<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->

        <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
            <thead class="panel-heading">
            <tr>
                <th><?php echo $this->Paginator->sort('ticket_id'); ?></th>
                <th><?php echo $this->Paginator->sort('status'); ?></th>
                <th><?php echo $this->Paginator->sort('comment'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th><?php echo $this->Paginator->sort('ended'); ?></th>
                <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                <th><?php echo $this->Paginator->sort('task_id'); ?></th>
                <th><?php echo $this->Paginator->sort('event_id'); ?></th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?php echo h($ticket['Ticket']['ticket_id']); ?>&nbsp;</td>
                    <td><?php echo h($ticket['Ticket']['status']); ?>&nbsp;</td>
                    <td><?php echo h($ticket['Ticket']['comment']); ?>&nbsp;</td>
                    <td><?php echo h($ticket['Ticket']['created']); ?>&nbsp;</td>
                    <td><?php echo h($ticket['Ticket']['modified']); ?>&nbsp;</td>
                    <td><?php echo h($ticket['Ticket']['ended']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($ticket['User']['username'], array('controller' => 'users', 'action' => 'view', $ticket['User']['user_id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($ticket['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $ticket['Task']['task_id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['event_id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $ticket['Ticket']['ticket_id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon el-icon-file-edit"></span>', array('action' => 'edit', $ticket['Ticket']['ticket_id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $ticket['Ticket']['ticket_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $ticket['Ticket']['ticket_id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="panel-footer">
            <small
                class="disabled"><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>

        </div>
    </div>

    <?php
    $params = $this->Paginator->params();
    if ($params['pageCount'] > 1) {
        ?>
        <ul class="pagination pagination-sm">
            <?php
            echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
            echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
            ?>
        </ul>
    <?php } ?>

</div>
<!-- end col md 9 -->

<div class="col-md-3 action-column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Ticket'), array('action' => 'add'), array('escape' => false)); ?></li>
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

<!--</div>--><!-- end row -->


<!--</div>--><!-- end containing of content -->