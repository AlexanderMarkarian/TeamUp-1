<section id="home">
	<div class="container">
    <div class="slider4"></div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php
                    $leagueStats = json_decode($pg['league_name']);
                    foreach($leagueStats as $ls){
                        echo "<h2 class='section-heading'>".$ls[0]."</h2>";
                        echo "<h3 class='section-subheading text-muted'>League Ends: ".$ls[1]."</h3>";
                    }
                ?>

                <table id = "standings">
                    <caption>Standings</caption>
                      <thead id ="stand">
                          <tr>
                            <th>Rank</th>
                            <th>Team</th>
                            <th>Total Points</th>
                            <th>NBA</th>
                            <th>NFL</th>
                            <th>NHL</th>
                            <th>MLB</th>
                          </tr>
                      </thead>
                      <tbody id="homebody">
                          <?php
                          
                            $standings = json_decode($pg['league_standings']);
                            $count = 1;
                            foreach($standings as $s){                           
                                echo '<tr id="stand"><td>'.$count.'</td><td>'.$s[0].'</td><td>'.$s[1].'</td><td>'.$s[2].'</td><td>'.$s[3].'</td><td>'.$s[4].'</td><td>'.$s[5].'</td></tr>';
                                $count++;
                            }
                            
                          ?>
                      </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
