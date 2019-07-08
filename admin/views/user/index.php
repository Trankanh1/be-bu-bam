<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Tài Khoản           
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#=">TÀI KHOẢN<main></main></a></li>
                   
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header">
                        <div>
                            <h3 class="box-title">Danh sách tài khoản</h3>
                            <div style="float:right;margin-bottom:10px "><a href="<?php echo BASE_URL?>admin.php?p=user&act=create&role=admin" class="btn btn-block btn-primary btn-sm">Thêm tài khoản</a></div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>EMail</th>                                 
                                        <th>Ảnh</th>
                                        <th>Cấp độ </th>
                                        <th>Giới tính </th>                                     
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (count($users) > 0) : ?>
                                        <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?php echo $user['id'] ?></td>
                                        <td><?php echo $user['name'] ?></td>
                                        <td><?php echo $user['email'] ?></td>
                                     <td> <img src= <?php echo $user['anh']?> style="width: 30px; height: auto"/></td>
                                        <td>  <?php  if($user['level']==0){
                                            echo 'Nhân viên';
                                        }
                                        else{
                                            echo 'Admin
                                            ';
                                        } ?></td>
                                        <td> <?php  if($user['gender']==0){
                                            echo 'Nam';
                                        }
                                        else{
                                            echo 'Nữ';
                                        } ?></td>
                                        <td> <a href="<?php echo BASE_URL?>admin.php?p=user&act=edit&id=<?php echo $user['id'];?>"> <span class="glyphicon glyphicon-pencil btn btn-info"></span></a> <a href="<?php echo BASE_URL?>admin.php?p=user&act=delete&id=<?php echo $user['id'];?>"> <span class="btn btn-danger glyphicon">&#xe020;</span> </a></td>
                                  
                                    </tr>
                                    <?php
                                    endforeach;
                                endif
                                ?>

                                </tbody>
                               
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
    </div>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
</body>

</html>