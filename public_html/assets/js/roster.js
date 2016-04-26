$(document).ready(function(){
	var ajaxTeams = [];
	setInterval(function(){
        $("#load_screen").hide();
    },4000);
     
	include();

	function start(){
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
							startingString += '<tr><td><img class="roster-img" src="../assets/'+ajaxTeams[l].image+'"> '+ajaxTeams[l].team+'</td>';
							startingString += '<td class="starting">Starting</td><td>'+ajaxTeams[l].sport+'</td><td>'+ajaxTeams[l].GP+'</td><td>'+ajaxTeams[l].wins+'</td>';
							startingString += '<td>'+ajaxTeams[l].loses+'</td><td>'+ajaxTeams[l].percentage+'</td><td>'+ajaxTeams[l].id+'</td></tr>';
						}
					}
				}
				$("#drag-area").html(startingString);
				$(".table").tableDnD({
			        onDragStart: function(table,row){
			            $(row).css("border","solid 3px #e74c3c");
			        },
			        onDrop: function(table,row){
			            $('#drag-area tr').each(function (i, row) {
			                if(i == 0 || i == 1 || i == 2 || i == 3){
			                    $(this).find('.starting').text("Starting");
			                }
			                else{
			                    $(this).find('.starting').text("Bench");
			                }               
			            });

			            $(row).css("border","none");
			        }
			    });
			}
		});
	}

	




	function include(){

		$.ajax({
	    	type: "POST",
	       	url: "../allsportsdata/allsportsdata.php",
	       	data:{},
	       	success: function(response){                                           
	        	$.ajax({
	            	type: "GET",
	              	url: "../allsportsdata/nba/nba_2016-04-22.json",
	              	data:{},
	              	success:function(data){
	                  	for(var k in data){
	                      	for(var l in data[k]){
	                         	ajaxTeams.push({id: data[k][l].id, team: data[k][l].team, image:data[k][l].image, GP:data[k][l].GP, sport:"NBA", wins:data[k][l].wins, loses:data[k][l].loses, percentage:data[k][l].percentage, owner:"Free Agent"});
	                      	}
	                  	}
	                  	$.ajax({
	                    	type: "GET",
	                    	url: "../allsportsdata/nhl/nhl_2016-04-22.json",
	                    	data:{},
	                    	success:function(data){
	                        	for(var k in data){
	                          		for(var l in data[k]){
	                            		ajaxTeams.push({id: data[k][l].id, team: data[k][l].team, image:data[k][l].image, GP:data[k][l].GP, sport:"NHL", wins:data[k][l].wins, loses:data[k][l].loses, percentage:data[k][l].percentage, owner:"Free Agent"});
	                          		}
	                        	}
	                        	$.ajax({
	                           		type: "GET",
	                           		url: "../allsportsdata/mlb/mlb_2016-04-22.json",
	                           		data:{},
	                           		success:function(data){
	                                	for(var k in data){
	                                  		for(var l in data[k]){
	                                    		ajaxTeams.push({id: data[k][l].id, team: data[k][l].team, image:data[k][l].image, GP:data[k][l].GP, sport:"MLB", wins:data[k][l].wins, loses:data[k][l].loses, percentage:data[k][l].percentage, owner:"Free Agent"});
	                                  		}
	                                	} 
	                                	$.ajax({
	                                   		type: "GET",
	                                   		url: "../allsportsdata/nfl/nfl_2016-04-22.json",
	                                   		data:{},
	                                   		success: function(data){
	                                        	for(var k in data){
	                                          		for(var l in data[k]){
	                                            		ajaxTeams.push({id: data[k][l].id, team: data[k][l].team, image:data[k][l].image, GP:data[k][l].GP, sport:"NFL", wins:data[k][l].wins, loses:data[k][l].loses, percentage:data[k][l].percentage, owner:"Free Agent"});
	                                          		}
	                                        	}  
	                                        	start();
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
	}
});