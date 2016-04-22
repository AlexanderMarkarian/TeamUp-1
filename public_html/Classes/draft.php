<?php

    $username= "A951763_user";
    $password="Dev135Test";
    $host="mysql1217.ixwebhosting.com";
    $database="A951763_dev";
    $mysqli = new mysqli($host,$username,$password,$database); 
    
if(!empty($_POST['inputTeams'])){
      $array = [1, 3,4];
    $s = serialize($array);
    
    $query = "INSERT into rosters (teams) VALUES ('$s')";
    $result = $mysqli->query($query);
    $mysqli->close();
    
    if($result){
        echo 1;
    }
    else 
        echo 0;  
}

    
    
if(!empty($_POST['getUsers'])){    
    $query = "SELECT * FROM rosters";
    $result = $mysqli->query($query);
    $mysqli->close();
    $array = array();
    while ($row = $result->fetch_row()) {
    	$array[$row[2]] = $row[1];
    }
    echo json_encode($array);
}
