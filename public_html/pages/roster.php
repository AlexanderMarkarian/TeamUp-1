<section id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Team Name</h2>
                <h3 class="section-subheading text-muted">Starting Lineup</h3>
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
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/lakers.jpg" alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                    <h4>Los Angeles Lakers</h4>
                    <p class="text-muted">NBA</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/kings.jpg" alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                    <h4>Sacramento Kings</h4>
                    <p class="text-muted">NBA</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/spurs.jpg"alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                    <h4>San Antonio Spurs</h4>
                    <p class="text-muted">NBA</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/clippers.jpg" alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                    <h4>Los Angeles Clippers</h4>
                    <p class="text-muted">NBA</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/warriors.jpg" alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                    <h4>Golden State Warriors</h4>
                    <p class="text-muted">NBA</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/bucks.jpg" alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                    <h4>Milwaukee Bucks</h4>
                    <p class="text-muted">NBA</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Bench</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/blazers.jpg" class="img-responsive img-circle" alt="">
                    <h4>Portland TrailBlazers</h4>
                    <p class="text-muted">NBA</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/suns.jpg" class="img-responsive img-circle" alt="">
                    <h4>Phoenix Suns</h4>
                    <p class="text-muted">NBA</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/timberwolves.jpg" class="img-responsive img-circle" alt="">
                    <h4>Minnesota Timberwolves</h4>
                    <p class="text-muted">NBA</p>
                </div>
            </div>
        </div>
    </div>
</section>
