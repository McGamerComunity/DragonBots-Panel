<?php
$allowlogin=false;
  $mysql= new mysqli("88.99.68.154", "root", "o1Ge6PDJ6TAkwQ5ocPNs", "dhbotpanel");
  if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
}
if (!isset($_COOKIE['email'])) {
  $allowlogin=false;
} else {
  $semail=$_COOKIE['email'];
  $user=$mysql->query("SELECT email, password FROM users WHERE email = '$semail'");
  $uinfo=$user->fetch_assoc();
  //die(var_dump($uinfo));
  if (isset($_COOKIE['password'])) {
    if ($_COOKIE['password'] == $uinfo['password']) {
      $allowlogin=true;
    } else {
      $allowlogin=false;
    }
  } else {
    $allowlogin=false;
  }
}
if (!$allowlogin) {
  $user=array(
    'name' => "unknown",
    'email' => "unknown",
    'accounttype' => "none",
    'botcount' => 0,
    'botmax' => 0,
  );
}
 ?>
