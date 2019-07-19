function handleChange(value){
   // alert(value);
  //console.log(value);
  $("#da_1").val(value);
  if(value==2){
   var date = new Date();
  // console.log(date);
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  $("#check_in_date").datepicker('setDate',today);
  var end = new Date(date.getFullYear(), date.getMonth()+3, date.getDate());
  console.log(end);
  $('#check_in_date').datepicker({
    format: 'd M yy',
    autoclose:true,
    todayHighlight:true,
    orientation: "auto",
    startDate:today,
    endDate: end
  }) .change(dateChanged)
  .on('changeDate', dateChanged);
  $("#check_in_date").datepicker("setDate",today);
  $( "#check_in_date" ).datepicker('setEndDate', end); 
  // $("#check_in_date").datepicker("update",end);
  //var date1 = new Date();
  //var endd =new Date(date1.getFullYear(), date1.getMonth(), date1.getDate());
            // console.log(y);
            $("#check_out_dates").datepicker({
              format: 'd M yy',
              autoclose:true,
              startDate:today,
              endDate: today
            });
            // console.log('chirag');
            // console.log(today);
            $( "#check_out_dates" ).datepicker("setDate", today);
            //$( "#check_out_dates" ).datepicker("endDate", today);
            //$('#check_out_dates').datepicker('endDate', today);
    //  $( "#check_out_dates" ).datepicker('update', today);
    function dateChanged(ev) {
               // alert('chirag');
              var temp = $(this).datepicker('getDate');
              var d = new Date(temp);
              var check_out = new Date(d.getFullYear(), d.getMonth(), d.getDate());
              // console.log(check_out);
              $( "#check_out_dates" ).datepicker('setStartDate', check_out); 
              $( "#check_out_dates" ).datepicker('setEndDate', check_out); 
              $( "#check_out_dates" ).datepicker('update', check_out);

            }
            $("#check_in_time").show();
            $("#check_out_time").show();
            $("#check_in_date").show();
            $("#check_out_date").show();
             $("#hours_div").show();
          }
          if(value==1){
            // alert('chirag1');
             $("#check_in_time").hide();
            $("#check_out_time").hide();
            $("#check_in_date").show();
            $("#check_out_date").show();
             $("#hours_div").hide();
  var date = new Date();
  // console.log(date);
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  $("#check_in_date").datepicker('setDate',today);
  var end = new Date(date.getFullYear(), date.getMonth(), date.getDate()+1);

  $('#check_in_date').datepicker({
    format: 'd M yy',
    autoclose:true,
    todayHighlight:true,
    orientation: "auto",
    startDate:today,
    endDate: '+6M',
  }) .change(dateChanged)
  .on('changeDate', dateChanged);
  $("#check_in_date").datepicker("setDate",today);
  //$("#check_out_dates").datepicker("update",today);
  //var date1 = new Date();
  //var endd =new Date(date1.getFullYear(), date1.getMonth(), date1.getDate());
            // console.log(y);
            $("#check_out_dates").datepicker({
              format: 'd M yy',
              autoclose:true,
              startDate:end,
              endDate:  '+6M'
            });
            // console.log('chirag');
            // console.log(today);
            $( "#check_out_dates" ).datepicker("setDate", end);
            //$( "#check_out_dates" ).datepicker("endDate", today);
            //$('#check_out_dates').datepicker('endDate', today);
    //  $( "#check_out_dates" ).datepicker('update', today);
    function dateChanged(ev) {
                // alert('chirag');
              var temp = $(this).datepicker('getDate');
              var d = new Date(temp);
              var check_out = new Date(d.getFullYear(), d.getMonth(), d.getDate()+1);
              var check_outa = new Date(d.getFullYear(), d.getMonth()+6, d.getDate());
              // alert(check_out);
              // console.log(check_out);
              $( "#check_out_dates" ).datepicker('setStartDate', check_out); 
              $( "#check_out_dates" ).datepicker('setEndDate', check_outa); 
              $( "#check_out_dates" ).datepicker('update', check_out);

            }
         }

       }

       function initAutocomplete() {

           // console.log('initAutocomplete');
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
            // console.log(places);
            var lat=places[0].geometry.location.lat();
            var lng=places[0].geometry.location.lng();
             // console.log(lng);
             // console.log(lat);
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
         var x = document.getElementById("demo");

         function getLocation() {
          if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(showPosition);
         } else { 
           x.innerHTML = "Geolocation is not supported by this browser.";
         }
       }

       function showPosition(position) {

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


         var i = 1;
         var j=1;
         var k=0;

         function incNumber() {
           if (i < 9) {
            i++;
          } else if (i = 9) {
            i = 1;
          }
          // console.log(i);
          return i;
          
        }

        function decNumber() {
         if (i > 1) {
          --i;
        } else if (i = 1) {
          i = 9;
        }
        // console.log(i);
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
     if (j > 1) {
      --j;
    } else if (j = 1) {
      j = 9;
    }

    return j;
  }
  function incNumber2() {
   if (k < 9) {
    k++;
  } else if (k = 9) {
    k = 0;
  }

  return k;
}

function decNumber2() {
 if (k > 1) {
  --k;
} else if (k = 1) {
  k = 0;
}

return k;
}


function adult_incNumber(){
 var i=incNumber();
         //alert(j);
         document.getElementById("adult_count").innerHTML = i;
         document.getElementById("no_of_adults").innerHTML = i;
         $("#no_of_adults_form").val(i);
         if(i>1){
          $(".ad_s").css('display','inline-block');
        }else{
          $(".ad_s").css('display','none');
        }
      }
      function adult_decNumber(){
        var i=decNumber();
         //alert(j);
         document.getElementById("adult_count").innerHTML = i;
         document.getElementById("no_of_adults").innerHTML = i;
         $("#no_of_adults_form").val(i);
         if(i>1){
          $(".ad_s").css('display','inline-block');
        }else{
          $(".ad_s").css('display','none');
        }
      }
      function room_incNumber(){
        var j=incNumber1();
        document.getElementById("room_count").innerHTML = j;
        document.getElementById("no_of_rooms").innerHTML = j;
        $("#no_of_rooms_form").val(j);
        if(j>1){
          $(".room_s").css('display','inline-block');
        }else{
          $(".room_s").css('display','none');
        }
      }
      function room_decNumber(){
        var j=decNumber1();
        document.getElementById("room_count").innerHTML =j;
        document.getElementById("no_of_rooms").innerHTML = j;
        $("#no_of_rooms_form").val(j);
        if(j>1){
          $(".room_s").css('display','inline-block');
        }else{
          $(".room_s").css('display','none');
        }
      }
      function child_incNumber(){
        var k=incNumber2();
        document.getElementById("child_count").innerHTML = k;
        document.getElementById("no_of_childs").innerHTML = k;
        $("#no_of_childs_form").val(k);
        if(k>1){
          $(".child_s").css('display','inline-block');
        }else{
          $(".child_s").css('display','none');
        }
      }
      function child_decNumber(){
        var k=decNumber2();
        document.getElementById("child_count").innerHTML = k;
        document.getElementById("no_of_childs").innerHTML = k;
        $("#no_of_childs_form").val(k);
        if(k>1){
          $(".child_s").css('display','inline-block');
        }else{
          $(".child_s").css('display','none');
        }
      }
     
 //      $(document).ready(function(){
 //        $('input[name="optradio"]').change(function(){
 //          if($('#day_1').prop('checked')){
 //              alert('chirag');
 //             var date = new Date();
 // // console.log(date);
 // var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
 // var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
 

 // $("#check_in_date").datepicker("setDate",today);


 // var date1 = new Date();

 // var today =new Date(date.getFullYear(), date.getMonth(), date.getDate()+1);
 //            // console.log(y);
 //            $("#check_out_dates").datepicker({
 //              format: 'd M yy',
 //              autoclose:true,
 //              startDate:today,
 //              endDate: '+3M'
 //            });
            
 //            $( "#check_out_dates" ).datepicker("setDate", today);
 //            $("#check_in_time").hide();
 //            $("#check_out_time").hide();
 //            $("#check_in_date").show();
 //            $("#check_out_date").show();
 //            $("#hours_div").hide();
 //          }else{
 //           // alert('chirag1');
 //            // console.log($('#check_in_date').val());
 //            var date = new Date();

 //            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
 //            var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            
 //  // load();
 //  $("#check_in_date").datepicker("setDate",today);
 //  var temp = $("#check_in_date").datepicker('getDate');
 //            // alert(temp);
 //            //console.log(temp);
 //            var d = new Date(temp);
 //            var check_out = new Date(d.getFullYear(), d.getMonth(), d.getDate());
 //            // console.log(check_out);
 //            $( "#check_out_dates" ).datepicker('setStartDate', check_out);
 //               // $( "#check_out_dates" ).datepicker('setEndDate', check_out); 
 //               $( "#check_out_dates" ).datepicker('update', check_out);
 //               $("#check_in_time").show();
 //               $("#check_out_time").show();
 //               $("#check_in_date").show();
 //               $("#check_out_date").show();
 //                $("#hours_div").show();
 //             }
 //           });
 //      });

      $(document).click(function() {
        $('#no-popup').click(function(event){
          event.stopPropagation();
        });
  // console.log('click chirag');
  $('#no-popup').css('display','none');

});

// $("#no-popup").clickOutsideThisElement(function() {
//     // Hide the menus
//     console.log('chirag');
//          $('#no-popup').css('display','none');
// });

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
