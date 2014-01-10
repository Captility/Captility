<? $this->Html->addCrumb(__('Task'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
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
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <tbody>
        <tr>
            <th><?php echo __('Task Id'); ?></th>
            <td>
                <?php echo h($task['Task']['task_id']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Name'); ?></th>
            <td>
                <?php echo h($task['Task']['name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Description'); ?></th>
            <td>
                <?php echo h($task['Task']['description']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Step'); ?></th>
            <td>
                <?php echo h($task['Task']['step']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Workflow'); ?></th>
            <td>
                <?php echo $this->Html->link($task['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $task['Workflow']['workflow_id'])); ?>
                &nbsp;
            </td>
        </tr>
        </tbody>
    </table>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Tickets'); ?></h3>
            <?php if (!empty($task['Ticket'])): ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo __('Ticket Id'); ?></th>
                        <th><?php echo __('Status'); ?></th>
                        <th><?php echo __('Comment'); ?></th>
                        <th><?php echo __('Created'); ?></th>
                        <th><?php echo __('Modified'); ?></th>
                        <th><?php echo __('Ended'); ?></th>
                        <th><?php echo __('User Id'); ?></th>
                        <th><?php echo __('Task Id'); ?></th>
                        <th><?php echo __('Event Id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    <?php foreach ($task['Ticket'] as $ticket): ?>
                        <tr>
                            <td><?php echo $ticket['ticket_id']; ?></td>
                            <td><?php echo $ticket['status']; ?></td>
                            <td><?php echo $ticket['comment']; ?></td>
                            <td><?php echo $ticket['created']; ?></td>
                            <td><?php echo $ticket['modified']; ?></td>
                            <td><?php echo $ticket['ended']; ?></td>
                            <td><?php echo $ticket['user_id']; ?></td>
                            <td><?php echo $ticket['task_id']; ?></td>
                            <td><?php echo $ticket['event_id']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'tickets', 'action' => 'view', $ticket['ticket_id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'tickets', 'action' => 'edit', $ticket['ticket_id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'tickets', 'action' => 'delete', $ticket['ticket_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $ticket['ticket_id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;'.__('Edit Task'), array('action' => 'edit', $task['Task']['task_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>'.__('Delete Task'), array('action' => 'delete', $task['Task']['task_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $task['Task']['task_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Tasks'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Task'), array('action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Workflows'), array('controller' => 'workflows', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Workflow'), array('controller' => 'workflows', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Tickets'), array('controller' => 'tickets', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false)); ?> </li>
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