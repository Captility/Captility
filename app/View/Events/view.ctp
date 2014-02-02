<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-film"></span>' . __('Captures'), '/captures'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-play-alt"></span>' . __('Event'), '#', array('class' => 'active')); ?>
<? $this->Breadcrumbs->addCrumb('#' . h($event['Event']['event_id']) . ' ' . h($event['Event']['title']), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-play-circle"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo h($event['Event']['title']); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-default badger-right badger-default"
         data-badger="<? echo __('Event') . ' #' . h($event['Event']['event_id']) ?>">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tbody>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <td><span class="glyphicon el-icon-play-circle"></span>
                    <?php echo h($event['Event']['title']); ?>
                    &nbsp;
                </td>
            </tr>

            <tr>
                <th><?php echo __('Capture'); ?></th>
                <td><span class="glyphicon glyphicon-film"></span>
                    <?php echo $this->Html->link($event['Capture']['name'], array('controller' => 'captures', 'action' => 'view', $event['Capture']['capture_id'])); ?>
                    &nbsp;
                </td>
            </tr>

            <tr>
                <th><?php echo __('Event Type'); ?></th>
                <td><span class="glyphicon glyphicon-facetime-video"></span>
                    <?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['event_type_id'])); ?>
                    &nbsp;
                </td>
            </tr>

            <tr>
                <th><?php echo __('Start'); ?></th>
                <td>
                    <?php if (!empty($event['Event']['start'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Captility->linkDate($event['Event']['start']) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($event['Event']['start'])), 'CET', '%H:%M')                       // Time
                    ?>
                </td>
            </tr>
            <tr>
                <th><?php echo __('End'); ?></th>
                <td>
                    <?php if (!empty($event['Event']['end'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Captility->linkDate($event['Event']['end']) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($event['Event']['end'])), 'CET', '%H:%M')                       // Time
                    ?>
                </td>
            </tr>
            <!--<tr>
                <th><?php /*echo __('All Day'); */?></th>
                <td>
                    <?php /*echo h($event['Event']['all_day']); */?>
                    &nbsp;
                </td>
            </tr>-->
            <tr>
                <th><?php echo __('Status'); ?></th>
                <?php $statuses = Configure::read('EVENT.STATUSES');
                $class = $statuses[$event['Event']['status']]; ?>
                <td class="labels">

                    <span class="glyphicon glyphicon-tasks"></span>


                    <span class="label label-<? echo $class ?>"><? echo __(h($event['Event']['status'])) ?></span>
                </td>
            </tr>
            <tr>
                <th><?php echo __('Link'); ?></th>
                <td><span class="glyphicon glyphicon-link"></span>
                    <?php echo $this->Html->link($this->Captility->trimLink($event['Event']['link']), h($event['Event']['link'])); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Created'); ?></th>
                <td>
                    <?php if (!empty($event['Event']['created'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Captility->linkDate($event['Event']['created']) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($event['Event']['created'])), 'CET', '%H:%M')                       // Time
                    ?>
                </td>
            </tr>
            <tr>
                <th><?php echo __('Modified'); ?></th>
                <td>
                    <?php if (!empty($event['Event']['modified'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Captility->linkDate($event['Event']['modified']) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($event['Event']['modified'])), 'CET', '%H:%M')                       // Time
                    ?>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <hr/>

    <? if (!empty($event['Event']['comment'])): ?>
        <strong><?php echo __('Comment'); ?></strong>

        <div class="comment-content well well-lg">
            <?php echo $event['Event']['comment'] ?>
        </div>

        <hr/>

    <? endif; ?>



    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Tickets'); ?></h3>
            <?php if (!empty($event['Ticket'])): ?>
                <div class="panel panel-primary">
                    <!-- Default panel contents -->

                    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
                        <thead class="panel-heading">
                        <tr>
                            <th><?php echo __('Ticket Id'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                            <th><?php echo __('Created'); ?></th>
                            <th><?php echo __('Modified'); ?></th>
                            <th><?php echo __('Ended'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($event['Ticket'] as $ticket): ?>
                            <tr>
                                <td><?php echo $ticket['ticket_id']; ?></td>
                                <td class="labels"><?php $statuses = Configure::read('TICKET.STATUSES');
                                    $class = $statuses[$ticket['status']]; ?>

                                    <span
                                        class="label label-<? echo $class ?>"><? echo __(h($ticket['status'])) ?></span>
                                </td>
                                <td><?php echo $this->Captility->linkDate(h($ticket['created']), '%d.%m.%Y %H:%M') ?></td>
                                <td><?php echo $this->Captility->linkDate(h($ticket['modified']), '%d.%m.%Y %H:%M') ?></td>
                                <td><?php echo $this->Captility->linkDate(h($ticket['ended']), '%d.%m.%Y %H:%M') ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'tickets', 'action' => 'view', $ticket['ticket_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'tickets', 'action' => 'edit', $ticket['ticket_id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'tickets', 'action' => 'delete', $ticket['ticket_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $ticket['ticket_id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer"></div>
                </div>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
        </div>
        <!-- end col md 12 -->
    </div>


</div>
<!-- end col md 9 -->

<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Event'), array('action' => 'edit', $event['Event']['event_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete Event') . '</span>', array('action' => 'delete', $event['Event']['event_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['Event']['event_id'])); ?> </li>
                </ul>
            </div>
            <!-- end body -->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-film"></span><?php echo __('Captures');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-tasks"></span><?php echo __('Tickets');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Tickets'), array('controller' => 'tickets', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->

<!--</div>-->
<!--</div>-->