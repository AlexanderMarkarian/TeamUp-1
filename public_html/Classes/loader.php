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

    public function __construct() {

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
        $get_title = (isset($_GET['page_name'])) ? $_POST['page_name'] : "Team Up - Home";
        //var_dump($_SERVER);
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
            "css1" => '<link href="' . ABSOLUTH_PATH_CSS . 'bootstrap.min.css" rel="stylesheet" type="text/css"/>',
            "css2" => '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'font-awesome.css">',
            "css2" => '<link rel="stylesheet" type="text/css" href="' . ABSOLUTH_PATH_CSS . 'jquery.datetimepicker.css">',
            "css3" => ' <link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'style.css">',
        );

        if (!isset($_GET['cmd']) || $_GET['cmd'] == "") {

            array_push($css, '<link rel="stylesheet" href="' . ABSOLUTH_PATH_CSS . 'intro.css">'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "profile") {

            array_push($css, ""
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "roster") {

            array_push($css, '<link rel="stylesheet" type="text/css" href="' . ABSOLUTH_PATH_CSS . 'dragdrop.css">', '<link rel="stylesheet" type="text/css" href="' . ABSOLUTH_PATH_CSS . 'pageLoader.css">'
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] != "") {

            array_push($css, ""
            );
        }

        /* JAVASCRIPT LINKS CAN BE ADDED TO THIS ARRAY */
        /* USE ABSOLUTH_PATH_JS for Paths on js */
        $js = array(
            "js1" => "  <script type='text/javascript' src='" . ABSOLUTH_PATH_JS . "libs/modernizr-2.5.3.min.js'></script>"
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
                "Profile" => "loader.php?cmd=profile&ssid={$_GET['ssid']}",
                "Settings" => "loader.php?cmd=settings&ssid={$_GET['ssid']}",
                "Edit Profile" => "loader.php?cmd=edit-profile&ssid={$_GET['ssid']}",
                "Log Out" => "loader.php?cmd=log-out&ssid={$_GET['ssid']}"
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
                "page_name" => "Home",
                "div_name" => "m-a-n",
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
        } else if (isset($_GET['cmd']) && $function->CheckSSID("users", $_GET['ssid']) == true && $command->ReturnAllCommands()) {

            switch ($_GET['cmd']) {
                case "profile":
                    $function->getDataQuery("users", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "1",
                        "page_name" => "Profile",
                        "div_name" => "m-a-n",
                        "data" => $data
                    );

                    break;
                case "home":
                    $function->getDataQuery("users", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "2",
                        "page_name" => "Home",
                        "div_name" => "m-a-n",
                        "data" => $data
                    );
                    break;
                case "roster":
                    $function->getDataQuery("users", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "3",
                        "page_name" => "Roster",
                        "div_name" => "m-a-n",
                        "data" => $data
                    );
                    break;
                case "add-drop":
                    $function->GetDataFromPool();
                    $data = $function->SetPoolDataQuery();
                    $page_content_array[] = array(
                        "id" => "4",
                        "page_name" => "Add/Drop",
                        "div_name" => "m-a-n",
                        "data" => $data
                    );
                    break;
                case "trades":
                    $function->getDataQuery("users", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "5",
                        "page_name" => "Trades",
                        "div_name" => "m-a-n",
                        "data" => $data
                    );
                    break;
                case "matchup":
                    $function->getDataQuery("users", $_GET['ssid']);
                    $data = $function->SetDataQuery();
                    $page_content_array[] = array(
                        "id" => "6",
                        "page_name" => "Match Up",
                        "div_name" => "m-a-n",
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
                   
                 
                    //var_dump($nba);

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
            }
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
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery-1.10.2.min.js"></script>',
                "js5" => ' <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>',
                "js6" => ' <script src="' . ABSOLUTH_PATH_JS . 'libs/jquery.bxslider.min.js"></script>',
                "js7" => '<script src="' . ABSOLUTH_PATH_JS . 'bootstrap.min.js"></script>',
                "js8" => '<script src="' . ABSOLUTH_PATH_JS . 'slider.js"></script>',
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "profile") {

            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery-1.10.2.min.js"></script>',
                "js5" => '<script src="' . ABSOLUTH_PATH_JS . 'profile.js"></script>',
                "js6" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery.datetimepicker.full.min.js"></script>',
                "js8" => '<script src="' . ABSOLUTH_PATH_JS . 'bootstrap.min.js"></script>',
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
        } else if (isset($_GET['cmd']) && $_GET['cmd'] == "roster") {

            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery-1.10.2.min.js"></script>',
                "js5" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery.flexslider-min.js"></script>',
                "js6" => '<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>',
                "js7" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery.bxslider.min.js"></script>',
                "js8" => '<script src="' . ABSOLUTH_PATH_JS . 'pageLoader.js"></script>',
                "js9" => '<script src="' . ABSOLUTH_PATH_JS . 'scripts.js"></script>',
                "js10" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/draggability.pkgd.min.js"></script>',
                "js11" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/dragdrop.js"></script>',
                "js13" => '<script src="' . ABSOLUTH_PATH_JS . 'bootstrap.min.js"></script>',
                "js12" => "    <script>
		(function() {
			var body = document.body,
				dropArea = document.getElementById( 'drop-area' ),
				droppableArr = [], dropAreaTimeout;

			// initialize droppables
			[].slice.call( document.querySelectorAll( '#drop-area .drop-area__item' )).forEach( function( el ) {
				droppableArr.push( new Droppable( el, {
					onDrop : function( instance, draggableEl ) {
						// show checkmark inside the droppabe element
						console.log(this);
						classie.add( instance.el, 'drop-feedback' );
						clearTimeout( instance.checkmarkTimeout );
						instance.checkmarkTimeout = setTimeout( function() { 
							classie.remove( instance.el, 'drop-feedback' );
						}, 800 );
						// ...
					}
				} ) );
			} );

			// initialize draggable(s)
			[].slice.call(document.querySelectorAll( '#grid .grid__item' )).forEach( function( el ) {
				new Draggable( el, droppableArr, {
					draggabilly : { containment: document.body },
					onStart : function() {
						// add class 'drag-active' to body
						classie.add( body, 'drag-active' );
						// clear timeout: dropAreaTimeout (toggle drop area)
						clearTimeout( dropAreaTimeout );
						// show dropArea
						classie.add( dropArea, 'show' );
					},
					onEnd : function( wasDropped ) {
						var afterDropFn = function() {
							// hide dropArea
							classie.remove( dropArea, 'show' );
							// remove class 'drag-active' from body
							classie.remove( body, 'drag-active' );
						};

						if( !wasDropped ) {
							afterDropFn();
						}
						else {
							// after some time hide drop area and remove class 'drag-active' from body
							clearTimeout( dropAreaTimeout );
							dropAreaTimeout = setTimeout( afterDropFn, 400 );
						}
					}
				} );
			} );
		})();
	</script>"
            );
        } else if (isset($_GET['cmd']) && $_GET['cmd'] != "") {
            $footer_script = array(
                "js4" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery-1.10.2.min.js"></script>',
                "js5" => '<script src="' . ABSOLUTH_PATH_JS . 'profile.js"></script>',
                "js6" => '<script src="' . ABSOLUTH_PATH_JS . 'libs/jquery.datetimepicker.full.min.js"></script>',
                "js8" => '<script src="' . ABSOLUTH_PATH_JS . 'bootstrap.min.js"></script>',
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
