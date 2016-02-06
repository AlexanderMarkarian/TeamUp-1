 <section id="add/drop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Add/Drop</h2>
                <h3 class="section-subheading text-muted">some text</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul id="myTab" class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#service-one" data-toggle="tab"> NBA</a>
                    </li>
                    <li class=""><a href="#service-two" data-toggle="tab"> NFL</a>
                    </li>
                    <li class=""><a href="#service-three" data-toggle="tab"> MLB</a>
                    </li>
                    <li class=""><a href="#service-four" data-toggle="tab"> NHL</a>
                    </li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="service-one">
                         <?php
                            foreach ($pg['data'] as $info) {
                                if ($info['sport'] == "NBA") {
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
                    <div class="tab-pane fade" id="service-two">
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
                    <div class="tab-pane fade" id="service-three">
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
                    <div class="tab-pane fade" id="service-four">
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
