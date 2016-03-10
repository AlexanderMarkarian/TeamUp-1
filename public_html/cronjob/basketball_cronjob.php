<?php

/*
 * @Auth: rostom
 * Date: 03082016
 * Cron Job steps
 * 1. Get data from table
 * 2. Encode data to json
 * 3. Write to file in cronjob/bkp ->format basketball_(date)
 * 4. Delete the out dated data
 * 5. Call the curl function
 * 6. Json decode the fetched data from API
 * 7. Put data into the database
 * ---End Cron Job Proccess---
 */
require_once '../private/config.php';
require_once '../Classes/autoLoader.php';
$curl = new Utilities();
$functions = new functions();
/*
 * get the data and Do the back up
 * Steps 1,2,3
 */
$table = array("0" => "basketball_data");
$fields = array();
$values = array();
$option = "1";
$get_old_data = $functions->GetALL($tables, $fields, $values, $option);
$get_old_data = $functions->RetGETALL();
$file_name = "basketball";
$jason_ext = "json";
$do_back_up = $curl->DoBackUpOldData($get_old_data, $file_name, $jason_ext); //Data is written to file (format: JSON, Location: ../cronjob/bkp/filename)

/*
 * Delete Data section
 * step 4
 */
$do_delete_old_data = $functions->DeleteALL($table, $option);
/*
 * Curl Call Section To get Data
 * steps 5,6,7
 */

$ssl = false; //SSL Nor required
$ret_transfer = true; // Trensfer Required
$option_curl = array(
    "0" => CURLOPT_SSL_VERIFYPEER,
    "1" => CURLOPT_RETURNTRANSFER,
    "2" => CURLOPT_URL
);
//URL to the free API (basketball ONLY)
$url = "https://glacial-tor-26990.herokuapp.com/teamStats";
$do_get_curl_data = $curl->GetDataFromApi($url, $ssl, $ret_transfer, $option_curl); //Curl gets called
$do_get_curl_data = $curl->SetDataFromApi(); //Values are returned
$do_get_curl_data = $curl->DecodeDataFromCurl(); // Values are decoded to an array
$do_get_curl_data = $curl->ReturnDecodedObject();  // Values are retuned 
//#########################--EOT(CURL STOPPED)--################################//
if ($do_get_curl_data != NULL) {
    foreach ($do_get_curl_data->info as $team_info) {

        $all_team_info = array();
        $all_team_info['teamID'] = $team_info->teamId;
        $all_team_info['teamName'] = $team_info->teamName;
        $all_team_info['wins'] = $team_info->w;
        $all_team_info['losses'] = $team_info->l;
        $all_team_info['gp'] = $team_info->gp; // Not used


        /*
         * Insertion process
         * it will now put fresh data into the database
         * 
         */
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

        $insertion_proccess = $pg['functions']->InsertAPIData($insert_values_b, $cmd);

        if ($insertion_proccess) {
            $response = array(
                "message" => "Cron job ran @" . date('l jS \of F Y h:i:s A')
            );
            $log_file_name = "log";
            $log_ext = "txt";
            $do_log_activity = $curl->DoBackUpOldData($response, $log_file_name, $log_ext);
        } else {
            $response = array(
                "message" => "Error running Cron @" . date('l jS \of F Y h:i:s A')
            );
            $log_file_name = "error";
            $log_ext = "txt";
            $do_log_activity = $curl->DoBackUpOldData($response, $log_file_name, $log_ext);
        }
    }
}
