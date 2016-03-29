$(document).ready(function(){

    $("#main-box").hide();

    var team = {};
    var interval;
    
    $.ajax({
        type: "GET",
        url: "../backup_basketball_data/2016-03-06.json",
        data:{

        },
        success:function(data){
            var string = "";
            for(var k in data){
                if(data[k].teamName != "d"){
                    var wins = parseInt(data[k].w);
                    var loses = parseInt(data[k].l);
                    var total = wins + loses;
                    var winPct = (wins / total).toFixed(2);
                    string += "<tr class='teams'><td>"+data[k].teamName+"</td><td>NBA</td><td>Free Agent</td>";
                    string += "<td>"+total+"</td><td>"+wins+"</td><td>"+loses+"</td><td>"+winPct+"</td></tr>";
                }
            }

            $("#table-body").append(string);
            $('#myTable').DataTable();
        }
    });

    $(document.body).on("click", ".teams", function(){
        $("#intro-box").hide();
        $("#main-box").show();

        if($(this)[0].id){
            $(".queue").html("Remove From Queue");
            $(".queue").attr("id","remove-queue");
            $("#remove-queue").removeClass("btn-info");
            $("#remove-queue").addClass("btn-danger"); 
        }
        else{
            $(".queue").html("Add To Queue");
            $(".queue").attr("id","add-queue");
            $("#add-queue").removeClass("btn-danger");
            $("#add-queue").addClass("btn-info");
        }

        team.team = $(this)[0].cells[0].innerHTML;
        team.league = $(this)[0].cells[1].innerHTML;
        team.GP = $(this)[0].cells[3].innerHTML;
        team.wins = $(this)[0].cells[4].innerHTML;
        team.loses = $(this)[0].cells[5].innerHTML;
        team.pct = $(this)[0].cells[6].innerHTML;
        $("#selected-team").html(team.team);
        $("#selected-league").html(team.league);
        $("#gp").html(team.GP);
        $("#w").html(team.wins);
        $("#l").html(team.loses);                
        $("#pct").html(team.pct);

    });


    $(document.body).on("click", "#add-queue", function(){
        var string = '<tr class="teams" id="queued"><td>'+team.team+'</td><td style="display:none">'+team.league+'</td><td style="display:none"></td><td style="display:none">'+team.GP+'</td><td style="display:none">'+team.wins+'</td><td style="display:none">'+team.loses+'</td><td style="display:none">'+team.pct+'</td></tr>';
        $(".queue-list").append(string);
        $(".queue").html("Remove From Queue");
        $(".queue").attr("id","remove-queue");
        $("#remove-queue").removeClass("btn-info");
        $("#remove-queue").addClass("btn-danger");
    });

    $(document.body).on("click","#draft-team", function(){

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
    });


    $(document.body).on("click","#remove-queue", function(){
        $(".queue-list tr:contains('"+team.team+"')").remove();
        $("#main-box").hide();
        $("#intro-box").show();
    });


});