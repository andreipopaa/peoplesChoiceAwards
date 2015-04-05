<?php

        session_start();
        $enteredusername = $_POST['removeStudent'];
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

	// sql to delete a record
	$sql = "DELETE FROM APDH_users WHERE username='".$enteredusername."'";

	if ($conn->query($sql) === TRUE) {
   		 echo "Record deleted successfully";
	} else {
    		echo "Error deleting record: " . $conn->error;
	}

        $conn->close();

	$url = "Location: Admin.php";
	header($url);
	exit;
?>
