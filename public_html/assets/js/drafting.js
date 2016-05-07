$(document).ready(function(){

    var team = {};
    $("#main-box").hide();
    $('#myTable').DataTable({
        "autoWidth": false
    });
    
    var ajaxInterval, interval;
    var ssid = $("#ssid").val();
    var leagueid = $("#leagueid").val();
    start();
    timer();
    
    function start(){
        clearInterval(ajaxInterval);
        ajaxInterval = setInterval(function(){
            $.ajax({
               type: "POST",
               url: "../Classes/ajax_process.php",
               data:{
                   checkRefresh: true,
                   ssid: ssid,
                   leagueid: leagueid
               },
               success: function(response){
                   console.log(response);
                   if(response == 1){
                      window.location.href = 'loader.php?cmd=draft' + "&ssid=" + ssid + "&leagueid=" + leagueid; 
                   }
               }
            });
            start();
        },10000);
    }

    $(document.body).on("click", ".teams", function(){
        $("#intro-box").hide();
        $("#main-box").show();
        team.team = $(this)[0].cells[0].innerHTML;
        team.league = $(this)[0].cells[1].innerHTML;
        team.GP = $(this)[0].cells[2].innerHTML;
        team.wins = $(this)[0].cells[3].innerHTML;
        team.loses = $(this)[0].cells[4].innerHTML;
        team.pct = $(this)[0].cells[5].innerHTML;
        team.image = "../assets/" + $(this).attr('name');
        document.getElementById("selected-logo").src = team.image;
        $(".selected-team").html(team.team);
        $(".selected-team").attr('id', $(this)[0].id);
        $("#selected-league").html(team.league);
        $("#gp").html(team.GP);
        $("#w").html(team.wins);
        $("#l").html(team.loses);                
        $("#pct").html(team.pct);
    });
    
    $(document.body).on("click","#draft-team", function(){
        var team = $(".selected-team").attr('id');
        $.ajax({
           type: "POST",
           url: "../Classes/ajax_process.php",
           data:{
               checkTurn: true,
               ssid: ssid,
               leagueid: leagueid,
               teamid: team
           },
           success: function(response){
               console.log(response);
               if(response == "Error1"){
                   $(".alert-sucess").hide();
                   $(".alert-danger").show();
               }
               else{
                   $(".alert-danger").hide();
                   $(".alert-success").show();
                   $(".alert-success").html("You have successfully drafted the: " + $(".selected-team").text());
               }
           }
        });
    });
         
         
    function timer(){
      clearInterval(interval);
        var twoMinutes = 60 * 2,
            display = $('.time');
        startTimer(twoMinutes, display);


        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            interval = setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.text(minutes + ":" + seconds);
                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);

        }  
    }
});