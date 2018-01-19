<?php
session_start();
$logged_in = $_SESSION['logged_in'];
if (!isset($logged_in)) 
{
	header('location: index.php');
}

$name = $_SESSION['name'];
$username = $_SESSION['username'];
$imgURL = $_SESSION['imgURL'];

// echo $name;
// echo $username;
//echo $imgURL;

?>

<!DOCTYPE html>
<html>
<head>


	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>


	<script src="app.js"></script>
	<script src=""></script>
	<title>Chatmoon</title>
</head>
<body>
	<div class="container">
	<div class="row top-bar">
		<div class="col-sm-6">
			&nbsp;<img class = "img-circle" src="<?php echo $imgURL ?>" height = "25%" width = "12%">
		<!-- <div class="col-sm-4"> -->
			<kbd>Hello, <?php echo $name; ?></kbd>
		<!-- </div> -->
		</div>
		<div class="col-sm-4"></div>
		<div class="col-sm-2 top-bar-right"><button class = "btn btn-danger" onclick="logout()"><i class="glyphicon glyphicon-log-out"></i> Logout!</button>
		</div>
	</div>
	</div>
	<div class="container" style="width: 50%;">
	<div class="form-group">

		<textarea class = "form-control input" id="chats" cols="50" rows="20" readonly ng-repeat="x in names"></textarea><br/> <!-- For All chats -->

		<div class="input bottom-round"> <!-- input shadow start -->

		<input class = "form-control input" id = "name" type="text" value = "<?php echo $name; ?>" name="name" size="8" placeholder="Name" required readonly/>  <!-- For name -->
		<input class = "form-control form-control-lg" id="msg" type="text" name="msg" size="41" placeholder="Your Message" /><br/>  <!-- For MSG -->
		</div>
		
		<input class="btn btn-danger input inputs" id = "btn" onclick="push()" type = "submit" value="send">
		 <!-- input shadow end -->

	</div>
	</div>

<script type="text/javascript">
	function logout() {
		window.location.assign('logout.php');
	}
</script>
	
</body>
</html>