<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<?php if (!empty($devices[0]['Device'])): ?>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive table-hover">
        <thead>
        <tr style="white-space: nowrap;">
            <th>
                <span class="glyphicon glyphicon-calendar"></span><? echo __('Name') ?>
            </th>
            <th>
                <span class="glyphicon glyphicon-play-circle"></span><? echo __('Type') ?>
            </th>
            <th>
                <span class="glyphicon glyphicon-play-circle"></span><? echo __('Location') ?>
            </th>
            <th>
                <span class="glyphicon glyphicon-user"></span><? echo __('Ip Adress') ?>
            </th>
            <th>
                <span class="glyphicon glyphicon-barcode"></span><? echo __('Link') ?>
            </th>
            <th>
                <?php echo $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-adjust-alt'));
                echo $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-adjust-alt'));
                echo $this->Html->tag('span', '', array('class' => 'glyphicon el-icon-adjust-alt'));?>
            </th>
        </tr>
        </thead>
        <tbody>

        <? foreach ($devices as $i => $device): ?>

            <tr onclick="document.location = '<? echo Router::url(array('controller' => 'devices', 'action' => 'view', $device['Device']['device_id'])); ?>';">

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
            </tr>


        <? endforeach; ?>

        </tbody>
    </table>

<? endif; ?>