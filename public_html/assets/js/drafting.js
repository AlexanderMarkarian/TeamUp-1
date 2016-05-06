$(document).ready(function(){

    var ajaxTeams = [];
    $("#main-box").hide();
    $('#myTable').DataTable();
    
    var ajaxInterval;
    //start();
    
    function start(){
        clearInterval(ajaxInterval);
        ajaxInterval = setInterval(function(){
            console.log("Here");
            start();
        },20000);
    }

         
    /*     
   
    var team = {};
    var interval;
    
    var date = new Date();
    var month = date.getMonth();
    var nMonth = date.getMonth()+1;
    var day = date.getDate();
    var year = date.getFullYear();
    var nday = day+1;
   

    $(document.body).on("click", ".teams", function(){
        $("#intro-box").hide();
        $("#main-box").show();

        team.team = $(this)[0].cells[0].innerHTML;
        team.league = $(this)[0].cells[1].innerHTML;
        team.GP = $(this)[0].cells[3].innerHTML;
        team.wins = $(this)[0].cells[4].innerHTML;
        team.loses = $(this)[0].cells[5].innerHTML;
        team.pct = $(this)[0].cells[6].innerHTML;
        team.image = "../assets/" + $(this)[0].id;
        document.getElementById("selected-logo").src = team.image;
        $("#selected-team").html(team.team);
        $("#selected-league").html(team.league);
        $("#gp").html(team.GP);
        $("#w").html(team.wins);
        $("#l").html(team.loses);                
        $("#pct").html(team.pct);

    });

    $(document.body).on("click","#draft-team", function(){
        var team = $("#selected-team").text();
        for(var k in ajaxTeams){
          if(ajaxTeams[k].team == team){
            teamID = ajaxTeams[k].id;
          }
        }
        var teamID;
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
    */
});