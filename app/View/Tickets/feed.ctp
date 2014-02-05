<?php if (!empty($tickets[0]['Ticket'])) foreach ($tickets as $i => $ticket): ?>

    <?php echo $this->Element('dashboard/tickets', array('ticket' => $ticket)); ?>

<? endforeach; ?>