$(document).ready(function(){
    
    // get league name
    $.ajax({
        type: "POST",
        url: "../Classes/ajax_process.php",
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
       url: "../Classes/ajax_process.php",
       data:{
           getStandings: true
       },
       success:function(response){
           var data = $.parseJSON(response);
           var string = '';
           var count = 1;
           var array = [];
           for(var k in data){
               array.push(data[k]);
           }
           array.sort((function(a,b){
               return a[1] < b[1];
           }));
           for(var k in array){
                string += '<tr id="stand"><td>'+count+'</td><td class="teamleft"><img src="../assets/images/teamlogos/11.png" id="teamlogo" height="33" width="33">'+array[k][0]+'</td><td>'+array[k][1]+'</td><td>'+array[k][2]+'</td><td>'+array[k][3]+'</td><td>'+array[k][4]+'</td><td>'+array[k][5]+'</td></tr>';
                count++;
           }
           $("#homebody").html(string);
       }
    });
});
