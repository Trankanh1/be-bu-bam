<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Khách hàng
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Khách hàng<main></main></a></li>  
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header">
                        <div>
                            <h3 class="box-title">Danh sách khách hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Điện thoại</th>
                                        <th>Ngày sinh</th>
                                        <th>Địa chỉ</th>
                                        <th>PassWord</th>
                                        <th>Email</th>
                                        <th>Giới tính</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($Customers as $Customers)  : ?>
                                <tr>
                                <td><?php echo $Customers['id'] ?></td>
                                <td><?php echo $Customers['name'] ?></td>
                                <td><?php echo $Customers['phone'] ?></td>
                                <td><?php echo $Customers['birthday'] ?></td>
                                <td><?php echo $Customers['address'] ?></td>
                                <td><?php echo $Customers['password'] ?></td>
                                <td><?php echo $Customers['email'] ?></td>
                                <td>
                                <?php 
                                    if($Customers['gender'] == 1) echo 'Nam';
                                    if($Customers['gender'] == 0 ) echo 'Nữ';
                                ?>
                                </td>
                                <td> <a href="<?php echo BASE_URL?>admin.php?p=customer&act=edit&id=<?php echo $Customers['id'];?>"> <span class="glyphicon glyphicon-pencil btn btn-info"></span></a> 
                                <a href="<?php echo BASE_URL?>admin.php?p=customer&act=delete&id=<?php echo $Customers['id'];?>"> <span class="btn btn-danger glyphicon">&#xe020;</span> </a></td>
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