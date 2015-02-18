<?php

/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb(__('Records'), '/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-hdd"></span>' . __('Devices'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb('#' . h($device['Device']['device_id']) . ' ' . h($device['Device']['name']), '#', array('class' => 'active')); ?>


<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-hdd"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo h($device['Device']['name']); ?></h1>
        </div>
    </div>
</div>


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="sideTicket ticket panel-default badger-left badger-default"
         data-badger="<? echo __('Device') . ' #' . h($device['Device']['device_id']); ?>">

        <div class="ticket-icon">
            <span class="glyphicon el-icon-hdd"></span>
        </div>

        <div class="ticket-actions actions">

            <?php if (!empty($device['Device']['type']) && $device['Device']['type'] == 'Lecture Recorder' || $device['Device']['type'] == 'Lecture Recorder X2') {

                echo '<div data-device_id="' . h($device['Device']['device_id']) . '" class="lr-ctrl-panel">';

                echo $this->Html->link(
                    $this->Html->tag('span', '', array('class' => 'glyphicon pull-right el-icon-cogs lr-icon')),
                    'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'target' => '_blank', 'escape' => false, 'title' => __('Lecture Recorder Admin-Panel')));

                echo $this->Html->link(
                    $this->Html->tag('span', '', array('class' => 'glyphicon pull-right el-icon-screen lr-icon')),
                    'http://' . h($device['Device']['ip_adress'] . '/admin/preview.cgi'), array('full_base' => true, 'target' => '_blank', 'escape' => false, 'title' => __('Lecture Recorder Live-View')));

                echo $this->Html->link(
                    $this->Html->tag('span', '', array('class' => 'glyphicon  pull-right el-icon-refresh lr-icon lr-status-ctrl lr-icon-pending spin')),
                    'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'target' => '_blank', 'escape' => false, 'title' => __('retrieving status...')));

                echo $this->Html->link(
                    $this->Html->tag('span', '', array('class' => 'glyphicon pull-right el-icon-record lr-icon lr-icon-rec lr-status-ctrl pulse')),
                    'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'target' => '_blank', 'escape' => false, 'title' => __('Status: Recording'), 'style' => 'display: none;'));

                echo $this->Html->link(
                    $this->Html->tag('span', '', array('class' => 'glyphicon pull-right el-icon-pause lr-icon lr-status-ctrl lr-icon-stop')),
                    'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'target' => '_blank', 'escape' => false, 'title' => __('Status: Stopped'), 'style' => 'display: none;'));

                echo $this->Html->link(
                    $this->Html->tag('span', '', array('class' => 'glyphicon pull-right el-icon-exclamation-sign lr-icon lr-status-ctrl lr-icon-error')),
                    'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'target' => '_blank', 'escape' => false, 'title' => __('Couldn\'t retrieve status, device might be offline.'), 'style' => 'display: none;'));


                echo '</div>';
            }
            ?>

        </div>

        <div class="ticket-body table-responsive">


            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                <tr>
                    <th><?php echo __('Device'); ?></th>
                    <td><span class="glyphicon el-icon-hdd"></span>
                        <?php echo h($device['Device']['name']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('Type'); ?></th>
                    <td><span class="glyphicon glyphicon-barcode"></span>
                        <?php echo h($device['Device']['type']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('Device place'); ?></th>
                    <td><span class="glyphicon glyphicon-map-marker"></span>
                        <?php echo h($device['Device']['location']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('Ip Adress'); ?></th>
                    <td><span class="glyphicon el-icon-website"></span>
                        <?php echo h($device['Device']['ip_adress']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('Link'); ?></th>
                    <td><span class="glyphicon glyphicon-link"></span>
                        <?php if (!empty($device['Device']['link'])) echo $this->Html->link(h($device['Device']['link']),
                            h($device['Device']['link']), array('full_base' => true, 'escape' => false));
                        ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('Username'); ?></th>
                    <td><span class="glyphicon el-icon-user"></span>
                        <?php echo h($device['Device']['username']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('Start Command'); ?></th>
                    <td><span class="glyphicon el-icon-record"></span>
                        <?php echo h($device['Device']['start_command']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('End Command'); ?></th>
                    <td><span class="glyphicon el-icon-stop-alt"></span>
                        <?php echo h($device['Device']['end_command']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('Created'); ?></th>
                    <td>
                        <?php if (!empty($device['Device']['created'])) echo

                            '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                            $this->Html->link( // <a>

                                $this->Time->nice(strtotime(h($device['Device']['created'])), 'CET', '%A, %d.%m.%Y'), // Date
                                '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($device['Device']['created']))), // Calendar-Link
                                array('escape' => false)) .
                            '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                            $this->Time->nice(strtotime(h($device['Device']['created'])), 'CET', '%H:%M')                       // Time
                        ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo __('Modified'); ?></th>
                    <td>
                        <?php if (!empty($device['Device']['modified'])) echo

                            '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                            $this->Html->link( // <a>

                                $this->Time->nice(strtotime(h($device['Device']['modified'])), 'CET', '%A, %d.%m.%Y'), // Date
                                '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($device['Device']['modified']))), // Calendar-Link
                                array('escape' => false)) .
                            '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                            $this->Time->nice(strtotime(h($device['Device']['modified'])), 'CET', '%H:%M')                       // Time
                        ?>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>

    <hr/>

    <? if (!empty($device['Device']['comment'])): ?>
        <strong><?php echo __('Comment'); ?></strong>

        <div class="comment-content well well-lg">
            <?php echo $device['Device']['comment'] ?>
        </div>

        <hr/>

    <? endif; ?>
    <!-- end col md 9 -->

</div>

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
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Device'), array('action' => 'edit', $device['Device']['device_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . __('Delete Device'), array('action' => 'delete', $device['Device']['device_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $device['Device']['device_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Devices'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Device'), array('action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-list"></span><?php echo __('Captures');?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar)) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets)) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->

<!--</div>-->
<!--</div>-->


