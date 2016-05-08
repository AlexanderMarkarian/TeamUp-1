$(document).ready(function(){
    var ssid = $("#ssid").val();
    var leagueid = $("#leagueid").val();
    var oppteamid = $("#oppteamid").val();
    
    var addID = 0, dropID = 0;
    
    
   $(".tradelist").click(function(){
        var teamID = $(this)[0].id;
        var teamName = $(this)[0].innerHTML;
        $(".btn-default").html(teamName + '  <span class="caret"></span>');
        $("#selectTable").show();
        
        window.location.href = 'loader.php?cmd=trades' + "&ssid=" + ssid + "&leagueid=" + leagueid + "&oppteamid=" + teamID;
   });
   
   $(".my-team").click(function(){
          dropID = $(this)[0].id;
          console.log(dropID);
          $("#tradebody tr").css({
            'background': '#f2f2f2' 
         });
          $(this).css("background", "#e74c3c");
   });
   
   $(".other-team").click(function(){
      addID = $(this)[0].id;
      $("#addBody tr").css({
         'background': '#f2f2f2' 
      });
      $(this).css("background", "#e74c3c");
   });
   
   $("#completeTrade").click(function(){
       if(addID == 0 || dropID == 0){
           $(".error").html('<span class="alert alert-danger">Error!</span>');
       }
       else{           
           $.ajax({
              type: "POST",
              url: "../Classes/ajax_process.php",
              data:{
                  completeTrade: true,
                  ssid: ssid,
                  leagueid: leagueid,
                  oppteamid: oppteamid,
                  dropTeamID: dropID,
                  addTeamID: addID
              },
              success: function(response){
                  if(response == 1){
                    $(".error").html('<span class="alert alert-success">Trade Offer Sent!</span>');
                    window.setTimeout(function () {
                        window.location.href = 'loader.php?cmd=trades' + "&ssid=" + ssid + "&leagueid=" + leagueid;
                    }, 1000);
                  }
                  else{
                      $(".error").html('<span class="alert alert-danger">There was an error processing your trade request</span>');
                  }
              }
           });
       }
   });
});
