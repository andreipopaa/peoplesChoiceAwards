<?PHP
	session_start();
	session_destroy();

	$url = "Location: project5home.php";
	header($url);
?>