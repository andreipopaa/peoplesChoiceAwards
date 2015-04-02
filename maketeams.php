CTYPE html>
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
			$project = $_POST['projectResults'];
                        if(isset($username)){
                                if($username != 'Admin'){

                                } else {
                                        echo 'its time to make teams for ' .$project;
                                }
                        } else {
                                
                        }
                ?>
                <form method = "post" action = "maketeams.php">
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

