<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Sửa sản phẩm</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <form role="form" method="post" action="<?php echo BASE_URL ?>?p=product&act=update&id=<?php echo $_GET['id']?>">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="<?php if (isset($product)) echo $product[0]['name'];
                                        else $_POST['name']  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea id="editor1" name="content" rows="10" cols="80" value="<?php if (isset($product)) echo $product[0]['content'];
                                        else $_POST['name']  ?>">
                                    </textarea>
                                    <a id="description-ui">Thêm mô tả ngắn</a>
                                </div>
                                <div id="box-description" style="display: none;" class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea id="editor2" name="description" rows="10" cols="80">
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <div class="box-image" id="myDropzone"><p>Thả file ảnh vào đây để thêm mới</p>
                                        <?php if(isset($images) && count($images)> 0) :?>
                                        <?php foreach($images as $image) :?>
                                            <div class="dz-preview dz-processing dz-complete dz-image-preview"> 
                                               <div class="dz-image">
                                                <img data-dz-thumbnail="" src="<?php echo $image['image'] ?>">
                                            </div>
                                            <div class="dz-details">
                                            </div>
                                            <div class="dz-size">
                                            </div>
                                            <div class="dz-filename">
                                            </div>
                                            <div class="dz-error-message">
                                            </div>
                                            <div class="dz-success-mark"> 
                                            </div>
                                        </div>
                                    <?php endforeach;  endif;?>

                                </div> 
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title">Giá sản phẩm</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-6">
                                    <div class="col-md-4"><label>Giá:</label></div>
                                    <div class="col-md-8"><input type="number" name="price" class="form-control" placeholder="Nhập giá" value="<?php if (isset($product)) echo $product[0]['price'];
                                    else $_POST['price']  ?>"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="col-md-4"><label>Giá so sánh:</label></div>
                                    <div class="col-md-8"><input type="number" name="origin_price" class="form-control" placeholder="Nhập giá so sánh" value="<?php if (isset($product)) echo $product[0]['origin_price'];
                                    else $_POST['origin_price']  ?>"></div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Trạng thái sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="radio" <?php if (isset($product) &&  $product[0]['status'] == 1)  echo 'checked';
                                    else if (isset($_POST['status']) && $_POST['status'] == 1) echo '"checked"'  ?> name="status" id="" value="1"> Hiển thị
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="radio" <?php if (isset($product) &&  $product[0]['status'] == 0)  echo 'checked';
                                    else if (isset($_POST['status']) && $_POST['status'] == 0) echo '"checked"'  ?> name="status" id="" value="0"> Ẩn
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Trạng thái kho</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="radio" <?php if (isset($product) &&  $product[0]['stock_status'] == 1)  echo 'checked';
                                    else if (isset($_POST['stock_status']) && $_POST['stock_status'] == 1) echo '"checked"'  ?> name="stock_status" id="" value="1"> Còn hàng
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="radio" <?php if (isset($product) &&  $product[0]['stock_status'] == 0)  echo 'checked';
                                    else if (isset($_POST['stock_status']) && $_POST['stock_status'] == 0) echo '"checked"'  ?> name="stock_status" id="" value="0"> Hết hàng
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Đơn vị</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label for="">Đơn vị sản phẩm:</label>
                                    <input type="text" name="unit" id="" value="<?php if (isset($product)) echo $product[0]['unit'];
                                    else echo $_POST['unit']  ?>">
                                </div>
                            </div>

                        </div>

                        <!-- /.box-body -->
                    </div>
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh mục</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group">

                                <label>Danh mục</label>
                                <select name="categories_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <?php if (count($productCategories) > 0) : ?>
                                        <?php foreach ($productCategories as $productCategory) : ?>
                                            <option selected value="<?php echo $productCategory['category_id'] ?>"><?php echo $productCategory['category_name'] ?></option>
                                        <?php endforeach;
                                    endif
                                    ?>
                                </select>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <div class="box-footer">
                <input type="hidden" id="image" name="images">
                <a href="<?php echo BASE_URL ?>admin.php?p=product&act=index&role=admin" style="margin-right:5px" class="btn btn-danger btn-lg">Hủy</a>
                <button type="submit" name="submit" class="btn btn-primary  btn-lg ">Lưu</button>

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

            $('.select2').select2();
            var arFiles = [];
            var myDropzone = new Dropzone("div#myDropzone", { 
                url: 'http://lap-trinh-web.com/admin.php?p=product&act=uploadFiles', 
            // The setting up of the dropzone
            init: function () {
            },
            accept: function(file, done) 
            {
                var re = /(?:\.([^.]+))?$/;
                var ext = re.exec(file.name)[1];
                ext = ext.toUpperCase();
                if ( ext == "JPG" || ext == "JPEG" || ext == "PNG" ||  ext == "GIF" ||  ext == "BMP") 
                {
                    done();
                }else { 
                    done("Please select only supported picture files."); 
                }
            },
            success: function( file, response ){

             obj = JSON.parse(response);
             arFiles.push(obj.filename);
             $('input[name="images"').val(arFiles);

         }
     })
        })
    </script>
    <script type="text/javascript">
        
      $('#description-ui').on('click', function(e){
        e.preventDefault();
        $('#box-description').show();
        $(this).hide();
    });
</script>
</body>

</html>