<?php $statuses = Configure::read('TICKET.STATUSES');
$class = $statuses[$ticket['Ticket']['status']];

$myTicket = ($ticket['User']['user_id'] === (AuthComponent::user('user_id')))?>

<div
    class="sideTicket <? if (!$myTicket) echo 'well ' ?>ticket badger-left badger-<? echo $class ?> panel-<? echo ($class == 'primary') ? 'info' : $class ?>"
    data-badger="Ticket #<? echo $ticket['Ticket']['ticket_id'] ?>">


    <div class="ticket-icon">
        <span class="glyphicon glyphicon-tags"></span>
    </div>

    <div class="ticket-actions actions">
        <? if ($myTicket) : ?>
            <a href="javascript:void(0)" class="postLink"
               data-href="<? echo Router::url('/', true); ?>tickets/update/<? echo $ticket['Ticket']['ticket_id'] ?>/Error"><span
                    class="glyphicon glyphicon-remove pull-right"></span></a>
            <a href="javascript:void(0)" class="postLink"
               data-href="<? echo Router::url('/', true); ?>tickets/update/<? echo $ticket['Ticket']['ticket_id'] ?>/Done"><span
                    class="glyphicon glyphicon-ok pull-right"></span></a>
        <? endif; ?>
        <a href="<? echo Router::url('/', true); ?>tickets/edit/<? echo $ticket['Ticket']['ticket_id'] ?>"><span
                class="glyphicon el-icon-pencil pull-right"></span></a>
        <a href="<? echo Router::url('/', true); ?>tickets/view/<? echo $ticket['Ticket']['ticket_id'] ?>"><span
                class="glyphicon glyphicon-search pull-right"></span></a>

    </div>

    <div class="ticket-body table-responsive">


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
                <th><?php echo __('Task'); ?></th>
                <td colspan="4">
                    <span class="glyphicon glyphicon-tags"></span>
                    <?php echo /*$this->Html->link(*/
                    h($ticket['Task']['name'])/*, array('controller' => 'tasks', 'action' => 'view', $ticket['Task']['task_id']));*/ ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Event'); ?></th>
                <td>
                    <span class="glyphicon glyphicon-play-circle"></span>
                    <?php echo $this->Html->link($ticket['Event']['title'], array(
                        'controller' => 'events', 'action' => 'view',
                        $ticket['Event']['event_id'])); ?>&nbsp;

                    <?php if ($ticket['Event']['link'] != '') echo $this->Html->link('<span class="glyphicon glyphicon-link"></span>&nbsp;',
                        $ticket['Event']['link'],
                        array('escape' => false)); ?>
                </td>
                <th><?php echo __('Date'); ?></th>
                <td>
                    <span class="glyphicon glyphicon-calendar"></span>
                    <?php echo $this->Captility->linkDate($ticket['Event']['start'], '%a, %d.%m.%Y')?>&nbsp;
                    <span
                        class="glyphicon glyphicon-time"></span><?php echo $this->Captility->calcDate($ticket['Event']['start'], '%H:%M')?>
                </td>
            </tr>
            <tr>
                <th><?php echo __('Lecture'); ?></th>
                <td>
                    <span class="glyphicon glyphicon-th-list"></span>
                    <?php echo $this->Html->link($this->Captility->trimLink('#' . $ticket['Lecture']['number'] . ' ' . $ticket['Lecture']['name'], 40),
                        array('controller' => 'lectures', 'action' => 'view', $ticket['Lecture']['lecture_id'])); ?>

                </td>
                <th><?php echo __('Host'); ?></th>
                <td>
                    <span class="glyphicon glyphicon-th-list"></span>
                    <?php echo $this->Html->link($ticket['Host']['name'],
                        array('controller' => 'hosts', 'action' => 'view', $ticket['Host']['host_id'])); ?>
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

                            $this->Time->nice(strtotime(h($ticket['Ticket']['created'])), 'CET', '%a, %d.%m.%Y'), // Date
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

                            $this->Time->nice(strtotime(h($ticket['Ticket']['modified'])), 'CET', '%a, %d.%m.%Y'), // Date
                            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($ticket['Ticket']['modified']))), // Calendar-Link
                            array('escape' => false)) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($ticket['Ticket']['modified'])), 'CET', '%H:%M')                       // Time
                    ?>
                </td>
            </tr>

            <? if (h($ticket['Task']['description'] != '')): ?>
                <tr>
                    <th><?php echo __('Description'); ?></th>
                    <td colspan="4">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <small class="text-muted task-description">
                            <?php echo h($ticket['Task']['description']); ?>
                        </small>
                    </td>
                </tr>
            <? endif; ?>


            </tbody>
        </table>
    </div>
</div>
