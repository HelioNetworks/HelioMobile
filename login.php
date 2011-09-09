<?php
error_reporting(E_ALL ^ E_NOTICE);

if (isset($_POST['username'])) {
	$post_data['user'] = $_POST['username'];
	$post_data['pass'] = $_POST['password'];
	$server = $_POST['server'];
	
	require 'cpanel.php';
	die;
}

if ($_GET['act'] == 'logout') {
	session_start();
	session_destroy();
	setcookie ("Username", "", time() - 1209600); // Two Weeks
	setcookie ("Password", "", time() - 1209600); // Two Weeks
	setcookie ("Server", "", time() - 1209600); // Two Weeks
}

if (isset($_COOKIE['username']) || $_COOKIE['username'] != '') {
	$post_data['user'] = $_POST['username'];
	$post_data['pass'] = $_POST['password'];
	$server = $_POST['server'];
	
	require 'cpanel.php';
	die;
}
?>

<html>

<head>
<title>HelioMobile</title>
<link href="login.css" rel="stylesheet" type="text/css">
<script src="functions.js" type="text/javascript"></script>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link rel="apple-touch-icon" href="images/icon.png"/>
<link href="images/startup.png" rel="apple-touch-startup-image" />
</head>

<body>

<div class="content">
<p class="title"><b>Login</b></p>

<?php 
if (isset($_GET['error'])) { ?>
<p class="error"><b>Login Attempt Failed</b></p>
<?php } ?>

<form method="post" action="login.php">
<table width="300" align="center">
<tr><td><div align="right">Username:</div><td><input type="text" name="username"></td></tr>
<tr><td><div align="right">Password:</div><td><input type="password" name="password"></td></tr>
<tr><td><div align="right">Server:</div><td><select name="server"><option value="stevie">Stevie</option><option value="johnny">Johnny</option></select></td></tr>
</table>
<p align="center"><input type="checkbox" name="remember" id="remember"><label for="remember">Remember Me</label></p>
<p align="center"><input type="submit" value="Login" style="font-weight:bold; font-size:18px;"></p>
</form>

</div>

<br>

<div class="webapp">Install our web app by tapping <img src="images/shareicon.png"><br>and choose 'Add to Home Screen'.</div>