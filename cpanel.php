<?php 
  
set_time_limit(60); 

# random number for cookie file 
$rand = rand(1,1000000); 

$post_data['login_theme'] = 'cpanel';
$post_data['goto_uri'] = '/';

//traverse array and prepare data for posting (key1=value1)
foreach ( $post_data as $key => $value) {
    $post_items[] = $key . '=' . $value;
}

//create the final string to be posted using implode()
$post_string = implode ('&', $post_items);

//create cURL connection
$curl_connection =
  curl_init('http://'.$server.'.heliohost.org:2082/login');

//set options
curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl_connection, CURLOPT_USERAGENT,
  "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

//set data to be posted
curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);

//perform our request
$result = curl_exec($curl_connection);

// get request information
$getinfo = curl_getinfo($curl_connection);
$info = explode("post_login", $getinfo['url']);
if(isset($info[1])) {
       
	// Success
	session_start();
		$_SESSION['username'] = $post_data['user'];
		$_SESSION['password'] = $post_data['pass'];
		$_SESSION['server'] = $server;
 	 
		if (isset($_POST['remember']) && (!isset($_COOKIE['username']) || $_COOKIE['username'] == '')) {
			setcookie ("Username", $user_name, time() + 1209600); // Two Weeks
			setcookie ("Password", $user_pass, time() + 1209600); // Two Weeks
			setcookie ("Server", $server, time() + 1209600); // Two Weeks
		}
  
	header('location:./');
	
}else{
	
	// Fail
    header("location:login.php?error=1");
    
}

// For debugging purposes:
// echo curl_errno($curl_connection) . '-' .
//                curl_error($curl_connection);

//close the connection
curl_close($curl_connection);
?> 