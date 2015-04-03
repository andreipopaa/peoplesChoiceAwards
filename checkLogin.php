<?php

session_start();
$success = false;
$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

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

$sql = "SELECT password FROM APDH_users where username = '" . $enteredUsername . "'";
$result = $conn->query($sql);
$data = null;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
    	 $data = $row['password'];
        echo $enteredUsername. ": " . $data . "\n";
    }
} else {
    echo "0 results";
}

$conn->close();

if ($enteredPassword == $data) {
	$success = true; 
}

if($success){
	$_SESSION['username'] = $enteredUsername;
	$_SESSION['password'] = $enteredPassword; 
	$_SESSION['login'] = true;
	if($enteredUsername == 'Admin'){
                $url = "Location: Admin.php";
                header($url);
                exit;
	} else {

		$url = "Location: peoplechoice.php";
		header($url);
		exit;
	}
} else {
	$url = "Location: project5home.php";
	header($url);
}

?>