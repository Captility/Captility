<?php $titleDescription = __d('project_name', 'Captility - Aufzeichnungsplaner'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $titleDescription; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    echo $this->Html->meta('icon');


    // Bootstrap Content
    echo $this->Html->css('bootstrap.captility.css'); //ToDo Add minified Version
    echo $this->Html->css('captility.css'); //ToDo Add minified Version

    // jQuery Link
    //echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); // ToDo Add local jQuery
    echo $this->Html->script('jquery/jquery-1.10.2.min.js');
    echo $this->Html->script('jquery/jquery.unveil.min.js');
    echo $this->Html->script('bootstrap.custom.min.js');

    //echo $this->Html->script('jquery/jquery.qtip-1.0.0-rc3.min.js');

    // Ajax application root
    echo $this->Html->scriptBlock('$appRoot = "' . $this->Html->url('/', true) . '"');
    // custom JS
    echo $this->Html->script('captility.min.js');?>

    <?php //ToDo Check this IE8 support ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-72.png">
    <link rel="shorcut icon" href="favicon.png" type="image/png">

</head>

<body>

<div class="landing-page">
    <?php echo $this->Element('/navigation/navigation'); ?>
</div>


<?php echo $this->fetch('content'); ?>

</body>
</html>
