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
                        } else {
                                echo 'Please log in.';
                        }
                ?>
                <form method = "post" action = "checkresults.php">
			<select name="projectResults">
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
                        <select name="projectResults">
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

        </main>
        <footer>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>
</body>
</html>

