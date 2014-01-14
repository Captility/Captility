<? $this->Html->addCrumb(__('Production'), '#'); ?>
<? $this->Html->addCrumb($headline, '/calendar', array('class' => 'active')); ?>

<div class="col-md-12 column content-pane">
    <?php echo $this->Session->flash(); ?>

    <div class="Calendar index">
        <div id="calendar"></div>
    </div>
</div>