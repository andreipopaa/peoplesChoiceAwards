<?php

  session_start();
 
  $servername = "james";
  $username = "cs4220";
  $password = "";
  $dbname = "cs4220";
  $projectID = $_POST['open-proj'];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE APDH_projects SET open = false where id = '" . $projectID . "'";
  if ($conn->query($sql) === TRUE) {
        echo "Update successful.";
  } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

  $url = "Location: Admin.php";
  header($url);
  exit;
  //this db code is from the w3schools website
?>