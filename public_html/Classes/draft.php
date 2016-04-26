<?php

$username= "A951763_user";
$password="Dev135Test";
$host="mysql1217.ixwebhosting.com";
$database="A951763_dev";
$mysqli = new mysqli($host,$username,$password,$database); 
    

if(!empty($_POST['newTable'])){
    $query = "SELECT * FROM userteams";
    $result = $mysqli->query($query);
    $table = '';
    $userID = [];
    $teamID = [];
    $name = [];
    $count = 0;
    while($row = $result->fetch_row()){
        $userID[$count] = $row[1];
        $teamID[$count] = $row[2];
        $count++;
    }
    for($i=0; $i<sizeof($userID); $i++){
        $currentID = $userID[$i];
        $findName = "SELECT * FROM rosters WHERE ID ='$currentID'";
        $find = $mysqli->query($findName);

        while($row = $find->fetch_row()){
            $name[$teamID[$i]] = $row[0];
        }
    }
    echo json_encode($name);
    $mysqli->close();
}

// called from Add Drop page
if(!empty($_POST['addDrop'])){
    $addID = $_POST['addID'];
    $dropID = $_POST['dropID'];
    $userID = 3;
    $leagueID = 10;
    $query = "SELECT * FROM usersleagues WHERE userID='$userID' AND leagueID='$leagueID'";
    $result = $mysqli->query($query);
    $usersLeaguesID = '';
    while($row = $result->fetch_row()){
        $usersLeaguesID = $row[0];
    }
    $update = "UPDATE usersteams SET team_ID='$addID' WHERE team_ID='$dropID'";
    $res = $mysqli->query($update);
    if($res){
        echo 2;
    }
}

if(!empty($_POST['whoIsNext'])){
    $select = "SELECT * FROM draftturns WHERE draft = '1'";
    $result = $mysqli->query($select);
    $team = '';
    while($row = $result->fetch_row()){
        $team = $row[1]; 
    }
    echo $team;
    $mysqli->close();
}

if(!empty($_POST['setPick'])){
    $team = $_POST['team'];
    $select = "SELECT * FROM rosters WHERE name = '$team'";
    $result = $mysqli->query($select);
    $id = '';
    while($row = $result->fetch_row()){
        $id = $row[1];
    }
    $insert = "UPDATE draftturns SET draft='1' WHERE user_ID='$id'";
    $update = $mysqli->query($insert);
    if($update){
        echo 4;
    }
}

// called from roster page
if(!empty($_POST['getRoster'])){
    $userID = 3;
    $leagueID = 10;
    $query = "SELECT * FROM usersleagues WHERE userID='$userID' AND leagueID='$leagueID'";
    $result = $mysqli->query($query);
    $usersLeaguesID = '';
    while($row = $result->fetch_row()){
        $usersLeaguesID = $row[0];
    }
    $getRoster = "SELECT * FROM usersteams WHERE usersleaguesID='$usersLeaguesID'";
    $rosters = $mysqli->query($getRoster);
    $array = [];
    $id = [];
    while($row = $rosters->fetch_row()){
        $array[] = $row[2];
        $id[] = $row[0];
    }
    $starting = [];
    $bench = [];
    for($i = 0; $i < sizeof($id); $i++){
        $currentID = $id[$i];
        $select  = "SELECT * FROM usersrosters WHERE usersteamsID='$currentID'";
        $res = $mysqli->query($select);
        while($row = $res->fetch_row()){
            if($row[2] == 1){
                $starting[] = $array[$i];
            }
            else{
                $bench[] = $array[$i];
            }
        }
    }
    $merge = array_merge($starting, $bench);
    echo json_encode($merge);
    $mysqli->close();
}

    
if(!empty($_POST['getUsers'])){ 
  
    $query = "SELECT * FROM rosters";
    $result = $mysqli->query($query);
    $mysqli->close();
    $array = array();
    while ($row = $result->fetch_row()) {
        $array[$row[1]] = $row[0];
    }
    echo json_encode($array);
    
/*
    $draftOrder = [];
    $len = sizeof($array)/2;  // total number of numbers
    $min = 1; 
    $max = sizeof($array)/2; // maximum
    foreach (range(0, $len - 1) as $i) {
        while(in_array($num = mt_rand($min, $max), $range));
        $range[] = $num;
    }

    for($i=0; $i<sizeof($array)/2; $i++){
        $draftOrder[] = $array[$pop];
        array_push($draftOrder, $array[])
    }
    echo json_encode($draftOrder);
    */
}


