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

            <legend><?php echo __('Bitte registrieren sie sich um sich anzumelden.'); ?></legend>
            <?php echo $this->Form->input('User.username', array(
                'label' => array('text' => 'Benutzername',
                    'class' => 'col col-md-3 control-label'),
                'placeholder' => 'Wählen Sie einen Benutzernamen',
            )); ?>
            <?php echo $this->Form->input('User.email', array(
                'label' => array('text' => 'E-Mail',
                    'class' => 'col col-md-3 control-label'),
                'placeholder' => 'E-Mailadresse',
            )); ?>
            <?php echo $this->Form->input('User.password', array(
                'label' => array('text' => 'Passwort',
                    'class' => 'col col-md-3 control-label'),
                'placeholder' => 'Passwort eingeben',
                'type' => 'password',
            )); ?>
            <?php echo $this->Form->input('User.repass', array(
                'label' => array('text' => false,
                    'class' => 'col col-md-3 control-label'),
                'placeholder' => 'Passwort erneut eingeben',
                'type' => 'password',
            )); ?>

            <?php /*echo $this->Form->label('User.language', 'Sprache', 'col col-md-3 control-label'); */ ?>
            <?php echo $this->Form->input('User.language', array(
                'label' => array('text' => 'Sprache',
                    'class' => 'col col-md-3 control-label'),
                'placeholder' => 'de/en',
                'options' => array(array('name' => 'Deutsch', 'value' => 'de'), array('name' => 'English', 'value' => 'en')),
                'selected' => 1,
            ));?>


            <div class="form-group">
                <?php echo $this->Form->submit(__('Registrieren'), array(
                    'div' => 'col col-md-6 col-md-offset-3',
                    'class' => 'btn btn-primary'
                )); ?>
            </div>

        <? endif; ?>

    </div>

</div>