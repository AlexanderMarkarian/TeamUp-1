<section id="draft">
    <div class="container">

        <div class="row">

            <!-- LEFT SIDEBAR -->
            <div class="col-md-2">

                <div class="top-left">
                    <div class="time">0:00</div>
                    <div class="clock-time">On the clock</div>
                    <div class="clock">
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                        <span class="clock-team">Team A</span>
                    </div>
                </div>

                <div class="middle-left">
                    <div class="round">Round 1</div>
                    <div class="round-section">
                        <div class="round-item">
                            <span class="round-number">32.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team B</span>
                        </div>
                        <div class="round-item">
                            <span class="round-number">33.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team C</span>
                        </div>
                        <div class="round-item">
                            <span class="round-number">34.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team D</span>
                        </div>
                    </div>
                    <div class="round">Round 2</div>
                    <div class="round-section">
                        <div class="round-item">
                            <span class="round-number">32.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team B</span>
                        </div>
                        <div class="round-item">
                            <span class="round-number">33.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team C</span>
                        </div>
                        <div class="round-item">
                            <span class="round-number">34.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team D</span>
                        </div>
                    </div>
                    <div class="round">Round 3</div>
                    <div class="round-section">
                        <div class="round-item">
                            <span class="round-number">32.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team B</span>
                        </div>
                        <div class="round-item">
                            <span class="round-number">33.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team C</span>
                        </div>
                        <div class="round-item">
                            <span class="round-number">34.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team D</span>
                        </div>
                    </div> 
                    <div class="round">Round 4</div>
                    <div class="round-section">
                        <div class="round-item">
                            <span class="round-number">32.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team B</span>
                        </div>
                        <div class="round-item">
                            <span class="round-number">33.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team C</span>
                        </div>
                        <div class="round-item">
                            <span class="round-number">34.</span>
                            <img src="<?= ABSOLUTH_PATH_IMAGES ?>other/icon.png" class="round-image">
                            <span class="round-name">Team D</span>
                        </div>
                    </div>                                       
                </div>
            </div>

            <!-- MIDDLE SECTION -->
            <div class="col-md-8">
                <div class="top-middle">
                    <span id="selected-team">Los Angeles Lakers </span> 
                    <span id="selected-league">NBA</span>

                    <div class="selected-info">
                        <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/lakers.jpg"  id="selected-logo">
                        <span id="selected-stats">
                            <div id="stat-box">
                                Rank: <span>19</span>
                            </div>                            
                            <div id="stat-box">
                                Wins: <span>43</span>
                            </div>
                            <div id="stat-box">
                                Losses: <span>17</span>
                            </div>
                            <div id="stat-box">
                                Win Pct: <span>0.65</span>
                            </div>
                        </span>
                    </div>

                    <div class="selected-buttons">
                        <button class="btn btn-success btn-lg">Draft Team</button>
                        <button class="btn btn-info btn-lg">Add to Queue</button>
                    </div>
                </div>


                <div class="middle-middle well">
                    <div style="float:left">
                        <button class="btn btn-default">All</button>
                        <button class="btn btn-default">NBA</button>
                        <button class="btn btn-default">NFL</button>
                        <button class="btn btn-default">MLB</button>
                        <button class="btn btn-default">NHL</button>
                    </div>
                    <div style="float:right">
                        <span class="input-group">
                            <input type="text" class="form-control" placeholder="Search For Team...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span>Go</span>
                                </button>
                            </span>
                        </span>
                    </div>
                </div>


                <div class="bottom-middle">
                    <table class="table table-responsive">
                        <thead>
                          <tr>
                            <th>Rank</th>
                            <th>Team</th>
                            <th>League</th>
                            <th>2015 Stats</th>
                            <th>Add</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                foreach ($pg['data'] as $info) {

                                    if ($info['sport'] == "NBA") {
                                        $i++;
                                        echo '<tr><td>' . $i . '</td><td class="selected">' . $info['name'] . '</td><td>NBA</td><td></td><td><button class="btn btn-danger">+</button></td> </tr>';
                                    }
                                }
                            ?>
                            <?php
                                $i = 0;
                                foreach ($pg['data'] as $info) {

                                    if ($info['sport'] == "NFL") {
                                        $i++;
                                        echo '<tr><td>' . $i . '</td><td class="selected">' . $info['name'] . '</td><td>NFL</td><td></td><td><button class="btn btn-danger">+</button></td> </tr>';
                                    }
                                }
                            ?>
                            <?php
                                $i = 0;
                                foreach ($pg['data'] as $info) {

                                    if ($info['sport'] == "MLB") {
                                        $i++;
                                        echo '<tr><td>' . $i . '</td><td class="selected">' . $info['name'] . '</td><td>MLB</td><td></td><td><button class="btn btn-danger">+</button></td> </tr>';
                                    }
                                }
                            ?>
                            <?php
                                $i = 0;
                                foreach ($pg['data'] as $info) {

                                    if ($info['sport'] == "NHL") {
                                        $i++;
                                        echo '<tr><td>' . $i . '</td><td class="selected">' . $info['name'] . '</td><td>NHL</td><td></td><td><button class="btn btn-danger">+</button></td> </tr>';
                                    }
                                }
                            ?>
                                                   
                        </tbody>
                      </table>
                </div>
            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="col-md-2">
                <div class="top-right">
                    <div class="queue-title">Draft Queue</div>
                    <div class="queue-list">
                        <div class="queue-item">Golden State Warriors <span class="queue-league"></span></div>
                        <div class="queue-item">Golden State Warriors <span class="queue-league"></span></div>
                    </div>
                </div>
                <div class="middle-right">
                    <div class="history-title">Draft History</div>
                    <div class="history-list">
                        <div class="history-round">Round 1</div>
                        <div class="draft-history">
                            <div class="draft-team">1. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">2. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">3. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">4. L.A. Clippers<span class="draft-league"> NBA</span></div>
                        </div>
                        <div class="draft-round">Round 2</div>
                        <div class="draft-history">
                            <div class="draft-team">1. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">2. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">3. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">4. L.A. Clippers<span class="draft-league"> NBA</span></div>
                        </div>
                        <div class="draft-round">Round 3</div>
                        <div class="draft-history">
                            <div class="draft-team">1. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">2. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">3. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">4. L.A. Clippers<span class="draft-league"> NBA</span></div>
                        </div>
                        <div class="draft-round">Round 4</div>
                        <div class="draft-history">
                            <div class="draft-team">1. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">2. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">3. L.A. Clippers<span class="draft-league"> NBA</span></div>
                            <div class="draft-team">4. L.A. Clippers<span class="draft-league"> NBA</span></div>
                        </div>                        
                    </div>
                </div>
                <!--
                <div class="bottom-right">
                    <div class="roster-title">Current Rosters</div>
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Dropdown
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    <div class="draft-history">
                        <div class="draft-team">1. L.A. Clippers<span> NBA</span></div>
                    </div>
                </div>
                -->
            </div>
        </div>

    </div>

</section>
