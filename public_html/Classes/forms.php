<?php

/**
 * Description of forms [see post class declaration]
 *
 * @author rostom
 */
class forms {
    /*
     * RS 20160131
     * !!@@@STRICT RULE@@@!!!
     * Create all forms here
     * MVC
     * DO NOT Change $_db, $_mysqli
     */

    private $_db;
    private $_mysqli;
    private $_results;
    private $_formInputs = array();
    private $_flag = 0;
    public $_message = array();
    public $_login_message = array();
    public $_league_message = array();
    public $_invite_message = array();
    public $_fucntions;
    public $_hidden_key;
    public $_pass_value = array();

    public function __construct() {
        $this->_db = db_connect::getInstance();
        $this->_mysqli = $this->_db->getConnection();
        $this->_fucntions = new functions();
    }

    /*
     * RS 20160131
     * Sign up form
     * auth @ Alex
     * Moved to this location
     * Can be used universaly
     * names must be in array convension form[form_name][field_name] 
     * to echo out values:
     * Example: 
     * value="<?php foreach($_POST as $k => $val){ echo $val[form_name][field_name];}?>"
     */

    public function SignUpForm() {
        ?>
        <form class="signup" role="form" method="post">
            <h3>Sign Up</h3>
            <?php
            foreach ($this->_message as $errors) {
                echo "<div class='alert alert-danger' role='alert'>" . $errors . "</div>";
            }
            ?>
            <h4>Please Enter Your Details</h4>
            <input type="text" placeholder="First Name" name="form[signup][firstname]" id="firstname" onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'First Name';
                    }" value="<?php
                   echo $_POST['form']['signup']['firstname'];
                   ?>">
            <input type="text" name="form[signup][lastname]" id="lastname" placeholder="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Second Name';
                    }" value="<?php
                   echo $_POST['form']['signup']['lastname'];
                   ?>">
            <input type="text" class="email" placeholder="Email" name="form[signup][email]" id="email" onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Email';
                    }" value="<?php
                   echo $_POST['form']['signup']['email'];
                   ?>">
            <input type="password" placeholder="Password" name="form[signup][password]" id="password" onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Password';
                    }" value="<?php
                   echo $_POST['form']['signup']['password'];
                   ?>">
                   <?php
                   $lid = (isset($_GET['lid']) ? $_GET['lid'] : "");
                   ?>
            <input type="hidden" name="form[signup][cmd]" value="profile" id="cmd_signup"/> 
            <input type="hidden" name="form[signup][lid]" value="<?= $lid ?>" id="lid"/>
            <input type="submit"  name="form[signup][register]" value="Sign Up" id="signup"/>
        </form>
        <div id="s_show"></div>
        <?php
    }

    /*
     * RS 20160131
     * Login form
     * auth @ Alex
     * Moved to this location
     * Can be used universaly 
     * names must be in array convension form[form_name][field_name]
     */

    public function LoginForm() {
        ?>
        <form class="LogIn" id="login_form" role="form" method="post" action="loader.php">
            <h3>LogIn</h3>
            <?php
            foreach ($this->_login_message as $errors) {
                echo "<div class='alert alert-danger' role='alert' id='errors'>" . $errors . "</div>";
            }
            ?>
            <input type="text" id="email_login" class="email" name="form[login][email]" placeholder="Email" onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Email';
                    }" value="<?php
                   echo $_POST['form']['login']['email'];
                   ?>">
            <input type="password" id="password_login" name="form[login][password]" placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Password';
                    }"  value="<?php
                   echo $_POST['form']['login']['password'];
                   ?>">
                   <?php
                   $lid = (isset($_GET['lid']) ? $_GET['lid'] : "");
                   ?>
            <input type="hidden" name="form[login][lid]" value="<?= $lid ?>" id="lid1"/>
            <input type="hidden" name="form[login][sec_id]" value="<?= $this->ret_hidden_val(); ?>" id="sec_id"/>
            <input type="hidden" name="form[login][cmd]" value="profile" id="cmd_login"/>
            <input type="submit" id="login"  name="form[login][do_login]" value="Login"/>
        </form>
        <div id="show"></div>


        <?php
    }

    public function EditProfileForm(array $data) {


        foreach ($data['data'] as $user_info) {
            $fname = $user_info['first_name'];
            $lname = $user_info['last_name'];
            $email = $user_info['email'];
            $password = md5($user_info['password']);

            $old_fname = $_POST['form']['edit']['firstname'];
            $old_lname = $_POST['form']['edit']['lastname'];
            $old_email = $_POST['form']['edit']['email'];
            $old_password = md5($_POST['form']['edit']['password']);
            ?>
            <section id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="panel panel-default">

                                <div class="panel-heading">Edit Profile</div>
                                <div class="panel-body">
                                    <input type="hidden" name="form[edit][ssid]" value="<?= $_GET['ssid']; ?>"/>
                                    <input type="hidden" name="form[edit][cmd]" value=""/>
                                    <form method="post" name="form[edit]" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" >First Name:</label>
                                            <div class="col-sm-6">
                                                <input type="text"  class="form-control" name="form[edit][firstname]" value="<?php
                                                $user_data = (isset($_POST['form']['edit']['firstname']) ? $old_fname : $fname);
                                                echo $user_data;
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" >Last Name:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="form[edit][lastname]" value="<?php
                                                $user_data = (isset($_POST['form']['edit']['lastname']) ? $old_lname : $lname);
                                                echo $user_data;
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" >Email:</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" name="form[edit][email]" value="<?php
                                                $user_data = (isset($_POST['form']['edit']['email']) ? $old_email : $email);
                                                echo $user_data;
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">                            
                                            <label class="control-label col-sm-2" >Password:</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="form[edit][password]" value="<?php
                                                $user_data = (isset($_POST['form']['edit']['password']) ? $old_password : $password);
                                                echo $user_data;
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" >Re-Enter Password:</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" name="form[edit][password2]" value="<?php
                                                echo $_POST['form']['edit']['password2'];
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-4">

                                                <input type="submit" class="btn btn-info" name="form[edit][doedit]" value="Edit"/>

                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }

    /*
     * RS 20160131
     * This function will process the sign up form 
     * Do not alter before notifying author @ rostom
     * use $input_values array to load values from from inputs
     * convension: [form][form_name][field_name]
     */

    public function SignUpProcess(array $form_values) {

        $this->_formInputs = $form_values;
        $input_values = array();
        $helper_functions = new functions();
        if (isset($this->_formInputs['register'])) {
            $input_values['fname'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['firstname']);
            $input_values['lname'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['lastname']);
            $input_values['email'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['email']);
            $input_values['password'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['password']);
            $input_values['page_name'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['page_name']);
            $input_values['lid'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['lid']);

            /*
             * RS 20160131
             * Check and see if all the fields are filled
             */

            if (empty($input_values['fname']) && empty($input_values['lname']) && empty($input_values['email']) && empty($input_values['password'])) {
                $this->_flag = 1;

                if ($this->_flag === 1) {
                    $error = array();
                    array_push($error, "All fields are required");
                    $this->_message = $error;
                } else {
                    $this->_flag = 0;
                    unset($this->_message);
                }
            } else if (empty($input_values['fname']) || empty($input_values['lname']) || empty($input_values['email']) || empty($input_values['password'])) {
                $this->_flag = 1;

                if ($this->_flag === 1) {
                    $error = array();
                    array_push($error, "All fields are required");
                    $this->_message = $error;
                } else {
                    $this->_flag = 0;
                    unset($this->_message);
                }
            }

            /*
             * RS 20160131
             * Check the email
             */ else if (filter_var($input_values['email'], FILTER_VALIDATE_EMAIL) === false) {
                $this->_flag = 1;

                if ($this->_flag === 1) {
                    $error = array();

                    array_push($error, "Please enter a valid email");
                    $this->_message = $error;
                    echo "error#12";
                } else {
                    $this->_flag = 0;
                    unset($this->_message);
                }
                /*
                 * RS 20160131
                 * Check if the user email already exists
                 */
            } else if ($helper_functions->CheckUserInDB("users", $input_values['email']) === true) {
                $this->_flag = 1;

                if ($this->_flag === 1) {
                    $error = array();

                    array_push($error, "Email already registered.");
                    $this->_message = $error;
                    echo 'error#11';
                } else {
                    $this->_flag = 0;
                    unset($this->_message);
                }
                /*
                 * RS 20160131
                 * check if the password is five charchters long and not all numbers
                 */
            } else if (strlen($input_values['password']) < 5 || is_numeric($input_values['password'])) {
                $this->_flag = 1;

                if ($this->_flag === 1) {
                    $error = array();

                    array_push($error, "Password must be at least 5 charecters long and alpha-numeric.");
                    $this->_message = $error;
                    echo "error#13";
                } else {
                    $this->_flag = 0;
                    unset($this->_message);
                }
            } else {


                /*
                 * RS 20160201
                 * If all is flags are zero InsertNewUser and reedirect to profile page
                 */
                unset($this->_flag);
                unset($this->_message);
                /*
                 * IF Link ID is set Update status to One
                 */
                if ($input_values['lid'] != "") {
                    unset($this->_flag);
                    $table = array("0" => "temp_invite");
                    $field = array("0" => "status", "1" => "linkid");
                    $value = array("0" => "1", "1" => $input_values['lid']);
                    $option = "1";
                    $update = $this->_fucntions->UpdateValues($table, $field, $value, $option);
                    $this->_flag = 999; //USER COMING FROM INVITATION LINK
                }
                $input_values["ssid"] = $helper_functions->UIDGEN($input_values['fname'] . "_");
                $fields = array();
                $fields['user_id'] = "user_id";
                $fields['first_name'] = "first_name";
                $fields['last_name'] = "last_name";
                $fields['email'] = "email";
                $fields['password'] = "password";
                $fields['ssid'] = "ssid";
                $query = $helper_functions->InsertNewUser("users", $fields, $input_values);
                $_SESSION['isLoggedin'] = $helper_functions->UIDGEN(date("Ymd"));
                if ($query) {
                    if ($this->_flag == 999) {
                        echo "inv" . $input_values['ssid'];
                        $cmd = "invited";
                    } else {
                        echo $input_values['ssid'];


                        $cmd = "profile";
                    }

                    // header("location: loader.php?cmd=" . $cmd . "&ssid=" . $input_values['ssid'] . "&lid=" . $input_valuesp['lid']);
                }
            }
        }
    }

    public function ret_hidden_val() {
        return $this->_hidden_key;
    }

    /*
     * Login is processed here
     * RS 20160202
     */

    public function LoginProcess(array $form_values) {


        unset($this->_login_message);
        $insertion = new functions();
        $this->_formInputs = $form_values;
        $input_values = array();

        if (isset($this->_formInputs['do_login'])) {
            $input_values['email'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['email']);
            $input_values['password'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['password']);
            $input_values['lid'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['lid']);
            if (empty($input_values['email']) && empty($input_values['password'])) {
                $this->_flag = 1;
                if ($this->_flag == 1) {
                    $error = array();
                    array_push($error, "All fields are required");
                    $this->_login_message = $error;
                } else {
                    $this->_flag = 0;
                    unset($this->_login_message);
                }
            } else if (empty($input_values['email']) || empty($input_values['password'])) {
                $this->_flag = 1;
                if ($this->_flag == 1) {
                    $error = array();
                    array_push($error, "All fields are required");
                    $this->_login_message = $error;
                } else {
                    $this->_flag = 0;
                    unset($this->_login_message);
                }
            } else {
                unset($this->_flag);
                $query = $insertion->LogUserIn("users", $input_values);
                if ($query == false) {

                    $this->_flag = 1;
                    if ($this->_flag == 1) {
                        $error = array();
                        array_push($error, "There was an error loging you in!");
                        $this->_login_message = $error;
                    }
                } else {
                    /*
                     * IF Link ID is set Update status to One
                     */
                                  /*
                         * Check LID status first then decide if it should be changed
                         * 
                         */
                        $table = array("0" => "temp_invite");
                        $fields = array("0" => "linkid", "1" => "status");
                        $values = array("0" => $input_values['lid'], "1" => "0");
                        $option= "4";
                        $option2 = "1";
                        $links_status = $this->_fucntions->CheckIfExists($table, $fields, $values, $option, $option2);   
                        
                    if ($input_values['lid'] != "" && $links_status) {

                            unset($this->_flag);
                            $table = array("0" => "temp_invite");
                            $field = array("0" => "status", "1" => "linkid");
                            $value = array("0" => "1", "1" => $input_values['lid']);
                            $option = "1";
                            $update = $this->_fucntions->UpdateValues($table, $field, $value, $option);
                            $this->_flag = "999"; //USER COMING FROM INVITATION LINK

                    }
                    $input_values['ssid'] = $insertion->UIDGEN("User_");

                    $insertion->UpdateLoginSSID("users", $input_values['ssid'], "email", $input_values['email']);

                    $_SESSION['isLoggedin'] = $insertion->UIDGEN(date("Ymd"));

                    $this->_hidden_key = $_SESSION['isLoggedin'];
                    $_POST['form']['login']['sec_id'] = $this->_hidden_key;
                    array_push($_POST, $_POST['form']['login']['sec_id']);

                    if ($this->_flag == "999") {

                        echo "inv" . $input_values['ssid'];
                        $cmd = "invited";
                    } else {
                        echo $input_values['ssid'];
                        $cmd = "profile";
                    }
                    //Removed because it causes issues with ajax. since ajax has a timer to initialize it loaded this before the other header.
                    // header("location: loader.php?cmd=profile&ssid=" . $input_values['ssid'] . "&s=" . $_SESSION['isLoggedin']);
                }
            }
        }
    }

    /*
     * @author: Alex
     * Create league form is below which is used in profile.php
     * Mod as needed
     * RS 02072016
     */

    public function CreateLeague() {
        ?>
        <?php
        foreach ($this->_league_message as $errors) {
            echo "<div class='alert alert-danger' role='alert'>" . $errors . "</div>";
        }
        if ($this->_flag == 21) {
            ?>

            <div class='alert alert-success' role='alert'>
                <ul >
                    <?php
                    foreach ($this->_fucntions->RetMessages() as $ms) {
                        echo "<p class='h6'>" . $ms . "</p>";
                    }
                    ?>
                </ul>
            </div>
        <?php }
        ?>
        <div id="cleague"></div>
        <form method="post" name="c_league" action="ajax_process.php" id="c_league">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="League Name" name="league_name" id="league_name" value="<?= $_POST['league_name'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Team Name" name="team_name" id="team_name" value="<?= $_POST['team_name'] ?>">
            </div>
            <div class="form-group">
                <input type="text" id="datepicker" class="form-control datetimepicker" placeholder="Draft Date" name="d_date" value="<?= $_POST['d_date'] ?>" >
            </div>
            <div class="form-group">
                <input type="hidden" name="cmd" value="profile" id="cmd" />
                <input type="hidden" name="ssid" value="<?= $_GET['ssid'] ?>" id="ssid"/>
                <input type="submit"  name="create" class="btn btn-info" value="Submit" id="create">
            </div>
        </form>

        <?php
    }

    /*
     * @auth: Rostom
     * Desc: Creates leagues
     * @param: $form_values[]
     * RS 02/13/2016
     */

    public function CreateLeagueProcess(array $form_values) {

        $this->_formInputs = $form_values;

        $form_inputs = array();
        $form_inputs['league_name'] = mysqli_real_escape_string($this->_mysqli, str_replace(" ", "_", $this->_formInputs['league_name']));
        $form_inputs['team_name'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['team_name']);
        $form_inputs['d_date'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['d_date']);
        $form_inputs['create'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['create']);
        $form_inputs['ssid'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['ssid']);
        $form_inputs['cmd'] = mysqli_real_escape_string($this->_mysqli, $this->_formInputs['cmd']);
        //FOR Universal CHECK
        $tables = array(
            "0" => "users",
            "1" => "league_user",
            "2" => "leagues"
        );
        $fields = array(
            "0" => "ssid",
            "1" => "userid",
            "2" => "league_id",
            "3" => "id"
        );
        $required_fields = array(
            "0" => $form_inputs['ssid'],
            "1" => "user_id",
            "2" => "league_id",
            "3" => "league_name",
            "4" => trim($form_inputs['league_name'])
        );

        if (isset($form_inputs['create'])) {


            /*
             * RS 02/13/2016
             * Check all the fields
             */
            if (empty($form_inputs['league_name']) && empty($form_inputs['team_name']) && empty($form_inputs['d_date'])) {
                $this->_flag = 1;
                if ($this->_flag == 1) {
                    $errors = array();
                    array_push($errors, "All fields are required.");
                    $this->_league_message = $errors;
                } else {
                    $this->_flag = 0;
                    unset($this->_league_message);
                }
                /*
                 * RS 02/13/2016
                 * Check all the fields
                 */
            } else if (empty($form_inputs['league_name']) || empty($form_inputs['team_name']) || empty($form_inputs['d_date'])) {
                $this->_flag = 1;
                if ($this->_flag == 1) {
                    $errors = array();
                    array_push($errors, "All fields are required.");
                    $this->_league_message = $errors;
                } else {
                    $this->_flag = 0;
                    unset($this->_league_message);
                }
            } else if ($league_information = $this->_fucntions->CheckIfExists($tables, $fields, $required_fields, $options = "2", $option2 = "0")) {

                $this->_flag = 1;
                if ($this->_flag == 1) {
                    $errors = array();
                    array_push($errors, " League name taken.");
                    $this->_league_message = $errors;
                    echo "error#15";
                } else {
                    $this->_flag = 0;
                    unset($this->_league_message);
                }
            } else if ($this->_fucntions->CheckDateTime($form_inputs['d_date'])) {
                $this->_flag = 1;
                if ($this->_flag == 1) {
                    $errors = array();
                    array_push($errors, "Selected time is in the past");
                    $this->_league_message = $errors;
                    echo "error#16";
                } else {
                    $this->_flag = 0;
                    unset($this->_league_message);
                }
            } else {

                /*
                 * Insert into the following tables:
                 * 1. leagues
                 * 2. league_user
                 * 3. teams
                 * 
                 */
                /*
                 * Table 1
                 */
                $fields = array(
                    "0" => "ssid",
                );
                $values = array(
                    "0" => $form_inputs['ssid']
                );

                if ($this->_flag == 0) {
                    $user_id = $this->_fucntions->GetIDFromTables("users", $fields, $values, $option = 0);
                    $user_id = $this->_fucntions->SetIDFromTables();
                    $this->_pass_value['league_name'] = $form_inputs['league_name'];
                    $this->_pass_value['user_id'] = $user_id['user_id'];
                    $fields = array(
                        "0" => "id",
                        "1" => "league_name",
                        "2" => "created_on",
                    );

                    $tables = array(
                        "table0" => "leagues",
                    );
                    $values = array();
                    $prefix = $form_inputs['league_name'][0];
                    $uid = $this->_fucntions->UIDGEN($prefix);
                    array_push($values, "'" . $uid . "'");
                    array_push($values, "'" . $form_inputs['league_name'] . "'");
                    array_push($values, "'" . $form_inputs['d_date'] . "'");
                    $insert_values = array(
                        "values" => $values,
                        "fields" => $fields,
                        "tables" => $tables
                    );
                    $this->_fucntions->InsertAll($insert_values, $cmd = "insert league");
                    if ($this->_fucntions->ReturnFlag() == 0) {
                        /*
                         * Get league ids and user ids
                         */
                        $fields = array(
                            "0" => "league_name",
                            "1" => "userid"
                        );
                        $values = array(
                            "0" => $this->_pass_value['league_name'],
                            "1" => $this->_pass_value['user_id']
                        );

                        /*
                         * Table 2
                         */
                        //Insert into league_users
                        $fields = array(
                            "1" => "userid",
                            "2" => "league_id",
                        );

                        $tables = array(
                            "table0" => "league_user",
                        );
                        $values = array();
                        array_push($values, "'" . $user_id['user_id'] . "'");
                        array_push($values, "'" . $uid . "'");
                        $insert_values = array(
                            "values" => $values,
                            "fields" => $fields,
                            "tables" => $tables
                        );
                        $this->_fucntions->InsertAll($insert_values, $cmd = "insert in to league user");
                        /*
                         * Table 3
                         */
                        //Insert into teams
                        $fields = array(
                            "1" => "team_name",
                            "2" => "parent",
                            "3" => "created_on",
                            "4" => "status"
                        );
                        $tables = array(
                            "table0" => "teams",
                        );
                        $values = array();
                        array_push($values, "'" . $form_inputs['team_name'] . "'");
                        array_push($values, "'" . $uid . "'");
                        array_push($values, "'" . $form_inputs['d_date'] . "'");
                        array_push($values, 0);

                        $insert_values = array(
                            "values" => $values,
                            "fields" => $fields,
                            "tables" => $tables
                        );
                        $this->_fucntions->InsertAll($insert_values, $cmd = "insert in to teams");
                        echo $form_inputs['ssid'];

                        //$this->_flag = 21;
                    }
                }
            }
        }
    }

    /*
     * 
     */

    /*
     * @auth: ALex
     * Join league form goes here
     * Mod as needed
     * RS 02072016
     * NOT USED
     */

    public function JoinLeague() {
        ?>
        <form method="post" name="form[j_league]">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="League ID" name="form[j_league][league_id]" value="<?= $_POST['form']['j_league']['league_id'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Team Name" name="form[j_league][team_name]" value="<?= $_POST['form']['j_league']['team_name'] ?>">
            </div>
            <div class="form-group">
                <input type="button"  class="btn" value="Submit">
            </div>
        </form>

        <?php
    }

    /*
     * @Auth: Rostom
     * Desc: uses AddMoreFileds from functions.php 
     * adds more invitation fields as needed min=1 max=8
     * I want to ajax this process
     */

    public function MoreFieldsCall(array $data) {
        $this->_formInputs = $data;
        // var_dump($data);
        if (isset($this->_formInputs['add_fields'])) {
            $input_type = array(
                "0" => "text",
                "1" => "email",
                "2" => "name",
                "3" => "email",
                "4" => "submit",
                "5" => "Invite Team Member",
                "6" => "do_invite",
                "7" => "email",
                "8" => "name",
                "9" => "add_rows"
            );
            $num_fields = array();
            $num_fields['num_fields'] = $this->_formInputs['num_people'];
            //Check if the selected league has invited member if so how many if more than 7 give error
            $league_id = $this->_formInputs['league_id_h'];
            $table = array("0" => "temp_invite");
            $fields = array("0" => "league_id");
            $value = array("0" => $league_id);
            $option = "1";
            $max_num_allowed = 7;
            $get_number_of_invitations = $this->_fucntions->GetNumberOfRows($table, $fields, $value, $option);
            $get_number_of_invitations = $this->_fucntions->SetNumberOfRows();
            if ($get_number_of_invitations + $num_fields['num_fields'] > $max_num_allowed) {

                $num_left = abs($max_num_allowed - $get_number_of_invitations);
                if (intval($num_left) == 0) {
                    echo "error#31";
                } else {
                    echo "error#30" . $num_left;
                }
            } else if ($get_number_of_invitations > 7) {
                echo "error#29";
            } else {

                $option = "invite";
                $dditional_fields = array();
                $additional_fields = $this->_fucntions->AddMoreFields($input_type, $num_fields, $option);
                $additional_fields = $this->_fucntions->DoShowFields();


                echo "add fields";
                /*
                 * This will show the additional fields in #put_fields_here function InviteTeamMembers
                 */
                foreach ($additional_fields as $key => $new_fields) {
                    foreach ($new_fields['ne'] as $name_email) {
                        foreach ($name_email as $name_email_fields) {
                            echo $name_email_fields;
                        }
                    }
                    foreach ($new_fields['additional'] as $additionals) {
                        echo $additionals;
                    }
                }
            }
        }
    }

    public function RetMoreFieldsCall() {

        return $this->_pass_value;
    }

    /*
     * @auth: Rostom
     * Join league form goes here
     * Mod as needed
     * RS 02072016
     */

    public function InviteTeamMembers(array $data) {
        foreach ($data as $user_info) {
            
        }
        //FOR Universal CHECK
        $tables = array(
            "table0" => "league_user",
            "table1" => "leagues"
        );
        $fields = array(
            "0" => "userid",
            "1" => "id"
        );
        $required_fields = array(
            "0" => $user_info['user_id'],
            "1" => "league_id"
        );
        unset($this->_fucntions->_data);
        $leagues = $this->_fucntions->UniversalCheckValues($tables, $fields, $required_fields, "HELLO");

        $leagues = $this->_fucntions->SetDataQuery();
        ?>
        <!-------INVITE TEAM MEMBER FROM BEGINS------------->
        <div id="invite_message"></div>    
        <form method="post" name="form[invite]" id="invite">
            <div class="form-group">
                <?php
                foreach ($leagues as $league_name) {
                    
                }
                $disabled = ($league_name['id'] == NULL) ? "disabled='disabled'" : " ";
                ?>
                <select name="form[invite][league_id]" class="form-control" <?= $disabled ?> id="league_id">
                    <?php
                    foreach ($leagues as $league_name) {
                        ?>
                        <option  value="<?= $league_name['id'] ?>"><?= $league_name['league_name'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="form[invite][league_id_h]" value="<?= $_POST['form']['invite']['league_id'] ?>" id="invite_league_id" />
            </div>
            <div class="form-group">
                <label for="how many people">
                    How many people would you like to invite? 
                </label>
                <input type="number" id="num_people" name="form[invite][num_people]" value="<?= $_POST['form']['invite']['num_people'] ?>" class="form-control" <?= $disabled ?> maxlength="1" max="8" min="1"/>

            </div>
            <div class="form-group">
                <input type="submit" name="form[invite][do_add_fields]"  class="btn btn-success" id="add_rows" value="Add" <?= $disabled ?>/>
            </div>  
            <div id="add_message_div"></div>

            <!---END OF INVITE TEAM MEMBERS FORM--------->
            <?php
            foreach ($this->_invite_message as $errors) {
                echo "<div class='alert alert-danger' role='alert'>" . $errors . "</div>";
            }
            ?>
            <!--ADDITIONAL FIELDS GO HERE FROM MOREFIELDSCALLS function--->
            <div class="form-group" id="put_fields_here">


            </div>
            <div class="form-group">
                <input type="hidden" name="form[invite][ssid]" value="<?= $user_info['ssid'] ?>" id="invite_ssid" />
                <input type="hidden" name="form[invite][sender_info]" value="<?= $user_info['first_name'] . " " . $user_info['last_name'] ?>" id="invite_sender_info"/>
                <input type="hidden" name="form[invite][sender_email]" value="<?= $user_info['email'] ?>" id="invite_sender_email"/>

                <input type="submit" name="form[invite][do_invite_now]" id="do_invite_now" value="invite" class="btn btn-info" style="display: none;"/>
            </div>
        </form>
        <div id="invite_messages_div"></div>
        <?php
    }

    /*
     * @Auth: Rostom
     * Desc: ADDS TEAM MEMEBER INFO INTO TABLE
     * 02/28/2016
     */

    public function InviteMembersProcess(array $invitaion) {
        parse_str($invitaion);


        if (isset($invitaion['do_invite'])) {


            $this->_formInputs = $invitaion;
            $sender_name = $this->_formInputs['form']['invite']['sender_info'];
            $sender_email = $this->_formInputs['form']['invite']['sender_email'];
            for ($i = 0; $i < $invitaion['num_people']; $i++) {

                $name["name" . $i] = $this->_formInputs['name' . $i];
                $email["email" . $i] = $this->_formInputs['email' . $i];


                if ($email["email" . $i] == "" && $name["name" . $i] == "") {

                    $this->_flag = 1;
                    if ($this->_flag == 1) {
                        $errors = array();
                        array_push($errors, "All fields are required.");
                        $this->_invite_message = $errors;
                    } else {
                        $this->_flag = 0;
                        unset($this->_invite_message);
                    }
                } else if ($email["email" . $i] == "" || $name["name" . $i] == "") {
                    $this->_flag = 1;
                    if ($this->_flag == 1) {
                        $errors = array();
                        array_push($errors, "All fields are required.");
                        $this->_invite_message = $errors;
                        echo "error#21";
                    } else {
                        $this->_flag = 0;
                        unset($this->_invite_message);
                    }
                } else if (filter_var($email['email' . $i], FILTER_VALIDATE_EMAIL) === false) {
                    $this->_flag = 1;
                    if ($this->_flag == 1) {
                        $errors = array();
                        array_push($errors, "Please enter a valid email address.");
                        $this->_invite_message = $errors;
                        echo 'error#20';
                    } else {
                        $this->_flag = 0;
                        unset($this->_invite_message);
                    }
                } else if ($sender_email == $email['email' . $i]) {
                    $this->_flag = 1;
                    if ($this->_flag == 1) {
                        $errors = array();
                        array_push($errors, "You cannot add your self to your own league.");
                        $this->_invite_message = $errors;
                        echo 'error#22';
                    } else {
                        $this->_flag = 0;
                        unset($this->_invite_message);
                    }
                } else {

                    $new_date = $this->_fucntions->DateAndTime();
                    $new_date = $this->_fucntions->ReturnDate();
                    $today = date("Ymd");
                    $link_id = $this->_fucntions->UIDGEN($today);

                    //Insert into teams
                    $fields = array(
                        "1" => "linkid",
                        "2" => "name",
                        "3" => "email",
                        "4" => "league_id",
                        "5" => "sent_on"
                    );
                    $tables = array(
                        "table0" => "temp_invite",
                    );
                    $values = array();
                    array_push($values, "'" . $link_id . "'");
                    array_push($values, "'" . $name['name' . $i] . "'");
                    array_push($values, "'" . $email['email' . $i] . "'");
                    array_push($values, "'" . $invitaion['form']['invite']['league_id'] . "'");
                    array_push($values, "'" . $new_date . "'");

                    $insert_values = array(
                        "values" => $values,
                        "fields" => $fields,
                        "tables" => $tables
                    );
                    $this->_fucntions->InsertAll($insert_values, $cmd = "insert into temp_invite");

                    $message_link = '<a href="http://dev.teamup.webulence.com/public_html/Classes/loader.php?lid=' . $link_id . '">Click to join</a>';
                    $message = ""
                            . "Hi There {$name['name' . $i]}, \n"
                            . "\n"
                            . "{$sender_name} has invited you to join him to a fantasy league match up.\n"
                            . "Please follow the link to join \n"
                            . "click {$message_link}  \n"
                            . "Ref#: {$link_id}";
                    $subject = "TeamUp - Invitation";
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= "From: " . $sender_email . " \r\n ";
                    $to = $email['email' . $i];
                    $send_mail = mail($to, $subject, $message, $headers);
                    if ($send_mail) {
                        $this->_flag = 200;
                    } else {
                        $this->_flag = 1;
                        if ($this->_flag == 1) {
                            $errors = array();
                            array_push($errors, "Emails were not sent.");
                            $this->_invite_message = $errors;
                        } else {
                            $this->_flag = 0;
                            unset($this->_invite_message);
                        }
                    }
                }
            }
            if ($this->_flag == 200) {
                echo "success" . $this->_formInputs['form']['invite']['ssid'];
            }
        }
    }

    public function TeamInformationForm() {
        ?>
        <form class="signup" role="form" method="post">
            <h3>Team Name</h3>
            <?php
            foreach ($this->_message as $errors) {
                echo "<div class='alert alert-danger' role='alert'>" . $errors . "</div>";
            }
            ?>
            <form method="post" name="form[team]">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Team Name" id="team_name" name="form[team][name]" value="<?= $_POST['form']['team']['name'] ?>">
                </div>

                <div class="form-group">
                    <input type="submit"  class="btn btn-info" value="Add Team Name" name="add_team_name" id="add_team_name">
                </div>
            </form> 
            <?php
        }

        public function TeamInformationProcess() {
            
        }
        

        /*

         * Auth: Alex

         * Desc: Displays the Scores of todays games

         * Wirte a processor for ajax calls (Rsotom)

         */

        public function ScoreNavBar(array $data){

            ?>

            <!---HTML GOES HERE-Aex---->

            <div class="grid">
              <div class="grid-item">
                <div>9:00 pm</div>
                <div>Philadelphia Eagles</div>
                <div>Dallas Cowboys</div>
              </div>
               <div class="grid-item">
                <div>9:00 pm</div>
                <div>Philadelphia Eagles</div>
                <div>Dallas Cowboys</div>
              </div>
                <div class="grid-item">
                <div>9:00 pm</div>
                <div>Philadelphia Eagles</div>
                <div>Dallas Cowboys</div>
              </div>
              <div class="grid-item">
                <div>9:00 pm</div>
                <div>Philadelphia Eagles</div>
                <div>Dallas Cowboys</div>
              </div>
              <div class="grid-item">
                <div>9:00 pm</div>
                <div>Philadelphia Eagles</div>
                <div>Dallas Cowboys</div>
              </div>
              <div class="grid-item">
                <div>9:00 pm</div>
                <div>Philadelphia Eagles</div>
                <div>Dallas Cowboys</div>
              </div>
              <div class="grid-item">
                <div>9:00 pm</div>
                <div>Philadelphia Eagles</div>
                <div>Dallas Cowboys</div>
              </div>
              <div class="grid-item">
                <div>9:00 pm</div>
                <div>Philadelphia Eagles</div>
                <div>Dallas Cowboys</div>
              </div>
            </div>

            

            

            <?php

            

        }

    }
    