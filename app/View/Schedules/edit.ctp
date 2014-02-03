<? $this->Breadcrumbs->addCrumb(__('Schedules'), array('action' => 'index')); ?><?php $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Schedule'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Edit Schedule'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Schedule', Configure::read('FORM.INPUT_DEFAULTS')); ?>


    <div class="form-group">
        <?php echo $this->Form->input('schedule_id'); ?>
    </div>

    <?php echo $this->Form->input('capture_id', array(
        'placeholder' => 'Capture Id',
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-film input-group-glyphicon"></span>', 'afterInput' => '</div>',
    ));?>
    <div></div>

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
                'value' => $this->Captility->calcDate(h($this->Form->value('interval_start')), '%a, %d.%m.%Y'),
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
                'value' => $this->Captility->calcDate(h($this->Form->value('interval_end')), '%a, %d.%m.%Y'),
                'required' => false,
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
    ));?>



    <?php echo $this->Form->input('repeat_time', array(
        'placeholder' => __('Time'),
        'type' => 'string',
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'class' => 'form-control pickTime',
        'div' => 'form-group form-split-6',
        'value' => $this->Captility->calcDate(h($this->Form->value('repeat_time')), '%H:%M Uhr'),
    ));?>

    <?php echo $this->Form->input('duration', array(
        'placeholder' => __('Time'),
        'type' => 'string',
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'class' => 'form-control pickTime',
        'div' => 'form-group form-split-6',
        'value' => $this->Captility->calcDate(h($this->Form->value('duration')), '%H:%M Uhr'),
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

                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete') . '</span>', array('action' => 'delete', $this->Form->value('Schedule.schedule_id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Schedule.schedule_id'))); ?></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Schedules'), array('action' => 'index'), array('escape' => false)); ?></li>

                </ul>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-film"></span><?php echo __('Captures');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-facetime-video"></span><?php echo __('Events');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
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
