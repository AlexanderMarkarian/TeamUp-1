$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    var ajaxTeams = [];
    
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var y = today.getFullYear();
    var date = y + "/" + mm + "/" + dd;

   
   
    $('.datetimepicker').datetimepicker({
        dayOfWeekStart : 1,
        lang:'en',
        disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
        startDate:  date
    });

    function inputIntoTable(){
        $.ajax({
          type : "POST",
          url: "../Classes/ajax_process.php",
          data:{
            inputIntoTable: true,
            array: JSON.stringify(ajaxTeams)
          },
          success: function(response){
              console.log(response);
          }
        })
    }


    $("#join_league").click(function(){
        var leagueId = $("#j_league_id").val();
        var teamName = $("#j_team_name").val();
        var ssid = $("#join_ssid").val();
        if(leagueId == "" || teamName == ""){
          $("#jleague").html("<div class='alert alert-danger' role='alert' id='errors'> All fields are empty!</div> ");
        }
        else{
          $.ajax({
              type: "POST",
              url: "ajax_process.php",
              data:{
                join_league: true,
                league_id: leagueId,
                team_name: teamName,
                ssid: ssid
              },
              success: function(response){
                if(response == "Error1"){
                  $("#jleague").html("<div class='alert alert-danger' role='alert' id='errors'> League Id does not exist</div> ");
                  $("#j_league_id").val("");
                }
                else if(response == "Error2"){
                    $("#jleague").html("<div class='alert alert-danger' role='alert' id='errors'> There was an error inserting you</div> ");
                    $("#j_league_id").val("");
                    $("#j_team_name").val("");
                }
                else if(response == "Error3"){
                    $("#jleague").html("<div class='alert alert-danger' role='alert' id='errors'> That team name already exists in this league</div> ");
                    $("#j_team_name").val("");
                }
                else if(response == "Error4"){
                    $("#jleague").html("<div class='alert alert-danger' role='alert' id='errors'> User already in this league</div> ");
                    $("#j_team_name").val("");
                    $("#j_league_id").val("");
                }
                else{
                  $("#jleague").html("<div class='alert alert-success' role='alert' id='errors'> You have been successfully added</div> ");
                    $("#j_league_id").val("");
                    $("#j_team_name").val("");
                    window.setTimeout(function () {
                        $("#jleague").hide();
                        window.location.href = 'loader.php?cmd=profile' + "&ssid=" +ssid;
                    }, 2000);
                }
              }
          });
        }
    });


    $(".fa-trash-o").click(function(){
      alert("Sdf");
    });
  
    
/*
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
                          ajaxTeams.push({id: data[k][l].id, team: data[k][l].team, image:data[k][l].image, GP:data[k][l].GP, sport:"NBA", wins:data[k][l].wins, loses:data[k][l].loses, percentage:data[k][l].percentage, owner:"Free Agent"});
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
                                ajaxTeams.push({id: data[k][l].id, team: data[k][l].team, image:data[k][l].image, GP:data[k][l].GP, sport:"NHL", wins:data[k][l].wins, loses:data[k][l].loses, percentage:data[k][l].percentage, owner:"Free Agent"});
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
                                        ajaxTeams.push({id: data[k][l].id, team: data[k][l].team, image:data[k][l].image, GP:data[k][l].GP, sport:"MLB", wins:data[k][l].wins, loses:data[k][l].loses, percentage:data[k][l].percentage, owner:"Free Agent"});
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
                                                ajaxTeams.push({id: data[k][l].id, team: data[k][l].team, image:data[k][l].image, GP:data[k][l].GP, sport:"NFL", wins:data[k][l].wins, loses:data[k][l].loses, percentage:data[k][l].percentage, owner:"Free Agent"});
                                            }
                                        }  
                                        inputIntoTable();
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
  */
});   
