<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Bài viết
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Bài viết<main></main></a></li>  
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header">
                        <div>
                           <i class="fa fa-fw fa-edit"></i><a href="<?php BASE_URL ?>admin.php?p=blog&act=indexCate" class="box-title">Danh mục bài viết</a>
                          <div style="float:right;margin-bottom:10px "><a href="<?php echo BASE_URL ?>admin.php?p=blog&act=create" class="btn btn-block btn-primary btn-sm">Thêm bài viết</a></div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tiêu đề</th>
                                    <th>Danh mục</th>
                                    <th>Tác giả</th>
                                    <th>Ngày đăng</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($blogs as $blog)  : ?>
                                    <tr>
                                        <td><img height="40px" width="40px" src="<?php echo $blog['cover_image'] ?>"></td>
                                        <td><?php echo $blog['name'] ?></td>
                                        <td><?php echo $blog['blog_category_id'] ?></td>
                                        <td><?php echo $blog['author'] ?></td>
                                        <td><?php echo $blog['created_at'] ?></td>
                                        <td> <a href="<?php echo BASE_URL ?>admin.php?p=blog&act=deleteBlog&id=<?php echo $blog['id'] ?>"><i class="fa fa-fw fa-trash-o fa-lg "></i>
                                        <a href="<?php echo BASE_URL ?>admin.php?p=blog&act=edit&id=<?php echo $blog['id'] ?>"><i class="glyphicon glyphicon-pencil "></i></a></td></a></td>
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