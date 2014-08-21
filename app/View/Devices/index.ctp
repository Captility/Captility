
<? $this->Breadcrumbs->addCrumb(__('Devices'), '#', array('class' => 'active')); ?>
<!--<div class=" index">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Devices'); ?></h1>
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
                            <th><?php echo $this->Paginator->sort('device_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('name'); ?></th>
                            <th><?php echo $this->Paginator->sort('ip_adress'); ?></th>
                            <th><?php echo $this->Paginator->sort('location'); ?></th>
                            <th><?php echo $this->Paginator->sort('username'); ?></th>
                            <th><?php echo $this->Paginator->sort('password'); ?></th>
                            <th><?php echo $this->Paginator->sort('type'); ?></th>
                            <th><?php echo $this->Paginator->sort('link'); ?></th>
                        <th class="actions"></th>
        </tr>
        </thead>
        <tbody>
        	<?php foreach ($devices as $device): ?>
					<tr>
						<td><?php echo h($device['Device']['device_id']); ?>&nbsp;</td>
						<td><?php echo h($device['Device']['name']); ?>&nbsp;</td>
						<td><?php echo h($device['Device']['ip_adress']); ?>&nbsp;</td>
						<td><?php echo h($device['Device']['location']); ?>&nbsp;</td>
						<td><?php echo h($device['Device']['username']); ?>&nbsp;</td>
						<td><?php echo h($device['Device']['password']); ?>&nbsp;</td>
						<td><?php echo h($device['Device']['type']); ?>&nbsp;</td>
						<td><?php echo h($device['Device']['link']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $device['Device']['device_id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon el-icon-file-edit"></span>', array('action' => 'edit', $device['Device']['device_id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $device['Device']['device_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $device['Device']['device_id'])); ?>
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
					echo $this->Paginator->prev('← ' . __('Previous'), array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next(__('Next') . ' →', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next →</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
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
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Device'), array('action' => 'add'), array('escape' => false)); ?></li>
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