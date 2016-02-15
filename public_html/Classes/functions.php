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
    public $_messages = array();
    private $_db;
    private $_mysqli;
    private $_results;
    public $_data = array();
    public $_pooldata = array();
    public $_count;
    public $_date;
    public $_id;
    public $_flag = 0;

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

    public function getDataQuery($table, $field, $value) {
        $sql = "SELECT * FROM `$table` WHERE $field = '$value'";
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

    /*
     * @Auth Rostom
     * @parm $table, $field, $search_value
     * Universal checking if a certain value is in a table or not
     * RS 02132016
     */

    public function UniversalCheckValues(array $table, array $field, array $search_value, $option3) {
        $query_row = array();
        $sql = "SELECT * FROM `" . $table['table0'] . "` WHERE `" . $field['0'] . "` = '" . $search_value['0'] . "'";
        echo "<br/>";
        $result = $this->_mysqli->query($sql);
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $query_row[] = $row;
        }
        foreach ($query_row as $data) {
            if ($data[$search_value['1']] != NULL) {
                $sql = "SELECT * FROM `" . $table['table1'] . "` WHERE `" . $field['1'] . "` = '" . $data[$search_value['1']] . "'";
                $result = $this->_mysqli->query($sql);
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $this->_data[] = $row;
                }
                foreach ($this->_data as $data) {
                    if ($option3 == NULL) {
                        if ($data[$search_value['2']] != NULL) {
                            $sql = "SELECT * FROM `" . $table['table2'] . "` WHERE `" . $field['2'] . "` = '" . $data[$search_value['2']] . "'";
                            $result = $this->_mysqli->query($sql);
                            $row = $result->fetch_array(MYSQLI_ASSOC);
                            $query_row[] = $row;
                            if ($row[$search_value['3']] == $search_value['4']) {

                                return true;
                            } else {
                                return false;
                            }
                        }
                    }
                }
            }
        }
    }

    /*
     * @Auth: Rostom
     * Desc: Check if the selected date is not in the past
     * First parse the given value then compare date then time
     * @param: $date_time 
     */

    public function CheckDateTime($date_time) {
        $draft_time = strtotime($date_time); //Turns date and time to seconds
        if (time() > $draft_time) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * @Auth: Rostom
     * Desc: universal Insertion of values depending on given param
     * @param: $value[], $cmd
     */

    public function InsertAll(array $values, $cmd = NULL) {

        if ($cmd != NULL) {
            foreach ($values as $v) {
                $table = $v['table0'];
                $sql = "INSERT INTO `$table`";
            }
            $sql .= "("
                    . implode(",", $values["fields"])
                    . ") ";
            $sql .= "VALUES ";
            $sql .="(" . implode(",", $values['values']) . ")";

            $result = $this->_mysqli->query($sql);
            if ($result) {
                array_push($this->_messages, $values['tables']['table0'] . " were updated");
            } else {
                $this->_flag = 1;
                array_push($this->_messages, $values['tables']['table0'] . " was not updated");

                return false;
            }
        } else {

            $filename = ABSOLUTH_PATH_ERRORS . "error_log_" . date('Ymd') . ".text";
            $linecount = 0;
            if (file_exists($filename)) {

                $filename = ABSOLUTH_PATH_ERRORS . "error_log_" . date('Ymd') . ".text";
                $error_log = $filename;
                $log = fopen($error_log, 'w') or die("Cannot open file:" . $error_log);

                $data .= "ERROR #2 From functions.php\n";
                $timestamp = $this->DateAndTime();
                $timestamp = $this->ReturnDate();
                $data .= "Date and time:" . $timestamp . "\n";
                $data .="Function: InsertAll\n";
                $data .="Message: command is null.\n" . PHP_EOL;
                fwrite($log, $data);
                fclose($log);
            }

            return false;
        }
    }

    /*
     * @Auth: Rostom
     * Desc: Returns the flag status default at 0
     * RS 02/13/2016
     */

    public function ReturnFlag() {
        return $this->_flag;
    }

    /*
     * @Auth: Rostom
     * Desc: Gets the id number from a table
     * Use this if you need to fetch only a single value
     * @para:  $table, $field, $key(search quireria)
     * RS 02/13/2016
     */

    public function GetIDFromTables($table, $field, $key) {

        $sql = "SELECT * FROM `$table` WHERE $field = '$key'";
        $result = $this->_mysqli->query($sql);
        if ($result) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $this->_id = $row;
        } else {
            $this->_id = false;
        }
    }

    /*
     * @Auth: Rostom
     * Desc: Returns ftehced id
     */

    public function SetIDFromTables() {
        return $this->_id;
    }

    /*
     * @Auth: Rostom
     * Desc: Returns array message
     */

    public function RetMessages() {

        return $this->_messages;
    }

    /*
     * @Auth: Rostom
     * Desc: Next process after creating league
     * 
     */



    /*
     * @Auth: Rostom
     * Desc: Sends an email to recipients added by the league owner
     * will utilize the mail template, key generator
     * @parm: $email_values 
     * 
     */

    public function EmailInvitation(array $email_values) {
        
    }
    
    /*
     * @auth: Rostom
     * Desc: Delete items
     * @para: $tables[], $fields[], $keys[]
     * RS 02/14/2016
     */
    
    public function DeleteItems(array $tables, array $fields, array $keys){
        for($i=0; $i<count($tables); $i++){
        $sql = "DELETE FROM `".$tables[$i]."` WHERE `".$fields[$i]."` = '".$keys['0']."'";
        
        $result = $this->_mysqli->query($sql);
        
        if($result){
            
            array_push($this->_messages, "league was deleted from-->".$tables[$i]);
            $this->_flag = 22;
        
        }
        
        
        
        }     
    }

}
