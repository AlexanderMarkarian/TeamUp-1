<?php

/*
 * @author: Rostom
 * Desc: this script will back up the old data and enter new data into specified table
 * Run time: 2303 everyday
 * Steps: 
 * 1. Curl Call <- priority 1
 * 2. BackUp <- priority 0
 * 3. Delete <- priority 2
 * 4. Insert <- priority 0
 */


require_once 'newLoader.php';

try {
    $functions = new functions();
    $curl = new cron();
    /*
     * Curl Call
     * Step 1
     */
    $ssl = false;
    $ret_transfer = true;
    $option_curl = array(
        "0" => CURLOPT_SSL_VERIFYPEER,
        "1" => CURLOPT_RETURNTRANSFER,
        "2" => CURLOPT_URL
    );
    $url = "https://glacial-tor-26990.herokuapp.com/teamStats";

    $ch = curl_init();
    curl_setopt($ch, $option['0'], $ssl);
    curl_setopt($ch, $option['1'], $ret_transfer);
    curl_setopt($ch, $option['2'], $url);
    
    
    $do_get_curl_data = $curl->GetDataFromApi($url, $ssl, $ret_transfer, $option_curl);
    $do_get_curl_data = $curl->SetDataFromApi();
    $do_get_curl_data = $curl->DecodeDataFromCurl();
    $do_get_curl_data = $curl->ReturnDecodedObject();
    /*
     * Fetch Old Data and Back it Up
     * Step 2
     */
    $tables = array("0" => "basketball_data");
    $fields = array();
    $values = array();
    $option = "1";
    $get_old_data = $functions->GetALL($tables, $fields, $values, $option);
    $get_old_data = $functions->RetGETALL();
    $file_name = "basketball";
    $jason_ext = "json";
    $do_back_up = $curl->DoBackUpOldData($get_old_data, $file_name, $jason_ext);
    $table = array(
        "0" => "basketball_data"
    );
    /*
     * Delete Old Data
     * Step 3
     */
    $option_del = "1";
    $functions->DeleteALL($table, $option_del);

    /*
     * Insert new Data into basketball table and write out into log file
     * step 4
     */
    if ($do_get_curl_data->info != NULL) {
        $i = 0;
        $data_date = $functions->DateAndTime();
        $data_date = $functions->ReturnDate();
        echo $message = "\n----------------Data was write---> " . $data_date . "\n";
        foreach ($do_get_curl_data->info as $team_info) {
            $i++;
            $all_team_info = array();
            $all_team_info['teamID'] = $team_info->teamId;
            $all_team_info['teamName'] = $team_info->teamName;
            $all_team_info['wins'] = $team_info->w;
            $all_team_info['losses'] = $team_info->l;

            $values_b['values'] = array();
            array_push($values_b['values'], "'" . $all_team_info['teamID'] . "'");
            array_push($values_b['values'], "'" . $all_team_info['teamName'] . "'");
            array_push($values_b['values'], "'" . $all_team_info['wins'] . "'");
            array_push($values_b['values'], "'" . $all_team_info['losses'] . "'");
            array_push($values_b['values'], "'" . time() . "'");

            $fields_b = array(
                "0" => "teamID",
                "1" => "teamName",
                "2" => "w",
                "3" => "l",
                "4" => "created_date",
            );
            $tables_b = array(
                "0" => "basketball_data"
            );
            $insert_values_b = array(
                "values" => $values_b,
                "fields" => $fields_b,
                "tables" => $tables_b
            );
            $cmd = "Insert new data from API";

            $insertion_proccess = $functions->InsertAPIData($insert_values_b, $cmd);
            if ($insertion_proccess) {
                $response = array(
                    "message" => "Cron job ran @" . date('l jS \of F Y h:i:s A')
                );
                $log_file_name = "log";
                $log_ext = "txt";
                $do_log_activity = $curl->DoBackUpOldData($response, $log_file_name, $log_ext);
            }

            echo "\n***<[";
            echo "(" . $i . ")-->>Data\n";
            echo "TeamID: " . $all_team_info['teamID'] . "\n";
            echo "Team Name: " . $all_team_info['teamName'] . "\n";
            echo "Wins: " . $all_team_info['wins'] . "\n";
            echo "Losses: " . $all_team_info['losses'] . "\n";
            echo "]>***\n";
        }
    }
    /*
     * Catch exception if class fails to load
     */
} catch (Exception $e) {

    echo "Error " . $e;
}
