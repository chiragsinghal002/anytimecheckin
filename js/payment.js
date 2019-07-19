 function payment() {
             // window.alert('Payment Complete!');

            var booked_price=$("#price").val();
            console.log(booked_price);
            var payment_type=$('#payment_type').val();
            var hotel_id=$('#hotel_id').val();
            var room_type_id=$('#hotel_room_type_id').val();
            var user_id=$('#user_id').val();
            var paymentId=$("#paymentId").val();
            var discount_price=$("#discount_price").val();
            var hotel_booking_id=$("#hotel_booking_id").val();
            var check_in_date=$("#check_in_date").val();
            var check_out_date=$("#check_out_date").val();
            var check_in_time=$("#check_in_time").val();
            var check_out_time=$("#check_out_time").val()
            var noofroom=$("#noofroom").val();
            var no_of_person=$("#no_of_person").val();
            var actual_price=$("#actual_price").val();
            // var hotel_booking_id=$("#hotel_booking_id").val();
            var booking_type=$("#booking_type").val();
            var childs=$("#childs").val();
            var fname=$("#fname").val();
            var lname=$("#lname").val();
            var email=$("#email").val();
            var mob_no=$("#mob_no").val();
            
            $.ajax({
                url:'paypal-ajax.php',
                type:'POST',
                data:{'booked_price':booked_price,payment_type:payment_type,hotel_id:hotel_id,room_type_id:room_type_id,user_id:user_id,paymentId:paymentId,discount_price:discount_price,booking_type:booking_type,hotel_booking_id:hotel_booking_id,check_in_date:check_in_date,check_out_date:check_out_date,childs:childs,check_in_time:check_in_time,check_out_time:check_out_time,discount_price:discount_price,noofroom:noofroom,no_of_person:no_of_person,actual_price:actual_price,fname:fname,lname:lname,email:email,mob_no:mob_no},
                success:function(data){
                alert(data);
                console.log(data);
                if(data=='1'){
                    window.location.href='booking-confirmation.php';
                }
                if(data=='0'){
                    window.location.href='booking-confirmation.php';
                }
            }
        });
        }