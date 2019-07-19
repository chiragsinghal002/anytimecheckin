<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script> 
$('form').submit(function(e) 
{
  alert('submit intercepted');
  e.preventDefault(e);
  var u = $('#email').val();
  $.ajax({
      url: './test2.php',
      type: 'POST',
      data: u,
      success: function (response) {
      //get response from your php page (what you echo or print)
        $('#status').append('<p>The email is ok to use and the row has been inserted </p><p>' + response);
        console.log('Submitted');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        alert('Email exists');
      }
    });
});
</script>
</head>
<body>
<form id="form" action="./test2.php" method="post"> 
    E-mail: <input type="email" name="email" id="email" required><br>
    <span id="status">   </span>
    <input type="submit" id="btnsub">
  </form>
</body>
</html>

<?php
include("classes/db.php");
if (isset($email)) {
 
$sql = "SELECT email FROM user_registration WHERE email = " .$_POST['email'];
$select = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($select);

if (mysqli_num_rows > 0) {
    echo "exist";
}else echo 'notexist';
}


?>