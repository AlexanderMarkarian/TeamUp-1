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
} else if(isset($_POST['join_league'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "310",
        "join_league" => $_POST
    );
    $ajax->BuildPages($page_content_array);
} else if(isset($_POST['adddrop'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "311",
        "add_drop" => $_POST
    );    
    $ajax->BuildPages($page_content_array);
}


/*
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
*/