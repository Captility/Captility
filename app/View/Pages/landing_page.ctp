<div class="landing-page-wrapper landing-page-wrapper-black" style="padding: 0px;">

    <div class="container landing-page" style="">
        <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>

    </div>


</div>


<div class="landing-page-wrapper landing-page-wrapper-black">

    <div class="container container-lower landing-page">

        <div class="col-md-12 column landing-page">

            <div class="row clearfix">


                <div class="col-sm-12 col-xs-12 col-md-8 col-lg-7 column landing-page landing-page-black landing-page-header">


                    <div class="landing-page-captility-logo-icon"></div>

                    <div class="col-sm-12 col-xs-12 landing-page landing-page-black">


                        <h1>Captility</h1>

                        <h2>
                            Aufzeichnungsplaner <strong>|</strong> CMS <strong>|</strong> Kalender <strong>|</strong>
                            Projektmanagement-Tool
                        </h2>

                        <p style=" margin-top: 25px;">
                            <a class="btn btn-primary" role="button">Mehr erfahren</a>
                            <a class="btn btn-primary" style="margin-left: 10px"
                               onclick="window.location.href='<? echo $this->Html->url('/', true) ?>login'"
                               role="button">Demo</a>
                        </p>
                    </div>

                </div>


                <div class="hidden-sm hidden-xs col-md-4 col-lg-5 column  landing-page-showcase">

                    <div class="landing-page-showcase-body">


                        <div class="landing-page-showcase-carousel">

                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img
                                            src="<? echo $this->Html->url('/', true) ?>img/landing-page/landing-page-showcase-0.png"
                                            alt="Example Picture Captility" class="landing-page-thumbnail"/>
                                    </div>
                                    <div class="item">
                                        <img
                                            src="<? echo $this->Html->url('/', true) ?>img/landing-page/landing-page-showcase-1.png"
                                            alt="Example Picture Captility" class="landing-page-thumbnail"/>
                                    </div>
                                    <div class="item">
                                        <img
                                            src="<? echo $this->Html->url('/', true) ?>img/landing-page/landing-page-showcase-2.png"
                                            alt="Example Picture Captility" class="landing-page-thumbnail"/>
                                    </div>
                                    <div class="item">
                                        <img
                                            src="<? echo $this->Html->url('/', true) ?>img/landing-page/landing-page-showcase-3.png"
                                            alt="Example Picture Captility" class="landing-page-thumbnail"/>
                                    </div>
                                    <div class="item">
                                        <img
                                            src="<? echo $this->Html->url('/', true) ?>img/landing-page/landing-page-showcase-4.png"
                                            alt="Example Picture Captility" class="landing-page-thumbnail"/>
                                    </div>
                                    <div class="item">
                                        <img
                                            src="<? echo $this->Html->url('/', true) ?>img/landing-page/landing-page-showcase-5.png"
                                            alt="Example Picture Captility" class="landing-page-thumbnail"/>
                                    </div>
                                </div>


                                <!-- Indicators -->
                                <ol class="landing-page-showcase-carousel-indicators carousel-indicators ">
                                    <li data-target="#carousel-example-generic" data-slide-to="0"
                                        class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                    <li data-target="#carousel-example-generic" dphata-slide-to="4"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                                </ol>

                            </div>

                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>

</div>
</div>

<div class="landing-page-wrapper landing-page-wrapper-white">
    <div class="container landing-page">

        <div class="col-md-12 column landing-page landing-page-white">

            <div class="row clearfix">

                <div class="col-md-9 column landing-page landing-page-white">


                    <div class="container landing-page landing-page-white">

                        <h2>Einfacher aufzeichnen</h2>

                        <h4>Die wichtigsten Features und Vorteile vom
                            <strong>&bdquo;Capture-Utility&ldquo;</strong>
                            auf einen Blick... </h4>
                    </div>

                </div>
                <div class="col-md-3 column landing-page landing-page-white">

                </div>


            </div>


            <div class="row clearfix container" style="margin-top: 40px">


                <div class="col-md-4 column landing-page landing-page-white">

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>lectures">
                            <span class="glyphicon glyphicon-list"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Veranstaltungskatalog</strong></h3>
                            <small>Captility ermöglicht ein schnell und klar strukturiertes, aber vorallem
                                konsistentes
                                Verwalten von Veranstaltungen, Dozenten, usw...
                            </small>
                        </div>
                    </div>

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>">
                            <span class="glyphicon glyphicon-dashboard"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Produktion im Blick</strong></h3>
                            <small>Die Pinnwand bietet stets eine praktische Übersicht der laufenden
                                Woche. <br/>
                                Ausstehende Aufnahmen, Postproduktion etc. nie mehr aus den Augen verlieren!
                            </small>
                        </div>
                    </div>

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>users">
                            <span class="glyphicon el-icon-group"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Mitarbeiter koordinieren</strong></h3>
                            <small>Mitarbeiter-Rollen über Benutzergruppen verwalten und entsprechende Rechte
                                zuweisen.
                            </small>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 column landing-page landing-page-white">


                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>calendar"
                           style="">
                            <span class="glyphicon el-icon-calendar"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Terminkalender</strong></h3>
                            <small>Nie mehr den Überblick über die kommenden Aufnahmen verlieren, oder Termine
                                mühsam
                                separat anlegen.
                            </small>
                        </div>
                    </div>


                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>captures">
                            <span class="glyphicon glyphicon-film"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Aufnahmereihen erstellen</strong></h3>
                            <small>Mehrere Aufzeichnungen können einfach anhand von Zeitplänen auf einen
                                Schlag
                                generiert werden und sparen zeitaufwändige und mühsame Arbeit.
                            </small>
                        </div>
                    </div>

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left"
                           href="<? echo $this->Html->url('/', true) ?>calendar/statistic">
                            <span class="glyphicon el-icon-graph"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Projekte analysieren</strong></h3>
                            <small>Reflektion und Beurteilung des Produktionsverlaufs mithilfe eigener Statistiken.
                            </small>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 column landing-page landing-page-white">

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>tickets">
                            <span class="glyphicon el-icon-tags"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Ticket-System</strong></h3>
                            <small>Projektmanagement zentral, einfach und zugeschnitten. Aufgaben an Mitarbeiter
                                verteilen und deren Status jederzeit einsehen.
                            </small>
                        </div>
                    </div>


                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>workflows">
                            <span class="glyphicon el-icon-random"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Routinen vorgeben</strong></h3>
                            <small>Hängen Sie fertige Workflows an eine Kette von Aufzeichnungen und Aufgaben werden
                                zu
                                jeder Veranstaltung automatisch zugewiesen.
                            </small>
                        </div>
                    </div>


                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="#">
                            <span class="glyphicon el-icon-rss"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Informiert bleiben</strong></h3>
                            <small>Benachrichtigungs-System mit laufenden Aufnahmen der Woche, Produktionsstatus und
                                mehr...
                            </small>
                        </div>
                    </div>


                </div>


            </div>


        </div>


    </div>

</div>


<div id="LandingPageScreenshots" class="landing-page-wrapper landing-page-wrapper-blue">
    <div class="container landing-page">

        <div class="col-md-12 column landing-page landing-page-blue">

            <div class="row clearfix">

                <div class="col-md-9 column landing-page landing-page-blue">


                    <div class="container landing-page landing-page-blue">

                        <h2>Aufgaben und Termine - Ganz Intuitiv</h2>

                        <h4>Screenshots zur Bedienung des Aufzeichnungsplaners:</h4>
                    </div>

                </div>
                <div class="col-md-3 column landing-page landing-page-blue">

                </div>


            </div>


            <div class="row clearfix" style="margin-top: 40px">


                <div class="col-xs-6 col-md-4 col-lg-3 landing-page landing-page-blue">
                    <a title="Screenshot #1" href="#LandingPageScreenshots" data-dismiss="modal" class="thumbnail  landing-page-thumbnail">
                        <img src="//placehold.it/600x800/DDD/225588" alt="" class="landing-page-thumbnail"/>
                    </a>
                </div>

                <div class="col-xs-6 col-md-4 col-lg-3 landing-page landing-page-blue">
                    <a title="Screenshot #1" href="#LandingPageScreenshots" data-dismiss="modal" class="thumbnail  landing-page-thumbnail">
                        <img src="//placehold.it/600x800/DDD/225588" alt="" class="landing-page-thumbnail"/>
                    </a>
                </div>

                <div class="col-xs-6 col-md-4 col-lg-3 landing-page landing-page-blue">
                    <a title="Screenshot #1" href="#LandingPageScreenshots" data-dismiss="modal" class="thumbnail landing-page-thumbnail">
                        <img src="//placehold.it/600x800/DDD/225588" alt="" class="landing-page-thumbnail"/>
                    </a>
                </div>

                <div class="col-xs-6 hidden-md col-lg-3 landing-page landing-page-blue">
                    <a title="Screenshot #1" href="#LandingPageScreenshots" data-dismiss="modal" class="thumbnail landing-page-thumbnail">
                        <img src="//placehold.it/600x800/DDD/225588" alt="" class="landing-page-thumbnail"/>
                    </a>
                </div>


            </div>


            <!-- Screenshot Modal -->
            <div id="LandingPageModal" class="modal fade" tabindex="-1" role="dialog">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <!--<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3 class="modal-title">Showcase</h3>

                        </div>-->
                        <div class="modal-body"></div>
                    </div>
                </div>
            </div>


        </div>


    </div>

</div>


<div class="landing-page-wrapper landing-page-wrapper-white">
    <div class="container landing-page">

        <div class="col-md-12 column landing-page landing-page-white">

            <div class="row clearfix">

                <div class="col-md-9 column landing-page landing-page-white">


                    <div class="container landing-page landing-page-white">

                        <h2>Einfacher aufzeichnen</h2>

                        <h4>Die wichtigsten Features und Vorteile vom
                            <strong>&bdquo;Capture-Utility&ldquo;</strong>
                            auf einen Blick... </h4>
                    </div>

                </div>
                <div class="col-md-3 column landing-page landing-page-white">

                </div>


            </div>


            <div class="row clearfix container" style="margin-top: 40px">


                <div class="col-md-4 column landing-page landing-page-white">

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>lectures">
                            <span class="glyphicon glyphicon-list"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Veranstaltungskatalog</strong></h3>
                            <small>Captility ermöglicht ein schnell und klar strukturiertes, aber vorallem
                                konsistentes
                                Verwalten von Veranstaltungen, Dozenten, usw...
                            </small>
                        </div>
                    </div>

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>">
                            <span class="glyphicon glyphicon-dashboard"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Produktion im Blick</strong></h3>
                            <small>Die Pinnwand bietet stets eine praktische Übersicht der laufenden
                                Woche. <br/>
                                Ausstehende Aufnahmen, Postproduktion etc. nie mehr aus den Augen verlieren!
                            </small>
                        </div>
                    </div>

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>users">
                            <span class="glyphicon el-icon-group"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Mitarbeiter koordinieren</strong></h3>
                            <small>Mitarbeiter-Rollen über Benutzergruppen verwalten und entsprechende Rechte
                                zuweisen.
                            </small>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 column landing-page landing-page-white">


                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>calendar"
                           style="">
                            <span class="glyphicon el-icon-calendar"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Terminkalender</strong></h3>
                            <small>Nie mehr den Überblick über die kommenden Aufnahmen verlieren, oder Termine
                                mühsam
                                separat anlegen.
                            </small>
                        </div>
                    </div>


                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>captures">
                            <span class="glyphicon glyphicon-film"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Aufnahmereihen erstellen</strong></h3>
                            <small>Mehrere Aufzeichnungen können einfach anhand von Zeitplänen auf einen
                                Schlag
                                generiert werden und sparen zeitaufwändige und mühsame Arbeit.
                            </small>
                        </div>
                    </div>

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left"
                           href="<? echo $this->Html->url('/', true) ?>calendar/statistic">
                            <span class="glyphicon el-icon-graph"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Projekte analysieren</strong></h3>
                            <small>Reflektion und Beurteilung des Produktionsverlaufs mithilfe eigener Statistiken.
                            </small>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 column landing-page landing-page-white">

                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>tickets">
                            <span class="glyphicon el-icon-tags"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Ticket-System</strong></h3>
                            <small>Projektmanagement zentral, einfach und zugeschnitten. Aufgaben an Mitarbeiter
                                verteilen und deren Status jederzeit einsehen.
                            </small>
                        </div>
                    </div>


                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="<? echo $this->Html->url('/', true) ?>workflows">
                            <span class="glyphicon el-icon-random"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Routinen vorgeben</strong></h3>
                            <small>Hängen Sie fertige Workflows an eine Kette von Aufzeichnungen und Aufgaben werden
                                zu
                                jeder Veranstaltung automatisch zugewiesen.
                            </small>
                        </div>
                    </div>


                    <div class="media landing-page landing-page-white">
                        <a class="media-glyphicon pull-left" href="#">
                            <span class="glyphicon el-icon-rss"></span>
                        </a>

                        <div class="media-body landing-page landing-page-white">
                            <h3><strong class="media-heading">Informiert bleiben</strong></h3>
                            <small>Benachrichtigungs-System mit laufenden Aufnahmen der Woche, Produktionsstatus und
                                mehr...
                            </small>
                        </div>
                    </div>


                </div>


            </div>


        </div>


    </div>

</div>


<div class="landing-page-footer-wrapper landing-page-wrapper landing-page-wrapper-black">
    <div class="container landing-page">
        <div class="col-md-12 column">

            <div class="row clearfix container">


                <div class="col-md-8 column landing-page landing-page-black landing-page-footer">

                    <h3><strong>Disclaimer</strong></h3>


                    <strong><span class="glyphicon el-icon-picasa"></span>Captility
                        v<? echo Configure::read('Captility.version');?> ©<? echo date("Y"); ?> Daniel
                        Deppe</a></strong> <span>|</span> <a><span class="glyphicon el-icon-paper-clip-alt"></span>www.danieldeppe.de</a>
                    <span>|</span> <a><span class="glyphicon el-icon-idea-alt"></span>Impressum</a> <span>|</span>
                    <a><span class="glyphicon el-icon-envelope-alt"></span>Kontakt</a> <span>|</span>

                </div>


                <div class="col-md-4 column landing-page landing-page-black landing-page-footer">

                    <h3 class="pull-right"><strong>Social Media</strong></h3>


                    <div class="clearfix"></div>

                    <div class="media landing-page landing-page-black landing-page-footer pull-right">
                        <a class="media-glyphicon pull-right" href="#">
                            <span class="glyphicon el-icon-facebook"></span>
                        </a>


                        <a class="media-glyphicon pull-right" href="#">
                            <span class="glyphicon el-icon-twitter"></span>
                        </a>


                        <a class="media-glyphicon pull-right" href="https://github.com/Captility/Captility">
                            <span class="glyphicon el-icon-github"></span>
                        </a>
                    </div>

                </div>


            </div>

        </div>
    </div>


</div>

