<?php
  setcookie("email", "", time()-36000, "/bots/", $_SERVER['HTTP_HOST'], 1);
  setcookie("password", "", time()-36000, "/bots/", $_SERVER['HTTP_HOST'], 1);
header("Location: ../");
?>
