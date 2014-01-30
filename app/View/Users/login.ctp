<? $this->Breadcrumbs->addCrumb(__('Captility'), '/'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-unlock"></span>'.__('Login'), '/login'); ?>

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
                'wrapInput' => 'col col-md-7',
                'class' => 'form-control'
            ),
            'class' => 'well form-horizontal'
        )); ?>

        <legend><?php echo __('Log in with your username and password.'); ?></legend>
        <?php echo $this->Form->input('username', array(
            'label' => array('text' => __('Username'),
                'class' => 'col col-md-3 control-label'),
            'placeholder' => __('Please enter your username'),
            'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-user input-group-glyphicon"></span>', 'afterInput' => '</div>',
            'autofocus'=>'autofocus'
        )); ?>


        <?php echo $this->Form->input('password', array(
            'label' => array('text' => __('Password'),
                'class' => 'col col-md-3 control-label'),
            'placeholder' => __('Please enter your password.'),
            'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-unlock input-group-glyphicon"></span>', 'afterInput' => '</div>',

            'type' => 'password',
        )); ?>

        <div class="form-group">
            <div class="col col-md-7 col-md-offset-3">
                <?php echo $this->Form->submit(__('Login'), array(
                    'class' => 'btn btn-primary pull-right',
                    'style' => 'margin: 0 5px',
                )); ?>
                <?php echo $this->Html->link(__('Sign up'), array('controller' => 'users', 'action' => 'register') ,array(
                    'style' => 'margin: 0 5px',
                    'controller' => 'users', 'action' => 'register',
                    'div' => false,
                    'class' => 'btn btn-default pull-right',
                    'escape' => false
                )); ?>
            </div>
        </div>

        <?php echo $this->Form->end();?>

    </div>

</div>