<? $this->Breadcrumbs->addCrumb(__('Team'), '/pages/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-random"></span>' . __('Workflows'), '#', array('class' => 'active')); ?>

<!--<div class=" index">-->

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-random"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Workflows'); ?></h1>
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
                <th><?php echo $this->Paginator->sort('workflow_id', __('ID')); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>


            <?// SORT TASKS TO SHOW IN RIGHT ORDER

            // DECLARATION
            function sortByStep($a, $b) {

                return $a['step'] - $b['step'];
            }?>

            <?php foreach ($workflows as $workflow): ?>
                <tr>
                    <td><?php echo h($workflow['Workflow']['workflow_id']); ?></td>
                    <td><?php echo h($workflow['Workflow']['name']); ?></br>


                        <?php if (!empty($workflow['Task'])): ?>

                            <? // SORT TASKS TO SHOW IN RIGHT ORDER

                            // SORT
                            if (!empty($workflow['Task'])) {

                                usort($workflow['Task'], 'sortByStep');
                            }
                            ?>

                            <small class="text-muted task-description">

                                <small class="glyphicon glyphicon-tags"></small>

                                <?php foreach ($workflow['Task'] as $task): ?>

                                    <? echo $task['name'] . ',&nbsp;' ?>

                                <? endforeach ?>
                            </small>

                        <? endif; ?>

                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $workflow['Workflow']['workflow_id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('action' => 'edit', $workflow['Workflow']['workflow_id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $workflow['Workflow']['workflow_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $workflow['Workflow']['workflow_id'])); ?>
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
            echo $this->Paginator->prev('← ' . __('Previous'), array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
            echo $this->Paginator->next(__('Next') . ' →', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next →</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
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
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Workflow'), array('action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </div>
            <!-- end body -->
            <div class="panel-heading">
                <span class="glyphicon glyphicon-film"></span><?php echo __('Captures');?>
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

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->

<!--</div>--><!-- end row -->


<!--</div>--><!-- end containing of content -->