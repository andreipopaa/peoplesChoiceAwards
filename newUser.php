<?php

	session_start();
	$enternedusername = $_POST['username'];
	$enternedPassword = $_POST['newPassword'];
	$id = rand(100, 999);
	$servername = "james";
	$username = "cs4220";
	$password = "";
	$dbname = "cs4220";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO APDH_users (id, username, password) VALUES('" . $id . "', '" . $enternedusername . "', '" . $enternedPassword . "')";

	if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";
	} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


   $url = "Location: Admin.php";
   header($url);
   exit;
	//this db code is from the w3schools website
?>
