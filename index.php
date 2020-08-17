<?php
include("functions/auth.php");
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dragon-Host | Bots / Dashboard</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-favicon.png">
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
    <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="libs/jquery.scrollbar/jquery.scrollbar.css" rel="stylesheet">
    <link href="libs/ionrangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="libs/ionrangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="libs/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
    <link href="libs/morris.js/morris.css" rel="stylesheet">
    <link href="libs/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link class="demo__css" href="css/right.dark.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet"><!--[if lt IE 9]>
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
          <div class="header-navbar-mobile__title"><span>Dashboard</span></div>
          <div class="header-navbar-mobile__settings dropdown"><a class="btn dropdown-toggle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-power-off"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
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
            <li class="active"><a href="index.html"><span>Dashboard</span></a></li>
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
                  <li class="active"><a href="./">
                      <div class="nav-menu__ico"><i class="fa fa-fw fa-star"></i></div>
                      <div class="nav-menu__text"><span>Dashboard</span></div></a></li>
                  <li><a href="products.php">
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
                    <li class="active">Dashboard</li>
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
                    <div class="col-md-5">
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <h3 class="panel-title">Activity feed</h3>
                        </div>
                        <div class="feed-widget">
                          <div class="feed-widget__wrap scrollable scrollbar-macosx">
                            <div class="feed-widget__cont">
                              <div class="feed-widget__list">
                                <div class="feed-widget__item feed-widget__item_user">
                                  <div class="feed-widget__ico"><i class="fa fa-fw"></i></div>
                                  <div class="feed-widget__info">
                                    <div class="feed-widget__text"><b><a href='./'>Gary Long</a></b> has registered.</div>
                                    <div class="feed-widget__date">14:20 pm - 01.11.2016</div>
                                  </div>
                                </div>
                                <div class="feed-widget__item feed-widget__item_product">
                                  <div class="feed-widget__ico"><i class="fa fa-fw"></i></div>
                                  <div class="feed-widget__info">
                                    <div class="feed-widget__text">New product <b><a href='./'>Sony PlayStation 4</a></b>.</div>
                                    <div class="feed-widget__date">10:08 pm - 01.11.2016</div>
                                  </div>
                                </div>
                                <div class="feed-widget__item feed-widget__item_order">
                                  <div class="feed-widget__ico"><i class="fa fa-fw"></i></div>
                                  <div class="feed-widget__info">
                                    <div class="feed-widget__text">New order <b><a href='./'>#35108243</a></b>.</div>
                                    <div class="feed-widget__date">09:42 pm - 01.11.2016</div>
                                  </div>
                                </div>
                                <div class="feed-widget__item feed-widget__item_subscriber">
                                  <div class="feed-widget__ico"><i class="fa fa-fw"></i></div>
                                  <div class="feed-widget__info">
                                    <div class="feed-widget__text"><b><a href='./'>Julie Payne</a></b> subscribed to a news feed.</div>
                                    <div class="feed-widget__date">18:06 pm - 01.10.2016</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="panel panel-danger">
                        <div class="panel-heading panel-heading_label">
                          <h3 class="panel-title">Support Messages</h3>
                          <div class="label label-danger">0</div>
                        </div>
                        <div class="sp-widget">
                          <div class="sp-widget__wrap scrollable scrollbar-macosx">
                            <div class="sp-widget__cont">
                              <div class="sp-widget__top">
                                <div class="sp-widget__info">
                                  <div class="sp-widget__title"><i class="fa fa-envelope-o"></i><span>0 New Messages</span></div>
                                </div>
                                <div class="sp-widget__all"><a class="btn btn-default btn-block" href="inbox.html">Show All</a></div>
                              </div>
                              <div class="sp-widget__list">
                                <div class="sp-widget__item">
                                  <div class="sp-widget__user"><a href="#">Dragon-Host</a><span class="sp-widget__date"></span></div>
                                  <div class="sp-widget__text">Welcome to your new Account if you have any questions feel free to send us a Message</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                          <h3 class="panel-title">Overview</h3>
                        </div>
                        <div class="panel-body">
                          <div class="ov-widget">
                            <div class="ov-widget__list">
                              <div class="ov-widget__item ov-widget__item_inc">
                                <div class="ov-widget__info">
                                  <div class="progress">
                                    <?php if ($uinfo['botmax'] != "-1") { ?>
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $uinfo['botcount']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $uinfo['botmax']; ?>"
                                      style="width: <?php echo $uinfo['botcount'] / $uinfo['botmax'] * 100; ?>%;"><b><?php echo $uinfo['botcount'] . "/" . $uinfo['botmax']; ?></b></div>
                                    <?php } else { ?>
                                      <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $uinfo['botcount']; ?>" aria-valuemin="0" aria-valuemax="0" style="width: 100%"><b><?php echo $uinfo['botcount']; ?></b></div>
                                    <?php } ?>
                                  </div>
                                  <div class="ov-widget__title">Total Bots</div>
                                </div>
                              </div>
                              <div class="ov-widget__item ov-widget__item_dec">
                                <div class="ov-widget__value"><?php echo $uinfo['acttype']; ?></div>
                                <div class="ov-widget__info">
                                  <div class="ov-widget__title">Account type</div>
                                  <div class="ov-widget__change"><span><a href="account.php?upgrade">Upgrade</a></span><span class="fa fa-level-up"></span><span class="fa fa-thumb-tack"></span></div>
                                </div>
                              </div>
                              <div class="ov-widget__item ov-widget__item_warn">
                                <div class="ov-widget__value">Online</div>
                                <div class="ov-widget__info">
                                  <div class="ov-widget__title">Serverstatus</div>
                                  <div class="ov-widget__change"><span>99.7%</span><span class="fa fa-level-up"></span><span class="fa fa-level-down"></span><span class="fa fa-bolt"></span><span class="fa fa-thumb-tack"></span></div>
                                </div>
                              </div>
                              <div class="ov-widget__item ov-widget__item_tack">
                                <div class="ov-widget__value">ns68158</div>
                                <div class="ov-widget__info">
                                  <div class="ov-widget__title">Hostsystem</div>
                                  <div class="ov-widget__change"><span>srv11046</span><span class="fa fa-level-up"></span><span class="fa fa-level-down"></span><span class="fa fa-bolt"></span><span class="fa fa-thumb-tack"></span></div>
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
    <script src="libs/raphael/raphael.min.js"></script>
    <script src="libs/morris.js/morris.min.js"></script>
    <script src="libs/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="js/template/index.js"></script>
    <script src="js/main.js"></script>
    <script src="js/demo.js"></script>
  </body>
</html>
