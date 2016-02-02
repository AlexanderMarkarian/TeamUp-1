<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db_connect
 *
 * @author rostom
 */
class db_connect {
    
    private $_connection;
    private static $_instance;
    private $_user = USERNAME;
    private $_password = PASSWORD;
    private $_db = DB;
    private $_host = HOST;
    
    
    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new db_connect();
        }
        return self::$_instance;
    }
    
    private function __construct() {
        $this->_connection = new mysqli($this->_host,  $this->_user,  $this->_password,  $this->_db);
        if(mysqli_connect_error()){
            trigger_error("Failed to connect to MySQL: " .mysqli_connect_error(),E_USER_ERROR);
        }
    }
    private function __clone() {
        
    }
    public function getConnection(){
        return $this->_connection;
    }
}