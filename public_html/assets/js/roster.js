$(document).ready(function(){
	var ajaxTeams = [];
     
	include();

        // get data from team stats table and put into ajaxteams
	function include(){
            $.ajax({
               type: "POST",
               url: "../Classes/draft.php",
               data:{
                 getData: true
               },
               success:function(response){
                 var data = $.parseJSON(response);
                 for(var k in data){
                   ajaxTeams.push({id: data[k][0], team: data[k][1], sport: data[k][3], image: data[k][2], GP: data[k][4], wins: data[k][5], loses: data[k][6], percentage: data[k][7]});
                 }
                 start();
               }
            });
	}

        // get your user roster
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
                                                    if(ajaxTeams[l].image.substring(0,1) == " "){
                                                            ajaxTeams[l].image = ajaxTeams[l].image.substring(1,ajaxTeams[l].image.length);
                                                    }
                                                    if(k == 4 || k == 5){
                                                            startingString += '<tr id='+ajaxTeams[l].id+'><td><img class="roster-img" src="../assets/'+ajaxTeams[l].image+'"> '+ajaxTeams[l].team+'</td>';
                                                            startingString += '<td class="starting">Bench</td><td>'+ajaxTeams[l].sport+'</td><td>'+ajaxTeams[l].GP+'</td><td>'+ajaxTeams[l].wins+'</td>';
                                                            startingString += '<td>'+ajaxTeams[l].loses+'</td><td>'+ajaxTeams[l].percentage+'</td><td>'+ajaxTeams[l].id+'</td></tr>';
                                                    }
                                                    else{
                                                            startingString += '<tr id='+ajaxTeams[l].id+'><td><img class="roster-img" src="../assets/'+ajaxTeams[l].image+'"> '+ajaxTeams[l].team+'</td>';
                                                            startingString += '<td class="starting">Starting</td><td>'+ajaxTeams[l].sport+'</td><td>'+ajaxTeams[l].GP+'</td><td>'+ajaxTeams[l].wins+'</td>';
                                                            startingString += '<td>'+ajaxTeams[l].loses+'</td><td>'+ajaxTeams[l].percentage+'</td><td>'+ajaxTeams[l].id+'</td></tr>';
                                                    }
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
                                        console.log($(this)[0].id);
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
});