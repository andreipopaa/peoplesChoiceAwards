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
        $( "#projectResults" ).selectmenu();

        $( "#voteproject" ).selectmenu();

        $( "#number" )
          .selectmenu()
          .selectmenu( "menuWidget" )
            .addClass( "overflow" );
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
                        $url = "Location: Admin.php";
                        header($url);
                        exit;
                    }

                    $conn->close();
                ?>
                <input type="submit" name="submit" value="Make Team">
            </form>
        </main>
        <footer>
          <a href="http://judah.cedarville.edu/peopleschoice/index.php">Peoples Choice</a>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>
      </div>
</body>
