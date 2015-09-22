<?php
	$servername = "localhost";
	$username = "root";
	$password = "iitmandiur036";
	$dbname = "online_cab_system";
	$flag = true;
	$db_con = mysqli_connect($servername, $username, $password, $dbname);
	if (!$db_con) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	mysqli_autocommit($db_con, false);
	
	$sql = "SELECT * FROM `passenger`WHERE `email_id` = '$_POST[email_id]'";
	$result = mysqli_query($db_con, $sql);
	if(mysqli_num_rows($result)==0){
		$sql = "INSERT INTO `passenger`(`fname`, `lname`, `email_id`, `contact_no`) values ('$_POST[fname]', '$_POST[lname]', '$_POST[email_id]', '$_POST[contact_no]')";
		if(mysqli_query($db_con, $sql)) {
			#echo "Signup sucessfull"."<br>";	
		}
		else {
			$flag=false;
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		$sql = "SELECT `id` FROM `passenger` WHERE `email_id` = '$_POST[email_id]';";
		$result = mysqli_query($db_con, $sql);
		$id = mysqli_fetch_assoc($result);
		$passenger_id = $id["id"];

		$sql = "INSERT INTO `passenger_login`(`email_id`, `password`, `passenger_id`) values ('$_POST[email_id]', '$_POST[password]', '$passenger_id')";	
		if(mysqli_query($db_con, $sql)) {
			#echo "Account created"."<br>";	
		}
		else {
			$flag=false;
			echo "Error: " . $sql . "<br>" . mysqli_error($db_con);
		}
		session_start();
		session_unset();
	}
	else{
		session_start();
		session_unset();
		$_SESSION["signup_error"]="Email-id already registered... Please login or try with different Email-id";
		header('location:login.php'); 
	}

	if($flag){
		mysqli_commit($db_con);
		#echo "All queries were executed successfully";
	} else {
		mysqli_rollback($db_con);
		#echo "All queries were rolled back";
	}
	mysqli_close($db_con);
	#echo "<br>Signup sucessfull<br>";
	#echo "Click here for <a href='login.php'>login page</a>"
	
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
					<a class="navbar-brand"> <p>Online Cab System</p>  <h> </h>  </a>
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
		<div id="box">
			
			<h2> Congratulations!!! You are sucessfully registered... </h2><br>
			<h3> Welcome to the family of PTH online cab system... </h3><br>
			<h3> <a href="login.php"> Click here to login </a></h3>
			
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
