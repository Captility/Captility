<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-th-list"></span>'.__('Lectures'), array('action' => 'index')); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>'.__('Add Lecture'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add Lecture'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Lecture', array('role' => 'form')); ?>

    <div class="form-group">
        <?php echo $this->Form->input('number', array('class' => 'form-control', 'placeholder' => __('Number'),
            'label' => __('Number of lecture')));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => __('Name'),
        'label' => __('Lecture name')));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('semester', array('class' => 'form-control', 'placeholder' => 'Semester'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('type', array('class' => 'form-control', 'placeholder' => __('Type')));?>
    </div>

    <?php echo $this->Element('tinymce'); ?>

    <div class="form-group">
        <?php echo $this->Form->input('comment', array('class' => 'form-control', 'placeholder' => 'Comment'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('link', array('class' => 'form-control', 'placeholder' => __('Link')));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('pwd', array('class' => 'form-control', 'placeholder' => __('Pwd'),
        'label' => __('Password')));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('start', array('dateFormat' => Configure::read('Captility.dateFormat'),
            'timeFormat' => '24',
            'minYear' => date('Y') - 5,
            'maxYear' => date('Y') + 5,
            'class' => 'form-control form-control-date'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('end', array('dateFormat' => Configure::read('Captility.dateFormat'),
            'timeFormat' => '24',
            'minYear' => date('Y') - 5,
            'maxYear' => date('Y') + 5,
            'class' => 'form-control form-control-date'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('host_id', array('class' => 'form-control', 'placeholder' => 'Host Id'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('event_type_id', array('class' => 'form-control', 'placeholder' => 'Event Type Id'));?>
    </div>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Captures') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div><div class="panel-heading">
                <? echo __('Hosts') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Hosts'), array('controller' => 'hosts', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Host'), array('controller' => 'hosts', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Event Types') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
        </div>
        <!-- end panel -->
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
