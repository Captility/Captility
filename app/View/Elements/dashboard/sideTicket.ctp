<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<?php $statuses = Configure::read('TICKET.STATUSES');
$class = $statuses[$ticket['Ticket']['status']]; ?>

<div
    class="sideTicket badger-left badger-<? echo $class ?> panel-<? echo ($class == 'primary') ? 'info' : $class ?>"
    data-badger="Ticket #<? echo $ticket['Ticket']['ticket_id'] ?>" data-toggle="collapse"
    data-parent="#sideTicketContainer" href="#sideTicketcollapse<? echo $ticket['Ticket']['ticket_id'] ?>">


    <div class="ticket-icon">
        <span class="glyphicon glyphicon-tags"></span>
    </div>

    <div class="ticket-actions actions">
        <a href="javascript:void(0)" class="postLink"
           data-href="<? echo Router::url('/', true); ?>tickets/update/<? echo $ticket['Ticket']['ticket_id'] ?>/Error"><span
                class="glyphicon glyphicon-remove pull-right"></span></a>
        <a href="javascript:void(0)" class="postLink"
           data-href="<? echo Router::url('/', true); ?>tickets/update/<? echo $ticket['Ticket']['ticket_id'] ?>/Done"><span
                class="glyphicon glyphicon-ok pull-right"></span></a>
        <a href="<? echo Router::url('/', true); ?>tickets/edit/<? echo $ticket['Ticket']['ticket_id'] ?>"><span
                class="glyphicon el-icon-pencil pull-right"></span></a>
        <a href="<? echo Router::url('/', true); ?>tickets/view/<? echo $ticket['Ticket']['ticket_id'] ?>"><span
                class="glyphicon glyphicon-search pull-right"></span></a>

    </div>

    <div class="ticket-body">

        <strong><?php echo  h($ticket['Task']['name']) ?></strong>


        <div id="sideTicketcollapse<? echo $ticket['Ticket']['ticket_id'] ?>" class="panel-collapse collapse <!--in-->">


            <table cellpadding="0" cellspacing="0" class="table table-striped sideTicketTable">
                <tbody>
                <tr></tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-play-circle"></span>
                        <?php echo $this->Html->link($ticket['Event']['title'], array(
                            'controller' => 'events', 'action' => 'view',
                            $ticket['Event']['event_id'])); ?>&nbsp;

                        <?php if ($ticket['Event']['link'] != '') echo $this->Html->link('<span class="glyphicon glyphicon-link"></span>&nbsp;',
                            $ticket['Event']['link'],
                            array('escape' => false)); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="glyphicon glyphicon-calendar"></span>
                        <?php echo $this->Captility->linkDate($ticket['Event']['start'], '%a, %d.%m.%Y')?>&nbsp;
                    <span
                        class="glyphicon glyphicon-time"></span><?php echo $this->Captility->calcDate($ticket['Event']['start'], '%H:%M')?>
                    </td>
                </tr>
                <tr>
                    <td class="hidden-xs">
                        <span class="glyphicon glyphicon-th-list"></span>
                        <?php echo $this->Html->link($this->Captility->trimLink('#' . $ticket['Lecture']['number'] . ' ' . $ticket['Lecture']['name'], 30),
                            array('controller' => 'lectures', 'action' => 'view', $ticket['Lecture']['lecture_id'])); ?>

                    </td>
                    <td class="hidden-sm hidden-md hidden-lg">
                        <span class="glyphicon glyphicon-th-list"></span>
                        <?php echo $this->Html->link($this->Captility->trimLink('#' . $ticket['Lecture']['number'] . ' ' . $ticket['Lecture']['name'], 200),
                            array('controller' => 'lectures', 'action' => 'view', $ticket['Lecture']['lecture_id'])); ?>

                    </td>
                </tr>
                </tbody>
            </table>


        </div>
    </div>

</div>