<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-film"></span>' . __('Captures'), '#', array('class' => 'active')); ?>
<!--<div class=" index">-->

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-film"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Captures'); ?></h1>
        </div>
    </div>
    <!-- end col md 12 -->
</div><!-- end row -->


<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-primary" id="Pagination">
        <!-- Default panel contents -->

        <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive">
            <thead class="panel-heading">
            <tr>
                <th><?php echo $this->Paginator->sort('capture_id', __('Capture Id')); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('status'); ?></th>
                <th><?php echo $this->Paginator->sort('lecture_id'); ?></th>
                <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                <th><?php echo $this->Paginator->sort('workflow_id'); ?></th>
                <th class="actions"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($captures as $capture): ?>
                <tr>
                    <td><?php echo h($capture['Capture']['capture_id']); ?>&nbsp;</td>
                    <td><?php echo h($capture['Capture']['name']); ?>&nbsp;</td>

                    <td class="labels"><?php $statuses = Configure::read('CAPTURE.STATUSES');
                        $class = $statuses[$capture['Capture']['status']]; ?>

                        <span
                            class="label label-<? echo $class ?>"><? echo __(h($capture['Capture']['status'])) ?></span>
                    </td>

                    <td>
                        <?php echo $this->Html->link($capture['Lecture']['name'], array('controller' => 'lectures', 'action' => 'view', $capture['Lecture']['lecture_id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($capture['User']['username'], array('controller' => 'users', 'action' => 'view', $capture['User']['user_id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($capture['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $capture['Workflow']['workflow_id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $capture['Capture']['capture_id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('action' => 'edit', $capture['Capture']['capture_id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('action' => 'delete', $capture['Capture']['capture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $capture['Capture']['capture_id'])); ?>
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



    <div class="clearfix">

        <div class="info-banner info-banner-info" id="Infobanner">


            <h4 data-toggle="collapse" data-parent="#Infobanner" href="#Collabse-info-banner">
                <small class="glyphicon el-icon-info-sign"></small>
                Plan regelmäßiger Aufzeichnungen
            </h4>


            <div id="Collabse-info-banner" class="panel-collapse collapse <!--in-->">

                <hr/>
                <p>Aufnahmen, Aufzeichnungs-Typen, Aufnahme-Pläne, Aufnahme-Salat.. man ist das verwirrend.</p>

                Eine <strong>AufnahmeReihe</strong> bezeichnet eine Folge von einzelnen Terminen, an denen Aufgezeichnet
                werden soll. Diese kann also Einzelaufzeichnungen, als auch regelmäßige Termine bezeichnen.<br/>
                Charakteristisch für eine Reihe von Aufzeichnungen ist ein gemeinsamer Typ der Aufzeichnung, wie eine
                Manuelle Aufnahme, oder eine Automatische Aufnahme.</p>

            </div>
        </div>
    </div>

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
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Capture'), array('action' => 'add'), array('escape' => false)); ?></li>
                </ul>
            </div>
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-list"></span><?php echo __('Lectures');?>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <div class="panel-heading">
                <div><span class="glyphicon el-icon-random"></span><?php echo __('Workflows');?></div>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Workflows'), array('controller' => 'workflows', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Workflow'), array('controller' => 'workflows', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end actions -->

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div>
<!-- end col md 3 -->

<!--</div>--><!-- end row -->


<!--</div>--><!-- end containing of content -->
