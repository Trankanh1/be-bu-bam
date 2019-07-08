<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Thêm menu

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Menu</a></li>
                    <li class="active">Thêm menu</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <form role="form" method="post" action="<?php echo BASE_URL ?>admin.php?p=menu&act=store&id=?>">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-2">
                            <!-- /.box -->
                        </div>
                        <div class="col-md-8" >
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input type="text"   class="form-control"  placeholder="vd: Menu chính, Footer">
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <div class="box box-primary menu-ui"  style="">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Liên kết</h3>
                                    <div  style="">
                                        <div class="box-body">
                                         <p id="title-empty">Menu này chưa có liên kết nào</p>
                                         <div class="form-group">

                                            <div  class="col-md-12" id="">
                                                <div class="menu-content-link">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- form start -->

                            <!-- /.box-body -->

                        </div>
                        <div class="form-group">
                         <a href=""><button id="insert-link"> Thêm liên kết</button></a>
                     </div> 
                     <!-- /.box -->
                 </div>
                 <!--/.col (left) -->
                 <!-- right column -->
                 <div class="col-md-2">
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
    <div class="menu-link" style="display: none;">
        <div class="box-body">
            <input type="hidden" name="position[]">
            <div class="form-group">
                <div class="col-md-9">
                    <input type="text" name=name[]" class="form-control"  placeholder="Nhập tên liên kết">
                </div>
                <div class="col-md-3">
                    <a href="" class="btn btn-default"> <i class="fa fa-trash" aria-hidden="true" ></i></a>
                </div>
            </div>

            <div class="form-group">
                <label for="">...</label>
                <div  class="col-md-12" id="">

                    <div  class="col-md-3 ">
                        <select  " style="background-color:#f4f4f4" class="form-control list-cate " >
                            <option value="home">Trang chủ</option>
                            <option value="category">Danh mục sản phẩm</option>
                            <option value="product">Sản phẩm</option>
                            <option value="page">Trang nội dung</option>
                            <option value="blog">Blog</option>
                        </select>
                    </div>
                    <div class="menu-content-link">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
</div>
<script>
    $(function() {

        $('.select2').select2();

        $('#insert-link').on('click', function(e){
            $('#title-empty').hide();
            e.preventDefault();
            var newLink = $('.menu-link').html();

            $(".menu-ui").append(newLink);
            $('.box-body .form-group .col-md-12').each(function(i){
                var i = i+1;
                $(this).attr("id",'id_'+i);
                $(this).attr("data-id",i);
            });
        });
        $(document).on('change','.list-cate',function(){

            var selectboxId = $(this).parent().parent().attr('data-id');
            var keySearch = $(this).val();

            $.getJSON( 'http://lap-trinh-web.com/admin.php?p=menu&act=searchCategory&key='+keySearch, function(data) {
              var item = [];

              if(Object.keys(data).length > 1){

                  $.each(data, function(key,val)  {
                    if(!isNaN(key)){
                       item.push('<option value="'+data.key+'-'+val.id+'" >'+val.name+'</option>');
                   };
                   $('#id_'+selectboxId + ' .menu-content-link').html('<div class="col-md-3"><select name="link[]" style="background-color:#f4f4f4" class="form-control list-cate" name="Links[][]">'+item.join("")+'</select></div>').show();
               }) ;
              } else { $('#id_'+selectboxId + ' .menu-content-link').empty() };

          });
            
        });
        
    })
</script>
</body>

</html>