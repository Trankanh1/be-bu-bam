<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">
    <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
    <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Đơn hàng
          <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
          <li><a href="#">Đơn hàng</a></li>
          <li class="active">Danh sách đơn hàng </li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header">
            <div>

              <h3 class="box-title">Tất cả đơn hàng</h3>
              <div><?php flashMessagge() ?></div>
              <!-- <div style="float:right;margin-bottom:10px "><a href="<?php echo BASE_URL?>admin.php?p=order&act=create&role=admin" class="btn btn-block btn-primary btn-sm">Tạo đơn hàng</a></div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ngày đặt</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Tình trạng</th>
                    <th>Thêm trạng thái</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($orders as $order)  : ?>
                    <tr>
                      <td><?php echo $order['id'] ?></td>
                      <td><?php echo $order['created_at'] ?></td>
                      <td><?php echo $order['customer_name'] ?></td>
                      <td><?php echo substr($order['customer_add'],0,30).'...' ?></td>
                      <td><?php echo number_format($order['total_price']) ?></td>
                      <td><?php if($order['status'] == 1) echo '<span style=" background-color: blue; color:white;border-radius:3px;padding:2px">Đã xác nhận';
                      if($order['status'] == 2 ) echo '<span style=" background-color: green; color:white;border-radius:3px;padding:2px">Giao hàng thành công</span>';
                      if($order['status'] == 3 ) echo '<span style=" background-color: red; color:white;border-radius:3px;">Đã hủy </span>';
                      if($order['status'] == null ) echo '<span style=" background-color: orange; color:white;border-radius:3px;padding:2px 2px"> Chờ xác nhận </span>';
                    
                      ?></td>
                      <td> 
                        <?php  if($order['status'] == 3) :?>
                          
                        <?php endif ?>
                        <?php  if($order['status'] == 2) :?>
                          
                        <?php endif ?>
                        <?php if($order['status'] == 1) : ?>
                          <a class="btn btn-success" href="<?php echo BASE_URL ?>admin.php?p=order&act=updateStatus&id=<?php echo $order['id'] ?>&st=2">Giao thành công</a> 
                        <?php endif ?>
                          <?php if($order['status'] == 0) : ?>
                             <a class="btn btn-info" href="<?php echo BASE_URL ?>admin.php?p=order&act=updateStatus&id=<?php echo $order['id'] ?>&st=1">Xác nhận</a> 
                            <a class="btn btn-success" href="<?php echo BASE_URL ?>admin.php?p=order&act=updateStatus&id=<?php echo $order['id'] ?>&st=2">Giao thành công</a> 
                         
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach?>
                  

                </tbody>

              </table>





            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->

        </section>
        <!-- /.content -->
      </div>
      <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
    </div>
    <script>
      $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging': true,
          'lengthChange': false,
          'searching': false,
          'ordering': true,
          'info': true,
          'autoWidth': false
        })
      })
    </script>
  </body>

  </html>