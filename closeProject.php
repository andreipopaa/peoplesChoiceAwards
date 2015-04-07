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

  $sql = "SELECT userID, total FROM APDH_userProject";
  $result = $conn->query($sql);

// set ranks for top three users
  $max = 0;
  $second = 0;
  $third = 0;
  if ($result->num_rows > 0) {
        // output data of each row
      while($row = $result->fetch_array()) {
        $tot = $row['total'];
          if ($tot > $max) {$max = $tot;}
          else if ($tot > $second) {$second = $tot;}
          else if ($tot > $third) {$third = $tot;}
      }
  } else {
        echo "0 results";
  }
  
  $sql = "SELECT userID, total FROM APDH_userProject where projectID = '" . $projectID . "'";
  $result = $conn->query($sql);

// set ranks for top three users
  if ($result->num_rows > 0) {
        // output data of each row
      while($row = $result->fetch_array()) {
        $tot = $row['total']; 
          if ($tot == $max) {
            $sql = "UPDATE APDH_userProject SET userRank = 1 where userID = '" . $row['userID'] . "' and projectID = '" . $projectID . "'";
            $conn->query($sql);
          }
          else if ($tot == $second) {
            $sql = "UPDATE APDH_userProject SET userRank = 2 where userID = '" . $row['userID'] . "' and projectID = '" . $projectID . "'";
            $conn->query($sql);
          }
          else if ($tot == $third) {
            $sql = "UPDATE APDH_userProject SET userRank = 3 where userID = '" . $row['userID'] . "' and projectID = '" . $projectID . "'";
            $conn->query($sql);
          }
      }
  } else {
        echo "0 results";
  }

  $conn->close();

  $url = "Location: Admin.php";
  header($url);
  exit;
  //this db code is from the w3schools website
?>