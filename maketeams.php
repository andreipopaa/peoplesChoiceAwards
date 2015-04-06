<html lang="en-US">
<head>
        <title>Project 5 Homepage</title>
        <?php
                session_start();
        ?>
        
</head>
<body>
        <header>
                <h1>People's Choice Awards</h1>
        </header>
        
        <main>
            <form method="post" action="createteam.php">
                <?php
                    $servername = "james";
                    $username = "cs4220";
                    $password = "";
                    $dbname = "cs4220";
                     
                    if(!empty($_POST['projectResults'])){
                        $projectID = $_POST['projectResults'];
                        $_SESSION['projectID'] = $projectID;
                    }      
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                        
                    $sql = "SELECT username FROM APDH_userProject as up left join APDH_users as u ON up.userID = u.id WHERE team IS NULL AND projectID = '" . $_SESSION['projectID'] . "'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_array()) {
                            if ($row["username"] != "Admin") {
                                echo '<p><input type=\'checkbox\' name=\'check_list[]\' value ="' . $row["username"] . '">'. $row["username"].'</input></p>';
                            }
                        }
                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                ?>
                <input type="submit" name="submit" value="Make Team">                 
            </form>
        </main>
        <footer>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>
</body>

