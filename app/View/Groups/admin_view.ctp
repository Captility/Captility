
<? $this->Html->addCrumb(__('Group'), '#', array('class' => 'active')); ?>
<!--<div class=" view">-->
<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Group'); ?></h1>
        </div>
    </div>
</div>

<!--<div class="row">-->


<div class="col-md-1 column">
</div>
<div class="col-md-8 column actions-column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <table cellpadding="0" cellspacing="0" class="table table-striped">
        <tbody>
        <tr>
		<th><?php echo __('Group Id'); ?></th>
		<td>
			<?php echo h($group['Group']['group_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</td>
</tr>
        </tbody>
    </table>

            <div class="related row">
            <div class="col-md-12">
                <h3><?php echo __('Related Users'); ?></h3>
                <?php if (!empty($group['User'])): ?>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Language'); ?></th>
		<th><?php echo __('Avatar'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Notification'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    <thead>
                    <tbody>
                    	<?php foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['user_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['language']; ?></td>
			<td><?php echo $user['avatar']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['notification']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'users', 'action' => 'view', $user['user_id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'users', 'action' => 'edit', $user['user_id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'users', 'action' => 'delete', $user['user_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['user_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>

                <div class="actions">
                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-primary')); ?>                </div>
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
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Group'), array('action' => 'edit', $group['Group']['group_id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Group'), array('action' => 'delete', $group['Group']['group_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $group['Group']['group_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Groups'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Group'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
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