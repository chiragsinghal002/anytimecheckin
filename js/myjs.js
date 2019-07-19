
                 
                        function hidesignin(){                        
                         $('#Second').modal('hide');

                       }
                     
                      // hide sign in end

                      // hide sign up
                    
                        function hidesignup(){                        
                         $('#third').modal('hide');                    

                       }
                   
                      // hide sign up end 

                      // show login
                    
                        function showLogin(){                        
                         $('#third').modal('show');
                         $('#Second').modal('hide');

                       }
                     

                     // close login

                     //  hide Verification start                    
                        function hideverification(){                                            
                         $('#fourth').modal('hide');                    

                       }
                       //  hide Verification end

                        //  hide forgotEmail start                    
                        function hideforgotEmail(){ 
                        // alert('kanchan'); 
                        // console.log('kanchan');                                          
                         $('#first').modal('hide');                    

                       }
                       //  hide forgotEmail end
                     


                 //test login section 
                 

                    function loginemail() {
                $.ajax({

                  url: "adduser.php",

                  type: "POST",

                  data:'loginbyemail='+$("#loginemailvalid").val()+'&pass='+$("#loginemailpass").val(),

                  success:function(data){
                   // alert(data);

                  console.log(data);

                    if(data=='0'){
                
                        $("#signin-status").html('Wrong Email or Password');
    
                   }
                   if(data=='1'){
                    //console.log('chirag1');
                    // window.location.href='user-profile.php';
                     window.location.href='index.php';
                   }
                     }
                   });

              }

              function validateSignUp() {

                  //alert('chirag');

                  var valid = true;

                  $(".form-control").css('background-color','');

                  $(".info").html('');                  

                  if($("#loginemailvalid").val()=="") {

                    $("#loginemailvalid-info").html("(This field is required)");

                    $("#loginemailvalid").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if(!$("#loginemailvalid").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

                    $("#loginemailvalid-info").html("(This is not a valid email format)");

                    $("#loginemailvalid").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#loginemailpass").val()=="") {

                    $("#loginemailpass-info").html("(This field is required)");

                    $("#loginemailpass").css('background-color','#FFFFDF');

                    valid = false;

                  }                       


                      if(valid==true){

                        loginemail();

                      }

                      return valid;

                    }

                  
                 // test login section end 

	
         
      
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
                             		//alert(data);

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
                    