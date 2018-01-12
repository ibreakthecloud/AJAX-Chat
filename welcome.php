<?php
session_start();
$name = $_SESSION['name'];
$username = $_SESSION['username'];
$imgURL = $_SESSION['imgURL'];


echo $name;
echo $username;
//echo $imgURL;

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<img src="<?php echo $imgURL ?>" height = "50%" width = "25%">


</body>
</html>
