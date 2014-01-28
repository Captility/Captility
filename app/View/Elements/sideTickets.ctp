<!-- Element:: SideTickets-->

<?php if ($this->Session->read('Auth.User')): ?>

    <div class="sideTickets panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-tasks"></span><?php echo __('New Tickets')?>
            </h3>
        </div>

        <div class="panel-body" id="accordion">


            <div class="sideTicket badger-left badger-primary" data-badger="Ticket #42561 " data-toggle="collapse"
                 data-parent="#accordion" href="#collapse0">


                <div class="ticket-icon">
                    <span class="glyphicon glyphicon-tags"></span>
                </div>

                <div class="ticket-actions actions">
                    <a><span class="glyphicon glyphicon-remove pull-right"></span></a>
                    <a><span class="glyphicon glyphicon-ok pull-right"></span></a>
                    <a><span class="glyphicon el-icon-pencil pull-right"></span></a>
                    <a><span class="glyphicon glyphicon-search pull-right"></span></a>

                </div>

                <div class="ticket-body">

                    <strong>Aufnahme vom 19.01.2014 sichern</strong>


                    <div id="collapse0" class="panel-collapse collapse <!--in-->">

                        <div class="pull-left"><span class="glyphicon glyphicon-calendar"></span>Fr, 31.01.14</div>
                        <div class="pull-right"><span class="glyphicon glyphicon-user"></span><a href="users/view/1">Daniel</a></div>

                        <div class="clearfix"></div>
                        <div class=""><span class="glyphicon glyphicon-th-list"></span><a href="lectures/view/1">654321
                                Einführung
                                in die CakePhp Entwicklung</a><a href="http://www.danieldeppe.de"> <span
                                    class="glyphicon glyphicon-link gl-ms"></span></a></div>
                    </div>
                </div>

            </div>


            <div class="sideTicket badger-left badger-danger" data-badger="Ticket #42561 " data-toggle="collapse"
                 data-parent="#accordion" href="#collapse1">


                <div class="ticket-icon">
                    <span class="glyphicon glyphicon-tags"></span>
                </div>

                <div class="ticket-actions actions">
                    <a><span class="glyphicon glyphicon-remove pull-right"></span></a>
                    <a><span class="glyphicon glyphicon-ok pull-right"></span></a>
                    <a><span class="glyphicon el-icon-pencil pull-right"></span></a>
                    <a><span class="glyphicon glyphicon-search pull-right"></span></a>

                </div>

                <div class="ticket-body">

                    <strong>Aufnahme vom 19.01.2014 sichern</strong>


                    <div id="collapse1" class="panel-collapse collapse <!--in-->">

                        <div class="pull-left"><span class="glyphicon glyphicon-calendar"></span>Fr, 31.01.14</div>
                        <div class="pull-right"><span class="glyphicon glyphicon-user"></span><a href="users/view/1">Daniel</a></div>

                        <div class="clearfix"></div>
                        <div class=""><span class="glyphicon glyphicon-th-list"></span><a href="lectures/view/1">654321
                                Einführung
                                in die CakePhp Entwicklung</a><a href="http://www.danieldeppe.de"> <span
                                    class="glyphicon glyphicon-link gl-ms"></span></a></div>
                    </div>
                </div>

            </div>

            <div class="sideTicket badger-left badger-warning" data-badger="Ticket #42561 " data-toggle="collapse"
                 data-parent="#accordion" href="#collapse2">


                <div class="ticket-icon">
                    <span class="glyphicon glyphicon-tags"></span>
                </div>

                <div class="ticket-actions actions">
                    <a><span class="glyphicon glyphicon-remove pull-right"></span></a>
                    <a><span class="glyphicon glyphicon-ok pull-right"></span></a>
                    <a><span class="glyphicon el-icon-pencil pull-right"></span></a>
                    <a><span class="glyphicon glyphicon-search pull-right"></span></a>

                </div>

                <div class="ticket-body">

                    <strong>Aufnahme vom 19.01.2014 sichern</strong>


                    <div id="collapse2" class="panel-collapse collapse <!--in-->">

                        <div class="pull-left"><span class="glyphicon glyphicon-calendar"></span>Fr, 31.01.14</div>
                        <div class="pull-right"><span class="glyphicon glyphicon-user"></span><a href="users/view/1">Daniel</a></div>

                        <div class="clearfix"></div>
                        <div class=""><span class="glyphicon glyphicon-th-list"></span><a href="lectures/view/1">654321
                                Einführung
                                in die CakePhp Entwicklung</a><a href="http://www.danieldeppe.de"> <span
                                    class="glyphicon glyphicon-link gl-ms"></span></a></div>
                    </div>
                </div>

            </div>


        </div>

    </div>

<?php endif; ?>
<!-- End:: SideTickets-->