<section id="draft">
    <div class="container main">
        <input type="hidden" id="ssid" value="<?= $_GET['ssid']; ?>"/>
        <input type="hidden" id="leagueid" value="<?= $_GET['leagueid']; ?>"/>

        <div class="row">

            <!-- LEFT SIDEBAR -->
            <div class="col-md-2">

                <div class="top-left">
                    <div class="time">02:00</div>
                    <div class="clock-time">On the clock:</div>
                    <div class="clock">
                        <span class="clock-team">
                            <?php
                                echo $pg['clock'];
                            ?>
                        </span>
                        <br>
                    </div>
                </div>
                <div class="draft-queue" id="scroll">
                    <table class="queue-title">
                        <thead>
                            <th>Taken Teams</th>
                        </thead>
                        <tbody class="queue-list"> 
                            <?php
                                $taken = json_decode($pg['teamsTaken']);
                                $jsonData = json_decode($pg['pool']);
                                foreach($jsonData as $j){
                                    foreach($taken as $t){
                                        if($t == $j[0]){
                                            echo '<tr><td>'.$j[1].'</td></tr>';
                                        }
                                    }
                                }
                            ?>
                        </tbody>

                    </table>        
                </div>
            </div>

            <!-- MIDDLE SECTION -->
            <div class="col-md-8">
                <div class="top-middle">
                    <div id="main-box">
                        <span class="selected-team"></span> 
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
                            <span class='alert alert-danger' style="display:none">It is not your turn to draft yet!</span>
                            <span class='alert alert-success' style="display:none"></span>
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
                                <th>Owner</th>
                                <th>Sport</th>
                                <th>GP</th>
                                <th>Wins</th>
                                <th>Loses</th>
                                <th>Win Pct.</th>
                            </thead>
                            <tbody id="table-body">
                                <?php
                                    $takenRosters = json_decode($pg['taken']);
                                    $bool = false;
                              
                                    foreach($jsonData as $j){
                                        foreach($takenRosters as $t){
                                            if($t == $j[0]){
                                                $bool = true;
                                            }
                                        }
                                        if(!$bool)
                                            echo "<tr class='teams' name=".$j[3]." id=".$j[0]."><td>".$j[1]."</td><td>Free Agent</td><td>".$j[2]."</td><td>".$j[4]."</td><td>".$j[5]."</td><td>".$j[6]."</td><td>".$j[7]."</td></tr>";

                                        $bool = false;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            
            <?php
                $totalPicks = $pg['totalPicks'];
            ?>

            <!-- RIGHT SIDEBAR -->
            <div class="col-md-2 top-right">
                <table class="round-section">
                    <thead>
                        <th>Round 1</th>
                    </thead>
                    <tbody>
                        <?php
                            $count = 0;
                            $teams = json_decode($pg['draftOrder']);
                            foreach($teams as $team){
                                if($count == $totalPicks){
                                    echo '<tr class="round-item" id='.$count.' style="background:#e74c3c"><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                else{
                                    echo '<tr class="round-item" id='.$count.'><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                $count++;
                            }
                        ?>
                    </tbody>
                    <thead>
                        <th>Round 2</th>
                    </thead>
                    <tbody>
                        <?php
                           $reverse = json_decode($pg['reverseOrder']);
                            foreach($reverse as $team){
                                if($count == $totalPicks){
                                    echo '<tr class="round-item" id='.$count.' style="background:#e74c3c"><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                else{
                                    echo '<tr class="round-item" id='.$count.'><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                $count++;
                            }
                        ?>
                    </tbody>
                    <thead>
                        <th>Round 3</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($teams as $team){
                                if($count == $totalPicks){
                                    echo '<tr class="round-item" id='.$count.' style="background:#e74c3c"><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                else{
                                    echo '<tr class="round-item" id='.$count.'><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                $count++;
                            }
                        ?>
                    </tbody>
                    <thead>
                        <th>Round 4</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($reverse as $team){
                                if($count == $totalPicks){
                                    echo '<tr class="round-item" id='.$count.' style="background:#e74c3c"><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                else{
                                    echo '<tr class="round-item" id='.$count.'><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                $count++;
                            }
                        ?>                        
                    </tbody>
                    <thead>
                        <th>Round 5</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($teams as $team){
                                if($count == $totalPicks){
                                    echo '<tr class="round-item" id='.$count.' style="background:#e74c3c"><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                else{
                                    echo '<tr class="round-item" id='.$count.'><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                $count++;
                            }

                        ?>
                    </tbody>
                    <thead>
                        <th>Round 6</th>
                    </thead>
                    <tbody>
                         <?php
                            foreach($reverse as $team){
                                if($count == $totalPicks){
                                    echo '<tr class="round-item" id='.$count.' style="background:#e74c3c"><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                else{
                                    echo '<tr class="round-item" id='.$count.'><td><span class="round-name">'.$team.'</span></td></tr>';  
                                }
                                $count++;
                            }
                        ?>                         
                    </tbody>
                </table>        
            </div>
        </div>
    </div>
</section>
