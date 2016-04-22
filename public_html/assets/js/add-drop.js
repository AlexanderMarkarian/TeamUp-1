 var interval = setInterval(function(){
    $("#load_screen").hide();
 },5000);
 
 
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
