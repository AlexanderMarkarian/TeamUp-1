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
                    include ABSOLUTH_PATH_PAGE."profile.php";
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
