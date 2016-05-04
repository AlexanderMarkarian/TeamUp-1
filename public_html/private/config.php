<?php

/* 
 * RS 20160131
 * config.php will house all the constants we need to be pre-defined
 * CHANGE THINGS HERE WITH CAUTION
 */
/*******************************************/

/*PATH REALTED*/
define("ABSOLUTH_PATH_JS","../assets/js/"); //DONT CHANGE
define("ABSOLUTH_PATH_CSS", "../assets/css/"); //DONT CHANGE
define("ABSOLUTH_PATH_IMAGES", "../assets/images/"); //DONT CHANGE
define("ABSOLUTH_PATH_PAGE", "../pages/"); //DONT CHANGE
define("ABSOLUTH_PATH_ERRORS", "../errors/"); //DONT CHANGE
define("ABSOLUTH_PATH_CRON_BKP", "../cronjob/bkp/");
define("ABSOLUTH_PATH_CRON", "../cronjob/");
define("ABSOLUTH_PATH_CLASSES", "../Classes/");
define("ABSOLUTH_PATH_TEMPLATES", "../templates/");
/*******************************************/

/*TIME RELATED*/
$zone = date_default_timezone_set('America/Los_Angeles');
define("TIME_ZONE", $zone); //Time zone on PST
define("DATE_TIME", date('l jS \of F Y h:i:s A')); // Prints something like: Monday 8th of August 2005 03:12:46 PM
/*******************************************/


/*SEREVER RELATED*/
$username= "teamup_user";
$password="Teamup123";
$host="ip-107-180-57-169.ip.secureserver.net";
$database="teamupdb2";

define("USERNAME", $username);
define("PASSWORD",$password);
define("DB",$database);
define("HOST", $host);
define("CON_PORT", "");

/*******************************************/

/*MISC.*/
define("SESSION_STARTED", session_start());