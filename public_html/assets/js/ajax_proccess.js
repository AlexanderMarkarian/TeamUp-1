/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * AJAX
 * 
 */
$("button#login").click(function () {
    console.log("in here");
    if ($("#email").val() == "" || $("#passowrd").val() == "") {

        $("div#errors").html("All fields are required now");
    } else {

        $.post($("#login_form").attr("action"),
                $("#login_form :input").serializeArray(),
                function (data) {
                    $("div#errors").html(data);
                });
     console.log($.post);
    }
    $("#login_form").submit(function(){
        return false;
    })


}

);
