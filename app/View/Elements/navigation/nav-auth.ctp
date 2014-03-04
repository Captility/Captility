<?
/**
 * Project: Captility
 * User: Daniel
 * Date: 03.01.14
 * Time: 16:19
 */
?>

<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"><span
            class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
            class="icon-bar"></span><span class="icon-bar"></span></button>
    <div class="captility-logo-nav"></div>
    <?php echo $this->Html->link("Captility", $this->Html->url('/', true),
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
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Records') ?>
                <strong
                    class="caret"></strong></a>
            <ul class="dropdown-menu">

                <!--<li role="presentation"
                    class="dropdown-header list-info"><?php /*echo __('Edit catalog entries...') */?></li>-->

                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon el-icon-bookmark-empty')) . __('Overview'),
                        array('controller' => 'calendars', 'action' => 'production'), array('escape' => false))?>
                </li>
                <li class="divider"></li>


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
                            'span', '', array('class' => 'glyphicon cp-icon-lecturer')) . __('Hosts'),
                        array('controller' => 'hosts', 'action' => 'index'), array('escape' => false))?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-facetime-video')) . __('Event Types'),
                        array('controller' => 'event_types', 'action' => 'index'), array('escape' => false))?>
                </li>
            </ul>
        </li>

        <li class="dropdown <? if (in_array($this->params['controller'], array('tasks', 'workflows', 'tickets'))) echo 'active'; ?>">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Team') ?><strong
                    class="caret"></strong></a>
            <ul class="dropdown-menu">

                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon el-icon-bookmark-empty')) . __('Overview'),
                        array('controller' => 'calendars', 'action' => 'production'), array('escape' => false))?>
                </li>
                <li class="divider"></li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon el-icon-random')) . __('Workflows'),
                        array('controller' => 'workflows', 'action' => 'index'), array('escape' => false))?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-tasks')) . __('Tickets'),
                        array('controller' => 'tickets', 'action' => 'index'), array('escape' => false))?>
                </li>
                <?/*<li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-tags')) . __('Tasks'),
                        array('controller' => 'tasks', 'action' => 'index'), array('escape' => false))?>
                    </li>*/?>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-stats')) . __('Statistics'),
                        array('controller' => 'calendars', 'action' => 'stats'), array('escape' => false))?>
                </li>
                <li class="divider"></li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon glyphicon-user')) . __('Users'),
                        array('controller' => 'users', 'action' => 'index'), array('escape' => false))?>
                </li>
                <?php if ($this->Session->read('Auth.User.group_id') == 1 || $this->Session->read('Auth.User.group_id') == 2): ?>
                    <li>
                        <?php echo $this->Html->link(
                            $this->Html->tag(
                                'span', '', array('class' => 'glyphicon el-icon-group')) . __('Groups'),
                            array('controller' => 'groups', 'action' => 'index'), array('escape' => false))?>
                    </li>
                <? endif; ?>
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
            <a href="javascript:void(0)" class="dropdown-toggle"
               data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.username') . ' '; ?>
                <strong
                    class="caret"></strong></a>
            <ul class="dropdown-menu">
                <li role="presentation" class="dropdown-header list-info"><?php echo __('Edit account') ?></li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon el-icon-address-book-alt')) . __('My Profile'),
                        array('controller' => 'users', 'action' => 'view/' . $this->Session->read('Auth.User.user_id')), array('escape' => false))?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon el-icon-unlock-alt')) . __('Change Password'),
                        array('controller' => 'users', 'action' => 'changePassword'), array('escape' => false))?>
                </li>
                <li class="disabled">
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon el-icon-envelope-alt')) . __('Messages'),
                        array('controller' => 'users', 'action' => 'messages'), array('escape' => false))?>
                </li>
                <li class="divider">
                </li>
                <?php if ($this->Session->read('Auth.User.group_id') == 1): ?>
                <li class="disabled">
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon el-icon-wrench-alt')) . __('Admin-Center'),
                        array('controller' => 'admin', 'action' => 'admin'), array('escape' => false))?>
                </li>
                <li class="divider">
                    <? endif; ?>
                </li>
                <li>
                    <?php echo $this->Html->link(
                        $this->Html->tag(
                            'span', '', array('class' => 'glyphicon el-icon-remove-sign')) . __('Logout'),
                        array('controller' => 'users', 'action' => 'logout'), array('escape' => false))?>
                </li>
            </ul>
        </li>
        <li>
            <?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?>
        </li>

    </ul>
</div>