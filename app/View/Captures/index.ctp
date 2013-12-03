<div class="captures index">
	<h2><?php echo __('Captures'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('capture_id'); ?></th>
			<th><?php echo $this->Paginator->sort('online'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('task_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($captures as $capture): ?>
	<tr>
		<td><?php echo h($capture['Capture']['capture_id']); ?>&nbsp;</td>
		<td><?php echo h($capture['Capture']['online']); ?>&nbsp;</td>
		<td><?php echo h($capture['Capture']['name']); ?>&nbsp;</td>
		<td><?php echo h($capture['Capture']['link']); ?>&nbsp;</td>
		<td><?php echo h($capture['Capture']['comment']); ?>&nbsp;</td>
		<td><?php echo h($capture['Capture']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($capture['Capture']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($capture['Capture']['event_id']); ?>&nbsp;</td>
		<td><?php echo h($capture['Capture']['task_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $capture['Capture']['capture_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $capture['Capture']['capture_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $capture['Capture']['capture_id']), null, __('Are you sure you want to delete # %s?', $capture['Capture']['capture_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Capture'), array('action' => 'add')); ?></li>
	</ul>
</div>
