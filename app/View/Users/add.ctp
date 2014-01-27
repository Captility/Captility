<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-myspace"></span>'.__('User Registry'), '/admin_center'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-user"></span>'.__('Users'), array('action' => 'index')); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>'.__('Add User'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add User'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>

    <?php echo $this->Form->create('User', array('role' => 'form',
        'inputDefaults' => array(
            'div' => 'form-group',
            'label' => array(
                'class' => 'col col-md-3 control-label'
            ),
            'wrapInput' => 'col col-md-6',
            'class' => 'form-control'
        ),
        'class' => 'well form-horizontal'
    )); ?>

    <div class="form-group">
        <?php echo $this->Form->input('username', array('label' => array('text' => __('Username'),
            'class' => 'col col-md-3 control-label'), 'placeholder' => __('Username')));?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('avatar', array('label' => array('text' => __('Avatar'),
            'class' => 'col col-md-3 control-label'), 'placeholder' => 'Avatar (noch nicht unterstützt)'));?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('pwd', array(
            'label' => 'Enter Password', 'type' => 'password', 'label' => array('text' => __('Password'),
                'class' => 'col col-md-3 control-label'), 'placeholder' => __('Password'),
            'value' => '',
            'autocomplete' => 'off'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('pwd_confirm', array(
            'label' => 'Confirm Password', 'type' => 'password', 'label' => array('text' => __('Password confirmation'),
                'class' => 'col col-md-3 control-label'), 'placeholder' => __('confirm password'),
            'value' => '',
            'autocomplete' => 'off'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('email', array('label' => array('text' => __('E-Mail'),
            'class' => 'col col-md-3 control-label'), 'placeholder' => __('Email')));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('User.language', array(
            'label' => array('text' => __('Language'),
                'class' => 'col col-md-3 control-label'),
            'options' => array(array('name' => 'Deutsch', 'value' => 'deu'), array('name' => 'English', 'value' => 'eng')),
            'selected' => 1,
        ));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('group_id', array('label' => array('text' => __('Group'),
            'class' => 'col col-md-3 control-label'), 'placeholder' => __('Group Id'), 'selected' => 3));?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('notification', array(
            'label' => array('text' => __('Notifications'),
                'class' => 'col col-md-3 control-label'),
            'options' => array(array('name' => __('Suscribe to Tickets and Events.'), 'value' => '1'), array('name' => __('No Notifications at all.'), 'value' => '0')),
            'selected' => 1,
        ));?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->submit(__('Submit'), array(
            'div' => 'col col-md-6 col-md-offset-3',
            'class' => 'btn btn-primary pull-right'
        )); ?>
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

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Users'), array('action' => 'index'), array('escape' => false)); ?></li>
                    </ul>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon el-icon-group"></span><?php echo __('Groups');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Groups'), array('controller' => 'groups', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Group'), array('controller' => 'groups', 'action' => 'add'), array('escape' => false)); ?> </li>
                   </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
