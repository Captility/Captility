
<? $this->Breadcrumbs->addCrumb(__('Device'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Device'); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <tbody>
        <tr>
		<th><?php echo __('Device Id'); ?></th>
		<td>
			<?php echo h($device['Device']['device_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($device['Device']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ip Adress'); ?></th>
		<td>
			<?php echo h($device['Device']['ip_adress']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Location'); ?></th>
		<td>
			<?php echo h($device['Device']['location']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Username'); ?></th>
		<td>
			<?php echo h($device['Device']['username']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Password'); ?></th>
		<td>
			<?php echo h($device['Device']['password']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($device['Device']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Link'); ?></th>
		<td>
			<?php echo h($device['Device']['link']); ?>
			&nbsp;
		</td>
</tr>
        </tbody>
    </table>

            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Events'); ?></h3>
                <?php if (!empty($device['Event'])): ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Start'); ?></th>
		<th><?php echo __('End'); ?></th>
		<th><?php echo __('All Day'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Event Type Id'); ?></th>
		<th><?php echo __('Schedule Id'); ?></th>
		<th><?php echo __('Capture Id'); ?></th>
		<th><?php echo __('Device Id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    	<?php foreach ($device['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['event_id']; ?></td>
			<td><?php echo $event['title']; ?></td>
			<td><?php echo $event['comment']; ?></td>
			<td><?php echo $event['start']; ?></td>
			<td><?php echo $event['end']; ?></td>
			<td><?php echo $event['all_day']; ?></td>
			<td><?php echo $event['status']; ?></td>
			<td><?php echo $event['link']; ?></td>
			<td><?php echo $event['location']; ?></td>
			<td><?php echo $event['created']; ?></td>
			<td><?php echo $event['modified']; ?></td>
			<td><?php echo $event['event_type_id']; ?></td>
			<td><?php echo $event['schedule_id']; ?></td>
			<td><?php echo $event['capture_id']; ?></td>
			<td><?php echo $event['device_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'events', 'action' => 'view', $event['event_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon el-icon-file-edit"></span>'), array('controller' => 'events', 'action' => 'edit', $event['event_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), array('controller' => 'events', 'action' => 'delete', $event['event_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['event_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
            </div>
            <!-- end col md 12 -->
        </div>
    

</div>
<!-- end col md 9 -->

<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    		<li><?php echo $this->Html->link(__('<span class="glyphicon el-icon-file-edit"></span>Edit Device'), array('action' => 'edit', $device['Device']['device_id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>Delete Device'), array('action' => 'delete', $device['Device']['device_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $device['Device']['device_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>List Devices'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Device'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar)) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets)) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->

<!--</div>-->
<!--</div>-->