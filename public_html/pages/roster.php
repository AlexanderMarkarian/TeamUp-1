<section id="team">
    <div id="load_screen" style="visibility:hidden">
        <img id="image" src="<?= ABSOLUTH_PATH_IMAGES . "other/loading.gif" ?>">
    </div>
    <div id="main">
        <div class="container">
            <div class="slider4"></div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Team Name</h2>
                    <h3 class="section-subheading text-muted">4th Place</h3>
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
                        $jsonData = json_decode($pg['pool']);
                        $jsonRoster = json_decode($pg['roster']);
                        foreach($jsonData as $j){
                            foreach($jsonRoster as $r){
                                if($j[0] == $r){
                                    echo "<tr><td><img class='roster-img' src='../assets/".$j[2]."'>".$j[1]."</td><td>Starting</td><td>".$j[3]."</td><td>".$j[4]."</td><td>".$j[5]."</td><td>".$j[6]."</td><td>".$j[7]."</td><td>".$j[0]."</td></tr>";
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

