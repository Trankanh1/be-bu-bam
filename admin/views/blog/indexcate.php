<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   Danh sách danh mục
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Danh mục bài viết<main></main></a></li>  
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header">
                        <div>
              
                          <div style="float:right;margin-bottom:10px "><a href="<?php echo BASE_URL ?>admin.php?p=blog&act=createBlogCategory" class="btn btn-block btn-primary btn-sm">Tạo danh mục</a></div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                 
                                    <th>Danh Mục</th>
                                    <th>Nội Dung</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($blogs as $blog)  : ?>
                                    <tr>
                                        <td><?php echo $blog['name'] ?></td>
                                        <td><?php echo $blog['content'] ?></td>
                                        <td></td>
                                        <td> <a href="<?php echo BASE_URL ?>admin.php?p=blog&act=delete&id=<?php echo $blog['id'] ?>"><i class="fa fa-fw fa-trash-o fa-lg "></i></a>
                                        <a href="<?php echo BASE_URL ?>admin.php?p=blog&act=editcate&id=<?php echo $blog['id'] ?>"><i class="glyphicon glyphicon-pencil "></i></a></td>
                                    <?php endforeach ?>                        
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