<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1> SỬA THÔNG TIN </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="<?php echo BASE_URL?>admin.php?p=user&act=index">">Tài khoản</a></li>
                    <li class="active">Sửa tài khoản</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div style=" text-align: center;" class="box-header with-border">
                                <h3 class="box-title">Thông tin cơ bản</h3>
                            </div>
                            <div style=" text-align: center;"> <img id="image_upload_preview" class=" img-circle"   src="<?php echo $user[0]['anh'] ; ?>" style= "  width: 200px; height: 200px"/></div>
                            <!-- form start -->
                            <form method="post"action="<?php echo BASE_URL?>admin.php?p=user&act=updated&id=<?php echo $user[0]['id'];?> " enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Tên tài khoản</label></div>
                                            <div class="col-md-8"><input type="text" class="form-control" name="name"
                                                id="exampleInputEmail1" value="<?php echo $user[0]['name'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Email</label></div>
                                            <div class="col-md-8"><input type="email" class="form-control"
                                                id="exampleInputEmail1" value=" <?php echo $user [0]['email'];?>"
                                                name="email"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                       
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4"><label>Ảnh</label></div>
                                                <div   class="col-md-8"><input name="anh" type="file" id="inputFile" class="form-control"  >  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <div class="col-md-4"><label>Giới tính</div>
                                                    <div class="col-md-8"><select name="gender" id="">
                                                        <option
                                                        <?php if($user[0]['gender'] == 0) echo "selected"?>value="0">
                                                    Nam</option>
                                                    <option
                                                    <?php if($user[0]['gender'] == 1) echo "selected"?>value="1">
                                                Nữ</option>
                                            </select></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Mật khẩu</label></div>
                                            <div class="col-md-8"><input type="password" class="form-control"
                                                name="password"
                                                value=" <?php echo $user [0]['password'];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-3">
                            <!-- Horizontal Form -->
                        <!-- <div class="box box-info">
                        </div> -->
                        
                    </div>
                    
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
            $('.select2').select2();

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        console.log(e.target.result);
                        $('#image_upload_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#inputFile").change(function () {
                console.log("KJKdj");
                readURL(this);

            });
            console.log("OK");
        })
    </script>
</body>

</html>