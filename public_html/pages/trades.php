<section id="trades">
    <div class="container">
        <div class="slider4"></div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Trades</h2>
                <h3 class="section-subheading text-muted">Let's Make a Deal</h3>
                <input type="hidden" name="ssid" value="<?= $_GET['ssid'] ?>" id="ssid"/>
                <input type="hidden" name="leagueid" value="<?= $_GET['leagueid'] ?>" id="leagueid"/>
                <input type="hidden" name="oppteamid" value="<?=$_GET['oppteamid'] ?>" id="oppteamid"/>
            </div>
        </div>
        <div class="row" id="main-content">
            <div class="col-lg-12">
                <table class="table">
                    <tr>
                        <th>Teams</th>
                        <th>Sport</th>
                        <th>GP</th>
                        <th>Wins</th>
                        <th>Loses</th>
                        <th>Win Pct</th>
                    </tr>
                    <tbody id="tradebody">
                        <?php
                              $jsonData = json_decode($pg['pool']);
                              $jsonRoster = json_decode($pg['roster']);
                              foreach($jsonData as $j){
                                  foreach($jsonRoster as $r){
                                      if($j[0] == $r){
                                          echo "<tr class='my-team' id=".$j[0]."><td><img class='roster-img' src='../assets/".$j[3]."'>".$j[1]."</td><td>".$j[2]."</td><td>".$j[4]."</td><td>".$j[5]."</td><td>".$j[6]."</td><td>".$j[7]."</td></tr>";
                                      }
                                  }
                              }
                        ?>
                    </tbody>
                </table>
                <br>
                 <div class="col-lg-12">
                     <div class="btn-group">
                        <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown">
                          Select a team to trade with <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" id="teamlist">
                            <?php
                                $teamsID = json_decode($pg['teamsID']);
                                foreach($teamsID as $t){       
                                    echo '<li><a href="#" class="tradelist" id='.$t[0].'>'.$t[1].'</a></li>';
                                }
                            ?>
                        </ul>
                      </div> 
                     <br>
                     <br>
                     <?php
                        if(isset($_GET['oppteamid'])){
                            $trades = json_decode($pg['teamMembers']);
                            foreach($trades as $t){
                                if($_GET['oppteamid'] == $t[0]){
                                    echo '<h2>'.$t[1].'</h2>';
                                    break;
                                }
                            }
                            ?>
                            <table class="table" id="selectTable">
                                <tr>
                                    <th>Teams</th>
                                    <th>Sport</th>
                                    <th>GP</th>
                                    <th>Wins</th>
                                    <th>Loses</th>
                                    <th>Win Pct</th>
                                </tr>
                                <tbody id="addbody">
                                    <?php
                                      foreach($jsonData as $j){
                                          foreach($trades as $t){
                                              if($j[0] == $t[2] && $t[0] == $_GET['oppteamid']){
                                                  echo "<tr class='other-team' id=".$j[0]."><td><img class='roster-img' src='../assets/".$j[3]."'>".$j[1]."</td><td>".$j[2]."</td><td>".$j[4]."</td><td>".$j[5]."</td><td>".$j[6]."</td><td>".$j[7]."</td></tr>";
                                              }
                                          }
                                      }
                                    ?>
                                </tbody>
                            </table>
                            <Br>
                            <button id="completeTrade" class="btn btn-lg">Complete</button>
                            <span class='error'></span>
                            <?php
                        }
                     ?>

            </div>
        </div>
    </div>
</section>
