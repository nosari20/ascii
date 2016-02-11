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
    
    
    
    var mapElement = document.getElementById('map');
    if(mapElement){
        // Google Maps Scripts
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 15,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(48.6731274, 6.1466059), // New York

                // Disables the default Google Maps UI components
                disableDefaultUI: true,
                scrollwheel: true,
                draggable: true,

                
            
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using out element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Custom Map Marker Icon - Customize the map-marker.png file to customize your icon
            var image = baseURL+'assets/image/map-marker.png';
            var myLatLng = new google.maps.LatLng(48.6731274, 6.1466059);
            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image
            });
        }
    }
    
    
    
    
    
    
});


   