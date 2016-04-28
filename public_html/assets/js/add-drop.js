$(document).ready(function(){
     var addID = [], dropID = [];
     var addCount = 0, dropCount = 0;
    $('#myTable').DataTable(); 
    
    $(".teams").click(function(){
        addID[addCount] = $(this)[0].id;
        addCount++;
        $(this).css("background","#e74c3c");
    });
    
    $(".my-team").click(function(){
       dropID[dropCount] = $(this)[0].id;
       dropCount++;
       $(this).css("background", "#e74c3c");
    });
    
    $("#completeAdd").click(function(){
        if(addID.length != dropID.length){
            $(".alert-danger").show();
            $(".alert-danger").html("Teams you are adding needs to be the same as teams you are dropping");
        }
        else if(addID.length == 0 && dropID.length == 0){
            $(".alert-danger").show();
            $(".alert-danger").html("No teams have been chosen");
        }
        
    });
 });

/*

$("#completeAdd").click(function(){
    console.log(addID + " " + dropID);
    $.ajax({
      type: "POST",
      url: "../Classes/ajax_process.php",
      data:{
        addDrop: true,
        addID: addID,
        dropID: dropID
      },
      success:function(response){
        if(response == 2){
          location.reload();
        }
      }
    });

});

*/

 
