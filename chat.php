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
$logincount = $_SESSION['logincount']; 

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
<script src="snackbar.js"></script>


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
			<kbd>Hello, <?php echo $name; ?></kbd> <div class="badge">Total Login: <?php echo $logincount ?></div><div id="snackbar">Welcome <?php echo $name; ?>, this is your first time on AJAX-Chat. Enjoy!</div>
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

  			<div class="input panel panel-success" id="panelUsers">
    			<div class="panel-heading"><h4><i class="dot dot-online"></i><i class="dot dot-offline"></i> Registered Users</h4></div>
    			

    			<?php
    				
    				$mysqli = new mysqli("localhost:3306","root","sudo","ajax-chat-db");
    				$sql_user_check = "SELECT * FROM ajax_chat_db_users";
    			    $usercheck = $mysqli->query($sql_user_check);
    				$result = $usercheck->num_rows;
    				while($row = mysqli_fetch_array($usercheck))
    				{
    					echo '<div class="panel-body"><div class="container"><img class = "img-circle" src="' .$row["imgurl"].'" height = "20%" width = "40px"></div> '.$row["name"].'</div><hr>';
    				}
    			?>

    			
  			</div>	 		
	 	<!-- </div> -->
	 </div> <!-- Empty Col 1 -->

	 <div class="col-md-6">
	 <div class="form-group">


		<!-- <textarea class = "form-control input" id="chats" cols="50" rows="20" readonly style="resize: none;"></textarea><br/> --> <!-- For All chats -->

			<div class = "scroll" id="panelChat">
    			
  			</div>	




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
<?php 
	if ($logincount==0) 
	{
		echo '<script type="text/javascript">',
     'snackbarFunc();',
     '</script>'
;
	}
?>

</body>
</html>