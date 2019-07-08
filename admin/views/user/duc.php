<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Thêm mới tài khoản
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="<?php echo BASE_URL?>admin.php?p=user&act=index">">Tài khoản</a></li>
                    <li class="active">Thêm mới tài khoản</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Thông tin cơ bản</h3>
                            </div>
                            <!-- form start -->
                            <form role="form" method="post" action="<?php echo BASE_URL ?>admin.php?p=user&act=update&id=<?php echo $user[0]['id'];?>">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Tên tài khoản</label></div>
                                            <div class="col-md-8"><input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên tài khoản" name= "name"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Email</label></div>
                                            <div class="col-md-8"><input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập email" name="email"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Cấp độ</label></div>
                                            <div class="col-md-8"><select name="level" id="">
                                            <option value="0">Nhân viên</option>
                                            <option value="1">Admin</option>
                                            </select></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Điện thoại</label></div>
                                            <div class="col-md-8"><input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập số điện thoại"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Giới tính</div>
                                            <div class="col-md-8"><select name="gioitinh" id="">
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                            </select></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Mật khẩu</label></div>
                                            <div class="col-md-8"><input type="password" class="form-control" id="exampleInputEmail1" placeholder="Nhập số mật khẩu" name="password"></div>
                                        </div>
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
                        </div>
                    </div>
                    <!--/.col (right) -->
                </div>
                <div class="box-footer">
                    <button type="submit" style="margin-right:5px" class="btn btn-danger btn-lg">Hủy</button>
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
            //bootstrap WYSIHTML5 - text editor

            $('.select2').select2()
        })
    </script>
</body>

</html>