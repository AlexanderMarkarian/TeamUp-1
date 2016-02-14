

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Profile</h2>
                <h3 class="section-subheading text-muted">
                    <?php
                    foreach ($pg['data'] as $user_info) {
                        echo $user_info['first_name'] . " " . $user_info['last_name'];
                    }
                    $pg['functions']->DateAndTime();
                    echo "<br/>" . $pg['functions']->ReturnDate();
                    ?>
                </h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Create League</h4>
                <!------------------CREATE LEAGUE FORM GOES HERE ---------------------->
                <?php
                $pg['forms']->CreateLeagueProcess($pg['create_league']);

                echo $pg['forms']->CreateLeague();
                ?>
                <!----------END FORM---------------------------------------->
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-exchange fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">Join League</h4>
                <!----------JOIN LEAGUE FORM GOES HERE----------------->
                <?php
                echo $pg['forms']->JoinLeague();
                ?>
                <!--------------------END FORM------------------------->
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-list fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">My Leagues</h4>
                <?php
                $league_id = $pg['functions']->getDataQuery("league_user", "userid", $user_info['user_id']);
                $league_id['league_id'] = $pg['functions']->SetDataQuery();

                foreach ($league_id['league_id'] as $id) {
                    $leagues = $pg['functions']->getDataQuery("leagues", "id", $id['league_id']);
                    $leagues = $pg['functions']->SetDataQuery();
                }

                foreach ($leagues as $league_name) {
                    ?>
                    <a href="#<?= $league_name['id'] ?>" class="league_name"><?= $league_name['league_name'] ?></a>
                    <?php
                }
                    if ($league_name['league_name'] == NULL) {
                        ?>
                        <p class="h4">You do not have any leagues currently. </p>

                        <?php
                    }
                
                ?>


            </div>
        </div>
    </div>
</section>



