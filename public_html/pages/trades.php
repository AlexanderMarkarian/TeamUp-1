<section id="trades">
    <div class="container">
        <div class="slider4"></div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Trades</h2>
                <h3 class="section-subheading text-muted">Let's Make a Deal</h3>
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
                        <th>ID</th>
                    </tr>
                    <tbody id="tradebody">
                        <?php
                              $jsonData = json_decode($pg['pool']);
                              $jsonRoster = json_decode($pg['roster']);
                              foreach($jsonData as $j){
                                  foreach($jsonRoster as $r){
                                      if($j[0] == $r){
                                          echo "<tr class='my-team' id=".$j[0]."><td><img class='roster-img' src='../assets/".$j[3]."'>".$j[1]."</td><td>".$j[2]."</td><td>".$j[4]."</td><td>".$j[5]."</td><td>".$j[6]."</td><td>".$j[7]."</td><td>".$j[0]."</td></tr>";
                                      }
                                  }
                              }
                        ?>
                    </tbody>
                </table>
                <br>
                 <div class="col-lg-12">
                     <ul class="nav nav-tabs grey-area" id="myTab">
                        <?php
                            $teamsID = json_decode($pg['teamsID']);
                            $count = 1;
                            foreach($teamsID as $t){       
                                if($count == 1)
                                    echo '<li class="active"><a data-toggle="tab" href="#section'.$count.'" class="tradelist" id='.$t[0].'>'.$t[1].'</a></li>';
                                else
                                    echo '<li><a data-toggle="tab" href="#section'.$count.'" class="tradelist" id='.$t[0].'>'.$t[1].'</a></li>';
                                $count++;
                            }
                        ?>
                     </ul>
                     <div class="tab-content">
                        
                    </div>
 <!--
                <table class="table" id="selectTable" style="display:none">
                    <tr>
                        <th>Teams</th>
                        <th>Sport</th>
                        <th>GP</th>
                        <th>Wins</th>
                        <th>Loses</th>
                        <th>Win Pct</th>
                        <th>ID</th>
                    </tr>
                    <tbody id="addbody"></tbody>
                </table>
 -->
            </div>
        </div>
    </div>
</section>
