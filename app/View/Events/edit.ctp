<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-film"></span>'.__('Captures'), '/captures'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-play-alt"></span>'.__('Event'), '/events/view/' . h($this->request->data['Event']['event_id'])); ?>
<? $this->Breadcrumbs->addCrumb('#' . h($this->request->data['Event']['event_id']) . ' ' . h($this->request->data['Event']['title']),
    '/events/view/' . h($this->request->data['Event']['event_id'])); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-file-edit"></span>'.__('Edit Event'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Edit Event'); ?></h1>
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
        <?php echo $this->Form->input('event_id', array('class' => 'form-control', 'placeholder' => 'Event Id'));?>
    </div>
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
                'interval' => 15
            ));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('end',
            array('dateFormat' => Configure::read('Captility.dateFormat'),
                'timeFormat' => '24',
                'minYear' => date('Y') - 5,
                'maxYear' => date('Y') + 5,
                'class' => 'form-control form-control-date',
                'interval' => 15
            ));?>
    </div>
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
    <?php echo $this->Element('submitArea');?>

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

                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . __('Delete'), array('action' => 'delete', $this->Form->value('Event.event_id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Event.event_id'))); ?></li>
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
                    <span class="glyphicon glyphicon-facetime-video"></span><?php echo __('Event Types');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
