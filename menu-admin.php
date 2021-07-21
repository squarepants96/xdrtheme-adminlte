        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
          </div>

      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/logo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..." readonly="yes">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU <?php echo $level; ?></li>
            <li><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-gear"></i> <span>Configuration</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> SSH-SSL</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> V2ray/Vmess</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Trojan</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Multi Mode</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-send"></i> <span>Shortcut</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="../" target="blank"><i class="fa fa-circle-o"></i> LuCi-app</a></li>
                <li><a href="limitation.php"><i class="fa fa-circle-o"></i> Xderm-Limit</a></li>
                <li><a href="../libernet" target="blank"><i class="fa fa-circle-o"></i> Libernet</a></li>
                <li><a href="http://192.168.8.1/" target="blank"><i class="fa fa-circle-o"></i> Modem</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-download"></i> <span>Update</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="xderm-up.php"><i class="fa fa-circle-o"></i> Xderm</a></li>
                <li><a href="theme.php"><i class="fa fa-circle-o"></i> Theme</a></li>
              </ul>
            </li>
            <li><a href="about.php"><i class="fa fa-user"></i> <span>About</span></a></li>
            <li><a href="login.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
          </ul>
        </section>