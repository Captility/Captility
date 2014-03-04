<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>


<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-th-list"></span>'.__('Lectures'), '#', array('class' => 'active')); ?>
<!--<div class=" index">-->

<div class="row">
    <div class="col-md-1 column">
     <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-th-list"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Lectures'); ?></h1>
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
                            <th><?php echo $this->Paginator->sort('lecture_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('number'); ?></th>
                            <th><?php echo $this->Paginator->sort('name'); ?></th>
                            <th><?php echo $this->Paginator->sort('semester'); ?></th>
                            <th><?php echo $this->Paginator->sort('type'); ?></th>
                            <th><?php echo $this->Paginator->sort('comment'); ?></th>
                            <th><?php echo $this->Paginator->sort('link'); ?></th>
                            <th><?php echo $this->Paginator->sort('pwd'); ?></th>
                            <th><?php echo $this->Paginator->sort('start'); ?></th>
                            <th><?php echo $this->Paginator->sort('end'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('host_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('event_type_id'); ?></th>
                        <th class="actions"></th>
        </tr>
        </thead>
        <tbody>
        	<?php foreach ($lectures as $lecture): ?>
					<tr>
						<td><?php echo h($lecture['Lecture']['lecture_id']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['number']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['name']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['semester']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['type']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['comment']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['link']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['pwd']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['start']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['end']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['created']); ?>&nbsp;</td>
						<td><?php echo h($lecture['Lecture']['modified']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($lecture['User']['username'], array('controller' => 'users', 'action' => 'view', $lecture['User']['user_id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($lecture['Host']['name'], array('controller' => 'hosts', 'action' => 'view', $lecture['Host']['host_id'])); ?>
		</td>
								<td>
			<?php echo $this->Html->link($lecture['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $lecture['EventType']['event_type_id'])); ?>
		</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('action' => 'edit', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $lecture['Lecture']['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['Lecture']['lecture_id'])); ?>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Lecture'), array('action' => 'add'), array('escape' => false)); ?></li>
                    		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Hosts'), array('controller' => 'hosts', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Host'), array('controller' => 'hosts', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->

<!--</div>--><!-- end row -->


<!--</div>--><!-- end containing of content -->