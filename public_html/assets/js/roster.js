$(document).ready(function(){
	$("#mainInfo").hide();

/*
	$(".roster-img").hover(function(){
		var source = this.src;
		this.src = "../assets/images/other/bench.png";
		this.id = "hovering";

		$("#hovering").mouseout(function(){
			this.src = source;
			this.id = "";
		});

		$('.roster-img').click(function(){
			
		});
	});
*/	
	$(".teamInfo").click(function(){
		$('#add-name').html($(this).html());
		document.getElementById('add-image').src = $(this).name;
		document.getElementById('overlay').style.visibility = "visible";
		document.getElementById('add-area').style.visibility = "visible";

		$("#close").click(function(){
			document.getElementById('overlay').style.visibility = "hidden";
			document.getElementById('add-area').style.visibility = "hidden";	
			$('#add-name').html("");
			document.getElementById('add-image').src = "";
		});
	});


	$(".roster-img").click(function(){
		document.getElementById('load_screen').style.visibility = "visible";
		var teamID = this.id;
		var name = this.name;
		$.ajax({
			type:"POST",
			url: "scrapers.php",
			data:{
				teamInfo: true,
				id: teamID
			},
			success: function(response){
				var data = $.parseJSON(response);
				//console.log(data);
				var string = "<tr>";
				for(var a in data){
					for(var l in data[a]){
						for(var e in data[a][l]){
							for(var x in data[a][l][e]){
								if(x == "seasonYear")
									$("#season").html(data[a][l][e][x]);
								else if(x == "groupSet" || x == "groupValue"){

								}
								else if(x == "blka"){
									break;
								}
								else{
									//console.log(x + " " + data[a][l][e][x]);
									string += "<td>"+data[a][l][e][x]+"</td>";
								}
							}
						}
						break;
					}
				}
				string += "</tr>";
				$(".heading").html(name);
				$("#info").append(string);

				document.getElementById('load_screen').style.visibility = "hidden";
				$("#main").hide();
				$("#mainInfo").show();

				$(".fa-backward").click(function(){
					$("#info").html("");
					$("#main").show();
					$("#mainInfo").hide();
				});
			}
		});
	});
});