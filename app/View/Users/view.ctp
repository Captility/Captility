<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($user['User']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['user_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['user_id']), null, __('Are you sure you want to delete # %s?', $user['User']['user_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Captures'), array('controller' => 'captures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Capture'), array('controller' => 'captures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Captures'); ?></h3>
	<?php if (!empty($user['Capture'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Capture Id'); ?></th>
		<th><?php echo __('Online'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Task Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Capture'] as $capture): ?>
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
				<?php echo $this->Html->link(__('View'), array('controller' => 'captures', 'action' => 'view', $capture['capture_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'captures', 'action' => 'edit', $capture['capture_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'captures', 'action' => 'delete', $capture['capture_id']), null, __('Are you sure you want to delete # %s?', $capture['capture_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Capture'), array('controller' => 'captures', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($user['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Mail'); ?></th>
		<th><?php echo __('Host'); ?></th>
		<th><?php echo __('Semester'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Workflow Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['event_id']; ?></td>
			<td><?php echo $event['number']; ?></td>
			<td><?php echo $event['name']; ?></td>
			<td><?php echo $event['contact']; ?></td>
			<td><?php echo $event['mail']; ?></td>
			<td><?php echo $event['host']; ?></td>
			<td><?php echo $event['semester']; ?></td>
			<td><?php echo $event['type']; ?></td>
			<td><?php echo $event['comment']; ?></td>
			<td><?php echo $event['created']; ?></td>
			<td><?php echo $event['modified']; ?></td>
			<td><?php echo $event['user_id']; ?></td>
			<td><?php echo $event['workflow_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['event_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['event_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['event_id']), null, __('Are you sure you want to delete # %s?', $event['event_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tickets'); ?></h3>
	<?php if (!empty($user['Ticket'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Ticket Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Ended'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Task Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Ticket'] as $ticket): ?>
		<tr>
			<td><?php echo $ticket['ticket_id']; ?></td>
			<td><?php echo $ticket['status']; ?></td>
			<td><?php echo $ticket['comment']; ?></td>
			<td><?php echo $ticket['created']; ?></td>
			<td><?php echo $ticket['modified']; ?></td>
			<td><?php echo $ticket['ended']; ?></td>
			<td><?php echo $ticket['user_id']; ?></td>
			<td><?php echo $ticket['task_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tickets', 'action' => 'view', $ticket['ticket_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tickets', 'action' => 'edit', $ticket['ticket_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tickets', 'action' => 'delete', $ticket['ticket_id']), null, __('Are you sure you want to delete # %s?', $ticket['ticket_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
