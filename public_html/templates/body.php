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

                    include ABSOLUTH_PATH_PAGE . "landing.php";
                    break;
                case "1":
                    $_GET['page_name'] = $pg['page_name'];
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
                    include ABSOLUTH_PATH_PAGE . "trades.php";
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
                case "11":
                    include ABSOLUTH_PATH_PAGE . "help.php";
                    break;
                case "12":
                    include ABSOLUTH_PATH_PAGE . "faq.php";
                    break;
                case "13":
                    $forms = new forms();
                    include ABSOLUTH_PATH_PAGE . "teaminfo.php";
                    break;
                case '304':
                    $ajax = new forms();
                    echo $ajax->LoginProcess($pg['login']);
                    break;
                case '305':
                    $ajax = new forms();
                    echo $ajax->SignUpProcess($pg['signup']);
                    break;
                case '306':
                    $ajax = new forms();
                    echo $ajax->CreateLeagueProcess($pg['create_league']);
                    break;
                case '307':
                    $ajax = new forms();
                    echo $ajax->MoreFieldsCall($pg['add_more_fields']);
                    break;
                case '308':
                    $ajax = new forms();
                    echo $ajax->InviteMembersProcess($pg['send_invite_now']);
                    //var_dump($pg['send_invite_now']);
                    break;
                case '309':
                    $ajax = new forms();
                    echo $ajax->ScoreNavBar($pg['create_nav']);
                    break;
                case '310':
                    $ajax = new forms();
                    echo $ajax->JoinLeagueProcess($pg['join_league']);
                    break;
                case '311':
                    $ajax = new forms();
                    echo $ajax->AddDropProcess($pg['add_drop']);
                    break;
                case '312':
                    $ajax = new forms();
                    echo $ajax->CheckTurn($pg['checkTurn']);
                    break;
                case '313':
                    $ajax = new forms();
                    echo $ajax->CheckRefresh($pg['refresh']);
                    break;
                case '314':
                    $ajax = new forms();
                    echo $ajax->StartDraft($pg['startDraft']);
                    break;
                case '315':
                    $ajax = new forms();
                    echo $ajax->TradeProcess($pg['completeTrade']);
                    break;       
                case '316':
                    $ajax = new forms();
                    echo $ajax->ApproveTradeProcess($pg['approveTrade']);
                    break;     
                case '317':
                    $ajax = new forms();
                    echo $ajax->CancelTradeProcess($pg['cancelTrade']);
                    break; 
                case '318':
                    $ajax = new forms();
                    echo $ajax->RenameLeagueProcess($pg['renameLeague']);
                    break;  
                case '319':
                    $ajax = new forms();
                    echo $ajax->DeleteLeagueProcess($pg['deleteLeague']);
                    break;
                case '320':
                    $ajax = new forms();
                    echo $ajax->DeleteLeagueUserProcess($pg['deleteLeagueUser']);
                    break;
                case '321':
                    $ajax = new forms();
                    echo $ajax->ReadyDraftProcess($pg['readyDraft']);
                    break;                   
                case '55':
                    $forms = new forms();
                    $functions = new functions();
                    include ABSOLUTH_PATH_PAGE . "invited_signup.php";
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
