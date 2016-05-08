<section id="team">
    <div id="load_screen" style="visibility:hidden">
        <img id="image" src="<?= ABSOLUTH_PATH_IMAGES . "other/loading.gif" ?>">
    </div>
    <div id="main">
        <div class="container">
            <div class="slider4"></div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo $pg['teamName']; ?></h2>
                    <h3 class="section-subheading text-muted">4th Place</h3>
                    <input type="hidden" name="ssid" value="<?= $_GET['ssid'] ?>" id="ssid"/>
                    <input type="hidden" name="leagueid" value="<?= $_GET['leagueid'] ?>" id="leagueid"/>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>Teams</th>
                    <th>Status</th>
                    <th>Sport</th>
                    <th>GP</th>
                    <th>Wins</th>
                    <th>Loses</th>
                    <th>Win Pct</th>
                    <th>ID</th>
                </tr>
                <tbody id="drag-area">
                    <?php
                        $jsonData = json_decode($pg['data']);
                        $jsonRoster = json_decode($pg['roster']);
                        foreach($jsonData as $j){
                            foreach($jsonRoster as $r){
                                if($j[0] == $r){
                                    echo "<tr><td><img class='roster-img' src='../assets/".$j[3]."'>".$j[1]."</td><td>Starting</td><td>".$j[2]."</td><td>".$j[4]."</td><td>".$j[5]."</td><td>".$j[6]."</td><td>".$j[7]."</td><td>".$j[0]."</td></tr>";
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
           <?php
                $tradeOffers = json_decode($pg['trades']);
                $incomingTrades = json_decode($pg['incoming']);
                
                if($tradeOffers != NULL){
                    ?>
                    <Br><br>
                    <h2>Your Requested Trades</h2>
                    <table class="table">
                        <tr>
                            <th>To</th>
                            <th>Offering Team</th>
                            <th>Requested Team</th>
                            <th></th>
                        </tr>
                        <tbody>
                            <?php
                                foreach($tradeOffers as $to){
                                    $offeringTeam = '';
                                    $requestedTeam = '';
                                    foreach($jsonData as $j){
                                        if($j[0] == $to[1]){
                                            $offeringTeam = $j[1];
                                        }
                                        else if($j[0] == $to[2]){
                                            $requestedTeam = $j[1];
                                        }
                                    } 
                                    ?>
                                    <tr class="nohover" id='<?= $to[3] ?>'>
                                        <td><?= $to[0] ?></td>
                                        <td><?= $offeringTeam ?></td>
                                        <td><?= $requestedTeam ?></td>
                                        <td>
                                            <button class="btn btn-danger cancelTrade">Cancel Trade</button>
                                        </td>
                                    </tr>
                                    <?php
                                }

                            ?>
                        </tbody>
                    </table>
                    <?php
                }
                
                if($incomingTrades != NULL){
                    ?>
                    <br><br>
                    <h2>Incoming Trade Offers</h2>
                    <table class="table">
                        <tr>
                            <th>From</th>
                            <th>Requested Team</th>
                            <th>Offering Team</th>
                            <th></th>
                        </tr>
                        <tbody class="nohover">
                            <?php
                                foreach($incomingTrades as $to){
                                    $offeringTeam = '';
                                    $requestedTeam = '';
                                    foreach($jsonData as $j){
                                        if($j[0] == $to[1]){
                                            $offeringTeam = $j[1];
                                        }
                                        else if($j[0] == $to[2]){
                                            $requestedTeam = $j[1];
                                        }
                                    } 
                                    ?>
                                    <tr class="nohover" id='<?= $to[3] ?>'>
                                        <td><?= $to[0] ?></td>
                                        <td><?= $offeringTeam ?></td>
                                        <td><?= $requestedTeam ?></td>
                                        <td>
                                            <button class="btn btn-success approveTrade">Approve Trade</button>
                                            <button class="btn btn-warning declineTrade">Decline Trade</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php
                }
            ?>
        </div>
    </div>
</section>

