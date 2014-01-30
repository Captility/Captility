<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-play-circle"></span>'.__('Events'), '#', array('class' => 'active')); ?>
<!--<div class=" index">-->

<div class="row">
    <div class="col-md-1 column">
     <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-play-circle"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Events'); ?></h1>
        </div>
    </div>
    <!-- end col md 12 -->
</div><!-- end row -->


<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-primary">
        <!-- Default panel contents -->

        <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
            <thead class="panel-heading">
            <tr>
                <th><?php echo $this->Paginator->sort('event_id', 'ID'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('start'); ?></th>
                <th><?php echo $this->Paginator->sort('end'); ?></th>
                <th><?php echo $this->Paginator->sort('status'); ?></th>
                <th><?php echo $this->Paginator->sort('link'); ?></th>
                <th><?php echo $this->Paginator->sort('event_type_id', __('Type')) ; ?></th>
                <th><?php echo $this->Paginator->sort('capture_id'); ?></th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td><?php echo h($event['Event']['event_id']); ?>&nbsp;</td>
                    <td><?php echo h($event['Event']['title']); ?>&nbsp;</td>
                    <td><?php echo h($event['Event']['start']); ?>&nbsp;</td>
                    <td><?php echo h($event['Event']['end']); ?>&nbsp;</td>
                    <td><?php echo h($event['Event']['status']); ?>&nbsp;</td>
                    <td>
                        <?php if (!empty($event['Event']['link'])) echo $this->Html->link(
                            $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-link')),
                            h($event['Event']['link']), array('full_base' => true, 'escape' => false));
                        ?>
                    </td>
                    <td>
                        <?php echo $this->Form->create('EventTypes', array('url' => array('controller' => 'eventTypes', 'action' => 'view', $event['EventType']['event_type_id'])));?>

                        <button type="submit" title="<?php echo $event['EventType']['name']; ?>"
                                class="btn-color eventColor<?php echo $event['EventType']['color']; ?>"></button>

                        <?php echo $this->Form->end() ?>
                    </td><td>
                        <?php echo $this->Html->link($event['Capture']['name'], array('controller' => 'captures', 'action' => 'view', $event['Capture']['capture_id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $event['Event']['event_id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('action' => 'edit', $event['Event']['event_id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $event['Event']['event_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $event['Event']['event_id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="panel-footer">
            <small
                class="disabled"><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>

        </div>
    </div>

    <?php
    $params = $this->Paginator->params();
    if ($params['pageCount'] > 1) {
        ?>
        <ul class="pagination pagination-sm">
            <?php
            echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
            echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'escape' => false));
            ?>
        </ul>
    <?php } ?>

</div> <!-- end col md 9 -->

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
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event'), array('action' => 'add'), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Schedules'), array('controller' => 'schedules', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Schedule'), array('controller' => 'schedules', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->

<!--</div>--><!-- end row -->


<!--</div>--><!-- end containing of content -->