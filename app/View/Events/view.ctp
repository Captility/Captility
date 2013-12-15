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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Event'), array('action' => 'edit', $event['Event']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Event'), array('action' => 'delete', $event['Event']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Events'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Event'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
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
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Event Type'); ?></th>
		<td>
			<?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($event['Event']['title']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Details'); ?></th>
		<td>
			<?php echo h($event['Event']['details']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Start'); ?></th>
		<td>
			<?php echo h($event['Event']['start']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('End'); ?></th>
		<td>
			<?php echo h($event['Event']['end']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('All Day'); ?></th>
		<td>
			<?php echo h($event['Event']['all_day']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Status'); ?></th>
		<td>
			<?php echo h($event['Event']['status']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Active'); ?></th>
		<td>
			<?php echo h($event['Event']['active']); ?>
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
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

	<div class="row related">
		<div class="col-md-12">
			<h3><?php echo __('Related Captures'); ?></h3>
			<table class="table table-striped">
			<tbody>
		<?php if (!empty($event['Capture'])): ?>
			<tr>
				<th><?php echo __('Capture Id'); ?></th>
		<td>
	<?php echo $event['Capture']['capture_id']; ?>
&nbsp;</td>
		<th><?php echo __('Online'); ?></th>
		<td>
	<?php echo $event['Capture']['online']; ?>
&nbsp;</td>
		<th><?php echo __('Comment'); ?></th>
		<td>
	<?php echo $event['Capture']['comment']; ?>
&nbsp;</td>
		<th><?php echo __('Name'); ?></th>
		<td>
	<?php echo $event['Capture']['name']; ?>
&nbsp;</td>
		<th><?php echo __('Status'); ?></th>
		<td>
	<?php echo $event['Capture']['status']; ?>
&nbsp;</td>
		<th><?php echo __('Link'); ?></th>
		<td>
	<?php echo $event['Capture']['link']; ?>
&nbsp;</td>
		<th><?php echo __('Date'); ?></th>
		<td>
	<?php echo $event['Capture']['date']; ?>
&nbsp;</td>
		<th><?php echo __('Published'); ?></th>
		<td>
	<?php echo $event['Capture']['published']; ?>
&nbsp;</td>
		<th><?php echo __('Lecture Id'); ?></th>
		<td>
	<?php echo $event['Capture']['lecture_id']; ?>
&nbsp;</td>
		<th><?php echo __('User Id'); ?></th>
		<td>
	<?php echo $event['Capture']['user_id']; ?>
&nbsp;</td>
		<th><?php echo __('Event Id'); ?></th>
		<td>
	<?php echo $event['Capture']['event_id']; ?>
&nbsp;</td>
			</tr>
		<?php endif; ?>
			</tbody>
			</table>
			<div class="actions">
				<?php echo $this->Html->link(__('Edit Capture'), array('controller' => 'captures', 'action' => 'edit', $event['Capture']['capture_id']), array('escape' => false, 'class' => 'btn btn-primary')); ?>
			</div>
		</div><!-- end col md 12 -->
	</div>
	