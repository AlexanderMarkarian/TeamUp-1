 <section id="add/drop">
    <div class="container" id="addPage">
        <div class="slider4"></div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Add Team</h2>
            </div>
        </div>
      
        
        <div class="row" id="main-content">
            <div class="col-lg-12">
                <div id="addingTeam">
                    <table id="myTable" class="table table-bordered dt-responsive nowrap" cellspacing="0">
                        <thead>
                            <th>Team</th>
                            <th>Status</th>
                            <th>Sport</th>
                            <th>GP</th>
                            <th>Wins</th>
                            <th>Loses</th>
                            <th>Win Pct.</th>
                        </thead>
                        <tbody id="table-body">  
                            <?php
                              $taken = json_decode($pg['taken']);
                              $jsonData = json_decode($pg['data']);
                              $bool = false;
                              
                              foreach($jsonData as $j){
                                  foreach($taken as $t){
                                      if($t == $j[0]){
                                          $bool = true;
                                      }
                                  }
                                  if(!$bool)
                                    echo "<tr class='teams' id=".$j[0]."><td><img class='roster-img' src='../assets/".$j[3]."'>".$j[1]."</td><td>Free Agent</td><td>".$j[2]."</td><td>".$j[4]."</td><td>".$j[5]."</td><td>".$j[6]."</td><td>".$j[7]."</td></tr>"; 
                  
                                  $bool = false;
                              }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     
    </div>
    <div class="container">
        <div class="slider4"></div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Drop Team</h2>
                </div>
            </div>
            <div id="droppingTeam">
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
                    <tbody id="droppingbody">

                        <?php
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
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <button id="completeAdd" class="btn btn-lg">Complete</button>
            <input type="hidden" name="ssid" value="<?= $_GET['ssid'] ?>" id="ssid"/>
            <input type="hidden" name="ssid" value="<?= $_GET['leagueid'] ?>" id="leagueid"/>
            <span class="alert alert-danger" style="display:none"></span>
            <span class="alert alert-success" style="display:none"></span>
        </div>
    </div>
</section>
