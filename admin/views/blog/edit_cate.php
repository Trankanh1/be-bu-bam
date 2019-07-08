<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Thêm mới danh mục

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Thêm mới danh mục</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <form role="form"method="post" action="<?php echo BASE_URL?>admin.php?p=blog&act=updatecate&id=<?php echo $blogcate[0]['id'];?>" enctype="multipart/form-data">
                    <div class="row">
                        <!-- left column -->

                        <div class="col-md-9">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Nhập tên danh mục" value="<?php echo $blogcate[0]['name'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea id="editor1" name="description"rows="10" cols="80"><?php echo $blogcate[0]['content'];?>
                                        </textarea>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-3">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Trạng thái</h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="radio" checked="" name="status" id="" value="1"> Hiển thị
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="radio" name="status" id="" value="0"> Ẩn
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <!-- Horizontal Form -->
                                <div class="box box-info">

                                </div>
                            </div>
                            <!--/.col (right) -->
                        </div>
                        <div class="box-footer">
                            <a href="<?php echo BASE_URL ?>index.php?p=blog&act=index"
                                style="margin-right:5px" class="btn btn-danger btn-lg">Hủy</a>
                            <button type="submit" name="submit" class="btn btn-primary  btn-lg">Lưu</button>

                        </div>
                </form>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
    </div>
    <script>
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        CKEDITOR.replace('editor2')
        //bootstrap WYSIHTML5 - text editor

        $('.select2').select2()
    })
    </script>
</body>

</html>