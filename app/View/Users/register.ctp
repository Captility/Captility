<div class="col-md-1 column content-pane">

</div>

<div class="col-md-8 column content-pane">

    <div class="users form">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Session->flash(); ?>


        <?php if (!$this->Session->read('Auth.User')): ?>

            <?php echo $this->Form->create('Register', array(
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

            <legend><?php echo __('Please register to log in.'); ?></legend>
            <?php echo $this->Form->input('User.username', array(
                'label' => array('text' => __('Username'),
                    'class' => 'col col-md-3 control-label'),
                'placeholder' => __('Choose a username'),
            )); ?>
            <?php echo $this->Form->input('User.email', array(
                'label' => array('text' => __('E-Mail'),
                    'class' => 'col col-md-3 control-label'),
                'placeholder' => __('enter email-adress')
            )); ?>
            <?php echo $this->Form->input('User.pwd', array(
                'label' => array('text' => __('Password'),
                'class' => 'col col-md-3 control-label'),
                'placeholder' => __('enter password'),
                'type' => 'password',
                'value'=>'',
                'autocomplete'=>'off'
            )); ?>
            <?php echo $this->Form->input('User.pwd_confirm', array(
                'label' => array('text' => false,
                    'class' => 'col col-md-3 control-label'),
                'placeholder' => __('confirm password'),
                'type' => 'password',
                'value'=>'',
                'autocomplete'=>'off'
            )); ?>

            <?php /*echo $this->Form->label('User.language', 'Sprache', 'col col-md-3 control-label'); */ ?>
            <?php echo $this->Form->input('User.language', array(
                'label' => array('text' => __('Language'),
                    'class' => 'col col-md-3 control-label'),
                'placeholder' => 'de/en',
                'options' => array(array('name' => 'Deutsch', 'value' => 'deu'), array('name' => 'English', 'value' => 'eng')),
                'selected' => 1,
            ));?>


            <div class="form-group">
                <?php echo $this->Form->submit(__('Register'), array(
                    'div' => 'col col-md-6 col-md-offset-3',
                    'class' => 'btn btn-primary'
                )); ?>
            </div>

        <? endif; ?>

    </div>

</div>