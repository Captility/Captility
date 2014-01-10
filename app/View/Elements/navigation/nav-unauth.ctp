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
    <?php echo $this->Html->link("Captility", array('controller' => 'pages', 'action' => 'home'),
        array('class' => 'navbar-brand')); //ToDo Variable für Titel benutzen ?>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

        <li <? if (!in_array($this->params['controller'], array('users', 'calendars'))) echo 'class="active"';?>>
            <?php echo $this->Html->link(__('Start'), array('controller' => 'pages', 'action' => 'home')); ?>
        </li>

        <li>
            <?php echo $this->Html->link(__("Get your own Captility!"), '//captility.de'); ?>
        </li>
    </ul>

    <form class="navbar-form navbar-right navbar-search" role="search">
        <div class="form-group">
            <input type="text" class="form-control btn-inverse">
        </div>
        <button type="submit" class="btn btn-inverse navbar-btn-search"><?php echo __('Search')?></button>
    </form>

    <ul class="nav navbar-nav navbar-right">

            <li <? if ($this->params['controller'] == "users" && $this->params['action'] == "register") echo 'class="active"';?>>
                <?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'register')); ?>
            </li>
            <li <? if ($this->params['controller'] == "users" && $this->params['action'] == "login") echo 'class="active"';?>>
                <?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')); ?>
            </li>
    </ul>
</div>