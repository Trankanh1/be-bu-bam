<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'head.php'; ?>

<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php'; ?>
		<?php include ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'sidebar.php'; ?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Trang nội dung
					<!-- <small>Blank example to the fixed layout</small> -->
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
					<li><a href="#">Trang nội dung<main></main></a></li>

				</ol>
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<div class="box">
					<div class="box-header">
						<div>
							<div><?php flashMessagge() ?></div>
							<div style="float:right;margin-bottom:10px "><a href="<?php echo BASE_URL?>admin.php?p=page&act=create" class="btn btn-block btn-primary btn-sm">Thêm trang nội dung </a></div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Tiêu đề</th>
										<th>Ngày cập nhật</th>
										<th>Xóa</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($pages as $page) : ?>
										<tr>
											<td><a href="<?php echo BASE_URL ?>admin.php?p=page&act=pageDetail&id=<?php echo $page['id'] ?>"><?php echo $page['name'] ?></a>
												<p><?php echo substr($page['content'],0,150).'...' ?></p>
											</td>
											<td><?php echo $page['created_at'] ?></td>
											<td> <a href="<?php echo BASE_URL ?>admin.php?p=page&act=deletePage&id=<?php echo $page['id'] ?>"><i class="fa fa-fw fa-trash-o fa-lg "></i></a></td>
										</tr>
									<?php endforeach ?>
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
