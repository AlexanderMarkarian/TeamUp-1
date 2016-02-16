// Alex

$(document).ready(function($) {

    $(".scroll").click(function(event){		
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
    
    new WOW().init();
    
    $( "span.menu" ).click(function() {
        $( "ul.nav1" ).slideToggle( 300, function() {
            // Animation complete.
        });
    });
    
    $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
    });
    $(".tab1 p").hide();
    $(".tab2 p").hide();
    $(".tab3 p").hide();
    $(".tab4 p").hide();
    $(".tab5 p").hide();
    $(".tab1 ul").click(function(){
            $(".tab1 p").slideToggle(300);
            $(".tab2 p").hide();
            $(".tab3 p").hide();
            $(".tab4 p").hide();
            $(".tab5 p").hide();
    })
    $(".tab2 ul").click(function(){
            $(".tab2 p").slideToggle(300);
            $(".tab1 p").hide();
            $(".tab3 p").hide();
            $(".tab4 p").hide();
            $(".tab5 p").hide();
    })
    $(".tab3 ul").click(function(){
            $(".tab3 p").slideToggle(300);
            $(".tab4 p").hide();
            $(".tab5 p").hide();
            $(".tab2 p").hide();
            $(".tab1 p").hide();
    })
    $(".tab4 ul").click(function(){
            $(".tab4 p").slideToggle(300);
            $(".tab3 p").hide();
            $(".tab2 p").hide();
            $(".tab1 p").hide();
            $(".tab5 p").hide();
    })
    $(".tab5 ul").click(function(){
            $(".tab5 p").slideToggle(300);
            $(".tab4 p").hide();
            $(".tab3 p").hide();
            $(".tab2 p").hide();
            $(".tab1 p").hide();

    })
});

