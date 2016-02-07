<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of body
 *
 * @author rostom
 */
class body {
    /*
     * *******PAGE TYPE*********
     * If you want to add new pages 
     * please add them to this list as well
     * RS 20160131
     * 1. Home
     * 2. Profile
     * 3. Drafts
     * 4. Roster
     * 5. Trades
     * 6. MatchUp
     * 7. Add-Drop
     * 8. 404
     */

    public function __construct() {
        
    }

    public function BuildPages(array $page_types) {

        foreach ($page_types as $pg) {

            switch ($pg['id']) {

                case "0":
                    $forms = new forms();
                    echo '<section id="' . $pg["div_name"] . '">';
                    $forms->SignUpProcess($pg['signup']);
                    echo $forms->SignUpForm();
                    $forms->LoginProcess($pg['login']);
                    echo $forms->LoginForm();
                    echo '</div>';
                    echo '</section>';
                    break;
                case "1":
                    $_GET['page_name'] = $pg['page_name'];
                    var_dump($_SESSION['isLoggedin']);
                    include ABSOLUTH_PATH_PAGE . "profile.php";
                    break;
                case "2":
                    include ABSOLUTH_PATH_PAGE . "home.php";
                    break;
                case "3":
                    include ABSOLUTH_PATH_PAGE . "roster.php";
                    break;
                case "4":
                    include ABSOLUTH_PATH_PAGE . "add-drop.php";
                    break;
                case "5":
                    include ABSOLUTH_PATH_PAGE . "tades.php";
                    break;
                case "6":
                    include ABSOLUTH_PATH_PAGE . "matchup.php";
                    break;
                case "7":
                    include ABSOLUTH_PATH_PAGE . "draft.php";
                    break;
                case "8":
                    echo "Settings";
                    break;
                case "9":
                    $forms = new forms();
                    echo $forms->EditProfileForm($pg);
                    break;
                case "10":
                    unset($_SESSION['isLoggedin']);
                    header("Location:loader.php?cmd=");
                    break;
                case "404":
                    include ABSOLUTH_PATH_PAGE . "404.php";
                    break;
                default:

                    $forms = new forms();
                    echo '<section id="' . $pg["div_name"] . '">';
                    echo $forms->SignUpForm();
                    echo $forms->LoginForm();
                    echo '</div>';
                    echo '</section>';

                    break;
            }
        }
    }

}
