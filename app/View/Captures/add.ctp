<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb(__('Records'), '/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-film"></span>' . __('Captures'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>' . __('Add Capture'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-film"></span></div>
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

<?php echo $this->Form->create('Capture', Configure::read('FORM.INPUT_DEFAULTS')); ?>




<? ################################################################################################################## ?>
<? ################################################### CAPTURE ###################################################### ?>
<? ################################################################################################################## ?>


<?php echo $this->Form->input('Capture.name', array(

    'label' => __('Name'),
    'placeholder' => __('Name'),
    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-film input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'autofocus' => 'autofocus'
));?>



<?php echo $this->Form->input('lecture_id', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-th-list input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'data-live-search' => true, 'data-size' => 5,
));?>






<?php echo $this->Form->input('Event.event_type_id', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-facetime-video input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'selected' => $this->Form->value('Event.0.event_type_id'),
    'data-live-search' => true, 'data-size' => 5,
    'div' => 'form-group form-split-6',
));?>



<?php echo $this->Form->input('workflow_id', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-random input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'empty' => true, 'required' => false,
    'data-live-search' => true,
    'div' => 'form-group form-split-6',
));?>



<div class="form-group form-split-6">

    <label for="CaptureStatus">Status</label>

    <div class="required">
        <div class="input input-group select required">

            <span class="input-group-addon glyphicon glyphicon-barcode input-group-glyphicon"></span>

            <select name="data[Capture][status]" class="form-control input-thin"
                    id="CaptureStatus" required="required"
                    style="/* display: none; */">

                <? foreach (Configure::read('CAPTURE.STATUSES') as $status => $class): ?>

                    <option <? if (isset($this->request->data['status']) && $this->request->data['status'] == $status) echo 'selected';?>
                        data-content='<span class="label label-<? echo $class ?>"><? echo __($status) ?></span>'><? echo $status ?></option>
                <? endforeach; ?>

            </select>
        </div>
    </div>
</div>


<?php echo $this->Form->input('user_id', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-user input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'div' => 'form-group form-split-6',
    'label' => __('Responsible'),
    //'empty' => true, 'required' => false,
    'data-live-search' => true,
));?>



<?php echo $this->Form->input('Capture.link', array(

    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-link input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'placeholder' => __('http://www.captility.de'),

));?>


<hr/>


<? ################################################################################################################## ?>
<? ################################################## INFO-BANNER ################################################### ?>
<? ################################################################################################################## ?>




<div class="info-banner info-banner-info" id="Infobanner">

    <h4 data-toggle="collapse" data-parent="#Infobanner" href="#Collabse-info-banner">
        <small class="glyphicon el-icon-info-sign"></small>
        Zeitplan der Aufnahme
    </h4>


    <div id="Collabse-info-banner" class="panel-collapse collapse <!--in-->">

        <hr/>

        Eine <strong>AufnahmeReihe</strong> bezeichnet eine oder mehrere Aufnahmen des gleichen Typs.<br/>

        Hier können Sie sowohl einzelne Veranstaltungen, als auch Zeitpläne für regelmäßige Veranstaltungen anlegen.
        Aufnahmen werden einmal generiert und können nachträglich einzeln über den Kalender angepasst werden.</p>

    </div>
</div>



<? ################################################################################################################## ?>
<? ################################################## SCHEDULE ###################################################### ?>
<? ################################################################################################################## ?>


<? // SCHEDULE ?>

<div id="ScheduleContainer">

<?
if (empty($this->request->data['Schedule'])) {
    $this->request->data['Schedule'][0] = '';
}
?>


<? foreach ($this->request->data['Schedule'] as $i => $schedule): ?>


    <?
    $regular = (isset($schedule['interval_end'])) ? true : false;
    ?>

    <div class="panel panel-default">

    <div class="panel-heading panel-link" data-toggle="collapse" href="#container<? echo $i ?>">
        <small class="glyphicon glyphicon-time"></small>
        <strong><? echo __('Configure Schedule')?></strong></div>
    <div class="panel-body" id="container<? echo $i ?>">

    <ul class="nav nav-tabs nav-justified tabs-left">
        <li class="<? if (!$regular) echo 'active' ?>"><a href="#single<? echo $i ?>" class="form-toggle"
                                                          data-toggle="tab"><? echo __('Single Capture');?></a>
        </li>
        <li class="<? if ($regular) echo 'active' ?>"><a href="#regular<? echo $i ?>" class="form-toggle"
                                                         data-toggle="tab"><? echo __('Regular Captures');?></a>
        </li>
        <li class="disabled"><a href="#except<? echo $i ?>" class="form-toggle"
                                data-toggle="tab"><? echo __('Exception Rule');?></a>
        </li>
    </ul>


    <? ################################################################################################################## ?>
    <? ################################################## SINGLE SCHEDULE ############################################### ?>
    <? ################################################################################################################## ?>

    <!-- Single Instance Schedule -->
    <div class="tab-content">
        <div class="tab-pane <? if (!$regular) echo 'active' ?>" id="single<? echo $i ?>">

            <div></div>
            <?php echo $this->Form->input('Schedule.' . $i . '.interval_start', array(
                'placeholder' => __('Date'),
                'label' => __('Capture Date'),
                'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>', 'afterInput' => '</div>',
                'class' => 'form-control pickDate',
                'type' => 'string',
                'div' => 'form-group form-split-6',
                'value' => $this->Captility->calcDate(h($this->Form->value('Schedule.' . $i . '.interval_start')), '%a, %d.%m.%Y'),
                'disabled' => $regular,
            ));?>

            <div class="form-group form-split-6">
                <?php echo $this->Form->input('Schedule.' . $i . '.repeat_time', array(
                    'placeholder' => __('Time'),
                    'type' => 'string',
                    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
                    'class' => 'form-control pickTime pickStart',
                    'div' => 'form-group col-xs-6',
                    'value' => $this->Form->value('Schedule.' . $i . '.repeat_time'),
                    'disabled' => $regular,
                ));?>

                <?php echo $this->Form->input('Schedule.' . $i . '.duration', array(
                    'placeholder' => __('Time'),
                    'type' => 'string',
                    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
                    'class' => 'form-control pickTime pickEnd',
                    'div' => 'form-group col-xs-6',
                    'value' => $this->Form->value('Schedule.' . $i . '.duration'),
                    'disabled' => $regular,
                ));?>
            </div>

            <?php echo $this->Form->input('Schedule.' . $i . '.location', array(
                'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-map-marker input-group-glyphicon"></span>', 'afterInput' => '</div>',
                'placeholder' => __('Place'),
                'div' => 'form-group form-split-6',
                'disabled' => $regular,
            ));?>

            <?php echo $this->Form->input('Schedule.' . $i . '.device_id', array(
                'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-hdd input-group-glyphicon"></span>', 'afterInput' => '</div>',
                'placeholder' => __('Device'),
                'div' => 'form-group form-split-6',
                'empty' => true, 'required' => false,
            ));?>

        </div>

        <? ################################################################################################################## ?>
        <? ################################################## REGULAR SCHEDULE ############################################## ?>
        <? ################################################################################################################## ?>

        <!-- Regular Schedule -->
        <div class="tab-pane <? if ($regular) echo 'active' ?>" id="regular<? echo $i ?>">

            <div class="form-group">

                <?php echo $this->Form->label('Schedule.' . $i . '.interval_start', __('Capture Interval'), array(
                    'class' => 'control-label'));?>

                <div class="input-group">

                    <?php
                    echo $this->Form->input('Schedule.' . $i . '.interval_start', array(
                        'type' => 'string',
                        'format' => array('label', 'before', 'input', 'error', 'after'),
                        'label' => false,
                        'div' => false,
                        'class' => 'form-control pickDate',
                        'before' => '<span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>',
                        'placeholder' => __('Begin Interval'),
                        'value' => $this->Form->value('Schedule.' . $i . '.interval_start'),
                        'required' => true,
                        'disabled' => !$regular,
                    ));



                    echo $this->Form->input('Schedule.' . $i . '.interval_end', array(
                        'type' => 'string',
                        'format' => array('label', 'before', 'input', 'error', 'after'),
                        'label' => false,
                        'div' => false,
                        'class' => 'form-control pickDate',
                        'before' => '<span class="input-group-addon">' . __('to') . '</span>',
                        'placeholder' => __('End Interval'),
                        'value' => $this->Form->value('Schedule.' . $i . '.interval_end'),
                        'required' => true,
                        'disabled' => !$regular,
                    ));
                    ?>

                </div>
            </div>


            <?php echo $this->Form->input('Schedule.' . $i . '.repeat_week', array(

                'div' => 'form-group form-split-6',
                'placeholder' => __('1 = repeat every Week, 2 = every second and so on...'),
                'options' => array(array(
                    'name' => __('Every') . ' ' . __('Week'), 'value' => '1'), array(
                    'name' => __('Every second') . ' ' . __('Week'), 'value' => '2'), array(
                    'name' => __('Every third') . ' ' . __('Week'), 'value' => '3'), array(
                    'name' => __('Every fourth') . ' ' . __('Week'), 'value' => '4')),
                'selected' => $this->Form->value('Schedule.' . $i . '.repeat_week'),
                'disabled' => !$regular,
            ));?>



            <?php echo $this->Form->input('Schedule.' . $i . '.repeat_day', array(
                'div' => 'form-group form-split-6',
                'placeholder' => __('"Friday" for every Friday ...'),
                'options' => array(array(
                    'name' => __('Monday'), 'value' => 'Monday'), array(
                    'name' => __('Tuesday'), 'value' => 'Tuesday'), array(
                    'name' => __('Wednesday'), 'value' => 'Wednesday'), array(
                    'name' => __('Thursday'), 'value' => 'Thursday'), array(
                    'name' => __('Friday'), 'value' => 'Friday'), array(
                    'name' => __('Saturday'), 'value' => 'Saturday'), array(
                    'name' => __('Sunday'), 'value' => 'Sunday')),
                'selected' => $this->Form->value('Schedule.' . $i . '.repeat_day'),
                'disabled' => !$regular,
            ));?>



            <?php echo $this->Form->input('Schedule.' . $i . '.repeat_time', array(
                'placeholder' => __('Time'),
                'type' => 'string',
                'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
                'class' => 'form-control pickTime',
                'div' => 'form-group form-split-6',
                'value' => $this->Form->value('Schedule.' . $i . '.repeat_time'),
                'disabled' => !$regular,
            ));?>

            <?php echo $this->Form->input('Schedule.' . $i . '.duration', array(
                'placeholder' => __('Time'),
                'type' => 'string',
                'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
                'class' => 'form-control pickTime',
                'div' => 'form-group form-split-6',
                'value' => $this->Form->value('Schedule.' . $i . '.duration'),
                'disabled' => !$regular,
            ));?>

            <?php echo $this->Form->input('Schedule.' . $i . '.location', array(
                'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-map-marker input-group-glyphicon"></span>', 'afterInput' => '</div>',
                'disabled' => !$regular,
                'div' => 'form-group form-split-6',
                'placeholder' => __('Place'),
            ));?>

            <?php echo $this->Form->input('Schedule.' . $i . '.device_id', array(
                'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-hdd input-group-glyphicon"></span>', 'afterInput' => '</div>',
                'placeholder' => __('Device'),
                'div' => 'form-group form-split-6',
                'empty' => true, 'required' => false,
            ));?>

        </div>
        <? ################################################################################################################## ?>
        <? ################################################ EXCEPTION SCHEDULE ############################################## ?>
        <? ################################################################################################################## ?>

        <!-- Exception Schedule -->
        <div class="tab-pane" id="except<? echo $i ?>">

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
            'disabled' => true,
        )); ?>


    </div>

    </div>
    </div>

<? endforeach; ?>

</div>

<hr/>


<?php echo $this->Element('tinymce'); ?>

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
