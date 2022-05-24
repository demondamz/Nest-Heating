<?php
// Edit these variables
// please enter your Email address and password connected with your nest account 
// the access key is an important part of the setup, the key is a security feature on the file so not just anyone can access your script  
// take note of your key as you will need it later 
$access_key = "10iq7Pq42f7";
$nest_username = "youremail@ddress.com";
$nest_password = "yourpassword";

require_once('nest-php-api.php');

$date = new DateTime();
$str_date = $date->format('Y-m-d H:i:s');
// Check if a key has been sent?
if (empty($_GET['key'])) {
	$return = json_encode( array("error"=>array( "code"=>401, "text"=>"Access Denied", "message"=>"The key was missing" )));
} 
// If it has check if it is correct
else if ($_GET['key']==$access_key) {
	$nest = new Nest($nest_username,$nest_password);
	// how long do you want the water to boost for i have mine set for 30min 
	$return = $nest->setHotWaterBoost(30);
} 
//If not correct one has been passed but it is wrong
else {
	$return = json_encode( array("error"=>array( "code"=>401, "text"=>"Access Denied", "message"=>"The key was wrong" )));
}

// return json response and log to testing file
echo $return;
file_put_contents("test.txt","$str_date  $return", FILE_APPEND);

?>