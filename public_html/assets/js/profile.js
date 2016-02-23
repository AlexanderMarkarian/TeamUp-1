$(document).ready(function(){
    $(".secondStep").hide();
    $(".thirdStep").hide();
    
    $('[data-toggle="tooltip"]').tooltip()
    
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
    
    var timer;
    $('#gotoSecondStep').click(function () {
       testAnim('slideOutLeft');
       clearTimeout(timer);
       timer = setTimeout(function () {
          testAnim('slideInRight');
          $(".firstStep").hide();
          $(".secondStep").show();
       }, 500);
    });
    
    $("#back").click(function(){
       testAnim('slideOutRight');
       clearTimeout(timer);
       timer = setTimeout(function () {
          testAnim('slideInLeft');
          $(".secondStep").hide();
          $(".firstStep").show();
       }, 1000); 
    });
    
    $("#back2").click(function(){
       testAnim('slideOutRight');
       clearTimeout(timer);
       timer = setTimeout(function () {
          testAnim('slideInLeft');
          $(".thirdStep").hide();
          $(".secondStep").show();
       }, 1000); 
    });
    
    $("#gotoThirdStep").click(function(){
       testAnim('slideOutLeft');
       clearTimeout(timer);
       timer = setTimeout(function () {
          testAnim('slideInRight');
          $(".secondStep").hide();
          $(".thirdStep").show();
       }, 500);
    });
    
    function testAnim(x) {
        $('#animationSandbox').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
           $(this).removeClass();
        });
     };
});   
