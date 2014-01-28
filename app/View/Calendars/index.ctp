<? $this->Breadcrumbs->addCrumb(__('Production'), '/pages/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-calendar"></span>'.__('Calendar'), '/calendar', array('class' => 'active')); ?>

<div class="col-md-12 column content-pane">
    <?php echo $this->Session->flash(); ?>

    <div class="Calendar index">
        <div id="calendar"></div>
    </div>
</div>