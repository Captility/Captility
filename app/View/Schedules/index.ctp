
<? $this->Html->addCrumb(__('Schedules'), '#', array('class' => 'active')); ?>
<!--<div class=" index">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Schedules'); ?></h1>
        </div>
    </div>
    <!-- end col md 12 -->
</div><!-- end row -->


<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <thead>
        <tr>
                            <th><?php echo $this->Paginator->sort('schedule_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('interval_start'); ?></th>
                            <th><?php echo $this->Paginator->sort('interval_end'); ?></th>
                            <th><?php echo $this->Paginator->sort('duration'); ?></th>
                            <th><?php echo $this->Paginator->sort('repeat_time'); ?></th>
                            <th><?php echo $this->Paginator->sort('repeat_day'); ?></th>
                            <th><?php echo $this->Paginator->sort('repeat_week'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th><?php echo $this->Paginator->sort('capture_id'); ?></th>
                        <th class="actions"></th>
        </tr>
        </thead>
        <tbody>
        	<?php foreach ($schedules as $schedule): ?>
					<tr>
						<td><?php echo h($schedule['Schedule']['schedule_id']); ?>&nbsp;</td>
						<td><?php echo h($schedule['Schedule']['interval_start']); ?>&nbsp;</td>
						<td><?php echo h($schedule['Schedule']['interval_end']); ?>&nbsp;</td>
						<td><?php echo h($schedule['Schedule']['duration']); ?>&nbsp;</td>
						<td><?php echo h($schedule['Schedule']['repeat_time']); ?>&nbsp;</td>
						<td><?php echo h($schedule['Schedule']['repeat_day']); ?>&nbsp;</td>
						<td><?php echo h($schedule['Schedule']['repeat_week']); ?>&nbsp;</td>
						<td><?php echo h($schedule['Schedule']['created']); ?>&nbsp;</td>
						<td><?php echo h($schedule['Schedule']['modified']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($schedule['Capture']['name'], array('controller' => 'captures', 'action' => 'view', $schedule['Capture']['capture_id'])); ?>
		</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $schedule['Schedule']['schedule_id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $schedule['Schedule']['schedule_id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $schedule['Schedule']['schedule_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $schedule['Schedule']['schedule_id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
        </tbody>
    </table>

    <p>
        <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
    </p>

    <?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
    <ul class="pagination pagination-sm">
        	<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
    </ul>
    <?php } ?>

</div> <!-- end col md 9 -->

<div class="col-md-3 action-column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Schedule'), array('action' => 'add'), array('escape' => false)); ?></li>
                    		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
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
</div><!-- end col md 3 -->

<!--</div>--><!-- end row -->


<!--</div>--><!-- end containing of content -->