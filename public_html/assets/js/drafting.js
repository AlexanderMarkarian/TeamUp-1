$(document).ready(function(){
    $(".selected").on("click", function(){
        $("#navbar").hide();
        $("#message").css('background-color', '#33cc33').text("Team 1 selected Placholder").show();

    	var int1 = setInterval(function(){
            clearInterval(int1);
            $("#message").css('background-color', '#6699ff').text("Team 2 is now on the clock");
            var int2 = setInterval(function() {
                clearInterval(int2);
                $("#message").hide();
                $("#navbar").show();
            },2000);
        },2000);
    });
});