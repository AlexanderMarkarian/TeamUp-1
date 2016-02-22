/*
 * @Auth: Rostom
 * Ajax proccess for ajax_process.php
 * 02/20/2016
 */
/*
 * Login Ajax
 */
$(function () {
    $("#login").click(function () {

        var username = $("input#email").val();
        if (username == "") {
            $('#small-dialog3').shake();
            $('#show').html("<div class='alert alert-danger' role='alert' id='errors'>Please Insert Your email address</div>");
            return false; // stop the script
        }
        var password = $("input#password").val();
        if (password == "") { // if password variable is empty
            $('#small-dialog3').shake();
            $('#show').html("<div class='alert alert-danger' role='alert' id='errors'>Please Insert Your Password</div>");
            return false; // stop the script
        }
        var cmd = $("input#cmd").val();
        $.ajax({// JQuery ajax function
            type: "POST", // Submitting Method
            url: 'ajax_process.php', // PHP processor->DONOT CHANGE 02/20/2016
            data: 'email=' + username + '&password=' + password + '&login=true' + '&do_login=Login', // the data that will be sent to php processor
            dataType: "html", // type of returned data
            success: function (data) {
                console.log(data)// if ajax function results success
                if (data === "") { // if the returned data is empty means false

                    $('#small-dialog3').shake();
                    $("#login").val('Login');
                    $("#show").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> There was an error loging you in!. </div>");


                } else { // if the reurned data not empty then it passes value ssid to url
                    $('#show').html("<span style='color:#009938; font-size:15px;'><strong>Redirecting...</strong></span>");// print success message   
                    document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  
                }
            }
        });
        return false;
    });
});
/*
 * Sign up Ajax
 */
$(function () {
    $("#signup").click(function () { // if submit button is clicked

        var firstname = $("input#firstname").val();
        var lastname = $("input#lastname").val();
        var email = $("input#email").val();
        var password = $("input#password").val();
        var cmd = $("input#cmd").val();

        if (firstname == "" && lastname == "" && email == "" && password == "") { // if username variable is empty
            $('#small-dialog2').shake();
            $("#s_show").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> All fields are empty!</div> ");
            return false; // stop the script
        }


        if (firstname == "" || lastname == "" || email == "" || password == "") { // if username variable is empty
            $('#small-dialog2').shake();
            $("#s_show").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span>One or more fields are empty! </div>");
            return false; // stop the script
        }

        $.ajax({// JQuery ajax function
            type: "POST", // Submitting Method
            url: 'ajax_process.php', // PHP processor -->DONOT CHANGE
            data: 'firstname=' + firstname + '&lastname=' + lastname + '&email=' + email + '&password=' + password + '&signup=true' + '&register=Sign Up', // the data that will be sent to php processor
            dataType: "html", // type of returned data
            success: function (data) {
                console.log(data);

                if (data == "error#11") { // if Email already registered Error #11
                    //Shake animation effect.
                    $('#small-dialog2').shake();
                    $("#signup").val('Signup');
                    $("#s_show").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> Email is already registerd.</div> ");
                } else if (data == "error#12") { // if Email format is not correct Error #12
                    $('#small-dialog2').shake();
                    $("#signup").val('Signup');
                    $("#s_show").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> Please enter a valid email address. </div>");
                } else if (data == "error#13") { // if Password is all numeric or less than 5 Error #13
                    $('#small-dialog2').shake();
                    $("#signup").val('Signup');
                    $("#s_show").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> Password must be at least 5 charecters long and alpha-numeric.</div> ");
                } else { // if the reurned data not Error#11,Error#12,Error#13 than data is ssid
                    $('#s_show').html("<span style='color:#009938; font-size:15px;'><strong>Redirecting...</strong></span>");// print success message   
                    document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  
                }
            }
        });
        return false;
    });
});

/*
 * Create League Ajax
 */

$(function () {
    $("#create").click(function () { // if submit button is clicked

        var league_name = $("input#league_name").val();
        var team_name = $("input#team_name").val();
        var d_date = $("input#datepicker").val();
        var cmd = $("input#cmd").val();
        var ssid = $("input#ssid").val();



        if (league_name == "" && team_name == "" && d_date == "") {
            $('#create').shake();
            $("form#c_league input:text").css("border", "1px solid red");
            $("#cleague").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> All fields are empty!</div> ");
            return false; // stop the script
        }


        if (league_name == "" || team_name == "" || d_date == "") {
            $('#create').shake();
            $("form#c_league input:text").css("border", "1px solid red");
            $("#cleague").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> One or more fields are empty! </div>");
            return false; // stop the script
        }

        $.ajax({// JQuery ajax function
            type: "POST", // Submitting Method
            url: 'ajax_process.php', // PHP processor -->DONOT CHANGE
            data: 'league_name=' + league_name + '&team_name=' + team_name + '&d_date=' + d_date + '&createleagues=true' + '&ssid=' + ssid + '&create=Submit', // the data that will be sent to php processor
            dataType: "html", // type of returned data
            success: function (data) {
                console.log(data);
                if (data == "error#15") { // if league name is taken Error #15
                    //Shake animation effect.
                    $('#create').shake();
                    $("form#c_league input:text").css("border", "1px solid red");
                    $("#cleague").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span>League name is taken.</div> ");
                } else if (data == "error#16") { // if time and date is in the past Error #16
                    $('#create').shake();
                    $("form#c_league input:text").css("border", "1px solid red");
                    $("#cleague").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span>Date and time are in the past!. </div>");

                } else { // if the reurned data not Error#15,Error#16 than data is ssid
                    $("form#c_league input:text").css("border", "1px solid black");
                    $('#cleague').html("<span style='color:#009938; font-size:15px;'><strong>League Created</strong></span>");// print success message   
                    //document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  
                }
            }
        });
        return false;
    });
});