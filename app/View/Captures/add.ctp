<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-film"></span>'.__('Captures'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>'.__('Add Capture'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add Capture'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

<?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>

<?php echo $this->Form->create('Capture', array('role' => 'form')); ?>


<? ################################################################################################################## ?>
<? ################################################### CAPTURE ###################################################### ?>
<? ################################################################################################################## ?>

<?php echo $this->Form->label('Capture.name', __('Name'), array(
    'class' => 'control-label'));?>

<div class="form-group">
    <?php echo $this->Form->input('name', array(
        'before' => '<span class="input-group-addon glyphicon glyphicon-film input-group-glyphicon"> </span>',
        'format' => array('label', 'before', 'input', 'error', 'after'),
        'div' => 'input-group',
        'class' => 'form-control',
        'placeholder' => __('Name'),
        'label' => false));?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('lecture_id', array('class' => 'form-control', 'placeholder' => 'Lecture Id'));?>
</div>

<?php echo $this->Form->label('Capture.status', __('Status'), array(
    'class' => 'control-label'));?>


<div class="form-group">
    <?php echo $this->Form->input('status', array(
        'class' => 'form-control',
        'placeholder' => 'Status',
        'before' => '<span class="input-group-addon glyphicon glyphicon-barcode input-group-glyphicon"> </span>',
        'format' => array('label', 'before', 'input', 'error', 'after'),
        'div' => 'input-group',
        'class' => 'form-control',
        'label' => false,
    ));?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('Event.event_type_id', array('class' => 'form-control', 'placeholder' => 'Event Type Id'));?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('Event.link', array('class' => 'form-control',
        'required' => false,
        'placeholder' => __('Link to Capture Data')));?>
</div>


<div class="form-group">
    <?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id',
        'label' => __('Responsible'),
        'empty' => true));?>
</div>
<div class="form-group">
    <?php echo $this->Form->input('workflow_id', array('class' => 'form-control', 'placeholder' => 'Workflow Id', 'empty' => true));?>
</div>
<?php echo $this->Element('tinymce'); ?>



<? // EVENT ?>

<!--<div class="form-group">
        <?php /*echo $this->Form->input('Event.start',
            array('dateFormat' => Configure::read('Captility.dateFormat'),
                'timeFormat' => '24',
                'minYear' => date('Y') - 2,
                'maxYear' => date('Y') + 5,
                'class' => 'form-control form-control-date',
                'interval' => 15,
                'selected' => array(
                    'day' => date('d'),
                    'month' => date('m'),
                    'year' => date('Y'),
                    'hour' => date('H'),
                    'min' => '00'),
            ));*/?>
    </div>-->



<? ################################################################################################################## ?>
<? ################################################## SCHEDULE ###################################################### ?>
<? ################################################################################################################## ?>

<hr/>

<div class="info-banner info-banner-info" id="Infobanner">

    <h4 data-toggle="collapse" data-parent="#Infobanner" href="#Collabse-info-banner">
        <small class="glyphicon glyphicon-hand-right"></small>
        Zeitplan der Aufnahme
    </h4>


    <div id="Collabse-info-banner" class="panel-collapse collapse <!--in-->">

        <hr/>

        Eine <strong>AufnahmeReihe</strong> bezeichnet eine oder mehrere Aufnahmen des gleichen Typs.<br/>

        Hier können Sie sowohl einzelne Veranstaltungen, als auch Zeitpläne für regelmäßige Veranstaltungen anlegen.
        Eine Ausnahmeregel definiert geplante Termine die ausfallen sollen.</p>

    </div>
</div>






<? // SCHEDULE ?>

<div id="ScheduleContainer">

<div class="panel panel-default">

<div class="panel-heading panel-link" data-toggle="collapse" href="#container0">
    <small class="glyphicon glyphicon-time"></small>
    <strong><? echo __('Configure Schedule')?></strong></div>
<div class="panel-body" id="container0">

<ul class="nav nav-tabs nav-justified tabs-left">
    <li class="active"><a href="#single0" class="form-toggle" data-toggle="tab"><? echo __('Single Capture');?></a>
    </li>
    <li><a href="#regular0" class="form-toggle" data-toggle="tab"><? echo __('Regular Captures');?></a></li>
    <li class="disabled"><a href="#except0" class="form-toggle"
                            data-toggle="tab"><? echo __('Exception Rule');?></a>
    </li>
</ul>


<? ################################################################################################################## ?>
<? ################################################## SINGLE SCHEDULE ############################################### ?>
<? ################################################################################################################## ?>

<!-- Single Instance Schedule -->
<div class="tab-content">
<div class="tab-pane active" id="single0">

    <!--<div class="form-group">
            <?php /*echo $this->Form->input('Schedule.0.start',
                array('dateFormat' => Configure::read('Captility.dateFormat'),
                    'label' => false, 'div' => false,
                    'type' => 'datetime',
                    'timeFormat' => '24',
                    'minYear' => date('Y') - 5,
                    'maxYear' => date('Y') + 5,
                    'class' => 'form-control form-control-date',
                    'interval' => 15,
                    'selected' => array(
                        'hour' => '12',
                        'min' => '00'),
                    'label' => __('Event start')
                ));*/?>
        </div>-->


    <div class="form-group">

        <?php echo $this->Form->label('Schedule.0.interval_start', __('Capture Date'), array(
            'class' => 'control-label'));?>

        <?php
        echo $this->Form->input('Schedule.0.interval_start', array(
            'type' => 'string',
            'format' => array('label', 'before', 'input', 'error', 'after'),
            'div' => 'input-group input-thin',
            'label' => false,
            'class' => 'form-control pickDate',
            'before' => '<span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>',
            'placeholder' => __('Capture Date'),
            'required' => true,
            'error' => true,
            'value' => $this->Form->value('Schedule.0.interval_start')
        ));?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('Schedule.0.repeat_time',
            array('dateFormat' => Configure::read('Captility.dateFormat'),
                'timeFormat' => '24',
                'minYear' => date('Y') - 5,
                'maxYear' => date('Y') + 5,
                'class' => 'form-control form-control-date',
                'interval' => 15,
                'selected' => array(
                    'hour' => '12',
                    'min' => '00'),
            ));?>
    </div>

    <div class="form-group">

        <?php echo $this->Form->input('Schedule.0.duration', array(
            'dateFormat' => Configure::read('Captility.dateFormat'),
            'timeFormat' => '24',
            'type' => 'time',
            'minYear' => date('Y') - 5,
            'maxYear' => date('Y') + 5,
            'class' => 'form-control form-control-date',
            'interval' => 15,
            'selected' => array(
                'day' => date('d'),
                'month' => date('m'),
                'year' => date('Y'),
                'hour' => 2,
                'min' => '00'),
            'label' => __('Event duration')
        ));?>
    </div>


</div>

<? ################################################################################################################## ?>
<? ################################################## REGULAR SCHEDULE ############################################## ?>
<? ################################################################################################################## ?>

<!-- Regular Schedule -->
<div class="tab-pane" id="regular0">

    <!--<div class="form-group">
                    <?php /*echo $this->Form->input('Schedule.0.interval_start',
                        array('dateFormat' => Configure::read('Captility.dateFormat'),
                            'timeFormat' => '24',
                            'minYear' => date('Y') - 5,
                            'maxYear' => date('Y') + 5,
                            'class' => 'form-control form-control-date',
                            'interval' => 15,
                            'selected' => array(
                                'day' => '01',
                                'month' => date('m'),
                                'year' => date('Y')
                            )));*/?>
                </div>
                <div class="form-group">
                    <?php /*echo $this->Form->input('Schedule.0.interval_end',
                        array('dateFormat' => Configure::read('Captility.dateFormat'),
                            'timeFormat' => '24',
                            'minYear' => date('Y') - 5,
                            'maxYear' => date('Y') + 5,
                            'class' => 'form-control form-control-date',
                            'interval' => 15,
                            'selected' => array(
                                'day' => '01',
                                'month' => date('m' + 4),
                                'year' => date('Y')
                            )));*/?>
                </div>-->


    <div class="form-group">

        <?php echo $this->Form->label('Schedule.0.interval_start', __('Capture Interval'), array(
            'class' => 'control-label'));?>

        <div class="input-group input-thin">

            <?php
            echo $this->Form->input('Schedule.0.interval_start', array(
                'type' => 'string',
                'format' => array('label', 'before', 'input', 'error', 'after'),
                'label' => false,
                'div' => false,
                'class' => 'form-control pickDate',
                'before' => '<span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>',
                'placeholder' => __('Begin Interval'),
                'value' => $this->Form->value('Schedule.0.interval_start'),
                'required' => true,
                'disabled' => true
            ));



            echo $this->Form->input('Schedule.0.interval_end', array(
                'type' => 'string',
                'format' => array('label', 'before', 'input', 'error', 'after'),
                'label' => false,
                'div' => false,
                'class' => 'form-control pickDate',
                'before' => '<span class="input-group-addon">' . __('to') . '</span>',
                'placeholder' => __('End Interval'),
                'value' => $this->Form->value('Schedule.0.interval_end'),
                'required' => true,
                'disabled' => true
            ));
            ?>

        </div>
    </div>


    <div class="form-group">
        <?php echo $this->Form->input('Schedule.0.repeat_week', array(
            'class' => 'form-control',
            'placeholder' => __('1 = repeat every Week, 2 = every second and so on...'),
            'options' => array(array(
                'name' => __('Every') . ' ' . __('Week'), 'value' => '1'), array(
                'name' => __('Every second') . ' ' . __('Week'), 'value' => '2'), array(
                'name' => __('Every third') . ' ' . __('Week'), 'value' => '3'), array(
                'name' => __('Every fourth') . ' ' . __('Week'), 'value' => '4')),
            'selected' => 1,
            'disabled' => true,
        ));?>
    </div>


    <div class="form-group">
        <?php echo $this->Form->input('Schedule.0.repeat_day', array(
            'class' => 'form-control',
            'placeholder' => __('"Friday" for every Friday ...'),
            'options' => array(array(
                'name' => __('Monday'), 'value' => 'Monday'), array(
                'name' => __('Tuesday'), 'value' => 'Tuesday'), array(
                'name' => __('Wednesday'), 'value' => 'Wednesday'), array(
                'name' => __('Thursday'), 'value' => 'Thursday'), array(
                'name' => __('Friday'), 'value' => 'Friday'), array(
                'name' => __('Saturday'), 'value' => 'Saturday'), array(
                'name' => __('Sunday'), 'value' => 'Sunday')),
            'selected' => date('l'),
            'disabled' => true,
        ));?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('Schedule.0.repeat_time',
            array('dateFormat' => Configure::read('Captility.dateFormat'),
                'timeFormat' => '24',
                'minYear' => date('Y') - 5,
                'maxYear' => date('Y') + 5,
                'class' => 'form-control form-control-date',
                'interval' => 15,
                'disabled' => true,
                'selected' => array(
                    'hour' => '12',
                    'min' => '00'),
            ));?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('Schedule.0.duration',
            array('dateFormat' => Configure::read('Captility.dateFormat'),
                'timeFormat' => '24',
                'minYear' => date('Y') - 5,
                'maxYear' => date('Y') + 5,
                'class' => 'form-control form-control-date',
                'interval' => 15,
                'disabled' => true,
                'selected' => array(
                    'day' => date('d'),
                    'month' => date('m'),
                    'year' => date('Y'),
                    'hour' => 2,
                    'min' => '00'),
            ));?>
    </div>


</div>
<? ################################################################################################################## ?>
<? ################################################ EXCEPTION SCHEDULE ############################################## ?>
<? ################################################################################################################## ?>

<!-- Exception Schedule -->
<div class="tab-pane" id="except0">

    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Achtung!</strong> Ausnahmeregeln werden in der aktuellen Version von Captility noch nicht
        unterstützt.
    </div>

</div>

<hr/>


<?php echo $this->Form->button('<span class="glyphicon glyphicon-plus"></span>' . __('Add another Schedule'), array(
    'class' => 'btn btn-default form-schedule-add pull-right',
    'escape' => false,
    'type' => 'button',
)); ?>
<?php echo $this->Form->button('<span class="glyphicon glyphicon-remove"></span > ' . __('Delete Schedule'), array(
    'class' => 'btn btn-default form-schedule-remove',
    'escape' => false,
    'type' => 'button',
    'disabled' => true,
)); ?>


</div>

</div>
</div>

</div>

<hr/>

<div class="form-group">
    <?php echo $this->Form->input('comment', array('class' => 'form - control', 'placeholder' => 'Comment'));?>
</div>



<? // END ?>
<?php echo $this->Element('submitArea');?>

<?php echo $this->Form->end() ?>

</div><!-- end col md 12 -->


<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-list"></span><?php echo __('Lectures');?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <div><span class="glyphicon el-icon-random"></span><?php echo __('Workflows');?></div>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Workflows'), array('controller' => 'workflows', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Workflow'), array('controller' => 'workflows', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
