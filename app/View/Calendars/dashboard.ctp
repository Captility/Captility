<? $this->Html->addCrumb(__('Production'), '#'); ?>
<? $this->Html->addCrumb($headline, '/dashboard', array('class' => 'active')); ?>

<div class="col-md-1 column">
    <!-- Element::LeftTabs -->

    <div class="clearfix">
        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#a" id="GeneralViewFc" data-toggle="tab"><span class="glyphicon glyphicon-dashboard glyphicon-leftTabs"></span><?php echo __('Week') ?></a></li>
                <li class=><a href="#a" id="MyWeekViewFc" data-toggle="tab"><span class="glyphicon glyphicon-calendar glyphicon-leftTabs"></span><?php echo __('Mine') ?></a></li>
                <li><a href="#b" data-toggle="tab"><span class="glyphicon glyphicon-tasks glyphicon-leftTabs"></span><?php echo __('Tickets') ?></a></li>
                <li><a href="#c" data-toggle="tab"><span class="glyphicon glyphicon-upload glyphicon-leftTabs"></span><?php echo __('Online') ?></a></li>
            </ul>
        </div>
    </div>

    <!-- End::LeftTabs -->
</div>

<div class="col-md-8 column content-pane">
    <?php echo $this->Session->flash(); ?>

    <div class="tab-content">
        <div class="tab-pane active" id="a">
            <? // Tab Content #a ?>
            <div class="Calendar index">
                <div id="calendar"></div>
            </div>
        </div>



        <div class="tab-pane" id="b">
            <?php echo $this->Element('tabContentDummy');?>
            <? // Tab Content #b ?>
        </div>


        <? // Tab Content #c ?>

        <div class="tab-pane" id="c">
            <?php echo $this->Element('tabContentDummy2');?>
        </div>
    </div>
</div>