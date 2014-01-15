<!-- Element:: SideTickets-->

<?php if ($this->Session->read('Auth.User')): ?>

<div class="sideTickets panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-tasks"></span><?php echo __('New Tickets')?>
        </h3>
    </div>
    <div class="panel-body" id="accordion">


        <div class="panel panel-info">
            <div class="panel-heading side-ticket-heading">
                <div class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <small class="glyphicon glyphicon-warning-sign"></small><small>Veröffentlichung #250032</small>
                    </a>
                </div>
            </div>
            <div id="collapseOne" class="panel-collapse collapse <!--in-->">
                <div class="panel-body">
                    <small>Veröffentlichen von Aufzeichnung 54321 am 08.01.2014</small><br/>
                    <small>Zuständig: Daniel</small>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading side-ticket-heading">
                <div class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <small class="glyphicon glyphicon-flash"></small><small>Postproduktion #298030</small>
                    </a>
                </div>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <small>Veröffentlichen von Aufzeichnung 54321 am 08.01.2014</small><br/>
                    <small>Zuständig: Daniel</small>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading side-ticket-heading">
                <div class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <small class="glyphicon glyphicon-tags"></small><small>Aufnahme einstellen #602590</small>
                    </a>
                </div>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <small>Veröffentlichen von Aufzeichnung 54321 am 08.01.2014</small><br/>
                    <small>Zuständig: Daniel</small>
                </div>
            </div>
        </div>


    </div>

</div>

<?php endif; ?>
<!-- End:: SideTickets-->