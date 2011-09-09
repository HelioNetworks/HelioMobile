<?php
require 'header.php';
?>

<br>

<table class="content" align="center"><tr><td>
<p>Your last login date has been set to the current time. Your account will remain active for another 30 days.</p>

<?php
        if ($_SESSION['server'] == 'stevie'){
          $serverid = 2;
        }elseif ($_SESSION['server'] == 'johnny'){
          $serverid = 1;
        }
          
       
       ini_set("default_socket_timeout","05");
       $f=fopen("http://area5".$serverid.".heliohost.org/serverstatus/","r");
       $r=fread($f,1000);
       fclose($f);
       if(strlen($r)>1) {
         echo "<img src=images/online.png>HTTP";
       }else{
         echo "<img src=images/offline.png>HTTP";
       }
        
        $ftptest = ftp_connect('ftp.area5'.$serverid.'.heliohost.org');
        
        if (!$ftptest){
          echo "&nbsp; &nbsp; &nbsp; <img src=images/offline.png>FTP";
        }else{
          echo "&nbsp; &nbsp; &nbsp; <img src=images/online.png>FTP";
        }
        
        ini_set('mysql.connect_timeout', 5); 
        $mysqltest = mysql_connect($_SESSION["server"].'.heliohost.org', 'area5'.$serverid.'_mobile', 'test123');
        
        if (!$mysqltest){
          echo "&nbsp; &nbsp; &nbsp; <img src=images/offline.png>MySQL";
        }else{
          echo "&nbsp; &nbsp; &nbsp; <img src=images/online.png>MySQL";
        }
        
?>

</td></tr></table>

<br>

<table class="content" align="center"><tr>
<td valign="middle"><img src="images/twitter.png"></td>
<td>

<?php 
function get_status($twitter_id, $hyperlinks = true) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://twitter.com/statuses/user_timeline/$twitter_id.xml?count=1");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $src = curl_exec($ch);
    curl_close($ch);
    preg_match('/<text>(.*)<\/text>/', $src, $m);
    $status = htmlentities($m[1]);
    if( $hyperlinks ) $status = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a target=\"_parent\" href=\"\\0\">\\0</a>", $status);
    return($status);
}

echo get_status('Heliohost');
?>

</td>
</tr></table>

<font size="1"><br></font>

<table class="buttons" align="center" cellpadding="6"><tr>
<td width="33%"><div class="content" onclick="window.location='scripts.php'" style="cursor:pointer;">Scripts</div></td>
<td width="33%"><div class="content" onclick="window.location='http://www.heliohost.org/'" style="cursor:pointer;">HelioHost</div></td>
<td width="33%"><div class="content" onclick="window.location='http://www.helionet.org/'" style="cursor:pointer;">HelioNet</div></td>
</tr></table>

<table class="buttons" align="center" cellpadding="6"><tr>
<td width="33%"><div class="content" onclick="window.location='http://<?php echo $_SESSION['server']; ?>.heliohost.org:2082'" style="cursor:pointer;">cPanel</div></td>
<td width="33%"><div class="content" onclick="window.location='http;//central.heliopanel.heliohost.org'" style="cursor:pointer;">HelioPanel</div></td>
</tr></table>