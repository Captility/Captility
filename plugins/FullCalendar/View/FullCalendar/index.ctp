<?php
/*
 * View/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<script type="text/javascript">
    plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "full_calendar";
</script>
<?php
//echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); // ToDo Add local jQuery
echo $this->Html->script(array(
    //'/js/jquery/jquery-1.7.1.min',
    //'/full_calendar/js/jquery-1.5.min',
    //'/full_calendar/js/jquery-ui-1.10.3.custom.min',
    //'/full_calendar/js/fullcalendar.min',
    //'/full_calendar/js/jquery.qtip-1.0.0-rc3.min',
    //'/js/captility.min'
), array('inline' => 'false'));


//echo $this->Html->css('/full_calendar/css/fullcalendar');
?>


<div class="Calendar index">
    <div id="calendar"></div>
</div>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('New Event', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Manage Events', true), array('plugin' => 'full_calendar', 'controller' => 'events')); ?></li>
        <li><?php echo $this->Html->link(__('Manage Events Types', true), array('plugin' => 'full_calendar', 'controller' => 'event_types')); ?></li>
    </ul>
</div>
