<!DOCTYPE html>
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
        <nav>
                <?php 
                	if(isset($_SESSION['username'])){
						echo 'Welcome, '.$_SESSION['username'];
            echo '<form method="post" action = "logout.php">';
            echo '<button type="submit" name="logout">Logout</button>';
            echo '</form>';
					} else {
						echo 'Please log in.';
					}
                ?>

		<form method="post" action="checkLogin.php">
			<p> 
				<label for="username">Username:</label>
				<select type="username" name="username">
	            <?php
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
	                
	                $sql = "SELECT username FROM APDH_users";
	                $result = $conn->query($sql);

	                if ($result->num_rows > 0) {
                        // output data of each row
	                    while($row = $result->fetch_array()) {
	                        echo '<option value ="' . $row["username"] . '">'. $row["username"].'</option>';
	                    }
	                } else {
                        echo "0 results";
	                }
	                 $conn->close();
	            ?>                        
	            </select>
				<label for="password">password:</label>
                    <input type="password" name = "password"></input>
				<input type = "submit" name = "login"></input>
			</p>
		</form>
		
        </nav>
        <main>
            <?php include 'createTable.php'; ?>
        </main>
        <footer>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>
</body>
</html>

