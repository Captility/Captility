<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-myspace"></span>' . __('User Registry'), '/admin_center'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-group"></span>' . __('Groups'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb(h($group['Group']['name']), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-group"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo h($group['Group']['name']); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <div class="panel panel-default badger-right badger-default"
         data-badger="<? echo __('Group') . ' #' . h($group['Group']['group_id']); ?>">

        <table cellpadding="0" cellspacing="0" class="table table-striped">
            <tbody>
            <!--<tr>
                <th><?php /*echo __('Group Id'); */?></th>
                <td>
                    <?php /*echo h($group['Group']['group_id']); */?>
                    &nbsp;
                </td>
            </tr>-->
            <tr>
                <th><?php echo __('Name'); ?></th>
                <td><span class="glyphicon el-icon-group"></span>
                    <?php echo h($group['Group']['name']); ?>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th><?php echo __('Created'); ?></th>
                <td>
                    <?php if (!empty($group['Group']['created'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Html->link( // <a>

                            $this->Time->nice(strtotime(h($group['Group']['created'])), 'CET', '%A, %d.%m.%Y'), // Date
                            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($group['Group']['created']))), // Calendar-Link
                            array('escape' => false)) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($group['Group']['created'])), 'CET', '%H:%M')                       // Time
                    ?>
                </td>
            </tr>
            <tr>
                <th><?php echo __('Modified'); ?></th>
                <td>
                    <?php if (!empty($group['Group']['modified'])) echo

                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                        $this->Html->link( // <a>

                            $this->Time->nice(strtotime(h($group['Group']['modified'])), 'CET', '%A, %d.%m.%Y'), // Date
                            '/calendar?date=' . date('D M d Y H:i:s O', strtotime(h($group['Group']['modified']))), // Calendar-Link
                            array('escape' => false)) .
                        '&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span>' . // Time Icon
                        $this->Time->nice(strtotime(h($group['Group']['modified'])), 'CET', '%H:%M')                       // Time
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <hr/>

    <div class="related row">
        <div class="col-md-12">
            <h3><?php echo __('Related Users'); ?></h3>
            <?php if (!empty($group['User'])): ?>
                <div class="panel panel-primary">
                    <!-- Default panel contents -->

                    <table cellpadding="0" cellspacing="0" class="table table-striped table-responsive table-hover">
                        <thead class="panel-heading">
                        <tr>

                            <th><?php echo __('Username'); ?></th>
                            <th><?php echo __('Email'); ?></th>
                            <th><?php echo __('Group'); ?></th>
                            <th><?php echo __('Created'); ?></th>
                            <th><?php echo __('Modified'); ?></th>
                            <th><?php echo '<span class="glyphicon el-icon-rss"></span>'; ?></th>
                            <th class="actions"></th>

                        </tr>
                        <thead>
                        <tbody>
                        <?php foreach ($group['User'] as $user): ?>
                            <tr onclick="document.location = '<? echo Router::url(array('controller' => 'users', 'action' => 'view', $user['user_id'])); ?>';">

                                <td style="white-space: nowrap;"><p>
                                        <?php echo $this->Html->link($this->Gravatar->identicon($user['email']), array('controller' => 'users', 'action' => 'view', $user['user_id']), array('escape' => false)); ?>
                                        <?php echo $user['username']; ?>
                                    </p>
                                <td>
                                    <?php echo $this->Html->link(
                                        $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-envelope')),
                                        'mailto:' . h($user['email']), array('full_base' => true, 'escape' => false));
                                    ?>
                                </td>


                                <td><? echo '<span class="glyphicon el-icon-group"></span>'; ?>
                                    <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['group_id'])); ?>
                                </td>

                                <td>
                                    <?php if (!empty($user['created'])) echo

                                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                                        $this->Captility->linkDate($user['created'])
                                    ?>
                                </td>
                                <td>
                                    <?php if (!empty($user['modified'])) echo

                                        '<span class="glyphicon glyphicon-calendar"></span>' . // Calendar Icon
                                        $this->Captility->linkDate($user['modified'])
                                    ?>
                                </td>

                                <td><?php if (h($user['notification'] <= 0)): echo '<span class="glyphicon glyphicon-ban-circle"></span>'; ?>
                                    <?php else: echo '<span class="glyphicon glyphicon-ok"></span>'; ?><?php endif; ?>
                                </td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('controller' => 'users', 'action' => 'view', $user['user_id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>', array('controller' => 'users', 'action' => 'edit', $user['user_id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', array('controller' => 'users', 'action' => 'delete', $user['user_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['user_id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="panel-footer"></div>
                </div>
            <?php endif; ?>

            <div class="actions">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary pull-right')); ?>                </div>
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
                    <li><?php echo $this->Html->link('<span class="glyphicon el-icon-pencil"></span>' . __('Edit Group'), array('action' => 'edit', $group['Group']['group_id']), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>' . '<span class="remove-text">' . __('Delete') . '</span>', array('action' => 'delete', $group['Group']['group_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $group['Group']['group_id'])); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Groups'), array('action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New Group'), array('action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
            <!-- end body -->
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-user"></span><?php echo __('Users');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>' . __('List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>' . __('New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
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