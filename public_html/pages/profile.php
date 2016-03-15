
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
                <?php
//                $ssl = false;
//                $ret_transfer = true;
//                $option_curl = array(
//                    "0" => CURLOPT_SSL_VERIFYPEER,
//                    "1" => CURLOPT_RETURNTRANSFER,
//                    "2" => CURLOPT_URL
//                );
//                $url = "https://glacial-tor-26990.herokuapp.com/teamStats";
//                $do_get_curl_data = $pg['curl_data']->GetDataFromApi($url, $ssl, $ret_transfer, $option_curl);
//                $do_get_curl_data = $pg['curl_data']->SetDataFromApi();
//                $do_get_curl_data = $pg['curl_data']->DecodeDataFromCurl();
//                $do_get_curl_data = $pg['curl_data']->ReturnDecodedObject();
//                // var_dump($do_get_curl_data);
//                $tables = array("0" => "basketball_data");
//                $fields = array();
//                $values = array();
//                $option = "1";
//                $get_old_data = $pg['functions']->GetALL($tables, $fields, $values, $option);
//                $get_old_data = $pg['functions']->RetGETALL();
//                $file_name = "basketball";
//                $jason_ext = "json";
//                $do_back_up = $pg['curl_data']->DoBackUpOldData($get_old_data, $file_name, $jason_ext);
//                $table = array(
//                    "0" => "basketball_data"
//                );
//                $option_del = "1";
//                $pg['functions']->DeleteALL($table, $option_del);
//
//
//                if ($do_get_curl_data->info != NULL) {
//                    foreach ($do_get_curl_data->info as $team_info) {
//                        // var_dump($team_info);
//                        $all_team_info = array();
//                        $all_team_info['teamID'] = $team_info->teamId;
//                        $all_team_info['teamName'] = $team_info->teamName;
//                        $all_team_info['wins'] = $team_info->w;
//                        $all_team_info['losses'] = $team_info->l;
//
//                        $values_b['values'] = array();
//                        array_push($values_b['values'], "'" . $all_team_info['teamID'] . "'");
//                        array_push($values_b['values'], "'" . $all_team_info['teamName'] . "'");
//                        array_push($values_b['values'], "'" . $all_team_info['wins'] . "'");
//                        array_push($values_b['values'], "'" . $all_team_info['losses'] . "'");
//                        array_push($values_b['values'], "'" . time() . "'");
//
//                        $fields_b = array(
//                            "0" => "teamID",
//                            "1" => "teamName",
//                            "2" => "w",
//                            "3" => "l",
//                            "4" => "created_date",
//                        );
//                        $tables_b = array(
//                            "0" => "basketball_data"
//                        );
//                        $insert_values_b = array(
//                            "values" => $values_b,
//                            "fields" => $fields_b,
//                            "tables" => $tables_b
//                        );
//                        $cmd = "Insert new data from API";
//
//                        $insertion_proccess = $pg['functions']->InsertAPIData($insert_values_b, $cmd);
//                        if ($insertion_proccess) {
//                            $response = array(
//                                "message" => "Cron job ran @" . date('l jS \of F Y h:i:s A')
//                            );
//                            $log_file_name = "log";
//                            $log_ext = "txt";
//                            $do_log_activity = $pg['curl_data']->DoBackUpOldData($response, $log_file_name,  $log_ext);
//                        }
//                    }
//                }
               
                ?>

            </div>
        </div>
    </div>
</section>



