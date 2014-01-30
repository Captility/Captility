<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-film"></span>' . __('Captures'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb(' #' . h($this->request->data['Capture']['capture_id']) . ' ' . h($this->request->data['Capture']['name']), '/captures/view/' . h($this->request->data['Capture']['capture_id'])); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Capture'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
     <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-film"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Edit Capture'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

<?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>

<?php echo $this->Form->create('Capture', Configure::read('FORM.INPUT_DEFAULTS')); ?>



<? ################################################################################################################## ?>
<? ################################################### CAPTURE ###################################################### ?>
<? ################################################################################################################## ?>

<div class="form-group">
    <?php echo $this->Form->input('capture_id');?>
</div>


<?php echo $this->Form->input('Capture.name', array(

    'label' => __('Name'),
    'placeholder' => __('Name'),
    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-film input-group-glyphicon"></span>', 'afterInput' => '</div>',

));?>



<?php echo $this->Form->input('lecture_id', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-th-list input-group-glyphicon"></span>', 'afterInput' => '</div>',

));?>


<div class="form-group form-horizontal">

    <label for="CaptureStatus">Status</label>

    <div class="required">
        <div class="input input-group select required">

            <span class="input-group-addon glyphicon glyphicon-barcode input-group-glyphicon"></span>

            <select name="data[Capture][status]" class="form-control input-thin"
                    id="CaptureStatus" required="required"
                    style="/* display: none; */">

                <? foreach (Configure::read('CAPTURE.STATUSES') as $status => $class): ?>

                    <option <? if ($this->request->data['Capture']['status'] == $status) echo 'selected';?>
                        data-content='<span class="label label-<? echo $class ?>"><? echo __($status) ?></span>'><? echo $status ?></option>
                <? endforeach; ?>

            </select>
        </div>
    </div>
</div>





<?php echo $this->Form->input('Event.event_type_id', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-facetime-video input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'selected' => $this->Form->value('Event.0.event_type_id')

));?>


<?php echo $this->Form->input('link', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-link input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'placeholder' => __('http://www.captility.de'),

));?>



<?php echo $this->Form->input('user_id', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-user input-group-glyphicon"></span>', 'afterInput' => '</div>',

    'label' => __('Responsible'),
    'empty' => true, 'required' => false
));?>




<?php echo $this->Form->input('workflow_id', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-random input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'empty' => true, 'required' => false
));?>


<?php echo $this->Element('tinymce'); ?>



<? /* //TODO: CAPTURE::EDIT

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


<div id="ScheduleContainer">

<?php foreach ($this->request->data['Schedule'] as $sid => $schedule): ?>

    <? $singleSchedule = (empty($schedule['interval_end'])) ? true : false; ?>

    <? // SCHEDULE ?>

    <div class="panel panel-default">

    <div class="panel-heading panel-link" data-toggle="collapse" href="#container<? echo $sid ?>">
        <small class="glyphicon glyphicon-time"></small>
        <strong><? echo __('Configure Schedule')?></strong></div>
    <div class="panel-body" id="container<? echo $sid ?>">

    <ul class="nav nav-tabs nav-justified tabs-left">
        <li <? echo ($singleSchedule ? 'class="active"' : ''); ?>><a href="#single<? echo $sid ?>" class="form-toggle"
                                                                     data-toggle="tab"><? echo __('Single Capture');?></a>
        </li>
        <li <? echo (!$singleSchedule ? 'class="active"' : ''); ?>><a href="#regular<? echo $sid ?>" class="form-toggle"
                                                                      data-toggle="tab"><? echo __('Regular Captures');?></a>
        </li>
        <li class="disabled"><a href="#except0" class="form-toggle"
                                data-toggle="tab"><? echo __('Exception Rule');?></a>
        </li>
    </ul>


    <? ################################################################################################################## ?>
    <? ################################################## SINGLE SCHEDULE ############################################### ?>
    <? ################################################################################################################## ?>

    <!-- Single Instance Schedule -->
    <div class="tab-content">
    <div class="tab-pane <? echo ($singleSchedule ? 'active' : ''); ?>" id="single<? echo $sid ?>">


        <div class="form-group">

            <?php echo $this->Form->label('Schedule.' . $sid . '.interval_start', __('Capture Date'), array(
                'class' => 'control-label'));?>

            <?php
            echo $this->Form->input('Schedule.' . $sid . '.interval_start', array(
                'type' => 'string',
                'format' => array('label', 'before', 'input', 'error', 'after'),
                'div' => 'input-group input-thin',
                'label' => false,
                'class' => 'form-control pickDate',
                'before' => '<span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>',
                'placeholder' => __('Capture Date'),
                'required' => true,
                'error' => true,
                'value' => $this->Time->nice(strtotime(h($this->Form->value('Schedule.' . $sid . '.interval_start'))), 'CET', '%a, %d.%m.%Y'),
                'disabled' => !$singleSchedule
            ));?>
        </div>

        <div class="form-group">
            <?php echo $this->Form->input('Schedule.' . $sid . '.repeat_time',
                array('dateFormat' => Configure::read('Captility.dateFormat'),
                    'timeFormat' => '24',
                    'minYear' => date('Y') - 5,
                    'maxYear' => date('Y') + 5,
                    'class' => 'form-control form-control-date',
                    'interval' => 15,
                    'value' => $this->Form->value('Schedule.' . $sid . '.interval_repeat_time'),
                    'disabled' => !$singleSchedule
                ));?>
        </div>

        <div class="form-group">

            <?php echo $this->Form->input('Schedule.' . $sid . '.duration', array(
                'dateFormat' => Configure::read('Captility.dateFormat'),
                'timeFormat' => '24',
                'type' => 'time',
                'minYear' => date('Y') - 5,
                'maxYear' => date('Y') + 5,
                'class' => 'form-control form-control-date',
                'interval' => 15,
                'value' => $this->Form->value('Schedule.' . $sid . '.duration'),
                'disabled' => !$singleSchedule
            ));?>
        </div>


    </div>

    <? ################################################################################################################## ?>
    <? ################################################## REGULAR SCHEDULE ############################################## ?>
    <? ################################################################################################################## ?>

    <!-- Regular Schedule -->
    <div class="tab-pane <? echo (!$singleSchedule ? 'active' : ''); ?>" id="regular<? echo $sid ?>">

        <div class="form-group">

            <?php echo $this->Form->label('Schedule.' . $sid . '.interval_start', __('Capture Interval'), array(
                'class' => 'control-label'));?>

            <div class="input-group">

                <?php
                echo $this->Form->input('Schedule.' . $sid . '.interval_start', array(
                    'type' => 'string',
                    'format' => array('label', 'before', 'input', 'error', 'after'),
                    'label' => false,
                    'div' => false,
                    'class' => 'form-control pickDate',
                    'before' => '<span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>',
                    'placeholder' => __('Begin Interval'),
                    'value' => $this->Time->nice(strtotime(h($this->Form->value('Schedule.' . $sid . '.interval_start'))), 'CET', '%a, %d.%m.%Y'),
                    'required' => true,
                    'disabled' => $singleSchedule
                ));



                echo $this->Form->input('Schedule.' . $sid . '.interval_end', array(
                    'type' => 'string',
                    'format' => array('label', 'before', 'input', 'error', 'after'),
                    'label' => false,
                    'div' => false,
                    'class' => 'form-control pickDate',
                    'before' => '<span class="input-group-addon">' . __('to') . '</span>',
                    'placeholder' => __('End Interval'),
                    'value' => $this->Time->nice(strtotime(h($this->Form->value('Schedule.' . $sid . '.interval_end'))), 'CET', '%a, %d.%m.%Y'),
                    'required' => true,
                    'disabled' => $singleSchedule
                ));
                ?>

            </div>
        </div>


        <div class="form-group">
            <?php echo $this->Form->input('Schedule.' . $sid . '.repeat_week', array(
                'class' => 'form-control',
                'placeholder' => __('1 = repeat every Week, 2 = every second and so on...'),
                'options' => array(array(
                    'name' => __('Every') . ' ' . __('Week'), 'value' => '1'), array(
                    'name' => __('Every second') . ' ' . __('Week'), 'value' => '2'), array(
                    'name' => __('Every third') . ' ' . __('Week'), 'value' => '3'), array(
                    'name' => __('Every fourth') . ' ' . __('Week'), 'value' => '4')),
                'value' => $this->Form->value('Schedule.' . $sid . '.repeat_week'),
                'disabled' => $singleSchedule
            ));?>
        </div>


        <div class="form-group">
            <?php echo $this->Form->input('Schedule.' . $sid . '.repeat_day', array(
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
                'value' => $this->Form->value('Schedule.' . $sid . '.repeat_day'),
                'disabled' => $singleSchedule,
            ));?>
        </div>

        <div class="form-group">
            <?php echo $this->Form->input('Schedule.' . $sid . '.repeat_time',
                array('dateFormat' => Configure::read('Captility.dateFormat'),
                    'timeFormat' => '24',
                    'minYear' => date('Y') - 5,
                    'maxYear' => date('Y') + 5,
                    'class' => 'form-control form-control-date',
                    'interval' => 15,
                    'disabled' => $singleSchedule,
                    'value' => $this->Form->value('Schedule.' . $sid . '.repeat_time'),
                ));?>
        </div>

        <div class="form-group">
            <?php echo $this->Form->input('Schedule.' . $sid . '.duration',
                array('dateFormat' => Configure::read('Captility.dateFormat'),
                    'timeFormat' => '24',
                    'minYear' => date('Y') - 5,
                    'maxYear' => date('Y') + 5,
                    'class' => 'form-control form-control-date',
                    'interval' => 15,
                    'disabled' => $singleSchedule,
                    'value' => $this->Form->value('Schedule.01.duration'),
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
    <?php echo $this->Form->button('<span class="glyphicon glyphicon-trash"></span > ' . __('Delete Schedule'), array(
        'class' => 'btn btn-default form-schedule-remove',
        'escape' => false,
        'type' => 'button',
        'disabled' => (count($this->request->data['Schedule']) == 1) ? true : false,
    )); ?>


    </div>

    </div>
    </div>



<?php endforeach;?>

</div>
<!-- ScheduleContainer -->


   ######################################################################################### //TODO: CAPTURE::EDIT  */?>

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
