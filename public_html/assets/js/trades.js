$(document).ready(function(){
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
});