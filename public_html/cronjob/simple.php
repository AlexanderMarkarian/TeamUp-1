<?php

//require_once '../private/config.php';
// database details
$servername = "localhost";
$username = "teamupdb";
$password = "TeamUp123*";
$dbname = "comp491";

// database create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
// scripts die when error ocours
    die("Connection failed: " . $conn->connect_error);
}

// selects all data from basketball_data table
$sql = "SELECT * FROM `basketball_data` ";
$result = $conn->query($sql);
$teams = array();
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
// add data to array
        $teams[] = $row;
    }
} else {
    //echo "0 results";
}

$newFile = "basketball";
$file_extension = "json";
$filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . "bkp/" . $newFile . "_" . date('Ymd') . "." . $file_extension;
$json_data = json_encode($teams);
$linecount = 0;
if (file_exists($filename)) {

    $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . "bkp/" . $newFile . "_" . date('Ymd') . "." . $file_extension;
}
$backup_data = $filename;
$log = fopen($backup_data, 'w') or die("Cannot open file:" . $backup_data);
fwrite($log, $json_data);
fclose($log);

$logFile = "log";
$file_ex = "txt";
$filename_log = dirname(__FILE__) . DIRECTORY_SEPARATOR . "bkp/" . $logFile . "_" . date('Ymd') . "." . $file_ex;
$response = array(
    "message" => "Cron job ran @" . date('l jS \of F Y h:i:s A')
);
$log_message = json_encode($response );
$linecount = 0;
if (file_exists($filename_log)) {

    $filename_log = dirname(__FILE__) . DIRECTORY_SEPARATOR . "bkp/" . $logFile . "_" . date('Ymd') . "." . $file_ex;
}
$log_data = $filename_log;
$log_d = fopen($log_data, 'w') or die("Cannot open file:" . $log_data);
fwrite($log_d, $log_data);
fclose($log_d);


// delete
$sql = "DELETE FROM `basketball_data` ";

if ($conn->query($sql) === TRUE) {
    //echo "Records deleted successfully";
} else {
    //echo "Error deleting records: " . $conn->error;
}

//curl to get the data from api
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://glacial-tor-26990.herokuapp.com/teamStats');
$result = curl_exec($ch);
curl_close($ch);

//decodes the result from json to php array
$obj = json_decode($result);


// checks if array exists
if (isset($obj->info)) {
    // loop the array
    foreach ($obj->info as $team) {
        //echo"<pre>";print_r($team);echo"</pre>pre>";
        // insert query
        $sql = "INSERT INTO `basketball_data` (`teamID`, `teamName`, `w`, `l`, `created_date`) VALUES ('" . $team->teamId . "', '" . $team->teamName . "', '" . $team->w . "', '" . $team->l . "', '" . time() . "');";

        if ($conn->query($sql) === TRUE) {
            //echo "New records created successfully";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
echo "Data Updated";
//database connection closed
$conn->close();

