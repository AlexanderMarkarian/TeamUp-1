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
    public $_data = array();
    public $_pooldata = array();
    public $_count;
    public $_date;

    /*
     * @ auth: Rostom
     * Constructor magic function
     * @param n/a
     * Instance of db class
     * DO NOT MODIFY
     * RS 02072016
     */

    public function __construct() {
        $this->_db = db_connect::getInstance();
        $this->_mysqli = $this->_db->getConnection();
    }

    /*
     * @auth: Rostom
     * @param : $message
     * used for echoing out error messages
     * RS 02042016
     */

    public function GetErrorMessage($message) {
        $this->_message = $message;
        ?>
        <div class="errors_forms">

            <p><?= $this->_message; ?></p>

        </div>

        <?php
    }

    /*
     * @auth: Rostom
     * @param 1: $table
     * @param 2: $search
     * used to check at sign up if the email address is already registered
     * RS 02042016
     */

    public function CheckUserInDB($table, $search) {

        $sql = "SELECT * FROM $table WHERE email = '$search'";
        $result = $this->_mysqli->query($sql);
        $num_rows = $result->num_rows;

        if ($num_rows > 0) {

            return $this->_results = true;
        }
    }

    /*
     * @auth: Rostom
     * @param 1: $table
     * @param 2: $fields[]
     * @param 3: $values[]
     * Used to insert new users into users table
     * RS 02042016
     */

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

    /*
     * @auth: Rostom
     * @param : $prefix
     * Used to generate unique id values for various tasks
     * RS 02062016
     */

    public function UIDGEN($prefix) {

        return $prefix = uniqid($prefix);
    }

    /*
     * @auth: Rostom
     * @param 1: $table
     * @param 2: $value
     * Used for checking if the ssid is valid or not
     * RS 02032016 Modified on 02062016
     */

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

    /*
     * @Auth: Rostom
     * @param 1: $table
     * @param 2: $values[]
     * Used for logging a registered user into the system
     * RS 02032016
     * Mod might be needed
     */

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

    /*
     * @Author: Rostom
     * Date: 02-04-2016
     * @param $table
     * @param $value
     * @param $field
     * @param $value2
     * Modified 02062016
     * Use this to update ssid for logout or login etc...
     */

    public function UpdateLoginSSID($table, $value, $field, $value2) {
        $sql = "UPDATE `$table` SET ssid='$value' WHERE `$field`='$value2'";

        $result = $this->_mysqli->query($sql);

        if ($result) {
            return $this->_results = true;
        } else {
            return $this->_results = false;
        }
    }

    /*
     * @Auth: Rostom
     * @param 1: $table
     * @param 2: $value
     * used for fetching user data from users table but it can do more
     * Some modification may be needed
     * RS 02042016
     */

    public function getDataQuery($table, $value) {
        $sql = "SELECT * FROM `$table` WHERE ssid = '$value'";
        $result = $this->_mysqli->query($sql);
        while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
            $this->_data[] = $rows;
        }
    }

    /*
     * @auth: Rostom
     * Returns Data as an array
     * used universally
     * Do Not Modify
     * RS 02072016
     */

    public function SetDataQuery() {
        return $this->_data;
    }

    /*
     * @auth: Rostom
     * Used to fetch all the data from Pool table
     * Some modification may be needed
     * RS 02072016
     */

    public function GetDataFromPool() {
        $sql = "SELECT * FROM pool";
        $result = $this->_mysqli->query($sql);
        while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
            $this->_pooldata[] = $rows;
        }
    }

    /*
     * @ Auth: Rostom
     * Returns the values from Pool table as an array
     * Do Not Modify
     * RS 02072016
     */

    public function SetPoolDataQuery() {
        return $this->_pooldata;
    }

    /*
     * @Auth :Rostom
     * @ param: $value
     * It is not used currently
     * It gets the number of teams in each sports catagory
     * RS 02072016
     */

    public function GetCountFromPool($value) {

        $sql = "SELECT * FROM pool WHERE sport ='$value'";
        $result = $this->_mysqli->query($sql);
        $num_rows = $result->num_rows;
        $this->_count = $num_rows;
    }

    /*
     * @Auth: Rostom
     * @param: n/a
     * Returns the count fetched from Pool table
     * Do Not Modify
     * RS 02072016
     */

    public function SetCountFromPool() {
        return $this->_count;
    }

    /*
     * @Auth Rostom
     * @param n/a 
     * Set format (Month Day, Year, Time)
     * F 	A full textual representation of a month
     * j 	Day of the month without leading zeros
     * Y        Year 4 digits
     * g 	12-hour format of an hour without leading zeros
     * i 	Minutes with leading zeros
     * a 	Lowercase Ante meridiem and Post meridiem
     * RS 02072016
     */

    public function DateAndTime() {

        $date = date("F j, Y, g:i a");
        $this->_date = $date;
    }

    /*
     * @Auth :Rostom
     * Returns date and time
     * RS 02072016
     */

    public function ReturnDate() {
        return $this->_date;
    }

}
