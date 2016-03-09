<section id="draft">
    <div class="container main">

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
                    <span id="selected-team">Team Name</span> 
                    <span id="selected-league">NBA</span>

                    <div class="selected-info">
                        <img src="<?= ABSOLUTH_PATH_IMAGES ?>nba/lakers.jpg"  id="selected-logo">
                        <span id="selected-stats">
                            <div id="stat-box">
                                GP: <span id="gp">0</span>
                            </div>                            
                            <div id="stat-box">
                                Wins: <span id="w">0</span>
                            </div>
                            <div id="stat-box">
                                Losses: <span id="l">0</span>
                            </div>
                            <div id="stat-box">
                                Win Pct: <span id="pct">0</span>
                            </div>
                        </span>
                    </div>

                    <div class="selected-buttons">
                        <button class="btn btn-success btn-lg" id="draft-team">Draft Team</button>
                        <button class="btn btn-info btn-lg" id="add-queue">Add to Queue</button>
                    </div>
                </div>

                <div class="list">
                    <table id="myTable" class="table table-bordered dt-responsive nowrap" cellspacing="0">
                        <thead>
                            <th>Team</th>
                            <th>Owner</th>
                            <th>GP</th>
                            <th>Wins</th>
                            <th>Loses</th>
                            <th>Win Pct.</th>
                            <th></th>
                        </thead>
                        <tbody id="table-body"></tbody>
                    </table>
                </div>
                
            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="col-md-2">
                <div class="top-right">
                    <div class="queue-title">Draft Queue</div>
                    <div class="queue-list"></div>
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
