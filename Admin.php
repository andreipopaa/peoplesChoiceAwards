
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
      $( "#open-proj" ).selectmenu();
      $( "#projectResults" ).selectmenu();
      $( "#projectResults" ).selectmenu();
      $( "#removeStudent" ).selectmenu();
      removeStudent
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

    <script src="http://judah/~hensche/Project5/Project5.js"></script>
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
            $username = $_SESSION['username'];
                    if(isset($username)){
                            if($username != 'Admin'){
                        $url = "Location: project5home.php";
                        header($url);
                        exit;
            } else {
                echo 'Welcome to the admin page';
            }
                    } else {
                             $url = "Location: project5home.php";
                             header($url);
                             exit;
                    }
            ?>
            <form method = "post" action = "logout.php">
                <button type="submit" name = "logout">Logout</button>
            </form> <br/>

            <form method = "post" action = "openProject.php">
                <select id="open-proj" name="open-proj">
                        <option value="1">Project1</option>
                        <option value="2">Project2</option>
                        <option value="3">Project3</option>
                        <option value="4">Project4</option>
                        <option value="5">Project5</option>
                        <option value="6">Project6</option>
                        <option value="7">Project7</option>
                </select>
                <input type="submit" name="open" value="Open Project"></input>
                <input type="submit" name="close" formaction= "closeProject.php" value="Close Project"></input>
            </form>
            <br/>

            <form method = "post" action = "maketeams.php">
                    <select id = "projectResults" name="projectResults">
                            <option value="1">Project1</option>
                            <option value="2">Project2</option>
                            <option value="3">Project3</option>
                            <option value="4">Project4</option>
                            <option value="5">Project5</option>
                            <option value="6">Project6</option>
                            <option value="7">Project7</option>
                    </select>
                    <input type="submit" name="submitteams" value="Make Teams">
            </form>

            <form method = "post" action = "newUser.php" onsubmit = "return validateForm()">
                <br>
                <label for = "username">New Username:<label>
                            <input id = "txtUserName" type="text" name="username">
                <br>
                <label for = "password">Please enter Passpword:<label>
                            <input id ="txtNewPassword" type ="password" name = "newPassword">
                            <br>
                            <label for = "password2">Please re-enter Passpword:<label>
                            <input id ="txtConfirmPassword" type ="password" name = "confirmPassword" onchange = "checkPasswordMatch();">
                <br>
                <input type="submit" value="Make New User">
                <br>
            </form>

            <form method = "post" action = "removeStudent.php">
                    <select id = "removeStudent" name="removeStudent">
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
                            while($row = $result->fetch_assoc()) {
                                echo '<option value ="' . $row["username"]. '">'. $row["username"].'</option>';
                            }
                        } else {
                                echo "0 results";
                        }
                        $conn->close();
                    ?>
                    </select>
                    <input type="submit" value="Remove User">
            </form>
        </nav>
        <main>

        </main>
        <footer>
                <a href="http://judah.cedarville.edu/peopleschoice/index.php">Peoples Choice</a>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>
      </div>
</body>
