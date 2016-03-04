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
        var audio = new Audio('../assets/sounds/referee.mp3');
        var email = $("input#email_login").val();
        var password = $("input#password_login").val();
        var lid = $("input#lid1").val();
        var cmd = $("input#cmd_login").val();
        console.log(password);
        console.log(email);
        console.log(lid);

        if (email == "") {
            $('#small-dialog3').shake();
            $('#show').html("<div class='alert alert-danger' role='alert' id='errors'>Please Insert Your email address</div>");
            return false; // stop the script
        }

        if (password == "") { // if password variable is empty
            $('#small-dialog3').shake();
            $('#show').html("<div class='alert alert-danger' role='alert' id='errors'>Please Insert Your Password</div>");
            return false; // stop the script
        }

        $.ajax({// JQuery ajax function
            type: "POST", // Submitting Method
            url: 'ajax_process.php', // PHP processor->DONOT CHANGE 02/20/2016
            data: 'email=' + email + '&password=' + password + '&login=true' + '&do_login=Login' + "&lid=" + lid, // the data that will be sent to php processor
            dataType: "html", // type of returned data
            success: function (data) {
                console.log(data)// if ajax function results success
                if (data === "") { // if the returned data is empty means false

                    $('#small-dialog3').shake();
                    $("#login").val('Login');
                    $("#show").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> There was an error loging you in!. </div>");
                } else if (data.substr(0, 3) == "inv") { // if Password is all numeric or less than 5 Error #13
                    $('#s_show').html("<span style='color:#009938; font-size:15px;'><strong>Redirecting...</strong></span>");// print success message   
                    document.location.href = 'loader.php?cmd=invited' + "&ssid=" + data.substr(3) + "&lid=" + lid; // redirect to the private area  


                } else { // if the reurned data not empty then it passes value ssid to url
                    audio.play();
                    $('#show').html("<span style='color:#009938; font-size:15px;'><strong>Redirecting...</strong></span>");// print success message 
                    var timer = setTimeout(function () {
                        document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  
                    }, 1000);
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
        var cmd = $("input#cmd_signup").val();
        var lid = $("input#lid").val();

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
            data: 'firstname=' + firstname + '&lastname=' + lastname + '&email=' + email + '&password=' + password + '&signup=true' + '&register=Sign Up' + '&lid=' + lid, // the data that will be sent to php processor
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
                } else if (data.substr(0, 3) == "inv") { // if Password is all numeric or less than 5 Error #13
                    $('#s_show').html("<span style='color:#009938; font-size:15px;'><strong>Redirecting...</strong></span>");// print success message   
                    document.location.href = 'loader.php?cmd=invited' + "&ssid=" + data.substr(3) + "&lid=" + lid; // redirect to the private area  

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

        var leaguename = $("input#league_name").val();
        var league_name = leaguename.replace(" ", "_");
        console.log(league_name);
        var team_name = $("input#team_name").val();
        var d_date = $("input#datepicker").val();
        var cmd = $("input#cmd").val();
        var ssid = $("input#ssid").val();



        if (league_name == "" && team_name == "" && d_date == "") {
            $('#create').shake();
            $("form#c_league input:text").css("border", "1px solid red");
            $("#cleague").html("<div class='alert alert-danger' role='alert' id='errors'> All fields are empty!</div> ");
            return false; // stop the script
        }


        if (league_name == "" || team_name == "" || d_date == "") {
            $('#create').shake();
            $("form#c_league input:text").css("border", "1px solid red");
            $("#cleague").html("<div class='alert alert-danger' role='alert' id='errors'>One or more fields are empty! </div>");
            return false; // stop the script
        }

        $.ajax({// JQuery ajax function
            type: "POST", // Submitting Method
            url: 'ajax_process.php', // PHP processor -->DONOT CHANGE
            data: 'league_name=' + league_name + '&team_name=' + team_name + '&d_date=' + d_date + '&createleagues=true' + '&ssid=' + ssid + '&create=Submit' + "data=true", // the data that will be sent to php processor
            dataType: "html", // type of returned data
            success: function (data) {
                console.log(data);
                if (data == "error#15") { // if league name is taken Error #15
                    //Shake animation effect.
                    $('#create').shake();
                    $("form#c_league input:text").css("border", "1px solid red");
                    $("#cleague").html("<div class='alert alert-danger' role='alert' id='errors'>League name is taken.</div> ");
                } else if (data == "error#16") { // if time and date is in the past Error #16
                    $('#create').shake();
                    $("form#c_league input:text").css("border", "1px solid red");
                    $("#cleague").html("<div class='alert alert-danger' role='alert' id='errors'>Date and time are in the past!. </div>");
                    console.log(data);
                } else { // if the reurned data not Error#15,Error#16 than data is ssid
                    console.log(data);
                    $("form#c_league input:text").css("border", "1px solid black");
                    $('#cleague').html("<span style='color:#009938; font-size:15px;'><strong>League Created</strong></span>");// print success message   
                    document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  
                    console.log(data);
                }
            }
        });
        return false;
    });
});

/*
 * FOR ADDING FIELDS 
 */
$(function () {
    $("#add_rows").click(function () {

        var num_people = $("input#num_people").val();

        if (num_people == "") {
            $("form#invite input:text").css("border", "1px solid black");
            $("#invite_message").html("<div class='alert alert-danger' role='alert' id='errors'>Please enter number of people you would like to invite to your league(1-8)! </div>");
            return false; // stop the script
        }
        $.ajax({// JQuery ajax function
            type: "POST", // Submitting Method
            url: 'ajax_process.php', // PHP processor -->DONOT CHANGE
            data: 'num_people=' + num_people + '&add_fields=true' + '&do_add_fields=Add' + '&data=true', // the data that will be sent to php processor
            dataType: "html", // type of returned data
            success: function (data) {
                // console.log(data);
                if (data.substr(0, 10) == "add fields") {
                    //$('#invite_message').shake();
                    $("#do_invite_now").css("display", "");
                    $("#invite_message").html("");
                    $("#put_fields_here").html(data.substr(10));
                }

            }

        });
        return false;
    });
});


$(function () {
    $("#do_invite_now").click(function () {

        var do_invite = $("#do_invite_now").val();
        var ssid = $("input#invite_ssid").val();
        var sender_info = $("input#invite_sender_info").val();
        var sender_email = $("input#invite_sender_email").val();
        var league_id = $("#league_id option:selected").val();
        var num_people = $("input#num_people").val();
        for (i = 0; i < num_people; i++) {
            var name = [];
            name = $("input#name" + i).val();
            var email = [];
            email = $("input#email" + i).val();

            if ((name == "" && email == "") || (name == "" || email == "")) {
                $("#invite_message").html("<div class='alert alert-danger' role='alert' id='errors'>All fields are required! </div>");
                return false

            }


        }
        var dataObject = $('#invite').serialize();

        $.ajax({// JQuery ajax function
            type: "POST", // Submitting Method
            url: 'ajax_process.php', // PHP processor -->DONOT CHANGE
            data: dataObject + "&do_invite=" + do_invite, // the data that will be sent to php processor
            dataType: "html", // type of returned data
            success: function (data) {
                console.log(data);

                if (data.substr(0, 8) == "error#20") {
                    //$('#invite_message').shake();
                    //$("form#c_league input:text").css("border", "1px solid red");
                    $("#invite_message").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> Please enter a valid email address. </div>");

                }

            }

        });

        return false;
    });

});