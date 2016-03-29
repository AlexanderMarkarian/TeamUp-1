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
        "create_nav" => $_POST['d'],
    );
    $ajax->BuildPages($page_content_array);
}

