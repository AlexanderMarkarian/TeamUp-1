<section id="services">
    <div class="container">
        <section id="club">
            <div class="container">
                <!-- POST -->
                <article class="club-post">
                    <div class="club-content">
                        <div id="tab" class="tabs">
                            <ul class="clearfix">
                                <li><a href="#section-1" >NBA</a></li>
                                <li><a href="#section-2" >NFL</a></li>
                                <li><a href="#section-3" >MLB</a></li>
                                <li><a href="#section-4" >NHL</a></li>
                            </ul>


                            <div id="section-1" class="tab-content ">
                                <?php
                                foreach ($pg['data'] as $info) {


                                    if ($info['sport'] == "NBA") {
                                        ?>
                                        <div class="col-4 margin-10">
                                            <div class="col-3">
                                                <img src="<?= ABSOLUTH_PATH_IMAGES . $info['logo'] ?>" alt="<?= $info['name'] ?>" class="resize"/>

                                            </div>
                                            <div class="col-9 dir-n">
                                                <a href="#<?= $info['ID'] ?>"><?= $info['name'] ?></a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div id="section-2" class="tab-content ">
                                <?php
                                foreach ($pg['data'] as $info) {


                                    if ($info['sport'] == "NFL") {
                                        ?>
                                        <div class="col-4 margin-10">
                                            <div class="col-3">
                                                <img src="<?= ABSOLUTH_PATH_IMAGES . $info['logo'] ?>" alt="<?= $info['name'] ?>" class="resize"/>
                                            </div>

                                            <div class="col-9 dir-n">
                                                <a href="#<?= $info['ID'] ?>"><?= $info['name'] ?></a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div id="section-3" class="tab-content ">
                                <?php
                                foreach ($pg['data'] as $info) {


                                    if ($info['sport'] == "MLB") {
                                        ?>
                                        <div class="col-4 margin-10">
                                            <div class="col-3">
                                                <img src="<?= ABSOLUTH_PATH_IMAGES . $info['logo'] ?>" alt="<?= $info['name'] ?>" class="resize"/>
                                            </div>

                                            <div class="col-9 dir-n">
                                                <a href="#<?= $info['ID'] ?>"><?= $info['name'] ?></a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div id="section-4" class="tab-content ">
                                <?php
                                foreach ($pg['data'] as $info) {


                                    if ($info['sport'] == "NHL") {
                                        ?>
                                        <div class="col-4 margin-10">
                                            <div class="col-3">
                                                <img src="<?= ABSOLUTH_PATH_IMAGES . $info['logo'] ?>"  alt="<?= $info['name'] ?>" class="resize"/>
                                            </div>

                                            <div class="col-9 dir-n">
                                                <a href="#<?= $info['ID'] ?>"><?= $info['name'] ?></a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>



                        </div>
                </article>

            </div>
        </section>
         <!-- Libs -->
    <script src="js/libs/jquery-1.10.2.min.js"></script>
    <script src='js/libs/jquery.flexslider-min.js'></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js/libs/jquery.bxslider.min.js"></script>
	<script src="js/pageLoader.js"></script>
    <script src="js/scripts.js"></script>
    </div>
</section>