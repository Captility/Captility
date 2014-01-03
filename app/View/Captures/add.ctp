<div class="captures form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Capture'); ?></h1>
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

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Captures'), array('action' => 'index'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Lectures'), array('controller' => 'lectures', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Lecture'), array('controller' => 'lectures', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Events'), array('controller' => 'events', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Event'), array('controller' => 'events', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Tickets'), array('controller' => 'tickets', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Ticket'), array('controller' => 'tickets', 'action' => 'add'), array('escape' => false)); ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col md 3 -->
        <div class="col-md-9">
            <?php echo $this->Form->create('Capture', array('role' => 'form')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('online', array('class' => 'form-control', 'placeholder' => 'Online'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('comment', array('class' => 'form-control', 'placeholder' => 'Comment'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('Event.event_type_id', array('class' => 'form-control', 'placeholder' => 'Event Type Id'));?>
            </div>

            <? pr($eventTypes); ?>

            <div class="form-group">
                <?php echo $this->Form->input('link', array('class' => 'form-control', 'placeholder' => 'Link'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('date',
                    array('dateFormat' => Configure::read('Captility.dateFormat'),
                        'timeFormat' => '24',
                        'minYear' => date('Y') - 2,
                        'maxYear' => date('Y') + 5,
                        'class' => 'form-control form-control-date',
                        'interval' => 15,
                        'selected' => array(
                            'day' => date('d'),
                            'month' => date('m'),
                            'year' => date('Y'),
                            'hour' => date('H'),
                            'min' => '00'),
                    ));?>
            </div>

            <?/*<div class="form-group">
                <?php echo $this->Form->input('published',
                    array('dateFormat' => Configure::read('Captility.dateFormat'),
                        'timeFormat' => '24',
                        'minYear' => date('Y') - 2,
                        'maxYear' => date('Y') + 5,
                        'interval' => 5,
                        'class' => 'form-control form-control-date'));?>
            </div> */?>
            <div class="form-group">
                <?php echo $this->Form->input('lecture_id', array('class' => 'form-control', 'placeholder' => 'Lecture Id'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
            </div>
            <?/*<div class="form-group">
                <?php echo $this->Form->input('event_id', array('class' => 'form-control', 'placeholder' => 'Event Id'));?><!--
            </div>*/ ?>
            <div class="form-group">
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
        <!-- end col md 12 -->
    </div>
    <!-- end row -->
</div>
