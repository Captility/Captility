<? if (!empty($tickets[0]['Ticket'])): ?>

    <? if (!$sideTicket): ?>

        <? foreach ($tickets as $i => $ticket): ?>

            <?php echo $this->Element('dashboard/ticket', array('ticket' => $ticket)); ?>

        <? endforeach; ?>

    <? else: ?>

        <? foreach ($tickets as $i => $ticket): ?>

            <?php echo $this->Element('dashboard/sideTicket', array('ticket' => $ticket)); ?>

        <? endforeach; ?>

    <? endif; ?>

<? else: ?>


    <? if (!$sideTicket): ?>

        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><span class="glyphicon glyphicon-ok"></span>&nbsp;<? echo __('No open Tickets found.')?></h4>
            <? echo __('No open tickets during the requested period were found.')?>
        </div>

    <? else: ?>

        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><span class="glyphicon glyphicon-ok"></span>&nbsp;<? echo __('No open Tickets found.')?></p>
        </div>

    <? endif; ?>

<? endif; ?>