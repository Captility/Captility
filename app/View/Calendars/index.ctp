<div class="col-md-1 column">
    <!-- Element::LeftTabs -->

    <div class="row clearfix">
        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                <li><a href="#a" data-toggle="tab">Dummy</a></li>
                <li class="active"><a href="#b" data-toggle="tab">Woche</a></li>
                <li><a href="#c" data-toggle="tab">Übersicht</a></li>
            </ul>
        </div>
    </div>

    <!-- End::LeftTabs -->
</div>

<div class="col-md-8 column content-pane">
    <?php echo $this->Session->flash(); ?>


    <div class="tab-content">

        <? // Tab Content #a ?>
        <?php echo $this->Element('tabContentDummy');?>
    </div>


    <? // Tab Content #b ?>

    <div class="tab-pane active" id="b">
        <div class="Calendar index">
            <div id="calendar"></div>
        </div>
    </div>


    <? // Tab Content #c ?>

    <div class="tab-pane" id="c">

    </div>
</div>