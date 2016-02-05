$(document).ready(function() {  
    
    
     $(window).scroll(function() {
        if ($(".navbar-menu").offset().top > 50) {
            $("header").addClass("push");
        } else {
            $("header").removeClass("push");
        }
    });
    
    
    
     
    var sideslider = $('[data-toggle=collapse-side]');
    var sel = sideslider.attr('data-target');
    var cont = sideslider.attr('data-container');
    sideslider.click(function(event){
        $(sel).toggleClass('in');
        $(cont).toggleClass('in');
        $(sideslider).toggleClass('toggled');
    });
});


   