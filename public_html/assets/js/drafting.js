$(document).ready(function(){

    var ajaxTeams = [];
    $("#main-box").hide();
         
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
        getTakenTeams();
      }
   });
   
   function getTakenTeams(){
       $.ajax({
           type: "POST",
           url: "../Classes/draft.php",
           data:{
               getTakenTeams: true
           },
           success:function(response){
               var data = $.parseJSON(response);
               console.log(data);
               var string = '';
               for(var m in data){
                   for(var k in ajaxTeams){
                       if(ajaxTeams[k].id == data[m]){
                           string += '<tr class="teams"><td>'+ajaxTeams[k].team+'</td></tr>';
                       }
                   }
               }
               $(".queue-list").html(string);
           }
       })
   }

    
    function setPick(){
        var team = $("#1").text();
        $.ajax({
            type:"POST",
            url:"../Classes/draft.php",
            data:{
                team:team,
                setPick:true
            },
            success:function(response){
                //whoIsNext();
            }
        })
    }
    
    $.ajax({
        type: "POST",
        url: "../Classes/draft.php",
        data:{
            draftOrder: true
        },
        success: function(response){
           var data = $.parseJSON(response);
           var order = [];
           var oddString = '', evenString = '';
           for(var k in data){
               order.push(data[k]);
               oddString += '<tr class="round-item"><td><span class="round-name" id='+k+'>'+data[k]+'</span></td></tr>';
           }
           for(var i=order.length-1; i>=0; i--){
               evenString += '<tr class="round-item"><td><span class="round-name">'+order[i]+'</span></td></tr>';
           }
           $(".odd_round").append(oddString);
           $(".even_round").append(evenString);
           $(".clock-team").text(order[0]);
            //$(".clock-team").attr("id",response);
        }
    });
    
    function getFlag(){
        $.ajax({
           type: "POST",
           url: "../Classes/draft.php",
           data:{
               getFlag:true
           },
           success: function(response){
               console.log(response);
           }
        });
    }

    var team = {};
    var interval;
    
    var date = new Date();
    var month = date.getMonth();
    var nMonth = date.getMonth()+1;
    var day = date.getDate();
    var year = date.getFullYear();
    var nday = day+1;
   

    $(document.body).on("click", ".teams", function(){
        $("#intro-box").hide();
        $("#main-box").show();

        team.team = $(this)[0].cells[0].innerHTML;
        team.league = $(this)[0].cells[1].innerHTML;
        team.GP = $(this)[0].cells[3].innerHTML;
        team.wins = $(this)[0].cells[4].innerHTML;
        team.loses = $(this)[0].cells[5].innerHTML;
        team.pct = $(this)[0].cells[6].innerHTML;
        team.image = "../assets/" + $(this)[0].id;
        document.getElementById("selected-logo").src = team.image;
        $("#selected-team").html(team.team);
        $("#selected-league").html(team.league);
        $("#gp").html(team.GP);
        $("#w").html(team.wins);
        $("#l").html(team.loses);                
        $("#pct").html(team.pct);

    });

    $(document.body).on("click","#draft-team", function(){
        var team = $("#selected-team").text();
        for(var k in ajaxTeams){
          if(ajaxTeams[k].team == team){
            teamID = ajaxTeams[k].id;
          }
        }
        /*
        $.ajax({
            type: "POST",
            url: "../Classes/draft.php",
            data:{
                draftTeam: true,
                teamID : teamID
            },
            success:function(response){
                console.log(response);
            }
        });
        */
        var teamID;
        /*

        $.ajax({
          type: "POST",
          url: "../Classes/draft.php",
          data: {
            user: user,
            team: teamID,
            inputTeams: true
          },
          success: function(response){
            setTable();
          }
        });
        */
    });
    
    function timer(){
      clearInterval(interval);
        var twoMinutes = 60 * 2,
            display = $('.time');
        startTimer(twoMinutes, display);


        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            interval = setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.text(minutes + ":" + seconds);
                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);

        }  
    }

  function setTable(){
          var string = '';
          for(var k in ajaxTeams){
              string += "<tr class='teams' id="+ajaxTeams[k].image+"><td>"+ajaxTeams[k].team+"</td><td>"+ajaxTeams[k].sport+"</td><td>"+ajaxTeams[k].owner+"</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td></tr>";    
          }
          $("#table-body").html(string);

  }
});