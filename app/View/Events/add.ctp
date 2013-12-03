<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('number');
		echo $this->Form->input('name');
		echo $this->Form->input('contact');
		echo $this->Form->input('mail');
		echo $this->Form->input('host');
		echo $this->Form->input('semester');
		echo $this->Form->input('type');
		echo $this->Form->input('comment');
		echo $this->Form->input('user_id');
		echo $this->Form->input('workflow_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflows'), array('controller' => 'workflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow'), array('controller' => 'workflows', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Captures'), array('controller' => 'captures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Capture'), array('controller' => 'captures', 'action' => 'add')); ?> </li>
	</ul>
</div>
