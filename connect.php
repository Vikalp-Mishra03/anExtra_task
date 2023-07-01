<?php
	$name = $_POST['name'];
	$age = $_POST['age'];
	$weight = $_POST['weight'];
	$email = $_POST['email'];
	$health_report = $_POST['health_report'];


	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into healths(name, age, weight, email, health_report) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("siiss", $name, $age, $weight, $email, $health_report);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>