<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-user"></span>' . __('Users'), '/users', array('class' => 'active')); ?>
<? $this->Breadcrumbs->addCrumb(h($this->Session->read('Auth.User.username')), '/users/view/' . $this->Session->read('Auth.User.user_id')); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-envelope-alt"></span>' . __('Messages'), '/users/messages/'); ?>

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-envelope-alt"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Messages'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>


    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><span class="glyphicon glyphicon-info-sign"></span>&nbsp;<? echo __('Not yet supported')?></h4>
        <? echo __('Sorry, this feature is not supported in the current version of Captility.')?>
    </div>

</div>

<div class="col-md-3 column">

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>
    <?php /*if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');*/?>

</div><!-- end col md 3 -->