<? $this->Html->addCrumb(__('Lecture'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Lecture') . ' #' . h($lecture['Lecture']['number']); ?></h1>
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
                <th><?php echo __('Lecture Id'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['lecture_id']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Number of Lecture'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['number']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Name of lecture'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['name']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Semester'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['semester']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Type'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['type']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Link'); ?></th>
                <td>
                    <?php echo $this->Html->link(h($lecture['Lecture']['link']), h($lecture['Lecture']['link'])); ?>
                </td>
            </tr>
            <tr>
                <th><?php echo __('Pwd'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['pwd']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Start'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['start']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('End'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['end']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Created'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['created']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Modified'); ?></th>
                <td>
                    <?php echo h($lecture['Lecture']['modified']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Responsible'); ?></th>
                <td>
                    <?php echo $this->Html->link($lecture['User']['username'], array('controller' => 'users', 'action' => 'view', $lecture['User']['user_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Host'); ?></th>
                <td>
                    <?php echo $this->Html->link($lecture['Host']['name'], array('controller' => 'hosts', 'action' => 'view', $lecture['Host']['host_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Event Type'); ?></th>
                <td>
                    <?php echo $this->Html->link($lecture['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $lecture['EventType']['event_type_id'])); ?>
                    &nbsp;
                </td>
            </tr>
            </tbody>
        </table>
    </div>


    <strong><?php echo __('Comment'); ?></strong>

    <div class="comment-content well well-lg">
        <?php echo $lecture['Lecture']['comment']; ?>
    </div>

    <hr/>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Captures'); ?></h3>
            <?php if (!empty($lecture['Capture'])): ?>
                <div class="panel panel-default">
                    <!-- Default panel contents -->

                    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
                        <thead class="panel-heading">
                        <tr>
                            <th><?php echo __('Capture Id'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                            <th><?php echo __('User'); ?></th>
                            <th><?php echo __('Workflow'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($lecture['Capture'] as $capture): ?>
                            <tr>
                                <td><?php echo $capture['capture_id']; ?></td>
                                <td><?php echo $capture['name']; ?></td>
                                <td><?php echo $capture['status']; ?></td>
                                <td><?php echo $this->Html->link($capture['User']['username'], array('controller' => 'users', 'action' => 'view', $capture['User']['user_id'])); ?></td>
                                <td><?php echo $this->Html->link($capture['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $capture['Workflow']['workflow_id'])); ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'captures', 'action' => 'view', $capture['capture_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'captures', 'action' => 'edit', $capture['capture_id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'captures', 'action' => 'delete', $capture['capture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $capture['capture_id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer"></div>
                </div>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>' . __('Edit Lecture'), array('action' => 'edit', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>' . __('Delete Lecture'), array('action' => 'delete', $lecture['Lecture']['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['Lecture']['lecture_id'])); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Captures') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Hosts') ?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Hosts'), array('controller' => 'hosts', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Host'), array('controller' => 'hosts', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <? echo __('Event Types') ?>
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
        <!-- end panel -->
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar)) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets)) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->

<!--</div>-->
<!--</div>-->