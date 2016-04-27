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
      }
   });


    // SETTING USER INFO -------------------------------
    
    $.ajax({
       type:"POST",
       url:"../Classes/draft.php",
       data:{
           getUsers:true
       },
       success:function(response){
        
           var data = $.parseJSON(response);
           var oddString = '', evenString = '';
           var count = 1;
           var normalOrder = [], reverseOrder = [];
           for(var k in data){
               oddString += '<tr class="round-item"><td><span class="round-number pull-left">'+count+'</span><span class="round-name" id='+k+'>'+data[k]+'</span></td></tr>';
               count++;
               normalOrder.push(data[k]);
           }
           $(".odd_round").append(oddString);
           
           reverseOrder = normalOrder.reverse();
           
      
           for(var k in reverseOrder){
               evenString += '<tr class="round-item"><td><span class="round-number pull-left">'+count+'</span><span class="round-name">'+reverseOrder[k]+'</span></td></tr>';
               count++;
           }
           $(".even_round").append(evenString);
          
           //timer();
           
           setPick();
           
       }
    });
    // -------------------------------------------------
    
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
                whoIsNext();
            }
        })
    }
    
    function whoIsNext(){
        $.ajax({
            type: "POST",
            url: "../Classes/draft.php",
            data:{
                whoIsNext: true
            },
            success: function(response){
                var d = $("#"+response).text();
                $(".clock-team").text(d);
                $(".clock-team").attr("id",response);
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

        if($(this)[0].id == ""){
            $(".queue").html("Remove From Queue");
            $(".queue").attr("id","remove-queue");
            $("#remove-queue").removeClass("btn-info");
            $("#remove-queue").addClass("btn-danger"); 
        }
        else{
            $(".queue").html("Add To Queue");
            $(".queue").attr("id","add-queue");
            $("#add-queue").removeClass("btn-danger");
            $("#add-queue").addClass("btn-info");
        }

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


    $(document.body).on("click", "#add-queue", function(){
        var string = '<tr class="teams" id="queued"><td>'+team.team+'</td><td style="display:none">'+team.league+'</td><td style="display:none"></td><td style="display:none">'+team.GP+'</td><td style="display:none">'+team.wins+'</td><td style="display:none">'+team.loses+'</td><td style="display:none">'+team.pct+'</td></tr>';
        $(".queue-list").append(string);
        $(".queue").html("Remove From Queue");
        $(".queue").attr("id","remove-queue");
        $("#remove-queue").removeClass("btn-info");
        $("#remove-queue").addClass("btn-danger");
    });

    $(document.body).on("click","#draft-team", function(){
        var user = $(".clock-team").attr('id');
        var team = $("#selected-team").text();
        var teamID;
        for(var k in ajaxTeams){
          if(ajaxTeams[k].team == team){
            teamID = ajaxTeams[k].id;
          }
        }
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


    $(document.body).on("click","#remove-queue", function(){
        $(".queue-list tr:contains('"+team.team+"')").remove();
        $("#main-box").hide();
        $("#intro-box").show();
    });

  function setTable(){
    /*
    $.ajax({
        type: "POST",
        url: "../Classes/draft.php",
        data:{
          newTable: true
        },
        success:function(response){
          var data = $.parseJSON(response);
          console.log(data);
          var teamID ='', userName = '';
          for(var k in data){
            teamID = k;
            userName  =data[k];
            var string = '';
            for(var k in ajaxTeams){
                if(ajaxTeams[k].id == teamID){
                  ajaxTeams[k].owner = userName;
                }
                string += "<tr class='teams' id="+ajaxTeams[k].image+"><td>"+ajaxTeams[k].team+"</td><td>"+ajaxTeams[k].sport+"</td><td>"+ajaxTeams[k].owner+"</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td></tr>";
            }
          }
          $("#table-body").html(string);
        }
    });*/
          var string = '';
          for(var k in ajaxTeams){
              string += "<tr class='teams' id="+ajaxTeams[k].image+"><td>"+ajaxTeams[k].team+"</td><td>"+ajaxTeams[k].sport+"</td><td>"+ajaxTeams[k].owner+"</td><td>"+ajaxTeams[k].GP+"</td><td>"+ajaxTeams[k].wins+"</td><td>"+ajaxTeams[k].loses+"</td><td>"+ajaxTeams[k].percentage+"</td></tr>";    
          }
          $("#table-body").html(string);

  }
});