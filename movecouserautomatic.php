<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<div onLoad="document.joe.burns.focus()">
<FORM NAME="joe">
<INPUT TYPE="text" name="burns" size="10" maxlength="1" onKeyUp="check()">
<INPUT TYPE="text" name="tammy" size="10" maxlength="1" onKeyUp="check2()">
<INPUT TYPE="text" name="chloe" size="10" maxlength="1" onKeyUp="check3()">
<INPUT TYPE="text" name="mardi" size="10" maxlength="1" onKeyUp="check4()">
<INPUT TYPE="submit" VALUE="Click to Send" NAME="go">
</FORM>
</div>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	function check()
{
var letters = document.joe.burns.value.length +1;
if (letters <= 1)
{document.joe.burns.focus()}
else
{document.joe.tammy.focus()}
}

function check2()
{
var letters2 = document.joe.tammy.value.length +1;
if (letters2 <= 1)
{document.joe.tammy.focus()}
else
{document.joe.chloe.focus()}
}

function check3()
{
var letters3 = document.joe.tammy.value.length +1;
if (letters3 <= 1)
{document.joe.tammy.focus()}
else
{document.joe.chloe.focus()}
}
</script>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<input class="inputs" type="text" maxlength="4" />
<input class="inputs" type="text" maxlength="4" />
<input class="inputs" type="text" maxlength="4" />
<input class="inputs" type="text" maxlength="4" />
<input class="inputs" type="text" maxlength="4" />
<input class="inputs" type="text" maxlength="4" />

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(".inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.inputs').focus();
    }
});
</script>