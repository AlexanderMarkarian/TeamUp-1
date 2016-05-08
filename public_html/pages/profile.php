<?php
if (isset($pg['delete_key'])) {
    /*
     * Delete tables with league information
     * 1. leagues
     * 2. league_user
     * 3. teams
     * 4. temp_invite
     */
    $tables = array(
        "0" => "leagues",
        "1" => "league_user",
    );
    $fields = array(
        "0" => "id",
        "1" => "league_id",
        "2" => "parent",
        "3" => "league_id"
    );
    $values = array(
        "0" => $pg['delete_key']
    );

    $delete_leagues = $pg['functions']->DeleteItems($tables, $fields, $values);
    
    $tables = array(
        "0" => "points"
    );
    
    $fields = array(
        "0" => "league_id"
    );
    
    $values = array(
        "0" => $pg['delete_key']
    );
    $delete_leagues = $pg['functions']->DeleteItems($tables, $fields, $values);
}
?>
<section id="services">
    <input type="hidden" name="ssid" value="<?= $_GET['ssid'] ?>" id="ssid"/>
    <div class="container">
        <div class="slider4"></div>
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

        <h3>League Info</h3>
        <div class="row text-center grey-area">
            <div class="col-md-4">
                <h4 class="create-header">Create League</h4>
                <?php
//$pg['forms']->CreateLeagueProcess($pg['create_league']);
                echo $pg['forms']->CreateLeague();
                ?>

            </div>
            <div class="col-md-4">
                <h4 class="create-header">Add League Members</h4>
                <?php
                /*
                 * Invite Form + InvitememberProcess Data coming from loader.php 
                 */

                echo $pg['forms']->InviteTeamMembers($pg['data']);
// echo $pg['forms']->InviteMembersProcess($pg['invite']);
                ?>
                <script type='text/javascript' src='<?= ABSOLUTH_PATH_JS ?>ajax_proccess.js'></script>
            </div>
            <div class="col-md-4">
                <h4>Join League</h4>
                <?php
                    echo $pg['forms']->JoinLeague();
                ?>
            </div>


        </div>
        <h3>My Leagues</h3>
        <div class="row text-center grey-area">
            <div class="col-md-6">
                <h4 class="create-header">Active Leagues</h4>
                <p>Click on a league name to go to its homepage</p>
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
                $leagues = $pg['functions']->CheckIfExists($tables, $fields, $required_fields, $option = "3", $option2 = "0");
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
                <div class="col-lg-12">
                    <!---- Do Not Remove for the drop downs R.S. 03152016 ---->
                    <script>
                        $(document).ready(function () { // document ready hide the minus icon
                            $(".p_sign").show();
                            $(".m_sign").hide();

                            $("a.p_sign").click(function () { //When the plus icon is clicked

                                var change = this.id;
                                var minus = change.replace("plus_sign", "minus_sign");
                                var num = minus.toString().substring(10);
                                var team_members = document.getElementById("team_members_name" + num);
                                $("#" + minus).show();
                                $("#" + change).hide();
                                $(team_members).show();
                            });
                            $("a.m_sign").click(function () { //When the minus icon is clicked
                                var change = this.id;
                                var plus = change.replace("minus_sign", "plus_sign");
                                var num = plus.toString().substring(9);
                                var team_members = document.getElementById("team_members_name" + num);
                                $("#" + plus).show();
                                $("#" + change).hide();
                                $(team_members).hide();

                            });

                        });

                    </script>
                    <?php
                        $i = 0;
                        $userleagues = json_decode($pg['user_leagues']);
                        foreach($userleagues as $u){
                            $get_number = $pg['functions']->GetUsersPerLeague($u[0]);
                            ?>
                            <ul class="list-group">
                                <li class="list-group-item league_list">

                                    <!--- Collapse or Close-------->
                                    <a href="#drop" class="p_sign" id="plus_sign<?= $i ?>" title="Click to open">
                                        <i class="fa fa-plus drop_logo l_plus" ></i> 
                                    </a>
                                    <a href="#close"  class="m_sign" id="minus_sign<?= $i ?>"  title="Click to close">
                                        <i class="fa fa-minus drop_logo l_minus"></i>
                                    </a>
                                    <!--- League name and Id--->
                                    <a href="loader.php?cmd=home&ssid=<?= $_GET['ssid']?>&leagueid=<?= $u[0] ?>" class="league_name <?= $u[0] ?>"><?= $u[2] ?></a>

                                    <!--Number of people invited in each league--->
                                    <span class="badge"><?= $get_number; ?></span>
                                    
                                    <?php
                                        if($u[1] == 1){
                                            ?>
                                            <a href="loader.php?cmd=profile&ssid=<?= $_GET['ssid'] ?>&id=<?= $u[0] ?>"><i class="fa fa-trash-o delete_color del_logo" data-toggle="tooltip" data-placement="top" title="Delete League"></i></a>
                                            <a><i class="fa fa-pencil delete_color del_logo" id='<?= $u[0] ?>' data-toggle="tooltip" data-placement="top" title="Rename League"></i></a>
                                            <?php
                                        }
                                        else{
                                            
                                        }
                                    ?>
                                   
                                </li>
                            </ul> 
                            <?php
                            if ($get_number != "0") {
                            ?>
                            <!-- Table -->

                                <table class="table table-bordered table-hover members" id="team_members_name<?= $i ?>" style="display: none;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php
                                    $value = $u[0];

                                    $get_team_members_info = $pg['functions']->GetLeagueInfo($value, $_GET['ssid']);
                                    ?>
                                    <?php

                                    foreach ($get_team_members_info as $team_member) {
                                        ?>
                                        <tr>

                                            <td><?= $team_member[0]; ?></td>
                                            <td><a href="mailto:<?= $team_member['email']; ?>" data-toggle="tooltip" data-placement="top" title="click to send email"><?= $team_member[1]; ?></a></td>
                                            <?php
                                            if($u[1] == 1){
                                               $id = ($team_member[2] != $_GET['ssid']) ? $team_member[3] : "";
                                               $status = ($team_member[2] != $_GET['ssid']) ? "fa-trash-o" : "fa-user";
                                            }
                                            else{
                                              $status = ($team_member[2] != $_GET['ssid']) ? "fa-minus-circle" : "fa-user"; 
                                            }

                                            $class = ($team_member[2] != $_GET['ssid']) ? "member-status-off" : "member-status-on";
                                            ?>
                                            <td class="<?= $class; ?>"><i class="fa <?= $status ?>" id="<?= $id ?>"></i></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                <?php
                            } else {
                                ?>
                                <p class="h6 members" id="team_members_name<?= $i ?>" style="display: none;">you have not invited any one to <?= $league_name['league_name']; ?> .</p>
                                <?php
                            }
                            $i++;
                        }
                    ?>
                </div>
                <?php
                if ($u[1] == NULL) {
                    ?>
                    <p class="h4" >You do not have any leagues currently. </p>

                    <?php
                }
                ?>
            </div>
            <div class="col-md-6">
                <h4 class="create-header">Finished Leagues</h4>
            </div>
        </div>
    </div>
</section>



