<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
foreach ($pg['data'] as $user_info) {
    $fname = $user_info['first_name'];
    $lname = $user_info['last_name'];
    $email = $user_info['email'];
    $password = $user_info['password'];

    $old_fname = $_POST['form']['edit']['firstname'];
    $old_lname = $_POST['form']['edit']['lastname'];
    $old_email = $_POST['form']['edit']['email'];
    $old_password = $_POST['form']['edit']['password'];
    ?>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel panel-default">

                        <div class="panel-heading">Edit Profile</div>
                        <div class="panel-body">
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
                </section>
            <?php } ?>