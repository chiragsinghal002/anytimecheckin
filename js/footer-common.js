function load1(){
var d=$("#da_1").val();
if(d== 1){
    // alert(1);
   // console.log(1);
  var date = $("#check_in_date").datepicker('getDate');
  //$("#check_in_date").datepicker('startDate',date);
   //$('#check_in_date').data('date');
  //console.log(date);
  $("#check_in_date").datepicker("setDate",today);
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  //console.log(today);
  var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  $('#check_in_date').datepicker({
    format: 'd M yy',
    startDate:today,
    endDate: '+3M',
    autoclose:true
 }) .change(dateChanged)
  .on('changeDate', dateChanged);
   $( "#check_in_date" ).datepicker('setStartDate', today); 
             $( "#check_in_date" ).datepicker('update', today);
  var date1 = $("#check_out_date").datepicker('getDate');
  var today1 =new Date(date1.getFullYear(), date1.getMonth(), date1.getDate());
            // console.log(y);
            $("#check_out_dates").datepicker({
              format: 'd M yy',
              autoclose:true,
              startDate:today1,
              endDate: '+3M'
            });
            
            $( "#check_out_dates" ).datepicker("setDate", today1);

            function dateChanged(ev) {
              // alert('chirag');
              var temp = $(this).datepicker('getDate');
              var d = new Date(temp);
              var check_out = new Date(d.getFullYear(), d.getMonth(), d.getDate()+1);
             // console.log(check_out);
             $( "#check_out_dates" ).datepicker('setStartDate', check_out); 
             $( "#check_out_dates" ).datepicker('update', check_out);

           }

}


if(d== 2){
     // alert(2);
    // console.log(2);
  var date = $("#check_in_date").datepicker('getdate');
  // console.log(date);

  //console.log(date2);
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
 // var end2 = new Date(date3.getFullYear(), date3.getMonth(), date3.getDate());
  $('#check_in_date').datepicker({
    format: 'd M yy',
    autoclose:true,
    todayHighlight:true,
    orientation: "auto",
    startDate:today,
    endDate: '+3M',
   
 }) .change(dateChanged)
  .on('changeDate', dateChanged);
  $("#check_in_date").datepicker("setDate",today);
  //var date1 = new Date();
  //var today =new Date(date.getFullYear(), date.getMonth(), date.getDate());
            // console.log(y);
            $("#check_out_dates").datepicker({
              format: 'd M yy',
              autoclose:true,
              startDate:today,
             
            });
            
            $( "#check_out_dates" ).datepicker("setDate", today);

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
}
 function load(){
  var d=$("#day_1").val();
  return d;

}

var avsv=$("#da_1").val();
  // alert(avsv);
if(avsv==1){
  $("#check_in_time").hide();
  $("#check_out_time").hide();
  $("#check_in_date").show();
  $("#check_out_date").show();
  $("#hours_div").hide();
}
if(avsv==2){
  $("#check_in_time").show();
  $("#check_out_time").show();
  $("#check_in_date").show();
  $("#check_out_date").show();
  $("#hours_div").show();
}

