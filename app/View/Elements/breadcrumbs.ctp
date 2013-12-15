<!-- Element::breadcrumbs -->

<div class="row clearfix">
    <div class="col-md-12 column">
        <ul class="breadcrumb">
            <li>
                <a href="#"><span class="glyphicon glyphicon-home"></span> Home</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="#">Aufnahmen</a> <span class="divider">/</span>
            </li>
            <li class="active">
                <?php if(isset($headline)) echo $headline;?>
            </li>
        </ul>
    </div>
</div>

<!-- End::breadcrumbs -->