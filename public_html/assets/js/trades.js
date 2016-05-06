$(document).ready(function(){
   $(".tradelist").click(function(){
        var teamID = $(this)[0].id;
        var teamName = $(this)[0].innerHTML;
        $(".btn-default").html(teamName + '  <span class="caret"></span>');
        $("#selectTable").show();
   });
});

/*
$(document).ready(function(){
	var ajaxTeams = [], addID = 0, dropID = 0;
        

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
       
});
*/