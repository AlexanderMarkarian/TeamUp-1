<?php

/*
 * @Auth: Rostom
 * Desc: routes to body.php passes the post values from forms to form processes
 * Use this area and add a unique post value for each case (i.e $_POST['login'])
 * 02/20/2016
 */

require_once 'autoLoader.php';
$ajax = new body();

// ALEX DB
$username= "A951763_user";
$password="Dev135Test";
$host="mysql1217.ixwebhosting.com";
$database="A951763_dev";
$mysqli = new mysqli($host,$username,$password,$database);


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


// GET POINTS FROM EACH TEAM IN THE LEAGUE
// CALLED FROM home.js
else if(isset($_POST['getStandings'])){
    $lID = 10;
    $select = "SELECT * FROM usersleagues WHERE leagueID ='$lID'";
    $res = $mysqli->query($select);
    $points = [];
    while($row = $res->fetch_row()){
        $ulID = $row[0];
        $query = "SELECT * FROM userspoints WHERE userleaguesID='$ulID'";
        $result = $mysqli->query($query);
        while($r = $result->fetch_row()){
            $points[] = [$row[3],$r[2], $r[3], $r[4], $r[5], $r[6]];
        }
    }
    echo json_encode($points);
}

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

// GET ROSTER OF SPECIFIC TEAMID
// CALLED IN trades.js
else if(isset($_POST['getTeamMembers'])){
    $teamID = $_POST['teamID'];
    $select = "SELECT * FROM usersteams WHERE usersleaguesID='$teamID'";
    $res = $mysqli->query($select);
    $return = [];
    while($row = $res->fetch_row()){
        $return[] = $row[2];
    }
    echo json_encode($return);
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
/*
// GET USERS CURRENT ROSTER
// CALLED FORM roster.js
else if(isset($_POST['getRoster'])){
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
}*/

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

// GET TEAMS and TEAMS ID THAT ALREADY HAVE AN OWNER
// CALLED FROM trading.js
else if(isset($_POST['getTeamsID'])){
    $userID = 3;
    $leagueID = 10;
    $query = "SELECT * FROM usersleagues WHERE leagueID='$leagueID' AND userID != '$userID'";
    $result = $mysqli->query($query);
    $return = [];
    
    while($row = $result->fetch_row()){
        $return[$row[0]] = $row[3];
    }
    echo json_encode($return);
}

/*
else if(isset($_POST['draftTeam'])){
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
