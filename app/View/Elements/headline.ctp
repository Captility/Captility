<!-- Element::Headline -->

<div class="row clearfix">

    <?php if (isset($leftTabs)): //Layout in Tabs with Sidebar ?>
        <div class="col-md-1 column">
        </div>
        <div class="col-md-11 column">
    <?php else: ?>
            <div class="col-md-12 column">
    <?php endif; ?>
        <div class="page-header">
            <h1>
                <?php echo $headline; ?> <?php if (isset($underline)) echo '<small>' . $underline . '</small>'; ?>
            </h1>
        </div>
    </div>
</div>

<!-- End::Headline -->