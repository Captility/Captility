<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-th-list"></span>'.__('Lectures'), '#', array('class' => 'active')); ?>
<!--<div class=" index">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Lectures'); ?></h1>
        </div>
    </div>
    <!-- end col md 12 -->
</div><!-- end row -->


<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->

        <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
            <thead class="panel-heading">
            <tr>
                <th><?php echo $this->Paginator->sort('number'); ?></th>
                <th><?php echo $this->Paginator->sort('name', __('Lecture name')); ?></th>
                <th><?php echo $this->Paginator->sort('host_id'); ?></th>
                <th><?php echo $this->Paginator->sort('semester'); ?></th>
                <th><?php echo $this->Paginator->sort('link'); ?></th>
                <th><?php echo $this->Paginator->sort('user_id', __('Responsible')) ?></th>
                <th><?php echo $this->Paginator->sort('event_type_id', __('Type')); ?></th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($lectures as $lecture): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link(h($lecture['Lecture']['number']), array('action' => 'view', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?>
                    </td>
                    <td><?php echo h($lecture['Lecture']['name']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($lecture['Host']['name'], array('controller' => 'hosts', 'action' => 'view', $lecture['Host']['host_id'])); ?>
                    </td>
                    <td><?php echo h($lecture['Lecture']['semester']); ?>&nbsp;</td>
                    <td>
                        <?php if (!empty($lecture['Lecture']['link'])) echo $this->Html->link(
                            $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-link')),
                            h($lecture['Lecture']['link']), array('full_base' => true, 'escape' => false));
                        ?>
                    </td>


                    <td>
                        <?php echo $this->Html->link($lecture['User']['username'], array('controller' => 'users', 'action' => 'view', $lecture['User']['user_id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->create('EventTypes', array('url' => array('controller' => 'eventTypes', 'action' => 'view', $lecture['EventType']['event_type_id'])));?>

                        <button type="submit" title="<?php echo $lecture['EventType']['name']; ?>"
                                class="btn-color eventColor<?php echo $lecture['EventType']['color']; ?>"></button>

                        <?php echo $this->Form->end() ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon el-icon-file-edit"></span>', array('action' => 'edit', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $lecture['Lecture']['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['Lecture']['lecture_id'])); ?>
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
            echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
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
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-film"></span><? echo __('Captures') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon cp-icon-lecturer"></span><? echo __('Hosts') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Hosts'), array('controller' => 'hosts', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Host'), array('controller' => 'hosts', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-facetime-video"></span><? echo __('Event Types') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Event Types'), array('controller' => 'event_types', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Event Type'), array('controller' => 'event_types', 'action' => 'add'), array('escape' => false)); ?> </li>
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

<!--</div>--><!-- end row -->


<!--</div>--><!-- end containing of content -->