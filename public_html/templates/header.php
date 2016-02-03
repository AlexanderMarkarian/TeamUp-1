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
    private $_sliders = array();
    private $_vars = array();

    /* Header Constructor will echo the links and navigation */

    public function __construct() {
        
    }

    public function HeaderBasicHtml() {
        $command = new commands();
        $command->FindAllCommands($_GET['cmd']);
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
                    <div id="load_screen"><div id="loading"><img id="image" src="<?= ABSOLUTH_PATH_IMAGES ?>other/loading2.gif"></div></div>
                    <div class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <?php
                                foreach ($this->SetHomeSlider() as $slider_image) {
                                    ?>
                                    <li>

                                        <img src="<?= $slider_image ?>" alt=""/>

                                        <div class="caption"><div class="container">
                                            </div></div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <header>
                        <div class="top">
                            <div class="container">
                                <div class="col-12">
                                    <div class="col-2">
                                        <div class="logo"><img src="<?= ABSOLUTH_PATH_IMAGES ?>logo.png" alt=""/></div>
                                    </div>
                                    <nav id="top-menu">
                                        <ul class="clearfix">
                                            <?php
                                            ?>
                                            <?php
                                            foreach ($this->SetNavLinks() as $key => $nav_links) {

                                                    ?>
                                                <li class=""><a href="<?= $nav_links ?>"><?= $key; ?></a></li>
                                                <?php
                                            }
                                            ?>


                                        </ul>
                                        <a href="#" id="pull">Menu</a>
                                    </nav>
                                    <nav class="mobilemenu">
                                        <select>
                                            <option value="home.php">Home</option>
                                            <option value="roster.php">Roster</option>
                                            <option value="available.php">Add/Drop</option>
                                            <option value="trades.php">Trades</option>
                                            <option value="matchup.php">Club</option>
                                            <option value="draft.php">Draft</option>
                                        </select>
                                    </nav>
                                    <div class="login">
                                        <a href="profile.php"><span id="icon-user"><i class="fa fa-user"></i>Profile</span></a><a href="logout.php"><span>Log Out</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>

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

            /* SET NAVIGATION */

            public function SetNavLinks() {

                return $this->_nav;
            }

            public function GetHomeSlider(array $sliders) {
                $this->_sliders = $sliders;
            }

            public function SetHomeSlider() {
                return $this->_sliders;
            }

        }
        