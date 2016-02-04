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

    public function __construct() {
        $this->_db = db_connect::getInstance();
        $this->_mysqli = $this->_db->getConnection();
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to TeamUP
                    </h1>
                </div>
                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-compass"></i> Register</h4>
                        </div>
                        <div class="panel-body">
                            <?php
                            foreach ($this->_message as $errors) {
                                echo "<div class='alert alert-danger' role='alert'>" . $errors . "</div>";
                            }
                            ?>
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >First Name:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="form[signup][firstname]" value="<?php
                                        echo $_POST['form']['signup']['firstname'];
                                        ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Last Name:</label>
                                    <div class="col-sm-10">          
                                        <input type="text" class="form-control" name="form[signup][lastname]" value="<?php
                                        echo $_POST['form']['signup']['lastname'];
                                        ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Email:</label>
                                    <div class="col-sm-10">          
                                        <input type="text" class="form-control" name="form[signup][email]" value="<?php
                                        echo $_POST['form']['signup']['email'];
                                        ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Password:</label>
                                    <div class="col-sm-10">          
                                        <input type="password" class="form-control" name="form[signup][password]" value="<?php
                                        echo $_POST['form']['signup']['password'];
                                        ?>">
                                    </div>
                                </div>
                                <div class="form-group">        
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary" name="form[signup][register]" value="Register">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> LogIn</h4>
                    </div>
                    <div class="panel-body">
                        <?php
                        foreach ($this->_login_message as $errors) {
                            echo "<div class='alert alert-danger' role='alert'>" . $errors . "</div>";
                        }
                        ?>
                        <form class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Email:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="form[login][email]" value="<?php
                                    echo $_POST['form']['login']['email'];
                                    ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Password:</label>
                                <div class="col-sm-10">          
                                    <input type="password" class="form-control" name="form[login][password]" value="<?php
                                    echo $_POST['form']['login']['password'];
                                    ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class="col-sm-10">          
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" name="form[login][do_login]" class="btn btn-primary" value="LogIn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
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
                       // $_POST['page_name'] = $input_values['page_name'];
                        //$_GET['cmd'] = "profile";
                        header("location: loader.php?cmd=profile&ssid=". $input_values['ssid']);
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
                    if (!$query) {
                        $this->_flag = 1;
                        if ($this->_flag == 1) {
                            $error = array();
                            array_push($error, "There was an error loging you in!");
                            $this->_login_message = $error;
                        }
                    } else {
                        $input_values['ssid'] = $insertion->UIDGEN("User_");
                        $insertion->UpdateLoginSSID("users", $input_values['ssid'], $input_values['email']);
                        header("location: loader.php?cmd=profile&ssid=" . $input_values['ssid']);
                    }
                }
            }
        }

    }
    