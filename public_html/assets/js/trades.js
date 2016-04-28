$(document).ready(function(){
	var ajaxTeams = [], addID = 0, dropID = 0;
        
        // GET DATA FOR ALL TEAMS
	 $.ajax({
	    type: "POST",
	    url: "../Classes/ajax_process.php",
	    data:{
	      getData: true
	    },
	    success:function(response){
	      var data = $.parseJSON(response);
	      for(var k in data){
	        ajaxTeams.push({id: data[k][0], owner: "Free Agent", team: data[k][1], sport: data[k][3], image: data[k][2], GP: data[k][4], wins: data[k][5], loses: data[k][6], percentage: data[k][7]});
	      }
	      getTeams();
	    }
	 });

         // GET CLICK OF ONE OF YOUR ROSTER TEAMS
	$(document).on("click",".my-team", function(){
	    dropID = $(this)[0].id;
	    for(var k in ajaxTeams){
	      if(dropID == ajaxTeams[k].id){
	        var s = "<tr id="+ajaxTeams[k].id+"><td>" + ajaxTeams[k].team + "</td><td>"+ajaxTeams[k].sport+"</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td><td>"+ajaxTeams[k].id+"</td></tr>";
	        $("#dropbody").html(s);
	      }
	    }
	    $("#tradingTeam").hide();
	    $("#droppedTeam").show();
	    checkDisable();
	});

	$("#closeDrop").click(function(){
	    $("#tradingTeam").show();
	    $("#droppedTeam").hide();
	    dropID = 0;
	    //document.getElementById("completeAdd").disabled = true;
	});

	function checkDisable(){
	  if(addID != 0 && dropID != 0){
	   // document.getElementById("completeAdd").disabled = false;
	  }
	}
        
        // ON CLICK OF DROPDOWN
        $(document).on("click", ".tradelist", function(){
           var teamID = $(this)[0].id;
           var teamName = $(this)[0].innerHTML;
           // GET TEAM MEMBERS OF USER
           $.ajax({
              type: "POST",
              url: "../Classes/ajax_process.php",
              data:{
                  teamID: teamID,
                  getTeamMembers: true
              },
              success: function(response){
                  var data = $.parseJSON(response);
                  var string = '';
                  for(var k in data){
                      for(var m in ajaxTeams){
                          if(data[k] == ajaxTeams[m].id){
                              string += '<tr><td>'+ajaxTeams[m].team+'</td><td>'+ajaxTeams[m].sport+'</td><td>'+ajaxTeams[m].GP+'</td><td>'+ajaxTeams[m].wins+'</td><td>'+ajaxTeams[m].loses+'</td><td>'+ajaxTeams[m].percentage+'</td><td>'+ajaxTeams[m].id+'</td></tr>';
                          }
                      }
                  }
                  $("#selectTable").show();
                  $(".btn-default").html(teamName + '  <span class="caret"></span>');
                  $("#addbody").html(string);
              }
           });
        });

	function getTeams(){
            $.ajax({
                type: "POST",
                url: "../Classes/ajax_process.php",
                data:{
                    getTeamsID: true
                },
                success: function(response){
                    var data = $.parseJSON(response);
                    var string = '';
                    // GET LIST OF TEAM NAMES FOR SELECT DROPDOWN
                    for(var k in data){
                        string += '<li><a href="#" class="tradelist" id='+k+'>'+data[k]+'</a></li>'
                    }
                    $("#teamlist").html(string);
                    
                    // GET MY CURRENT ROSTER
                    $.ajax({
                        type: "POST",
                        url: "../Classes/ajax_process.php",
                        data:{
                          getRoster: true
                        },
                        success: function(response){
                          var data = $.parseJSON(response);
                          var startingString = '';
                          for(var k in data){
                            for(var l in ajaxTeams){
                              if(ajaxTeams[l].id == data[k]){
                                if(ajaxTeams[l].image.substring(0,1) == " "){
                                  ajaxTeams[l].image = ajaxTeams[l].image.substring(1,ajaxTeams[l].image.length);
                                }
                                startingString += '<tr class="my-team" id='+ajaxTeams[l].id+'><td><img class="roster-img" src="../assets/'+ajaxTeams[l].image+'"> '+ajaxTeams[l].team+'</td>';
                                startingString += '<td>'+ajaxTeams[l].sport+'</td><td>'+ajaxTeams[l].GP+'</td><td>'+ajaxTeams[l].wins+'</td>';
                                startingString += '<td>'+ajaxTeams[l].loses+'</td><td>'+ajaxTeams[l].percentage+'</td><td>'+ajaxTeams[l].id+'</td></tr>';
                              }
                            }
                          }
                          $("#tradebody").html(startingString);
                        }
                    });
                }
            });
	}
});