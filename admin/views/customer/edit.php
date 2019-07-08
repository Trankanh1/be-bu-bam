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
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Thông tin khách hàng</h3>
                            </div>
                            <!-- form start -->
                            <form method="post"
                                action="<?php echo BASE_URL?>admin.php?p=customer&act=update&id=<?php echo $Customers[0]['id'];?> "
                                enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Tên khách hàng</label></div>
                                            <div class="col-md-8"><input type="text" class="form-control" name="name"
                                                    id="exampleInputEmail1" value="<?php echo $Customers[0]['name'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Điện thoại</label></div>
                                            <div class="col-md-8"><input type="text" class="form-control" name="phone"
                                                    id="exampleInputEmail1"
                                                    value="<?php echo $Customers[0]['phone'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Email</label></div>
                                            <div class="col-md-8"><input type="text" class="form-control" name="email"
                                                    id="exampleInputEmail1"
                                                    value="<?php echo $Customers[0]['email'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Ngày sinh</label></div>
                                            <div class="col-md-8"><input type="text" class="form-control"
                                                    name="birthday" id="exampleInputEmail1"
                                                    value="<?php echo $Customers[0]['birthday'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Địa chỉ</label></div>
                                            <div class="col-md-8"><input type="text" class="form-control" name="address"
                                                    id="exampleInputEmail1"
                                                    value="<?php echo $Customers[0]['address'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Giới tính</div>
                                            <div class="col-md-8"><select name="gender" id="">
                                                    <option
                                                        <?php if($Customers[0]['gender'] == 0) echo "selected"?>value="0">
                                                        Nam</option>
                                                    <option
                                                        <?php if($Customers[0]['gender'] == 1) echo "selected"?>value="1">
                                                        Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>PassWord</label></div>
                                            <div class="col-md-8"><input type="password" class="form-control"
                                                    name="password" id="exampleInputEmail1"
                                                    value="<?php echo $Customers[0]['password'];?>">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                    </div>
                    <div style="text-align:center">
                        <!-- <div class="box-footer "> -->
                        <button type="submit" style="margin-right:5px" class="btn btn-danger btn-lg">Hủy</button>
                        <button type="submit" name="submit" class="btn btn-primary  btn-lg    ">Sửa</button>
                    </div>
                    <!-- </div> -->
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