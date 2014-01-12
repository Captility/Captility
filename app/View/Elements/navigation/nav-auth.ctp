<?php
/**
 * Project: Captility
 * User: Daniel
 * Date: 03.01.14
 * Time: 16:19
 * Created with JetBrains PhpStorm.
 */
?>

<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"><span
            class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
            class="icon-bar"></span><span class="icon-bar"></span></button>
    <?php echo $this->Html->link("Captility", array('controller' => 'calendars', 'action' => 'dashboard'),
        array('class' => 'navbar-brand')); //ToDo Variable für Titel benutzen ?>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

        <li <? if ($this->params['controller'] == "calendars" && $this->params['action'] == "dashboard") echo 'class="active"';?>>
            <?php echo $this->Html->link(
                $this->Html->tag(
                    'span', '', array('class' => 'glyphicon glyphicon-dashboard')) . __('Dashboard'),
                array('controller' => 'calendars', 'action' => 'dashboard'), array('escape' => false))?>
        </li>
        <li class="divider"></li>

        <li <? if ($this->params['controller'] == "calendars" && $this->params['action'] == "index") echo 'class="active"';?>>
            <?php echo $this->Html->link(
                $this->Html->tag(
                    'span', '', array('class' => 'glyphicon glyphicon-calendar')) . __('Calendar'),
                array('controller' => 'calendars', 'action' => 'index'), array('escape' => false))?>
        </li>

        <li class="divider"></li>

        <li class="dropdown <? if (in_array($this->params['controller'], array('captures', 'lectures', 'hosts', 'eventTypes'))) echo 'active'; ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Records') ?><strong
                    class="caret"></strong></a>
            <ul class="dropdown-menu">

                <li role="presentation"
                    class="dropdown-header list-info"><?php echo __('Edit catalog entries...') ?></li>

                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-user')) . __('Hosts'),
                        array('controller' => 'hosts', 'action' => 'index'), array('escape' => false))?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-th-list')) . __('Lectures'),
                        array('controller' => 'lectures', 'action' => 'index'), array('escape' => false))?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-film')) . __('Captures'),
                        array('controller' => 'captures', 'action' => 'index'), array('escape' => false))?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-tint')) . __('Event Types'),
                        array('controller' => 'event_types', 'action' => 'index'), array('escape' => false))?>
                </li>
            </ul>
        </li>

        <li class="dropdown <? if (in_array($this->params['controller'], array('tasks', 'workflows', 'tickets'))) echo 'active'; ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Team') ?><strong
                    class="caret"></strong></a>
            <ul class="dropdown-menu">
                <li role="presentation" class="dropdown-header list-info"><?php echo __('Manage duties...') ?>.</li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-calendar')) . __('Calendar'),
                        array('controller' => 'calendars', 'action' => 'index'), array('escape' => false))?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-tasks')) . __('Tickets'),
                        array('controller' => 'tickets', 'action' => 'index'), array('escape' => false))?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-tags')) . __('Tasks'),
                        array('controller' => 'tasks', 'action' => 'index'), array('escape' => false))?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-transfer')) . __('Workflows'),
                        array('controller' => 'workflows', 'action' => 'index'), array('escape' => false))?>
                </li>
                <li class="divider"></li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-user')) . __('Users'),
                        array('controller' => 'users', 'action' => 'index'), array('escape' => false))?>
                </li>
            </ul>
        </li>

    </ul>

    <form class="navbar-form navbar-right navbar-search" role="search">
        <div class="form-group">
            <input type="text" class="form-control btn-inverse">
        </div>
        <button type="submit" class="btn btn-inverse navbar-btn-search"><?php echo __('Search') ?></button>
    </form>

    <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle"
               data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.username') . ' '; ?>
                <strong
                    class="caret"></strong></a>
            <ul class="dropdown-menu">
                <li role="presentation" class="dropdown-header list-info"><?php echo __('Edit account') ?></li>
                <li class="disabled">
                    <a href="#"><?php echo __('Edit your profile') ?></a>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Change Password'), array('controller' => 'users', 'action' => 'changePassword')); ?>
                </li>
                <li class="disabled">
                    <a href="#"><?php echo __('Messages') ?></a>
                </li>
                <li class="divider">
                </li>
                <li class="disabled">
                    <a href="#"><?php echo __('Admin Center') ?></a>
                </li>
                <li class="disabled">
                    <?php echo $this->Html->link("Full Calendar", array('controller' => 'full_calendar', 'action' => 'index')); ?>
                </li>
                <li class="divider">
                </li>
                <li>
                    <?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?>
                </li>
            </ul>
        </li>
        <li>
            <?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?>
        </li>

    </ul>
</div>