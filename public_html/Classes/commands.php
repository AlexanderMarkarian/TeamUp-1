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

    //put your code here
    public $_command;

    public function __construct() {
        //$this->ReturnAllCommands();
    }

    public function FindAllCommands($needle) {

        $commands = array(
            "profile",
            "matchup"
        );
        
        if (in_array($needle, $commands)) {

            $this->_command = true;
        } else {
            $this->_command = false;
        }
       
    }

    public function ReturnAllCommands() {
        return $this->_command;
    }

}
