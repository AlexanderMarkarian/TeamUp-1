 var interval = setInterval(function(){
    $("#load_screen").hide();
 },5000);

 var ajaxTeams = [];
 
$(document).on("click",".teams",function(){
    var addID = $(this)[0].id;
    //$(this).css('background', '#e74c3c');
    console.log(addID);
    for(var k in ajaxTeams){
      if(addID == ajaxTeams[k].id){
        var s = "<tr id="+ajaxTeams[k].id+"><td>" + ajaxTeams[k].team + "</td><td>"+ajaxTeams[k].sport+"</td><td>Free Agent</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td><td>"+ajaxTeams[k].id+"</td></tr>";
        $("#addbody").html(s);
      }
    }
    $("#addPage").hide();
    $("#myPage").show();
    $.ajax({
        type: "POST",
        url: "../Classes/draft.php",
        data:{
          getRoster: true
        },
        success: function(response){
          var data = $.parseJSON(response);
          var startingString = '';
          for(var k in data){
            for(var l in ajaxTeams){
              if(ajaxTeams[l].id == data[k]){
                startingString += '<tr class="my-team" id='+ajaxTeams[l].id+'><td><img class="roster-img" src="../assets/'+ajaxTeams[l].image+'"> '+ajaxTeams[l].team+'</td>';
                startingString += '<td class="starting">Starting</td><td>'+ajaxTeams[l].sport+'</td><td>'+ajaxTeams[l].GP+'</td><td>'+ajaxTeams[l].wins+'</td>';
                startingString += '<td>'+ajaxTeams[l].loses+'</td><td>'+ajaxTeams[l].percentage+'</td><td>'+ajaxTeams[l].id+'</td></tr>';
              }
            }
          }
          $("#mybody").html(startingString);

          $(".my-team").click(function(){
            $("#myPage").hide();
            $("#completePage").show();
            console.log($(this)[0].id);
            var dropID = $(this)[0].id;
            for(var k in ajaxTeams){
              if(dropID == ajaxTeams[k].id){
                var s = "<tr id="+ajaxTeams[k].id+"><td>" + ajaxTeams[k].team + "</td><td>"+ajaxTeams[k].sport+"</td><td>Free Agent</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td><td>"+ajaxTeams[k].id+"</td></tr>";
                $("#dropbody").html(s);
              }
            }
            for(var k in ajaxTeams){
              if(addID == ajaxTeams[k].id){
                var s = "<tr id="+ajaxTeams[k].id+"><td>" + ajaxTeams[k].team + "</td><td>"+ajaxTeams[k].sport+"</td><td>Free Agent</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td><td>"+ajaxTeams[k].id+"</td></tr>";
                $("#addbody2").html(s);
              }
            }
          });
      }
    });
});

 function setTable(){
    var string = '';
    for(var k in ajaxTeams){
      string += "<tr class='teams' id="+ajaxTeams[k].id+"><td>" + ajaxTeams[k].team + "</td><td>"+ajaxTeams[k].sport+"</td><td>Free Agent</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td></tr>";
    }
    $("#table-body").append(string);
    $('#myTable').DataTable();
 }

 
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
                                        setTable();
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
