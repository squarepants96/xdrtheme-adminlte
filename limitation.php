<?php
 exec("ls login.php|awk 'NR==1'|awk -F '.' '{print $1}'",$clo);
  if ($clo[0]) {
include 'header.php';
ceklogin();
  };
 exec("cat limitdir/st",$sst);
  if (!$sst[0]) {
   exec('echo Start > limitdir/st');
  };
 exec("cat limitdir/sz",$ssz);
  if (!$ssz[0]) {
   exec('echo 3 > limitdir/sz');
  };
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/fav.ico">
    <title>Xderm Mini GUI Dashboard</title>
    <meta name="author" content="phpmu.com">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
 	 <!-- Ionicons -->
 	  <link rel="stylesheet" href="Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <style type="text/css"> .files{ position:absolute; z-index:2; top:0; left:0; filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; opacity:0; background-color:transparent; color:transparent; } </style>
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script>
    $.get("http://ip-api.com/json", function (response) {
    $("#ip").html(" " + response.query);
    $("#address").html("Location: " + response.country + ", " + response.city);
    $("#isp").html(" " + response.isp);
}, "jsonp");


</script>

<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: "limitdir/log.txt",
    cache: false,
                success: function(result) {
        $("#log").html(result);
                }
            });
        $(document).ready(function() {
                $.ajaxSetup({ cache: false });
                        });
                var textarea = document.getElementById("log");
                textarea.scrollTop = textarea.scrollHeight;
        }, 1000);
    });
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</head>

  <body class="fixed skin-purple sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
          <?php include "main-header.php"; ?>
      </header>

      <aside class="main-sidebar">
          <?php include "menu-admin.php"; ?>
      </aside>


  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
          <h1> Dashboard
          <small>Xderm Limit (Bandwidth)</small>
        </h1>
        </section>
  
  <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-server"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Server</span>
              <span class="info-box-number"></span>
                <?php
            echo '<span class="info-box-number" id="ip"></span>';
            ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-cloud"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ISP</span>
              <?php
            echo '<span class="info-box-number" id="isp"></span>';
            ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-download"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Download</span>
              <?php
              $output = shell_exec("ifconfig tun0 | grep 'bytes:' | awk '{print $3, $4}' | sed 's/(//g; s/)//g'");
              echo "<span class='info-box-number'> $output</span>";
                ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-upload"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Upload</span>
              <?php
              $output = shell_exec("ifconfig tun0 | grep 'bytes:' | awk '{print $7, $8}' | sed 's/(//g; s/)//g'");
              echo "<span class='info-box-number'> $output</span>";
              ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <!-- left column -->
        <section class="col-lg-6 connectedSortable">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-user"></i>
              <h3 class="box-title">Config</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" role="form">
              <div class="box-body">
                <div class="form-group">

                     <div class="alert alert-info alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <i class="icon fa fa-info"></i>Pastikan Paket Pendukung Telah Terinstal !
                    </div>

                  <label for="exampleInputEmail1">Pengecualian IP</label>
                

<table>
<pre>
<?php
exec('mkdir -p limitdir');
exec('touch limitdir/ip.list');
$data = file_get_contents("limitdir/ip.list");
echo "<textarea name='iplist' id='isi' placeholder='Masukkan IP Pengecualian, Contoh:\n192.168.1.1\n192.168.1.99\n192.168.1.21' style='width: 100%; height: 100px; font-size: 13px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;' >$data</textarea>";
?>
</pre>
</table>

                  <label for="exampleInputEmail1">Speed Per IP</label>
                  <?php
                  exec("cat limitdir/sz|sed 's/ //g'",$ada);
                  $ada=$ada[0];
                  if ($ada) {
                  $sz = file_get_contents("limitdir/sz");
                  };
                  echo "<input type='text' name='size' size='1' value=\"$sz\"/ class='form-control' placeholder='mbps'>";
                  ?>
                </div>

                <div class="checkbox">
                <?php
                exec("cat limitdir/useip|awk -F '=' '{print $2}'",$useip);
                if ( $useip[0] == "yes"){
                echo'                  
                <label><input type="checkbox" name="use_ip" value="yes" Checked> IP Pengecualian</label>';
                } else {
                echo "<label><input type='checkbox' name='use_ip' value='yes' > IP Pengecualian</label> ";
                };
                ?>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan
                </button>
                <button type="submit" name="button1" class="btn btn-danger pull-right" style="margin-right: 5px;">
                <i class="fa fa-send"></i>  <?php echo exec('cat limitdir/st') ?>
                </button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </section>

          <section class="col-lg-6 connectedSortable">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <i class="fa fa-envelope"></i>
                  <h3 class="box-title">Log</h3>
                </div>

              <div class="box-body">
              <form action="" method="post">
              <table name='configbox10' id='isi'>
              <pre>
                  <?php
                  echo '<div id="log" class="scroll"></div></pre></div>';
                  ?>
              </pre>
              </table>
              </form>
              </div>
              </div>
  </section>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

      <footer class="main-footer">
          <?php include "footer.php"; ?>
      </footer>
</div>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Morris.js charts -->
       <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
     <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>


  <?php
  if (isset($_POST['button1'])) {
  exec('cat limitdir/st',$o);
if ( $o[0] == 'Start' ) {
 exec('killall -q limit');
 exec('chmod +x limit');
 exec('screen -d -m ./limit');
 exec('echo Stop > limitdir/st');
echo '<script>
  document.getElementById("strp").value="Stop";
</script>';
 } else {
 exec('killall -q limit');
 exec('echo "Auto Limit Client Stopped." > limitdir/log.txt');
 exec('tc qdisc del dev eth0 root handle 1: > /dev/null 2>&1');
 exec('echo Start > limitdir/st');
echo '<script>
  document.getElementById("strp").value="Start";
</script>';
}
  }
?>
<?php
 if (isset($_POST['simpan'])) {
 $ipl=$_POST['iplist'];
 $sz=$_POST['size'];
 $use_ip=$_POST['use_ip'];
 if ($use_ip <> 'yes' ){$use_ip='no';}
 exec("echo \"$sz\" > limitdir/sz");
 exec("echo \"$ipl\" > limitdir/ip.list");
 exec('echo -e "use_ip='.$use_ip.'" > limitdir/useip');
 exec("echo 'Berhasil Setup, Silahkan Start!' > limitdir/log.txt");
 exec('sed -i \'s/\r$//g\' limitdir/ip.list');
 exec('sed -i \':a;N;$!ba;s/\n\r//g\' limitdir/ip.list');
 exec('sed -i \':a;N;$!ba;s/\n\n//g\' limitdir/ip.list');
};
if($_POST['button2']){
exec("cat limitdir/sz|sed 's/ //g'",$ada);
$ada=$ada[0];
if ($ada) {
$sz = file_get_contents("limitdir/sz");
};
}
if (isset($_POST['simpan'])) {
    // I'm using Location because this will remove the get value
    echo "<script>document.location='limitation.php';</script>";
    exit;
}

if (isset($_POST['button1'])) {
   echo "<script>document.location='limitation.php';</script>";
    exit;
}
?>
</body>
</html>