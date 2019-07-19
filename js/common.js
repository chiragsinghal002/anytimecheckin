$(function(){
 var date = new Date();
 var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
 var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
 $('#check_in_date').datepicker({
  format: 'mm-dd-yyyy',
  autoclose:true,
  todayHighlight:true,
  startDate:today,
  endDate: '+3M'
});
           // var dat=$('#check_in_date').val();
           // alert(dat);
           var date1 = new Date();
           $("#check_out_date").datepicker({
           	format: 'mm-dd-yyyy',
           	autoclose:true,
           	startDate:date1,
           	endDate: '+3M'
           })

           var datess = new Date();
           $("#check_out_dates").datepicker({
           	format: 'mm-dd-yyyy',
           	autoclose:true,
           	startDate:date1,
           	endDate: '+3M'
           })

           $("#check_in_time").timepicker();
           $("#check_out_time").timepicker();
         });
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
   navigator.geolocation.getCurrentPosition(showPosition);
 } else { 
   x.innerHTML = "Geolocation is not supported by this browser.";
 }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
  var lat1 = parseFloat(position.coords.latitude);
  var lng1= parseFloat(position.coords.longitude);
  var latlng = new google.maps.LatLng(lat1, lng1);
  var geocoder = new google.maps.Geocoder();
           // console.log(geocoder);
           $('#lat').val(lat1);
           $('#lng').val(lng1);
           geocoder.geocode({ 'latLng': latlng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[1]) {
                       // alert("Location: " + results[1].formatted_address);
                       $("#google_search").val(results[1].formatted_address);
                     }
                   }
                 })
         }

         function resendcode() {
                           // alert('kanchan');
                             //var code=$("#code").val();
                             var userEmail=$("#userEmail").val();
                             //console.log(userEmail); 
                             //alert(code);             
                             

                             $.ajax({
                             	url: "adduser.php",
                             	type: "POST",
                             	data:'resendcode='+$("#code").val()+'&userEmail='+$("#userEmail").val(),

                             	success:function(data){
                             		alert(data);

                             		console.log(data);

                             		if(data=='1'){

                             			$('#fourth').modal('hide');

                             			$('#Second').modal('hide');

                             			$('#third').modal('show');
                             			$("#mail-resendcode").html(data);

                             		}
                             	}                     

                             });


                           }
                           
                           function forgetpassword(){
                             $('#third').modal('hide');
                             $('#first').modal('show');

                           }
                           function createaccount(){
                             $('#third').modal('hide');
                             $('#Second').modal('show');

                           }
                           function mobileforget(){
                             $('#third').modal('hide');
                             $('#mobileforget').modal('show');

                           }
                           function deselect(e) {
                             $('.pop').slideFadeToggle(function() {
                              e.removeClass('selected');
                            });    
                           }

                           $(function() {
                             $('#contact').on('click', function() {

                              console.log("pop up click");
                              if($(this).hasClass('selected')) {
                               deselect($(this));               
                             } else {
                               $(this).addClass('selected');
                               $('.pop').slideFadeToggle();
                             }
                             return false;
                           });

                             $('.close').on('click', function() {
                              deselect($('#contact'));
                              return false;
                            });
                           });

                           $.fn.slideFadeToggle = function(easing, callback) {
                             return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
                           };
                           var i = 1;
                           var j=1;
                           var k=1;

                           function incNumber() {
                             if (i < 9) {
                              i++;
                            } else if (i = 9) {
                              i = 1;
                            }

                            return i;
                          }

                          function decNumber() {
                           if (i > 0) {
                            --i;
                          } else if (i = 0) {
                            i = 9;
                          }

                          return i;
                        }

                        function incNumber1() {
                         if (j < 9) {
                          j++;
                        } else if (j = 9) {
                          j = 1;
                        }

                        return j;
                      }

                      function decNumber1() {
                       if (j > 0) {
                        --j;
                      } else if (j = 0) {
                        j = 9;
                      }

                      return j;
                    }
                    function incNumber2() {
                     if (k < 9) {
                      k++;
                    } else if (k = 9) {
                      k = 1;
                    }

                    return k;
                  }

                  function decNumber2() {
                   if (k > 0) {
                    --k;
                  } else if (k = 0) {
                    k = 9;
                  }

                  return k;
                }


                function adult_incNumber(){
                 var i=incNumber();
         //alert(j);
         document.getElementById("adult_count").innerHTML = i;
         document.getElementById("no_of_adults").innerHTML = i;
         $("#no_of_adults_form").val(i);
       }
       function adult_decNumber(){
        var i=decNumber();
         //alert(j);
         document.getElementById("adult_count").innerHTML = i;
         document.getElementById("no_of_adults").innerHTML = i;
         $("#no_of_adults_form").val(i);
       }
       function room_incNumber(){
        var j=incNumber1();
        document.getElementById("room_count").innerHTML = j;
        document.getElementById("no_of_rooms").innerHTML = j;
        $("#no_of_rooms_form").val(j);
      }
      function room_decNumber(){
        var j=decNumber1();
        document.getElementById("room_count").innerHTML =j;
        document.getElementById("no_of_rooms").innerHTML = j;
        $("#no_of_rooms_form").val(j);
      }
      function child_incNumber(){
        var k=incNumber2();
        document.getElementById("child_count").innerHTML = k;
        document.getElementById("no_of_childs").innerHTML = k;
        $("#no_of_childs_form").val(k);
      }
      function child_decNumber(){
        var k=decNumber2();
        document.getElementById("child_count").innerHTML = k;
        document.getElementById("no_of_childs").innerHTML = k;
        $("#no_of_childs_form").val(k);
      }
	 // This example adds a search box to a map, using the Google Place Autocomplete
         // feature. People can enter geographical searches. The search box will return a
         // pick list containing a mix of places and predicted search terms.
         
         // This example requires the Places library. Include the libraries=places
         // parameter when you first load the API. For example:
         
         function initAutocomplete() {

         	console.log('initAutocomplete');
           // Create the search box and link it to the UI element.
           var input = document.getElementById('google_search');
           var searchBox = new google.maps.places.SearchBox(input);
           // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

           // Bias the SearchBox results towards current map's viewport.
           // map.addListener('bounds_changed', function() {
           //   searchBox.setBounds(map.getBounds());
           // });

           var markers = [];
           // Listen for the event fired when the user selects a prediction and retrieve
           // more details for that place.
           searchBox.addListener('places_changed', function() {
           	var places = searchBox.getPlaces();
           	console.log(places);
           	var lat=places[0].geometry.location.lat();
           	var lng=places[0].geometry.location.lng();
           	console.log(lng);
           	console.log(lat);
           	$('#lat').val(lat);
           	$('#lng').val(lng);
             
           	if (places.length == 0) {
           		return;
           	}

             // Clear out the old markers.
             markers.forEach(function(marker) {
             	marker.setMap(null);
             });
             markers = [];

             // For each place, get the icon, name and location.
             var bounds = new google.maps.LatLngBounds();
             places.forEach(function(place) {
             	if (!place.geometry) {
             		console.log("Returned place contains no geometry");
             		return;
             	}

             	if (place.geometry.viewport) {
                 // Only geocodes have viewport.
                 bounds.union(place.geometry.viewport);
               } else {
                bounds.extend(place.geometry.location);
              }
            });
             map.fitBounds(bounds);
           });
         }
         
         $(function(){
          $("#check_in_time").hide();
          $("#check_out_time").hide();
        })
         
