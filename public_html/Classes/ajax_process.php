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
} else if(isset($_POST['checkTurn'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "312",
        "checkTurn" => $_POST
    );
    $ajax->BuildPages($page_content_array);
} else if(isset($_POST['checkRefresh'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id"=> "313",
        "refresh"=> $_POST
    );
    $ajax->BuildPages($page_content_array);
} else if(isset($_POST['startDraft'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "314",
        "startDraft" => $_POST
    );
    $ajax->BuildPages($page_content_array);
} else if(isset($_POST['completeTrade'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "315",
        "completeTrade" => $_POST
    );
    $ajax->BuildPages($page_content_array);    
} else if(isset($_POST['approveTrade'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "316",
        "approveTrade" => $_POST
    );
    $ajax->BuildPages($page_content_array);   
} else if(isset($_POST['cancelTrade'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "317",
        "cancelTrade" => $_POST
    );
    $ajax->BuildPages($page_content_array);    
} else if(isset($_POST['renameLeague'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "318",
        "renameLeague" => $_POST
    );
    $ajax->BuildPages($page_content_array);      
} else if(isset($_POST['deleteLeague'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "319",
        "deleteLeague" => $_POST
    );
    $ajax->BuildPages($page_content_array);  
} else if(isset($_POST['deleteLeagueUser'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "320",
        "deleteLeagueUser" => $_POST
    );
    $ajax->BuildPages($page_content_array);      
} else if(isset($_POST['readyDraft'])){
    unset($page_content_array);
    $page_content_array[] = array(
        "id" => "321",
        "readyDraft" => $_POST
    );
    $ajax->BuildPages($page_content_array);     
}