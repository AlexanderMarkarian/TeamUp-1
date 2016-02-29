$(document).ready(function(){

	/*
	$("#complete-button").hide();

	var roster_select = document.getElementById('roster-select');
	roster_select.onchange = function(event){
		var selected = $('#roster-select :selected').text();
		$("#drop-name").html(selected);
		$("#drop-prompt").html("Select a different team");
		document.getElementById('drop-image').src = "../assets/images/nfl/seahawks.jpg";
		$("#trade-image").hide();
		$("#complete-button").show();
	}

	$('.resize').click(function(){
		$("#add-drop").show();
		$('#add-name').html(this.alt);
		document.getElementById('add-image').src = this.src;
	});
*/

	$(".resize").hover(function(){
		var source = this.src;
		this.src = "../assets/images/other/add.png";
		this.id = "hovering";

		$("#hovering").mouseout(function(){
			this.src = source;
			this.id = "";
		});
	});

});