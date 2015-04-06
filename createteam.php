<?php 
	session_start();

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
    
    // find highest team number that's already in use. if null, then start at 1 if not increment it by 1 to use it
    $sql = "SELECT MAX(team) as teamNum FROM APDH_userProject where projectID = '" . $_SESSION['projectID'] . "'";
    $result = $conn->query($sql);
    $teamNum = 1;
    if ($result->num_rows > 0) {$_SESSION['user'] = "here";
	  	if ($result->num_rows > 0) {
		    while($row = $result->fetch_array()) {
		    	$currTeamNum = $row["teamNum"];
		    	if ( $currTeamNum >= 1) {
			    	$teamNum = $currTeamNum + 1;
			    }
		    }
		} else {
		    echo "Error";
		}	    
	} else {
	    echo "0 results";
	}

    if(isset($_POST['submit'])) {
		if(!empty($_POST['check_list'])) {
			// for each user in a team, find its id and update the team value in APDH_userProject
		    foreach($_POST['check_list'] as $user) {
		        $sql = "SELECT id FROM APDH_users where username = '" . $user . "'";
				$result = $conn->query($sql);
				$id = null;
				if ($result->num_rows > 0) {
				    while($row = $result->fetch_array()) {
				    	$id = $row['id']; 
				    	$sql = "UPDATE APDH_userProject SET team = " . $teamNum . " where userID = '" . $id . "' AND projectID = '" . $_SESSION['projectID'] . "'";
						if ($conn->query($sql) === TRUE) {
					    		echo "Update successful.";
						} else {
					    		echo "Error: " . $sql . "<br>" . $conn->error;
						}
				    }
				} else {
				    echo "Error";
				}	
		   	}
		}
		else {echo "Error";} 
	} else {
		echo "Error";
	}
    
    $conn->close();

    $url = "Location: maketeams.php";
	header($url);
	exit;
?>     