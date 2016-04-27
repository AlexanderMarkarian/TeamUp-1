$(document).ready(function(){
    
    // get league name
    $.ajax({
        type: "POST",
        url: "../Classes/draft.php",
        data:{
            getLeagueName: true
        },
        success:function(response){
            $("#leagueName").html(response);
        }
    });
    
    // get standings
    $.ajax({
       type: "POST",
       url: "../Classes/draft.php",
       data:{
           getStandings: true
       },
       success:function(response){
           var data = $.parseJSON(response);
           var string = '';
           var count = 1;
           for(var k in data){
                string += '<tr id="stand"><td>'+count+'</td><td class="teamleft"><img src="../assets/images/teamlogos/11.png" id="teamlogo" height="33" width="33">'+k+'</td><td>'+data[k][0]+'</td><td>'+data[k][1]+'</td><td>'+data[k][2]+'</td><td>'+data[k][3]+'</td><td>'+data[k][4]+'</td></tr>';
                count++;
           }
           $("#homebody").html(string);
       }
    });
});
