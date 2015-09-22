<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "iitmandiur036";
	$dbname = "online_cab_system";
	$id = $_SESSION["idd"];
	#echo $id;
	$db_con = mysqli_connect($servername, $username, $password, $dbname);
		if (!$db_con) {
	    	die("Connection failed: " . mysqli_connect_error());
		}
	$sql = "UPDATE `booking` SET `active`='false' WHERE `driver_id` = '$id'";
	if(mysqli_query($db_con, $sql)) {
		echo "Executing login queries"."<br>";	
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($db_con);
	header('location:driver.php');
?>