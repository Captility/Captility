<div class="captures view">
<h2><?php  echo __('Capture'); ?></h2>
	<dl>
		<dt><?php echo __('Capture Id'); ?></dt>
		<dd>
			<?php echo h($capture['Capture']['capture_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Online'); ?></dt>
		<dd>
			<?php echo h($capture['Capture']['online']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($capture['Capture']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($capture['Capture']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
		<dd>
			<?php echo h($capture['Capture']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($capture['Capture']['user_id']); ?>
            <?php echo $this->Html->link($capture['User']['username'], array('controller' => 'users', 'action' => 'view', $capture['User']['user_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event Id'); ?></dt>
		<dd>
			<?php echo h($capture['Capture']['event_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task Id'); ?></dt>
		<dd>
			<?php echo h($capture['Capture']['task_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Capture'), array('action' => 'edit', $capture['Capture']['capture_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Capture'), array('action' => 'delete', $capture['Capture']['capture_id']), null, __('Are you sure you want to delete # %s?', $capture['Capture']['capture_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Captures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Capture'), array('action' => 'add')); ?> </li>
	</ul>
</div>
