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
                    string += "<tr><td>"+data[k].teamName+"</td><td>Free Agent</td>";
                    string += "<td>"+total+"</td><td>"+wins+"</td><td>"+loses+"</td><td>"+winPct+"</td><td><i id="+data[k].teamID+" class='fa fa-plus'></i></td></tr>";
                }
            }

            $("#table-body").append(string);
            $('#myTable').DataTable();
        }
    });

    $(document.body).on("click", ".fa-plus", function(){
        var id = this.id;
        
        $.ajax({
            type: "GET",
            url: "../backup_basketball_data/2016-03-06.json",
            data:{
            },
            success:function(data){
                for(var k in data){
                    if(data[k].teamID == id){
                       $("#selected-team").html(data[k].teamName);
                        var wins = parseInt(data[k].w);
                        var loses = parseInt(data[k].l);
                        var total = wins + loses;
                        var winPct = (wins / total).toFixed(2);
                        $("#gp").html(total);
                        $("#w").html(wins);
                        $("#l").html(loses);
                        $("#pct").html(winPct);

                        //$(".selected-logo").html("<img src='<?= ABSOLUTH_PATH_IMAGES ?>nba/lakers.jpg'  id='selected-logo'>");
                    }
                }
            }
        });
    });

    $(document.body).on("click", "#add-queue", function(){
        var team = $("#selected-team").text();
        var string = '<div class="queue-item">'+team+' <span class="queue-league"><i class="fa fa-times"></i></span></div>';
        $(".queue-list").append(string);
    });

    $(document.body).on("click", ".fa-times", function(){

    });

    $(document.body).on("click","#draft-team", function(){

    });


});