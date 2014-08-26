<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? if (!empty($devices[0]['Device'])): ?>


    <?php echo $this->Element('dashboard/recorderFeed', array('devices' => $devices)); ?>


<? else: ?>


    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;<? echo __('No devices found')?></h4>
        <span><? echo __('No capture devices configured.')?></span>
    </div>


<? endif; ?>