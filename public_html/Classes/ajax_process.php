<?php

/*
 * @Auth: Rostom
 * Desc: routes to body.php passes the post values from forms to form processes
 * Use this area and add a unique post value for each case (i.e $_POST['login'])
 * 02/20/2016
 */

require_once 'autoLoader.php';
$ajax = new body();


if (isset($_POST['login'])) {

    $page_content_array[] = array(
        "id" => "304",
        "login" => $_POST,
    );

    $ajax->BuildPages($page_content_array);
} else if (isset($_POST['signup'])) {
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "305",
        "signup" => $_POST,
    );
    $ajax->BuildPages($page_content_array);
    
} else if (isset($_POST['createleagues'])) {
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "306",
        "create_league" => $_POST,
    );
    $ajax->BuildPages($page_content_array);
    
} else if (isset($_POST['add_fields'])) {
    
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "307",
        "add_more_fields" => $_POST,
    );
    $ajax->BuildPages($page_content_array);
    
}else if (isset($_POST['do_invite'])) {
    
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "308",
        "send_invite_now" => $_POST,
    );
    
    $ajax->BuildPages($page_content_array);
}else if (isset($_POST['scores'])) {
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "309",
        "creae_nav" => $_POST['d'],
    );
    $ajax->BuildPages($page_content_array);
}

/*
// GET ALL THE TEAMS THAT HAVE ALREADY BEEN DRAFTED AND OWNED
// CALLED FROM drafting.js
else if(isset($_POST['getTakenTeams'])){
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

// GET TEAMS THAT ALREADY HAVE AN OWNER
// CALLED FROM add-drop.js
else if(isset($_POST['getTeams'])){
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

// ADD A TEAM AND DROP A TEAM 
// CALLED FROM add-drop.js
else if(isset($_POST['addDrop'])){
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

// GET DRAFT ORDER 
// CALLED FROM drafting.js
else if(isset($_POST['draftOrder'])){
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
}

// UPDATE FLAG FOR NEXT PICK
// CALLED FROM drafting.js
else if(isset($_POST['setPick'])){
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

// INPUT ALL TEAMS STATS INTO TABLE
// CALLED ONCE FROM profile.js WHEN USER LOGINS
// WE NEED AN UPDATE ONE THAT IS CALLED EVERY TIME AS WELL

else if(isset($_POST['inputIntoTable'])){

    $array = json_decode($_POST['array']);
    $username= "teamupuser";
    $password="teamup123";
    $host="localhost";
    $database="teamupdb";
    $sql = <<<SQL
    SELECT *
    FROM `leagues`
SQL;
$db = new mysqli($host, $username, $password, $database);
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

while($row = $result->fetch_row()){
    echo $row[1] . '<br />';
}
    
    $mysqli = new mysqli($host,$username,$password,$database);
    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
    for($i=0; $i<121; $i++){
        $team = $array[$i]->team;
        $ID = $array[$i]->id;
        $wins = $array[$i]->wins;
        $loses = $array[$i]->loses;
        $percentage = $array[$i]->percentage;
        $sport = $array[$i]->sport;
        $GP = $array[$i]->GP;
        $image = $array[$i]->image;
        $select = "INSERT INTO teamList (id, team_name, image, sport, GP, wins, loses, percentage) VALUES ('$ID','$team','$image','$sport','$GP','$wins','$loses','$percentage')";
        echo $select . '<br />';
        
        if(!$result = $mysqli->query($select)){
            die('There was an error running the query [' . $mysqli->error . ']');
        }

    }

// SET STARTERS FOR USER TEAM
// CALLED IN roster.js
else if(isset($_POST['setStarters'])){
    $starters = json_decode($_POST['newStarters']);
    $leagueID = 10;
    $userID = 3;
    $getULID = "SELECT * FROM usersleagues WHERE leagueID='$leagueID' AND userID='$userID'";
    $res = $mysqli->query($getULID);
    while($row = $res->fetch_row()){
        $ULID = $row[0];
        for($i=0; $i<4; $i++){
            $starterID = $starters[$i]->teamID;
            $select = "SELECT * FROM usersteams WHERE usersleaguesID='$ULID' AND team_ID='$starterID'";
            $result = $mysqli->query($select);
            while($r = $result->fetch_row()){
                $UTID = $r[0];
                echo json_encode($UTID);
                $up = "UPDATE usersrosters SET starting=".'1'." WHERE usersteamsID='$UTID'";
                //$up = "SELECT * FROM usersrosters WHERE usersteamsID='$UTID'";
                $s = $mysqli->query($up);
            }
        }
    }
}

// SET BENCH FOR USER TEAM
// CALLED IN roster.js
else if(isset($_POST['setBench'])){
    $starters = json_decode($_POST['newBench']);
    $leagueID = 10;
    $userID = 3;
    $getULID = "SELECT * FROM usersleagues WHERE leagueID='$leagueID' AND userID='$userID'";
    $res = $mysqli->query($getULID);
    while($row = $res->fetch_row()){
        $ULID = $row[0];
        for($i=0; $i<4; $i++){
            $starterID = $starters[$i]->teamID;
            $select = "SELECT * FROM usersteams WHERE usersleaguesID='$ULID' AND team_ID='$starterID'";
            $result = $mysqli->query($select);
            while($r = $result->fetch_row()){
                $UTID = $r[0];
                $update = "UPDATE usersrosters SET starting='0' WHERE usersteamsID='$UTID'";
                $setupdate = $mysqli->query($update);
            }
        }
    }
}


// GET LANDING STATS
// CALLED FOR landing.js
else if(isset($_POST['landingStats'])){
    $select = "SELECT * FROM users";
    $result = $mysqli->query($select);
    $numUsers = $result->num_rows;
    $getNumLeagues = "SELECT * FROM leagues";
    $res = $mysqli->query($getNumLeagues);
    $numLeagues = $res->num_rows;
    $getNumTeams = "SELECT * FROM usersleagues";
    $re = $mysqli->query($getNumTeams);
    $numTeams = $re->num_rows;
    $getNumPoints = "SELECT * FROM userspoints";
    $r = $mysqli->query($getNumPoints);
    $numPoints = 0;
    while($row = $r->fetch_row()){
        $numPoints += $row[2];
    }
    echo json_encode([$numUsers, $numLeagues, $numTeams, $numPoints]);
}
*/