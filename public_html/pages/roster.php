<section id="team">
    <div id="load_screen" style="visibility:hidden">
        <img id="image" src="<?= ABSOLUTH_PATH_IMAGES . "other/loading.gif" ?>">
    </div>
    <div id="main">
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
                        <h4 id="1610612747" class="teamInfo">Los Angeles Lakers</h4>
                        <p class="text-muted">NBA</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/kings.jpg" alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                        <h4 id="1610612758" class="teamInfo">Sacramento Kings</h4>
                        <p class="text-muted">NBA</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/spurs.jpg"alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                        <h4 id="1610612759" class="teamInfo">San Antonio Spurs</h4>
                        <p class="text-muted">NBA</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/clippers.jpg" alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                        <h4 id="1610612746" class="teamInfo">Los Angeles Clippers</h4>
                        <p class="text-muted">NBA</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/warriors.jpg" alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                        <h4 id="1610612744" class="teamInfo">Golden State Warriors</h4>
                        <p class="text-muted">NBA</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/bucks.jpg" alt="<?= $info['name'] ?>" class="roster-img img-responsive img-circle" alt="">
                        <h4 id="1610612749" class="teamInfo">Milwaukee Bucks</h4>
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
                        <h4 id="1610612757" class="teamInfo">Portland TrailBlazers</h4>
                        <p class="text-muted">NBA</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/suns.jpg" class="img-responsive img-circle" alt="">
                        <h4 id="1610612756" class="teamInfo">Phoenix Suns</h4>
                        <p class="text-muted">NBA</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/timberwolves.jpg" class="img-responsive img-circle" alt="">
                        <h4 id="1610612750" class="teamInfo">Minnesota Timberwolves</h4>
                        <p class="text-muted">NBA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="mainInfo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2">
                        <span class="fa-backward">Back</span>
                    </div>
                    <div class="col-md-10 heading"></div>
                    <table class="scoreboard">
                        <caption class="cap"><span id="season"></span> Season Stats</caption>
                        <thead>
                            <th>GP</th>
                            <th>Wins</th>
                            <th>Loses</th>    
                            <th>Win Pct.</th>  
                            <th>MIN</th> 
                            <th>FGM</th>    
                            <th>FGA</th>    
                            <th>FG%</th>    
                            <th>3PM</th>    
                            <th>3PA</th>    
                            <th>3P%</th>    
                            <th>FTM</th>    
                            <th>FTA</th>    
                            <th>FT%</th>    
                            <th>OREB</th>   
                            <th>DREB</th>   
                            <th>REB</th>    
                            <th>AST</th>    
                            <th>TOV</th>    
                            <th>STL</th>    
                            <th>BLK</th>     
                        </thead>
                        <tbody id="info">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
