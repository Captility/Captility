<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-play-circle"></span>' . __('Events'), array('action' => 'index')); ?><?php $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>' . __('Add Event'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-play-circle"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add Event'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Event', Configure::read('FORM.INPUT_DEFAULTS')); ?>


    <?php echo $this->Form->input('title', array(
        'placeholder' => __('Name'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-play-circle input-group-glyphicon"></span>', 'afterInput' => '</div>',
    ));?>
    <div></div>

    <? //TODO TIME ?>

    <div class="form-group form-split-6">
        <?php echo $this->Form->input('start', array(
            'placeholder' => __('Date'),
            'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>', 'afterInput' => '</div>',
            'class' => 'form-control pickDate pickStart',
            'type' => 'string',
            'div' => 'form-group col-xs-7',
        ));?>

        <?php echo $this->Form->input('start-time', array(
            'placeholder' => __('Time'),
            'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
            'class' => 'form-control pickTime pickStart',
            'label' => '&nbsp;',
            'div' => 'form-group col-xs-5',
        ));?>
    </div>

    <div class="form-group form-split-6">
        <?php echo $this->Form->input('end', array(
            'placeholder' => __('Date'),
            'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>', 'afterInput' => '</div>',
            'class' => 'form-control pickDate pickEnd',
            'type' => 'string',
            'div' => 'form-group col-xs-7',
        ));?>

        <?php echo $this->Form->input('end-time', array(
            'placeholder' => __('Time'),
            'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
            'class' => 'form-control pickTime pickEnd',
            'label' => '&nbsp;',
            'div' => 'form-group col-xs-5',
        ));?>
    </div>


    <?php echo $this->Form->input('event_type_id', array(
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-facetime-video input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'placeholder' => __('Event Type Id'),
        'div' => 'form-group form-split-6',
    ));?>

    <div class="form-group form-horizontal form-split-6">

        <label for="TicketStatus">Status</label>

        <div class="required">
            <div class="input input-group select required">

                <span class="input-group-addon glyphicon glyphicon-tasks input-group-glyphicon"></span>

                <select name="data[Event][status]" class="form-control"
                        id="EventStatus" required="required"
                        style="/* display: none; */">

                    <? foreach (Configure::read('EVENT.STATUSES') as $status => $class): ?>

                        <option
                            data-content='<span class="label label-<? echo $class ?>"><? echo __($status) ?></span>'><? echo $status ?></option>
                    <? endforeach; ?>

                </select>
            </div>
        </div>
    </div>


    <?/*<div class="form-group">
        <?echo '<div class="control-group">';
        echo $this->Form->label('Event.all_day', null, array('class' => 'control-label'));
        echo '<div class="controls">';
        echo $this->Form->checkbox('Event.all_day');
        echo '</div>';
        echo '</div>';
    </div>*/?>

    <?php echo $this->Form->input('location', array(
        'class' => 'form-control',
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-map-marker input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'placeholder' => __('Place')

    ));?>


    <?php echo $this->Form->input('link', array(
        'class' => 'form-control',
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-link input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'placeholder' => 'Link'

    ));?>


    <?/*<div class="form-group">
        <?php echo $this->Form->input('schedule_id', array('class' => 'form-control', 'placeholder' => 'Schedule Id'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('capture_id', array('class' => 'form-control', 'placeholder' => 'Capture Id'));?>
    </div>*/?>


    <hr/>

    <div class="form-group">
        <?php echo $this->Element('tinymce'); ?>
        <?php echo $this->Form->input('comment', array('class' => 'form-control', 'placeholder' => 'Comment'));?>
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

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Events'), array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-film"></span><?php echo __('Captures');?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-facetime-video"></span><?php echo __('Event Types');?>
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
