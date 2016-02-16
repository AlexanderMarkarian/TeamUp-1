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
    public $_fucntions;

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
                <input type="text" placeholder="First Name" name="form[signup][firstname]" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" value="<?php
                    echo $_POST['form']['signup']['firstname'];
                ?>">
                <input type="text" name="form[signup][lastname]" placeholder="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Second Name';}" value="<?php
                    echo $_POST['form']['signup']['lastname'];
                ?>">
                <input type="text" class="email" placeholder="Email" name="form[signup][email]" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" value="<?php
                    echo $_POST['form']['signup']['email'];
                ?>">
                <input type="password" placeholder="Password" name="form[signup][password]" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" value="<?php
                    echo $_POST['form']['signup']['password'];
                ?>">
                <input type="submit"  name="form[signup][register]" value="Sign Up"/>
            </form>
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
                <form class="LogIn" role="form" method="post">
                    <h3>LogIn</h3>
                    <?php
                    foreach ($this->_login_message as $errors) {
                        echo "<div class='alert alert-danger' role='alert'>" . $errors . "</div>";
                    }
                    ?>
                    <input type="text" class="email" name="form[login][email]" placeholder="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" value="<?php
                        echo $_POST['form']['login']['email'];
                    ?>">
                    <input type="password" name="form[login][password]" placeholder="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"  value="<?php
                        echo $_POST['form']['login']['password'];
                    ?>">
                    <input type="submit"  name="form[login][do_login]" value="LogIn"/>
                </form>
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
                                                        <input type="text" class="form-control" name="form[edit][firstname]" value="<?php
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
                if (isset($this->_formInputs['form']['signup']['register'])) {
                    $input_values['fname'] = $this->_formInputs['form']['signup']['firstname'];
                    $input_values['lname'] = $this->_formInputs['form']['signup']['lastname'];
                    $input_values['email'] = $this->_formInputs['form']['signup']['email'];
                    $input_values['password'] = $this->_formInputs['form']['signup']['password'];
                    $input_values['page_name'] = $this->_formInputs['form']['signup']['page_name'];

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
                        $input_values["ssid"] = $helper_functions->UIDGEN($input_values['fname'] . "_");
                        $fields = array();
                        $fields['user_id'] = "user_id";
                        $fields['first_name'] = "first_name";
                        $fields['last_name'] = "last_name";
                        $fields['email'] = "email";
                        $fields['password'] = "password";
                        $fields['ssid'] = "ssid";
                        $query = $helper_functions->InsertNewUser("users", $fields, $input_values);
                        if ($query) {

                            $_SESSION['isLoggedin'] = $helper_functions->UIDGEN(date("Ymd"));
                            header("location: loader.php?cmd=profile&ssid=" . $input_values['ssid']);
                        }
                    }
                }
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

                if (isset($this->_formInputs['form']['login']['do_login'])) {
                    $input_values['email'] = $this->_formInputs['form']['login']['email'];
                    $input_values['password'] = $this->_formInputs['form']['login']['password'];

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
                        ///$getdata = $insertion->getDataQuery("users", $input_values);
                        //$data = $insertion->SetDataQuery();

                        if (!$query) {
                            $this->_flag = 1;
                            if ($this->_flag == 1) {
                                $error = array();
                                array_push($error, "There was an error loging you in!");
                                $this->_login_message = $error;
                            }
                        } else {
                            $input_values['ssid'] = $insertion->UIDGEN("User_");

                            $insertion->UpdateLoginSSID("users", $input_values['ssid'], "email", $input_values['email']);

                            $_SESSION['isLoggedin'] = $insertion->UIDGEN(date("Ymd"));



                            header("location: loader.php?cmd=profile&ssid=" . $input_values['ssid']);
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
                <form method="post" name="form[c_league]">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="League Name" name="form[c_league][league_name]" value="<?= $_POST['form']['c_league']['league_name'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Team Name" name="form[c_league][team_name]" value="<?= $_POST['form']['c_league']['team_name'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" id="datepicker" class="form-control datetimepicker" placeholder="Draft Date" name="form[c_league][d_date]" value="<?= $_POST['form']['c_league']['d_date'] ?>" >
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="form[c_league][cmd]" value="create_league" />
                        <input type="hidden" name="form[c_league][ssid]" value="<?= $_GET['ssid'] ?>"/>
                        <input type="submit"  name="form[c_league][create]" class="btn btn-info" value="Submit">
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
                $form_inputs['league_name'] = $this->_formInputs['form']['c_league']['league_name'];
                $form_inputs['team_name'] = $this->_formInputs['form']['c_league']['team_name'];
                $form_inputs['d_date'] = $this->_formInputs['form']['c_league']['d_date'];
                $form_inputs['create'] = $this->_formInputs['form']['c_league']['create'];

                //FOR Universal CHECK
                $tables = array(
                    "table0" => "users",
                    "table1" => "league_user",
                    "table2" => "leagues"
                );
                $fields = array(
                    "0" => "ssid",
                    "1" => "userid",
                    "2" => "id"
                );
                $required_fields = array(
                    "0" => $_GET['ssid'],
                    "1" => "user_id",
                    "2" => "league_id",
                    "3" => "league_name",
                    "4" => $form_inputs['league_name']
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
                    } else if ($this->_fucntions->UniversalCheckValues($tables, $fields, $required_fields, NULL)) {
                        $this->_flag = 1;
                        if ($this->_flag == 1) {
                            $errors = array();
                            array_push($errors, "League name taken.");
                            $this->_league_message = $errors;
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
                        if ($this->_flag == 0) {
                            $fields = array(
                                "1" => "league_name",
                                "2" => "created_on",
                            );

                            $tables = array(
                                "table0" => "leagues",
                            );
                            $values = array();
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
                                $league_id = $this->_fucntions->GetIDFromTables("leagues", "league_name", $form_inputs['league_name']);
                                $league_id = $this->_fucntions->SetIDFromTables();
                                $user_id = $this->_fucntions->GetIDFromTables("users", "ssid", $_GET['ssid']);
                                $user_id = $this->_fucntions->SetIDFromTables();

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
                                array_push($values, "'" . $league_id['id'] . "'");

                                $insert_values = array(
                                    "values" => $values,
                                    "fields" => $fields,
                                    "tables" => $tables
                                );
                                $this->_fucntions->InsertAll($insert_values, $cmd = "insert inot league user");
                                /*
                                 * Table 3
                                 */
                                //INsert into teams
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
                                array_push($values, "'" . $league_id['id'] . "'");
                                array_push($values, "'" . $form_inputs['d_date'] . "'");
                                array_push($values, 0);

                                $insert_values = array(
                                    "values" => $values,
                                    "fields" => $fields,
                                    "tables" => $tables
                                );
                                $this->_fucntions->InsertAll($insert_values, $cmd = "insert in to teams");
                                $this->_flag = 21;
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
                        <input type="button"  class="btn btn-info" value="Submit">
                    </div>
                </form>

                <?php
            }

            /*
             * @auth: ALex
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
                <form method="post" name="form[invite]">
                    <div class="form-group">
        <?php foreach ($leagues as $league_name) {
            
        }$disabled = ($league_name['id'] == NULL) ? "disabled='disabled'" : " "; ?>
                        <select name="form[invite][league_id]" class="form-control" <?= $disabled ?>>
                            <?php
                            foreach ($leagues as $league_name) {
                                ?>
                                <option  value="<?= $league_name['id'] ?>"><?= $league_name['league_name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Team Member Name" name="form[invite][tm_name]" value="<?= $_POST['form']['invite']['tm_name'] ?>" <?= $disabled ?>>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Team Member's Email" name="form[invite][tm_email]" value="<?= $_POST['form']['invite']['tm_email'] ?>" <?= $disabled ?>>
                    </div>
                    <div class="form-group">
                        <input type="button"  class="btn btn-info" value="Send Invitation" <?= $disabled ?>>
                    </div>
                </form>

                <?php
            }

        }
        