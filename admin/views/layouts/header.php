
<header class="main-header">
  <!-- Logo -->
  <span href="#" class="logo">
    <div class="col-md-12">
      <div class="col-md-9">
        <!-- mini logo for sidebar mini 50x50 pixels -->
    
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>3B</b><small>web</small> </span>
      </div>
      <div class="col-md-3">
        
      <a href="<?php echo BASE_URL ?>?p=home&act=index" style="background-color:#367fa9" class="btn btn-primary btn-lg"><i class="fa fa-eye"></i></a>
      </div>
    </div>
  </span>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           <img class="user-image" alt="User Image" src= "<?php echo @$_SESSION['user']['user_anh']?> " > 
            <span class="hidden-xs"><?php  echo @$_SESSION['user']['user_name']?></span>
          </a>
          <ul class="dropdown-menu">
     
            <!-- Menu Body -->
            <li class="user-body">
           
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo BASE_URL?>admin.php?p=user&act=created&id=<?php echo @$_SESSION['user']['user_id'];?> " class="btn btn-default btn-flat">Tài khoản</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo BASE_URL ?>admin.php?p=user&act=logout&role=admin" class="btn btn-default btn-flat">Đăng xuất</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>