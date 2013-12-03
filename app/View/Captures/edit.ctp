<div class="captures form">
<?php echo $this->Form->create('Capture'); ?>
	<fieldset>
		<legend><?php echo __('Edit Capture'); ?></legend>
	<?php
		echo $this->Form->input('capture_id');
		echo $this->Form->input('online');
		echo $this->Form->input('name');
		echo $this->Form->input('link');
		echo $this->Form->input('comment');
		echo $this->Form->input('user_id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('task_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Capture.y')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Capture.y'))); ?></li>
		<li><?php echo $this->Html->link(__('List Captures'), array('action' => 'index')); ?></li>
	</ul>
</div>
