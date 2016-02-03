<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of functions
 *
 * @author rostom
 */
class functions {

    //put your code here
    public $_message;
    private $_db;
    private $_mysqli;
    private $_results;

    public function __construct() {
        $this->_db = db_connect::getInstance();
        $this->_mysqli = $this->_db->getConnection();
    }

    public function GetErrorMessage($message) {
        $this->_message = $message;
        ?>
        <div class="errors_forms">

            <p><?= $this->_message; ?></p>

        </div>

        <?php
    }

    public function CheckUserInDB($table, $search) {

        $sql = "SELECT * FROM $table WHERE email = '$search'";
        $result = $this->_mysqli->query($sql);
        $num_rows = $result->num_rows;

        if ($num_rows > 0) {

            return $this->_results = true;
        }
    }

    public function InsertNewUser($table, array $fields, array $values) {

        $sql = "INSERT INTO `$table` (" . $fields['first_name'] . "," . $fields['last_name'] . "," . $fields['email'] . "," . $fields['password'] . "," . $fields['ssid'] . ") "
                . "VALUES ('" . $values['fname'] . "',"
                . "'" . $values['lname'] . "',"
                . "'" . $values['email'] . "',"
                . "'" . md5($values['password']) . "',"
                . "'" . $values['ssid'] . "'"
                . ")";
        $result = $this->_mysqli->query($sql);
        if ($result) {
            return $this->_results = true;
        } else {
            return $this->_results = false;
        }
    }

    public function UIDGEN($prefix) {

        return $prefix = uniqid($prefix);
    }

    public function CheckSSID($table, $value) {
        $sql = "SELECT * FROM `$table` WHERE ssid = '$value'";
        $result = $this->_mysqli->query($sql);
        $num_rows = $result->num_rows;
        if ($num_rows == "1") {
            return $this->_results = true;
        } else {
            return $this->_results = false;
        }
    }

    public function LogUserIn($table, array $values) {        
        $sql = "SELECT * FROM `$table` WHERE email = '" . $values['email'] . "' AND password ='" . md5($values['password']) . "'";       
        $result = $this->_mysqli->query($sql);
        $num_rows = $result->num_rows;
        if ($num_rows == 1) {
            return $this->_results = true;
        } else {
            return $this->_results = false;
        }
    }
    public function UpdateLoginSSID($table, $value,$value2){
        $sql ="UPDATE `$table` SET ssid='$value' WHERE email='$value2'";
        var_dump($sql);
        $result = $this->_mysqli->query($sql);
        var_dump($result);
        if($result){
            return $this->_results = true;
        }else{
            return $this->_results = false;
        }
        
        
    }

}
