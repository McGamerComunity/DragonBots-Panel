<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dragon-Host | Bots / Login</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-favicon.png">
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
    <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="libs/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link class="demo__css" href="css/right.dark.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet"><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body class="framed">
    <div class="wrapper">
      <div class="login">
        <form class="login__form" method="post" action="functions/login.php">
          <div class="form-group">
            <input class="form-control" name="email" type="email" placeholder="Email">
          </div>
          <div class="form-group">
            <input class="form-control" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group login__action">
            <div class="checkbox login__remember">
              <input id="chb1" type="checkbox">
              <label for="chb1">Remember</label>
            </div>
            <div class="login__submit">
              <a href="register.php"><button class="btn btn-primary" type="button">Register</button></a>
            </div>
            <div class="login__submit">
              <button class="btn btn-default" type="submit">Sign in</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/demo.js"></script>
  </body>
</html>
