
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">

                    <?php
                    foreach ($pg['data'] as $user_info) {
                        echo $user_info['first_name'] . " " . $user_info['last_name'];
                    }
                    ?>
                </h2>
                <h3 class="section-subheading text-muted">
                    <?php
                    $pg['functions']->DateAndTime();
                    echo "<br/>" . $pg['functions']->ReturnDate();
                    ?>  
                </h3>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4">
                <h4 class="create-header">Create League</h4>
                <!------------------CREATE LEAGUE FORM GOES HERE ---------------------->
                <?php
                //$pg['forms']->CreateLeagueProcess($pg['create_league']);
                echo $pg['forms']->CreateLeague();
                ?>

                <!----------END FORM---------------------------------------->
            </div>
            <div class="col-md-4">
                <h4 class="create-header">Add League Members</h4>
                <!----------INVITE PEOPLE TO JOIN LEAGUE FORM GOES HERE----------------->
                <?php
                /*
                 * Invite Form + InvitememberProcess Data coming from loader.php 
                 */

                echo $pg['forms']->InviteTeamMembers($pg['data']);
               // echo $pg['forms']->InviteMembersProcess($pg['invite']);
                ?>
                <script type='text/javascript' src='<?= ABSOLUTH_PATH_JS ?>ajax_proccess.js'></script>
                <!--------------------END FORM------------------------->
            </div>
            <div class="col-md-4">
                <?php
//FOR Universal CHECK
                $tables = array(
                    "0" => "league_user",
                    "1" => "leagues"
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
                $leagues = $pg['functions']->CheckIfExists($tables, $fields, $required_fields, $option = "3");
                $leagues = $pg['functions']->SetDataQuery();
///var_dump($leagues);
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
                <?php
                foreach ($leagues as $league_name) {
                    ?>
                    <div>
                        <a href="#<?= $league_name['id'] ?>" class="league_name"><?= $league_name['league_name'] ?></a>
                        <a href="loader.php?cmd=profile&ssid=<?= $_GET['ssid'] ?>&id=<?= $league_name['id'] ?>"><i class="fa fa-times-circle delete_color" data-toggle="tooltip" data-placement="top" title="Delete League"></i></a>
                    </div>

                    <?php
                }
                ?>

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



