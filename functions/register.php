<?php
$mysql= new mysqli("88.99.68.154", "root", "o1Ge6PDJ6TAkwQ5ocPNs", "dhbotpanel");
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error."<br><br>"."Please check our connection status: https://dragon-host.eu/status <br>or contact our support at https://dragon-host.eu/support");
}
$userexists=false;
if (isset($_POST['email']) && isset($_POST['password'])) {
  $semail=$_POST['email'];
  $user=$mysql->query("SELECT email FROM users WHERE email = '$semail'");
  //die(var_dump($user));
  if ($user->num_rows > 0) {
    $userexists=true;
  } else {
    if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['password'])) {
      $passwd=hash('sha512', $_POST['password']);
      $email=$_POST['email'];
      $name=$_POST['name'];
      $result=$mysql->query("INSERT INTO users (email, password, name, acttype, botcount, botmax) VALUES ('$email', '$passwd', '$name', 'Free', 0, 3)");
      header("Location: ../login.php?ec=9053");
    }
  }
}
if ($userexists) {
  header("Location: ../register.php?ec=5634");
}

?>
