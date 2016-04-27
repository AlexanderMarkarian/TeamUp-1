<?php

$username= "A951763_user";
$password="Dev135Test";
$host="mysql1217.ixwebhosting.com";
$database="A951763_dev";
$mysqli = new mysqli($host,$username,$password,$database);

if(!empty($_POST['getLeagueName'])){
    $ulID = 10;
    $select = "SELECT * FROM leagues WHERE leagueID='$ulID'";
    $res = $mysqli->query($select);
    $name = '';
    while($row = $res->fetch_row()){
        $name = $row[1];
    }
    echo $name;
}

if(!empty($_POST['getStandings'])){
    $lID = 10;
    $select = "SELECT * FROM usersleagues WHERE leagueID ='$lID'";
    $res = $mysqli->query($select);
    $points = [];
    while($row = $res->fetch_row()){
        $ulID = $row[0];
        $query = "SELECT * FROM userspoints WHERE userleaguesID='$ulID'";
        $result = $mysqli->query($query);
        while($r = $result->fetch_row()){
            $points[$row[3]] = [$r[2], $r[3], $r[4], $r[5], $r[6]];
        }
    }
    echo json_encode($points);
}

if(!empty($_POST['inputIntoTable'])){
    $array = json_decode($_POST['array']);
    for($i=0; $i<121; $i++){
        $team = $array[$i]->team;
        $ID = $array[$i]->id;
        $wins = $array[$i]->wins;
        $loses = $array[$i]->loses;
        $percentage = $array[$i]->percentage;
        $sport = $array[$i]->sport;
        $GP = $array[$i]->GP;
        $image = $array[$i]->image;
        $select = "INSERT INTO teamList (ID, team, image, sport, GP, wins, loses, percentage) VALUES ('$ID','$team','$image','$sport','$GP','$wins','$loses','$percentage')";
        $res = $mysqli->query($select);
    }
}

/*
if(!empty($_POST['draftTeam'])){
    $leagueID = 10;
    $teamID = $_POST['teamID'];
    $getUserLeagueID = "SELECT * FROM usersleagues WHERE leagueID='$leagueID'";
    $res = $mysqli->query($getUserLeagueID);
    $turns = [];
    while($row = $res->fetch_row()){
        $currentID = $row[0];
        $select = "SELECT * FROM draftturns WHERE usersleaguesID='$currentID'";
        $result = $mysqli->query($select);
        while($r = $result->fetch_row()){
            $turns[$r[3]] = $row[3];
        }
    }
    echo json_encode($turns);
}
*/

if(!empty($_POST['getTakenTeams'])){
    $leagueID = 10;
    $query = "SELECT * FROM usersleagues WHERE leagueID='$leagueID'";
    $res = $mysqli->query($query);
    $teams = [];
    while($row = $res->fetch_row()){
        $currentID = $row[0];
        $select = "SELECT * FROM usersteams WHERE usersleaguesID='$currentID'";
        $result = $mysqli->query($select);
        while($r = $result->fetch_row()){
            $teams[] = $r[2];
        }
    }
    echo json_encode($teams);
}

if(!empty($_POST['getData'])){
    $query = "SELECT * FROM teamList";
    $res = $mysqli->query($query);
    $array = [];
    while($row = $res->fetch_row()){
        $array[] = $row;
    }
    echo json_encode($array);
}

if(!empty($_POST['getTeams'])){
    $userID = 3;
    $leagueID = 10;
    $query = "SELECT * FROM usersleagues WHERE leagueID='$leagueID' AND userID != '$userID'";
    $result = $mysqli->query($query);
    $return = [];
    while($row = $result->fetch_row()){
        $ulID = $row[0];
        $select = "SELECT * FROM usersteams WHERE usersleaguesID = '$ulID'";
        $res = $mysqli->query($select);
        while($r = $res->fetch_row()){
            $return[$r[2]] = $row[3];
        }
    }
    echo json_encode($return);
}
    

if(!empty($_POST['newTable'])){
    $ulID = 1;
    $query = "SELECT * FROM userteams WHERE usersleaguesID='$ulID'";
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

if(!empty($_POST['draftOrder'])){
    $leagueID = 10;
    $getUserLeagueID = "SELECT * FROM usersleagues WHERE leagueID='$leagueID'";
    $res = $mysqli->query($getUserLeagueID);
    $turns = [];
    while($row = $res->fetch_row()){
        $currentID = $row[0];
        $select = "SELECT * FROM draftturns WHERE usersleaguesID='$currentID'";
        $result = $mysqli->query($select);
        while($r = $result->fetch_row()){
            $turns[$r[3]] = $row[3];
        }
    }
    echo json_encode($turns);
    /*
    $select = "SELECT * FROM draftturns WHERE draft = '1'";
    $result = $mysqli->query($select);
    $team = '';
    while($row = $result->fetch_row()){
        $team = $row[1]; 
    }
    echo $team;
    $mysqli->close();
     * 
     */
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


