<?php

/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb(__('Records'), '/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-hdd"></span>' . __('Devices'), array('action' => 'index')); ?>

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-hdd"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Devices'); ?></h1>
        </div>
    </div>
</div>

<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-primary" id="Pagination">
        <!-- Default panel contents -->

        <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive table-hover">
            <thead class="panel-heading">


            <tr>
                <!-- <th><?php /*echo $this->Paginator->sort('device_id', __('ID')); */?></th>-->
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('type'); ?></th>
                <th><?php echo $this->Paginator->sort('location', __('Device place')); ?></th>
                <th><?php echo $this->Paginator->sort('ip_adress'); ?></th>
                <th><?php echo $this->Paginator->sort('link'); ?></th>
                <th>
                    <?php echo $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-adjust-alt'));
                    echo $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-adjust-alt'));
                    echo $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-adjust-alt'));?>
                </th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($devices as $device): ?>
                <tr onclick="document.location = '<? echo Router::url(array('controller' => $this->name, 'action' => 'view', $device['Device']['device_id'])); ?>';">
                    <!--<td><?php /*echo h($device['Device']['device_id']); */?>&nbsp;</td>-->
                    <td><?php echo h($device['Device']['name']); ?></td>
                    <td><?php echo h($device['Device']['type']); ?></td>
                    <td><?php echo h($device['Device']['location']); ?></td>
                    <td><?php echo h($device['Device']['ip_adress']); ?></td>
                    <td>
                        <?php if (!empty($device['Device']['link'])) echo $this->Html->link(
                            $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-link')),
                            h($device['Device']['link']), array('full_base' => true, 'escape' => false));
                        ?>
                    </td>
                    <td nowrap style="white-space:nowrap;">
                        <?php if (!empty($device['Device']['type']) && $device['Device']['type'] == 'Lecture Recorder' || $device['Device']['type'] == 'Lecture Recorder X2') {

                            echo '<div data-device_id="' . h($device['Device']['device_id']) . '" class="lr-ctrl-panel">';

                            echo $this->Html->link(
                                $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-refresh lr-icon lr-status-ctrl lr-icon-pending spin')),
                                'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'escape' => false, 'title' => __('retrieving status...')));

                            echo $this->Html->link(
                                $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-record lr-icon lr-icon-rec lr-status-ctrl pulse')),
                                'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'escape' => false, 'title' => __('Status: Recording'), 'style' => 'display: none;'));

                            echo $this->Html->link(
                                $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-pause lr-icon lr-status-ctrl lr-icon-stop')),
                                'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'escape' => false, 'title' => __('Status: Stopped'), 'style' => 'display: none;'));

                            echo $this->Html->link(
                                $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-exclamation-sign lr-icon lr-status-ctrl lr-icon-error')),
                                'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'escape' => false, 'title' => __('Couldn\'t retrieve status, device might be offline.'), 'style' => 'display: none;'));

                            echo $this->Html->link(
                                $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-screen lr-icon')),
                                'http://' . h($device['Device']['ip_adress'] . '/admin/preview.cgi'), array('full_base' => true, 'escape' => false, 'title' => __('Lecture Recorder Live-View')));

                            echo $this->Html->link(
                                $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-cogs lr-icon')),
                                'http://' . h($device['Device']['ip_adress'] . '/admin/infocfg'), array('full_base' => true, 'escape' => false, 'title' => __('Lecture Recorder Admin-Panel')));

                            echo '</div>';
                        }
                        ?>
                    </td>

                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $device['Device']['device_id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('action' => 'edit', $device['Device']['device_id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $device['Device']['device_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $device['Device']['device_id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="panel-footer">
            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
            </p>
        </div>
    </div>

    <?php
    $params = $this->Paginator->params();
    if ($params['pageCount'] > 1) {
        ?>
        <ul class="pagination pagination-sm">
            <?php
            echo $this->Paginator->prev('← ' . __('Previous'), array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
            echo $this->Paginator->next(__('Next') . ' →', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next →</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
            ?>
        </ul>
    <?php } ?>

</div>
<!-- end col md 9 -->

<div class="col-md-3 action-column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Device'), array('action' => 'add'), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Devices'), array('action' => 'index'), array('escape' => false)); ?></li>
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