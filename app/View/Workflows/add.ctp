<? $this->Breadcrumbs->addCrumb(__('Team'), '/pages/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-random"></span>' . __('Workflows'), array('action' => 'index')); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>' . __('Add Workflow'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-random"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add Workflow'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Workflow', Configure::read('FORM.INPUT_DEFAULTS')); ?>

    <?php echo $this->Form->input('name', array(

        'placeholder' => __('Name'),
        'label' => __('Workflow'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-random input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'autofocus' => 'autofocus',
        'class' => 'form-control input-thin'
    ));?>


    <!-- /// TESTAREA -->


    <ul class="timeline workflow-task-list">


        <li class="task-template">
            <div class="timeline-badge workflow-task primary"><span class="glyphicon glyphicon-tags"></span></div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title task-title task-view">
                        <hr/>
                    </h4>

                    <div class="text-name-field task-edit">
                        <?php echo $this->Form->input('Task.$placeholder$.name', array(

                            'placeholder' => __('Name'),
                            'label' => __('Name'),
                            'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-tags input-group-glyphicon"></span>', 'afterInput' => '</div>',
                            'autofocus' => 'autofocus',
                            'disabled' => true,
                        ));?>
                    </div>

                    <div class="btn-group-vertical pull-right task-view">
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="glyphicon  el-icon-chevron-up"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="glyphicon el-icon-cog"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm">
                            <i class="glyphicon  el-icon-chevron-down"></i>
                        </button>
                    </div>
                </div>

                <div class="timeline-body">
                    <p class="task-description task-view">
                        <small class="text-muted task-description">

                        </small>
                    </p>

                    <div class="text-description-field task-edit">
                        <?php echo $this->Form->input('Task.$placeholder$.description', array(
                            'placeholder' => __('Description'),
                           'disabled' => true,
                        ));?>
                    </div>
                    <div class="text-step-field task-edit">
                        <?php echo $this->Form->hidden('Task.$placeholder$.step', array(
                            'placeholder' => 'Step',
                            'hiddenField' => true,
                           'disabled' => true,
                        ));?>
                    </div>
                    <div class="task-button task-edit">


                    </div>
                </div>


            </div>
        </li>


        <li class="workflow-task-add sort-disabled">
            <div class="timeline-badge success"><span class="glyphicon glyphicon-plus"></span></div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title"><a href="javascript:void(0)"><? echo __('Add new Task') ?></a></h4>
                </div>
                <div class="timeline-body">
                    <small class="text-muted"><? echo __('Add a new Task to this Workflow') ?></small>
                </div>
            </div>
        </li>


    </ul>


    <!-- /// TESTAREA -->


    <?php echo $this->Element('submitArea');?>

    <?php echo $this->Form->end() ?>

</div><!-- end col md 12 -->


<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?></h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Workflows'), array('action' => 'index'), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Tasks'), array('controller' => 'tasks', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
