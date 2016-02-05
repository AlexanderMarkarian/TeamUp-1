<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of commands
 *
 * @author rostom
 */
class commands {

    /*
     * @author: Rostom Sahakian
     * Date: 20160203
     * @param: $needle
     * Please add all available commands here if not page will redirect to 404.php
     */
    public $_command;

    public function __construct() {
        
    }
    /*
     * Look for the command here
     * if not here then return false
     * Add commands to the array if needed
     */
    public function FindAllCommands($needle) {

        $commands = array(
            "profile",
            "home",
            "roster",
            "add-drop",
            "trades",
            "matchup",
            "draft"
        );
        
        if (in_array($needle, $commands)) {

            $this->_command = true;
        
        }
       
    }

    public function ReturnAllCommands() {
        return $this->_command;
    }

}
