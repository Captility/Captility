<? $this->Html->addCrumb(__('Schedules'), array('action' => 'index')); ?><?php $this->Html->addCrumb(__('Add Schedule'), '#', array('class' => 'active')); ?>
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

    <?php echo $this->Form->create('Schedule', array('role' => 'form')); ?>

    <div class="form-group">
        <?php echo $this->Form->input('interval_start',
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
        <?php echo $this->Form->input('interval_end',
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
        <?php echo $this->Form->input('duration',
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
                    'hour' => 2,
                    'min' => '00'),
            ));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('repeat_time',
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
        <?php echo $this->Form->input('repeat_day', array('class' => 'form-control', 'placeholder' => __('"Friday" for every Friday ...')));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('repeat_week', array('class' => 'form-control', 'placeholder' => __('1 = repeat every Week, 2 = every second and so on...')));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('capture_id', array('class' => 'form-control', 'placeholder' => 'Capture Id'));?>
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
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>List Schedules'), array('action' => 'index'), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar)) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets)) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
