$(document).ready(function(){
	var ajaxTeams = [], addID = 0, dropID = 0;
	$("#my-team").hide();
	$("#hand-shake").hide();

	$(".opp-teams").click(function(){
		var opp_image = $(this).find(".ros")[0].firstChild.src;
		var opp_team = $(this).find(".ros").text();

		var opp_owner;

		$("#myTab li").each(function(idx, li) {
		    if(li.className == "active"){
		    	opp_owner = $(li).text();
		    }
		});

		$("#other-team").hide();
		$("#my-team").show();

		$(".to-right").click(function(){
			$("#other-team").show();
			$("#my-team").hide();
		});


		$(".my-teams").click(function(){
			var my_image = $(this).find(".ros")[0].firstChild.src;
			var my_team = $(this).find(".ros").text();

			$("#my-team").hide();
			$("#hand-shake").show();

			$("#opp_team_name").text(opp_team);
			document.getElementById('opp_team_logo').src = opp_image;

			$("#my_team_name").text(my_team);
			document.getElementById('my_team_logo').src = my_image;

			$("#opp_owner").text(opp_owner);
		});
	});

	 $.ajax({
	    type: "POST",
	    url: "../Classes/draft.php",
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
	 })

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

	function getTeams(){
		$.ajax({
			type: "POST",
			url: "../Classes/draft.php",
			data:{
				getTeams: true
			},
			success: function(response){
				var data = $.parseJSON(response);
				var teamNames = [];
				for(var k in data){
					if(teamNames.indexOf(data[k]) == -1){
						teamNames.push(data[k]);
					}
				}
				var string = '';
				for(var k in teamNames){
					string += '<li><a href="#">'+teamNames[k]+'</a></li>';
				}
				$("#teamlist").html(string);
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
				/*

				var teamNames = [];
				for(var k in data){
					if(teamNames.indexOf(data[k]) == -1){
						teamNames.push(data[k]);
					}
				}
				var teamNameString = '';
				var teamTeamsString = '';
				for(var k=0; k<teamNames.length; k++){
					if(k == 0)
						teamNameString += '<li class="active"><a data-toggle="tab" href="#section'+k+'">'+teamNames[k]+'</a></li>';
					else
						teamNameString += '<li><a data-toggle="tab" href="#section'+k+'">'+teamNames[k]+'</a></li>';
					for(var l in data){
						if(data[l] == teamNames[k]){
							teamTeamsString += '<div id="section'+k+'" class="tab-pane fade in active">';
							teamTeamsString += '<table class="table"><tr><th>Teams</th><th>Sport</th><th>GP</th><th>Wins</th><th>Loses</th><th>Percentage</th></tr>';
							for(var m in ajaxTeams){
								if(ajaxTeams[m].id == l){
					                if(ajaxTeams[m].image.substring(0,1) == " "){
					                  ajaxTeams[m].image = ajaxTeams[m].image.substring(1,ajaxTeams[m ].image.length);
					                }
									teamTeamsString += '<tr class="opp-teams"><td class="ros"><img class="roster-img" src=../assets/'+ajaxTeams[m].image+'> '+ajaxTeams[m].team+'</td>';
									teamTeamsString += '<td>'+ajaxTeams[m].sport+'</td><td>'+ajaxTeams[m].GP+'</td><td>'+ajaxTeams[m].wins+'</td><td>'+ajaxTeams[m].loses+'</td><td>'+ajaxTeams[m].percentage+'</td></tr></table></div>';
								}
							}
						}
					}
				}
				//$("#myTab").html(teamNameString);
				//$("#tradeTeams").html(teamTeamsString);
				*/
			}
		});
	}
});