<div class="captures view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Capture'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Capture'), array('action' => 'edit', $capture['Capture']['capture_id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Capture'), array('action' => 'delete', $capture['Capture']['capture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $capture['Capture']['capture_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Captures'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Capture'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tickets'), array('controller' => 'tickets', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Capture Id'); ?></th>
		<td>
			<?php echo h($capture['Capture']['capture_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Online'); ?></th>
		<td>
			<?php echo h($capture['Capture']['online']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Comment'); ?></th>
		<td>
			<?php echo h($capture['Capture']['comment']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($capture['Capture']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Status'); ?></th>
		<td>
			<?php echo h($capture['Capture']['status']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Link'); ?></th>
		<td>
			<?php echo h($capture['Capture']['link']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Date'); ?></th>
		<td>
			<?php echo h($capture['Capture']['date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Published'); ?></th>
		<td>
			<?php echo h($capture['Capture']['published']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Lecture'); ?></th>
		<td>
			<?php echo $this->Html->link($capture['Lecture']['name'], array('controller' => 'lectures', 'action' => 'view', $capture['Lecture']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($capture['User'][''], array('controller' => 'users', 'action' => 'view', $capture['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Event Id'); ?></th>
		<td>
			<?php echo h($capture['Capture']['event_id']); ?>
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
	<h3><?php echo __('Related Tickets'); ?></h3>
	<?php if (!empty($capture['Ticket'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
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
		<th><?php echo __('Capture Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($capture['Ticket'] as $ticket): ?>
		<tr>
			<td><?php echo $ticket['ticket_id']; ?></td>
			<td><?php echo $ticket['status']; ?></td>
			<td><?php echo $ticket['comment']; ?></td>
			<td><?php echo $ticket['created']; ?></td>
			<td><?php echo $ticket['modified']; ?></td>
			<td><?php echo $ticket['ended']; ?></td>
			<td><?php echo $ticket['user_id']; ?></td>
			<td><?php echo $ticket['task_id']; ?></td>
			<td><?php echo $ticket['capture_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tickets', 'action' => 'view', $ticket['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tickets', 'action' => 'edit', $ticket['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'tickets', 'action' => 'delete', $ticket['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $ticket['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($capture['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Type Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Start'); ?></th>
		<th><?php echo __('End'); ?></th>
		<th><?php echo __('All Day'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($capture['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['event_type_id']; ?></td>
			<td><?php echo $event['title']; ?></td>
			<td><?php echo $event['details']; ?></td>
			<td><?php echo $event['start']; ?></td>
			<td><?php echo $event['end']; ?></td>
			<td><?php echo $event['all_day']; ?></td>
			<td><?php echo $event['status']; ?></td>
			<td><?php echo $event['active']; ?></td>
			<td><?php echo $event['created']; ?></td>
			<td><?php echo $event['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'events', 'action' => 'view', $event['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'events', 'action' => 'edit', $event['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'events', 'action' => 'delete', $event['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>	</div>
	</div><!-- end col md 12 -->
</div>
