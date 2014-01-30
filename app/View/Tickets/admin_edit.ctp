
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-tags"></span>'.__('Tickets'),array('action' => 'index')); ?><?php $this->Breadcrumbs->addCrumb(__('Admin Edit Ticket'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
     <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-tags"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Admin Edit Ticket'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    			<?php echo $this->Form->create('Ticket', array('role' => 'form')); ?>

    				<div class="form-group">
					<?php echo $this->Form->input('ticket_id', array('class' => 'form-control', 'placeholder' => 'Ticket Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('comment', array('class' => 'form-control', 'placeholder' => 'Comment'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ended', array('class' => 'form-control', 'placeholder' => 'Ended'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('task_id', array('class' => 'form-control', 'placeholder' => 'Task Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('event_id', array('class' => 'form-control', 'placeholder' => 'Event Id'));?>
				</div>
    				<?php echo $this->Element('submitArea');?>

			<?php echo $this->Form->end() ?>

</div><!-- end col md 12 -->


<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                                            <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">'. __('Delete') . '</span>', array('action' => 'delete', $this->Form->value('Ticket.ticket_id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Ticket.ticket_id'))); ?></li>
                                        <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Tickets'), array('action' => 'index'), array('escape' => false)); ?></li>
                    		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Tasks'), array('controller' => 'tasks', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
