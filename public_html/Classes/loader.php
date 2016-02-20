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

    public function __construct() {

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
        $head = new header();

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
            /*
            "css2" => '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>',
            "css3" => '<link rel="stylesheet" type="text/css" href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css">'
             */
        );
                    ?>
                   

                    <?php
        if (!isset($_GET['cmd']) || $_GET['cmd'] == "") {

            array_push($css, 
               '<link href="' . ABSOLUTH_PATH_CSS . 'landing.css" rel="stylesheet" type="text/css"/>',
               '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>',
               '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'animate.css">',
               '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'popupo-box.css">'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "profile") {

            array_push($css, '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'jquery.datetimepicker.css">',
            '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap3.3.5.min.css" rel="stylesheet" type="text/css"/>',
            '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>',
            '<link href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css" rel="stylesheet" type="text/css"/>'       
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "roster") {

            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap3.3.5.min.css" rel="stylesheet" type="text/css"/>',
            '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "add-drop") {

            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap3.3.5.min.css" rel="stylesheet" type="text/css"/>',
            '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>'
            );
        }
        else if (isset($_GET['cmd']) && $_GET['cmd'] == "trades") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap3.3.5.min.css" rel="stylesheet" type="text/css"/>',
            '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>',
                    '<link href="' . ABSOLUTH_PATH_CSS . 'trades.css" rel="stylesheet" type="text/css"/>'
            );
        }
        else if (isset($_GET['cmd']) && $_GET['cmd'] == "home") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap3.3.5.min.css" rel="stylesheet" type="text/css"/>',
            '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>',
                    '<link href="' . ABSOLUTH_PATH_CSS . 'home.css" rel="stylesheet" type="text/css"/>'
            );
        }
        else if (isset($_GET['cmd']) && $_GET['cmd'] == "matchup") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap3.3.5.min.css" rel="stylesheet" type="text/css"/>',
            '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>'
            );
        }
        else if (isset($_GET['cmd']) && $_GET['cmd'] == "draft") {
            array_push($css, '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap3.3.5.min.css" rel="stylesheet" type="text/css"/>',
            '<link href="' . ABSOLUTH_PATH_CSS . 'style.css" rel="stylesheet" type="text/css"/>'
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
            
        );
        /* LOADS -> [meta, title, css, js] */
        $head->GetMetaForHeader($meta);
        $head->SetMetaForHeader();
        $head->GetTitleForHeader($page_title);
        $head->SetTitleForHeader();
        $head->GetCSSForHeader($css);
        $head->SetCSSForHeader();
        $head->GetJSForHeader($js);
        $head->SetJSForHeader();
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
            "Profile" => array(
                "Profile" => array(
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
            "Home" => "loader.php?cmd=home&ssid={$_GET['ssid']}",
            "Roster" => "loader.php?cmd=roster&ssid={$_GET['ssid']}",
            "Add/Drop" => "loader.php?cmd=add-drop&ssid={$_GET['ssid']}",
            "Trades" => "loader.php?cmd=trades&ssid={$_GET['ssid']}",
            "Match Up" => "loader.php?cmd=matchup&ssid={$_GET['ssid']}",
            "Draft" => "loader.php?cmd=draft&ssid={$_GET['ssid']}",
        );
        $head->GetHomeSlider($home_slider_images);
        $head->SetHomeSlider();
        $head->GetNavLinks($navigation);
        $head->SetNavLinks();


        /* !Important */
        /* AFTER ALL NEEDED FILES ARE LOADED CALL THE LAST FUNCTION SO IT CLOSES THE HEAD AND OPENS BODY */
        $head->HeaderBasicHtml();
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
        $command->FindAllCommands($_GET['cmd']);

        $this->_post_values = $_POST;
        /*
         * Pages 
         * Default set for Home page
         * follow the procedure from below
         * Do NOT Change fist if statment 
         */
        if (!isset($_GET['cmd']) || $_GET['cmd'] == "") {

            $page_content_array[] = array(
                "id" => "0",
                "page_name" => "Landing",
                "div_name" => "landing",
                "signup" => $this->_post_values,
                "login" => $this->_post_values
            );


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
                    
                    if(isset($_GET['id'])){
                     /*
                      * Delete tables with league information
                      * 1. leagues
                      * 2. league_user
                      * 3. teams
                      * 4. TBD
                      */
                        $tables = array(
                            "0"=>"leagues",
                            "1"=>"league_user",
                            "2"=>"teams"
                        );
                        $fields = array(
                            "0"=>"id",
                            "1"=>"league_id",
                            "2"=>"parent"
                        );
                        $values = array(
                            "0" => $_GET['id']
                        );
                        
                        $delete_leagues = $function->DeleteItems($tables, $fields, $values);

                    }
                    $date = $function->getDataQuery("users", "ssid", $_GET['ssid']);

                    $data = $function->SetDataQuery();

                    $page_content_array[] = array(
                        "id" => "1",
                        "page_name" => "Profile",
                        "div_name" => "m-a-n",
                        "data" => $data,
                        "forms" => $forms,
                        "functions" => $function,
                        "create_league" => $this->_post_values
                        
                            
                       
                            
                       
                    );

                    break;
                case "home":
                    $function->getDataQuery("users", "ssid", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "2",
                        "page_name" => "Home",
                        "div_name" => "home",
                        "data" => $data
                    );
                    break;
                case "roster":
                    $function->getDataQuery("users", "ssid", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "3",
                        "page_name" => "Roster",
                        "div_name" => "team",
                        "data" => $data
                    );
                    break;
                case "add-drop":
                    $function->GetDataFromPool();
                    $data = $function->SetPoolDataQuery();
                    $page_content_array[] = array(
                        "id" => "4",
                        "page_name" => "Add/Drop",
                        "div_name" => "add-drop",
                        "data" => $data
                    );
                    break;
                case "trades":
                    $function->getDataQuery("users", "ssid", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "5",
                        "page_name" => "Trades",
                        "div_name" => "trades",
                        "data" => $data
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
                    $nba = $function->GetCountFromPool("NBA");
                    $nba = $function->SetCountFromPool();

                    $nfl = $function->GetCountFromPool("NFL");
                    $nfl = $function->SetCountFromPool();

                    $mlb = $function->GetCountFromPool("MLB");
                    $mlb = $function->SetCountFromPool();

                    $nhl = $function->GetCountFromPool("NHL");
                    $nhl = $function->SetCountFromPool();

                    $counts = array(
                        "nba" => $nba,
                        "nfl" => $nfl,
                        "mlb" => $mlb,
                        "nhl" => $nhl
                    );

                    $function->GetDataFromPool();
                    $data = $function->SetPoolDataQuery();
                    array_push($data, $counts);
                    $page_content_array[] = array(
                        "id" => "7",
                        "page_name" => "Draft",
                        "div_name" => "m-a-n",
                        "data" => $data,
                        "count" => $counts
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
                "js5" => '<script src="' . ABSOLUTH_PATH_JS . 'profile.js"></script>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "roster") {

            $footer_script = array(
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "add-drop") {

            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'add-drop.js"></script>',
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] != "") {
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
