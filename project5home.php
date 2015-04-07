<!DOCTYPE html>
<html lang="en-US">
<head>
      <script type="text/javascript" src="http://judah/~hensche/Project3/jquery-2.1.3.js"></script>
      <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

      <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/dark-hive/jquery-ui.css">

      <title>Project 5 Homepage</title>
      <?php
              session_start();
      ?>
      <script>
      $(function() {
        $( "input[type=submit], a, button" )
          .button()
        
      });
      </script>
      <script>
      $(function() {
        $( "#username" ).selectmenu();

      });
      </script>
      <style>
        fieldset {
          border: 0;
        }
        label {
          display: block;
          margin: 30px 0 0 0;
        }
        select {
          width: 200px;
        }
        .overflow {
          height: 200px;
        }
      </style>

      <link rel="stylesheet" href="http://judah/~hensche/Project5/Project5.css">

        <title>Project 5 Homepage</title>
	<?php
		session_start();
	?>

</head>
<body>
    <div id="wrapper">
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
				<select id ="username" type="username" name="username">
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
          <a href="http://judah.cedarville.edu/peopleschoice/index.php">Peoples Choice</a>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>

    </div>
</body>
</html>
