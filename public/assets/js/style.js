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
                center: new google.maps.LatLng(48.6652459,6.1596814), // New York

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
            var myLatLng = new google.maps.LatLng(48.6652459,6.1596814);
            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image
            });
        }
    }
    
    
    
    /*image editor */
    if($('.image-editor')[0]){
       
        $('.image-editor').each(function() {
            var err= $(this).find('.error');
             
            $(this).cropit({
                imageState: {
                    src: $(this).data('image'),
                },
                smallImagestring: 'allow',
                minZoomstring: 'stretch',
                onImageError: function(error) {
                    $(err).addClass('error');
                    if(error.code==1){
                        $(err).text('L\'image est trop petite (minimum :256x256)');
                    }else{
                        $(err).text('Une erreur est survenu');
                    }
                },
                onImageLoaded: function(){
                     $(err).text('');
                }
               
            });
            $(this).cropit('previewSize', { width: 256, height: 256 });
            $(this).cropit('exportZoom', 2);
            
        
        });

    
    }
    
   
    
    
    
    
    
});


   