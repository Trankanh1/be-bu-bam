<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
        <?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Sản phẩm bán chạy
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li><a href="#">Sản phẩm<main></main></a></li>
                    <li class="active">Danh sách sản phẩm bán chạy</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-12">
                            <h3 class="box-title col-md-2">Tất cả sản phẩm    <?php flashMessagge() ?></h3>
                          
                            <form action="<?php echo BASE_URL ?>admin.php?p=product&act=storeTopSeller" method="POST" >
                                <div class="form-group col-md-9" >
                                    <label >Chọn tên sản phẩm:</label>
                                    <select  name="product[]" class="col-md-10 select2" multiple="multiple" data-placeholder="Chọn sản phẩm">
                                         <?php foreach ($products as $product)  :?>
                                            <option  value="<?php echo $product['id']?>"><?php echo $product['name']?></option>
                                        <?php endforeach ?> 
                                    </select>
                                </div>

                            <div class="col-md-1"><button name="submit"   class="btn btn-primary">Thêm</button></div>
                        </form>
                        <div class="col-md-2"></div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Giá bán</th>
                                    <th>Hành động</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($topProducts) > 0) : ?>
                                    <?php foreach ($topProducts as $product) : ?>
                                        <tr>
                                            <td> <img style="width:50px;height:50px" src="<?php echo $product['cover_image'] ?>" alt=""></td>
                                            <td><?php echo $product['name'] ?></td>
                                            <td><?php echo $product['price'] ?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL ?>admin.php?p=product&act=edit&id=<?php echo $product['id'] ?>" class="btn btn-default"><i class="fa fa-fw fa-edit"></i></a>
                                                <a href="<?php echo BASE_URL ?>admin.php?p=product&act=delete&id=<?php echo $product['id'] ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-o fa-lg "></i> </a>

                                            </td>
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
           $('.select2').select2();
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