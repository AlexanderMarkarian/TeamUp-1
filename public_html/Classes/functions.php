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
    public $_data_row = array();
    public $_pooldata = array();
    public $_count;
    public $_date;
    public $_id;
    public $_flag = 0;
    public $_fields = array();
    public $_more_inputs = array();

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

    public function RetdDataRow() {
        return $this->_data_row;
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

    public function CheckIfExists(array $tables, array $fields, array $values, $options = "0") {

        if (isset($options) && $options != NULL) {
            switch ($options) {

                case "1":
                    $sql = "SELECT * FROM `" . $tables['0'] . "` WHERE `" . $fields['0'] . "` = '" . $values['0'] . "'";
                    $result = $this->_mysqli->query($sql);
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $this->_data[] = $row;
                    }
                    break;
                case "2":
                    $sql = "SELECT * FROM `" . $tables['0'] . "` WHERE `" . $fields['0'] . "` = '" . $values['0'] . "'";
                    $result = $this->_mysqli->query($sql);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    if ($row[$values['1']] != NULL) {
                        $sql = "SELECT * FROM `" . $tables['1'] . "` WHERE `" . $fields['1'] . "` = '" . $row[$values['1']] . "'";
                        $result = $this->_mysqli->query($sql);
                        $num_rows = $result->num_rows;
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $this->_data_row[] = $row[$values['2']];
                        }
                        $data = array();
                        $data[] = $this->RetdDataRow();
                        foreach ($data as $res) {
                            for ($i = 0; $i < $num_rows; $i++) {
                                $sql = "SELECT * FROM `" . $tables['2'] . "` WHERE `" . $fields['3'] . "` = '" . $res[$i] . "'";
                                $result = $this->_mysqli->query($sql);
                                $row = $result->fetch_array(MYSQLI_ASSOC);
                                if (mysqli_real_escape_string($this->_mysqli, $row[$values['3']]) == mysqli_real_escape_string($this->_mysqli, $values['4'])) {
                                    return true;
                                } else {
                                    
                                }
                            }
                        }
                    }
                    break;
                case "3":
                    $sql = "SELECT * FROM `" . $tables['0'] . "` WHERE `" . $fields['0'] . "` = '" . $values['0'] . "'";

                    $result = $this->_mysqli->query($sql);
                    $num_rows = $result->num_rows;
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $this->_data_row[] = $row;
                    }

                    foreach ($this->RetdDataRow() as $ret)
                        if ($ret[$values['1']] != NULL) {
                            $sql = "SELECT * FROM `" . $tables['1'] . "` WHERE `" . $fields['1'] . "` = '" . $ret[$values['1']] . "'";

                            $result = $this->_mysqli->query($sql);
                            while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
                                //
                                $this->_data[] = $rows;
                            }
                        }
                    break;
                case "4":
                    $sql = "SELECT * FROM `" . $tables['0'] . "` WHERE `" . $fields['0'] . "` = '" . $values['0'] . "' AND `" . $fields['1'] . "` = '" . $values['1'] . "'";
                    $result = $this->_mysqli->query($sql);
                    $num_rows = $result->num_rows;
                    if ($num_rows == 1) {
                        return true;
                    } else {
                        return false;
                    }
                    break;
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

    public function GetIDFromTables($table, array $field, array $key, $option = 0) {

        $sql = "SELECT * FROM `$table` WHERE";
        $sql .=" `" . $field['0'] . "` = '" . $key['0'] . "'";
        if ($option != 0) {
            $sql .=" AND `" . $field['1'] . "` = '" . $key['1'] . "'";
        }
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
     * RS 02/14/20106
     */

    public function DeleteItems(array $tables, array $fields, array $keys) {
        for ($i = 0; $i < count($tables); $i++) {
            $sql = "DELETE FROM `" . $tables[$i] . "` WHERE `" . $fields[$i] . "` = '" . $keys['0'] . "'";

            $result = $this->_mysqli->query($sql);

            if ($result) {

                array_push($this->_messages, "league was deleted from-->" . $tables[$i]);
                //$this->_flag = 21;
            }
        }
    }

    public function GetALL(array $tables, array $fields, array $values, $option = "0") {
        $results_array = array();
        if ($option != "0") {
            switch ($option) {
                case "1":
                    $sql = "SELECT * FROM `" . $tables['0'] . "`";

                    $result = $this->_mysqli->query($sql);

                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $results_array[] = $row;
                    }

                    break;
            }
            return $results_array;
        }
    }

    public function AddMoreFields(array $fields, array $number_of_fields, $option = NULL) {

        if ($option != NULL) {
            switch ($option) {

                case "invite":


                    if (is_numeric($number_of_fields['num_fields']) && $number_of_fields['num_fields'] != NULL) {
                        $form_fields = array();
                        for ($i = 0; $i < $number_of_fields['num_fields']; $i++) {
                            $num_for_place_holder = $i + 1;
                            $value1 = (isset($_POST[$fields['2'] . $i]) ? $_POST[$fields['2'] . $i] : "");
                            $value2 = (isset($_POST[$fields['3'] . $i]) ? $_POST[$fields['3'] . $i] : "");

                            $form_fields['name'] = "<div class='form-group'><input type='" . $fields['0'] . "' value='" . $value1 . "' name='" . $fields['8'] . "{$i}' class='form-control' placeholder='Team member #{$num_for_place_holder} name ' id='" . $fields['8'] . "{$i}' /></div>";
                            $form_fields['email'] = "<div class='form-group'><input type='" . $fields['1'] . "' value='" . $value2 . "' name='" . $fields['7'] . "{$i}' class='form-control' placeholder='Team member #{$num_for_place_holder} email ' id='" . $fields['7'] . "{$i}'/></div>";

                            $this->_fields[] = $form_fields;
                        }
                        $more_fields = array();
                        $more_fields['com_fields'] = '<input type="hidden" name="do_add_fields" value="Add"/>';
                        $more_fields['num_people_fields'] = '<input type="hidden" name="num_people" value="' . $number_of_fields['num_fields'] . '" id="'.$fields['9'].'"/>';
                        //$more_fields['submit_fields'] = "<div class='form-group'><input type='" . $fields['4'] . "'  value='" . $fields['5'] . "'  class='btn btn-info' name='" . $fields['6'] . "' id='".$fields['6']."'/></div>";

                        $this->_more_inputs[] = array(
                                    "ne" => $this->_fields,
                                    "additional" => $more_fields
                        );
                    } else {
                        $this->_flag = 24;
                        if ($this->_flag == 24) {
                            unset($this->_messages);
                            array_push($this->_messages, "Please Enter number of people you would like to have under this league.");
                        }
                    }
                    break;
            }
        }
    }

    public function DoShowFields() {
        return $this->_more_inputs;
    }

    /*
     * Email
     * Mail params
     * @to
     * @subject
     * @message
     * @additional Headers
     * @additional param
     */

    public function SendEmail(array $data, $options = NULL) {
        $num_emails = $data['num_emails'];
        $to = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];
        $headers = $data['from'];

        if ($options != NULL) {
            switch ($options) {

                case "invite":

                    mail($to, $subject, $message, $headers);

                    break;
            }
        }
    }

    public function UpdateValues(array $tables, array $fields, array $values, $option = NULL) {
        if ($option != NULL) {
            switch ($option) {
                case "1":
                    $sql = "UPDATE `" . $tables['0'] . "` SET `" . $fields['0'] . "`='" . $values['0'] . "' WHERE `" . $fields['1'] . "`='" . $values['1'] . "'";
                    $result = $this->_mysqli->query($sql);
                    if ($result) {
                        return false;
                    } else {
                        return true;
                    }
                    break;
            }
        }
    }

}
