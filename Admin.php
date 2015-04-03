
<!DOCTYPE html>
<html lang="en-US">
<head>
        <title>Project 5 Homepage</title>
	<script type="text/javascript" src="http://judah/~hensche/Project3/jquery-2.1.3.js"></script>
	<script src="http://judah/~hensche/Project5/Project5.js"></script>
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
                </form>
                <form method = "post" action = "maketeams.php">
                        <select name="projectResults">
                                <option value="Project1">Project1</option>
                                <option value="Project2">Project2</option>
                                <option value="Project3">Project3</option>
                                <option value="Project4">Project4</option>
                                <option value="Project5">Project5</option>
                                <option value="Project6">Project6</option>
                                <option value="Project7">Project7</option>
                        </select>
                        <input type="submit" value="Make Teams">
                </form>
                <br/>

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

        </nav>
        <main>

        </main>
        <footer>
                <h4>Page created by Dillon and Andrei</h4>
        </footer>
</body>

