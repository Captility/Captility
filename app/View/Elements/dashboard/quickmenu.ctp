<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<div class="quickmenu">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon el-icon-bookmark-empty"></span>&nbsp;<? echo __('Overview') ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-xs-12  col-sm-6 col-md-6 col-lg-4">
                                <a href="<? echo Router::url('/', true) . 'dashboard' ?>" class="btn btn-danger btn-lg"
                                   role="button"><span class="glyphicon glyphicon-dashboard"></span>
                                    <br/><? echo __('Dashboard')?>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'calendar' ?>" class="btn btn-primary btn-lg"
                                   role="button">
                                    <span class="glyphicon glyphicon-calendar"></span> <br/><? echo __('Calendar')?>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'dashboard#myTickets' ?>"
                                   class="btn btn-warning btn-lg" role="button"><span
                                        class="glyphicon glyphicon-tasks"></span> <br/><? echo __('Tasks')?></a>
                                <a href="<? echo Router::url('/', true) . 'dashboard#statusList' ?>"
                                   class="btn btn-success btn-lg" role="button"><span
                                        class="glyphicon glyphicon-ok"></span> <br/> <? echo __('Status')?></a>
                            </div>


                            <div class="col-xs-12  col-sm-6 col-md-6 col-lg-4">
                                <a href="<? echo Router::url('/', true) . 'lectures' ?>" class="btn btn-misc btn-lg"
                                   role="button">
                                    <span class="glyphicon glyphicon-th-list"></span> <br/>
                                    <small><? echo __('Lectures')?></small>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'hosts' ?>" class="btn btn-info btn-lg"
                                   role="button">
                                    <span class="glyphicon cp-icon-lecturer-inverse"></span> <br/><? echo __('Host')?>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'captures' ?>" class="btn btn-danger btn-lg"
                                   role="button">
                                    <span class="glyphicon glyphicon-film"></span> <br/>
                                    <small><? echo __('Captures')?></small>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'event_types' ?>"
                                   class="btn btn-primary btn-lg" role="button">
                                    <span class="glyphicon glyphicon-facetime-video"></span> <br/>
                                    <small><? echo __('Event Types')?></small>
                                </a>
                            </div>
                            <div class="col-xs-12  hidden-sm hidden-md col-lg-4">
                                <a href="<? echo Router::url('/', true) . 'workflows' ?>" class="btn btn-misc btn-lg"
                                   role="button">
                                    <span class="glyphicon el-icon-random"></span> <br/><? echo __('Workflows')?>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'tickets' ?>" class="btn btn-warning btn-lg"
                                   role="button">
                                    <span class="glyphicon glyphicon-tags"></span> <br/><? echo __('Tickets')?>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'stats' ?>" class="btn btn-success btn-lg"
                                   role="button">
                                    <span class="glyphicon glyphicon-stats"></span> <br/><? echo __('Statistics')?>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'users' ?>" class="btn btn-info btn-lg"
                                   role="button">
                                    <span class="glyphicon el-icon-group"></span> <br/><? echo __('Users')?>
                                </a>
                            </div>
                            <div class="hidden-xs col-sm-6 col-md-6 hidden-lg">
                                <a href="<? echo Router::url('/', true) . 'workflows' ?>" class="btn btn-misc btn-lg"
                                   role="button">
                                    <span class="glyphicon el-icon-random"></span> <br/><? echo __('Workflows')?>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'tickets' ?>" class="btn btn-warning btn-lg"
                                   role="button">
                                    <span class="glyphicon glyphicon-tags"></span> <br/><? echo __('Tickets')?>
                                </a>
                            </div>
                            <div class="hidden-xs col-sm-6 col-md-6 hidden-lg">
                                <a href="<? echo Router::url('/', true) . 'stats' ?>" class="btn btn-success btn-lg"
                                   role="button">
                                    <span class="glyphicon glyphicon-stats"></span> <br/><? echo __('Statistics')?>
                                </a>
                                <a href="<? echo Router::url('/', true) . 'users' ?>" class="btn btn-info btn-lg"
                                   role="button">
                                    <span class="glyphicon el-icon-group"></span> <br/><? echo __('Users')?>
                                </a>
                            </div>
                        </div>
                        <a href="http://www.captility.de" class="btn btn-info btn-lg btn-block"
                           role="button"><span
                                class="glyphicon glyphicon-globe"></span>&nbsp;<? echo __('Captility Homepage')?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>