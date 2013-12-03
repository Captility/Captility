<div class="tasks view">
<h2><?php  echo __('Task'); ?></h2>
	<dl>
		<dt><?php echo __('Task Id'); ?></dt>
		<dd>
			<?php echo h($task['Task']['task_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($task['Task']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($task['Task']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Step'); ?></dt>
		<dd>
			<?php echo h($task['Task']['step']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Task'), array('action' => 'edit', $task['Task']['task_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Task'), array('action' => 'delete', $task['Task']['task_id']), null, __('Are you sure you want to delete # %s?', $task['Task']['task_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Captures'), array('controller' => 'captures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Capture'), array('controller' => 'captures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Captures'); ?></h3>
	<?php if (!empty($task['Capture'])): ?>
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
	<?php
		$i = 0;
		foreach ($task['Capture'] as $capture): ?>
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
				<?php echo $this->Html->link(__('View'), array('controller' => 'captures', 'action' => 'view', $capture['user_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'captures', 'action' => 'edit', $capture['user_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'captures', 'action' => 'delete', $capture['user_id']), null, __('Are you sure you want to delete # %s?', $capture['user_id'])); ?>
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
	<h3><?php echo __('Related Tickets'); ?></h3>
	<?php if (!empty($task['Ticket'])): ?>
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
	<?php
		$i = 0;
		foreach ($task['Ticket'] as $ticket): ?>
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
