<? $this->Breadcrumbs->addCrumb(__('Production'), '/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-stats"></span>' . __('Statistics'), '/stats', array('class' => 'active')); ?>

<script src="<? Router::url('/', true) ?>js/chart.min.js"></script>

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon glyphicon-stats"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Statistics'); ?></h1>
        </div>
    </div>
</div>


<?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>


<div class="col-md-1 column sideTabs">
    <!-- Element::LeftTabs -->

    <div class="clearfix">
        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                <li><a href="#statsTickets" id="statsTicketsView" data-toggle="tab"><span
                            class="glyphicon glyphicon-tag glyphicon-leftTabs"></span><?php echo __('Tickets') ?>
                    </a>
                </li>
                <li class="active"><a href="#statsWeek" id="statsWeekView" data-toggle="tab"><span
                            class="glyphicon glyphicon-calendar glyphicon-leftTabs"></span><?php echo __('Week') ?>
                    </a>
                </li>
                <li><a href="#statsMonth" id="statsMonthView" glyphicon-leftTabs" data-toggle="tab"><span
                        class="glyphicon glyphicon-calendar glyphicon-leftTabs"></span><?php echo __('Month') ?>
                    </a>
                </li>
                <li><a href="#statsYear" id="statsYearView" data-toggle="tab"><span
                            class="glyphicon glyphicon-calendar glyphicon-leftTabs"></span><?php echo __('Year') ?>
                    </a>
                </li>
                <li><a href="#statsEver" id="statsEverView" data-toggle="tab"><span
                            class="glyphicon glyphicon-cog glyphicon-leftTabs"></span><?php echo __('Ever') ?>
                    </a>
                </li>
                <li><a href="#statsExample" id="statsExampleView" data-toggle="tab" class="error-message"><span
                            class="glyphicon glyphicon-info-sign glyphicon-leftTabs"></span><?php echo __('Example') ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- End::LeftTabs -->
</div>

<div class="col-md-8 column">
<?php echo $this->Session->flash(); ?>

<div class="tab-content">

<div class="tab-pane" id="statsTickets">

    <table class="fc-header tickets-header">
        <tbody>
        <tr>
            <td class="fc-header-left"><span class="fc-header-title">
            <div class="col-lg-12">
                <h2>
                    Tickets <? echo __(date('d.m.', strtotime('monday this week'))) . '-' . __(date('d.m.Y', strtotime('sunday this week')))?></h2>
            </div>
            </span></td>
            <td class="fc-header-center"></td>
            <td class="fc-header-right">
                    <span class="fc-button fc-button-prev fc-state-default fc-state-disabled fc-corner-left"
                          unselectable="on"><span class="fc-text-arrow">‹</span></span><span
                    class="fc-button fc-button-today fc-state-default fc-state-disabled"
                    unselectable="on">Heute</span><span
                    class="fc-button fc-button-next fc-state-default fc-state-disabled fc-corner-right"
                    unselectable="on"><span class="fc-text-arrow">›</span>
            </span>
            </td>
        </tr>
        </tbody>
    </table>

    <!-- ########################################################################################################### -->

    <canvas id="canvasStatsTickets" height="450" width="750"></canvas>

    <script>

        var ticketsStatsData = [
            {
                value: <? echo json_encode($statsTicketsData['Done'])?>,
                color: "rgba(92, 184, 92, 0.8)"
            },
            {
                value:<? echo json_encode($statsTicketsData['Urgend'])?>,
                color: "rgba(240, 173, 79, 0.8)"
            },
            {
                value: <? echo json_encode($statsTicketsData['Overdue'])?>,
                color: "rgba(217, 83, 79, 0.8)"
            },
            {
                value: <? echo json_encode($statsTicketsData['Requested'])?>,
                color: "rgba(66, 139, 202, 0.8)"
            },
            {
                value: <? echo json_encode($statsTicketsData['New'])?>,
                color: "rgba(153, 153, 153, 0.8)"
            },
            {
                value: <? echo json_encode($statsTicketsData['Error'])?>,
                color: "rgba(0, 0, 0, 0.8)"
            },
            {
                value: <? echo json_encode($statsTicketsData['Canceled'])?>,
                color: "rgba(131, 84, 222, 0.8)"
            }

        ]


        $('body').on('show.bs.tab', '#statsTicketsView[data-toggle="tab"]', function () {


            var tickets = new Chart(document.getElementById("canvasStatsTickets").getContext("2d")).Doughnut(ticketsStatsData, barDefaults);

            $('body').off('show.bs.tab', '#statsTicketsView[data-toggle="tab"]');
        })


    </script>

    <hr/>

    <div class="clearfix">
        <div class="row pull-right">
            <? foreach (Configure::read('TICKET.STATUSES') as $status => $class): ?>

                <span class="label label-<? echo $class ?>"><? echo __($status) ?></span>

            <? endforeach; ?>
        </div>
    </div>

    <!-- ########################################################################################################### -->

</div>

<div class="tab-pane active" id="statsWeek">

    <table class="fc-header week-header">
        <tbody>
        <tr>
            <td class="fc-header-left"><span class="fc-header-title">
            <div class="col-lg-12">
                <h2>
                    Wochenübersicht <? echo __(date('d.m.', strtotime('monday this week'))) . '-' . __(date('d.m.Y', strtotime('sunday this week')))?></h2>
            </div>
            </span></td>
            <td class="fc-header-center"></td>
            <td class="fc-header-right">
                    <span class="fc-button fc-button-prev fc-state-default fc-state-disabled fc-corner-left"
                          unselectable="on"><span class="fc-text-arrow">‹</span></span><span
                    class="fc-button fc-button-today fc-state-default fc-state-disabled"
                    unselectable="on">Heute</span><span
                    class="fc-button fc-button-next fc-state-default fc-state-disabled fc-corner-right"
                    unselectable="on"><span class="fc-text-arrow">›</span>
            </span>
            </td>
        </tr>
        </tbody>
    </table>

    <!-- ########################################################################################################### -->

    <canvas id="canvasStatsWeek" height="450" width="750"></canvas>

    <script>

        var weekStatsData = {

            labels: <? echo $statsWeekScale ?>,

            datasets: [

                {
                    fillColor: "rgba(92, 184, 92, 0.65)", //rgba(66, 139, 202, 1)", //"rgba(92, 184, 92, 0.65)",
                    data: <? echo json_encode($statsWeekData['Online'])?>
                },
                {
                    fillColor: "rgba(240, 173, 79, 0.55)",
                    data: <? echo json_encode($statsWeekData['Canceled'])?>
                },
                {
                    fillColor: "rgba(217, 83, 79, 0.55)",
                    data: <? echo json_encode($statsWeekData['Failed'])?>
                },
                {
                    fillColor: "rgba(66, 139, 202, 0.55)",
                    data: <? echo json_encode($statsWeekData['Processing'])?>
                },
                {
                    fillColor: "rgba(65, 65, 65, 0.1)",
                    data: <? echo json_encode($statsWeekData['Due'])?>
                }
            ]
        }


        var week = new Chart(document.getElementById("canvasStatsWeek").getContext("2d")).Bar(weekStatsData, barDefaults);

    </script>

    <hr/>

    <div class="clearfix">
        <div class="row pull-right">
            <? foreach (Configure::read('EVENT.STATUSES') as $status => $class): ?>

                <span class="label label-<? echo $class ?>"><? echo __($status) ?></span>

            <? endforeach; ?>
        </div>
    </div>

    <!-- ########################################################################################################### -->

</div>

<div class="tab-pane" id="statsMonth">

    <table class="fc-header week-header">
        <tbody>
        <tr>
            <td class="fc-header-left"><span class="fc-header-title">
            <div class="col-lg-12">
                <h2>
                    Monatsübersicht - <? echo __(date('F')) . ' ' . __(date('Y'))?></h2>
            </div>
            </span></td>
            <td class="fc-header-center"></td>
            <td class="fc-header-right">
                    <span class="fc-button fc-button-prev fc-state-default fc-state-disabled fc-corner-left"
                          unselectable="on"><span class="fc-text-arrow">‹</span></span><span
                    class="fc-button fc-button-today fc-state-default fc-state-disabled"
                    unselectable="on">Heute</span><span
                    class="fc-button fc-button-next fc-state-default fc-state-disabled fc-corner-right"
                    unselectable="on"><span class="fc-text-arrow">›</span>
            </span>
            </td>
        </tr>
        </tbody>
    </table>

    <!-- ########################################################################################################### -->

    <canvas id="canvasStatsMonth" height="450" width="750"></canvas>

    <script>

        var monthStatsData = {

            labels: <? echo $statsMonthScale ?>,

            datasets: [

                {
                    fillColor: "rgba(92, 184, 92, 0.65)", //rgba(66, 139, 202, 1)", //"rgba(92, 184, 92, 0.65)",
                    data: <? echo json_encode($statsMonthData['Online'])?>
                },
                {
                    fillColor: "rgba(240, 173, 79, 0.55)",
                    data: <? echo json_encode($statsMonthData['Canceled'])?>
                },
                {
                    fillColor: "rgba(217, 83, 79, 0.55)",
                    data: <? echo json_encode($statsMonthData['Failed'])?>
                },
                {
                    fillColor: "rgba(66, 139, 202, 0.55)",
                    data: <? echo json_encode($statsMonthData['Processing'])?>
                },
                {
                    fillColor: "rgba(65, 65, 65, 0.1)",
                    data: <? echo json_encode($statsMonthData['Due'])?>
                }

            ]

        }


        $('body').on('show.bs.tab', '#statsMonthView[data-toggle="tab"]', function () {

            var month = new Chart(document.getElementById("canvasStatsMonth").getContext("2d")).Bar(monthStatsData, barDefaults);

            $('body').off('show.bs.tab', '#statsMonthView[data-toggle="tab"]');
        })


    </script>

    <hr/>

    <div class="clearfix">
        <div class="row pull-right">
            <? foreach (Configure::read('EVENT.STATUSES') as $status => $class): ?>

                <span class="label label-<? echo $class ?>"><? echo __($status) ?></span>

            <? endforeach; ?>
        </div>
    </div>

    <!-- ########################################################################################################### -->

</div>

<div class="tab-pane" id="statsYear">

    <table class="fc-header week-header">
        <tbody>
        <tr>
            <td class="fc-header-left"><span class="fc-header-title">
            <div class="col-lg-12">
                <h2>
                    Jahresübersicht - <? echo date('Y') ?></h2>
            </div>
            </span></td>
            <td class="fc-header-center"></td>
            <td class="fc-header-right">
                    <span class="fc-button fc-button-prev fc-state-default fc-state-disabled fc-corner-left"
                          unselectable="on"><span class="fc-text-arrow">‹</span></span><span
                    class="fc-button fc-button-today fc-state-default fc-state-disabled"
                    unselectable="on">Heute</span><span
                    class="fc-button fc-button-next fc-state-default fc-state-disabled fc-corner-right"
                    unselectable="on"><span class="fc-text-arrow">›</span>
            </span>
            </td>
        </tr>
        </tbody>
    </table>

    <!-- ########################################################################################################### -->

    <canvas id="canvasStatsYear" height="450" width="750"></canvas>

    <script>


        /* $resilt => {

         scale => ['Jan','Feb',...],

         'Online' => [25,23,24..]
         }
         */

        var yearStatsData = {

            labels: <? echo $statsYearScale ?>,

            datasets: [

                {
                    fillColor: "rgba(92, 184, 92, 0.65)", //rgba(66, 139, 202, 1)", //"rgba(92, 184, 92, 0.65)",
                    data: <? echo json_encode($statsYearData['Online'])?>
                },
                {
                    fillColor: "rgba(240, 173, 79, 0.55)",
                    data: <? echo json_encode($statsYearData['Canceled'])?>
                },
                {
                    fillColor: "rgba(217, 83, 79, 0.55)",
                    data: <? echo json_encode($statsYearData['Failed'])?>
                },
                {
                    fillColor: "rgba(66, 139, 202, 0.55)",
                    data: <? echo json_encode($statsYearData['Processing'])?>
                },
                /*
                 {
                 fillColor: "rgba(65, 65, 65, .1)",
                 data: <? echo json_encode($statsYearData['Due'])?>
                 },*/

            ]

        }


        $('body').on('show.bs.tab', '#statsYearView[data-toggle="tab"]', function () {

            var year = new Chart(document.getElementById("canvasStatsYear").getContext("2d")).Bar(yearStatsData, barDefaults);

            $('body').off('show.bs.tab', '#statsYearView[data-toggle="tab"]');
        })


    </script>

    <hr/>

    <div class="clearfix">
        <div class="row pull-right">
            <? foreach (Configure::read('EVENT.STATUSES') as $status => $class): ?>

                <span class="label label-<? echo $class ?>"><? echo __($status) ?></span>

            <? endforeach; ?>
        </div>
    </div>

    <!-- ########################################################################################################### -->

</div>

<div class="tab-pane" id="statsEver">

    <table class="fc-header week-header">
        <tbody>
        <tr>
            <td class="fc-header-left"><span class="fc-header-title">
            <div class="col-lg-12">
                <h2>
                    Gesamte Produktionszeit</h2>
            </div>
            </span></td>
            <td class="fc-header-center"></td>
            <td class="fc-header-right">
                    <span class="fc-button fc-button-prev fc-state-default fc-state-disabled fc-corner-left"
                          unselectable="on"><span class="fc-text-arrow">‹</span></span><span
                    class="fc-button fc-button-today fc-state-default fc-state-disabled"
                    unselectable="on">Heute</span><span
                    class="fc-button fc-button-next fc-state-default fc-state-disabled fc-corner-right"
                    unselectable="on"><span class="fc-text-arrow">›</span>
            </span>
            </td>
        </tr>
        </tbody>
    </table>

    <!-- ########################################################################################################### -->

    <canvas id="canvasStatsEver" height="450" width="750"></canvas>

    <script>

        var everStatsData = {

            labels: <? echo $statsEverScale ?>,

            datasets: [

                {
                    fillColor: "rgba(92, 184, 92, 0.65)", //rgba(66, 139, 202, 1)", //"rgba(92, 184, 92, 0.65)",
                    data: <? echo json_encode($statsEverData['Online'])?>
                },
                {
                    fillColor: "rgba(240, 173, 79, 0.55)",
                    data: <? echo json_encode($statsEverData['Canceled'])?>
                },
                {
                    fillColor: "rgba(217, 83, 79, 0.55)",
                    data: <? echo json_encode($statsEverData['Failed'])?>
                },
                {
                    fillColor: "rgba(66, 139, 202, 0.55)",
                    data: <? echo json_encode($statsEverData['Processing'])?>
                }
                /*
                 {
                 fillColor: "rgba(65, 65, 65, .1)",
                 data: <?/* echo json_encode($statsEverData['Due'])*/?>
                 },*/

            ]

        }


        $('body').on('show.bs.tab', '#statsEverView[data-toggle="tab"]', function () {

            var ever = new Chart(document.getElementById("canvasStatsEver").getContext("2d")).Bar(everStatsData, barDefaults);

            $('body').off('show.bs.tab', '#statsEverView[data-toggle="tab"]');
        })


    </script>

    <hr/>

    <div class="clearfix">
        <div class="row pull-right">
            <? foreach (Configure::read('EVENT.STATUSES') as $status => $class): ?>

                <span class="label label-<? echo $class ?>"><? echo __($status) ?></span>

            <? endforeach; ?>
        </div>
    </div>

    <!-- ########################################################################################################### -->

</div>

<div class="tab-pane" id="statsExample">

    <table class="fc-header week-header">
        <tbody>
        <tr>
            <td class="fc-header-left"><span class="fc-header-title">
            <div class="col-lg-12">
                <h2>
                    Jahresübersicht - <? echo date('Y') + 1 ?></h2>
            </div>
            </span></td>
            <td class="fc-header-center"></td>
            <td class="fc-header-right">
                    <span class="fc-button fc-button-prev fc-state-default fc-state-disabled fc-corner-left"
                          unselectable="on"><span class="fc-text-arrow">‹</span></span><span
                    class="fc-button fc-button-today fc-state-default fc-state-disabled"
                    unselectable="on">Heute</span><span
                    class="fc-button fc-button-next fc-state-default fc-state-disabled fc-corner-right"
                    unselectable="on"><span class="fc-text-arrow">›</span>
            </span>
            </td>
        </tr>
        </tbody>
    </table>

    <canvas id="canvasExampleStats" height="450" width="750"></canvas>

    <script>

        var barChartData = {labels: <? echo $statsYearScale ?>,

            datasets: [

                {
                    fillColor: "rgba(92, 184, 92, 0.65)", //rgba(66, 139, 202, 1)", //"rgba(92, 184, 92, 0.65)",
                    data: [45, 50, 15, 2, 23, 50, 60, 20, 2, 35 , 65 , 30]
                },
                {
                    fillColor: "rgba(240, 173, 79, 0.55)",
                    data: [10, 2, 13, 1, 6, 15, 15, 2, 0 , 0, 2, 4]
                },
                {
                    fillColor: "rgba(217, 83, 79, 0.55)",
                    data: [5, 2, 3, 5, 4, 5, 10, 0, 0 , 3, 0, 3]
                }

            ]

        }

        $('body').on('show.bs.tab', '#statsExampleView[data-toggle="tab"]', function () {

            var example = new Chart(document.getElementById("canvasExampleStats").getContext("2d")).Bar(barChartData, barDefaults);

            $('body').off('show.bs.tab', '#statsExampleView[data-toggle="tab"]');
        })


    </script>


    <hr/>


    <div class="clearfix">
        <div class="row pull-right">

            <span class="label label-success">Online</span>
            <span class="label label-warning">Ausgefallen</span>
            <span class="label label-danger">Gescheitert</span>

        </div>
    </div>


    <hr/>

    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><span class="glyphicon glyphicon-info-sign"></span>&nbsp;<? echo __('Beispiel')?></h4>
        <? echo __('Dies ist Beispiel der Ansicht nach einem Jahr fiktiver Produktion. Daten frei erfunden!')?>
    </div>

</div>

</div>

</div>

<div class="col-md-3 column">

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>
    <?php /*if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');*/?>

</div><!-- end col md 3 -->