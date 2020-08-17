<?php
include("auth.php");
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

$bots=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/list"), true);
if ($uinfo['acttype'] == "Admin") {
  echo "
  <thead>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Bot Name</th>
          <th>ServerAdress</th>
          <th>Status</th>
          <th></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Bot Name</th>
        <th>ServerAdress</th>
        <th>Status</th>
        <th></th>
      </tr>
  </tfoot>
  <tbody id=\"dh_bots\">
  ";
  foreach ($bots as $key => $value) {
    $id=$value['Id'];
    $name=$value['Name'];
    $server=$value['Server'];
    $status=null;
    $bot=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=settings/bot/get/$name/connect.name"), true);
    $botname=$bot;
    if ($value['Status'] == 0) {
      $status="<span class=\"label label-danger\">Offline</span>";
      $ssbtn="<button onclick=\"bot('start', '$name')\" class=\"btn btn-success btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
    }
    if ($value['Status'] == 1) {
      $status="<span class=\"label label-warning\">Connecting</span>";
      $ssbtn="<button onclick=\"bot('stop', '$id')\" class=\"btn btn-danger btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
    }
    if ($value['Status'] == 2) {
      $status="<span class=\"label label-success\">Connected</span>";
      $ssbtn="<button onclick=\"bot('stop', '$id')\" class=\"btn btn-danger btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
    }
    echo "
    <tr>
        <td>$id</td>
        <td>$name</td>
        <td>$botname</td>
        <td>$server</td>
        <td>$status</td>
        <td>$ssbtn <a href=\"bot.php?id=$name\"><button class=\"btn btn-primary btn-xs\" type=\"button\"><i class=\"fa fa-gear\"></i></button></a></td>
    </tr>
    ";
  }
} else {
  echo "
  <thead>
      <tr>
          <th>ID</th>
          <th>Bot Name</th>
          <th>ServerAdress</th>
          <th>Status</th>
          <th></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
        <th>ID</th>
        <th>Bot Name</th>
        <th>ServerAdress</th>
        <th>Status</th>
        <th></th>
      </tr>
  </tfoot>
  <tbody id=\"dh_bots\">
  ";
  foreach ($bots as $key => $value) {
    $id=$value['Id'];
    $name=$value['Name'];
    $server=$value['Server'];
    $status=null;
    $check=explode("_", $name);
    if ($check[0] == $uinfo['name']) {
      $bot=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=settings/bot/get/$name/connect.name"), true);
      $botname=$bot;
      $botid=$check[1];
    if ($value['Status'] == 0) {
      $status="<span class=\"label label-danger\">Offline</span>";
      $ssbtn="<button onclick=\"bot('start', '$name')\" class=\"btn btn-success btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
    }
    if ($value['Status'] == 1) {
      $status="<span class=\"label label-warning\">Connecting</span>";
      $ssbtn="<button onclick=\"bot('stop', '$id')\" class=\"btn btn-danger btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
    }
    if ($value['Status'] == 2) {
      $status="<span class=\"label label-success\">Connected</span>";
      $ssbtn="<button onclick=\"bot('stop', '$id')\" class=\"btn btn-danger btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
    }
    echo "
    <tr>
        <td>$botid</td>
        <td>$botname</td>
        <td>$server</td>
        <td>$status</td>
        <td>$ssbtn <a href=\"bot.php?id=$name\"><button class=\"btn btn-primary btn-xs\" type=\"button\"><i class=\"fa fa-gear\"></i></button></a></td>
    </tr>
    ";
  }
  }
}
?>
</tbody>
