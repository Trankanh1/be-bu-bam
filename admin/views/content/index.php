<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Danh mục sản phẩm
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Sản phẩm<main></main></a></li>
                    <li class="active">Danh mục sản phẩm</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header">
                        <div>
                            <h3 class="box-title">Tất cả danh mục sản phẩm</h3>
                            <div style="float:right;margin-bottom:10px "><a href="<?php echo BASE_URL?>?p=category&act=create&role=admin" class="btn btn-block btn-primary btn-sm">Tạo danh mục</a></div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên</th>
                                        <th>Ngày tạo</th>
                                        <th>Hành động</th>

                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php if (count($products) > 0) : ?>
                                    <?php  foreach ($products as $product ) :?>
                                    <tr>
                                        <td><img src="<?php echo $product['cover_image'] ?>" alt=""></td>
                                        <td><?php echo $product['name'] ?></td>
                                        <td><?php echo $product['created_at'] ?></td>
                                        
                                    </tr>
                                    <?php endforeach ;
                                            endif?>
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