<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Thêm mới bài viết

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Blog</a></li>
                    <li class="active">Thêm mới bài viết</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <form role="form" method="post"  enctype="multipart/form-data"  action="<?php echo BASE_URL ?>admin.php?p=blog&act=storeBlog&role=admin">
                    <div class="row">
                        <!-- left column -->

                        <div class="col-md-9">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label> Tiêu đề</label>
                                        <input type="text" class="form-control"  name ="title" placeholder="Nhập tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung bài viết</label>
                                        <textarea id="editor1" name="description" rows="10" cols="80">                                   
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
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Ảnh bài viết</h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="horizontal-image"><img id="output_image"   src="public/admin/1q.jpg"  style="width: 274px; height: 240px"/>
                                        </div>
                                    </div >
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                    
                                        <input type="file" id="inputFile" cept="image/*" onchange="preview_image(event)" name="img" id="">
                                    </div>
                                    <!-- /.box-footer -->
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo BASE_URL ?>index.php?p=product&act=index&role=admin" style="margin-right:5px" class="btn btn-danger btn-lg">Hủy</a>
                        <button type="submit" name="submit" class="btn btn-primary  btn-lg    ">Lưu</button>
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
    <script type='text/javascript'>
        function preview_image(event) 
        {
                var reader = new FileReader();
                reader.onload = function()
            {
                var output = document.getElementById('output_image');
                 output.src = reader.result;
            }
                 reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>