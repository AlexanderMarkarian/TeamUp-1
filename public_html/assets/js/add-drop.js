$(document).ready(function(){
     var addID = [], dropID = [];
     var addCount = 0, dropCount = 0;
    $('#myTable').DataTable(); 
    
    $(document).on("click", ".teams", function(){
        if($.inArray($(this)[0].id, addID) > -1){
            var index = $.inArray($(this)[0].id, addID);
            addID.splice(index, 1);
            addCount--;
            $(this).css("background", "#f2f2f2");
        }
        else{
            addID[addCount] = $(this)[0].id;
            addCount++;
            $(this).css("background","#e74c3c");
        }
    });
    
    $(".my-team").click(function(){
        if($.inArray($(this)[0].id, dropID) > -1){
            var index = $.inArray($(this)[0].id, dropID);
            dropID.splice(index, 1);
            dropCount--;
            $(this).css("background", "#f2f2f2");
        }
        else{
            dropID[dropCount] = $(this)[0].id;
            dropCount++;
            $(this).css("background", "#e74c3c");
        }

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
        else{
            var ssid = $("#ssid").val();
            var leagueid = $("#leagueid").val();
            $.ajax({
                type: "POST",
                url: "../Classes/ajax_process.php",
                data:{
                    adddrop: true,
                    addTeams: JSON.stringify(addID),
                    dropTeams: JSON.stringify(dropID),
                    ssid: ssid,
                    leagueid: leagueid
                },
                success: function(response){
                    console.log(response);
                    if(response == "Error1"){
                        
                    }
                    else if(response == "Error2"){
                        $(".alert-danger").show();
                        $(".alert-danger").html("Please wait for the draft to finish");
                    }
                    else if(response == "Success"){
                        $(".alert-danger").hide();
                        $(".alert-success").show();
                        $(".alert-success").html("Teams have been successfully swapped");
                        window.setTimeout(function () {
                            window.location.href = 'loader.php?cmd=add-drop' + "&ssid=" + ssid + "&leagueid=" + leagueid;
                        }, 1000);
                    }

                }
            });
        }
        
    });
 });

