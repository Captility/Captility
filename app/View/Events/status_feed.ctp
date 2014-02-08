<? if (!empty($events[0]['Event'])): ?>


    <?php echo $this->Element('dashboard/statusList', array('events' => $events)); ?>


<? else: ?>


    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;<? echo __('No events found')?></h4>
        <span><? echo __('There are no Captures this week.')?></span>
    </div>


<? endif; ?>