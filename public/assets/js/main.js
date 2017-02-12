/*
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
*/


(function($) {

	skel.breakpoints({
		xlarge:	'(max-width: 1680px)',
		large:	'(max-width: 1280px)',
		medium:	'(max-width: 980px)',
		small:	'(max-width: 736px)',
		xsmall:	'(max-width: 480px)'
	});

	$(function() {
		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');
			$window.on('load', function() {
				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 100);
				
				
				if(document.getElementById('submitBtn')!=null){
					document.getElementById('submitBtn').addEventListener("click", function(){
						var address =  document.getElementById("address").value;
						var geocoder = new google.maps.Geocoder();
						geocoder.geocode( { 'address': address}, function(results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								var latitude = results[0].geometry.location.lat();
								var longitude = results[0].geometry.location.lng();
								console.log('reached1');

								var exampleRows = [['March on Washington','March 17, 2017',13.0,50000],['Counter-Protest','February 25,2017',5.7,540]];
							
								//populate rows
								for ( i =0; i < exampleRows.length; i++){
									var row = document.getElementById('tablebody').insertRow(-1);
									for(j=0; j<4;j++){//TODO DONT HARDCODE THE 4
										row.insertCell(j).innerHTML = exampleRows[i][j];
									}
								}
								
								var str ='';
								http.get('172.31.59.220:3000', (res) => {
									str = res;
								});
								console.log(str)
								
								//TODO problem code here
								var EventSearch = require("../facebook-events-by-location");
								console.log('reached2');
								var es = new EventSearch({
									"lat": longitude,
									"lng": latitude
								});
								
								//console.log('reached3');
								//es.search().then(function (events) {
								//	console.log(JSON.stringify(events));
								//}).catch(function (error) {
								//	console.error(JSON.stringify(error));
								//});

								//var formatted = "172.31.59.220:3000/events?lat="+latitude+"&lng="+longitude;
								//send ajax request
								//$.ajax(
								//	{
								//		url: 'getevents.php',
								//		type: 'POST',
								//		dataType: 'text',
								//		data: {lat: latitude, long: longitude},
								//		success: function (response)
								//		{
								//			console.log('sent php request')
								//			document.getElementById("tablebody").innerHTML = this.response;
								//		}
								//	});
								
								//TODO json parser for scaper
							
							//cleanup and delete all rows
							//document.getElementById('tablebody').innerHTML=null;
								alert("latitude="+latitude+", longitude="+longitude);
							} //end if
						}); //end geocoder
					});//end listenerner
				};//end null check

				if(document.getElementById('mailSubmit')!=null){
					document.getElementById('mailSubmit').addEventListener("click", function(){
						//alert('Submitted');
						window.location.href = "thanks.html"
					});//TODO implement
				};
			});

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

		// Off-Canvas Navigation.

			// Navigation Panel Toggle.
				$('<a href="#navPanel" class="navPanelToggle"></a>')
					.appendTo($body);

			// Navigation Panel.
				$(
					'<div id="navPanel">' +
						$('#nav').html() +
						'<a href="#navPanel" class="close"></a>' +
					'</div>'
				)
					.appendTo($body)
					.panel({
						delay: 500,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'left'
					});

			// Fix: Remove transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#navPanel')
						.css('transition', 'none');

	});

})(jQuery);