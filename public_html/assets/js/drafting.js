$(document).ready(function(){

    $("#main-box").hide();
    
    // SETTING USER INFO -------------------------------
    var oneWayOrder = [];
    var reverseOrder = [];
    
    $.ajax({
       type:"POST",
       url:"../Classes/draft.php",
       data:{
           getUsers:true
       },
       success:function(response){
           var data = $.parseJSON(response);
           for(var k in data){
               oneWayOrder.push(data[k]);
           }
           for(var i=oneWayOrder.length-1; i>=0; i--){
               reverseOrder.push(oneWayOrder[i]);
           }
           var oddString = '', evenString = '';
           var count = 1;
           for(var k in oneWayOrder){
               oddString += '<tr class="round-item"><td><span class="round-number pull-left">'+count+'</span>';
               oddString += '<span class="round-name">'+oneWayOrder[k]+'</span></td></tr>';
               count++;
           }
           $(".odd_round").append(oddString);
           
           for(var k in reverseOrder){
               evenString += '<tr class="round-item"><td><span class="round-number pull-left">'+count+'</span>';
               evenString += '<span class="round-name">'+reverseOrder[k]+'</span></td></tr>';
               count++;
           }
           $(".even_round").append(evenString);
           
           //timer();
           
       }
    });
    // -------------------------------------------------

    var team = {};
    var interval;
    
    var date = new Date();
    var month = date.getMonth();
    var nMonth = date.getMonth()+1;
    var day = date.getDate();
    var year = date.getFullYear();
    var nday = day+1;
    $.ajax({
       type: "POST",
       url: "../allsportsdata/allsportsdata.php",
       data:{},
       success: function(response){
                                                   
           $.ajax({
              type: "GET",
              url: "../allsportsdata/nba/nba_2016-04-22.json",
              data:{
                  
              },
              success:function(data){
                  var string = "";
                  for(var k in data){
                      for(var l in data[k]){
                          string += "<tr class='teams' id="+data[k][l].image+"><td>" + data[k][l].team + "</td><td>NBA</td><td>Free Agent</td><td>"+data[k][l].GP+"</td><td>"+data[k][l].wins+"</td><td>"+data[k][l].loses+"</td><td>"+data[k][l].percentage+"</td></tr>";
                      }
                  }
                  $.ajax({
                    type: "GET",
                    url: "../allsportsdata/nhl/nhl_2016-04-22.json",
                    data:{

                    },
                    success:function(data){
                        for(var k in data){
                            for(var l in data[k]){
                                string += "<tr class='teams' id="+data[k][l].image+"><td>" + data[k][l].team + "</td><td>NHL</td><td>Free Agent</td><td>"+data[k][l].GP+"</td><td>"+data[k][l].wins+"</td><td>"+data[k][l].loses+"</td><td>"+data[k][l].percentage+"</td></tr>";
                            }
                        }
                        $.ajax({
                           type: "GET",
                           url: "../allsportsdata/mlb/mlb_2016-04-22.json",
                           data:{
                               
                           },
                           success:function(data){
                                for(var k in data){
                                    for(var l in data[k]){
                                        
                                        string += "<tr class='teams' id="+data[k][l].image+"><td>" + data[k][l].team + "</td><td>MLB</td><td>Free Agent</td><td>"+data[k][l].GP+"</td><td>"+data[k][l].wins+"</td><td>"+data[k][l].loses+"</td><td>"+data[k][l].percentage+"</td></tr>";
                                    }
                                } 
                                $.ajax({
                                   type: "GET",
                                   url: "../allsportsdata/nfl/nfl_2016-04-22.json",
                                   data:{
                                       
                                   },
                                   success: function(data){
                                        for(var k in data){
                                            for(var l in data[k]){
                                                string += "<tr class='teams' id="+data[k][l].image+"><td>" + data[k][l].team + "</td><td>NFL</td><td>Free Agent</td><td>"+data[k][l].GP+"</td><td>"+data[k][l].wins+"</td><td>"+data[k][l].loses+"</td><td>"+data[k][l].percentage+"</td></tr>";
                                            }
                                        }  
                                        $("#table-body").append(string);
                                        $('#myTable').DataTable();
                                   }
                                });

                           }
                        });

                    }
                 });
              }
           });
       }
    });


    $(document.body).on("click", ".teams", function(){
        $("#intro-box").hide();
        $("#main-box").show();

        if($(this)[0].id == ""){
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
        team.image = "../assets/" + $(this)[0].id;
        document.getElementById("selected-logo").src = team.image;
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
        timer();
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


    $(document.body).on("click","#remove-queue", function(){
        $(".queue-list tr:contains('"+team.team+"')").remove();
        $("#main-box").hide();
        $("#intro-box").show();
    });


});