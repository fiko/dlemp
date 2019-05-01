<?php


$hostname = 'mysql'; // This is the hostname, base on mysql image on docker-compose.yml
$username = 'admin'; // username on mysql database
$password = 'admin'; // password of mysql's username


// connection to database
$conn = mysqli_connect($hostname, $username, $password);

// succeed connection
$alert = "You are <strong><font color=\"green\">Connected</font></strong> to Database! :-)";
// if connection failed, succeed message will change to this error message
$alert = $conn? $alert: "You are <strong><font color=\"red\">NOT Connected</font></strong> to Database! :-(";



/**
 * ========================================
 * Alert will be showed down here
 * ========================================
 */ ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title><?=$alert?></title>
</head>
<body>
	<div class="white-box">
		<h1><?=$alert?></h1>
	</div>
</body>
</html>