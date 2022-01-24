<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>AUTO-PARC </title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <script src="js/html5shiv.js"></script>

</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="authentificate.php" method="POST" autocomplete="off">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" name="Username" autocomplete="off" readonly="" onfocus="this.removeAttribute('readonly');" required="">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Mot de Passe" name="Password" autocomplete="off" required="">
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      </div>
    </form>
    
    <?php if(isset($_GET['Error'])){ ?>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <script type="text/javascript">
            var v = <?php echo "'".$_GET['Error']."'"; ?>;
            swal("Error !", v, "error");
          </script>
    <?php } ?>
    <br><br>
    <div align="center">
      <a style="color: white;" href="../">Revenir au site</a>
    </div>
  </div>


</body>

</html>
