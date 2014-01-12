<!--Submit Area-->
<hr class="submit-panel"/>

<div class="form-group well well-sm ">

    <?php echo $this->Form->button('<span class="glyphicon glyphicon-saved"></span>' . __('Submit'), array(
        'escape' => false,
        'type' => 'submit',
        'class' => 'btn btn-primary pull-right',
        'div' => false)); ?>

    <?php echo $this->Form->button('<span class="glyphicon glyphicon-ban-circle"></span>' . __('Cancel'), array(
        'escape' => false,
        'class' => 'btn btn-danger',
        'action' => 'action',
        'onclick' => 'history.go(-1)',
        'formnovalidate' => TRUE,
        'div' => false,
        'type' => 'button',
        'style' => 'margin-right: 5px;')); ?>

    <?php echo $this->Form->button('<span class="glyphicon glyphicon-repeat"></span>' . __('Reset'), array(
        'escape' => false,
        'class' => 'btn btn-default',
        'formnovalidate' => TRUE,
        'div' => false,
        'type' => 'reset',
        'style' => 'margin-right: 5px;')); ?>

</div><!--End::Submit Area-->