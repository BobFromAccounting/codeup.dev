"use strict";
    
    var imperia = { lat: 30.266296, lng: -97.745133, content: '<h1>Imperia Restaurant</h1> <p>It is some of the best asian fusion you will ever try.</p><p>Next Time you are there you should try the Chicken Lollipops!</p>' };
    var hopdoddy = { lat: 30.3576535, lng: -97.7673988, content: '<h1>Hopdoddy</h1> <p>The best burgers in all of Austin, Tx.</p> <p>And, guess what?! They are opening a new location here in San Antonio!</p>' };
    var tatsuya = { lat: 30.3611538, lng: -97.7173388, content: '<h1>Ramen Tatsu-Ya</h1> <p>The best ramen in all of Austin, Tx.</p> <p>But Kimura is pretty good too, and it\' in San Antonio</p>' };

    var locations = [imperia, hopdoddy, tatsuya];

    var mapOptions = {
        zoom: 11,
        
        center: { 
            lat: imperia.lat,
            lng: imperia.lng
        },
        
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    var animation = google.maps.Animation.DROP;

    function attachMarkersAndInfoWindows (element, index, array) {
        var marker = new google.maps.Marker({
            position: { lat: element.lat, lng: element.lng },
            map: map,
            animation: animation
        });

        var infoWindow = new google.maps.InfoWindow({
            content: element.content,
        });

        marker.addListener('click', function() {
            infoWindow.open(map, marker);
        });
    }
    
    locations.forEach(attachMarkersAndInfoWindows);