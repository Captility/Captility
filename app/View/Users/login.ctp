<div class="col-md-1 column">

</div>

<div class="col-md-8 column content-pane">

    <div class="users form">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Session->flash(); ?>


        <?php echo $this->Form->create('User', array(
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

        <legend><?php echo __('Melden Sie sich mit Ihrem Benutzernamen und Passwort an.'); ?></legend>
        <?php echo $this->Form->input('username', array(
            'label' => array('text' => 'Benutzername',
                'class' => 'col col-md-3 control-label'),
            'placeholder' => 'Geben Sie ihren Nutzernamen ein.',
        )); ?>
        <?php echo $this->Form->input('password', array(
            'label' => array('text' => 'Passwort',
                'class' => 'col col-md-3 control-label'),
            'placeholder' => 'Geben Sie ihr Passwort ein.',
            'type' => 'password',
        )); ?>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Login'), array(
                'div' => 'col col-md-6 col-md-offset-3',
                'class' => 'btn btn-primary'
            )); ?>
        </div>

    </div>

</div>