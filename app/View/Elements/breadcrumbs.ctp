<!-- Element::breadcrumbs -->
<div class="breadcrumb-bar">

    <div class="container">

        <div class="row clearfix">
            <div class="col-md-12  col-xs-12 column">

                <div class="pull-right quick-nav">

                    <a href="<? echo Router::url('/', true) . 'production' ?>" <span
                        class="glyphicon el-icon-bookmark"></span></a>
                    <a href="javascript:void(0)" class="qr-code"><span
                            class="glyphicon glyphicon-qrcode"></span></a>
                    <a href="<? echo Router::url('/', true) . 'tickets/ticketFeed/user_id:' . AuthComponent::user('user_id') . '/.rss' ?>"
                       class="rss-icon" target="_blank"><span class="glyphicon el-icon-rss"></span></a>
                </div>

                <? echo $this->Breadcrumbs->getCrumbs(true)?>


            </div>
        </div>
    </div>
</div>
</div>

<!-- End::breadcrumbs -->