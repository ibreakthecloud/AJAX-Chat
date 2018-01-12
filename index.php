<?php
session_start();
if (isset($_SESSION['logged_in']))
{
	header('location: chat.php');
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="GET" action="https://github.com/login/oauth/authorize">

<input type="hidden" name="client_id" value="8f74c6a9b5f13e9b3b01">
<input type="submit">


</form>

</body>
</html>