<?php

/**
 * Description of loader
 * @author Rostom Sahakian <rostom.sahakian.549@my.csun.edu>
 * LOADS Head, Body, Footer
 * 
 * Anything needs to be added to page UI goes here 
 * RS 20160131
 */
ob_start();
require_once 'autoLoader.php';

class loader {

    //put your code here
    private $_header_content = array();

    public function __construct() {
        SESSION_STARTED;
        echo $this->PageHeader();
        echo $this->LoadPageBody();
        echo $this->LoadPageFooter();
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
        $get_title = ((!isset($_GET['page_name']) || $_SERVER['REQUEST_METHOD']) == "GET") ? "Team Up - Home" : $_POST['page_name'];
   
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
        if (!isset($_GET['cmd']) || $_GET['cmd'] == "") {

            $css = array(
                "css1" => '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'pure.min.css">',
                "css2" => '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'general.css">',
                "css3" => '<link rel="stylesheet" type="text/css" href="' . ABSOLUTH_PATH_CSS . 'submit.css">',
                "css4" => '<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">',
                "css5" => '<link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic%7COswald:400,300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">',
                "css6" => '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css">',
                "css7" => '<link rel="stylesheet" type="text/css" href="' . ABSOLUTH_PATH_CSS . 'pageLoader.css">',
                "css8" => '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>',
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "profile") {

            $css = array(
                "css1" => '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'profile.css">',
                "css2" => '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'profile-animation.css">',
                "css3" => '<link rel="stylesheet" type="text/css" href="' . ABSOLUTH_PATH_CSS . 'jquery.datetimepicker.css">'
            );
        }

        /* JAVASCRIPT LINKS CAN BE ADDED TO THIS ARRAY */
        /* USE ABSOLUTH_PATH_JS for Paths on js */
        $js = array(
            "js1" => '<script src="http://code.jquery.com/jquery-1.10.2.js"></script>',
            "js2" => '<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>',
            "js3" => '<script type="text/javascript" src="' . ABSOLUTH_PATH_JS . 'libs/modernizr-2.5.3.min.js"></script>',
            "js10" => '',
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
            "link1" => "",
            "link2" => "",
            "link3" => "",
            "link4" => "",
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
        $commands = new commands();


        /* 
         * Pages 
         * Default set for Home page
         * follow the procedure from below
         * Do NOT Change fist if statment 
         */
        if (!isset($_GET['cmd']) || $_GET['cmd'] == "") {

            $page_content_array[] = array(
                "id" => "0",
                "page_name" => "Home",
                "div_name" => "m-a-n",
                "values" => $_POST
            );
            /*
             * Profile
             * id @ 1
             * DO not Change this
             * RS 20160201
             * 
             */
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "profile" && $function->CheckSSID("users", $_GET['ssid']) == true) {
            $page_content_array[] = array(
                "id" => "1",
                "page_name" => "Profile",
                "div_name" => "m-a-n",
                "values" => $_POST
            );
            /*
             * other pages [example: matchup, etc...]
             * use $page_content_array[]
             * RS 20160201
             */
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "matchup" && $function->CheckSSID("users", $_GET['ssid']) == true) {
            
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
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery-1.10.2.min.js"></script>',
                "js5" => ' <script src="' . ABSOLUTH_PATH_JS . 'libs/jquery.flexslider-min.js"></script>',
                "js6" => ' <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>',
                "js7" => ' <script src="' . ABSOLUTH_PATH_JS . 'libs/jquery.bxslider.min.js"></script>',
                "js8" => ' <script src="' . ABSOLUTH_PATH_JS . 'pageLoader.js"></script>',
                "js9" => ' <script src="' . ABSOLUTH_PATH_JS . 'scripts.js"></script>',
                "js10" => '<script src="' . ABSOLUTH_PATH_JS . 'bootstrap.min.js" type="text/javascript"></script>'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "profile") {

            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery-1.10.2.min.js"></script>',
                "js5" => '<script src="' . ABSOLUTH_PATH_JS . 'profile.js"></script>',
                "js6" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery.datetimepicker.full.min.js"></script>',
                "js7" => "<script>
          $(function() {
            $('.datetimepicker').datetimepicker({
                dayOfWeekStart : 1,
                lang:'en',
                disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
                startDate:  '2016/01/01'
            });
          });
          </script>"
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
