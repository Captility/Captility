<div class="events form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Event'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Event.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Event.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Events'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Event', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('event_type_id', array('class' => 'form-control', 'placeholder' => 'Event Type Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('details', array('class' => 'form-control', 'placeholder' => 'Details'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('start', array(  'dateFormat'=> Configure::read('Captility.dateFormat') ,
                        'timeFormat'=> '24',
                        'minYear' => date('Y')-2,
                        'maxYear' => date('Y')+5,
                        'class' => 'form-control form-control-date'));?>
                </div>
				<div class="form-group">
					<?php echo $this->Form->input('end', array(  'dateFormat'=> Configure::read('Captility.dateFormat') ,
                        'timeFormat'=> '24',
                        'minYear' => date('Y')-2,
                        'maxYear' => date('Y')+5,
                        'class' => 'form-control form-control-date'));?>
                </div>
				<div class="form-group">
					<?php echo $this->Form->input('all_day', array('class' => 'form-control', 'placeholder' => 'All Day'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('active', array('class' => 'form-control', 'placeholder' => 'Active'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
