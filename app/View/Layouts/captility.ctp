<?php $titleDescription = __d('project_name', 'Captility - Aufzeichnungsplaner'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $titleDescription; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    // Bootstrap Content
    echo $this->Html->css('bootstrap.css'); //ToDo Add minified Version
    echo $this->Html->css('captility.css'); //ToDo Add minified Version

    // jQuery Link
    echo $this->Html->script('jquery.min.js');
    echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); // ToDo Add local jQuery
    echo $this->Html->script('bootstrap.min.js');
    echo $this->Html->script('bootstrap-datepicker.js');
    echo $this->Html->script('captility.js');?>

    <?php //ToDo Check this IE8 support ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/favicon.png">

  </head>

  <body>

    <?php echo $this->Element('navigation'); ?>

    <div class="container container-lower">

    <?php echo $this->Element('breadcrumbs'); ?>

    <!-- Start::Content -->
    <div class="row clearfix">
        <div class="col-md-12 column">

            <div class="row clearfix">

                <?php if (isset($headline)): //Layout in Tabs with Sidebar ?>
                    <div class="col-md-12 column">
                        <?php echo $this->Element('headline');?>
                    </div>

                    <?php echo $this->fetch('content'); ?>

                    <div class="col-md-3 column">
                        <?php echo $this->Element('sideCalendar');?>
                        <?php echo $this->Element('sideTickets');?>
                    </div>

                <?php else:  // Cake/ Admin Layout?>

                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>

                <?php endif; ?>

            </div>
        </div>
    </div>




  </body>
</html>
