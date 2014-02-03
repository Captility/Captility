<? $this->Breadcrumbs->addCrumb(__('Schedules'), array('action' => 'index')); ?><?php $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>' . __('Add Schedule'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add Schedule'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>

    <?php echo $this->Form->create('Schedule', Configure::read('FORM.INPUT_DEFAULTS')); ?>




    <?php echo $this->Form->input('capture_id', array('class' => 'form-control', 'placeholder' => 'Capture Id'));?>

    <div class="form-group">

        <?php echo $this->Form->label('interval_start', __('Capture Interval'), array(
            'class' => 'control-label'));?>

        <div class="input-group">

            <?php
            echo $this->Form->input('interval_start', array(
                'type' => 'string',
                'format' => array('label', 'before', 'input', 'error', 'after'),
                'label' => false,
                'div' => false,
                'class' => 'form-control pickDate',
                'before' => '<span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>',
                'placeholder' => __('Begin Interval'),
                'value' => $this->Form->value('Schedule.interval_start'),
                'required' => true,
            ));



            echo $this->Form->input('interval_end', array(
                'type' => 'string',
                'format' => array('label', 'before', 'input', 'error', 'after'),
                'label' => false,
                'div' => false,
                'class' => 'form-control pickDate',
                'before' => '<span class="input-group-addon">' . __('to') . '</span>',
                'placeholder' => __('End Interval'),
                'value' => $this->Form->value('Schedule.interval_end'),
                'required' => true,
            ));
            ?>

        </div>
    </div>

    <?php echo $this->Form->input('repeat_week', array(

        'div' => 'form-group form-split-6',
        'placeholder' => __('1 = repeat every Week, 2 = every second and so on...'),
        'options' => array(array(
            'name' => __('Every') . ' ' . __('Week'), 'value' => '1'), array(
            'name' => __('Every second') . ' ' . __('Week'), 'value' => '2'), array(
            'name' => __('Every third') . ' ' . __('Week'), 'value' => '3'), array(
            'name' => __('Every fourth') . ' ' . __('Week'), 'value' => '4')),
        'selected' => 1,
    ));?>



    <?php echo $this->Form->input('repeat_day', array(
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
        'selected' => date('l'),
    ));?>



    <?php echo $this->Form->input('repeat_time', array(
        'placeholder' => __('Time'),
        'type' => 'string',
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'class' => 'form-control pickTime',
        'div' => 'form-group form-split-6',
        'value' => $this->Captility->calcDate(h($this->Form->value('Schedule.repeat_time')), '%H:%M Uhr'),
    ));?>

    <?php echo $this->Form->input('duration', array(
        'placeholder' => __('Time'),
        'type' => 'string',
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'class' => 'form-control pickTime',
        'div' => 'form-group form-split-6',
        'value' => $this->Captility->calcDate(h($this->Form->value('Schedule.duration')), '%H:%M Uhr'),
    ));?>



    <?php echo $this->Form->input('location', array(
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-map-marker input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'placeholder' => __('Place')
    ));?>

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

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Schedules'), array('action' => 'index'), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
