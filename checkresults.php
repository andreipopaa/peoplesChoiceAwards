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
        <title>Project 5 Homepage</title>
        <?php
                session_start();
        ?>

</head>
<body>
    <div id = "wrapper">
        <header>
                <h1>People's Choice Awards</h1>
        </header>
        <nav>
                <?php
                        if(isset($_SESSION['username'])){
                                echo 'Welcome, '.$_SESSION['username'];
                        } else {
                                echo 'Please log in.';
                        }
                ?>
                <form method = "post" action = "checkresults.php">
                        <select id = "projectResults" name="projectResults">
                                <option value="Project1">Project1</option>
                                <option value="Project2">Project2</option>
                                <option value="Project3">Project3</option>
                                <option value="Project4">Project4</option>
                                <option value="Project5">Project5</option>
                                <option value="Project6">Project6</option>
                                <option value="Project7">Project7</option>
                        </select>
                        <input type="submit" value="check results">
                </form>
		<br/>
	        <form method = "post" action = "vote.php">
                        <select id="voteproject" name="voteproject">
                                <option value="Project1">Project1</option>
                                <option value="Project2">Project2</option>
                                <option value="Project3">Project3</option>
                                <option value="Project4">Project4</option>
                                <option value="Project5">Project5</option>
                                <option value="Project6">Project6</option>
                                <option value="Project7">Project7</option>
                        </select>
                        <input type="submit" value="vote for project">
                </form>
        </nav>
        <main>
		<?php
			$currentProjResults = $_POST['projectResults'];
			echo 'You are viewing the results of '.$currentProjResults;

			//now fill space with ppl and results from data base

		?>

        </main>
        <footer>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>
      </div>
</body>
</html>
