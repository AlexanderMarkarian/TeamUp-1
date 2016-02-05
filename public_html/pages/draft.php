<section id="bc-t">
    <div class="container">
        <h1 class="blog-title">Draft</h1>
    </div>
</section>
<section id="video">
    <div class="container">
        <div class="b-menu">
            <nav id="blog-menu">
                <ul class="clearfix">
                    <li>On the Clock: </li>
                    <li class="active"><a href="#">Team 1</a></li>
                    <li><a href="#">Team 2</a></li>
                    <li><a href="#">Team 3</a></li>
                    <li><a href="#">Team 4</a></li>                      
                </ul>
                <a href="#" id="pull-blog">Menu</a>
            </nav>
        </div>
        <br>
        <div id="v-tabs">
            <ul class="clearfix col-4">
                <li><i class="fa fa-play"></i><a href="#section-1">NBA <span>Teams Available</span></a></li>
                <li><i class="fa fa-play"></i><a href="#section-2">NFL <span>Teams Available</span></a></li>
                <li><i class="fa fa-play"></i><a href="#section-3">MLB <span>Teams Available</span></a></li>
                <li><i class="fa fa-play"></i><a href="#section-4">NHL <span>Teams Available</span></a></li>
            </ul>
            <div id="section-1" class="tab-content col-8">
                <div class="liga-t scroll-table">
                    <table class="table-striped">
                        <tr class="t-h"><td class="t-c">Pos</td><td>Team</td></tr>
                        <?php
                        $i = 0;
                        foreach ($pg['data'] as $info) {

                            if ($info['sport'] == "NBA") {
                                $i++;


                                echo '<tr><td class="t-c">' . $i . '</td><td class="selected"><a>' . $info['name'] . '</a></td></tr>';
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div id="section-2" class="tab-content col-8">
                <div class="liga-t scroll-table">
                    <table class="table-striped">
                        <tr class="t-h"><td class="t-c">Pos</td><td>Team</td></tr>
                        <?php
                        $i = 0;
                        foreach ($pg['data'] as $info) {

                            if ($info['sport'] == "NFL") {
                                $i++;

                                echo '<tr><td class="t-c">' . $i . '</td><td class="selected"><a>' . $info['name'] . '</a></td></tr>';
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div id="section-3" class="tab-content col-8">
                <div class="liga-t scroll-table">
                    <table class="table-striped">
                        <tr class="t-h"><td class="t-c">Pos</td><td>Team</td></tr>
                        <?php
                        $i = 0;
                        foreach ($pg['data'] as $info) {

                            if ($info['sport'] == "MLB") {
                                $i++;

                                echo '<tr><td class="t-c">' . $i . '</td><td class="selected"><a href="#'.$info['ID'].'">' . $info['name'] . '</a></td></tr>';
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div id="section-4" class="tab-content col-8">
                <div class="liga-t scroll-table">
                    <table class="table-striped">
                        <tr class="t-h"><td class="t-c">Pos</td><td>Team</td></tr>
                        <?php
                        $i = 0;
                        foreach ($pg['data'] as $info) {

                            if ($info['sport'] == "NHL") {
                                $i++;
                                echo '<tr><td class="t-c">' . $i . '</td><td class="selected"><a>' . $info['name'] . '</a></td></tr>';
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>

            <br>
            <div class="players">
                <div class="col-4">
                    <div class="our">
                        <h3><span>our</span> players</h3>
                    </div>
                    <select class="all-team">
                        <option>Your Team</option>
                        <option>Team 1</option>
                        <option>Team 2</option>
                        <option>Team 3</option>
                    </select>
                </div>
                <div class="col-8">
                    <div class="slider1">
                        <div class="slide col-4"><img src="http://placehold.it/157x177" alt=""/><div class="player-name"><a href="roster.php">Placeholder</a><p>Placeholder</p></div></div>
                        <div class="slide col-4"><img src="http://placehold.it/157x177" alt=""/><div class="player-name"><a href="roster.php">Placeholder</a><p>Placeholder</p></div></div>
                        <div class="slide col-4"><img src="http://placehold.it/157x177" alt=""/><div class="player-name"><a href="roster.php">Placeholder</a><p>Placeholder</p></div></div>
                        <div class="slide col-4"><img src="http://placehold.it/157x177" alt=""/><div class="player-name"><a href="roster.php">Placeholder</a><p>Placeholder</p></div></div>
                        <div class="slide col-4"><img src="http://placehold.it/157x177" alt=""/><div class="player-name"><a href="roster.php">Placeholder</a><p>Placeholder</p></div></div>
                        <div class="slide col-4"><img src="http://placehold.it/157x177" alt=""/><div class="player-name"><a href="roster.php">Placeholder</a><p>Placeholder</p></div></div>
                        <div class="slide col-4"><img src="http://placehold.it/157x177" alt=""/><div class="player-name"><a href="roster.php">Placeholder</a><p>Placeholder</p></div></div>
                        <div class="slide col-4"><img src="http://placehold.it/157x177" alt=""/><div class="player-name"><a href="roster.php">Placeholder</a><p>Placeholder</p></div></div>
                    </div>
                </div>
            </div>

        </div>
</section>

<!-- Libs -->
<script src="js/libs/jquery-1.10.2.min.js"></script>
<script src='js/libs/jquery.flexslider-min.js'></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="js/libs/jquery.bxslider.min.js"></script>
<script src="js/pageLoader.js"></script>
<script src="js/scripts.js"></script>
<script src="js/libs/jquery.pietimer.min.js"></script>
<script src="js/drafting.js"></script>