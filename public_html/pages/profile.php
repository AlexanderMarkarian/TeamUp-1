

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
                <h4 class="service-heading">Invite Team Members</h4>
                <!----------INVITE PEOPLE TO JOIN LEAGUE FORM GOES HERE----------------->
                <?php
                echo $pg['forms']->InviteTeamMembers($pg['data']);
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
                //FOR Universal CHECK
                $tables = array(
                    "table0" => "league_user",
                    "table1" => "leagues"
                );
                $fields = array(
                    "0" => "userid",
                    "1" => "id"
                );
                $required_fields = array(
                    "0" => $user_info['user_id'],
                    "1" => "league_id"
                );
                unset($pg['functions']->_data);
                $leagues = $pg['functions']->UniversalCheckValues($tables, $fields, $required_fields, "NOT NULL");
                $leagues = $pg['functions']->SetDataQuery();
                if ($pg['functions']->_flag == 22) {
                    ?>
                    <div class='alert alert-success' role='alert'>
                        <ul>
                            <?php
                            foreach ($pg['functions']->RetMessages() as $ms) {
                                echo "<p class='h5'>" . $ms . "</p>";
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                ?>
                <table class="table table-bordered table-hover">

                    <?php
                    foreach ($leagues as $league_name) {
                        ?>
                        <tr class="">
                            <td>
                                <a href="#<?= $league_name['id'] ?>" class="league_name"><?= $league_name['league_name'] ?></a>
                            </td>
                            <td>
                                <a href="loader.php?cmd=profile&ssid=<?= $_GET['ssid'] ?>&id=<?= $league_name['id'] ?>"><i class="fa fa-times-circle delete_color"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </table>

                <?php
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



