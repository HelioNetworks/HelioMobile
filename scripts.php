<?php
require 'header.php';
echo "<br>";

if (!isset($_GET['go'])) {
	?>
	
	<table class="content" align="center" style="height:40px; cursor:pointer;" onclick="window.location='scripts.php?go=renew'"><tr><td><b>Account Renewal</b></td></tr></table>
	<br>
	<table class="content" align="center" style="height:40px; cursor:pointer;" onclick="window.location='scripts.php?go=domain'"><tr><td><b>Domain Change</b></td></tr></table>
	<br>
	<table class="content" align="center" style="height:40px; cursor:pointer;" onclick="window.location='scripts.php?go=dns'"><tr><td><b>DNS Records</b></td></tr></table>
	<br>
	<table class="content" align="center" style="height:40px; cursor:pointer;" onclick="window.location='scripts.php?go=status'"><tr><td><b>Creation Status</b></td></tr></table>
	<br>
	<table class="content" align="center" style="height:40px; cursor:pointer;" onclick="window.location='scripts.php?go=delete'"><tr><td><b>Account Deletion</b></td></tr></table>
	
	<?php
}elseif ($_GET['go'] != 'dns' && $_GET['go'] != 'delete') {
	?>
	
	<table class="content" style="background-color:#F5F1E5;" align="center"><tr><td>
	<IFRAME src="http://www.heliohost.org/scripts/<?php echo $_GET['go']; ?>.php" WIDTH="100%" HEIGHT="300" SCROLLING="no" FRAMEBORDER="0" BORDER="0">Your mobile device does not support this script.</IFRAME>
	</td></tr></table>
	
	
	<?php
}elseif ($_GET['go'] == 'dns') {
	?>
	
	<table class="content" align="center"><tr><td>
	<IFRAME src="http://byrondallas.heliohost.org/php/tools/dns_records.php" WIDTH="100%" HEIGHT="300" SCROLLING="no" FRAMEBORDER="0" BORDER="0">Your mobile device does not support this script.</IFRAME>
	</td></tr></table>
	
	<?php
}elseif ($_GET['go'] == 'delete') {
	?>
	
	<table class="content" align="center"><tr><td>
	Sorry, but we do not allow you to delete your account from your mobile.
	We believe that you should take deleting your account very seriously,
	therefore please perform this action from your computer. Thank you.
	</td></tr></table>
	
	<?php
}
?>