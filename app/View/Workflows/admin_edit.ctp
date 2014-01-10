
<? $this->Html->addCrumb(__('Workflows'),array('action' => 'index')); ?><?php $this->Html->addCrumb(__('Admin Edit Workflow'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Admin Edit Workflow'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    			<?php echo $this->Form->create('Workflow', array('role' => 'form')); ?>

    				<div class="form-group">
					<?php echo $this->Form->input('workflow_id', array('class' => 'form-control', 'placeholder' => 'Workflow Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
    				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
				</div>

			<?php echo $this->Form->end() ?>

</div><!-- end col md 12 -->


<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>Delete'), array('action' => 'delete', $this->Form->value('Workflow.workflow_id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Workflow.workflow_id'))); ?></li>
                                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>List Workflows'), array('action' => 'index'), array('escape' => false)); ?></li>
                    		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>List Tasks'), array('controller' => 'tasks', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar)) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets)) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
