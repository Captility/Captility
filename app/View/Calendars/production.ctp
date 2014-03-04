<?
/**
 * View Template
 *
 * @author Daniel, Captiliity
 */
?>

<? $this->Breadcrumbs->addCrumb(__('Production'), '/production'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-bookmark-empty"></span>' . __('Overview'), '/stats', array('class' => 'active')); ?>

<div class="row">
    <div class="col-md-1 column">
        <div class="glyphicon-headline hidden-sm hidden-xs"><span class="glyphicon el-icon-bookmark-empty"></span></div>
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Production'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>


    <? echo $this->Element('dashboard/quickmenu'); ?>


</div>

<div class="col-md-3 column">

    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>
    <?php /*if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets'); */?>

</div><!-- end col md 3 -->