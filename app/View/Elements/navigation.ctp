    <!-- Element::Navigation -->

    <nav class="navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 column">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <?php echo $this->Html->link("Captility",   array( 'controller' => 'calendars', 'action' => 'index'),
                                                                    array('class' => 'navbar-brand')); //ToDo Variable für Titel benutzen ?>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <?php echo $this->Html->link("Kalender", array( 'controller' => 'calendars', 'action' => 'index')); ?>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Verwalten<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php echo $this->Html->link("Full Calendar", array( 'controller' => 'full_calendar', 'action' => 'index')); ?>
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link("Lectures", array( 'controller' => 'lectures', 'action' => 'index')); ?>
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link("Captures", array( 'controller' => 'captures', 'action' => 'index')); ?>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link("Worksflows", array( 'controller' => 'workflows', 'action' => 'index')); ?>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link("Users", array( 'controller' => 'users', 'action' => 'index')); ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control btn-inverse">
                            </div> <button type="submit" class="btn btn-inverse">Suche</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#">Einstellungen</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">User Profile<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Profil bearbeiten</a>
                                    </li>
                                    <li>
                                        <a href="#">Benachrichtigungen</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">Admin Center</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </nav>

    <!-- End::Navigation -->