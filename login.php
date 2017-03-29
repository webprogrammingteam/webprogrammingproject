<?php
	session_start();

	$host="localhost"; // Host name
	$user="root"; // Mysql username
	$pwd="root"; // Mysql password
	$db_name="online_store"; // Database name

	// Connect to server and select databse.
	$con=mysqli_connect($host, $user, $pwd, $db_name);

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	//echo "Connected to MySQL </br>";

	$email = $_POST['email'];
	$password = $_POST['password'];



	$query = "SELECT * FROM users";// WHERE users.email=\"$email\"";
	//echo $query;

	if ($result=mysqli_query($con,$query))
	{
		// Return the number of rows in result set
		$rowcount=mysqli_num_rows($result);
		if($rowcount>0){
			$row = mysqli_fetch_array($result);
			echo $row;
			// if($row["password"]==$password){
			// 	$_SESSION["username"] = "$username";
			// 	$_SESSION["img"] = $row["power_animal"];
			// 	$_SESSION["fullname"] =$row["fullname"];
			// 	//header("Location: welcome.php");
			// 	exit();
			// }
		}
		header("Location: homepage.html");
		exit();


	mysqli_free_result($result);
	}
	else{
		echo "can't connect </br>";
		exit();
	}
		mysqli_close($con);

?>
