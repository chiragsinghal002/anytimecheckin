$(document).ready(function() {
    //$('#username').focus();

    $('#submit').click(function() {

        //     event.preventDefault(); // prevent PageReLoad

        //    var ValidEmail = $('#username').val() === 'invitado'; // User validate
        //     var ValidPassword = $('#password').val() === 'hgm2015'; // Password validate

        //     if (ValidEmail === true && ValidPassword === true) { // if ValidEmail & ValidPassword
        //         $('.valid').css('display', 'block');
        //         window.location = "http://arkev.com"; // go to home.html
        //     }
        //     else {
        //         $('.error').css('display', 'block'); // show error msg
        //     }

        var settings = {
            type: 'POST',
			url: "../api/login.php?loginByEmail=AREMAIL12345",
			data: {
				email: 'abc@gmail.com',
				password:'12345'
			}
        }

        $.ajax(settings).done(function(response) {
            console.log(response);
        });
    });

    $('#test').click(function() {


        var settings = {
            type: 'POST',
			url: "https://epimoniapp.com/anytimecheckin/api/login.php?loginByEmail=AREMAIL12345",
			data: {
				"email": "9089080809",
				"password": "12345"
			}
        }

        $.ajax(settings).done(function(response) {
            alert(response);
            console.log(response);
        });
    });
});