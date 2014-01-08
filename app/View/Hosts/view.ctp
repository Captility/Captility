
<? $this->Html->addCrumb(__('Host'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Host'); ?></h1>
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
		<th><?php echo __('Host Id'); ?></th>
		<td>
			<?php echo h($host['Host']['host_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($host['Host']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($host['Host']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Contact'); ?></th>
		<td>
			<?php echo h($host['Host']['contact']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Contact Email'); ?></th>
		<td>
			<?php echo h($host['Host']['contact_email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Comment'); ?></th>
		<td>
			<?php echo h($host['Host']['comment']); ?>
			&nbsp;
		</td>
</tr>
        </tbody>
    </table>

            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Lectures'); ?></h3>
                <?php if (!empty($host['Lecture'])): ?>
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
                    	<?php foreach ($host['Lecture'] as $lecture): ?>
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
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'lectures', 'action' => 'view', $lecture['lecture_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'lectures', 'action' => 'edit', $lecture['lecture_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'lectures', 'action' => 'delete', $lecture['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['lecture_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
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
                    		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Host'), array('action' => 'edit', $host['Host']['host_id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Host'), array('action' => 'delete', $host['Host']['host_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $host['Host']['host_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Hosts'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Host'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
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