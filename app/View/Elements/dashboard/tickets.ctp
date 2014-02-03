<!--<div class="panel panel-primary">
    <!-- Default panel contents -->


<!--table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
    <thead class="panel-heading">
    <tr>
        <th><?php /*echo __('Ticket Id'); */?></th>
        <th><?php /*echo __('Status'); */?></th>
        <th><?php /*echo __('Created'); */?></th>
        <th><?php /*echo __('Modified'); */?></th>
        <th><?php /*echo __('Ended'); */?></th>
        <th class="actions"></th>
    </tr>
    <thead>
    <tbody>
    <?php /*foreach ($data as $ticket): */?>
    <tr>
        <td><?php /*echo $ticket['Ticket']['ticket_id']; */?></td>
        <td class="labels"><?php /*$statuses = Configure::read('TICKET.STATUSES');
                        $class = $statuses[$ticket['Ticket']['status']]; */?>

            <span
                class="label label-<? /* echo $class */ ?>"><?/* echo __(h($ticket['Ticket']['status'])) */?></span>
        </td>
        <td><?php /*echo $this->Captility->linkDate(h($ticket['Ticket']['created']), '%d.%m.%Y %H:%M') */?></td>
        <td><?php /*echo $this->Captility->linkDate(h($ticket['Ticket']['modified']), '%d.%m.%Y %H:%M') */?></td>
        <td><?php /*echo $this->Captility->linkDate(h($ticket['Ticket']['ended']), '%d.%m.%Y %H:%M') */?></td>
        <td class="actions">
            <?php /*echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'tickets', 'action' => 'view', $ticket['Ticket']['ticket_id']), array('escape' => false)); */?>
            <?php /*echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'tickets', 'action' => 'edit', $ticket['Ticket']['ticket_id']), array('escape' => false)); */?>
            <?php /*echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'tickets', 'action' => 'delete', $ticket['Ticket']['ticket_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $ticket['Ticket']['ticket_id'])); */?>
        </td>
    </tr>
    <?php /*endforeach; */?>
    </tbody>
</table-->


<?php $statuses = Configure::read('TICKET.STATUSES');
$class = $statuses[$ticket['Ticket']['status']]; ?>

<div
    class="sideTicket ticket badger-left badger-<? echo $class ?> panel-<? echo ($class == 'primary') ? 'info' : $class ?>"
    data-badger="Ticket #<? echo $ticket['Ticket']['ticket_id'] ?>">


    <div class="ticket-icon">
        <span class="glyphicon glyphicon-tags"></span>
    </div>

    <div class="ticket-actions actions">
        <a href="<? echo Router::url('/', true);?>tickets/error/<? echo $ticket['Ticket']['ticket_id'] ?>"><span class="glyphicon glyphicon-remove pull-right"></span></a></a>
        <a href="<? echo Router::url('/', true);?>tickets/done/<? echo $ticket['Ticket']['ticket_id'] ?>"><span class="glyphicon glyphicon-ok pull-right"></span></a>
        <a href="<? echo Router::url('/', true);?>tickets/edit/<? echo $ticket['Ticket']['ticket_id'] ?>"><span class="glyphicon el-icon-pencil pull-right"></span></a>
        <a href="<? echo Router::url('/', true);?>tickets/view/<? echo $ticket['Ticket']['ticket_id'] ?>"><span class="glyphicon glyphicon-search pull-right"></span></a>

    </div>

    <div class="ticket-body">


        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tbody>
            <!--<tr>
                <th><?php /*echo __('Ticket Id'); */?></th>
                <td>
                    <?php /*echo h($ticket['Ticket']['ticket_id']); */?>
                    &nbsp;
                </td>
            </tr>-->


            <tr>
                <th><?php echo __('Event'); ?></th>
                <td colspan="4">
                    <span class="glyphicon glyphicon-play-circle"></span>
                    <?php echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['event_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Task'); ?></th>
                <td colspan="4">
                    <span class="glyphicon glyphicon-tags"></span>
                    <?php echo $this->Html->link($ticket['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $ticket['Task']['task_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>

                <th><?php echo __('Status'); ?></th>

                <td class="labels">

                    <span class="glyphicon glyphicon-tasks"></span>


                    <span class="label label-<? echo $class ?>"><? echo __(h($ticket['Ticket']['status'])) ?></span>
                </td>
                <th><?php echo __('Responsible'); ?></th>
                <td>
                    <span class="glyphicon glyphicon-user"></span>
                    <?php echo $this->Html->link($ticket['User']['username'], array('controller' => 'users', 'action' => 'view', $ticket['User']['user_id'])); ?>
                    &nbsp;
                </td>

            </tr>

            <tr>
                <th><?php echo __('Created'); ?></th>
                <td>
                    <?php if (!empty($ticket['Ticket']['created'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Html->link( // <a>

                            $this->Time->nice(strtotime(h($ticket['Ticket']['created'])), 'CET', '%A, %d.%m.%Y'), // Date
                            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($ticket['Ticket']['created']))), // Calendar-Link
                            array('escape' => false)) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($ticket['Ticket']['created'])), 'CET', '%H:%M')                       // Time
                    ?>
                </td>

                <th><?php echo __('Modified'); ?>
                </th>
                <td>
                    <?php if (!empty($ticket['Ticket']['modified'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Html->link( // <a>

                            $this->Time->nice(strtotime(h($ticket['Ticket']['modified'])), 'CET', '%A, %d.%m.%Y'), // Date
                            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($ticket['Ticket']['modified']))), // Calendar-Link
                            array('escape' => false)) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($ticket['Ticket']['modified'])), 'CET', '%H:%M')                       // Time
                    ?>
                </td>
            </tr>

            <!--tr>
                <th><?php /*echo __('Ended'); */?></th>
                <td>
                    <?php /*if (!empty($ticket['Ticket']['ended'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Html->link( // <a>

                            $this->Time->nice(strtotime(h($ticket['Ticket']['ended'])), 'CET', '%A, %d.%m.%Y'), // Date
                            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($ticket['Ticket']['ended']))), // Calendar-Link
                            array('escape' => false)) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($ticket['Ticket']['ended'])), 'CET', '%H:%M')                       // Time
                    */?>
                </td>
            </tr>-->

            <tr>
                <th><?php echo __('Description'); ?></th>
                <td colspan="4">
                    <span class="glyphicon glyphicon-info-sign"></span>
                    <small class="text-muted task-description">
                        <?php echo h($ticket['Task']['description']); ?>
                    </small>
                </td>
            </tr>


            </tbody>
        </table>


    </div>

</div>
