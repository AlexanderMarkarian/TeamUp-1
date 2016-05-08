<?php

/**
 * Description of header
 *
 * @author rostom
 * Header will be loaded from this template
 */
class header {

    //Header files will go here 
    public $_meta = array();
    public $_title = array();
    public $_css = array();
    public $_js = array();
    public $_nav = array();
    public $_shortnav = array();
    private $_sliders = array();
    private $_vars = array();

    /* Header Constructor will echo the links and navigation */

    public function __construct() {
        
    }

    public function HeaderBasicHtml() {
        //$command = new commands();
        //$command->FindAllCommands($_GET['cmd']);
        ?>
        <!--        <!DOCTYPE html>-->
        <html>
            <head>
                <?php
                foreach ($this->SetMetaForHeader() as $Header_meta) {
                    echo $Header_meta;
                }
                foreach ($this->SetTitleForHeader() as $pg_title) {
                    echo $pg_title;
                }
                foreach ($this->SetCSSForHeader() as $pg_css) {
                    echo $pg_css;
                }
                foreach ($this->SetJSForHeader() as $pg_js) {
                    echo $pg_js;
                }
                ?>
            </head>
            <?php $class = (isset($_GET['cmd']) ? "dm-demo3" : "") ?>
            <body class="<?= $class; ?>">
                <!---------NAVIGATION OR SLIDER GOES BELOW----------->

                <?php
                $this->_vars['cmd'] = ($_SERVER['REQUEST_METHOD'] == "GET") ? $_GET['cmd'] : $_POST['cmd'];
                /*
                 * RS 20160201
                 * Check if cmd is set or cmd is empty
                 * if true load slider images
                 * 
                 */
                if (!isset($_GET['cmd']) || $_GET['cmd'] == "") {
                    ?>
                 
                    <?php
                } 
                else if($_GET['cmd'] == "profile"){
                    ?>
                    <div id="load_screen"><div id="loading"><img id="image" src="<?= ABSOLUTH_PATH_IMAGES ?>other/loading.gif"></div></div>
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="navbar-header page-scroll">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#page-top">TeamUp</a>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <?php
                                    /*
                                     * Navigation menu
                                     * if you want to have drop down menu add it to the array
                                     */
                                     foreach ($this->SetShortNavLinks() as $key => $nav_links) {
                                         ?>
                                         <li><a href="<?= $nav_links ?>"><?= $key; ?></a></li>
                                         <?php
                                     }
                                     ?>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <?php
                }
                else if (isset($_GET['cmd']) && $_GET['cmd'] != "" && $_GET['cmd'] != "profile") {
                    ?>
                    <div id="load_screen"><div id="loading"><img id="image" src="<?= ABSOLUTH_PATH_IMAGES ?>other/loading.gif"></div></div>
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="navbar-header page-scroll">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#page-top">TeamUp</a>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <?php
                                    /*
                                     * Navigation menu
                                     * if you want to have drop down menu add it to the array
                                     */
                                    foreach ($this->SetNavLinks() as $key => $nav_links) {
                                        if (is_array($nav_links)) {
                                            ?>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $key ?><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    foreach ($nav_links as $k => $nav) {

                                                        if ($k != "Log Out") {
                                                            ?>
                                                    <li ><a href="<?= $nav['link'] ?>"><i class="<?=$nav['class'] ?>"></i>  <?= $k; ?></a></li>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <li role="separator" class="divider"></li>
                                                            <li ><a href="<?= $nav['link'] ?>"><i class="<?=$nav['class'] ?>"></i>  <?= $k ?></a></li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </ul>
                                            </li>

                                            <?php
                                        } else {
                                            ?>
                                            <li class="dropdown"><a href="<?= $nav_links ?>"><?= $key; ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <?php
                }
            }

            /* GETS META DATA FOR HEADER */

            public function GetMetaForHeader(array $meta) {

                $this->_meta = $meta;
            }

            /* SETS META DATA FOR HEADER */

            public function SetMetaForHeader() {
                return $this->_meta;
            }

            /* GET TITLE FOR EACH PAGE */

            public function GetTitleForHeader(array $tilte) {

                $this->_title = $tilte;
            }

            /* SETS TITLE FOR HEADER */

            public function SetTitleForHeader() {

                return $this->_title;
            }

            /* GETS CSS FILES FOR HEADER */

            public function GetCSSForHeader(array $css) {

                $this->_css = $css;
            }

            /* SET CSS */

            public function SetCSSForHeader() {

                return $this->_css;
            }

            /* GET JavaScript */

            public function GetJSForHeader(array $js) {

                $this->_js = $js;
            }

            /* SET JavaScripts */

            public function SetJSForHeader() {

                return $this->_js;
            }

            /* NAVIGATION LINKS */

            public function GetNavLinks(array $nav) {

                $this->_nav = $nav;
            }
            
            public function GetShortNavLinks(array $nav){
                $this->_shortnav = $nav;
            }

            /* SET NAVIGATION */

            public function SetNavLinks() {

                return $this->_nav;
            }
            
            public function SetShortNavLinks(){
                return $this->_shortnav;
            }

            public function GetHomeSlider(array $sliders) {
                $this->_sliders = $sliders;
            }

            public function SetHomeSlider() {
                return $this->_sliders;
            }

            public function BuildNavigation(array $navlinks) {
                // $this->_nav = $navlinks;
                foreach ($navlinks as $key => $nav_item) {

                    if (is_array($nav_item)) {

                        foreach ($nav_item as $k => $sub_menu) {
                            
                        }
                        return $sub_menu;
                    }
                }
            }

        }
        