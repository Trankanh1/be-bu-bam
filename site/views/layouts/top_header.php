<!-- top-header -->
<div class="header-most-top">
	<p>Chào mừng bạn đã đến với cửa hàng của chúng tôi
	</p>
</div>
<!-- //top-header -->
<!-- header-bot-->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<!-- header-bot-->
		<div style="width:300px; margin-left: 25px" class="col-md-4 logo_agile">
			<h1>
				<a href="index.php?p=home">
					<img style=" witdth:10px ;hight:50px;margin-top: 30px"src="public/images/Capture.png" alt="">
                    <!-- <span>B</span>é
						<span>B</span>ụ
						<span>B</span>ẫm -->
						<!-- <img src="images/logo2.png" alt=" "> -->
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a  id="location" href="#small-dialog1">
							<span class="fa fa-map-marker" aria-hidden="true"></span> Địa chỉ</a>
						</li>
							<!-- <li>
							<a href="#" data-toggle="modal" data-target="#myModal1">
								<span class="fa fa-truck" aria-hidden="true"></span>Theo dõi đơn hàng</a>
							</li> -->
							<li>
								<span class="fa fa-phone" aria-hidden="true"></span>CSKH 18009999
							</li>
							<?php if(isset($_SESSION['customer'])) { ?> 
								<li><a href="<?php echo BASE_URL?>?p=customer&act=index" >
									<span class="fa fa-user"></span>  Chào <?php echo substr($_SESSION['customer']['name'],0,8) ?><br></a>                   

								</li>
								<li><a href="<?php echo BASE_URL?>?p=customer&act=logout" >
									<span class="fa fa-sign-out">	</span>  Đăng xuất</a>                 

								</li>
							<?php } else { ?> 
								<li>
									<a href="#" data-toggle="modal" data-target="#myModal1">
										<span class="fa fa-unlock-alt" aria-hidden="true"></span>Đăng nhập</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#myModal2">
											<span class="fa fa-pencil-square-o" aria-hidden="true"></span>Đăng ký</a>
										</li>
									<?php } ?>
								</ul>
								<!-- //header lists -->
								<!-- search -->
								<div class="agileits_search">
									<form action="<?php echo BASE_URL?>?p=product&act=search" method="post">
										<input name="search" type="search" placeholder="Bố mẹ tìm gì cho bé hôm nay?" required="">
										<button name="submit" type="submit" class="btn btn-default" aria-label="Left Align">
											<span class="fa fa-search" aria-hidden="true"> </span>
										</button>
									</form>
								</div>
								<!-- //search -->
								<!-- cart details -->
								<div  class="top_nav_right">
									<div  style="width:200px;" class="wthreecartaits wthreecartaits2 cart cart box_1">										
										<input type="hidden" name="cmd" value="_cart">
										<input type="hidden" name="display" value="1">
										<a href="<?php echo BASE_URL ?>?p=cart&act=checkout" >
											<button style="margin-right: 20px" class="w3view-cart" type="submit" name="submit" value="">
												<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>	
											</button>                     
											<font color="red"></font></a><i class="icon-hot"></i>
											<?php if(isset($_SESSION['products'])){
												echo ' <span style="position: relative;right: 40px;bottom: 15px" class="badge badge-light">'.count($_SESSION['products']).'</span>';
											}  ?>
										Giỏ hàng</div> 
									</div>
									<!-- //cart details -->
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
