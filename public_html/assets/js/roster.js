$(document).ready(function(){
    $(".table").tableDnD({
        onDragStart: function(table,row){
            $(row).css("border","solid 3px #e74c3c");
        },
        onDrop: function(table,row){
            var newStarters = [], newBench = [];
            $('#drag-area tr').each(function (i, row) {
                if(i == 0 || i == 1 || i == 2 || i == 3){
                    $(this).find('.starting').text("Starting");
                    newStarters.push({teamID: $(this)[0].id});
                }
                else{
                    $(this).find('.starting').text("Bench");
                    newBench.push({teamID: $(this)[0].id});
                }               
            });

            $(row).css("border","none");
            $.ajax({
                type: "POST",
                url: "../Classes/ajax_process.php",
                data: {
                    newStarters : JSON.stringify(newStarters),
                    setStarters: true
                },
                success: function(response){
                    console.log(response);
                    /*
                    $.ajax({
                        type: "POST",
                        url: "../Classes/ajax_process.php",
                        data:{
                            setBench:true,
                            newBench: JSON.stringify(newBench)
                        },
                        success:function(){
                            location.reload();
                        }
                    });
                    */
                }
            });    
        }
    });
});