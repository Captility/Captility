<? $this->Breadcrumbs->addCrumb(__('Production'), '/pages/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-calendar"></span>'.__('Calendar'), '/calendar', array('class' => 'active')); ?>


<div class="row">
    <div class="col-md-1 column">
     <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-calendar"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Calendar') ?></h1>
        </div>
    </div>
</div>

<div class="col-md-12 column content-pane">
    <?php echo $this->Session->flash(); ?>

    <div class="Calendar index">
        <div id="calendar"></div>
    </div>
</div>