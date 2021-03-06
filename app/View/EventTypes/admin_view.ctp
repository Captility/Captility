<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>


<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-facetime-video"></span>'.__('Event Type'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
     <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-facetime-video"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Event Type'); ?></h1>
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
			<?php echo h($eventType['EventType']['color']); ?>
			&nbsp;
		</td>
</tr>
        </tbody>
    </table>

            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Events'); ?></h3>
                <?php if (!empty($eventType['Event'])): ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
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
                    	<?php foreach ($eventType['Event'] as $event): ?>
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
				<?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'events', 'action' => 'edit', $event['event_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'events', 'action' => 'delete', $event['event_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['event_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
            </div>
            <!-- end col md 12 -->
        </div>
            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Lectures'); ?></h3>
                <?php if (!empty($eventType['Lecture'])): ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        		<th><?php echo __('Lecture Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Semester'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Pwd'); ?></th>
		<th><?php echo __('Start'); ?></th>
		<th><?php echo __('End'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Host Id'); ?></th>
		<th><?php echo __('Event Type Id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    	<?php foreach ($eventType['Lecture'] as $lecture): ?>
		<tr>
			<td><?php echo $lecture['lecture_id']; ?></td>
			<td><?php echo $lecture['number']; ?></td>
			<td><?php echo $lecture['name']; ?></td>
			<td><?php echo $lecture['semester']; ?></td>
			<td><?php echo $lecture['type']; ?></td>
			<td><?php echo $lecture['comment']; ?></td>
			<td><?php echo $lecture['link']; ?></td>
			<td><?php echo $lecture['pwd']; ?></td>
			<td><?php echo $lecture['start']; ?></td>
			<td><?php echo $lecture['end']; ?></td>
			<td><?php echo $lecture['created']; ?></td>
			<td><?php echo $lecture['modified']; ?></td>
			<td><?php echo $lecture['user_id']; ?></td>
			<td><?php echo $lecture['host_id']; ?></td>
			<td><?php echo $lecture['event_type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'lectures', 'action' => 'view', $lecture['lecture_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'lectures', 'action' => 'edit', $lecture['lecture_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'lectures', 'action' => 'delete', $lecture['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['lecture_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
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
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    		<li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>'.__('Edit Event Type'), array('action' => 'edit', $eventType['EventType']['event_type_id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete Event Type') . '</span>', array('action' => 'delete', $eventType['EventType']['event_type_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $eventType['EventType']['event_type_id'])); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Event Types'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Event Type'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
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