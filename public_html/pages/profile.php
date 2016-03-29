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
        "2" => "teams",
        "3" => "temp_invite"
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
}
?>
<section id="services">
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

        <div class="row text-center grey-area">
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
                <h4 class="create-header">League Names & Invitations</h4>
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
                    $i = 0; //Do not remove
                    foreach ($leagues as $league_name) {

                        /*
                         * Display the number of people invited per league
                         */
                        $table = array("0" => "temp_invite");
                        $fields = array("0" => "league_id");
                        $value = array("0" => $league_name['id']);
                        $option = "1";
                        $get_number_of_invitations = $pg['functions']->GetNumberOfRows($table, $fields, $value, $option);
                        $get_number_of_invitations = $pg['functions']->SetNumberOfRows();
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
                                <a href="#<?= $league_name['id'] ?>" class="league_name"><?= $league_name['league_name'] ?></a>

                                <!--Number of people invited in each league--->
                                <span class="badge"><?= $get_number_of_invitations; ?></span>
                                <a href="loader.php?cmd=profile&ssid=<?= $_GET['ssid'] ?>&id=<?= $league_name['id'] ?>"><i class="fa fa-trash-o delete_color del_logo" data-toggle="tooltip" data-placement="top" title="Delete League"></i></a>


                            </li>
                        </ul>  
                        <?php
                        if ($get_number_of_invitations != "0") {
                            ?>
                            <!-- Table -->

                            <table class="table table-bordered table-hover members" id="team_members_name<?= $i ?>" style="display: none;">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                /*
                                 * @author: Rostom
                                 * Desc: gets the team members invited by league owner and displays them under the league name
                                 * 03/15/2016
                                 */
                                $table = array("0" => "temp_invite");
                                $field = array("0" => "league_id");
                                $value = array("0" => $league_name['id']);
                                $option = "1";
                                $option2 = "0";
                                unset($pg['functions']->_data);
                                $get_team_members_info = $pg['functions']->CheckIfExists($table, $field, $value, $option, $option2);
                                $get_team_members_info = $pg['functions']->SetDataQuery();
                                ?>
                                <?php
                                foreach ($get_team_members_info as $team_member) {
                                    ?>
                                    <tr>

                                        <td><?= $team_member['name']; ?></td>
                                        <td><a href="mailto:<?= $team_member['email']; ?>" data-toggle="tooltip" data-placement="top" title="click to send email"><?= $team_member['email']; ?></a></td>
                                        <?php
                                        $status = ($team_member['status'] == "0") ? "fa-minus-circle" : "fa-check-circle";
                                        $class = ($team_member['status'] == "0") ? "member-status-off" : "member-status-on";
                                        ?>
                                        <td class="<?= $class; ?>"><i class="fa <?= $status ?>"></i></td>
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
                if ($league_name['league_name'] == NULL) {
                    ?>
                    <p class="h4" >You do not have any leagues currently. </p>

                    <?php
                }
                ?>


            </div>

        </div>
    </div>
</section>



