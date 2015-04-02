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
		<form method = "post" action = "checkLogin.php">
			<p> 
				<label for="username">Username:</label>
				<input type="text" name = "username"></input>
				<label for="password">password:</label>
                                <input type="password" name = "password"></input>
				<input type = "submit" name = "login"></input>
			</p>
		</form>
		
        </nav>
        <main>

        </main>
        <footer>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>
</body>
</html>

