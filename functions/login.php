<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
  setcookie("email", $_POST['email'], time()+36000, "/bots/", $_SERVER['HTTP_HOST'], 1);
  setcookie("password", hash('sha512', $_POST['password']), time()+36000, "/bots/", $_SERVER['HTTP_HOST'], 1);
}
header("Location: ../");
?>
