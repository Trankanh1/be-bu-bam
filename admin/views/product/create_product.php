<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Thêm mới sản phẩm
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Thêm mới sản phẩm</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
              <form role="form" method="post" class="dropzone"  action="<?php echo BASE_URL ?>admin.php?p=product&act=store&role=admin">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea id="editor1" name="content" rows="10" cols="80">
                                    </textarea>
                                    <a id="description-ui">Thêm mô tả ngắn</a>
                                </div>
                                <div id="box-description" style="display: none;" class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea id="editor2" name="description" rows="10" cols="80">
                                    </textarea>
                                </div>
                                <div  class="form-group">

                                    <label>Ảnh sản phẩm</label>
                                    <div class="box-image"  id="myDropzone"><p>Thả file ảnh vào đây để thêm mới</p>
                                    </div> 
                                </div>
                                <div class="box-header with-border">
                                    <h3 class="box-title">Giá sản phẩm</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Giá:</label></div>
                                            <div class="col-md-8"><input type="number" name="price"  class="form-control" placeholder="0đ"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col-md-4"><label>Giá so sánh:</label></div>
                                            <div class="col-md-8"><input type="number" name="origin_price"  class="form-control" placeholder="0đ"></div>
                                        </div>
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
                                        <input type="radio" checked="" name="status" id="" value="1" >  Hiển thị
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="radio" name="status" id="" value="0"> Ẩn
                                    </div>
                                </div>

                                <label>Tình trạng kho hàng</label>

                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="radio" name="stock_status" id=""  value="1" >  Còn hàng
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="radio" name="stock_status" id="" value="0"> Hết hàng
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
                                        <?php foreach ($categories as $category)  :?>
                                            <option  value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                                        <?php endforeach ?>
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
                    <input type="hidden" id="image" name="images" >
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
            CKEDITOR.replace('editor2');
            // CKEDITOR.replace('editor3',{
            //     removePlugins: 'a11yhelp,basicstyles,blockquote,button,clipboard,colorbutton,colordialog,contextmenu,div,elementspath,enterkey,entities,find,font,format,horizontalrule,htmldataprocessor,indent,justify,keystrokes,list,liststyle,maximize,newpage,pagebreak,pastefromword,pastetext,popup,preview,removeformat,resize,save,showblocks,showborders,sourcearea,stylescombo,table,tabletools,specialchar,tab,toolbar,undo,table'
            // });
            //bootstrap WYSIHTML5 - text editor
            $('.select2').select2()

            $('#description-ui').on('click', function(e){
                e.preventDefault();
                $('#box-description').show();
                $(this).hide();
            });
            var arFiles = [];
            var myDropzone = new Dropzone("div#myDropzone", { 
                url: 'http://bebubam.com/admin.php?p=product&act=uploadFiles', 
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
</body>

</html>
