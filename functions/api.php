<?php
$q=null;
if(isset($_GET['q'])) {
  $q=$_GET['q'];
}
if(isset($_POST['q'])) {
  $q=$_POST['q'];
}
if(isset($_POST['song'])) {
  $bid=$_POST['id'];
  if ($_POST['action'] == "play") {
    $q="bot/use/$bid/(/play/".urlencode($_POST['song']).")";
  }
  if ($_POST['action'] == "add") {
    $q="bot/use/$bid/(/add/".urlencode($_POST['song']).")";
  }
}

$url = 'http://127.0.0.1:58913/api/'.$q;

//Your username.
$username = 'ADM2hYgsXkhH6hH48e8gSXd4cRY=';

//Your password.
$password = 'W3mQTSv2OEWwPqaVnCTuPc8ta5x0PcEx';

//Initiate cURL.
$ch = curl_init($url);

//Specify the username and password using the CURLOPT_USERPWD option.
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);

//Tell cURL to return the output as a string instead
//of dumping it to the browser.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Execute the cURL request.
$response = curl_exec($ch);

//Check for errors.
if(curl_errno($ch)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($ch));
}

//Print out the response.
header('Content-Type: application/json');
echo $response;

//BOTINFO: bot/use/%id%/(/json/merge/(/bot/info)/(/song)/(/repeat)/(/random)/(/volume))
?>
