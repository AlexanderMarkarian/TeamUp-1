<section id="draft">
    <div class="container main">

        <div class="row">

            <!-- LEFT SIDEBAR -->
            <div class="col-md-2">

                <div class="top-left">
                    <div class="time">02:00</div>
                    <div class="clock-time">On the clock</div>
                    <div class="clock">
                        <span class="clock-team"></span>
                        <br>
                    </div>
                </div>
                <div class="draft-queue">
                    <table class="queue-title">
                        <thead>
                            <th>Taken Teams</th>
                        </thead>
                        <tbody class="queue-list"></tbody>
                    </table>        
                </div>
            </div>

            <!-- MIDDLE SECTION -->
            <div class="col-md-8">
                <div class="top-middle">
                    <div id="main-box">
                        <span id="selected-team"></span> 
                        <span id="selected-league"></span>

                        <div class="selected-info">
                            <img id="selected-logo">
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
                        </div>
                    </div>
                    <div id="intro-box">
                        Welcome to TeamUp Draft 
                        <br>
                        Your Draft Begins in <span id='draft-time'></span>
                    </div>
                </div>

                <div class="row">
                    <div class="list table-responsive">
                        <table id="myTable" class="table table-bordered dt-responsive table-responsive nowrap" cellspacing="0">
                            <thead>
                                <th>Team</th>
                                <th>Sport</th>
                                <th>Owner</th>
                                <th>GP</th>
                                <th>Wins</th>
                                <th>Loses</th>
                                <th>Win Pct.</th>
                            </thead>
                            <tbody id="table-body">
                                <?php
                                   $jsonData = json_decode($pg['pool']);
                                    foreach($jsonData as $j){
                                         echo "<tr class='teams' id=".$j[0]."><td>".$j[1]."</td><td>Free Agent</td><td>".$j[3]."</td><td>".$j[4]."</td><td>".$j[5]."</td><td>".$j[6]."</td><td>".$j[7]."</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="col-md-2 top-right">
                <table class="round-section">
                    <thead>
                        <th>Round 1</th>
                    </thead>
                    <tbody class="odd_round">
                    </tbody>
                    <thead>
                        <th>Round 2</th>
                    </thead>
                    <tbody class="even_round">
                    </tbody>
                    <thead>
                        <th>Round 3</th>
                    </thead>
                    <tbody class="odd_round">
                    </tbody>
                    <thead>
                        <th>Round 4</th>
                    </thead>
                    <tbody class="even_round">
                    </tbody>
                    <thead>
                        <th>Round 5</th>
                    </thead>
                    <tbody class="odd_round">
                    </tbody>
                    <thead>
                        <th>Round 6</th>
                    </thead>
                    <tbody class="even_round">
                    </tbody>
                </table>        
            </div>
        </div>
    </div>
</section>
