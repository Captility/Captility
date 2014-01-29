
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-th-list"></span>'.__('Lecture'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Lecture'); ?></h1>
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
		<th><?php echo __('Lecture Id'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['lecture_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Number'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['number']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Semester'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['semester']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Comment'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['comment']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Link'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['link']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Pwd'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['pwd']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Start'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['start']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('End'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['end']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($lecture['Lecture']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($lecture['User']['username'], array('controller' => 'users', 'action' => 'view', $lecture['User']['user_id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Host'); ?></th>
		<td>
			<?php echo $this->Html->link($lecture['Host']['name'], array('controller' => 'hosts', 'action' => 'view', $lecture['Host']['host_id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Event Type'); ?></th>
		<td>
			<?php echo $this->Html->link($lecture['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $lecture['EventType']['event_type_id'])); ?>
			&nbsp;
		</td>
</tr>
        </tbody>
    </table>

            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Captures'); ?></h3>
                <?php if (!empty($lecture['Capture'])): ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        		<th><?php echo __('Capture Id'); ?></th>
		<th><?php echo __('Online'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Lecture Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Workflow Id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    	<?php foreach ($lecture['Capture'] as $capture): ?>
		<tr>
			<td><?php echo $capture['capture_id']; ?></td>
			<td><?php echo $capture['online']; ?></td>
			<td><?php echo $capture['comment']; ?></td>
			<td><?php echo $capture['name']; ?></td>
			<td><?php echo $capture['status']; ?></td>
			<td><?php echo $capture['lecture_id']; ?></td>
			<td><?php echo $capture['user_id']; ?></td>
			<td><?php echo $capture['workflow_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'captures', 'action' => 'view', $capture['capture_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'captures', 'action' => 'edit', $capture['capture_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'captures', 'action' => 'delete', $capture['capture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $capture['capture_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
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
                    		<li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>'.__('Edit Lecture'), array('action' => 'edit', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete Lecture') . '</span>', array('action' => 'delete', $lecture['Lecture']['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['Lecture']['lecture_id'])); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Lectures'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Lecture'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Hosts'), array('controller' => 'hosts', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Host'), array('controller' => 'hosts', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
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