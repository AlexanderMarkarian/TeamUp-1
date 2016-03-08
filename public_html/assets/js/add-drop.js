$(document).ready(function(){
	
	/*
	$(".resize").hover(function(){
		var source = this.src;
		this.src = "../assets/images/other/add.png";
		this.id = "hovering";

		$("#hovering").mouseout(function(){
			this.src = source;
			this.id = "";
		});

		$('.resize').click(function(){
			console.log(this.alt);
			$('#add-name').html(this.alt);
			document.getElementById('add-image').src = source;
			document.getElementById('overlay').style.visibility = "visible";
			document.getElementById('add-area').style.visibility = "visible";

			$("#close").click(function(){
				document.getElementById('overlay').style.visibility = "hidden";
				document.getElementById('add-area').style.visibility = "hidden";	
				$('#add-name').html("");
				document.getElementById('add-image').src = "";
			});

		});
	});
	*/

	$.ajax({
		type: "GET",
		url: "../backup_basketball_data/2016-03-06.json",
		data:{

		},
		success:function(data){
			var string = "";
			for(var k in data){
				if(data[k].teamName != "d"){
					var wins = parseInt(data[k].w);
					var loses = parseInt(data[k].l);
					var total = wins + loses;
					var winPct = (wins / total).toFixed(2);
					string += "<tr><td><i class='fa fa-star-o star-btn'></i>"+data[k].teamName+"<i class='fa fa-plus add-btn'></i><i class='fa fa-calendar add-btn'></i></td>";
					string += "<td>NBA</td><td>Free Agent</td><td>"+total+"</td><td>"+wins+"</td><td>"+loses+"</td><td>"+winPct+"</td>";
				}
			}

			$("#table-body").append(string);
			$('#myTable').DataTable();
		} 
	});




});