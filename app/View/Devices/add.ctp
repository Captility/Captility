<?php

/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb(__('Records'), '/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-hdd"></span>' . __('Devices'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>' . __('Add Device'), '#', array('class' => 'active')); ?>


<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-hdd"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add Device'); ?></h1>
        </div>
    </div>
</div>


<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>

    <?php echo $this->Form->create('Device', Configure::read('FORM.INPUT_DEFAULTS')); ?>


    <? ################################################################################################################## ?>
    <? ################################################### DEVICE ####################################################### ?>
    <? ################################################################################################################## ?>

    <?php echo $this->Form->input('Device.name', array(

        'placeholder' => __('Name'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-hdd input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'autofocus' => 'autofocus',
        'div' => 'form-group form-split-6',
        'required' => true
    ));?>

    <?php echo $this->Form->input('Device.type', array(

        'label' => __('Type'),
        'placeholder' => __('Type'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-barcode input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',
        'options' => Configure::read('DEVICE.TYPES')
    ));?>

    <?php echo $this->Form->input('Device.location', array(

        'label' => __('Device place'),
        'placeholder' => __('Device place'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-map-marker input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6'
    ));?>

    <?php echo $this->Form->input('Device.ip_adress', array(

        'label' => __('IP Adress'),
        'placeholder' => __('IP Adress'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-website input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6'
    ));?>


    <?php echo $this->Form->input('Device.link', array(
        'placeholder' => __('Info Link'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-link input-group-glyphicon"></span>', 'afterInput' => '</div>',
    ));?>


    <div class="info-banner info-banner-info" id="Infobanner">

        <h4 data-toggle="collapse" data-parent="#Infobanner" href="#Collabse-info-banner">
            <small class="glyphicon el-icon-info-sign"></small>
            Optionale Angaben zur Aufnahmesteuerung
        </h4>


        <div id="Collabse-info-banner" class="panel-collapse collapse <!--in-->">

            <hr/>

            <p>Ein <strong>AufnahmeGerät</strong>, das mit der standartmäßigen HTTP-API des Lecture Recorders (X2)
                funktioniert benötigt neben der Angabe der Gerät-IP,
                gegebenenfalls zusätzlich die Angabe eines Benutzers und Passwortes.</br>
                Siehe <a href="http://www.epiphan.com/pdf/epiphan-lecture-recorder-x2-userguide.pdf">Lecture Recorder
                    Handbuch</a>.</p>

            <p>Andere <strong>AufnahmeGeräte</strong> welche die Lecture Recorder HTTP-API <strong>nicht</strong>
                unterstützen können alternativ direkt über HTTP-Start- und Stoppbefehl gesteuert werden.
                In diesem Fall werden vorherige Eingaben wie IP, Username und Passwort jedoch nicht berücksichtigt.</p>

        </div>
    </div>

    <?php echo $this->Form->input('Device.username', array(

        'label' => __('Username'),
        'placeholder' => __('Username'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-user input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6'
    ));?>

    <?php echo $this->Form->input('Device.device_pwd', array(
        'placeholder' => __('Password'),
        'type' => 'password',
        'label' => __('Password'),
        //'value' => '',
        'autocomplete' => 'off',
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-lock input-group-glyphicon"></span>', 'afterInput' => '</div>',
        'div' => 'form-group form-split-6',
        'require' => false
    ));?>

    <hr class="input-group"/>

    <?php echo $this->Form->input('Device.start_command', array(
        'placeholder' => __('Start Command'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-record input-group-glyphicon"></span>', 'afterInput' => '</div>',
    ));?>

    <?php echo $this->Form->input('Device.end_command', array(
        'placeholder' => __('Stop Command'),
        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-stop-alt input-group-glyphicon"></span>', 'afterInput' => '</div>',
    ));?>


    <hr/>

    <?php echo $this->Element('tinymce'); ?>

    <div class="form-group">
        <?php echo $this->Form->input('comment', array('class' => 'form - control', 'placeholder' => 'Comment'));?>
    </div>



    <? // END ?>
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

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Devices'), array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-list"></span><?php echo __('Captures');?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar)) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets)) echo $this->Element('sideTickets');?>
</div>