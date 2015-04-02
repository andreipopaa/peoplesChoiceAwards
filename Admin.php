
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
</body>

