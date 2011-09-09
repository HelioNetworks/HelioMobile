<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
?>

<html>

<head>
<title>HelioMobile</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script src="functions.js" type="text/javascript"></script>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link rel="apple-touch-icon" href="images/icon.png"/>
<link href="images/startup.png" rel="apple-touch-startup-image" />
</head>

<body>

<table class="header" cellspacing="0" cellpadding="0"><tr>
<td width="120"><center><a href="about.php"><img src="images/aboutbutton.png" border="0"></a></center></td>
<td valign="middle"><a href="./" style="text-decoration:none; color:#fff;">HelioMobile</a>
</td>
<td width="120"><center><a href="login.php?act=logout"><img src="images/logoutbutton.png" border="0"></a></center></td>
</tr></table>
<iframe name='cpupdate' src='http://www.heliohost.org/scripts/renew.php?fromcpanel=1&username=jje' width='1' height='1' frameborder='0'></iframe> 

</body>