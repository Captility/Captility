<? $this->Breadcrumbs->addCrumb(__('Team'), '/pages/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-tags"></span>' . __('Tickets'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-tags"></span>' . __('Ticket') . ' #' . h($this->request->data['Ticket']['ticket_id']), '/captures/view/' . h($this->request->data['Ticket']['ticket_id'])); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Ticket'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Ticket') . ' #' . h($this->request->data['Ticket']['ticket_id']) ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Ticket', array('role' => 'form')); ?>

    <div class="form-group">
        <?php echo $this->Form->input('ticket_id', array('class' => 'form-control', 'placeholder' => 'Ticket Id'));?>


    </div>

    <div class="form-group">

        <?php echo $this->Form->label('event_id', __('Event'), array(
            'class' => 'control-label'));?>

        <?php echo $this->Form->input('event_id', array('disabled' => false,
            'div' => 'input-group',
            'label' => false,
            'class' => 'form-control',
            'before' => '<span class="input-group-addon glyphicon glyphicon-play-circle input-group-glyphicon"></span>',
            'placeholder' => 'Event Id'));?>
    </div>

    <div class="form-group">

        <?php echo $this->Form->label('task_id', __('Task'), array(
            'class' => 'control-label'));?>

        <?php echo $this->Form->input('task_id', array('disabled' => false,
            'div' => 'input-group',
            'label' => false,
            'class' => 'form-control',
            'before' => '<span class="input-group-addon glyphicon glyphicon-tags input-group-glyphicon"></span>',
            'placeholder' => 'Task Id'));?>
    </div>


    <div class="form-group">

        <?php echo $this->Form->label('user_id', __('User'), array(
            'class' => 'control-label'));?>

        <?php echo $this->Form->input('user_id', array('class' => 'form-control',
            'div' => 'input-group input-thin',
            'empty' => false,
            'label' => false,
            'class' => 'form-control',
            'before' => '<span class="input-group-addon glyphicon glyphicon-user input-group-glyphicon"></span>',
            'placeholder' => 'User Id'));?>
    </div>


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


    <div class="form-group form-horizontal">

        <label for="TicketStatus">Status</label>

        <div class="input-thin required">
            <div class="input input-group select required">

                <span class="input-group-addon glyphicon glyphicon-tasks input-group-glyphicon"></span>

                <select name="data[Ticket][status]" class="form-control"
                        id="TicketStatus" required="required"
                        style="/* display: none; */">

                    <? foreach (Configure::read('TICKET.STATUSES') as $status => $class): ?>

                        <option <? if($this->request->data['Ticket']['status'] ==  $status) echo 'selected';?>
                            data-content='<span class="label label-<? echo $class ?>"><? echo __($status) ?></span>'><? echo $status ?></option>
                    <? endforeach; ?>

                </select>
            </div>
        </div>
    </div>

    <div class="form-group">

        <?php echo $this->Form->label('ended', __('Ended'), array(
            'class' => 'control-label'));?>

        <?php
        echo $this->Form->input('ended', array(
            'type' => 'string',
            'format' => array('label', 'before', 'input', 'error', 'after'),
            'div' => 'input-group input-thin',
            'label' => false,
            'class' => 'form-control pickDate',
            'before' => '<span class="input-group-addon glyphicon glyphicon-calendar input-group-glyphicon"></span>',
            'placeholder' => __('Ended'),
            'required' => false,
            'error' => true,
            'value' => $this->Form->value('ended')
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

                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">'. __('Delete') . '</span>', array('action' => 'delete', $this->Form->value('Ticket.ticket_id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Ticket.ticket_id'))); ?></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Tickets'), array('action' => 'index'), array('escape' => false)); ?></li>
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
