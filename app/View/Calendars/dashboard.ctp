<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb(__('Production'), '/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-dashboard"></span>' . __('Dashboard'), '/dashboard', array('class' => 'active')); ?>


<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-xs hidden-sm"><span class="glyphicon cp-icon-logo"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Dashboard – Week Overview') ?></h1>
        </div>
    </div>
</div>

<div class="col-md-1 column sideTabs">
    <!-- Element::LeftTabs -->

    <div class="clearfix">
        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#week" id="GeneralViewFc" data-toggle="tab"><span
                            class="glyphicon glyphicon-dashboard glyphicon-leftTabs"></span><?php echo __('Week') ?></a>
                </li>
                <li class=><a href="#week" id="MyWeekViewFc" data-toggle="tab"><span
                            class="glyphicon glyphicon-calendar glyphicon-leftTabs"></span><?php echo __('Mine') ?></a>
                </li>
                <li><a href="#tickets" id="TicketsView" data-toggle="tab"><span
                            class="glyphicon glyphicon-dashboard glyphicon-leftTabs"></span><?php echo __('Tickets') ?>
                    </a>
                </li>
                <li><a href="#myTickets" id="MyTicketsView" data-toggle="tab"><span
                            class="glyphicon glyphicon-tasks glyphicon-leftTabs"></span><?php echo __('Mine') ?></a>
                </li>
                <li><a href="#statusList" id="StatusList" data-toggle="tab"><span
                            class="glyphicon glyphicon-upload glyphicon-leftTabs"></span><?php echo __('Status') ?></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- End::LeftTabs -->
</div>

<div class="col-md-8 column content-pane">
    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>

    <div class="tab-content">
        <div class="tab-pane active" id="week">
            <? // Tab Content #a ?>
            <div class="Calendar index">
                <div id="calendar"></div>
            </div>
        </div>


        <div class="tab-pane" id="tickets">

            <?php //echo $this->Element('tabContentDummy');?>

            <?php echo $this->Element('dashboard/week_header', array('week_start' => $week_start, 'week_end' => $week_end)); ?>

            <div class="ticketContainer">

                <?// AJAX CONTENT ?>

            </div>
        </div>


        <div class="tab-pane" id="myTickets">


            <?php echo $this->Element('dashboard/week_header', array('week_start' => $week_start, 'week_end' => $week_end)); ?>

            <div class="myTicketContainer">

                <?// AJAX CONTENT ?>

            </div>
        </div>

        <div class="tab-pane" id="statusList">
            <?php /*echo $this->Element('tabContentDummy2');*/?>

            <?php echo $this->Element('dashboard/week_header', array('week_start' => $week_start, 'week_end' => $week_end)); ?>

            <div class="statusListContainer">

                <?// AJAX CONTENT ?>

            </div>

        </div>
    </div>

</div>

<div class="col-md-3 column">

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>
    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>

</div><!-- end col md 3 -->