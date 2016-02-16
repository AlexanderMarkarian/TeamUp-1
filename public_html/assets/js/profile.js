$(document).ready(function(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var y = today.getFullYear();
    var date = y + "/" + mm + "/" + dd;
   
   
    $('.datetimepicker').datetimepicker({
        dayOfWeekStart : 1,
        lang:'en',
        disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
        startDate:  date
    });
});   
