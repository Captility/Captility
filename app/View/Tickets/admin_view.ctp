
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-tags"></span>'.__('Ticket'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Ticket'); ?></h1>
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
		<th><?php echo __('Ticket Id'); ?></th>
		<td>
			<?php echo h($ticket['Ticket']['ticket_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Status'); ?></th>
		<td>
			<?php echo h($ticket['Ticket']['status']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Comment'); ?></th>
		<td>
			<?php echo h($ticket['Ticket']['comment']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($ticket['Ticket']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($ticket['Ticket']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ended'); ?></th>
		<td>
			<?php echo h($ticket['Ticket']['ended']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($ticket['User']['username'], array('controller' => 'users', 'action' => 'view', $ticket['User']['user_id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Task'); ?></th>
		<td>
			<?php echo $this->Html->link($ticket['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $ticket['Task']['task_id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Event'); ?></th>
		<td>
			<?php echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['event_id'])); ?>
			&nbsp;
		</td>
</tr>
        </tbody>
    </table>

    

</div>
<!-- end col md 9 -->

<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    		<li><?php echo $this->Html->link('<span class="glyphicon el-icon-file-edit"></span>'.__('Edit Ticket'), array('action' => 'edit', $ticket['Ticket']['ticket_id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>'.__('Delete Ticket'), array('action' => 'delete', $ticket['Ticket']['ticket_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $ticket['Ticket']['ticket_id'])); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Tickets'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Ticket'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Tasks'), array('controller' => 'tasks', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
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