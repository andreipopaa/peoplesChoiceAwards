<?PHP
	session_start();
	session_destroy();
echo "here";
	$url = "Location: project5home.php";
	header($url);
?>