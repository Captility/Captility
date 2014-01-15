<div class="col-md-1 column content-pane">

</div>

<div class="col-md-8 column content-pane">

    <div class="users form">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Session->flash(); ?>


        <?php /*if (!$this->Session->read('Auth.User')): */?>

        <?php echo $this->Form->create('changePassword', array(
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

        <legend><?php echo __('Change Password'); ?></legend>

        <?php echo $this->Form->input('User.pwd_current', array(
            'label' => array('text' => __('Current Password'),
                'class' => 'col col-md-3 control-label'),
            'placeholder' => __('Enter your old password'),
            'type' => 'password',
            'value' => '',
            'autocomplete' => 'off'
        )); ?>

        <?php echo $this->Form->input('User.pwd', array(
            'label' => array('text' => __('New Password'),
                'class' => 'col col-md-3 control-label'),
            'placeholder' => __('Enter your new password'),
            'type' => 'password',
            'value' => '',
            'autocomplete' => 'off'
        )); ?>

        <?php echo $this->Form->input('User.pwd_confirm', array(
            'label' => array('text' => false,
                'class' => 'col col-md-3 control-label'),
            'placeholder' => __('Repeat new password'),
            'type' => 'password',
            'value' => '',
            'autocomplete' => 'off'
        )); ?>


        <?/* <div class="form-group">
            <?php echo $this->Form->submit(__('Submit'), array(
                'div' => 'col col-md-6 col-md-offset-3',
                'class' => 'btn btn-primary pull-right'
            )); */?><!--
        </div> ?>-->



        <?/* endif; */?>

    </div>

    <?php echo $this->Element('submitArea', array('hr' => false));?>

    <?php echo $this->Form->end() ?>

</div>