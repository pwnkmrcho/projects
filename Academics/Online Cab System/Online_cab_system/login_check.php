<?php
	$servername = "localhost";
	$username = "root";
	$password = "iitmandiur036";
	$dbname = "online_cab_system";
	$flag = true;
	$tablename = '';
		
	if($_POST[user] == 'passenger') {
		$tablename = '`passenger_login`';
		$tag = 'passenger_id';
	}
	if($_POST[user] == 'driver') {
		$tablename = '`driver_login`';
		$tag = 'driver_id';
	}
	if($_POST[user] == 'external_owner') {
		$tablename = '`external_owner_login`';
		$tag = 'external_owner_id';
	}

	$db_con = mysqli_connect($servername, $username, $password, $dbname);
	if (!$db_con) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	mysqli_autocommit($db_con, false);

	$sql = "SELECT $tag FROM $tablename WHERE `email_id` = '$_POST[email_id]' and `password` = '$_POST[password]'";
	if(mysqli_query($db_con, $sql)) {
		echo "Executing login queries"."<br>";	
	}
	else {
		$flag=false;
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	$result = mysqli_query($db_con, $sql);
	if(mysqli_num_rows($result)==0){
		#echo "incorrect username password<br>";
		//exit;
		session_start();
		session_unset();
		$_SESSION["login_error"]="Wrong email-id or password";
		header('location:login.php'); 
	} else {
		$id = mysqli_fetch_assoc($result);
		$user_id = $id[$tag];
		session_start();
		session_unset();
		$_SESSION["user"] = $_POST[user];
		$_SESSION["idd"] = $user_id;
		$_SESSION["email"] = $_POST[email_id];
		echo "session created";
		echo "<br>".$_SESSION["user"]."<br>";
		echo "<br>".$_SESSION["id"]."<br>";
		if($flag){
			mysqli_commit($db_con);
			echo "All queries were executed successfully";
		} else {
			mysqli_rollback($db_con);
			echo "All queries were rolled back";
		}
		if($_POST[user] == 'passenger'){
			header('location:booking.php'); 
		} else if($_POST[user] == 'external_owner') {
			header('location:external_contract.php');
		} else {
			header('location:driver.php'); 
		}
	}
	mysqli_close($db_con);

?>
