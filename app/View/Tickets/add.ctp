<? $this->Breadcrumbs->addCrumb(__('Team'), '/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-tags"></span>' . __('Tickets'), array('action' => 'index')); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>' . __('Add Ticket'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-tags"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add Ticket'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>


    <?php echo $this->Form->create('Ticket', Configure::read('FORM.INPUT_DEFAULTS')); ?>


    <?php echo $this->Form->input('event_id', array(

        'placeholder' => __('event_id'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-play-circle input-group-glyphicon"></span>', 'afterInput' => '</div>',
    ));?>


    <?php echo $this->Form->input('task_id', array(

        'placeholder' => __('task_id'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-tags input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'autofocus' => 'autofocus'
    ));?>



    <?php echo $this->Form->input('user_id', array(

        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-user input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'class' => 'form-control input-thin',
    ));?>



    <!--<div class="form-group form-horizontal">
        <?php /*echo $this->Form->input('status', array(
            'options' => array(
                array('value' => 'New', 'data-content' => '<span class="label label-default">' . __('New') . '</span>'),
                array('value' => 'Requested', 'data-content' => '<span class="label label-primary">' . __('Requested') . '</span>'),
            ),
            'selected' => 1,
            'escape' => false,
            'class' => 'form-control',
            'empty' => false,

            'div' => 'input-group input-thin',
        ));*/?>
    </div>-->

    <div></div>
    <div class="form-group form-split-6">

        <label for="TicketStatus">Status</label>

        <div class="required">
            <div class="input input-group select required">

                <span class="input-group-addon glyphicon glyphicon-tasks input-group-glyphicon"></span>

                <select name="data[Ticket][status]" class="form-control input-thin"
                        id="TicketStatus" required="required"
                        style="/* display: none; */">

                    <? foreach (Configure::read('TICKET.STATUSES') as $status => $class): ?>

                        <option
                            data-content='<span class="label label-<? echo $class ?>"><? echo __($status) ?></span>'><? echo $status ?></option>
                    <? endforeach; ?>

                </select>
            </div>
        </div>
    </div>




    <?php /*echo $this->Form->input('ended', array(

        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'class' => 'form-control input-thin pickDate',
        'value' => '', //$this->Time->nice(strtotime(h($this->Form->value('ended'))), 'CET', '%a, %d.%m.%Y'),
        'type' => 'string'
    ));*/?>



        <div class="form-group form-split-6">
            <?php echo $this->Form->input('ended', array(
                'placeholder' => __('Date'),
                'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>', 'afterInput' => '</div>',
                'class' => 'form-control pickDate',
                'type' => 'string',
                'div' => 'form-group col-xs-7',
            ));?>

            <?php echo $this->Form->input('ended-time', array(
                'placeholder' => __('Time'),
                'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-time input-group-glyphicon"></span>', 'afterInput' => '</div>',
                'class' => 'form-control pickTime',
                'label' => '&nbsp;',
                'div' => 'form-group col-xs-5',
            ));?>
        </div>



    <div class="form-group">
        <?php echo $this->Element('tinymce'); ?>
        <?php echo $this->Form->input('comment', array('class' => 'form-control', 'placeholder' => 'Comment'));?>
    </div>
    <!--    <div class="form-group">
        <?php /*echo $this->Form->input('ended', array('dateFormat' => Configure::read('Captility.dateFormat'),
            'timeFormat' => '24',
            'minYear' => date('Y') - 5,
            'maxYear' => date('Y') + 5,
            'class' => ' pickDate form-control form-control-date'));*/?>
    </div>-->



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

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Tickets'), array('action' => 'index'), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
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
