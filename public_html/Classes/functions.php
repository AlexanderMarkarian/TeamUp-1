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
    public $_results;
    public $_data = array();
    public $_data_row = array();
    public $_pooldata = array();
    public $_count;
    public $_date;
    public $_id;
    public $_flag = 0;
    public $_fields = array();
    public $_more_inputs = array();
    public $_num_rows;
    public $_all_data = array();

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

        $sql = "INSERT INTO `$table` (" . $fields['first_name'] . "," . $fields['last_name'] . "," . $fields['email'] . "," . $fields['password'] . "," . $fields['ssid'] .",status". ") "
                . "VALUES ('" . $values['fname'] . "',"
                . "'" . $values['lname'] . "',"
                . "'" . $values['email'] . "',"
                . "'" . md5($values['password']) . "',"
                . "'" . $values['ssid'] . "',1"
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
            $userid = '';
            while($row = $result->fetch_assoc()){
                $userid = $row['user_id'];
            }
            $update = "UPDATE users SET status=1 WHERE user_id='$userid'";
            $this->_mysqli->query($update);
            $_SESSION['userid'] = $userid;
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

    public function getDataLongQuery($table, $field1, $field2, $value1, $value2) {
        $sql = "SELECT * FROM `$table` WHERE $field1 = '$value1' AND $field2 = $value2";
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

    public function CheckIfExists(array $tables, array $fields, array $values, $options = "0", $option2 = "0") {

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
                    $sql = "SELECT * FROM `" . $tables['0'] . "` WHERE `" . $fields['0'] . "` = '" . $values['0'] . "'";
                    if ($option2 == "1") {
                        $sql .=" AND `" . $fields['1'] . "` = '" . $values['1'] . "'";
                    }
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
     * TBD
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
                        $this->_all_data[] = $row;
                    }

                    break;
            }
        }
    }

    public function RetGETALL() {
        return $this->_all_data;
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
                        $more_fields['num_people_fields'] = '<input type="hidden" name="num_people" value="' . $number_of_fields['num_fields'] . '" id="' . $fields['9'] . '"/>';
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

    /*
     * @author: Rostom
     * Desc: gets the number of rows for specific search value
     * @param: $table[], $value[], $fields[], $options
     * can be expanded using $option values
     */

    public function GetNumberOfRows(array $table, array $fields, array $value, $option = "0") {

        if ($option != "0") {

            switch ($option) {
                case "1":
                    $sql = "SELECT * FROM `" . $table['0'] . "` WHERE `" . $fields['0'] . "` = '" . $value["0"] . "'";
                    $result = $this->_mysqli->query($sql);
                    $num_rows = $result->num_rows;
                    $this->_num_rows = $num_rows;
                    break;
            }
        }
    }

    /*
     * @author: Rostom
     * Desc: Returns the number of rows
     */

    public function SetNumberOfRows() {
        return $this->_num_rows;
    }

    /*
     * Delete All (temporary)
     */

    public function DeleteALL(array $table, $option = "0") {
        if ($option != "0") {
            switch ($option) {
                case "1":
                    $sql = "DELETE FROM `" . $table['0'] . "`";
                    $result = $this->_mysqli->query($sql);
                    if ($result) {
                        return true;
                    } else {
                        return false;
                    }
                    break;
            }
        }
    }

    public function InsertAPIData(array $values, $options) {

        foreach ($values['tables'] as $table) {

            $sql = "INSERT INTO `" . $table . "` ";
            $sql .= "("
                    . implode(",", $values['fields'])
                    . ") ";
            $sql .= "VALUES ";
            foreach ($values['values'] as $data) {
                $sql .="(" . implode(",", $data) . ")";
            }
            $result = $this->_mysqli->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
        
    /*
     * AUTHOR: ALEX
     * GET NAME OF THE LEAGUE
     */
    
    public function GetLeagueName(){
        $league_id = $_GET['leagueid'];
        $league_name_query = "SELECT league_name FROM leagues WHERE id='$league_id'";
        $result = $this->_mysqli->query($league_name_query);
        $name = '';
        while($row = $result->fetch_row()){
            $name = $row[0];
        }
        return $name;
    }



    /*
     * AUTHOR: ALEX
     * GET NUMBER OF TEAMUP USERS FOR LANDING
     */
    
    public function GetNumUsers(){
        $query = "SELECT * FROM users";
        $result = $this->_mysqli->query($query);
        return $result->num_rows;
    }
    
    public function GetNumLeagues(){
        $query = "SELECT * FROM leagues";
        $result = $this->_mysqli->query($query);
        return $result->num_rows;       
    }
    
    public function GetNumTeams(){
        $query = "SELECT * FROM league_user";
        $result = $this->_mysqli->query($query);
        return $result->num_rows;          
    }
    
    public function ChangeLeagueName($leagueid, $newName){
        $update = "UPDATE leagues SET league_name='$newName' WHERE id='$leagueid'";
        $this->_mysqli->query($update);
    }
    
    public function GetNumPoints(){
        $query = "SELECT total_points FROM points";
        $count = '';
        $result = $this->_mysqli->query($query);
        while($row = $result->fetch_assoc()){
            $count += $row['total_points'];
        }
        return $count;        
    }
    
    
    /*
     * AUTHOR: ALEX
     * GET STANDINGS OF LEAGUE
     */
    
    public function GetStandings(){

        $league_id = $_GET['leagueid'];
        
        $select = "SELECT * FROM points WHERE league_id ='$league_id' ORDER BY total_points DESC";
        $result = $this->_mysqli->query($select);
        $return = [];
        while($row = $result->fetch_assoc()){
            $total_points = $row['total_points'];
            $nba_points = $row['nba_points'];
            $nfl_points = $row['nfl_points'];
            $mlb_points = $row['mlb_points'];
            $nhl_points = $row['nhl_points'];
            $id = $row['leagues_user_id'];
            $name = "SELECT team_name FROM league_user WHERE id='$id'";
            $res = $this->_mysqli->query($name);
            $team_name = '';
            while($r = $res->fetch_assoc()){
                $team_name = $r['team_name'];
            }
            $return[] = [$team_name, $total_points, $nba_points, $nfl_points, $mlb_points, $nhl_points];
        }
        return json_encode($return);
    }

    public function SetPoints(){
       $league_id = $_GET['leagueid'];
       $select = "SELECT id FROM league_user WHERE league_id='$league_id'";
       $result = $this->_mysqli->query($select);
       while($row = $result->fetch_assoc()){
           $current = $row['id'];
           $check = "SELECT * FROM points WHERE leagues_user_id='$current'";
           $res = $this->_mysqli->query($check);
           if($res->num_rows == 1){
               
           }
           else{
               $insert = "INSERT INTO points (leagues_user_id, league_id) VALUES ('$current', '$league_id')";
               $this->_mysqli->query($insert);
           }
       }
    }
    
    
    /*
     * AUTHOR: ALEX
     * GET YOUR TEAM NAME
     */
    public function GetTeamName(){
        $league_id = $_GET['leagueid'];
        $ssid = $_GET['ssid'];
        $getuserid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $res = $this->_mysqli->query($getuserid);
        $userid = '';
        while($row = $res->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $getTeamName = "SELECT team_name FROM league_user WHERE league_id='$league_id' AND userid='$userid'";
        $result = $this->_mysqli->query($getTeamName);
        $teamName = '';
        while($row = $result->fetch_assoc()){
            $teamName = $row['team_name'];
        }
        return $teamName;
    }
    
    
    /*
     * AUTHOR: ALEX
     * GET USER ROSTER
     */
    
    public function GetRoster(){
        $league_id = $_GET['leagueid'];
        $ssid = $_GET['ssid'];
        $getuserid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $res = $this->_mysqli->query($getuserid);
        $userid = '';
        while($row = $res->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $get_league_user_id = "SELECT id FROM league_user WHERE league_id='$league_id' AND userid='$userid'";
        $result = $this->_mysqli->query($get_league_user_id);
        $league_user_id = '';
        while($row = $result->fetch_assoc()){
            $league_user_id = $row['id'];
        }
        
        $getRoster = "SELECT team_id FROM roster WHERE leagues_user_id='$league_user_id'";
        $roster = $this->_mysqli->query($getRoster);
        $teams = [];
        while($row = $roster->fetch_assoc()){
            $teams[] = $row['team_id'];
        }
        return json_encode($teams);
         
    }

    
    
    /*
     * AUTHOR: ALEX
     * GET ALL SPORTS DATA FORM DB
     */
    
    public function GetData(){
        $query = "SELECT * FROM pool";
        $result = $this->_mysqli->query($query);
        $array = [];
        while($row = $result->fetch_row()){
            $array[] = $row;
        }
        return json_encode($array);
    }


    /*
     * AUTHOR: ALEX
     * CHECK IF LEAGUE ID EXISTS
     */
    public function CheckLeagueId($leagueid){
        $select = "SELECT * FROM leagues WHERE id='$leagueid'";
        $result = $this->_mysqli->query($select);
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function CheckTeamName($leagueId, $teamName){
        $select = "SELECT * FROM league_user WHERE league_id='$leagueId' AND team_name='$teamName'";
        $res = $this->_mysqli->query($select);
        if($res->num_rows > 0){
            return false;
        }
        else{
            return true;
        }
    }

    public function CheckUserLeague($leagueId, $ssid){
        $getuserid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $res = $this->_mysqli->query($getuserid);
        $userid = '';
        while($row = $res->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $select = "SELECT * FROM league_user WHERE league_id='$leagueId' AND userid='$userid'";
        $result = $this->_mysqli->query($select);
        if($result->num_rows > 0){
            return false;
        }
        else{
            return true;
        }
    }

    /*
     * AUTHOR: ALEX
     * INSERT USER BY JOIN
     */
    public function InsertJoin($leagueid, $teamName, $ssid){
        $getuserid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $res = $this->_mysqli->query($getuserid);
        $userid = '';
        while($row = $res->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $insert = "INSERT INTO league_user (team_name, userid, league_id, commisioner) VALUES ('$teamName', '$userid', '$leagueid', '0')";
        $result = $this->_mysqli->query($insert); 
        if($result)
            return true;
        return false;
    }
    
    public function InsertPoints($leagueid, $ssid){
        $select = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $result = $this->_mysqli->query($select);
        $user_id = '';
        while($row = $result->fetch_assoc()){
            $user_id = $row['user_id'];
        }
        $query = "SELECT id FROM league_user WHERE userid='$user_id' AND league_id='$leagueid'";
        $res = $this->_mysqli->query($query);
        $ulid = '';
        while($row = $res->fetch_assoc()){
            $ulid = $row['id'];
        }
        $insert = "INSERT INTO points (leagues_user_id, league_id) VALUES ('$ulid', '$leagueid')";
        $this->_mysqli->query($insert);
    }
    
    public function CreateDraftCount($leagueid){
        $select = "SELECT * FROM league_user WHERE league_id='$leagueid'";
        $result = $this->_mysqli->query($select);
        $count = $result->num_rows;
        $insert = "INSERT INTO draft_count (league_id, team_count, pick, doublepick, reverse, total_picks) VALUES ('$leagueid','$count',1,0,0,0)";
        $this->_mysqli->query($insert);
    }
    
    public function CreateDraftOrder($leagueid){
        $select = "SELECT id FROM league_user WHERE league_id='$leagueid'";
        $result = $this->_mysqli->query($select);
        $turn = 1;
        while($row = $result->fetch_assoc()){
            $currentId = $row['id'];
            $create = "INSERT INTO draft_order (league_user_id, turn, league_id, refresh) VALUES ('$currentId', '$turn', '$leagueid', 0)";
            $this->_mysqli->query($create);
            $turn++;
        }
    }
    
    
    public function DraftOrder(){
        $league_id = $_GET['leagueid'];
        $search = "SELECT * FROM draft_order WHERE league_id='$league_id' ORDER BY turn ASC";
        $result = $this->_mysqli->query($search);
        $teamName = [];
        while($row = $result->fetch_assoc()){
            $currentId = $row['league_user_id'];
            $select = "SELECT team_name FROM league_user WHERE id='$currentId'";
            $res = $this->_mysqli->query($select);
            while($r = $res->fetch_assoc()){
                $teamName[] = $r["team_name"];
            }
        }
        return json_encode($teamName);
    }
    
    public function DraftReverseOrder(){
        $league_id = $_GET['leagueid'];
        $search = "SELECT * FROM draft_order WHERE league_id='$league_id' ORDER BY turn DESC";
        $result = $this->_mysqli->query($search);
        $teamName = [];
        while($row = $result->fetch_assoc()){
            $currentId = $row['league_user_id'];
            $select = "SELECT team_name FROM league_user WHERE id='$currentId'";
            $res = $this->_mysqli->query($select);
            while($r = $res->fetch_assoc()){
                $teamName[] = $r["team_name"];
            }
        }
        return json_encode($teamName);       
    }
    
    
    public function OnTheClock(){
        $league_id = $_GET['leagueid'];
        $select = "SELECT pick FROM draft_count WHERE league_id='$league_id'";
        $res = $this->_mysqli->query($select);
        $pick = '';
        while($row = $res->fetch_assoc()){
            $pick = $row['pick'];
        }
        $query = "SELECT league_user_id FROM draft_order WHERE league_id='$league_id' AND turn='$pick'";
        $result = $this->_mysqli->query($query);
        $userleagueid = '';
        while($row = $result->fetch_assoc()){
            $userleagueid = $row['league_user_id'];
        }
        $s = "SELECT team_name FROM league_user WHERE id='$userleagueid'";
        $name = $this->_mysqli->query($s);
        $clockName = '';
        while($row=$name->fetch_assoc()){
            $clockName = $row['team_name'];
        }
        return $clockName;
    }
    
    public function CheckUserRefresh($leagueid, $ssid){
        $user = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $result = $this->_mysqli->query($user);
        $userid = '';
        while($row = $result->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $select ="SELECT id FROM league_user WHERE userid='$userid' AND league_id='$leagueid'";
        $res = $this->_mysqli->query($select);
        $league_user_id = '';
        while($row = $res->fetch_assoc()){
            $league_user_id = $row['id'];
        }
        $check = "SELECT refresh FROM draft_order WHERE league_user_id='$league_user_id'";
        $refresh = $this->_mysqli->query($check);
        while($row = $refresh->fetch_assoc()){
            return $row['refresh'];
        }
    }
    
    
    public function CheckUserTurn($leagueid, $ssid){
        $getUID = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $user_result = $this->_mysqli->query($getUID);
        $user_id = '';
        while($row = $user_result->fetch_assoc()){
            $user_id = $row['user_id'];
        }
        $getULID = "SELECT id FROM league_user WHERE league_id='$leagueid' AND userid='$user_id'";
        $result = $this->_mysqli->query($getULID);
        $league_user_id = '';
        while($row = $result->fetch_assoc()){
            $league_user_id = $row['id'];
        }
        
        $getPick = "SELECT pick FROM draft_count WHERE league_id='$leagueid'";
        $res = $this->_mysqli->query($getPick);
        $pick = '';
        while($row = $res->fetch_assoc()){
            $pick = $row['pick'];
        }
        
        $getTurn = "SELECT turn FROM draft_order WHERE league_user_id='$league_user_id'";
        $r = $this->_mysqli->query($getTurn);
        $turn = '';
        $refresh = '';
        while($row = $r->fetch_assoc()){
            $turn = $row['turn']; 
            $refresh = $row['refresh'];
        }
        
        if($pick == $turn && $refresh != 1){
            return true;
        }
        else{
            return false;
        }
    }

    public function GetLeagueInfo($leagueid, $ssid){
        $select = "SELECT * FROM league_user WHERE league_id='$leagueid'";
        $result = $this->_mysqli->query($select);
        $return = [];
        while($row = $result->fetch_assoc()){
            $team_name = $row['team_name'];
            $current = $row['userid'];
            $getEmail = "SELECT * FROM users WHERE user_id='$current'";
            $r = $this->_mysqli->query($getEmail);
            while($ro = $r->fetch_assoc()){
                $return[] = [$team_name, $ro['email'], $ro['ssid'], $row['id']];
            }
        }   
        return $return;
    }
    
  public function SendTradeRequest($leagueid, $ssid, $oppteamid, $addID, $dropID){
        $getulid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $result = $this->_mysqli->query($getulid);
        $userid = '';
        while($row = $result->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $query = "SELECT id FROM league_user WHERE userid='$userid' AND league_id='$leagueid'";
        $res = $this->_mysqli->query($query);
        $ulid = '';
        while($row = $res->fetch_assoc()){
            $ulid = $row['id'];
        }
        $insert = "INSERT INTO trades (sending_user_id, receiving_user_id, sending_team_id, receiving_team_id, status) VALUES('$ulid', '$oppteamid', '$dropID', '$addID', 0)";
        if($this->_mysqli->query($insert)){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function GetTradeOffers(){
        $leagueid = $_GET['leagueid'];
        $ssid = $_GET['ssid'];
       
        $getulid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $result = $this->_mysqli->query($getulid);
        $userid = '';
        while($row = $result->fetch_assoc()){
            $userid = $row['user_id'];
        }
        
        $query = "SELECT id FROM league_user WHERE userid='$userid' AND league_id='$leagueid'";
        $res = $this->_mysqli->query($query);
        $ulid = '';
        while($row = $res->fetch_assoc()){
            $ulid = $row['id'];
        }
        $select = "SELECT * FROM trades WHERE sending_user_id='$ulid' AND status=0";
        $return = $this->_mysqli->query($select);
        $array = [];
        while($row = $return->fetch_assoc()){
            $currentID = $row['receiving_user_id'];
            $get = "SELECT team_name FROM league_user WHERE id='$currentID'";
            $r = $this->_mysqli->query($get);
            $team_name = '';
            while($ro = $r->fetch_assoc()){
                $team_name = $ro['team_name'];
            }
            $array[] = [$team_name, $row['sending_team_id'], $row['receiving_team_id'],$row['id']];
        }
        return json_encode($array);
    }
    
    public function IncomingTrades(){
        $leagueid = $_GET['leagueid'];
        $ssid = $_GET['ssid'];
       
        $getulid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $result = $this->_mysqli->query($getulid);
        $userid = '';
        while($row = $result->fetch_assoc()){
            $userid = $row['user_id'];
        }
        
        $query = "SELECT id FROM league_user WHERE userid='$userid' AND league_id='$leagueid'";
        $res = $this->_mysqli->query($query);
        $ulid = '';
        while($row = $res->fetch_assoc()){
            $ulid = $row['id'];
        }
        $select = "SELECT * FROM trades WHERE receiving_user_id='$ulid' AND status=0";
        $return = $this->_mysqli->query($select);
        $array = [];
        while($row = $return->fetch_assoc()){
            $currentID = $row['sending_user_id'];
            $get = "SELECT team_name FROM league_user WHERE id='$currentID'";
            $r = $this->_mysqli->query($get);
            $team_name = '';
            while($ro = $r->fetch_assoc()){
                $team_name = $ro['team_name'];
            }
            $array[] = [$team_name, $row['receiving_team_id'], $row['sending_team_id'],$row['id']];
        }
        return json_encode($array);
    }
    
    public function ApproveTrade($tradeid){
        $select = "SELECT * FROM trades WHERE id='$tradeid'";
        $result = $this->_mysqli->query($select);
        $user1 = '';
        $user2 = '';
        $userteam1 = '';
        $userteam2 = '';
        while($row = $result->fetch_assoc()){
            $user1 = $row['sending_user_id'];
            $user2 = $row['receiving_user_id'];
            $userteam1 = $row['sending_team_id'];
            $userteam2 = $row['receiving_team_id'];
        }
        $update1 = "UPDATE roster SET team_id='$userteam2' WHERE leagues_user_id='$user1' AND team_id='$userteam1'";
        $update2 = "UPDATE roster SET team_id='$userteam1' WHERE leagues_user_id='$user2' AND team_id='$userteam2'";
        $result1 = $this->_mysqli->query($update1);
        $result2 = $this->_mysqli->query($update2);
        $updateTrade = "UPDATE trades SET status=1 WHERE id='$tradeid'";
        $result3 = $this->_mysqli->query($updateTrade);
        if($result1 && $result2 && $result3){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function CancelTrade($tradeid){
        $update = "UPDATE trades SET status=1 WHERE id='$tradeid'";
        if($this->_mysqli->query($update)){
            return true;
        }
        else{
            return false;
        }
    }
    

    public function GetUsersPerLeague($leagueID){
        $select = "SELECT * FROM league_user WHERE league_id='$leagueID'";
        $result = $this->_mysqli->query($select);
        return $result->num_rows;
    }
    
    public function GetUserLeagues(){
        $ssid = $_GET['ssid'];
        $select = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $result = $this->_mysqli->query($select);
        $userid = '';
        while($row = $result->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $query = "SELECT * FROM league_user WHERE userid='$userid'";
        $res = $this->_mysqli->query($query);
        $return = [];
        while($row = $res->fetch_assoc()){
            $leagueID = $row['league_id'];
            $commish = $row['commisioner'];
            $q = "SELECT league_name FROM leagues WHERE id='$leagueID'";
            $r = $this->_mysqli->query($q);
            while($ro = $r->fetch_assoc()){
                $return[] = [$leagueID, $commish, $ro['league_name']];
            }
        }
        return json_encode($return);
    }

    public function AddTeam($teamID, $leagueID, $ssid){
        $getuserid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $res = $this->_mysqli->query($getuserid);
        $userid = '';
        while($row = $res->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $select = "SELECT id FROM league_user WHERE league_id='$leagueID' AND userid='$userid'";
        $result = $this->_mysqli->query($select);
        $league_user_id = '';
        while($row = $result->fetch_assoc()){
            $league_user_id = $row['id'];
        }
        $insert = "INSERT INTO roster (leagues_user_id, team_id) VALUES ('$league_user_id','$teamID')";
        $final = $this->_mysqli->query($insert);
    }
    
    public function UpdateRefresh($leagueID){
        $update = "UPDATE draft_order SET refresh=1 WHERE league_id='$leagueID'";
        $this->_mysqli->query($update);
    }
    
    public function GetLeagueUserID($leagueID, $ssid){
        $select = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $result = $this->_mysqli->query($select);
        $userid = '';
        while($row = $result->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $query = "SELECT id FROM league_user WHERE userid='$userid' AND league_id='$leagueID'";
        $res = $this->_mysqli->query($query);
        $id = '';
        while($row=$res->fetch_assoc()){
            $id = $row['id'];
        }
        return $id;
    }
    
    public function CloseRefresh($id){
        $update = "UPDATE draft_order SET refresh=0 WHERE league_user_id='$id'";
        $this->_mysqli->query($update);
    }
    
    public function UpdateTotalPicks($leagueID){
        $select = "SELECT * FROM draft_count WHERE league_id='$leagueID'";
        $result = $this->_mysqli->query($select);
        $total_picks = '';
        $team_count = '';
        while($row = $result->fetch_assoc()){
            $total_picks = $row['total_picks'];
            $team_count = $row['team_count'];
        }
        if($total_picks == 6*$team_count-1){
            // draft over
            $update = "UPDATE leagues SET draft_status=2 WHERE id='$leagueID'";
            $this->_mysqli->query($update);
            return true; 
        }
        else{
            $query = "UPDATE draft_count SET total_picks=total_picks+1 WHERE league_id='$leagueID'";
            $this->_mysqli->query($query);
            return false;
        }

    }
    
    public function CheckLeagueDrafted($leagueID){
        $select = "SELECT draft_status FROM leagues WHERE id='$leagueID'";
        $result = $this->_mysqli->query($select);
        while($row = $result->fetch_assoc()){
            if($row['draft_status'] == 0){
                return true;
            }
            else{
                return false;
            }
        }
    }
    
    public function UpdatePick($leagueID){    
        $getPick = "SELECT * FROM draft_count WHERE league_id ='$leagueID'";
        $result = $this->_mysqli->query($getPick);
        $pick = '';
        $teamcount = '';
        $doublepick = '';
        $reverse = '';
        $totalpick = '';
        while($row = $result->fetch_assoc()){
            $pick = $row['pick'];
            $teamcount = $row['team_count'];
            $doublepick = $row['doublepick'];
            $reverse = $row['reverse'];
            $totalpick = $row['total_picks'];
        }
        
        // pick = 2
        // reverse = 0
        // team count = 3
        // doublepick = 0
        
        if(($pick == $teamcount || $pick ==1) && $doublepick == 1){
            // update doublepick to 0
            
            $updateDoublePick = "UPDATE draft_count SET doublepick=0 WHERE league_id='$leagueID'";
            $this->_mysqli->query($updateDoublePick);
            if($pick == $teamcount){
                $updatePickMinus = "UPDATE draft_count SET pick=pick-1 WHERE league_id='$leagueID'";
                $this->_mysqli->query($updatePickMinus);
                echo "pp";
            }
            else{
                $updatePickPlus = "UPDATE draft_count SET pick=pick+1 WHERE league_id='$leagueID'";
                $this->_mysqli->query($updatePickPlus); 
                echo "oo";
            }
        }
        else{
            if($pick == $teamcount){
                $updateDoublePickReverse = "UPDATE draft_count SET doublepick=1, reverse=1 WHERE league_id='$leagueID'";
                $this->_mysqli->query($updateDoublePickReverse);
                echo "here";
            }
            else if($pick == 1){
                if($totalpick == 1){
                    $updatePickPlus = "UPDATE draft_count SET pick=pick+1 WHERE league_id='$leagueID'";
                    $this->_mysqli->query($updatePickPlus); 
                    echo "asf";
                }
                else{
                    $updateDoublePickReverse = "UPDATE draft_count SET doublepick=1, reverse=0 WHERE league_id='$leagueID'";
                    $this->_mysqli->query($updateDoublePickReverse);   
                    echo "dd";
                }
            }
            else{
                if($reverse == 0){
                    $updatePickPlus = "UPDATE draft_count SET pick=pick+1 WHERE league_id='$leagueID'";
                    $this->_mysqli->query($updatePickPlus); 
                    echo 'adsfadsf';
                }
                else{
                    $updatePickMinus = "UPDATE draft_count SET pick=pick-1 WHERE league_id='$leagueID'";
                    $this->_mysqli->query($updatePickMinus); 
                    echo "npe";
                }
            }
        }
    }
    
    public function GetTotalPicks(){
        $leagueid = $_GET['leagueid'];
        $select = "SELECT total_picks FROM draft_count WHERE league_id='$leagueid'";
        $result = $this->_mysqli->query($select);
        $total_pick = '';
        while($row = $result->fetch_assoc()){
            $total_pick = $row['total_picks'];
        }
        return $total_pick;
    }
        
    public function TeamsTaken(){
        $leagueID = $_GET['leagueid'];
        $select = "SELECT id FROM league_user WHERE league_id='$leagueID'";
        $result = $this->_mysqli->query($select);
        $teamID = [];
        while($row = $result->fetch_assoc()){
            $currentId = $row['id'];
            $getRoster = "SELECT team_id FROM roster WHERE leagues_user_id='$currentId'";
            $res = $this->_mysqli->query($getRoster);
            while($r = $res->fetch_assoc()){
                $teamID[] = $r['team_id'];
            }
        }
        return json_encode($teamID);
    }
    
    
    public function DropTeam($teamID, $leagueID, $ssid){
               $getuserid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $res = $this->_mysqli->query($getuserid);
        $userid = '';
        while($row = $res->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $select = "SELECT id FROM league_user WHERE league_id='$leagueID' AND userid='$userid'";
        $result = $this->_mysqli->query($select);
        $league_user_id = '';
        while($row = $result->fetch_assoc()){
            $league_user_id = $row['id'];
        }
        
        $delete = "DELETE FROM roster WHERE leagues_user_id='$league_user_id' AND team_id='$teamID'";
        $final = $this->_mysqli->query($delete); 
       
    }
    
    public function LogOutStatus($ssid){
        $update = "UPDATE users SET status=0 WHERE ssid='$ssid'";
        $this->_mysqli->query($update);
    }
    
    public function GetCommisioner(){
        $league_id = $_GET['leagueid'];
        $select = "SELECT userid FROM league_user WHERE league_id='$league_id' AND commisioner=1";
        $result = $this->_mysqli->query($select);
        $userid = '';
        while($row = $result->fetch_assoc()){
            $userid = $row['userid'];
        }
        $query = "SELECT ssid FROM users WHERE user_id='$userid'";
        $res = $this->_mysqli->query($query);
        $ssid = '';
        while($row = $res->fetch_assoc()){
            $ssid = $row['ssid'];
        }
        return $ssid;
    }
    
    public function GetRosterStatus(){
        $leagueid = $_GET['leagueid'];
        $select = "SELECT * FROM league_user WHERE league_id='$leagueid'";
        $result = $this->_mysqli->query($select);
        $return = [];
        while($row = $result->fetch_assoc()){
            $currentID = $row['userid'];
            $teamName = $row['team_name'];
            $query = "SELECT status FROM users WHERE user_id='$currentID'";
            $res = $this->_mysqli->query($query);
            while($r = $res->fetch_assoc()){
                $return[] = [$teamName, $r['status']];
            }
        }
        return json_encode($return);
    }
    

    public function GetDraftStatus(){
        $leagueid = $_GET['leagueid'];
        $select = "SELECT draft_status FROM leagues WHERE id='$leagueid'";
        $result = $this->_mysqli->query($select);
        $status = '';
        while($row = $result->fetch_assoc()){
            $status = $row['draft_status'];
        }
        return $status;
    }
    
    public function CheckDraftStatus($leagueid){
        $select = "SELECT draft_status FROM leagues WHERE id='$leagueid'";
        $result = $this->_mysqli->query($select);
        $status = '';
        while($row = $result->fetch_assoc()){
            $status = $row['draft_status'];
        }
        return $status;
    }
    
    public function UpdateDraftStatus($leagueid){
        $update = "UPDATE leagues SET draft_status=1 WHERE id='$leagueid'";
        $this->_mysqli->query($update);
    }
    
    
    /*
     * AUTHOR: ALEX
     * GET TEAMS IN A LEAGUE FOR TRADE
     * 
     */
    
    public function GetTeamsID(){
        $ssid = $_GET['ssid'];
        $leagueID = $_GET['leagueid'];
        $getuserid = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $res = $this->_mysqli->query($getuserid);
        $userid = '';
        while($row = $res->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $query = "SELECT * FROM league_user WHERE league_id='$leagueID' AND userid != '$userid'";
        $res = $this->_mysqli->query($query);
        $teams = [];
        while($row = $res->fetch_assoc()){
            $teams[] = [$row['id'], $row['team_name']];
        }
        return json_encode($teams);
    }
    
    public function TakenTeams(){
        $leagueID = $_GET['leagueid'];
        $query = "SELECT id FROM league_user WHERE league_id='$leagueID'";
        $res = $this->_mysqli->query($query);
        $return = [];
        while($row = $res->fetch_assoc()){
            $currentID = $row['id'];   
            $select = "SELECT team_id FROM roster WHERE leagues_user_id='$currentID'";
            $re = $this->_mysqli->query($select);
            while($r = $re->fetch_assoc()){
                $return[] = $r['team_id'];
            }
        }
        return json_encode($return);       
    }
    
    public function GetTeamMembers(){
        $ssid = $_GET['ssid'];
        $leagueID = $_GET['leagueid'];
        $getuser = "SELECT user_id FROM users WHERE ssid='$ssid'";
        $result = $this->_mysqli->query($getuser);
        $userid = '';
        while($row = $result->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $query = "SELECT * FROM league_user WHERE league_id='$leagueID' AND userid != '$userid'";
        $res = $this->_mysqli->query($query);
        $return = [];
        while($row = $res->fetch_assoc()){
            $currentID = $row['id'];   
            $select = "SELECT team_id FROM roster WHERE leagues_user_id='$currentID'";
            $re = $this->_mysqli->query($select);
            while($r = $re->fetch_assoc()){
                $return[] = [$row['id'], $row['team_name'], $r['team_id']];
            }
        }
        return json_encode($return);
    }
}
