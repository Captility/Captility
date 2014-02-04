<!--Submit Area-->
<div class="clearfix">
    <? if (!isset($hr)): ?>

        <hr class="submit-panel"/>

    <? endif; ?>

    <div class="form-group well well-sm col-lg-12 col-md-12 col-sm-12 col-xs-12">

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
            'class' => 'btn btn-default btn-reset',
            'formnovalidate' => TRUE,
            'div' => false,
            'type' => 'reset',
            'style' => 'margin-right: 5px;')); ?>

        <?php /*echo $this->Form->button('<span class="glyphicon glyphicon-upload"></span>' . __('Up'), array(
            'escape' => false,
            'class' => 'btn btn-default btn-scrollTop',
            'formnovalidate' => TRUE,
            'div' => false,
            'type' => 'reset',
            'style' => 'margin-right: 5px;')); */?>

    </div>
    <!--End::Submit Area-->

</div>