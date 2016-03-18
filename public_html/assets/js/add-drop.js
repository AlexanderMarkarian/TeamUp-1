$(document).ready(function(){

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
					string += "<tr class='table-row'><td><i class='fa fa-star-o star-btn'></i>"+data[k].teamName+"<i class='fa fa-plus add-btn'></i><i id="+data[k].teamID+" class='fa fa-calendar add-btn'></i></td>";
					string += "<td>NBA</td><td>Free Agent</td><td>"+total+"</td><td>"+wins+"</td><td>"+loses+"</td><td>"+winPct+"</td></tr>";
				}
			}

			$("#table-body").append(string);
			$('#myTable').DataTable();


			$(".fa-calendar").click(function(){
				var id = this.id;
			});

			$('.table-row').hover(function() {
				$(this).find(".add-btn").css("color","white");

				$(".table-row").mouseout(function(){
					$(this).find(".add-btn").css("color","#e74c3c");
				});	
			});
		} 
	});

	$.ajax({
		type:"GET",
		url: "../assets/schedules/nba2016.json",
		data:{

		},
		success: function(response){
			var today = new Date();
			var month = switchMonth(today.getMonth()+1);
			var day = today.getDate();
			var year = today.getFullYear();
			var week = switchWeek(today.getDay());
			var date = week + " " + month + " " + day + " " + year;

			var data = [];
			for(var k in response){
				if(response[k].Date == date){
					data.push(response[k]);
				}
			}
			console.log(data);
		
		}
	});

	function switchWeek(ww){
		switch(ww){
			case 1:
				return 'Mon';
				break;
			case 2:
				return 'Tue';
				break;
			case 3:
				return 'Wed';
				break;
			case 4:
				return 'Thu';
				break;
			case 5:
				return 'Fri';
				break;
			case 6:
				return 'Sat';
				break;
			case 7:
				return 'Sun';
				break;
		}
	}

	function switchMonth(mm){
		switch(mm) {
		    case 1:
		        return 'Jan';
		        break;
		    case 2:
		        return 'Feb';
		        break;
		    case 3:
		        return 'Mar';
		        break;
		    case 4:
		        return 'Apr';
		        break;
		    case 5:
		        return 'May';
		        break;
		    case 6:
		        return 'Jun';
		        break;
		    case 7:
		        return 'Jul';
		        break;
		    case 8:
		        return 'Aug';
		        break;
		    case 9:
		        return 'Sep';
		        break;
		    case 10:
		        return 'Oct';
		        break;
		    case 11:
		        return 'Nov';
		        break;
		    case 12:
		        return 'Dec';
		        break;
		}
	}




});