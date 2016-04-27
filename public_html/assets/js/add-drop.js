 var ajaxTeams = [], addID = 0, dropID = 0;

 $.ajax({
    type: "POST",
    url: "../Classes/draft.php",
    data:{
      getData: true
    },
    success:function(response){
      var data = $.parseJSON(response);
      for(var k in data){
        ajaxTeams.push({id: data[k][0], owner: "Free Agent", team: data[k][1], sport: data[k][3], image: data[k][2], GP: data[k][4], wins: data[k][5], loses: data[k][6], percentage: data[k][7]});
      }
      setTable();
      $('#myTable').DataTable();
    }
 })
 
$(document).on("click",".teams",function(){
    addID = $(this)[0].id;
    for(var k in ajaxTeams){
      if(addID == ajaxTeams[k].id){
        var s = "<tr id="+ajaxTeams[k].id+"><td>" + ajaxTeams[k].team + "</td><td>"+ajaxTeams[k].owner+"</td><td>"+ajaxTeams[k].sport+"</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td><td>"+ajaxTeams[k].id+"</td></tr>";
        $("#addbody").html(s);
      }
    }
    $("#addingTeam").hide();
    $("#addedTeam").show();
    checkDisable();
});

$("#closeAdd").click(function(){
    $("#addingTeam").show();
    $("#addedTeam").hide();
    addID = 0;
    document.getElementById("completeAdd").disabled = true;
});

$("#closeDrop").click(function(){
    $("#droppingTeam").show();
    $("#droppedTeam").hide();
    dropID = 0;
    document.getElementById("completeAdd").disabled = true;
});

function checkDisable(){
  if(addID != 0 && dropID != 0){
    document.getElementById("completeAdd").disabled = false;
  }
}

$("#completeAdd").click(function(){
    console.log(addID + " " + dropID);
    $.ajax({
      type: "POST",
      url: "../Classes/draft.php",
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

$(document).on("click",".my-team", function(){
    dropID = $(this)[0].id;
    for(var k in ajaxTeams){
      if(dropID == ajaxTeams[k].id){
        var s = "<tr id="+ajaxTeams[k].id+"><td>" + ajaxTeams[k].team + "</td><td>"+ajaxTeams[k].sport+"</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td><td>"+ajaxTeams[k].id+"</td></tr>";
        $("#dropbody").html(s);
      }
    }
    $("#droppingTeam").hide();
    $("#droppedTeam").show();
    checkDisable();
});

 function setTable(){
    var string = '';
    for(var k in ajaxTeams){
      string += "<tr class='teams' id="+ajaxTeams[k].id+"><td>" + ajaxTeams[k].team + "</td><td>"+ajaxTeams[k].owner+"</td><td>"+ajaxTeams[k].sport+"</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td></tr>";
    }
    $("#table-body").append(string);

    $.ajax({
        type: "POST",
        url: "../Classes/draft.php",
        data:{
          getRoster: true
        },
        success: function(response){
          var data = $.parseJSON(response);
          var startingString = '';
          for(var k in data){
            for(var l in ajaxTeams){
              if(ajaxTeams[l].id == data[k]){
                if(ajaxTeams[l].image.substring(0,1) == " "){
                  ajaxTeams[l].image = ajaxTeams[l].image.substring(1,ajaxTeams[l].image.length);
                }
                startingString += '<tr class="my-team" id='+ajaxTeams[l].id+'><td><img class="roster-img" src="../assets/'+ajaxTeams[l].image+'"> '+ajaxTeams[l].team+'</td>';
                startingString += '<td>'+ajaxTeams[l].sport+'</td><td>'+ajaxTeams[l].GP+'</td><td>'+ajaxTeams[l].wins+'</td>';
                startingString += '<td>'+ajaxTeams[l].loses+'</td><td>'+ajaxTeams[l].percentage+'</td><td>'+ajaxTeams[l].id+'</td></tr>';
              }
            }
          }
          $("#droppingbody").html(startingString);
      }
    });
 }

 
