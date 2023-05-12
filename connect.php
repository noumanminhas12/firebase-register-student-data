

<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	

	$conn = new mysqli('localhost','root','','students');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into student(firstName, lastName, email, gender) values(?, ?, ?, ?,)");
		$stmt->bind_param("ssss", $firstName, $lastName, $email, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "your registration done successfully";
		$stmt->close();
		$conn->close();
	}
?>