$(document).ready(function(){

    var team = {};
    var ajaxInterval;
    var ssid = $("#ssid").val();
    var leagueid = $("#leagueid").val();
    $("#main-box").hide();
    $('#myTable').DataTable({
        "autoWidth": false
    });
    
    $(".readyDraft").click(function(){
       $.ajax({
         type: "POST",
         url: "../Classes/ajax_process.php",
         data:{
             readyDraft: true,
             leagueuserid: this.id
         },
         success:function(response){
             window.location.href = 'loader.php?cmd=draft' + "&ssid=" + ssid + "&leagueid=" + leagueid; 
         }
       });
    });
        
    start();
    
    $("#startDraft").click(function(){
        $.ajax({
            type: "POST",
            url: "../Classes/ajax_process.php",
            data:{
                startDraft: true,
                leagueid: leagueid
            },
            success: function(){
                document.getElementById("myNav").style.width = "0%"; 
            }
        })
    });
    

    
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
                      //timer();
                      window.location.href = 'loader.php?cmd=draft' + "&ssid=" + ssid + "&leagueid=" + leagueid; 
                   }
               }
            });
            start();
        },12000);
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
               else if(response == "over"){
                   window.location.href = 'loader.php?cmd=draft' + "&ssid=" + ssid + "&leagueid=" + leagueid; 
               }
               else{
                   $(".alert-danger").hide();
                   $(".alert-success").show();
                   $(".alert-success").html("Drafting " + $(".selected-team").text() + "<img src='../assets/images/other/spinner6.gif'/>");
               }
           }
        });
    });
    
    function timer(){
        localStorage.clear();
        var minutesleft = 2; //give minutes you wish
        var secondsleft = 00; // give seconds you wish
        var finishedtext = "Countdown finished!";
        var end1;
        if(localStorage.getItem("end1")) {
        end1 = new Date(localStorage.getItem("end1"));
        } else {
        end1 = new Date();
        end1.setMinutes(end1.getMinutes()+minutesleft);
        end1.setSeconds(end1.getSeconds()+secondsleft);

        }
        var counter = function () {
        var now = new Date();
        var diff = end1 - now;

        diff = new Date(diff);

        var milliseconds = parseInt((diff%1000)/100)
            var sec = parseInt((diff/1000)%60)
            var mins = parseInt((diff/(1000*60))%60)
            //var hours = parseInt((diff/(1000*60*60))%24);

        if (mins < 10) {
            mins = "0" + mins;
        }
        if (sec < 10) { 
            sec = "0" + sec;
        }     
        if(now >= end1) {     
            clearTimeout(interval);
           // localStorage.setItem("end", null);
             localStorage.removeItem("end1");
             localStorage.clear();
             alert("Fomosjed");
        } else {
            var value = mins + ":" + sec;
            localStorage.setItem("end1", end1);
            document.getElementById('timer').innerHTML = value;
        }
        }
        var interval = setInterval(counter, 1000);
    }
    

});