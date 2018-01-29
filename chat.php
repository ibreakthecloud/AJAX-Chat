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

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
		<div class="col-md-6">
			&nbsp;<img class = "img-circle" src="<?php echo $imgURL ?>" height = "25%" width = "12%">
		<!-- <div class="col-md-4"> -->
			<kbd>Hello, <?php echo $name; ?></kbd>
		<!-- </div> -->
		</div>
		<div class="col-md-4"></div>
		<div class="col-md-2 top-bar-right"><button class = "btn btn-danger" onclick="logout()"><i class="glyphicon glyphicon-log-out"></i> Logout!</button>
		</div>
	</div>
	</div>
   
	<div class="container">
	<div class="row">

	 <div class="col-md-2">
	 	<!-- <div class="container"> -->
			<!-- <h4><i class="input dot dot-online"></i> Online</h4> -->
  			<div class="input panel panel-success">
    			<div class="panel-heading"><h4><i class="dot dot-online"></i><i class="dot dot-offline"></i> Online</h4></div>
    			
    			<div class="panel-body"><i class="dot dot-online"></i> User 1</div>
    			<div class="panel-body"><i class="dot dot-online"></i> User 2</div>
  			</div>	 		
	 	<!-- </div> -->
	 </div> <!-- Empty Col 1 -->

	 <div class="col-md-6">
	 <div class="form-group">

		<textarea class = "form-control input" id="chats" cols="50" rows="20" readonly style="resize: none;"></textarea><br/> <!-- For All chats -->
		



		<div class="input bottom-round"> <!-- input shadow start -->

		<input class = "form-control input" id = "name" type="text" value = "<?php echo $name; ?>" name="name" size="8" placeholder="Name" required readonly/>  <!-- For name -->
		<input class = "form-control form-control-lg" id="msg" type="text" name="msg" size="41" placeholder="Your Message" /><br/>  <!-- For MSG -->
		</div>
		
		<input class="btn btn-danger input inputs" id = "btn" onclick="<?php if(isset($_SESSION['logged_in'])){echo 'push()';}else{header('location: index.php');}?>" type = "submit" value="send">
		 <!-- input shadow end -->
	 </div> <!-- form-group close -->
	 </div><!--col-md-4 mid  -->
	 <div class="col-md-4"><!-- Empty --></div>
	</div> <!-- row close -->
	</div> <!-- Div container -->
<script type="text/javascript">
	function logout() {
		window.location.assign('logout.php');
	}
</script>
	
</body>
</html>