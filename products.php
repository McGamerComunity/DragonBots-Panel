<?php
include("functions/auth.php");

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

if (isset($_GET['action'])) {
  if(isset($_GET['id'])) {
    $bots=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/list"), true);
    $bot=null;
    foreach ($bots as $key => $value) {
      if ($_GET['id'] == $value['Name']) {
        $bot=$value;
      }
    }
    $bid=$bot['Id'];
    if($bot['Status'] > 0) {
      getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/use/$bid/(/bot/disconnect)");
    } else {
      getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/connect/template/".$_GET['id']);
    }
    header('Location: products.php');
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dragon-Host | Bots / Products</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-favicon.png">
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
    <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="libs/jquery.scrollbar/jquery.scrollbar.css" rel="stylesheet">
    <link href="libs/ionrangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="libs/ionrangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="libs/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
    <link class="demo__css" href="css/right.dark.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">
    <link href="libs/codemirror/lib/codemirror.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body class="framed main-scrollable">
    <div class="wrapper">
      <nav class="navbar navbar-static-top header-navbar">
        <div class="header-navbar-mobile">
          <div class="header-navbar-mobile__menu">
            <button class="btn" type="button"><i class="fa fa-bars"></i></button>
          </div>
          <div class="header-navbar-mobile__title"><span>Bots</span></div>
          <div class="header-navbar-mobile__settings dropdown"><a class="btn dropdown-toggle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-power-off"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href="#"><?php echo $uinfo['name'] ?></a></li>
              <li class="divider" role="separator"></li>
              <li><a href="#">Log Out</a></li>
            </ul>
          </div>
        </div>
        <div class="navbar-header"><a class="navbar-brand" href="index.html">
            <div class="logo text-nowrap">
              <div class="logo__img"><i class="fa fa-chevron-right"></i></div><span class="logo__text">Dragon-Bots</span>
            </div></a></div>
        <div class="topnavbar">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="./"><span>Dashboard</span></a></li>
            <!--
            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Pages&nbsp;<i class="caret"></i></span></a>
              <ul class="dropdown-menu">
                <li><a href="products.html"><span>Products</span></a></li>
                <li><a href="orders.html"><span>Orders</span></a></li>
                <li><a href="users.html"><span>Users</span></a></li>
                <li class="divider" role="separator"></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="blank.html">Blank</a></li>
              </ul>
            </li>
          -->
          </ul>
          <ul class="userbar nav navbar-nav">
            <li class="dropdown"><a class="userbar__settings dropdown-toggle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-power-off"></i></a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#"><?php echo $uinfo['name'] ?></a></li>
                <li class="divider" role="separator"></li>
                <li><a href="#">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <div class="dashboard">
        <div class="sidebar">
          <div class="quickmenu">
            <div class="quickmenu__cont">
              <div class="quickmenu__list">
                <div class="quickmenu__item active">
                  <div class="fa fa-fw fa-home"></div>
                </div>
                <div class="quickmenu__item">
                  <div class="fa fa-fw fa-envelope-o"></div>
                </div>
                <div class="quickmenu__item new">
                  <div class="fa fa-fw fa-comments-o"></div>
                </div>
                <div class="quickmenu__item">
                  <div class="fa fa-fw fa-feed"></div>
                </div>
                <div class="quickmenu__item">
                  <div class="fa fa-fw fa-cog"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="scrollable scrollbar-macosx">
            <div class="sidebar__cont">
              <div class="sidebar__menu">
                <div class="sidebar__title">Pages</div>
                <ul class="nav nav-menu">
                  <li><a href="./">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-star"></i></div>
                      <div class="nav-menu__text"><span>Dashboard</span></div></a></li>
                  <li class="active"><a href="products.php">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-cube"></i></div>
                      <div class="nav-menu__text"><span>Bots</span></div></a></li>
                  <li><a href="#">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-envelope"></i></div>
                      <div class="nav-menu__text"><span>Account</span></div>
                      <div class="nav-menu__right"><i class="fa fa-fw fa-angle-right arrow"></i></div></a>
                    <ul class="nav nav-menu__second collapse">
                      <li><a href="sent.html">Settings</a></li>
                      <li><a href="compose.html">Upgrade</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="sidebar__menu">
                <div class="sidebar__btn"><a class="btn btn-block btn-default" href="compose.html">Compose Mail</a></div>
                <div class="sidebar__title">Mail</div>
                <ul class="nav nav-menu">
                  <li><a href="inbox.html">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-inbox"></i></div>
                      <div class="nav-menu__text"><span>Inbox</span></div>
                      <div class="nav-menu__right"><i class="badge badge-default"><b>2</b> / 100</i></div></a></li>
                  <li><a href="sent.html">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-upload"></i></div>
                      <div class="nav-menu__text"><span>Sent</span></div>
                      <div class="nav-menu__right"><i class="badge badge-default">30</i></div></a></li>
                </ul>
                <div class="sidebar__title">Tags</div>
                <div class="ul nav nav-menu">
                  <li><a href="inbox.html">
                      <div class="nav-menu__ico tag_clients"><i class="fa fa-fw fa-tag"></i></div>
                      <div class="nav-menu__text"><span>Clients</span></div></a></li>
                  <li><a href="inbox.html">
                      <div class="nav-menu__ico tag_social"><i class="fa fa-fw fa-tag"></i></div>
                      <div class="nav-menu__text"><span>Social</span></div></a></li>
                  <li><a href="inbox.html">
                      <div class="nav-menu__ico tag_support"><i class="fa fa-fw fa-tag"></i></div>
                      <div class="nav-menu__text"><span>Support</span></div></a></li>
                </div>
              </div>
              <div class="sidebar__menu">
                <div class="sidebar__title">New Messages</div>
                <div class="lm-widget">
                  <div class="lm-widget__list">
                    <div class="lm-widget__item new">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_support"></i><span>Support</span></div>
                      <div class="lm-widget__text">Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item new">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_clients"></i><span>Stephen Olson</span></div>
                      <div class="lm-widget__text">Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                  </div>
                </div>
                <div class="sidebar__title">Recent list</div>
                <div class="lm-widget">
                  <div class="lm-widget__list">
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_social"></i><span>Jesse Shaw</span></div>
                      <div class="lm-widget__text">Nam ultrices, libero non mattis pulvinar.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag"></i><span>Mary Payne</span></div>
                      <div class="lm-widget__text">Vivamus tortor. Duis mattis egestas metus.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag"></i><span>Bob Romero</span></div>
                      <div class="lm-widget__text">Morbi porttitor lorem id ligula.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_social"></i><span>Kevin Hosser</span></div>
                      <div class="lm-widget__text">Libero non mattis pulvinar.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_clients"></i><span>Perry Winter</span></div>
                      <div class="lm-widget__text">Tortor. Duis mattis egestas metus.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_support"></i><span>Ivan Nemirov</span></div>
                      <div class="lm-widget__text">Portitor lorem id ligula.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag"></i><span>Jonny Fount</span></div>
                      <div class="lm-widget__text">Lorem id ligula morbi porttitor .</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag"></i><span>Hue Logan</span></div>
                      <div class="lm-widget__text">Pulvinar libero non mattis.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_clients"></i><span>Summer Gordon</span></div>
                      <div class="lm-widget__text">Hattis tortor. Duis egestas metus.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                    <div class="lm-widget__item">
                      <div class="lm-widget__title"><i class="fa fa-fw fa-tag tag_support"></i><span>Sonya Blade</span></div>
                      <div class="lm-widget__text">Itor lorem id ligula.</div><a class="lm-widget__link" href="inbox.html"></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sidebar__menu">
                <div class="sidebar__title">Recent activity</div>
                <div class="ra-widget">
                  <div class="ra-widget__cont">
                    <div class="ra-widget__list">
                      <div class="ra-widget__item ra-widget__item_user">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text"><a href='./'>Gary Long</a> has registered.<span class="ra-widget__date">09:20</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_product">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">New product <a href='./'>Sony PlayStation 4</a>.<span class="ra-widget__date">10:08</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_order">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">Order <a href='./'>#35108243</a>.<span class="ra-widget__date">Jan 28, 09:42</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_subscriber">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text"><a href='./'>Julie Payne</a> subscribed to news.<span class="ra-widget__date">Jan 28, 18:06</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_mail">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">30 letters was sent.<span class="ra-widget__date">Jan 27, 03:08</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_order">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">Order <a href='./'>#35597433</a>.<span class="ra-widget__date">Jan 26, 19:02</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_payment">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">$385 incoming payment.<span class="ra-widget__date">Jan 26, 18:06</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_payment">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">$2824 incoming payment.<span class="ra-widget__date">Jan 26, 09:11</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_subscriber">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text"><a href='./'>Greg Bush</a> subscribed to news.<span class="ra-widget__date">Jan 26, 05:36</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_product">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">New product <a href='./'>Shoober</a>.<span class="ra-widget__date">Jan 25, 23:19</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_order">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">Order <a href='./'>#31248769</a>.<span class="ra-widget__date">Jan 25, 16:51</span></div>
                        </div>
                      </div>
                      <div class="ra-widget__item ra-widget__item_payment">
                        <div class="ra-widget__ico"><i class="fa fa-fw"></i></div>
                        <div class="ra-widget__info">
                          <div class="ra-widget__text">$3205 incoming payment.<span class="ra-widget__date">Jan 25, 10:44</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sidebar__menu">
                <div class="sidebar__title">Settings</div>
                <div class="ss-widget">
                  <div class="ss-widget__cont">
                    <div class="ss-widget__row">
                      <div class="ss-widget__cell">Site</div>
                      <div class="ss-widget__cell">
                        <input class="bs-switch" type="checkbox" checked="checked" data-size="micro" data-on-color="success" data-off-color="danger">
                      </div>
                    </div>
                    <div class="ss-widget__row">
                      <div class="ss-widget__cell">Mailing</div>
                      <div class="ss-widget__cell">
                        <input class="bs-switch" type="checkbox" data-size="micro" data-on-color="success" data-off-color="danger">
                      </div>
                    </div>
                    <div class="ss-widget__item">
                      <div class="ss-widget__label">Limit</div>
                      <div class="ss-widget__value">
                        <input class="settings-slider" type="text" name="" value="" data-grid="false" data-min="0" data-max="2000" data-from="600" data-step="200">
                      </div>
                    </div>
                    <div class="ss-widget__row">
                      <div class="ss-widget__cell">Timeout</div>
                      <div class="ss-widget__cell">
                        <input class="form-control input-sm" type="number" min="5" max="50" step="5" value="15">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sidestat">
                  <div class="sidestat__cont">
                    <div class="sidestat__item">
                      <div class="sidestat__value">1,760</div>
                      <div class="sidestat__text">visits of your site</div>
                      <div class="sidestat__chart sparkline bar">1699,1686,8368,9011,6129,3837,0997,2034,0483,1457,2950,8946,0866,6247,8222,5727,0020,6883,3410,5224,2034,0483,1457,2950,5946,0866</div>
                    </div>
                    <div class="sidestat__item">
                      <div class="sidestat__value">2,034</div>
                      <div class="sidestat__text">views of your products</div>
                      <div class="sidestat__chart sparkline area">5696,6514,9647,6326,6028,8869,8251,9146,6137,8997,6892,9544,7011,6556,7737,8348,7011,6558,7556</div>
                    </div>
                    <div class="sidestat__item">
                      <div class="sidestat__value">$2,950</div>
                      <div class="sidestat__text">average day earning</div>
                      <div class="sidestat__chart sparkline bar_thin">6658,8005,9033,8360,3385,9018,9089,7804,5574,7556,6910,4327,7500,6563,0649,2584,8757,6815,8368,9011,6129,3837,0997,2034,0483,1457,2950,8946,0866,6247,3385,9018,9089,7804,5574,7556,6910,4327,7500,7804,5574,7556,6910,4327,7500,6563,0649,2584</div>
                    </div>
                    <div class="sidestat__item">
                      <div class="sidestat__value">290</div>
                      <div class="sidestat__text">month orders</div>
                      <div class="sidestat__chart sparkline line">075,487,581,520,075,630,350,631,794,666,466,322,833,471,721,703,042,328,844,996,099,342,841,599</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="main">
          <div class="main__scroll scrollbar-macosx">
            <div class="main__cont">
              <div class="main-heading">
                <div class="main-title">
                  <ol class="breadcrumb">
                    <li class="active">Bots</li>
                  </ol>
                </div>
                <div class="main-filter">
                  <form class="main-filter__search">
                    <div class="input-group">
                      <input class="form-control" type="text" placeholder="Search..."><span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                          <div class="fa fa-search"></div>
                        </button></span>
                    </div>
                  </form>
                </div>
              </div>
              <div class="container-fluid half-padding">
                <div class="pages pages_dashboard">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-danger">
                        <div class="panel-heading">
                          <h3 class="panel-title">Bot-List
                            <?php
                            if ($uinfo['botmax'] == "-1") {
                              echo '<button style="position: absolute;right: 25px; margin-top: -4px;"data-toggle="modal" data-target="#createbot" class="btn btn-info btn-xs" type="button">Create Bot</button>';
                            } else {
                              if ($uinfo['botcount'] >= $uinfo['botmax']) {
                                echo '<button style="position: absolute;right: 25px; margin-top: -4px;"data-toggle="modal" class="btn btn-danger btn-xs" type="button" disabled>Bot limit reached</button>';
                              } else {
                                echo '<button style="position: absolute;right: 25px; margin-top: -4px;"data-toggle="modal" data-target="#createbot" class="btn btn-info btn-xs" type="button">Create Bot</button>';
                              }
                            }
                            ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                          <div class="scrollable scrollbar-macosx"><table id="db_botlist" class="table table_sortable" cellspacing="0" width="100%">
      <?php
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
</table>

                          </div>
                          <div class="modal fade" id="createbot">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Create new Bot</h4>
                                </div>
                                <div class="modal-body">
                                  <?php
                                    if($uinfo['acttype'] == "Admin") {
                                      ?>
                                        <form data-toggle="validator" action="functions/createbot.php?usrtype=act_admin&acttoken=6368293418759068721" method="post" data-disable="false" role="form">
                                          <div class="form-group has-feedback">
                                              <label for="inputTwitter" class="control-label">Client Name</label>
                                              <div class="input-group">
                                                  <input type="text" maxlength="30" name="bid" class="form-control" id="inputTwitter" placeholder="username_000" required="">
                                              </div>
                                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                              <span class="help-block with-errors">Type in the username for the user wich gets the bot and an 3dig long number</span>
                                          </div>
                                          <div class="form-group has-feedback">
                                              <label for="inputTwitter" class="control-label">Client Name</label>
                                              <div class="input-group">
                                                  <span class="input-group-addon">@</span>
                                                  <input type="text" maxlength="30" name="cname" class="form-control" id="inputTwitter" placeholder="my bot" required="">
                                              </div>
                                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                              <span class="help-block with-errors">Type in the name of the client</span>
                                          </div>
                                          <div class="form-group">
                                              <label for="inputEmail" class="control-label">Server Adress</label>
                                              <input type="text" class="form-control" name="saddr" id="inputEmail" placeholder="127.0.0.1" required="">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                          <div class="form-group">
                                              <label for="inputPassword" class="control-label">Server Password</label>
                                                  <div class="container-fluid no-padding">
                                                      <div class="row">
                                                          <div class="form-group col-sm-6">
                                                              <input type="password" name="spw" data-toggle="validator" class="form-control" id="inputPassword" placeholder="Server Password">
                                                          </div>
                                                      </div>
                                                  </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="help-block with-errors"></div>
                                          </div>

                                      <?php
                                    } else {
                                      ?>
                                        <form class="" action="functions/createbot.php?usrtype=act_user" method="post">
                                          <div class="form-group has-feedback">
                                              <label for="inputTwitter" class="control-label">Client Name</label>
                                              <div class="input-group">
                                                  <span class="input-group-addon">@</span>
                                                  <input type="text" maxlength="30" name="cname" class="form-control" id="inputTwitter" placeholder="my bot" required="">
                                              </div>
                                              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                              <span class="help-block with-errors">Type in the name of the client</span>
                                          </div>
                                          <div class="form-group">
                                              <label for="inputEmail" class="control-label">Server Adress</label>
                                              <input type="text" class="form-control" name="saddr" id="inputEmail" placeholder="127.0.0.1" required="">
                                              <div class="help-block with-errors"></div>
                                          </div>
                                          <div class="form-group">
                                              <label for="inputPassword" class="control-label">Server Password</label>
                                                  <div class="container-fluid no-padding">
                                                      <div class="row">
                                                          <div class="form-group col-sm-6">
                                                              <input type="password" data-toggle="validator" name="spw" class="form-control" id="inputPassword" placeholder="Server Password">
                                                          </div>
                                                      </div>
                                                  </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="help-block with-errors"></div>
                                          </div>

                                      <?php
                                    }
                                  ?>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                  <button class="btn btn-success" type="submit">Create</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="libs/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="libs/bootstrap-tabdrop/bootstrap-tabdrop.min.js"></script>
    <script src="libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="libs/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="libs/inputNumber/js/inputNumber.js"></script>
    <script src="libs/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="libs/tablesorter/jquery.tablesorter.min.js"></script>
    <script src="js/template/table_sortable.js"></script>
    <script src="libs/inputNumber/js/inputNumber.js"></script>
    <script src="libs/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="libs/codemirror/lib/codemirror.js"></script>
    <script src="libs/codemirror/addon/scroll/simplescrollbars.js"></script>
    <script src="libs/codemirror/mode/javascript/javascript.js"></script>
    <script src="libs/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="libs/codemirror/mode/xml/xml.js"></script>
    <script src="libs/codemirror/mode/css/css.js"></script>
    <script src="libs/bootstrap-validator/validator.min.js"></script>
    <script src="js/template/validation.js"></script>
    <script src="js/main.js"></script>
    <script src="js/demo.js"></script>
    <script type="text/javascript">
      function bot(action, id) {
        if (action == "start") {
          $.getJSON( "https://dragon-host.ddns.net/bots/functions/api.php?q=bot/connect/template/" + id, function( data ) {
          });
        }
        if (action == "stop") {
          $.getJSON( "https://dragon-host.ddns.net/bots/functions/api.php?q=bot/use/" + id + "/(/bot/disconnect)", function( data ) {
          });
        }
      }

    var olddata="";
    setInterval(() => {
      $.get("https://dragon-host.ddns.net/bots/functions/botlist.php" ,function( data ) {
        if (data != olddata) {
          olddata=data;
          document.getElementById("db_botlist").innerHTML = data;
        }
      });
    }, 1500);

/*

      setInterval(() => {
        $.getJSON("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/list", function( data ) {
          if (data != olddata) {
            olddata=data;
          document.getElementById("dh_bots").innerHTML = "<div></div>"
          data.forEach((item, i) => {
            <?php
            if ($uinfo['acttype'] == "Admin") {
            ?>
            if (item.Status == 0) {
              status="<span class=\"label label-danger\">Offline</span>";
              ssbtn="<button onclick=\"bot(\"start\", \"$name\")\" class=\"btn btn-success btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
            }
            if (item.Status == 1) {
              status="<span class=\"label label-warning\">Connecting</span>";
              ssbtn="<button onclick=\"bot(\"stop\", \"$id\")\" class=\"btn btn-danger btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
            }
            if (item.Status == 2) {
              status="<span class=\"label label-success\">Connected</span>";
              ssbtn="<button onclick=\"bot(\"stop\", \"$id\")\" class=\"btn btn-danger btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
            }
            document.getElementById("dh_bots").innerHTML += "
                      <tr>
                          <td>" + item.Id + "</td>
                          <td>" + Item.Name + "</td>
                          <td>" + item.Server + "</td>
                          <td>" + status + "</td>
                          <td>" + ssbtn + " <a href=\"bot.php?id=$name\"><button class=\"btn btn-primary btn-xs\" type=\"button\"><i class=\"fa fa-gear\"></i></button></a></td>
                      </tr>";
            <?php } else { ?>
              var check = item.Name.split("_");
              if (item.Status == 0) {
                status="<span class=\"label label-danger\">Offline</span>";
                ssbtn="<button onclick=\"bot(\"start\", \"$name\")\" class=\"btn btn-success btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
              }
              if (item.Status == 1) {
                status="<span class=\"label label-warning\">Connecting</span>";
                ssbtn="<button onclick=\"bot(\"stop\", \"$id\")\" class=\"btn btn-danger btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
              }
              if (item.Status == 2) {
                status="<span class=\"label label-success\">Connected</span>";
                ssbtn="<button onclick=\"bot(\"stop\", \"$id\")\" class=\"btn btn-danger btn-xs\" type=\"button\"><i class=\"fa fa-power-off\"></i></button>";
              }
              var bname="";
              if (check[0] == "<?php echo $uinfo['name']; ?>") {
              $.getJSON("https://dragon-host.ddns.net/bots/functions/api.php?q=settings/bot/get/" + item.Name + "/connect.name", function( data ){
                bname=data;
              });
              document.getElementById("dh_bots").innerHTML += "<tr><td>" + check[1] + "</td><td>" + bname + "</td><td>" + item.Server + "</td><td>" + status + "</td><td>" + ssbtn + " <a href=\"bot.php?id=" + item.Name + "\"><button class=\"btn btn-primary btn-xs\" type=\"button\"><i class=\"fa fa-gear\"></i></button></a></td></tr>";
            }
            <?php } ?>
          });
        }
        });
      },1000);*/
    </script>
  </body>
</html>
