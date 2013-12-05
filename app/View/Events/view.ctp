<div class="events view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Event'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Event'), array('action' => 'edit', $event['Event']['event_id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Event'), array('action' => 'delete', $event['Event']['event_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['Event']['event_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Events'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Event'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Workflows'), array('controller' => 'workflows', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Workflow'), array('controller' => 'workflows', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Event Id'); ?></th>
		<td>
			<?php echo h($event['Event']['event_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Number'); ?></th>
		<td>
			<?php echo h($event['Event']['number']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($event['Event']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Contact'); ?></th>
		<td>
			<?php echo h($event['Event']['contact']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mail'); ?></th>
		<td>
			<?php echo h($event['Event']['mail']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Host'); ?></th>
		<td>
			<?php echo h($event['Event']['host']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Semester'); ?></th>
		<td>
			<?php echo h($event['Event']['semester']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($event['Event']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Comment'); ?></th>
		<td>
			<?php echo h($event['Event']['comment']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($event['Event']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($event['User']['username'], array('controller' => 'users', 'action' => 'view', $event['User']['user_id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Workflow'); ?></th>
		<td>
			<?php echo $this->Html->link($event['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $event['Workflow']['workflow_id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Captures'); ?></h3>
	<?php if (!empty($event['Capture'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Capture Id'); ?></th>
		<th><?php echo __('Online'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Task Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($event['Capture'] as $capture): ?>
		<tr>
			<td><?php echo $capture['capture_id']; ?></td>
			<td><?php echo $capture['online']; ?></td>
			<td><?php echo $capture['name']; ?></td>
			<td><?php echo $capture['link']; ?></td>
			<td><?php echo $capture['comment']; ?></td>
			<td><?php echo $capture['user_id']; ?></td>
			<td><?php echo $capture['event_id']; ?></td>
			<td><?php echo $capture['task_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'captures', 'action' => 'view', $capture['capture_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'captures', 'action' => 'edit', $capture['capture_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'captures', 'action' => 'delete', $capture['capture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $capture['capture_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
