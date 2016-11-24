<?php
include('../koneksi.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login Manager HRD - Sistem Cuti Online</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../materialize/css/materialize.css" type="text/css">
    <link rel="stylesheet" href="../plugins/materialicon/icon.css">
    <script src="../plugins/jquery/jquery-1.12.0.js"></script>
    <script src="../materialize/js/materialize.js"></script>
    <style type="text/css">
    html,
    body {
    height: 100%;
    }
    html {
    display: table;
    margin: auto;
    }
    body {
    display: table-cell;
    vertical-align: middle;
    }
    .margin {
    margin: 0 !important;
    }
    </style>
  </head>
  <body>
  <body class="green darken-2">
  <div class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form" action="auth.php" method="post">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="../images/logo.png" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">Login Staff - Sistem Cuti Online</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate" name="username" required>
            <label for="icon_prefix">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
            <input id="icon_prefix" type="password" class="validate" name="password" required>
            <label for="icon_prefix">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light col s12" type="submit" name="login">Masuk<i class="material-icons right">send</i></button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <p class="margin medium-small center">Copyright 2016</p>
          </div>
        </div>
      </form>
    </div>
  </div>
  </body>
</html>
