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
                console.log(data);// if ajax function results success
                //throw new Error("Something went badly wrong!");
                if (data === "") { // if the returned data is empty means false

                    $('#small-dialog3').shake();
                    $("#login").val('Login');
                    $("#show").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> There was an error loging you in!. </div>");
                } else if (data.substr(0, 3) == "inv") { // if Password is all numeric or less than 5 Error #13
                    //$('#s_show').html("<span style='color:#009938; font-size:15px;'><strong>Redirecting...</strong></span>");// print success message   
                    $('#show').html("<div class='alert alert-success' role='alert' id='errors'>verifying you account.<img src='../assets/images/other/spinner6.gif'/> </div>");// print success message   
                    //document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  
                    window.setTimeout(function () {
                        $("#show").html("<div class='alert alert-success' role='alert' id='errors'><strong>" + email + " verified</strong></div>");

                    }, 2000);
                    audio.play();
                    window.setTimeout(function () {
                        $("#show").html("<div class='alert alert-success' role='alert' id='errors'>Redirecting <img src='../assets/images/other/spinner6.gif'/> </div>");

                    }, 2500);
                    window.setTimeout(function () {
                        $("#s_show").hide();

                        // Move to a new location or you can do something else
                    }, 3000);
                    window.setTimeout(function () {
                        console.log(data);// if ajax function results success
                        console.log(cmd);
                      /// throw new Error("Something went badly wrong!");
                        document.location.href = 'loader.php?cmd=invited' + "&ssid=" + data.substr(3) + "&lid=" + lid; // redirect to the private area  

                    }, 3200);

                } else { // if the reurned data not empty then it passes value ssid to url
                    // audio.play();
                    // $('#show').html("<span style='color:#009938; font-size:15px;'><strong>Redirecting...</strong></span>");// print success message 
                    //var timer = setTimeout(function () {
                    //    document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  
                    //}, 1000);
                    console.log(data);// if ajax function results success
                    //throw new Error("Something went badly wrong!");
                    $('#show').html("<div class='alert alert-success' role='alert' id='errors'>verifying you account.<img src='../assets/images/other/spinner6.gif'/> </div>");// print success message   
                    //document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  
                    window.setTimeout(function () {
                        $("#show").html("<div class='alert alert-success' role='alert' id='errors'><strong>" + email + " verified</strong></div>");

                    }, 2000);
                    audio.play();
                    window.setTimeout(function () {
                        $("#show").html("<div class='alert alert-success' role='alert' id='errors'>Redirecting <img src='../assets/images/other/spinner6.gif'/> </div>");

                    }, 2500);
                    window.setTimeout(function () {
                        $("#s_show").hide();

                        // Move to a new location or you can do something else
                    }, 3000);
                    window.setTimeout(function () {
                      console.log(data);// if ajax function results success
                      console.log(cmd);
                       //throw new Error("Something went badly wrong!");
                        document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  
                        //console.log(data);
                    }, 3300);







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
                    $('#s_show').html("<div class='alert alert-success' role='alert' id='errors'>We are creating you account.<img src='../assets/images/other/spinner6.gif'/> </div>");// print success message   
                    window.setTimeout(function () {
                        $("#s_show").html("<div class='alert alert-success' role='alert' id='errors'>" + firstname + " your account was successfully created.</div>");

                    }, 1500);
                    window.setTimeout(function () {
                        $("#s_show").html("<div class='alert alert-success' role='alert' id='errors'>Redirecting <img src='../assets/images/other/spinner6.gif'/> </div>");

                    }, 2000);
                    window.setTimeout(function () {
                        $("#s_show").hide();
                        // Move to a new location or you can do something else
                    }, 2500);
                    window.setTimeout(function () {
                        document.location.href = 'loader.php?cmd=invited' + "&ssid=" + data.substr(3) + "&lid=" + lid; // redirect to the private area 

                    }, 2500);

                } else { // if the reurned data not Error#11,Error#12,Error#13 than data is ssid
                    $('#s_show').html("<div class='alert alert-success' role='alert' id='errors'>We are creating you account.<img src='../assets/images/other/spinner6.gif'/> </div>");// print success message   
                    window.setTimeout(function () {
                        $("#s_show").html("<div class='alert alert-success' role='alert' id='errors'>" + firstname + " your account was successfully created.</div>");

                    }, 1500);
                    window.setTimeout(function () {
                        $("#s_show").html("<div class='alert alert-success' role='alert' id='errors'>Redirecting <img src='../assets/images/other/spinner6.gif'/> </div>");

                    }, 2000);
                    window.setTimeout(function () {
                        $("#s_show").hide();
                        // Move to a new location or you can do something else
                    }, 2500);
                    window.setTimeout(function () {
                        console.log(data);// if ajax function results success
                        console.log(cmd);
                        //throw new Error("Something went badly wrong!");
                        document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  

                    }, 3000);
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
//                    console.log(data);
                    $("form#c_league input:text").css("border", "1px solid black");
                    $("#cleague").html("<div class='alert alert-success' role='alert' id='errors'>" + league_name + " is being created.<img src='../assets/images/other/spinner6.gif'/> </div>");
                    console.log(data);
                    window.setTimeout(function () {
                        $("#cleague").html("<div class='alert alert-success' role='alert' id='errors'>" + league_name + " created.</div>");

                    }, 1000);
                    window.setTimeout(function () {
                        $("#cleague").hide();
                        // Move to a new location or you can do something else
                    }, 1300);
                    window.setTimeout(function () {
                        document.location.href = 'loader.php?cmd=' + cmd + "&ssid=" + data; // redirect to the private area  

                    }, 1600);
                }
            }
        });
        return false;
    });
});

/* @athur: Rostom Sahakian
 * FOR ADDING FIELDS 
 * 03032016
 */
$(function () {
    $("#add_rows").click(function () {

        var num_people = $("input#num_people").val();
        var league_id = $("#league_id option:selected").val();


        if (num_people == "") {
            $("form#invite input#num_people").css("border", "1px solid red");
            $("#invite_message").html("<div class='alert alert-danger' role='alert' id='errors'>Please enter number of people you would like to invite to your league <strong>(1-7)</strong> </div>");
            return false; // stop the script
        }
        if (num_people > 7) {
            $("form#invite input#num_people").css("border", "1px solid red");
            $("#invite_message").html("<div class='alert alert-danger' role='alert' id='errors'>You can only invite maximum of 7 people per league</div>");
            return false;
        }
        if (num_people < 1) {
            $("form#invite input#num_people").css("border", "1px solid red");
            $("#invite_message").html("<div class='alert alert-danger' role='alert' id='errors'>Minimum number must be at least 1</div>");
            return false;
        }
        if (Number(num_people) === false) {
            $("form#invite input#num_people").css("border", "1px solid red");
            $("#invite_message").html("<div class='alert alert-danger' role='alert' id='errors'>Input must be in digits only</div>");
            return false;
        }
        $.ajax({// JQuery ajax function
            type: "POST", // Submitting Method
            url: 'ajax_process.php', // PHP processor -->DONOT CHANGE
            data: 'num_people=' + num_people + '&add_fields=true' + '&do_add_fields=Add' + '&data=true' + '&league_id_h=' + league_id, // the data that will be sent to php processor
            dataType: "html", // type of returned data
            success: function (data) {
                console.log(data);
                if (data.substr(0, 8) == "error#30") {
                    $("form#invite input#num_people").css("border", "1px solid red");
                    $("#invite_message").html("<div class='alert alert-danger' role='alert' id='errors'>" + data.substr(8) + " more members can be added.</div>");

                } else if (data.substr(0, 8) == "error#31") {
                    $("form#invite input#num_people").css("border", "1px solid red");
                    $("#invite_message").html("<div class='alert alert-danger' role='alert' id='errors'>League is full try to choosing another league.</div>");

                } else if (data.substr(0, 10) == "add fields") {

                    $("form#invite input#num_people").css("border", "1px solid green");
                    $("#invite_message").html("");
                    $("#add_message_div").html("<div class='alert alert-success' role='alert' id='errors'>Generating " + num_people + " fileds <img src='../assets/images/other/spinner6.gif'/> </div>");
                    $("#add_message_div").show();

                    window.setTimeout(function () {
                        $("#add_message_div").hide();
                        // Move to a new location or you can do something else
                    }, 500);

                    window.setTimeout(function () {
                        $("#put_fields_here").html(data.substr(10));
                        $("#do_invite_now").css("display", "");
                    }, 600);


                }

            }

        });
        return false;
    });
});
/* @athur: Rostom Sahakian
 * Email Invitation Ajax
 * 03042016
 */

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
                $('#do_invite_now').shake();
                $("form#invite input#name" + i).css("border", "1px solid red");
                $("form#invite input#email" + i).css("border", "1px solid red");
                $("#invite_messages_div").html("<div class='alert alert-danger' role='alert' id='errors'>All fields are required! </div>");
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
                    $("form#invite input:text").css("border", "1px solid green");
                    for (i = 0; i < num_people; i++) {
                        $("form#invite input#email" + i).css("background-color", "#F2DEDE");
                    }
                    $('#do_invite_now').shake();
                    //$("form#c_league input:text").css("border", "1px solid red");
                    $("#invite_messages_div").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span> Please enter a valid email address. </div>");
                } else if (data.substr(0, 8) == "error#22") {
                    $('#do_invite_now').shake();
                    $("#invite_messages_div").html("<div class='alert alert-danger' role='alert' id='errors'><span style='color:#cc0000'>Error:</span>You cannot add your self to your own league. </div>");

                } else if (data.substr(0, 7) == "success") {
                    $("form#invite input:text").css("border", "1px solid green");
                    for (i = 0; i < num_people; i++) {
                        $("form#invite input#email" + i).css("background-color", "#fff");
                        $("form#invite input#email" + i).css("border", "1px solid green");

                    }
                    $("#invite_messages_div").html("<div class='alert alert-success' role='alert' id='errors'>Sending <img src='../assets/images/other/sending.gif'/> </div>");
                    $("#invite_messages_div").show();
                    // Your application has indicated there's an error
                    window.setTimeout(function () {

                        $("#invite_messages_div").hide();
//                        // Move to a new location or you can do something else

                        $("#invite_messages_div").html("<div class='alert alert-success' role='alert' id='errors'>Invitation Sent</div>");
                        $("#invite_messages_div").show();
                        window.setTimeout(function () {
                            window.location.href = 'loader.php?cmd=profile' + "&ssid=" + data.substr(7);
                        }, 2000);
                    }, 4000);
                }

            }

        });

        return false;
    });

});