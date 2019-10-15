<?php
	include 'DBConfig.php';
	$dataInput = file_get_contents('php://input');
	$data = json_decode($dataInput, true); 
	$sql1 = "SELECT * FROM users WHERE name = '".$data["name"]."' OR email = '".$data["email"]."'";
	$sql = "INSERT INTO users (email, name, pass) VALUES ('".$data["email"]."','".$data["name"]."','".$data["pass"]."')";
	$result = mysqli_query($conn, $sql1);
	if(mysqli_num_rows($result) < 1) {
		if (mysqli_query($conn, $sql)) {		
		    $json = array( 
				"status" => 1, 
				"message" => "Success",
			);		
		} else {
		    $json = array( 
				"status" => 0, 
				"message" => "Fail",
			);
		}
	} else {
		$json = array( 
			"status" => 0, 
			"message" => "123",
		);
	}
	echo json_encode($json);
	$conn->close();
?>