$(document).ready(function(){

	var data = [];

	$.ajax({
		type:"GET",
		url: "../assets/schedules/nba2016.json",
		async: false,
		data:{

		},
		success: function(response){
			var today = new Date();
			var month = switchMonth(today.getMonth()+1);
			var day = today.getDate();
			var year = today.getFullYear();
			var week = switchWeek(today.getDay());
			var date = week + " " + month + " " + day + " " + year;

			//var data = '';
			for(var k in response){
				if(response[k].Date == date){
					data.push(response[k]);
					//data += '<div class="slide"><div>'+response[k].Start+' ET</div><div>'+response[k].Home+'</div><div>'+response[k].Visitor+'</div></div>';
				}
			}
			//$(".grid").append(data);
		
		}
	});

	$.ajax({
		type:"GET",
		url: "../assets/schedules/nhl2016.json",
		async: false,
		data:{

		},
		success: function(response){
			var today = new Date();
			var month = today.getMonth()+1;
			var day = today.getDate();
			var year = today.getFullYear();
			var week = today.getDay();
			var date = month + "/" + day + "/" + year;

			//var data = '';
			for(var k in response){
				if(response[k].Date == date){
					data.push(response[k]);
					//data += '<div class="slide"><div>'+response[k].Date+'</div><div>'+response[k].Home+'</div><div>'+response[k].Visitor+'</div></div>';
				}
			}
			//$(".slider1").append(data);
		
		}
	});


	$.ajax({
	    type: "POST", 
	    url: 'ajax_process.php',
	    async:false,
	    data:{
	    	d: data,
	    	scores: true
	    } ,
	    success:function(response){
	    	$(".slider4").append(response);
	    }
	});

	$('.slider4').bxSlider({
	    slideWidth: 220,
	    minSlides: 2,
	    maxSlides: 5,
	    moveSlides: 1,
	    slideMargin: 10
	});

	$(".bx-pager").hide();





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