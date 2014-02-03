<?php if (!empty($events[0]['Event'])): ?>

    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
        <thead>
        <tr>
            <th>
                <span class="glyphicon glyphicon-calendar"></span><? echo __('Day') ?>
            </th>
            <th>
                <? echo __('Event') ?>
            </th>
            <th>
                <span class="glyphicon glyphicon-link glyphicon-alone"></span>
            </th>
            <th>
                <? echo __('Responsible') ?>
            </th>
            <th>
                <? echo __('Status') ?>
            </th>
            <th>
                <span class="glyphicon glyphicon-cload-upload"></span>
            </th>
        </tr>
        </thead>
        <tbody>

        <? foreach ($events as $i => $event): ?>

            <?php $statuses = Configure::read('EVENT.STATUSES');
            $class = $statuses[$event['Event']['status']];?>

            <tr class="<? echo $class; ?>">
                <td>
                    <?php echo $this->Captility->linkDate(h($event['Event']['start']), '%A') ?>
                </td>
                <td>
                    <?php if (!empty($event['Event']['title'])) echo $this->Html->link(
                        h($event['Event']['title']), Router::url('/', true) . 'events/view/' . $event['Event']['event_id'], array('full_base' => true, 'escape' => false));
                    ?>
                </td>
                <td>
                    <?php if (!empty($event['Event']['link'])) echo $this->Html->link(
                        $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-link')),
                        h($event['Event']['link']), array('full_base' => true, 'escape' => false));
                    ?>
                </td>

                <td>
                    <?php if (!empty($event['User']['username'])) echo $this->Html->link(
                        h($event['User']['username']), Router::url('/', true) . 'users/view/' . $event['User']['user_id'], array('full_base' => true, 'escape' => false));
                    ?>
                </td>
                <td class="labels lower-labels">
                    <span class="label label-<? echo $class ?>"><? echo __(h($event['Event']['status'])) ?></span>
                </td>
                <td>
                    <? if ($event['Event']['status'] == 'Failed' || $event['Event']['status'] == 'Canceled'): echo '<span class="glyphicon glyphicon-remove"></span>' ?>
                    <? elseif ($event['Event']['status'] == 'Online'): echo '<span class="glyphicon glyphicon-ok"></span>' ?>
                    <?
                    else: echo '<span class="glyphicon glyphicon-refresh" style="opacity: 0.3;"></span>';  endif;?>
                </td>
            </tr>


        <? endforeach; ?>

        </tbody>
    </table>

<? endif; ?>