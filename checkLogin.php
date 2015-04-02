<?php

session_start();

$enternedUsername = $_POST['username'];
$enternedPassword = $_POST['password'];

if(true){
	$_SESSION['username'] = $enternedUsername;
	$_SESSION['password'] = $enternedPassword; 
	$_SESSION['login'] = true;
	if($enternedUsername == 'Admin'){
                $url = "Location: Admin.php";
                header($url);
                exit;
	} else {

		$url = "Location: peoplechoice.php";
		header($url);
		exit;
	}
}
