<? $this->Html->addCrumb(__('Events'), array('action' => 'index')); ?><?php $this->Html->addCrumb(__('Admin Add Event'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Admin Add Event'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Event', array('role' => 'form')); ?>

    <div class="form-group">
        <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('comment', array('class' => 'form-control', 'placeholder' => 'Comment'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('start',
            array('dateFormat' => Configure::read('Captility.dateFormat'),
                'timeFormat' => '24',
                'minYear' => date('Y') - 5,
                'maxYear' => date('Y') + 5,
                'class' => 'form-control form-control-date',
                'interval' => 15,
                'selected' => array(
                    'day' => date('d'),
                    'month' => date('m'),
                    'year' => date('Y'),
                    'hour' => date('H'),
                    'min' => '00'),
            ));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('end',
            array('dateFormat' => Configure::read('Captility.dateFormat'),
                'timeFormat' => '24',
                'minYear' => date('Y') - 5,
                'maxYear' => date('Y') + 5,
                'class' => 'form-control form-control-date',
                'interval' => 15,
                'selected' => array(
                    'day' => date('d'),
                    'month' => date('m'),
                    'year' => date('Y'),
                    'hour' => date('H'),
                    'min' => '00'),
            ));?>
        <div class="form-group">
            <?echo '<div class="control-group">';
            echo $this->Form->label('Event.all_day', null, array('class' => 'control-label'));
            echo '<div class="controls">';
            echo $this->Form->checkbox('Event.all_day');
            echo '</div>';
            echo '</div>'; ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('link', array('class' => 'form-control', 'placeholder' => 'Link'));?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('event_type_id', array('class' => 'form-control', 'placeholder' => 'Event Type Id'));?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('schedule_id', array('class' => 'form-control', 'placeholder' => 'Schedule Id'));?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('capture_id', array('class' => 'form-control', 'placeholder' => 'Capture Id'));?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
        </div>

        <?php echo $this->Form->end() ?>

    </div>
    <!-- end col md 12 -->


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

                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Events'), array('action' => 'index'), array('escape' => false)); ?></li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Schedules'), array('controller' => 'schedules', 'action' => 'index'), array('escape' => false)); ?> </li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Schedule'), array('controller' => 'schedules', 'action' => 'add'), array('escape' => false)); ?> </li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                    </ul>
                </div>
            </div>
        </div>


        <?php if (isset($sideCalendar)) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets)) echo $this->Element('sideTickets');?>
    </div>
    <!-- end col md 3 -->


    <!--</div>--><!-- end row -->
    <!--</div>-->
