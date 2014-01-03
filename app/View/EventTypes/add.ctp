<div class="eventTypes form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Event Type'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Event Types'), array('action' => 'index'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col md 3 -->
        <div class="col-md-9">
            <?php echo $this->Form->create('EventType', array('role' => 'form')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
            </div>

            <label for="EventTypeColor">Color</label>
            <div class="form-group">
                <div style="display: inline-block">
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-tint input-group-glyphicon"></span>
                        <input class="form-control selected-color" placeholder="Blue" name="data[EventType][color]"
                               maxlength="255" type="text" value="<? echo $this->Form->value('EventType.color'); ?>"
                               id="EventTypeColor" required="required" readonly>
                    </div>
                </div>
                <div style="display: inline-block" class="colorpalette"></div>
            </div>

            <div class="form-group">
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
        <!-- end col md 12 -->
    </div>
    <!-- end row -->
</div>
