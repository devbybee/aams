<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Web Application for monitoring web service ">
  <meta name="keywords" content="aams, asyst, app monitoring">
  <meta name="author" content="Robbi Amirudin">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- asset loaded-->
  <script type="text/javascript" src="<?= js_cs().'jquery.min.js';?>"></script>
  <script type="text/javascript" src="<?= js_bs().'bootstrap.min.js';?>"></script>

  <link rel="stylesheet" type="text/css" href="<?= css_bs().'bootstrap.min.css';?>" />
  <link rel="stylesheet" type="text/css" href="<?= css_cs().'signin.css';?>" />

</head>
<body>
<div class="container">

    <form class="form-signin" method="post" action="/login/signin">
        <h2 class="form-signin-heading">AAMS</h2>
        <?php
        if ($msg == 'error') { ?>
            <div class="alert alert-danger" role="alert">
                Incorrect username or password
            </div>
        <?php
        }
        ?>
        <label for="inputEmail" class="sr-only">username</label>
        <input name="username" type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->
</body>
</html>