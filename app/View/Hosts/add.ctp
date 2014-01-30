<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records', array('class' => 'active')); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon cp-icon-lecturer"></span>' . __('Hosts'), '/hosts', array('class' => 'active')); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>' . __('Add Host'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon cp-icon-lecturer"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add Host'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Host', Configure::read('FORM.INPUT_DEFAULTS')); ?>


    <?php echo $this->Form->input('name', array(

        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon cp-icon-lecturer input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',
        'placeholder' => __('Name'),
        'autofocus' => 'autofocus'
    ));?>

    <?php echo $this->Form->input('email', array(

        'beforeInput' => '<div class="input-group"><span class="input-group-addon input-group-glyphicon"><strong>@</strong></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',
        'placeholder' => __('E-Mail'),
    ));?>


    <?php echo $this->Form->input('contact', array(

        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-adult input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',
        'placeholder' => __('Name'),
    ));?>

    <?php echo $this->Form->input('contact_email', array(

        'beforeInput' => '<div class="input-group"><span class="input-group-addon input-group-glyphicon"><strong>@</strong></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',
        'placeholder' => __('E-Mail')
    ));?>

    <?php echo $this->Element('tinymce'); ?>
    <div class="form-group">
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
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?></h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Hosts'), array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Lectures');?></h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
