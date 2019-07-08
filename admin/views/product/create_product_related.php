<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Thêm sản phẩm liên quan
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Trang nội dung</a></li>
                    <li class="active">Thêm mới trang</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <form role="form" method="post" action="<?php echo BASE_URL ?>admin.php?p=product&act=storeProductRelate">
                    <div class="row">
                      <div class="col-md-1">

                        <!-- /.box -->
                    </div>
                    <!-- left column -->
                    <div class="col-md-9">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Chọn sản phẩm</label>
                                    <select name="product_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        <?php foreach ($products as $product)  :?>
                                            <option  value="<?php echo $product['id']?>"><?php echo $product['name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Chọn sản phẩm liên quan</label>
                                    <select name="product_related_id[]"  class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        <?php foreach ($products as $product)  :?>
                                            <option  value="<?php echo $product['id']?>"><?php echo $product['name']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-2">

                        <!-- /.box -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <div class="box-footer">
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
            $('.select2').select2();
            CKEDITOR.replace('editor1');
            CKEDITOR.replace('editor2');
            CKEDITOR.replace('editor3',{
                removePlugins: 'a11yhelp,basicstyles,blockquote,button,clipboard,colorbutton,colordialog,contextmenu,div,elementspath,enterkey,entities,find,font,format,horizontalrule,htmldataprocessor,indent,justify,keystrokes,list,liststyle,maximize,newpage,pagebreak,pastefromword,pastetext,popup,preview,removeformat,resize,save,showblocks,showborders,sourcearea,stylescombo,table,tabletools,specialchar,tab,toolbar,undo,table'
            });
            //bootstrap WYSIHTML5 - text editor


            $('#description-ui').on('click', function(e){
                e.preventDefault();
                $('#box-description').show();
                $(this).hide();
            })
        })
    </script>
</body>

</html>