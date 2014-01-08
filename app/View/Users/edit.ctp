<? $this->Html->addCrumb(__('Users'), array('action' => 'index')); ?><?php $this->Html->addCrumb(__('Edit User'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Edit User'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User', array('role' => 'form')); ?>

    <div class="form-group">
        <?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Username'));?>
    </div>
    <!--<div class="form-group">
					<?php /*echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password'));*/?>
				</div>-->
    <div class="form-group">
        <?php echo $this->Form->input('pwd', array(
            'class' => 'form-control',
            'placeholder' => 'Password',
            'label' => 'Passwort',
            'type' => 'password',
            'value' => '',
            'autocomplete' => 'off'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('language', array('class' => 'form-control', 'placeholder' => 'Language'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('group_id', array('class' => 'form-control', 'placeholder' => 'User Group'));?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('notification', array(
            'label' => array('text' => 'Notifications',
                'class' => 'control-label'),
            'options' => array(array('name' => __('Suscribe to Tickets and Events.'), 'value' => '1'), array('name' => __('No Notifications at all.'), 'value' => '0')),
            'selected' => 1,
            'class' => 'form-control'
        ));?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->submit(__('Submit'), array(
            'class' => 'btn btn-primary'
        )); ?>
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

                    <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('User.user_id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('User.user_id'))); ?></li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('action' => 'index'), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Groups'), array('controller' => 'groups', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Group'), array('controller' => 'groups', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Tickets'), array('controller' => 'tickets', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar)) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets)) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
