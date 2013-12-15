<div class="col-md-1 column">
    <!-- Element::LeftTabs -->

    <div class="row clearfix">
        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#a" data-toggle="tab">Eigene</a></li>
                <li><a href="#b" data-toggle="tab">Gesamt</a></li>
                <li><a href="#c" data-toggle="tab">Übersicht</a></li>
            </ul>
        </div>
    </div>

    <!-- End::LeftTabs -->
</div>

<div class="col-md-8 column content-pane">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->Element('tabContentDummy');?>
</div>‚