<div class="workflows form">
<?php echo $this->Form->create('Workflow'); ?>
	<fieldset>
		<legend><?php echo __('Edit Workflow'); ?></legend>
	<?php
		echo $this->Form->input('workflow_id');
		echo $this->Form->input('name');
		echo $this->Form->input('Task');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Workflow.workflow_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Workflow.workflow_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Workflows'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
