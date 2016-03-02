 <section id="add/drop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Add/Drop</h2>
                <h3 class="section-subheading text-muted">Click on a team logo to add</h3>
            </div>
        </div>

        <div id="overlay" style="visibility:hidden"></div>
        <div id="add-area" style="visibility:hidden">
            <img src="<?= ABSOLUTH_PATH_IMAGES ."other/close.png" ?>" id="close">
            <div class="col-md-4" style="display:inline;">
                <div style="display:block;">
                    <img class="img-responsive img-hover" id="add-image" src="" alt="">
                </div>
                <div style="display:block;">
                    <h5 id="add-name"></h5> 
                </div>
            </div>
            <div class="col-md-2">
                <span id="trade-image"><i class="fa fa-exchange"></i></span>
                <div id="complete-button">
                    <button class="btn btn-danger btn-lg" style="margin-top:30px;"> Complete</button>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>

        <div class="row" id="main-content">
            <div class="col-lg-12 grey-area">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#sectionA">NBA</a></li>
                    <li><a data-toggle="tab" href="#sectionB">NFL</a></li>
                    <li><a data-toggle="tab" href="#sectionC">MLB</a></li>
                    <li><a data-toggle="tab" href="#sectionD">NHL</a></li>
                </ul>
                <div class="tab-content">
                    <div id="sectionA" class="tab-pane fade in active">
                        <?php
                            foreach ($pg['data'] as $info) {
                                if ($info['sport'] == "NBA") {
                                    ?>
                                    <div class="col-md-4" style="margin-top:15px;">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="<?= ABSOLUTH_PATH_IMAGES . $info['logo'] ?>" id="<?= $info['name'] ?>"alt="<?= $info['name'] ?>" class="resize"/>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading" id="<?= $info['ID'] ?>"><?= $info['name'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        ?>
                    </div>
                    <div id="sectionB" class="tab-pane fade">
                        <?php
                            foreach ($pg['data'] as $info) {
                                if ($info['sport'] == "NFL") {
                                    ?>
                                    <div class="col-md-4" style="margin-top:15px;">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="<?= ABSOLUTH_PATH_IMAGES . $info['logo'] ?>" alt="<?= $info['name'] ?>" class="resize"/>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading" id="<?= $info['ID'] ?>"><?= $info['name'] ?></h4>

                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        ?>
                    </div>
                    <div id="sectionC" class="tab-pane fade">
                        <?php
                            foreach ($pg['data'] as $info) {
                                if ($info['sport'] == "MLB") {
                                    ?>
                                    <div class="col-md-4" style="margin-top:15px;">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="<?= ABSOLUTH_PATH_IMAGES . $info['logo'] ?>" alt="<?= $info['name'] ?>" class="resize"/>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading" id="<?= $info['ID'] ?>"><?= $info['name'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        ?>
                    </div>
                    <div id="sectionD" class="tab-pane fade">
                        <?php
                            foreach ($pg['data'] as $info) {
                                if ($info['sport'] == "NHL") {
                                    ?>
                                    <div class="col-md-4" style="margin-top:15px;">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="<?= ABSOLUTH_PATH_IMAGES . $info['logo'] ?>" alt="<?= $info['name'] ?>" class="resize"/>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading" id="<?= $info['ID'] ?>"><?= $info['name'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
