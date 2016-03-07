<?php
// database details
$servername = "localhost";
$username = "school_teamup";
$password = "teamup!@#$%^";
$dbname = "school_teamup";

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
$teams=array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
// add data to array
      $teams[]=$row; 
    }
} else {
    //echo "0 results";
}


$myfile = fopen(dirname(__FILE__).DIRECTORY_SEPARATOR."backup_basketball_data".DIRECTORY_SEPARATOR.date('Y-m-d').".json", "w") or die("Unable to open file!");
fwrite($myfile, $txt);

// encode the arry to json and writes the array to the file 
$txt = json_encode($teams);
fwrite($myfile, $txt);

// close the file
fclose($myfile);


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
if(isset($obj->info))
{
        // loop the array
	foreach($obj->info as $team)
	{
		//echo"<pre>";print_r($team);echo"</pre>pre>";

                // insert query
		$sql = "INSERT INTO `basketball_data` (`teamID`, `teamName`, `w`, `l`, `created_date`) VALUES ('".$team->teamId."', '".$team->teamName."', '".$team->w."', '".$team->l."', '".time()."');";

		if ($conn->query($sql) === TRUE) {
			//echo "New records created successfully";
		} else {
			//echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

//database connection closed
$conn->close();
