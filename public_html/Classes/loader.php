<?php

/**
 * Description of loader
 * @author Rostom Sahakian <rostom.sahakian.549@my.csun.edu>
 * LOADS Head, Body, Footer
 * 
 * Anything needs to be added to page UI goes here 
 * RS 20160131
 */
SESSION_STARTED;
require_once 'autoLoader.php';

ob_start();

class loader {

    //put your code here
    private $_header_content = array();
    public $_post_values = array();
    public $_functions;
    public $_head;
    private $_db;
    private $_mysqli;
    public function __construct() {
        $this->_db = db_connect::getInstance();
        $this->_mysqli = $this->_db->getConnection();
        echo $this->PageHeader();
        echo $this->LoadPageBody();
        echo $this->LoadPageFooter();
        $this->_functions = new functions();
    }

    /*
     * page header gets its data here
     * Alter this section with instructions
     * RS 20160201
     */

    public function PageHeader() {
        $this->_head = new header();

        /* META TAGS CAN BE ADDED TO THIS ARRAY */
        $meta = array(
            "meta1" => '<meta charset="utf-8">',
            "meta2" => '<meta name="description" content="HTML framework description">',
            "meta3" => '<meta name="viewport" content="width=device-width, initial-scale=1">',
        );
        /* PAGE TITLE IS HERE */
        //$get_title = (!isset($_GET['page_name']) ? "Team Up - Home" : $_POST['page_name']);
        $get_title = (isset($_GET['page_name'])) ? $_POST['page_name'] : "Team Up - Home";
        $page_title = array(
            'title' => '<title>' . $get_title . '</title>'
        );

        /* CSS LINKS CAN BE ADDED TO THIS ARRAY */
        /* USE ABSOLUTH_PATH_CSS CONSTANT for Paths */

        /*
         * RS 20160201 Based on user input loads css
         * By default it will load the home page css 
         * If the page you are adding has css that would have conflict with other 
         * css styles create ifelseif statment and load css
         */
        ?>



        <?php

        $css = array(
            "css1" => '<link href="' . ABSOLUTH_PATH_CSS . 'pageLoader.css" rel="stylesheet" type="text/css"/>',
            "css2" => '<link href="' . ABSOLUTH_PATH_CSS . 'media.css" rel="stylesheet" type="text/css"/>',
            "css3" => '<link href="' . ABSOLUTH_PATH_CSS . 'jquery.bxslider.css" rel="stylesheet" type="text/css"/>',
                /*
                  "css2" => '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>',
                  "css3" => '<link rel="stylesheet" type="text/css" href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css">'
                 */
        );
        ?>


        <?php

        if (!isset($_GET['cmd']) || $_GET['cmd'] == "") {

            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'landing.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'animate.css">', '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'popupo-box.css">'
            );
        } else if (isset($_GET['cmd']) && ($_GET['cmd'] == "profile" || $_GET['cmd'] == "invited")) {

            array_push($css, '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'jquery.datetimepicker.css">', '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css" rel="stylesheet" type="text/css"/>', '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'animate.css">', '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'profile.css">'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "roster") {

            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'roster.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css" rel="stylesheet" type="text/css" />'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "add-drop") {

            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'add-drop.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css" rel="stylesheet" type="text/css"/>', '<link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "trades") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'trades.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css" rel="stylesheet" type="text/css"/>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "home") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'home.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css" rel="stylesheet" type="text/css" />'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "matchup") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'matchup.css" rel="stylesheet" type="text/css"/>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "draft") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'draft.css" rel="stylesheet" type="text/css"/>', '<link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css" rel="stylesheet" type="text/css" />'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "help") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'help.css" rel="stylesheet" type="text/css"/>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "faq") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'faq.css" rel="stylesheet" type="text/css"/>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "edit-profile") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>', '<link href="' . ABSOLUTH_PATH_CSS . 'edit-profile.css" rel="stylesheet" type="text/css"/>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] != "") {

            array_push($css, ""
            );
        }

        /* JAVASCRIPT LINKS CAN BE ADDED TO THIS ARRAY */
        /* USE ABSOLUTH_PATH_JS for Paths on js */
        $js = array(
            "js1" => "  <script type='text/javascript' src='" . ABSOLUTH_PATH_JS . "jquery.js'></script>",
            "js2" => "  <script type='text/javascript' src='" . ABSOLUTH_PATH_JS . "bootstrap.min.js'></script>",
            "js3" => "  <script type='text/javascript' src='" . ABSOLUTH_PATH_JS . "pageLoader.js'></script>",
            "jsShanke" => " <script type='text/javascript' src='" . ABSOLUTH_PATH_JS . "jquery.ui.shake.js'></script>",
            "box" => "<script type='text/javascript' src='" . ABSOLUTH_PATH_JS . "jquery.bxslider.min.js'></script>",
            "nbaSchedule" => "<script type='text/javascript' src='../assets/schedules/nba2016.js'></script>",
            "nhlSchedule" => "<script type='text/javascript' src='../assets/schedules/nhl2016.js'></script>",
            "mlbSchedule" => "<script type='text/javascript' src='../assets/schedules/mlb2016.js'></script>",
            "schedules" => "<script type='text/javascript' src='" . ABSOLUTH_PATH_JS . "schedules.js'></script>",
        );
        /* LOADS -> [meta, title, css, js] */
        $this->_head->GetMetaForHeader($meta);
        $this->_head->SetMetaForHeader();
        $this->_head->GetTitleForHeader($page_title);
        $this->_head->SetTitleForHeader();
        $this->_head->GetCSSForHeader($css);
        $this->_head->SetCSSForHeader();
        $this->_head->GetJSForHeader($js);
        $this->_head->SetJSForHeader();
        /* ----END LOAD--------- */

        /* ADD IMAGES TO HOME SLIDER FROM HERE */
        /* USE ABSOLUTH_PATH_IMAGES for image path */
        $home_slider_images = array(
            "img1" => ABSOLUTH_PATH_IMAGES . 'slider/baseball.jpg',
            "img2" => ABSOLUTH_PATH_IMAGES . 'slider/hockey.jpg',
            "img3" => ABSOLUTH_PATH_IMAGES . 'slider/basketball.jpg',
            "img4" => ABSOLUTH_PATH_IMAGES . 'slider/football.png',
        );
        /* ADD NAVIGATION LINKS TO THIS ARRAY */
        /* USE ABSOLUTH_PATH_PAGES for page paths */
        $navigation = array(
            "Home" => "loader.php?cmd=home&ssid={$_GET['ssid']}&leagueid={$_GET['leagueid']}",
            "Roster" => "loader.php?cmd=roster&ssid={$_GET['ssid']}&leagueid={$_GET['leagueid']}",
            "Add/Drop" => "loader.php?cmd=add-drop&ssid={$_GET['ssid']}&leagueid={$_GET['leagueid']}",
            "Trades" => "loader.php?cmd=trades&ssid={$_GET['ssid']}&leagueid={$_GET['leagueid']}",
            "Match Up" => "loader.php?cmd=matchup&ssid={$_GET['ssid']}&leagueid={$_GET['leagueid']}",
            "Draft" => "loader.php?cmd=draft&ssid={$_GET['ssid']}&leagueid={$_GET['leagueid']}",
            "Leagues" => array(
                "League Management" => array(
                    "link" => "loader.php?cmd=profile&ssid={$_GET['ssid']}",
                    "class" => "glyphicon glyphicon-user"),
                "Settings" => array(
                    "link" => "loader.php?cmd=settings&ssid={$_GET['ssid']}",
                    "class" => "glyphicon glyphicon-cog"),
                "Edit Profile" => array(
                    "link" => "loader.php?cmd=edit-profile&ssid={$_GET['ssid']}",
                    "class" => "glyphicon glyphicon-pencil"),
                "Help" => array(
                    "link" => "loader.php?cmd=help&ssid={$_GET['ssid']}",
                    "class" => "glyphicon glyphicon-info-sign"
                ),
                "FAQ" => array(
                    "link" => "loader.php?cmd=faq&ssid={$_GET['ssid']}",
                    "class" => "glyphicon glyphicon-question-sign"
                ),
                "Log Out" => array(
                    "link" => "loader.php?cmd=log-out&ssid={$_GET['ssid']}",
                    "class" => "glyphicon glyphicon-off")
            ),
        );


        $this->_head->GetHomeSlider($home_slider_images);
        $this->_head->SetHomeSlider();
        $this->_head->GetNavLinks($navigation);
        $this->_head->SetNavLinks();


        /* !Important */
        /* AFTER ALL NEEDED FILES ARE LOADED CALL THE LAST FUNCTION SO IT CLOSES THE HEAD AND OPENS BODY */
        $this->_head->HeaderBasicHtml();
    }

    /*
     * Page Content Will be loaded from here on
     * RS 20160131
     * LOADS THE BODY
     */

    public function LoadPageBody() {
        $function = new functions();
        $command = new commands();
        $forms = new forms();
        $curl = new cron();
        $command->FindAllCommands($_GET['cmd']);

        $this->_post_values = $_POST;
        /*
         * IF THE USER COMES FROM EMAIL URL 
         */
        if (isset($_GET['lid'])) {
            $table = array("0" => "temp_invite");
            $fields = array("0" => "linkid", "1" => "status");
            $values = array("0" => $_GET['lid'], "1" => "0");
            $option = "4";
            $option2 = "1";
        }

        /*
         * Pages 
         * Default set for Home page
         * follow the procedure from below
         * Do NOT Change fist if statment 
         */
        if (!isset($_GET['cmd']) || $_GET['cmd'] == "") {
            
          
            if (isset($_GET['lid']) &&  $function->CheckIfExists($table, $fields, $values, $option, $option2)) {

                $page_content_array[] = array(
                    "id" => "55",
                    "invite_info" => $_GET['lid']
                );
            } else {
               
                $numUsers = $function->GetNumUsers();
                $numLeagues = $function->GetNumLeagues();
                $numTeams = $function->GetNumTeams();
                $numPoints = $function->GetNumPoints();
                $page_content_array[] = array(
                    "id" => "0",
                    "page_name" => "Landing",
                    "div_name" => "landing",
                    "signup" => $this->_post_values,
                    "login" => $this->_post_values,
                    "numUsers" => $numUsers,
                    "numLeagues" => $numLeagues,
                    "numTeams" => $numTeams,
                    "numPoints" => $numPoints
                );
            }
   
            /*
             * Profile
             * id @ 1
             * DO not Change this
             * RS 20160201
             * 
             */
        } else if (isset($_GET['cmd']) && $function->CheckSSID("users", $_GET['ssid']) == true && $command->ReturnAllCommands() && isset($_SESSION['isLoggedin'])) {

            switch ($_GET['cmd']) {
                case "profile":

//                    if (isset($_GET['id'])) {
//                        /*
//                         * Delete tables with league information
//                         * 1. leagues
//                         * 2. league_user
//                         * 3. teams
//                         * 4. TBD
//                         */
//                        $tables = array(
//                            "0" => "leagues",
//                            "1" => "league_user",
//                            "2" => "teams",
//                            "3" => "temp_invite"
//                        );
//                        $fields = array(
//                            "0" => "id",
//                            "1" => "league_id",
//                            "2" => "parent",
//                            "3" => "league_id"
//                        );
//                        $values = array(
//                            "0" => $_GET['id']
//                        );
//                       // var_dump($values);
//
//                        $delete_leagues = $function->DeleteItems($tables, $fields, $values);
//                    }




                    $data = $function->getDataQuery("users", "ssid", $_GET['ssid']);

                    $data = $function->SetDataQuery();

                    $page_content_array[] = array(
                        "id" => "1",
                        "page_name" => "Profile",
                        "div_name" => "m-a-n",
                        "data" => $data,
                        "forms" => $forms,
                        "functions" => $function,
                        "invite" => $this->_post_values,
                        "link_stat" => $link_status,
                        "delete_key" => $_GET['id']
                       
                    );

                    break;
                case "home":
                    $function->getDataQuery("users", "ssid", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $leagueName = $function->GetLeagueName();
                    $leagueStandings = $function->GetStandings();
                    
                    $page_content_array[] = array(
                        "id" => "2",
                        "page_name" => "Home",
                        "div_name" => "home",
                        "data" => $data,
                        "league_name" => $leagueName,
                        "league_standings"=>$leagueStandings,
                    );
                    break;
                case "roster":
                    $function->getDataQuery("users", "ssid", $_GET['ssid']);
                    $data = $function->GetData();
                    $teamName = $function->GetTeamName();
                    $userRoster = $function->GetRoster();
                    $page_content_array[] = array(
                        "id" => "3",
                        "page_name" => "Roster",
                        "div_name" => "team",
                        "data" => $data,
                        "roster" => $userRoster,
                        "teamName" => $teamName
                    );
                    break;
                case "add-drop":
                    $userRoster = $function->GetRoster();
                    $data = $function->GetData();
                    $page_content_array[] = array(
                        "id" => "4",
                        "page_name" => "Add/Drop",
                        "div_name" => "add-drop",
                        "data" => $data,
                        "roster" => $userRoster,
                    );
                    break;
                case "trades":
                    $function->getDataQuery("users", "ssid", $_GET['ssid']);
                    $userRoster = $function->GetRoster();
                    $pool = $function->GetData();
                    $teamID = $function->GetTeamsID();
                   // $teamMembers = $function->GetTeamMembers();
                    $page_content_array[] = array(
                        "id" => "5",
                        "page_name" => "Trades",
                        "div_name" => "trades",
                        //"data" => $data,
                        "roster"=>$userRoster,
                        "pool"=>$pool,
                        "teamsID"=>$teamID,
                       // "teamMembers"=>$teamMembers
                    );
                    break;
                case "matchup":
                    $function->getDataQuery("users", "ssid", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "6",
                        "page_name" => "Match Up",
                        "div_name" => "matchup",
                        "data" => $data
                    );
                    break;

                case "draft":
                    $pool = $function->GetData();
                    $page_content_array[] = array(
                        "id" => "7",
                        "page_name" => "Draft",
                        "div_name" => "draft",
                        "pool" => $pool
                    );
                    break;
                case "settings":
                    $page_content_array[] = array(
                        "id" => "8",
                        "page_name" => "Setting",
                        "div_name" => "m-a-n",
                        "data" => $data
                    );
                    break;
                case "edit-profile":
                    $function->getDataQuery("users", "ssid", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "9",
                        "page_name" => "Edit Profile",
                        "div_name" => "m-a-n",
                        "data" => $data
                    );
                    break;
                case "log-out":
                    $function->UpdateLoginSSID("users", $_SESSION['isLoggedin'], "ssid", $_GET['ssid']);
                    $page_content_array[] = array(
                        "id" => "10",
                        "page_name" => "Logout"
                    );
                    break;
                case "help":
                    $page_content_array[] = array(
                        "id" => "11",
                        "page_name" => "Help",
                        "div_name" => "help",
                        "data" => $data
                    );
                    break;
                case "faq":
                    $page_content_array[] = array(
                        "id" => "12",
                        "page_name" => "FAQ",
                        "div_name" => "faq",
                        "data" => $data
                    );
                    break;
                case "invited":
                    $page_content_array[] = array(
                        "id" => "13",
                        "page_name" => "Invited page",
                        "div_name" => "m-a-n",
                        "data" => $_GET['lid'],
                        "forms" => $forms,
                        "functions" => $function,
                        "invite" => $this->_post_values,
                        "ssid" => $_GET['ssid']
                    );

                    break;
            }
        } else if (isset($_GET['cmd']) && $function->CheckSSID("users", $_GET['ssid']) == false && !isset($_SESSION['isLoggedin'])) {

            header("Location: loader.php?cmd=");
        } else {
            $page_content_array[] = array(
                "id" => "404",
                "page_name" => "404",
            );
        }
        $body = new body();
        echo $body->BuildPages($page_content_array);
    }

    /*
     * LOADS THE FOOTER
     * IF YOU HAVE ANY SCRIPTS THAT NEED TO BE IN THE FOOTER use templates/footer.php
     * Load them before you call the footer function
     */

    public function LoadPageFooter() {
        if (!isset($_GET['cmd']) || $_GET['cmd'] == "") {
            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'wow.min.js"></script>',
                "js5" => '<script src="' . ABSOLUTH_PATH_JS . 'modernizr.custom.min.js"></script>',
                "js6" => '<script src="' . ABSOLUTH_PATH_JS . 'jquery.magnific-popup.js"></script>',
                "js7" => '<script src="' . ABSOLUTH_PATH_JS . 'landing.js"></script>',
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "profile") {

            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'jquery.datetimepicker.full.min.js"></script>',
                "js5" => '<script src="' . ABSOLUTH_PATH_JS . 'profile.js"></script>',
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "roster") {

            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'roster.js"></script>',
                "js5" => '<script src="' . ABSOLUTH_PATH_JS . 'jquery.tableDnD.js"></script>'
            );
        
       }else if (isset($_GET['cmd']) && $_GET['cmd'] == "home") {

            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'home.js"></script>',
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "trades") {

            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'trades.js"></script>',
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "add-drop") {

            $footer_script = array(
                "js4" => '<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>',
                "js5" => '<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>',
                "js6" => '<script src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>',
                "js7" => '<script src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script>',
                "js8" => '<script src="' . ABSOLUTH_PATH_JS . 'add-drop.js"></script>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "draft") {
            $footer_script = array(
                "js4" => '<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>',
                "js5" => '<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>',
                "js6" => '<script src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>',
                "js7" => '<script src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script>',
                "js8" => '<script src="' . ABSOLUTH_PATH_JS . 'drafting.js"></script>'
            );
        } 
        else if (isset($_GET['cmd']) && $_GET['cmd'] != "") {
            $footer_script = array(
            );
        }
        $footer = new footer();

        $footer->FooterScripts($footer_script);
        $footer->ReturnFooterScript();
        $footer->ShowALLFooter();
    }

}

/*
 * loader instantiated
 */
$new_page = new loader();
