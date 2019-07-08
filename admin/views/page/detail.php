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
                <form role="form" method="post" action="<?php echo BASE_URL ?>admin.php?p=page&act=updatePage&id=<?php echo$_GET['id']?>">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input value="<?php echo $page[0]['name'] ?>" name="name" type="text" class="form-control"     placeholder="Nhập tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea value="" id="editor1" name="content" rows="10" cols="80"><?php echo $page[0]['content'] ?>
                                        </textarea>
                                       
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

                                </div>
                                
                                <!-- /.box-body -->                     
                            </div>

                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <div class="box-footer">
                        <a href="<?php echo BASE_URL ?>admin.php?p=page&act=index" style="margin-right:5px" class="btn btn-danger btn-lg">Hủy</a>
                        <button type="submit" name="edit" class="btn btn-primary  btn-lg ">Lưu</button>

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
            CKEDITOR.replace('editor3',{
                removePlugins: 'a11yhelp,basicstyles,blockquote,button,clipboard,colorbutton,colordialog,contextmenu,div,elementspath,enterkey,entities,find,font,format,horizontalrule,htmldataprocessor,indent,justify,keystrokes,list,liststyle,maximize,newpage,pagebreak,pastefromword,pastetext,popup,preview,removeformat,resize,save,showblocks,showborders,sourcearea,stylescombo,table,tabletools,specialchar,tab,toolbar,undo,table'
            });
            //bootstrap WYSIHTML5 - text editor
            $('.select2').select2()

            $('#description-ui').on('click', function(e){
                e.preventDefault();
                $('#box-description').show();
                $(this).hide();
            })
        })
    </script>
</body>

</html>