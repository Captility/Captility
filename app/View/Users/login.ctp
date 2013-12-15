<?php /* <div class="col-md-1 column">

</div>

<div class="col-md-8 column content-pane">
    <div class="users form">
        <?php echo $this->Session->flash('auth'); ?>
        <?php echo $this->Session->flash(); ?>

        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <legend><?php echo __('Please enter your username and password'); ?></legend>
            <?php echo $this->Form->input('username');
            echo $this->Form->input('password');
            ?>
        </fieldset>
        <?php echo $this->Form->end(__('Login')); ?>
    </div>
</div>
*/ ?>

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

        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username', array(
            'placeholder' => 'Username',
        )); ?>
        <?php echo $this->Form->input('password', array(
            'placeholder' => 'Password'
        )); ?>
        <div class="form-group">
            <?php echo $this->Form->submit(__('Login'), array(
                'div' => 'col col-md-6 col-md-offset-3',
                'class' => 'btn btn-primary'
            )); ?>
        </div>


    </div>


</div>