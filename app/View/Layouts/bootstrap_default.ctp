<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<?php

$titleDescription = __d('project_name', 'Captility 0.2');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $titleDescription; ?>
        <?php echo " - ".$title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    //echo $this->Html->css('cake.generic');
    // Bootstrap Content
    echo $this->Html->css('bootstrap/bootstrap.original.css'); //ToDo Add minified Version

    // jQuery Link
    echo $this->Html->css('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');?>

    <?php //ToDo Check this IE8 support ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <?php // ToDo Inline css für Navbar umlagern ?>
    <style type="text/css">
    	body{ padding: 70px 0px; }
    </style>

  </head>

  <body>

    <?php echo $this->Element('navigation'); ?>

    <div class="container">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>

    </div><!-- /.container -->

  </body>
</html>
