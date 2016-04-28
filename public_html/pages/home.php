<section id="home">
	<div class="container">
    <div class="slider4"></div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading"><?php echo $pg['league_name']; ?></h2>
                <h3 class="section-subheading text-muted">Week 18</h3>

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
                                echo '<tr id="stand"><td>'.$count.'</td><td class="teamleft"><img src="../assets/images/teamlogos/11.png" id="teamlogo" height="33" width="33">'.$s[0].'</td><td>'.$s[1].'</td><td>'.$s[2].'</td><td>'.$s[3].'</td><td>'.$s[4].'</td><td>'.$s[5].'</td></tr>';
                                $count++;
                            }
                          ?>
                      </tbody>
                </table>

                                <table id = "challenge">
                <caption>
                  <img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/trophy.png" ?>" id="teamlogo" height='33' width='33'> Matchups & Challenges
                  <span class="to-right"><i class="space fa fa-arrow-left"></i> Week 18 <i class="space fa fa-arrow-right"></i></span>
                </caption>
                  <tr>
                    <th colspan ="2" align="left" class="put-me-left"> Week 18 MatchUps</th>
                    <th colspan="2" class="put-me-right">in progress</th>
                  </tr>
                  <tr>
                    <td class = "teamright">Supreme Team <img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/11.png" ?>" id="teamlogo" height='33' width='33'>
                    <BR><div class="margin-right">13-4-0 | 1st</div></td>
                    <td>137.20</td>
                    <td>160.75</td>
                    <td class = "teamleft"><img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/drose.jpg" ?>" id="teamlogo" height='33' width='33'> Ferrari Squad
                    <BR><div class="margin-left">12-5-0 | 3rd</div></td>
                  </tr>
                  <tr>
                    <td class = "teamright">Grizzlies Country <img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/grizz.jpg" ?>" id="teamlogo" height='33' width='33'>
                    <BR><div class="margin-right">0-17-0 | 6th</div></td>
                    <td>189.60</td>
                    <td>292.00</td>
                    <td class = "teamleft"><img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/clips.jpg" ?>" id="teamlogo" height='33' width='33'> Lob City Clips
                    <BR><div class="margin-left">9-8-0 | 5th</div></td>
                  </tr>
                  <tr>
                   <td class = "teamright">PHP-Python Beast <img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/green.png" ?>" id="teamlogo" height='33' width='33'>
                   <BR><div class="margin-right">10-7-0 | 4th</div></td>
                    <td>167.50</td>
                    <td>63.15</td> 
                    <td class = "teamleft"><img src="<?= ABSOLUTH_PATH_IMAGES ."teamlogos/star.png" ?>" id="teamlogo" height='33' width='33'> AGBU AllStars
                    <BR><div class="margin-left">13-4-0 | 2nd</div></td>
                  </tr>
                  </tr>
                </table>
            </div>
        </div>
    </div>
</section>
