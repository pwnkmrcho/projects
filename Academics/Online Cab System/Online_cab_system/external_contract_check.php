<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "iitmandiur036";
	$dbname = "online_cab_system";

	$db_con = mysqli_connect($servername, $username, $password, $dbname);
	if (!$db_con) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT `id` FROM `cab_categories` WHERE `name` = '$_POST[cab_category]'";
	$result = mysqli_query($db_con, $sql);
	$temp = mysqli_fetch_assoc($result);
	$id = $temp["id"];
	$sql="INSERT INTO `cab`(`registration_no`, `model_name`, `category_id`, `max_passenger_seats`, `luggage`) VALUES ('$_POST[registration_no]', '$_POST[model_name]', '$id', '$_POST[max_passenger_seats]', '$_POST[luggage]')";
	if(mysqli_query($db_con, $sql)){
		echo "done";
	} else {
		$flag=false;
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($db_con);		
?>
<!DOCTYPE html>
<!-- saved from url=(0038)http://cybersecuritygame.tk/questions/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Enter the Game</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="custom.css">
    
<style type="text/css">
    body{
    	padding-top: 70px;
    }
    #box {
    width: 320px;
    padding: 0px;
    //border: 5px solid gray;
    margin: 0;
	}
	#box_para {
    width: 250px;
	}
	#box_button{
	width: 100px;	
	}
</style>
</head>

<body>

<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
				<div align="center">
					<a class="navbar-brand" href="external_contract.php"> <p>Online Cab System</p>  <h> </h>  </a>
			</div>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="nav navbar-nav">
			</ul>
		</div>
	</div>
</nav>

<div class="container" align="center">
	<div class="jumbotron">
		<div align="right"><u>
				<?php
					echo $_SESSION["email"];
				?></u><a href="logout.php"> logout</a>
		</div>
		<center><h2> Cab Sucessfully added</h2></center>
		<div id="box">
			
		</div>
	</div>
<hr>
	<div class="row">
		<div class="col-xs-12">
			<footer>
				<p>© PHT Online Cab System </p>
			</footer>
		</div>
	</div>
</div>


</body></html>
