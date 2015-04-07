<!DOCTYPE html>
<html lang="en-US">
<head>
        <script type="text/javascript" src="http://judah/~hensche/Project3/jquery-2.1.3.js"></script>
        <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/dark-hive/jquery-ui.css">

        <title>Vote</title>
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

</head>
<body>
  <div id="wrapper">
        <header>
                <img src="PeoplesChoiceLabel.jpg" alt="peoples choice" style="width:560px;height:282px">
        </header>
        <nav>
                <?php
                  $_SESSION['voteProjID'] = $_POST['voteproject'];
                        if(isset($_SESSION['username'])){
                            echo 'Welcome, '.$_SESSION['username'];
                        } else {
                            echo 'Please log in.';
                        }
                ?>
                <form method = "post" action = "logout.php">
                    <button class type="submit" name = "logout">Logout</button>
                </form>
        </nav>
        <main>
            <form method="post" action="storeVotes.php">
              <p>
                <label for="first">First Place:</label>
                <select id ="first" type="vote1st" name="vote1st">
                      <?php include 'voteFor.php'; ?>
                </select>

                <label for="second">Second Place:</label>
                <select id ="second" type="vote2nd" name="vote2nd">
                      <?php include 'voteFor.php'; ?>
                </select>

                <label for="third">Third Place:</label>
                <select id ="third" type="vote3rd" name="vote3rd">
                      <?php include 'voteFor.php'; ?>
                </select>
              </p>

              <input type = "submit" name = "Vote"></input>
            </form>
        </main>
        <footer>
          <a href="http://judah.cedarville.edu/peopleschoice/index.php">Peoples Choice</a>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>
    </div>
</body>
</html>