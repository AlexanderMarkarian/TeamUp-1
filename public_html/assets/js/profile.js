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
