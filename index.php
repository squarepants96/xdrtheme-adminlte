<?php
 exec("ls login.php|awk 'NR==1'|awk -F '.' '{print $1}'",$clo);
  if ($clo[0]) {
include 'header.php';
ceklogin();
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
function shipping_calc() {
  var val = document.getElementById("idconf").value;
 if (val === "config1") {
   var data = document.getElementById("isi1").value;
   document.getElementById("isi").value= data;
 }
 if (val === "config2") {
   var data = document.getElementById("isi2").value;
   document.getElementById("isi").value= data;
 }
 if (val === "config3") {
   var data = document.getElementById("isi3").value;
   document.getElementById("isi").value= data;
 }
 if (val === "config4") {
   var data = document.getElementById("isi4").value;
   document.getElementById("isi").value= data;
 }
 if (val === "config5") {
   var data = document.getElementById("isi5").value;
   document.getElementById("isi").value= data;
 }
}
</script>

<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: "screenlog.0",
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


$.get("http://ip-api.com/json", function (response) {
    $("#ip").html(" " + response.query);
    $("#address").html("Location: " + response.country + ", " + response.city);
    $("#isp").html(" " + response.isp);
}, "jsonp");


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

      <div class="content-wrapper">
        <section class="content-header">
          <h1> Dashboard
          <small>Xderm Mini GUI</small>
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
  <section class="col-lg-6 connectedSortable">
              <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-user"></i>
                  <h3 class="box-title">Select Config </h3>
                 </div>

                    <div class="box-body">
                     <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <i class="icon fa fa-check"></i>Config Sekarang : <b><?php echo exec('cat config/default') ?></b>
                    </div>

                  <form method="post">
                   <table>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Config</label>
                      <select type="text" class="form-control" name="profile" id="idconf" onchange="shipping_calc()">
                        <?php
                        exec("cat config/config.list",$list);
                        exec("cat config/default",$default);
                        $default=$default[0];
                        $x=0;
                        while($x<count($list)){
                        if ( $default == $list[$x] ){
                        echo "<option value=\"$list[$x]\" selected>$list[$x]</option>";
                        } else {
                        echo "<option value=\"$list[$x]\">$list[$x]</option>";}
                          $x++;}
                          ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Mode</label>
                      <select type="text" class="form-control" name="mode" id="idmode" onchange="shipping_calc()">
                        <?php
                        exec("cat config/mode.list",$modelist);
                        exec("cat config/mode.default",$modedefault);
                        $modedefault=$modedefault[0];
                        $u=0;
                        while($u<count($modelist)){
                        if ( $modedefault == $modelist[$u] ){
                        echo "<option value=\"$modelist[$u]\" selected>$modelist[$u]</option>";
                        } else {
                        echo "<option value=\"$modelist[$u]\">$modelist[$u]</option>";}
                          $u++;}
                          ?>
                      </select>
                    </div>
                  </table>

<table>
<pre>
<?php
exec("cat config/config.list|awk 'NR==1'",$ada);
$ada=$ada[0];
if ($ada) {
exec("cat config/default",$default);
$default=$default[0];
 if ($default) {
$data = file_get_contents("config/$default");
echo "<textarea name='configbox' id='isi' placeholder='Masukkan config disini' style='width: 100%; height: 205px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;' >$data</textarea>";
 } else {
$data = file_get_contents("config.txt");
echo "<textarea name='configbox' id='isi' placeholder='Masukkan config disini' style='width: 100%; height: 205px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;' >$data</textarea>";
 }
$data1 = file_get_contents("config/config1");
echo "<textarea name='configbox1' id='isi1' rows='12' cols='10' style='display:none;'>$data1</textarea>";
$data2 = file_get_contents("config/config2");
echo "<textarea name='configbox2' id='isi2' rows='12' cols='10' style='display:none;'>$data2</textarea>";
$data3 = file_get_contents("config/config3");
echo "<textarea name='configbox3' id='isi3' rows='3' cols='10' style='display:none;'>$data3</textarea>";
$data4 = file_get_contents("config/config4");
echo "<textarea name='configbox4' id='isi4' rows='3' cols='10' style='display:none;'>$data4</textarea>";
$data5 = file_get_contents("config/config5");
echo "<textarea name='configbox5' id='isi5' rows='3' cols='10' style='display:none;'>$data5</textarea>";
}
?>
</pre>
</table>

                  <table>
                    <form method="post"'>
                    <div class="row">
                                <div class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check form-switch">
                                        <?php
                                        exec("cat config/modem|awk 'NR==1'",$modem);
                                        if (!$modem[0]) { exec("echo no > config/modem"); }
                                        if ( $modem[0] == "yes"){
                                        echo '<input type="checkbox" name="use_waitmodem" value="yes" checked> Waiting Modem '; }
                                        else {
                                        echo '<input type="checkbox" name="use_waitmodem" value="yes"> Waiting Modem '; }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check">
                                      <?php
                                        exec("cat config/dns|awk -F '=' '{print $2}'",$dns);
                                        if ( $dns[0] == "yes"){
                                        echo '<input type="checkbox" name="use_dns" value="yes" checked> DNS-Resolver'; }
                                        else {
                                        exec("echo 'use_dns=no' > config/dns");
                                        echo '<input type="checkbox" name="use_dns" value="yes"> DNS-Resolv'; }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check">
                                      <?php
                                        exec("cat config/gotun|awk 'NR==1'",$gotun);
                                        if (!$gotun[0]) { exec("echo no > config/gotun"); }
                                        if ( $gotun[0] == "yes"){
                                        echo '<input type="checkbox" name="use_gotun" value="yes" checked> go-tun2socks'; }
                                        else {
                                        echo '<input type="checkbox" name="use_gotun" value="yes"> go-tun2socks'; }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check">
                                      <?php
                                        exec("cat config/firewall|awk 'NR==1'",$restfw);
                                        if (!$restfw[0]) { exec("echo no > config/firewall"); }
                                        if ( $restfw[0] == "yes"){
                                        echo '<input type="checkbox" name="use_restfw" value="yes" checked> Restart Firewall'; }
                                        else {
                                        echo '<input type="checkbox" name="use_restfw" value="yes"> Restart Firewall'; }
                                      ?>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check">
                                      <?php
                                        exec("cat config/stun|awk 'NR==1'",$stun);
                                        if (!$stun[0]) { exec("echo yes > config/stun"); }
                                        if ( $stun[0] == "yes"){
                                        echo '<input type="checkbox" name="use_stunnel" value="yes" checked> Stunnel'; }
                                        else {
                                        echo '<input type="checkbox" name="use_stunnel" value="yes"> Stunnel'; }
                                      ?>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 pb-lg-1">
                                    <div class="form-check">
                                      <?php
                                      exec("touch /etc/rc.local");
                                      exec("cat /etc/rc.local 2>/dev/null|grep xderm|grep button|awk '{print $2}'|awk 'NR==1'",$boot);
                                       if ($boot[0]) {
                                      echo "<input type='checkbox' name='use_boot' value='yes' checked> ON-Boot"; }
                                      else {
                                      echo "<input type='checkbox' name='use_boot' value='yes'> ON-Boot"; }
                                      ?>
                                    </div>
                                </div>
                 </div>

        <div class="row no-print">
        <div class="col-xs-12">
          <br>
          <button type="submit" name="button3" id="logg" class="btn btn-info"><i class="fa fa-refresh"></i> Refresh</button>
          <button type="submit" name="simpan" class="btn btn-success pull-right"><i class="fa fa-save"></i> Save
          </button>
          <button type="submit" name="button1" class="btn btn-danger pull-right" style="margin-right: 5px;">
            <i class="fa fa-send"></i>  <?php echo exec('cat log/st') ?>
          </button>
        </div>
        </div>

      </form>
      </table>

  </div>
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
                  echo '<div id="log" class="scroll"></div></pre>';
                  ?>
              </pre>
              </table>
              </form>
              </div>
              </div>
  </section>
  </div>

</section>

      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
          <?php include "footer.php"; ?>
      </footer>
      </div><!-- ./wrapper -->

      
</body>
</html>

<?php
  if (isset($_POST['button1'])) {
  exec('cat log/st',$o);
if ( $o[0] == 'Start' ) {
 exec('killall -q xderm-mini');
 exec('echo > screenlog.0');
 exec('chmod +x xderm-mini');
 exec('screen -L -dmS gua ./xderm-mini start');
 exec('echo Stop > log/st');
echo '<script>
  document.getElementById("strp").value="Stop";
</script>';
 } else {
 exec('killall -q xderm-mini');
 exec('echo > screenlog.0');
 exec('chmod +x xderm-mini');
 exec('screen -L -dmS gu ./xderm-mini stop');
 exec('echo Start > log/st');
echo '<script>
  document.getElementById("strp").value="Start";
</script>';
}
  }
  if (isset($_POST['button2'])) {
  exec('echo > screenlog.0');
  }
  if (isset($_POST['button4'])) {
  exec('killall -q xderm-mini');
  exec('echo > screenlog.0');
  exec('chmod +x xderm-mini');
  exec('screen -L -dmS upd ./xderm-mini update');
  }
  if (isset($_POST['button3'])) {
  exec('cp log/log.txt screenlog.0 2>/dev/null');
  }

  if (isset($_POST['simpan'])) {
 $config=$_POST['configbox'];
 $conf=$_POST['profile'];
 $use_dns=$_POST['use_dns'];
 $use_stunnel=$_POST['use_stunnel'];
 $use_gotun=$_POST['use_gotun'];
 $use_restfw=$_POST['use_restfw'];
 $use_waitmodem=$_POST['use_waitmodem'];
 $mode=$_POST['mode'];
 if ($use_stunnel <> 'yes' ){$use_stunnel='no';}
 if ($use_dns <> 'yes' ){$use_dns='no';}
 if ($use_gotun <> 'yes' ){$use_gotun='no';}
 if ($use_restfw <> 'yes' ){$use_restfw='no';}
 if ($use_waitmodem <> 'yes' ){$use_waitmodem='no';}
 exec('echo "'.$mode.'" > config/mode.default');
 exec('echo "'.$config.'" > config/'.$conf);
 exec('sed -i \'/mode=/,+0 d\' config/'.$conf);
 exec('sed -i \'s/\r$//g\' config/'.$conf);
 exec('sed -i \':a;N;$!ba;s/\n\n//g\' config/'.$conf);
 exec('echo -e "use_dns='.$use_dns.'" > config/dns');
 exec('echo "'.$config.'" > config.txt');
 exec('sed -i \'s/\r$//g\' config.txt');
 exec('sed -i \':a;N;$!ba;s/\n\n//g\' config.txt');
 exec('echo "'.$use_stunnel.'" > config/stun');
 exec('echo "'.$use_gotun.'" > config/gotun');
 exec('echo "'.$use_restfw.'" > config/firewall');
 exec('echo "'.$use_waitmodem.'" > config/modem');
 exec('echo "'.$conf.'" > config/default');
 exec('echo "Config telah di update." > screenlog.0');
 exec('echo "\''.$conf.'\' Menjadi default Config. !" >> screenlog.0');
 $use_boot=$_POST['use_boot'];
if ($use_boot <> 'yes' ){ exec('./xderm-mini disable');
} else { exec('./xderm-mini enable'); }
 exec("cat config/default",$default);
 }
if($_POST['button2']){
exec("cat config/mode.list|awk 'NR==1'",$adamode);
$adamode=$adamode[0];
if (!$adamode) {
exec("echo SSH. >> config/mode.list");
exec("echo Vmess. >> config/mode.list");
exec("echo Trojan. >> config/mode.list");
exec("echo Multi. >> config/mode.list"); 
}else {
exec("mkdir -p config;touch config/config.list config/config1 config/config2");
exec("touch config/config3 config/config4 config/config5 config/mode.list");
exec("echo config1 >> config/config.list");
exec("echo config2 >> config/config.list");
exec("echo config3 >> config/config.list");
exec("echo config4 >> config/config.list");
exec("echo config5 >> config/config.list");
exec("echo config1 >> config/default");
$data = file_get_contents("config.txt");
echo "<textarea name='configbox' id='isi' rows='9' cols='50'>$data</textarea>";
$config=$_POST['configbox'];
$conf=$_POST['profile'];
exec('echo "'.$config.'" > config/'.$conf);
exec('sed -i \'s/\r$//g\' config/'.$conf);
exec('sed -i \':a;N;$!ba;s/\n\n//g\' config/'.$conf);
}
}

 if (isset($_POST['simpan'])) {
    // I'm using Location because this will remove the get value
    echo "<script>document.location='index.php';</script>";
    exit;
}

if (isset($_POST['button1'])) {
   echo "<script>document.location='index.php';</script>";
    exit;
}
?>


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

    <script>
      $(function () { 
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
    </script>


