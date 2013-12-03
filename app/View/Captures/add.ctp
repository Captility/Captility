<div class="captures form">
<?php echo $this->Form->create('Capture'); ?>
	<fieldset>
		<legend><?php echo __('Add Capture'); ?></legend>
	<?php
		echo $this->Form->input('capture_id');
		echo $this->Form->input('online');
		echo $this->Form->input('name', array('label' => 'Aufzeichnungssname'));
		echo $this->Form->input('link', array('label' => 'Link zur Aufnahmedatei'));
		echo $this->Form->input('comment', array('label' => 'Anmerkungen'));
		echo $this->Form->input('user_id', array('label' => 'Verantortlicher Benutzer'));
		echo $this->Form->input('event_id', array('label' => 'Zugehörige Veranstaltung'));
		echo $this->Form->input('task_id', array('label' => 'Zugehöriges Ticket'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Captures'), array('action' => 'index')); ?></li>
	</ul>
</div>

