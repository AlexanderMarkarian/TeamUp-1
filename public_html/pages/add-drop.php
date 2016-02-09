 <section id="add/drop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Add/Drop</h2>
                <h3 class="section-subheading text-muted">Click on a team logo to add</h3>
            </div>
        </div>

        <div class="row" id="add-drop" style="display:none;">
            <div class="col-md-3" id="add-side" style="margin-left:17%">
                <h4>Team To Add</h4>
                <img class="img-responsive img-hover" id="add-image" src="" alt="">
                <h5 id="add-name"></h5>
            </div>
            <div class="col-md-2">
                <span id="trade-image"><i class="fa fa-exchange"></i></span>
                <span id="complete-button">
                    <button class="btn btn-success btn-lg" style="margin-top:30px;"> Complete</button>
                </span>
            </div>

            <div class="col-md-3" id="drop-side">
                <div id="drop-team">
                    <h4>Team To Drop</h4>
                    <img class="img-responsive img-hover" id="drop-image" alt="">
                    <h5 id="drop-name"></h5>
                </div>
                <div id="select-drop">
                    <h5 id="drop-prompt">Select a team from your roster to drop</h5>
                    <select class="form-control" id="roster-select" style="width: 200px">
                      <option>Los Angeles Lakers</option>
                      <option>Milwaukee Bucks</option>
                      <option>Philadelphia Eagles</option>
                      <option>Washington Redskins</option>
                      <option>Seattle Seahawks</option>
                    </select>
                </div>
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
