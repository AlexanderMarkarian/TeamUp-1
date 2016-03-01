
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">


                <?php
                $pg['data'];
                $tables = array(
                    "0" => "temp_invite",
                    "1" => "league_user"
                );
                $fields = array(
                    "0" => "linkid",
                    "1" => "league_id"
                );
                $values = array(
                    "0" => $pg['data'],
                    "1" => "league_id"
                );
                $option = "3";

                $fetch_team_member_info = $pg['functions']->CheckIfExists($tables, $fields, $values, $option);
                $fetch_team_member_info = $pg['functions']->SetDataQuery();
                foreach ($fetch_team_member_info as $fetch_data) {
                    
                }
                $commissioner_id = $fetch_data['userid'];
                $league_id = $fetch_data['league_id'];
                $table = array(
                    "0" => "users"
                );
                $field = array(
                    "0" => "user_id"
                );
                $value = array(
                    "0" => $commissioner_id
                );
                $options = "1";
                $fetch_user_name = $pg['functions']->CheckIfExists($table, $field, $value, $options);
                $fetch_user_name = $pg['functions']->SetDataQuery();
                foreach ($fetch_user_name as $all_user_data) {
                    
                }

                $league_table = array("0" => "leagues");
                $league_field = array("0" => "id");
                $league_value = array("0" => $league_id);
                $league_option = "1";
                $league_name_query = $pg['functions']->CheckIfExists($league_table, $league_field, $league_value, $league_option);
                $league_name_query = $pg['functions']->SetDataQuery();
                foreach ($league_name_query as $league_data) {
                    
                }
                $commissioner_name = $all_user_data['first_name'] . " " . $all_user_data['last_name'];

                $user_table = array("0" => "users");
                $user_fields = array("0" => "ssid");
                $user_values = array("0" => $pg['ssid']);
                $user_option = "1";
                $team_member_query = $pg['functions']->CheckIfExists($user_table, $user_fields, $user_values, $user_option);
                $team_member_query = $pg['functions']->SetDataQuery();
                foreach ($team_member_query as $tmember_data) {
                    
                }
                ?>
                <h2 class="section-heading">
                    <?php
                    $team_member_name = $tmember_data['first_name']." ".$tmember_data['last_name'];
                    echo $team_member_name;
                    ?>
                </h2>
             
                <h3 class="section-subheading text-muted">
                    <?php
                    $pg['functions']->DateAndTime();
                    echo "<br/>" . $pg['functions']->ReturnDate();
                    ?>  
                </h3>
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4">
                    <h4 class="create-header">League Info</h4>
                    <h5 class="create-header">League Name:<a href="#"> <?= $league_data['league_name']; ?></a></h5>
                    <h5 class="create-header">League Commissioner: <a href="#"><?= $commissioner_name; ?></a></h5>
                    <h5 class="create-header">Match Up Begins: <a href="#"><?= $league_data['created_on']; ?></a></h5>

                    <?php
                    echo $forms->TeamInformationForm();
                    ?>
                    <!----------END FORM---------------------------------------->
                </div>
            </div>

        </div>

        <div class="row text-center">

            <!------------------ LEAGUE INFO FORM GOES HERE ---------------------->

            <script type='text/javascript' src='<?= ABSOLUTH_PATH_JS ?>ajax_proccess.js'></script>



        </div>
    </div>
</section>



