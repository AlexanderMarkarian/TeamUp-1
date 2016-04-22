$(document).ready(function(){
$.ajax({
        type: "GET",
        url: "../allsportsdata/allsportsdata.php",
        data:{
        },
        success:function(data){
            $.ajax({
                type: "GET",
                url: "../allsportsdata/nba/nba_2016-04-08.json",
                data:{},
                success: function(response){
                    console.log(response);
                    var nba = $.parseJSON(response);
                    console.log(nba);
                }

            });
            
            var string = "";
            for(var k in data){
                if(data[k].teamName != "d"){
                    var wins = parseInt(data[k].w);
                    var loses = parseInt(data[k].l);
                    var total = wins + loses;
                    var winPct = (wins / total).toFixed(2);
                    string += "<tr class='teams'><td>"+data[k].teamName+"</td><td>NBA</td><td>Free Agent</td>";
                    string += "<td>"+total+"</td><td>"+wins+"</td><td>"+loses+"</td><td>"+winPct+"</td></tr>";
                }
            }

            $("#table-body").append(string);
            $('#myTable').DataTable();
            
        }
    });
    
/*
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
					string += "<tr><td><i class='fa fa-star-o star-btn'></i>"+data[k].teamName+"<i class='fa fa-plus add-btn'></i><i id="+data[k].teamID+" class='fa fa-calendar add-btn'></i></td>";
					string += "<td>NBA</td><td>Free Agent</td><td>"+total+"</td><td>"+wins+"</td><td>"+loses+"</td><td>"+winPct+"</td></tr>";
				}
			}

			$("#table-body").append(string);
			$('#myTable').DataTable();


			$(".fa-calendar").click(function(){
				var id = this.id;
			});

			$('#table-body tr').hover(function() {
				$(this).find(".add-btn").css("color","white");

				$("#table-body tr").mouseout(function(){
					$(this).find(".add-btn").css("color","#e74c3c");
				});	
			});
		} 
	});
        */
});