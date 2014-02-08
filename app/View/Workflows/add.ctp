<? $this->Breadcrumbs->addCrumb(__('Team'), '/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-random"></span>' . __('Workflows'), array('action' => 'index')); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-plus"></span>' . __('Add Workflow'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-random"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Add Workflow'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

<?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Workflow', Configure::read('FORM.INPUT_DEFAULTS')); ?>


<?php echo $this->Form->input('name', array(

    'placeholder' => __('Name'),
    'label' => __('Workflow'),
    'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon el-icon-random input-group-glyphicon"></span>', 'afterInput' => '</div>',
    'autofocus' => 'autofocus',
    'class' => 'form-control input-thin',
));?>


<!-- TASK LIST -->
<ul class="timeline workflow-task-list">


    <? $classes = array('primary', 'warning', 'danger', 'info'); ?>
    <!-- // TASKS(request-data) -->

    <? // SORT TASKS TO SHOW IN RIGHT ORDER

    //RULE
    function sortByStep($a, $b) {

        return $a['step'] - $b['step'];
    }

    // SORT
    if (!empty($this->request->data['Task'])) {

        usort($this->request->data['Task'], 'sortByStep');
    }
    ?>

    <? if (isset($this->request->data['Task'])) foreach ($this->request->data['Task'] as $i => $task): ?>

        <li class="task">
            <div class="timeline-badge workflow-task <? $classes[$i % sizeof($classes)] ?>"><span
                    class="glyphicon glyphicon-tags"></span></div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h4 class="timeline-title task-name task-view" style="display: none">
                        <hr/>
                    </h4>

                    <div class="task-name-field task-edit">
                        <?php echo $this->Form->input('Task.' . $i . '.name', array(

                            'placeholder' => __('Name'),
                            'label' => __('Task'),
                            'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-tags input-group-glyphicon"></span>', 'afterInput' => '</div>',
                            'autofocus' => 'autofocus',
                            'disabled' => false,
                        ));?>
                    </div>

                    <div class="btn-group-vertical pull-right task-view" style="display: none">
                        <button type="button" class="btn btn-default btn-sm task-up">
                            <i class="glyphicon  el-icon-chevron-up"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm task-config">
                            <i class="glyphicon el-icon-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm task-down">
                            <i class="glyphicon  el-icon-chevron-down"></i>
                        </button>
                    </div>
                </div>

                <div class="timeline-body">
                    <p class="task-view" style="display: none">
                        <small class="text-muted task-description">

                        </small>
                    </p>

                    <div class="task-description-field task-edit">
                        <?php echo $this->Form->input('Task.' . $i . '.description', array(
                            'placeholder' => __('Description'),
                            'disabled' => false,
                        ));?>
                    </div>
                    <div class="task-step-field task-edit">
                        <?php echo $this->Form->hidden('Task.' . $i . '.step', array(
                            'placeholder' => 'Step',
                            'hiddenField' => true,
                            'disabled' => false,
                        ));?>
                    </div>
                    <div class="task-button task-edit">
                        <button type="button" class="btn btn-default pull-right task-save">
                            <i class="glyphicon glyphicon-ok"></i><? echo __('Ok');?>
                        </button>
                        <button type="button" class="btn btn-default pull-right task-delete"
                                style="margin-right: 10px;">
                            <i class="glyphicon  glyphicon-remove"></i><? echo __('Delete'); ?></i>
                        </button>
                    </div>
                </div>


            </div>
        </li>


    <? endforeach; ?>

    <!-- /// TASK TEMPLATE -->
    <li class="task-template">
        <div class="timeline-badge workflow-task"><span class="glyphicon glyphicon-tags"></span></div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title task-name task-view">
                    <hr/>
                </h4>

                <div class="task-name-field task-edit">
                    <?php echo $this->Form->input('Task.$placeholder$.name', array(

                        'placeholder' => __('Name'),
                        'label' => __('Task'),
                        'beforeInput' => '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-tags input-group-glyphicon"></span>', 'afterInput' => '</div>',
                        'autofocus' => 'autofocus',
                        'disabled' => true,
                    ));?>
                </div>

                <div class="btn-group-vertical pull-right task-view">
                    <button type="button" class="btn btn-default btn-sm task-up">
                        <i class="glyphicon  el-icon-chevron-up"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm task-config">
                        <i class="glyphicon el-icon-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm task-down">
                        <i class="glyphicon  el-icon-chevron-down"></i>
                    </button>
                </div>
            </div>

            <div class="timeline-body">
                <p class="task-view">
                    <small class="text-muted task-description">

                    </small>
                </p>

                <div class="task-description-field task-edit">
                    <?php echo $this->Form->input('Task.$placeholder$.description', array(
                        'placeholder' => __('Description'),
                        'disabled' => true,
                    ));?>
                </div>
                <div class="task-step-field task-edit">
                    <?php echo $this->Form->hidden('Task.$placeholder$.step', array(
                        'placeholder' => 'Step',
                        'hiddenField' => true,
                        'disabled' => true,
                    ));?>
                </div>
                <div class="task-button task-edit">
                    <button type="button" class="btn btn-default pull-right task-save">
                        <i class="glyphicon glyphicon-ok"></i><? echo __('Ok');?>
                    </button>
                    <button type="button" class="btn btn-default pull-right task-delete"
                            style="margin-right: 10px;">
                        <i class="glyphicon  glyphicon-remove"></i><? echo __('Delete'); ?></i>
                    </button>
                </div>
            </div>


        </div>
    </li>


    <li class="workflow-task-add sort-disabled">
        <div class="timeline-badge success"><span class="glyphicon glyphicon-plus"></span></div>
        <div class="timeline-panel">
            <div class="timeline-heading">
                <h4 class="timeline-title"><a href="javascript:void(0)"><? echo __('Add new Task') ?></a></h4>
            </div>
            <div class="timeline-body">
                <small class="text-muted"><? echo __('Add a new Task to this Workflow') ?></small>
            </div>
        </div>
    </li>


</ul>


<!-- /// TASK TEMPLATE ENDE -->


<div class="info-banner info-banner-info" id="Infobanner">

    <h4 data-toggle="collapse" data-parent="#Infobanner" href="#Collabse-info-banner">
        <small class="glyphicon el-icon-info-sign"></small>
        Routinen vorkonfigurieren
    </h4>


    <div id="Collabse-info-banner" class="panel-collapse collapse <!--in-->">

        <hr/>

        Ein <strong>Workflow</strong> definiert einen Arbeitsablauf durch eine Reihe vorgegebener Aufgaben.<br/>

        Workflows können mit Aufzeichnungen gekoppelt werden um auf komfortable weise Tickets nach vorgegebenem
        Muster für jeden Aufzeichnungstermin zu generieren.
        Definieren sie eine Abfolge von nötigen Schritten, die nacheinander erfolgen sollen. Captility erledigt den
        Rest.</p>

    </div>
</div>

<hr/>

<?php echo $this->Element('submitArea', array('hr' => false));?>

<?php echo $this->Form->end() ?>

</div><!-- end col md 12 -->


<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?></h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Workflows'), array('action' => 'index'), array('escape' => false)); ?></li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-film"></span><?php echo __('Captures');?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
