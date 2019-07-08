 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DANH MỤC CHÍNH</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL?>admin.php?p=order&act=index"><i class="fa fa-circle-o"></i>Danh sách đơn hàng</a></li>
            <!-- <li><a href="<?php echo BASE_URL?>admin.php?p=order&act=index&role=admin"><i class="fa fa-circle-o"></i> Phiếu giao hàng</a></li>
            <li><a href="<?php echo BASE_URL?>admin.php?p=order&act=index&role=admin"><i class="fa fa-circle-o"></i> Quản lý COD</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL?>admin.php?p=product&act=index"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a></li>
            <li><a href="<?php echo BASE_URL?>admin.php?p=category&act=index"><i class="fa fa-circle-o"></i> Danh mục sản phẩm</a></li>
            <li><a href="<?php echo BASE_URL?>admin.php?p=product&act=createProductRelate"><i class="fa fa-circle-o"></i> Sản phảm liên quan</a></li>
            <li><a href="<?php echo BASE_URL?>admin.php?p=product&act=getTopSeller"><i class="fa fa-circle-o"></i> Sản phảm bán chạy</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Khách hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL?>admin.php?p=customer&act=index"><i class="fa fa-circle-o"></i>Danh sách khách hàng</a></li>
            
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Website </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL?>admin.php?p=blog&act=index"><i class="fa fa-circle-o"></i>Blog</a></li>
            <li><a href="<?php echo BASE_URL?>admin.php?p=page&act=index"><i class="fa fa-circle-o"></i> Trang nội dung</a></li>
            <li><a href="<?php echo BASE_URL?>admin.php?p=menu&act=index"><i class="fa fa-circle-o"></i>Menu</a></li>
           
          </ul>
        </li>
         <?php  if ($_SESSION['user']['user_level'] == 1) : ?>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>User </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="<?php echo BASE_URL?>admin.php?p=user&act=index"><i class="fa fa-circle-o"></i>Danh sách User</a></li>
           
          </ul>
        </li>
        <?php  endif?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->