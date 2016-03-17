$(document).ready(function(){

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


			$(".fa-calendar").click(function(){
				var id = this.id;
			});
		} 
	});
*/
});