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
$bname=$_GET['id'];
$bots=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/list"), true);
$bot=null;
foreach ($bots as $key => $value) {
  if ($_GET['id'] == $value['Name']) {
    $bot=$value;
  }
}
$bid=$bot['Id'];
$botsett=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=settings/bot/get/$bname"), true);
$bvol=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/use/$bid/(/json/merge/(/volume))"), true);
// /(/json/merge/(/volume/25)/(/volume))
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dragon-Host | Bots / Manage / <?php echo $_GET['id']; ?></title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-favicon.png">
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
    <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="libs/jquery.scrollbar/jquery.scrollbar.css" rel="stylesheet">
    <link href="libs/ionrangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="libs/ionrangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="libs/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
    <link href="libs/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
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
                    <li><a href="products.php">Bots</a></li>
                    <li>Manage</li>
                    <li class="active"><?php echo $_GET['id']; ?></li>
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
                          <h3 class="panel-title">Bot-Settings</h3>
                        </div>
                        <div class="panel-body">
                          <div class="scrollable scrollbar-macosx"><table id="" class="table table_sortable" cellspacing="0" width="100%">
                            <ul class="nav nav-pills" role="tablist">
                              <li role="presentation"><a href="#serverview" aria-controls="managers" role="tab" data-toggle="tab">Serverlist [WIP]</a></li>
                              <li class="active" role="presentation"><a href="#settings" aria-controls="customers" role="tab" data-toggle="tab">Settings</a></li>
                              <li role="presentation"><a href="#playlists" aria-controls="admins" role="tab" data-toggle="tab">Playlists</a></li>
                              <li role="presentation"><a href="#historyview" aria-controls="admins" role="tab" data-toggle="tab">History [WIP]</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane" id="serverview" role="tabpanel">
                                <p>work in progress [will be released in PBETA 3] current version: PBETA 2</p>
                              </div>
                              <div class="tab-pane active" id="settings" role="tabpanel">
                                  <?php
                                  if($bot['Status'] != 0) {
                                    $plists=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/use/$bid/(/list/list)"), true);
                                      ?>
                                      <h3>Webplayer</h3>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <label for="songurl">Song-URL</label>
                                          <input class="form-control" id="songurl" type="text" placeholder="Song URL">
                                          <button onclick="Player('play')" class="btn btn-info" type="button">Play</button> <button onclick="Player('add')" class="btn btn-success" type="button">Add</button> <button onclick="Player('pause')" class="btn btn-primary" type="button">Pause</button>
                                          <button onclick="Player('last')" class="btn btn-warning" type="button">Last Song</button> <button onclick="Player('skip')" class="btn btn-warning" type="button">Next Song</button> <button onclick="Player('stop')" class="btn btn-danger" type="button">Stop</button>
                                        </div>
                                        <div class="col-md-7">
                                          <h3>Queue [Position: <dhtxt style="font-family:consolas;"><dhapi id="b_que_left"></dhapi>/<dhapi id="b_que_size"></dhapi>]</h3>
                                          <dhapi id="songqueue"></dhapi>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <div class="st-widget__item st-widget__item_slider">
                                            <div class="st-widget__label">Volume</div>
                                            <div class="st-widget__slider">
                                              <input id="bvol" class="settings-slider" type="text" name="" value="" data-grid="true" data-min="0" data-max="100" data-from="<?php echo $bvol[0]; ?>" data-step="1">
                                            </div>
                                          </div>
                                          <div class="st-widget__item st-widget__item_slider">
                                            <div class="st-widget__label">Position</div>
                                            <div class="st-widget__slider">
                                              <input id="spos" class="settings-slider" type="text" name="" value="" data-grid="true" data-min="0" data-max="0" data-from="0" data-step="1">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <?php
                                  } else {
                                    ?>
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                      <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="alert-ico fa fa-fw fa-ban"></i><strong>Information! </strong>Bot needs to be started to use the Player.
                                    </div>
                                    <?php
                                  }
                                  ?>
                                  <h3>Settings</h3>
                                  <div class="row">
                                    <div class="col-md-4">
                                      <h4>Connection</h4>
                                      <label for="set_conaddr">Server-Adress</label>
                                      <input class="form-control" name="set_conaddr" id="set_conaddr" type="text" value="<?php echo $botsett['connect']['address']; ?>" placeholder="Serveradress (127.0.0.1)">
                                      <label for="set_conname">Client Name</label>
                                      <input class="form-control" name="set_conname" id="set_conname" type="text" value="<?php echo $botsett['connect']['name']; ?>" placeholder="Name of the bot">
                                    </div>
                                  </div>
                            </div>
                              <div class="tab-pane" id="playlists" role="tabpanel">
                                <?php
                                if($bot['Status'] != 0) {
                                  $plists=json_decode(getHtml("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/use/$bid/(/list/list)"), true);
                                  foreach ($plists as $key => $value) {
                                    ?>
                                        <button onclick="playList('<?php echo $value['Id']; ?>')" class="btn btn-primary" type="button"><?php echo $value['Title']; ?></button>
                                    <?php
                                  }
                                } else {
                                  ?>
                                  <div class="alert alert-danger alert-dismissible" role="alert">
                                    <i class="alert-ico fa fa-fw fa-ban"></i><strong>Error! </strong>Bot needs to be started.
                                  </div>
                                  <?php
                                }
                                ?>
                                <p>work in progress [will be updated in PBETA 3] current version: PBETA 2</p>
                              </div>
                              <div class="tab-pane" id="historyview" role="tabpanel">
                                <p>work in progress [will be updated in PBETA 4] current version: PBETA 2</p>
                              </div>
                            <!--
                            <form data-toggle="validator" data-disable="false" role="form">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Cina Saffary" required="">
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="inputTwitter" class="control-label">Twitter</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control" id="inputTwitter" placeholder="1000hz" required="">
                                    </div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <span class="help-block with-errors">Hey look, this one has feedback icons!</span>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="control-label">Password</label>
                                        <div class="container-fluid no-padding">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <input type="password" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required="">
                                                    <span class="help-block">Minimum of 6 characters</span>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>-->
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
    <script src="libs/datatables/js/jquery.dataTables.js"></script>
    <script src="libs/datatables/js/dataTables.bootstrap.js"></script>
    <script src="js/template/table_data.js"></script>
    <script src="js/main.js"></script>
    <script src="js/demo.js"></script>
    <script type="text/javascript">
    var pausedVolChange=false;
    var oldvol=<?php echo $bvol[0]; ?>;
    var svol=<?php echo $bvol[0]; ?>;
    var vol=<?php echo $bvol[0]; ?>;
    var olddata=null;
    var currentsongl="none";
    var currentsongt="none";

      function Settings(key, value) {
        $.getJSON( "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=settings/bot/set/<?php echo $_GET['id']; ?>/" + key + "/" + value, function( data ) {
        });
        console.log("[API] Settings: " + key + " set to " + value);
      }

      $('#set_conaddr').change(function() {
        Settings("connect.address", $('#set_conaddr').val());
      });

      $('#set_conname').change(function() {
        Settings("connect.name", encodeURIComponent(encodeURIComponent($('#set_conname').val())));
      });


      function playList(song) {
      var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            callback(xmlHttp.responseText);
    }
    xmlHttp.open("GET", "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/list/play/" + song + ")", true); // true for asynchronous
    xmlHttp.send(null);
      }

      $("#bvol").ionRangeSlider({
        onFinish: function (data) {
          $.getJSON("https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/json/merge(/volume/" + data.from + ")/(/volume))", function ( data ) {
            //console.log(data);
            svol=data[1];
          });
          setTimeout(()=>{
            pausedVolChange=false;
          },200);
        },
        onChange: function (data) {
            pausedVolChange=true;
        }
      });

//AUTORELOAD INTERVAL
setInterval(() => {
  $.getJSON("https://dragon-host.ddns.net/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/json/merge/(/volume/)/(/info/)/(/song/))", ( data ) => {
    //VOLUME
    if (!pausedVolChange) {
      vol=data[0];
      if ($('#bvol').val() != vol) {
        var $bvol=$("#bvol");
        var bvol_instance=$bvol.data("ionRangeSlider");
        bvol_instance.update({from: vol});
        oldvol=$('#bvol').val();
      }
    }

  <?php if($bot['Status'] != 0) {
            ?>
  //POSITION AND QUE
  if (data[2] == null) {
    var $spos=$("#spos");
    var spos_instance=$spos.data("ionRangeSlider");
    spos_instance.update({
      min: 0,
      max: 0,
      from: 0,
    });
  } else {
    currentsongl=data[2].Link;
    currentsongt=data[2].Title;
    var $spos=$("#spos");
    var spos_instance=$spos.data("ionRangeSlider");
    spos_instance.update({
      min: 0,
      max: Math.round(data[2].Length),
      from: Math.round(data[2].Position),
    });
  }
  var ctitle="none";
  setTimeout(() => {
      //console.log("[API] command: /info:");
      //console.log(data);
      if (data[1] != olddata) {
        document.getElementById("songqueue").innerHTML = "<div></div>";
        data[1].Items.forEach((item, i) => {
          if (item.Title == "") {
            ctitle=item.Link.substring(0,40) + "..."
          } else {
            ctitle=item.Title
          }
          if (currentsongl == item.Link && currentsongt == item.Title) {
            document.getElementById("songqueue").innerHTML += getIcon(item.AudioType) + " <a href=\"" + item.Link + "\">" + ctitle + "</a> <i class=\"fa fa-volume-up\"></i><br>";
          } else {
            document.getElementById("songqueue").innerHTML += getIcon(item.AudioType) + " <a href=\"" + item.Link + "\">" + ctitle + "</a><br>";
          }
        });
        document.getElementById("b_que_left").innerHTML = data[1].PlaybackIndex+1;
        document.getElementById("b_que_size").innerHTML = data[1].SongCount;
        olddata=data[1];
      }
  },100);
  <?php
}
  ?>
    });
}, 1000);
/*
      setInterval(function(){
        if (!pausedVolChange) {
        $.getJSON( "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/volume/)", function( data ) {
           vol=data.Value;
           //console.log(vol);
        });
        if ($('#bvol').val() != vol) {
          var $bvol=$("#bvol");
          var bvol_instance=$bvol.data("ionRangeSlider");
          bvol_instance.update({from: vol});
          oldvol=$('#bvol').val();
        }
      }
        /*
        if ($('#bvol').val() != oldvol) {
          //alert($('#bvol').val());

        var xmlHttpa = new XMLHttpRequest();
      xmlHttpa.onreadystatechange = function() {
          if (xmlHttpa.readyState == 4 && xmlHttpa.status == 200) {}
              //callback(xmlHttpa.responseText);
      }
      xmlHttpa.open("GET", "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/json/merge(/volume/" + $('#bvol').val() + ")/(/volume))", true); // true for asynchronous
      xmlHttpa.send(null);
      //var jsonb = JSON.parse(xmlHttpa.responseText);
      oldvol=$('#bvol').val();
    }
//
      },1000);
*/
      function Player(action) {
        if (action == "play" || action == "add") {
          var xmlHttpb = new XMLHttpRequest();
        xmlHttpb.onreadystatechange = function() {
            if (xmlHttpb.readyState == 4 && xmlHttpb.status == 200)
                callback(xmlHttpb.responseText);
        }
        xmlHttpb.open("POST", "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php", true); // true for asynchronous
        xmlHttpb.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttpb.send("id=<?php echo $bid; ?>&song=" + encodeURIComponent($('#songurl').val()) + "&action=" + action);
        document.getElementById("songurl").value = "";
      }
      if (action == "pause") {
        $.getJSON( "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/pause)", function( data ) {
        });
      }
      if (action == "last") {
        $.getJSON( "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/previous)", function( data ) {
        });
      }
      if (action == "skip") {
        $.getJSON( "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/next)", function( data ) {
        });
      }
      if (action == "stop") {
        $.getJSON( "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/stop)", function( data ) {
        });
      }
    }//

    function getIcon(icon) {
      if (icon == "youtube") {
        return "<i class=\"fa fa-youtube-play\"></i>";
      } else if (icon == "soundcloud") {
        return "<image src=\"https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn2.iconfinder.com%2Fdata%2Ficons%2Fminimalism%2F512%2Fsoundcloud.png&f=1&nofb=1\" style=\"height= 14px;width:14px;\"></image>";
      } else {
        return "<i class=\"fa fa-file-text-o\"></i>";
      }
    }
/*
<?php if($bot['Status'] != 0) {
          ?>
    var olddata=null;
    var currentsongl="none";
    var currentsongt="none";
    setInterval(function(){
      currentsong="none";
      $.getJSON( "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/song)", function( data ) {
        //console.log("[API] command: /song:");
        //console.log(data);
        if (!!data.ErrorCode) {
          var $spos=$("#spos");
          var spos_instance=$spos.data("ionRangeSlider");
          spos_instance.update({
            min: 0,
            max: 0,
            from: 0,
          });
        } else {
          currentsongl=data.Link;
          currentsongt=data.Title;
          var $spos=$("#spos");
          var spos_instance=$spos.data("ionRangeSlider");
          spos_instance.update({
            min: 0,
            max: Math.round(data.Length),
            from: Math.round(data.Position),
          });
        }
        var ctitle="none";
        setTimeout(() => {
          $.getJSON( "https://<?php echo $_SERVER['HTTP_HOST']; ?>/bots/functions/api.php?q=bot/use/<?php echo $bid; ?>/(/info)", function( data ) {
            //console.log("[API] command: /info:");
            //console.log(data);
            if (data != olddata) {
              document.getElementById("songqueue").innerHTML = "<div></div>";
              data.Items.forEach((item, i) => {
                if (item.Title == "") {
                  ctitle=item.Link.substring(0,40) + "..."
                } else {
                  ctitle=item.Title
                }
                if (currentsongl == item.Link && currentsongt == item.Title) {
                  document.getElementById("songqueue").innerHTML += getIcon(item.AudioType) + " <a href=\"" + item.Link + "\">" + ctitle + "</a> <i class=\"fa fa-volume-up\"></i><br>";
                } else {
                  document.getElementById("songqueue").innerHTML += getIcon(item.AudioType) + " <a href=\"" + item.Link + "\">" + ctitle + "</a><br>";
                }
              });
              document.getElementById("b_songs_size").innerHTML = data.SongCount-data.PlaybackIndex;
              olddata=data;
            }
          });
        },100);
      });
      // <i class="fa fa-youtube-play"></i> <i class="fa fa-file-text-o"></i>
    }, 1000);
    <?php
  }
    ?>
    */
    </script>
  </body>
</html>
