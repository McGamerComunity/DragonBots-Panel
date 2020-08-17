<?php
function getHtml($url, $post = null) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    if(!empty($post)) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$allowlogin=false;
  $mysql= new mysqli("88.99.68.154", "root", "o1Ge6PDJ6TAkwQ5ocPNs", "dhbotpanel");
  if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
}
if (!isset($_COOKIE['email'])) {
  $allowlogin=false;
} else {
  $semail=$_COOKIE['email'];
  $user=$mysql->query("SELECT * FROM users WHERE email = '$semail'");
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
  $bprefix="";
  $bexists=false;
if ($allowlogin) {
  $bcreate=false;
  if ($uinfo['botmax'] == "-1") {
    $bcreate=true;
  } else {
    if ($uinfo['botcount'] >= $uinfo['botmax']) {
      $bcreate=false;
    } else {
      $bcreate=true;
    }
  }
  if ($bcreate) {
    if ($uinfo['acttype'] != "Admin") {
      $bid=$uinfo['botcount']+1;
      if ($bid < 10) {
        $bprefix=$uinfo['name'] . "_" . "00" . $bid;
      } else
      if ($bid < 100) {
        $bprefix=$uinfo['name'] . "_" . "0" . $bid;
      } else
      if ($bid < 1000) {
        $bprefix=$uinfo['name'] . "_" . "" . $bid;
      }
      $userid=$uinfo['id'];
    } else {
      $bprefix=$_POST['bid'];
      $bp=explode("_", $bprefix);
      $userid=$bp['0'];
      $userb=$mysql->query("SELECT * FROM users WHERE name = '$userid'");
      $userc=$userb->fetch_assoc();
      $bid=$userc['botcount']+1;
      $userid=$userc['id'];
    }
    $bots=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/list"), true);
    foreach ($bots as $key => $value) {
      if ($value['Name'] == $bprefix) {
        $bexists=true;
      }
    }
    if (!$bexists) {
      $connaddr=$_POST['saddr'];
      $connname=urlencode(str_replace(" ", "%20", $_POST['cname']));
      $connpass=$_POST['spw'];
      getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=settings/create/$bprefix");
      getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=settings/bot/set/$bprefix/connect.address/$connaddr");
      getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=settings/bot/set/$bprefix/connect.name/$connname");
      getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=settings/bot/set/$bprefix/connect.server_password.pw/$connpass");
      getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=settings/bot/set/$bprefix/audio.bitrate/64");
      $mysql->query("UPDATE users SET botcount=$bid WHERE id=$userid");
    }
  }
}
header("Location: ../products.php")
?>
