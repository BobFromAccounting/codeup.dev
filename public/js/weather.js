"use strict";
	
	(function () {
		
		navigator.geolocation.getCurrentPosition(function(position){

			var openWeatherRequest = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + position.coords.latitude + "&lon=" + position.coords.longitude + "&cnt=3", {
				    APPID: "d1ab172daa752ce8322b5e76f33063f5",
					units: "imperial"
			});

			openWeatherRequest.always(function () {
				console.log("request sent");
			});

			openWeatherRequest.fail(function (data, error) {
				console.log(error);
				console.log(openWeatherRequest.status);
			});

			openWeatherRequest.done(function (data) {
				var cityName = data.city.name;
				$("#cityName").html(cityName);

				$(".row").empty();

				for (var i = 0; i < data.list.length; i++) {
					postWeatherData(data.list[i]);
				}

				mapCanvasBuild(position.coords.latitude, position.coords.longitude, cityName);

				console.log('done');
			});
		});
		
		var postWeatherData = function (object) {
			var day = moment.unix(object.dt);
			
			var populateForecast = "<div class='panel panel-default col-md-4'>" 
								 + "<div class='panel-heading'> <h2 class='panel-title'>" 
								 + "<strong>Date: </strong>" + "<strong>" + day.format("ddd") + "</strong></h2>" 
								 + "</div> <div class='panel-body'>" + "<p><strong>High/Low: </strong>" 
								 + object.temp.max + "/" + object.temp.min 
								 + "</p> <p><strong>Expected Conditions: </strong>"
								 + object.weather[0].main + "</p> <p><strong> Humidity: </strong>"
								 + object.humidity + "</p> <p><strong>Wind Speed: </strong>"
								 + object.speed + "</p></div>";

			$(".row").append(populateForecast);
		}

		function loadWeatherData (latitude, longitude) {
			var openWeatherRequest = $.get("http://api.openweathermap.org/data/2.5/forecast/daily?lat=" + latitude + "&lon=" + longitude + "&cnt=3", {
				APPID: "d1ab172daa752ce8322b5e76f33063f5",
				units: "imperial"
			});

			openWeatherRequest.always(function () {
				console.log("request sent");
			});

			openWeatherRequest.fail(function (data, error) {
				console.log(error);
				console.log(openWeatherRequest.status);
			});

			openWeatherRequest.done(function (data) {
				var cityName = data.city.name;

				$("#cityName").html(cityName);
				$(".row").empty();
		
				for (var i = 0; i < data.list.length; i++) {
					postWeatherData(data.list[i]);
				}
				
				mapCanvasBuild(latitude, longitude, cityName);
				
				console.log('done');
			});
		}

		function mapCanvasBuild (latitude, longitude, cityName){
			var latLng = new google.maps.LatLng(latitude,longitude);
			
			var mapOptions = {
				zoom: 15,
				center: latLng,
				animation: google.maps.Animation.DROP,
			};

			var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

		    var marker = new google.maps.Marker({
			  position: latLng,
			  map: map,
			  draggable: true,
			  title: cityName
		    });

			google.maps.event.addListener(marker, 'dragend', function () {
				var latLng = marker.getPosition();
				var latitude = latLng.lat();
				var longitude = latLng.lng();
			    loadWeatherData (latitude, longitude);
			});

		}

		$('#mapInput').on('submit',function (e) {
	        e.preventDefault();
	    	var inputObject = $('form').serializeArray();
	        var address = inputObject[0].value;
			var geocoder = new google.maps.Geocoder();
			
			geocoder.geocode( { 'address': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
				    
				    var latitude = results[0].geometry.location.lat();
				    var longitude = results[0].geometry.location.lng();

				    loadWeatherData(latitude,longitude);
				    mapCanvasBuild(latitude,longitude);

				} else {
					alert("Geocoding was not successful - STATUS: " + status);
				}
			});
		});
	})();