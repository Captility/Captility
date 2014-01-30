<? $this->Breadcrumbs->addCrumb(__('Team'), '/pages/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-random"></span>'.__('Workflows'),array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb(' #' . h($workflow['Workflow']['workflow_id']) . ' ' . h($workflow['Workflow']['name']), '#'); ?>

<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
     <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-random"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo ' #' . h($workflow['Workflow']['workflow_id']) . ' ' . h($workflow['Workflow']['name']);  ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-primary">
        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tbody>
            <tr>
                <th><?php echo __('Workflow Id'); ?></th>
                <td>
                    <?php echo h($workflow['Workflow']['workflow_id']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Name'); ?></th>
                <td>
                    <?php echo h($workflow['Workflow']['name']); ?>
                    &nbsp;
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <hr/>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Captures'); ?></h3>
            <?php if (!empty($workflow['Capture'])): ?>                 <div class="panel panel-primary">
                    <!-- Default panel contents -->

                    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
                        <thead class="panel-heading">
                        <tr>
                            <th><?php echo __('Capture Id'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                            <th><?php echo __('Lecture'); ?></th>
                            <th><?php echo __('User'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($workflow['Capture'] as $capture): ?>
                            <tr>
                                <td><?php echo $capture['capture_id']; ?></td>
                                <td><?php echo $capture['name']; ?></td>
                                <td><?php echo $capture['status']; ?></td>
                                <td><?php echo $this->Html->link($capture['Lecture']['name'], array('controller' => 'lectures', 'action' => 'view', $capture['Lecture']['lecture_id'])); ?></td>
                                <td><?php echo $this->Html->link($capture['User']['username'], array('controller' => 'users', 'action' => 'view', $capture['User']['user_id'])); ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'captures', 'action' => 'view', $capture['capture_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'captures', 'action' => 'edit', $capture['capture_id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'captures', 'action' => 'delete', $capture['capture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $capture['capture_id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer"></div>
                </div>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
        </div>
        <!-- end col md 12 -->
    </div>

    <hr/>


    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Tasks'); ?></h3>
            <?php if (!empty($workflow['Task'])): ?>                 <div class="panel panel-primary">
                    <!-- Default panel contents -->

                    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
                        <thead class="panel-heading">
                        <tr>
                            <th><?php echo __('Task Id'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Description'); ?></th>
                            <th><?php echo __('Step'); ?></th>
                            <th><?php echo __('Workflow Id'); ?></th>
                            <th class="actions"></th>
                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($workflow['Task'] as $task): ?>
                            <tr>
                                <td><?php echo $task['task_id']; ?></td>
                                <td><?php echo $task['name']; ?></td>
                                <td><?php echo $task['description']; ?></td>
                                <td><?php echo $task['step']; ?></td>
                                <td><?php echo $task['workflow_id']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'tasks', 'action' => 'view', $task['task_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'tasks', 'action' => 'edit', $task['task_id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'tasks', 'action' => 'delete', $task['task_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $task['task_id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer"></div>
                </div>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Workflow'), array('action' => 'edit', $workflow['Workflow']['workflow_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete Workflow') . '</span>', array('action' => 'delete', $workflow['Workflow']['workflow_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $workflow['Workflow']['workflow_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Workflows'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Workflow'), array('action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Captures'), array('controller' => 'captures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('controller' => 'captures', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Tasks'), array('controller' => 'tasks', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false)); ?> </li>
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