<? $this->Html->addCrumb(__('Host'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Host'); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-default">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tbody>
            <tr>
                <th><?php echo __('Host Id'); ?></th>
                <td>
                    <?php echo h($host['Host']['host_id']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Name'); ?></th>
                <td>
                    <?php echo h($host['Host']['name']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Email'); ?></th>
                <td>
                    <?php echo h($host['Host']['email']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Contact'); ?></th>
                <td>
                    <?php echo h($host['Host']['contact']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Contact Email'); ?></th>
                <td>
                    <?php echo h($host['Host']['contact_email']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Comment'); ?></th>
                <td>
                    <?php echo h($host['Host']['comment']); ?>
                    &nbsp;
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <hr/>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Lectures'); ?></h3>
            <?php if (!empty($host['Lecture'])): ?>
                <div class="panel panel-default">
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <tbody>
                        <tr>
                            <th><?php echo __('Number'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Semester'); ?></th>
                            <th><?php echo __('Link'); ?></th>
                            <th><?php echo __('User'); ?></th>
                            <th><?php echo __('Event Type'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($host['Lecture'] as $lecture): ?>
                            <tr>
                                <td><?php echo $lecture['number']; ?></td>
                                <td><?php echo $lecture['name']; ?></td>
                                <td><?php echo $lecture['semester']; ?></td>
                                <td>
                                    <?php if (!empty($lecture['link'])) echo $this->Html->link(
                                        $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-link')),
                                        h($lecture['link']), array('full_base' => true, 'escape' => false));
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
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'lectures', 'action' => 'view', $lecture['lecture_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'lectures', 'action' => 'edit', $lecture['lecture_id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'lectures', 'action' => 'delete', $lecture['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['lecture_id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer"></div>
                </div>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>' . __('Edit Host'), array('action' => 'edit', $host['Host']['host_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>' . __('Delete Host'), array('action' => 'delete', $host['Host']['host_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $host['Host']['host_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Hosts'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Host'), array('action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Lectures') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
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