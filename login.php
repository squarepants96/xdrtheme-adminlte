<?php
session_start();
$show="home";
exec('grep user /root/auth.txt |awk -F"=" \'{print $2}\'',$user);
exec('grep passwd /root/auth.txt |awk -F"=" \'{print $2}\'',$pass);
if ($_GET['login']) {
     if ($_POST['username'] == $user[0]
         && $_POST['password'] == $pass[0]) {
         $_SESSION['loggedin'] = 1;
         header("Location: index.php");
         exit;
     } else 
echo '<script type="text/javascript">
alert("Username atau Password salah!");
</script>';
}
echo
'<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Xderm Mini | Log in</title>
    <meta name="author" content="phpmu.com">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
 	  <!-- Ionicons -->
   	<link rel="stylesheet" href="Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  </head>';

if ($show == "home"){
	echo'
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a><b>XDERM</b> Mini</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login Pada Form dibawah ini</p>

        <form action="?login=1" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button name="login" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $("input").iCheck({
          checkboxClass: "icheckbox_square-blue",
          radioClass: "iradio_square-blue",
          increaseArea: "20%" // optional
        });
      });
    </script>
  </body>
  </html>';
}

session_unset();
    session_destroy();
?>
          
