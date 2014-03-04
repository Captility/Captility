<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb(__('Records'), '/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-th-list"></span>' . __('Lectures'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb(' #' . h($this->request->data['Lecture']['number']) . ' ' . h($this->request->data['Lecture']['name']),
    '/lectures/view/' . h($this->request->data['Lecture']['lecture_id']), array('class' => 'active')); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Lecture'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
     <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-th-list"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Edit Lecture'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>


    <?php echo $this->Form->create('Lecture', Configure::read('FORM.INPUT_DEFAULTS')); ?>



    <div class="form-group">
        <?php echo $this->Form->input('lecture_id', array('class' => 'form-control', 'placeholder' => 'Lecture Id'));?>
    </div><div class="clearfix"></div>


    <?php echo $this->Form->input('number', array(

        'label' => __('Number of lecture'),
        'placeholder' => __('Number'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon input-group-glyphicon"><strong>#</strong></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',
    ));?>

    <?php echo $this->Form->input('semester', array(

        'placeholder' => __('WS2014/15'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',
    ));?>



    <?php echo $this->Form->input('name', array(

        'label' => __('Lecture name'),
        'placeholder' => __('Name'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-th-list input-group-glyphicon"></span>', 'afterInput' => '</div>',

    ));?>

    <?php echo $this->Form->input('host_id', array(

        'placeholder' => __('Host_Id'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon cp-icon-lecturer input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',

    ));?>



    <?php echo $this->Form->input('event_type_id', array(

        'placeholder' => __('Event Type Id'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-facetime-video input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',
    ));?>





    <div class="form-group">

        <?php echo $this->Form->label('start', __('Lecture Interval'), array(
            'class' => 'control-label'));?>

        <div class="input-group">
            <?php
            echo $this->Form->input('start', array(
                'type' => 'string',
                'format' => array('label', 'before', 'input', 'error', 'after'),
                'label' => false,
                'div' => false,
                'class' => 'form-control pickDate',
                'before' => '<span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>',
                'value' => $this->Time->nice($this->Form->value('start'), 'CET', '%a, %d.%m.%Y'),
                'placeholder' => __('End Interval'),
                'required' => true,
                'error' => false,
            ));?>


            <?php
            echo $this->Form->input('end', array(
                'type' => 'string',
                'format' => array('label', 'before', 'input', 'error', 'after'),
                'label' => false,
                'div' => false,
                'class' => 'form-control pickDate',
                'before' => '<span class="input-group-addon">' . __('to') . '</span>',
                'value' => $this->Time->nice($this->Form->value('end'), 'CET', '%a, %d.%m.%Y'),
                'placeholder' => __('End Interval'),
                'required' => true,
                'error' => false,
            ));?>

        </div>

        <? if ($this->Form->isFieldError('start')) {
            echo $this->Form->error('start');
        } ?>
    </div>


    <?php echo $this->Form->input('user_id', array(

        'placeholder' => __('User_Id'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-user input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'class' => 'form-control input-thin form-inline',
    ));?>


    <?php echo $this->Form->input('link', array(

        'placeholder' => __('http://www.captility.de'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-link input-group-glyphicon"></span>', 'afterInput' => '</div>',

    ));?>


    <?php echo $this->Form->input('pwd', array(

        'placeholder' => __('Password for Data Acess'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-lock input-group-glyphicon"></span>', 'afterInput' => '</div>',

    ));?>

    <?php echo $this->Form->input('type', array(

        'placeholder' => __('Type'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-question-sign input-group-glyphicon"></span>', 'afterInput' => '</div>',

    ));?>




    <?php echo $this->Element('tinymce'); ?>
    <div class="form-group">
        <?php echo $this->Form->input('comment', array('class' => 'form-control', 'placeholder' => 'Comment'));?>
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
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete') . '</span>', array('action' => 'delete', $this->Form->value('Lecture.lecture_id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Lecture.lecture_id'))); ?></li>

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
            </div>
            <div class="panel-heading">
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
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
