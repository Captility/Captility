<?
/**
 * Project: Captility
 * User: Daniel
 * Date: 03.01.14
 * Time: 16:19
 */
?>
<!-- Element::Navigation -->

<nav class="navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <?php if ($this->Session->read('Auth.User')): ?>

                    <?php echo $this->Element('/navigation/nav-auth'); ?>
                <?php else: ?>

                    <?php echo $this->Element('/navigation/nav-unauth'); ?>
                <?php endif; ?>
            </div>


        </div>
    </div>

</nav>

<!-- End::Navigation -->