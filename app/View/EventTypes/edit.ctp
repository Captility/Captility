<? $this->Breadcrumbs->addCrumb(__('Records'), '/pages/records'); ?>
<? $this->Breadcrumbs->addCrumb('<span class="glyphicon glyphicon-facetime-video"></span>'.__('Event Types'), array('action' => 'index')); ?>
<? $this->Breadcrumbs->addCrumb(h($this->request->data['EventType']['name']), '/event_types/view/'.h($this->request->data['EventType']['event_type_id'])); ?>
<?php $this->Breadcrumbs->addCrumb('<span class="glyphicon el-icon-file-edit"></span>'.__('Edit Event Type'), '#', array('class' => 'active')); ?>
<!--<div class=" form">-->

<div class="row">
    <div class="col-md-1 column">
    </div>
    <div class="col-md-11 column">
        <div class="page-header">
            <h1><?php echo __('Edit Event Type'); ?></h1>
        </div>
    </div>
</div>


<!--<div class="row">-->

<div class="col-md-1 column">
</div>
<div class="col-md-8 column">

    <?php echo $this->Session->flash(); ?>    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('EventType', array('role' => 'form')); ?>

    <div class="form-group">
        <?php echo $this->Form->input('event_type_id', array('class' => 'form-control', 'placeholder' => 'Event Type Id'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
    </div>

    <div class="form-group">
        <div style="display: inline-block">
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-facetime-video input-group-glyphicon"></span>
                <input class="form-control selected-color" placeholder="Blue" name="data[EventType][color]"
                       maxlength="255" type="text" value="<? echo $this->Form->value('EventType.color'); ?>"
                       id="EventTypeColor" required="required" readonly>
            </div>
        </div>
        <div style="display: inline-block" class="colorpalette"></div>
    </div>

    <?php echo $this->Element('submitArea');?>

    <?php echo $this->Form->end() ?>

</div><!-- end col md 12 -->


<div class="col-md-3 column">
    <div class="actions">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-link"></span><?php echo __('Related Actions');?>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">

                    <li><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>'.__('Delete'), array('action' => 'delete', $this->Form->value('EventType.event_type_id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('EventType.event_type_id'))); ?></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Event Types'), array('action' => 'index'), array('escape' => false)); ?></li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span>'.__('List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>'.__('New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (isset($sideCalendar) && $sideCalendar) echo $this->Element('sideCalendar');?>    <?php if (isset($sideTickets) && $sideTickets) echo $this->Element('sideTickets');?>
</div><!-- end col md 3 -->


<!--</div>--><!-- end row -->
<!--</div>-->
