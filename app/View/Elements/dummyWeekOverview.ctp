<?php echo $this->Element('headline');?>

<div class="col-md-1 column">
    <?php echo $this->Element('leftTabs');?>
</div>

<div class="col-md-8 column content-pane">
    <?php echo $this->Element('leftTabContentPane');?>
</div>

<div class="col-md-3 column">
    <?php echo $this->Element('sideCalendar');?>
    <?php echo $this->Element('sideTickets');?>
</div>