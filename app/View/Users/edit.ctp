<? if ($this->Session->read('Auth.User.user_id') === h($this->request->data['User']['user_id'])): ?>

    <? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-user"></span>'.__('Users'), '/users', array('class' => 'active')); ?>
    <? $this->Breadcrumbs->addCrumb(h($this->Session->read('Auth.User.username')), '/users/view/' . $this->Session->read('Auth.User.user_id')); ?>
    <? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-address-book-alt"></span>'.__('My Profile'), '/users/profile/' . $this->Session->read('Auth.User.user_id')); ?>
    <?php $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-pencil"></span>'.__('Edit User'), '#', array('class' => 'active')); ?>

<? else: ?>

    <? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-myspace"></span>'.__('User Registry'), '/admin_center'); ?>
    <? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-user"></span>'.__('Users'), '/users', array('class' => 'active')); ?>
    <? $this->Breadcrumbs->addCrumb(h($this->request->data['User']['username']), '/users/view/' . h($this->request->data['User']['user_id'])); ?>
    <?php $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-pencil"></span>'.__('Edit User'), '#', array('class' => 'active')); ?>

<? endif; ?>


<div class="row">
    <div class="col-md-1 column">
     <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-user"></span></div>
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
            'placeholder' => __('Password'),
            'label' => __('Password'),
            'type' => 'password',
            'value' => '',
            'autocomplete' => 'off'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('language', array(
            'class' => 'form-control',
            'placeholder' => 'Language',
            'options' => array(array('name' => 'Deutsch', 'value' => 'deu'), array('name' => 'English', 'value' => 'eng')),));?>
    </div>

    <?php if ($this->Session->read('Auth.User.group_id') == 1): ?>
        <div class="form-group">
            <?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('group_id', array('class' => 'form-control', 'placeholder' => 'User Group'));?>
        </div>
    <? endif; ?>

    <div class="form-group">
        <?php echo $this->Form->input('notification', array(
            'label' => array('text' => 'Notifications',
                'class' => 'control-label'),
            'options' => array(array('name' => __('Suscribe to Tickets and Events.'), 'value' => '1'), array('name' => __('No Notifications at all.'), 'value' => '0')),
            'selected' => 1,
            'class' => 'form-control'
        ));?>
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

                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">'. __('Delete') . '</span>', array('action' => 'delete', $this->Form->value('User.user_id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('User.user_id'))); ?></li>
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
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
