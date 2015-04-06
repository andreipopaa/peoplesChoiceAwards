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

  // delete data from when the project was previously opened
  $sql = "DELETE FROM APDH_userProject where projectID = '" . $projectID . "'";
  if ($conn->query($sql) === TRUE) {
    echo "Update successful.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // select all users
  $sql = "SELECT id, username FROM APDH_users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
      if ($row["username"] != "Admin") {
        // 
        $sql = "INSERT INTO APDH_userProject (projectID, userID) VALUES('" . $projectID . "', '" . $row["id"] . "')";
        if ($conn->query($sql) === TRUE) {
          echo "Update successful.";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
  }

  $sql = "UPDATE APDH_projects SET open = true where id = '" . $projectID . "'";
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