<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Menu đa cấp (chức năng này đang được cập nhật)

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                    <li><a href="#">Menu</a></li>
                    <li class="active">Danh sách menu</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="col-md-8">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Main menu</h3>
                            <div style="float:right;margin-bottom:10px "><a href="<?php echo BASE_URL ?>admin.php?p=menu&act=create" class="btn btn-block btn-primary btn-sm">Tạo menu</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <?php if(isset($menu) && count($menu) > 0 ) :?>
                            <a href="<?php echo BASE_URL ?>admin.php?p=menu&act=editMenu">
                                <span class="fa fa-arrow-down"></span>
                            Sửa menu</a>
                        <?php endif ?>
                        <?php foreach($menu as $item): ?>
                            <?php if($item['parent_id'] == null) :?>
                               <div class="form-group">
                                <div class="col-md-1">
                                    <span>:::</span>
                                </div>
                                <div class="col-md-10">
                                    <span> <?php echo $item['name'] ?></span>
                                </div>
                            <?php  endif?>
                            <?php foreach($menu as $child): $check = false; ?>
                                <?php if ($child['parent_id'] == $item['id']) {
                                    $check = true;
                                    break;
                                } ?>
                            <?php endforeach ;?>
                            <?php if($check == true) { 

                                echo '<div class="col-md-1">
                                <a href="'.BASE_URL.'admin.php?p=menu&act=editMenu&sub=true&id='.$item['id'].'">Sửa</a>
                                </div>';
                                echo ' 
                                <hr width="50%" align="center">';
                                continue;
                            } else if($item['parent_id'] == '') {
                             echo '<div class="col-md-1">
                             <a href="'.BASE_URL.'admin.php?p=menu&act=create&id='.$item['id'].'">Tạo</a>
                             </div>';
                             echo ' 
                             <hr width="50%" align="center">';
                             continue;
                         }
                         ?>

                     <?php endforeach?>
                 </div>
             </div>
         </div>
     </div>

 </div>
 <!-- /.box-body -->
 <div class="box-footer">
    Footer
</div>
<!-- /.box-footer-->
</div>
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
</div>

</body>

</html>