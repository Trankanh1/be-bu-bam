	<!-- top Products -->
	<div class="ads-grid" style="background-color: #f5f5f5">
		<div class="container" >
			
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="box-inner">
				<div class="side-bar col-md-3">
					<!-- cuisine -->
					<div class="left-side">
						<div style="height: 660px">
							<h3 style="text-align: center; font-size: 14px" class="agileits-sear-head1">
								<b>
									<div>
										<a href="<?php echo BASE_URL ?>?p=product&act=searchByCategories&sl=-o-an&c=all" class="category-item"><span class="span">
											<img src="public/images/be-an-2.png" alt="">
										</a>
									</div>
								Đồ ăn cho bé </b>
							</h3>
							<ul>

								<?php foreach ($listFoodCate as $item) :?>
									<li class="category1">
										<a href="<?php echo BASE_URL ?>?p=product&act=searchByCategories&sl=<?php echo $item['slug']?>" class="category-item">
											<span class="span"><?php echo $item['name']?></span>
										</a>
									</li>

								<?php endforeach;?>
								<li style="text-align: center;" >

									<a href="" style="color: red" >Xem thêm</a>
								</li>
								<li>
									<img style="width: 253px;height: 270px" src="public/images/banner-cho-be-an.png">
								</li>
							</ul>
							<div class="white-box">

							</div>
						</div>
					</div>
					<!-- //cuisine -->
					<!-- deals -->
					<div class="deal-leftmk left-side">

					</div>
					<!-- //deals -->
				</div>
				<!-- //product left -->
				<!-- product right -->
				<div class="agileinfo-ads-display col-md-9" >
					<div class="wrapper">
						<!-- first section (nuts) -->
						<div class="product-sec1" style="background-color: white" >

							<?php foreach ($foods as $food) : ?>
								<div class="col-md-3 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item">
											<img height="160px" width="160px" src="<?php echo $food['cover_image']  ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?p=product&act=productDetail&sl=<?php echo $food['slug'].'-'. $food['id']?>" class="link-product-add-cart">Chi Tiết</a>
												</div>
											</div>
											<span class="product-new-top">Mới</span>
										</div>
										<div class="item-info-product ">
											<h4>
												<a href="single.php"><?php echo substr($food['name'],0,16)  ?></a>
											</h4>
											<div class="info-product-price">
												<span class="item_price"><?php echo number_format($food['price'])  ?></span>
												<?php if($food['origin_price'] != 0 ) echo '<del>'.number_format($food['origin_price']).'</del>'  ?>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?p=cart&act=add" method="post">
													<fieldset>

														<input type="hidden" name="slug" value="<?php echo $food['slug'] ?>" />
														<input type="hidden" name="quantity" value="1" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="name"
														value="<?php echo $food['name']  ?>" />
														<input type="hidden" name="origin_price"
														value="<?php echo number_format($food['origin_price']) ?>" />
														<input type="hidden" name="price"
														value="<?php echo number_format($food['price']) ?>" />
														<input type="hidden" name="currency_code" value="VND" />
														<input type="hidden" name="cover_image"
														value="<?php echo $food['cover_image'] ?>" />
														<input type="hidden" name="id"
														value="<?php echo $food['id'] ?>" />

														<input type="submit" name="add" value="Thêm vào giỏ hàng"
														class="buttona " />
													</fieldset>
												</form> 
											</div>

										</div>
									</div>
								</div>
							<?php endforeach ?>
							<div class="clearfix"></div>
						</div>



						<!-- //fourth section (noodles) -->
					</div>
				</div>
			</div>
			<img style = "width:1125px; height:100px; margin-bottom: 15px" class="product-sec-img" src="public/images/gia-sot-xinh-xich-du-lich-mua-he-9.png" alt="">
			<div class="clearfix"></div>
			<div class="box-inner">
				<div class="side-bar col-md-3">

					<!-- cuisine -->
					<div class="left-side">

						<div style="height: 660px">
							<h3 style="text-align: center; font-size: 14px" class="agileits-sear-head2">
								<b> <div><a href="<?php echo BASE_URL ?>?p=product&act=searchByCategories&sl=quan-o&c=all"> <img src="public/images/clothes/be-mac-2-1.png" alt=""></a></div>
								Quần áo cho bé</b>
							</h3>
							<ul>
								<li class="category2">
									<a href="" class="category-item"><span class="span">Áo thun, T-shirt bé trai</span></a>
								</li>
								<li class="category2">

									<a href="" class="category-item"><span class="span">Áo len bé trai </span></a>
								</li>
								<li class="category2">
									<a href="" class="category-item"><span class="span">Quần jeans bé trai</span></a>
								</li>
								<li class="category2">

									<a href="" class="category-item"><span class="span">Quần short bé trai</span></a>
								</li>
								<li class="category2">

									<a href="" class="category-item"><span class="span">Váy, đầm bé gái</span></a>
								</li>
								<li class="category2">

									<a href="" class="category-item"><span class="span">Áo khoác bé gái</span></a>
								</li>
								<li class="category2">

									<a href="" class="category-item"><span class="span">Quần jeans bé gái</span></a>
								</li>
								<li style="text-align: center;" >

									<a href="" style="color: red" >Xem thêm</a>
								</li>
								<li>
									<img style="width: 253px;height: 231px" src="public/images/sieu-uu-dai-he-them-vui-1.png">
								</li>


							</ul>
						</div>


					</div>
					<!-- //cuisine -->
					<!-- deals -->
					<div class="deal-leftmk left-side">

					</div>
					<!-- //deals -->
				</div>
				<!-- //product left -->
				<!-- product right -->
				<div class="agileinfo-ads-display col-md-9" >
					<div class="wrapper">
						<!-- first section (nuts) -->
						<div class="product-sec1" style="background-color: white" >

							<?php foreach ($clothes as $item) : ?>
								<div class="col-md-3 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item">
											<img height="160px" width="160px" src="<?php echo $item['cover_image']  ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?p=product&act=productDetail&sl=<?php echo $item['slug'].'-'. $item['id']?>" class="link-product-add-cart">Chi Tiết</a>
												</div>
											</div>
											<span class="product-new-top">Mới</span>
										</div>
										<div class="item-info-product ">
											<h4>
												<a href="single.php"><?php echo substr($item['name'],0,16)  ?></a>
											</h4>
											<div class="info-product-price">
												<span class="item_price"><?php echo number_format($item['price'])  ?></span>
												<del><?php echo number_format($item['origin_price'])  ?></del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?p=cart&act=add" method="post">
													<fieldset>

														<input type="hidden" name="slug" value="<?php echo $item['slug'] ?>" />
														<input type="hidden" name="quantity" value="1" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="name"
														value="<?php echo $item['name']  ?>" />
														<input type="hidden" name="origin_price"
														value="<?php echo number_format($item['origin_price']) ?>" />
														<input type="hidden" name="price"
														value="<?php echo number_format($item['price']) ?>" />
														<input type="hidden" name="currency_code" value="VND" />
														<input type="hidden" name="cover_image"
														value="<?php echo $item['cover_image'] ?>" />
														<input type="hidden" name="id"
														value="<?php echo $item['id'] ?>" />

														<input type="submit" name="add" value="Thêm vào giỏ hàng"
														class="buttona " />
													</fieldset>
												</form> 
											</div>

										</div>
									</div>
								</div>
							<?php endforeach ?>
							<div class="clearfix"></div>
						</div>

						<!-- //fourth section (noodles) -->
					</div>
				</div>
			</div>
			<img style = "width:1125px; height:100px; margin-bottom: 15px" class="product-sec-img" src="public/images/khuyen-mai-tai-hai-phong-9.png" alt="">
			<div class="clearfix"></div>
			<div class="box-inner">
				<div class="side-bar col-md-3">

					<!-- cuisine -->
					<div class="left-side">
						<div style="height: 660px">
							<h3 style="text-align: center; font-size: 14px" class="agileits-sear-head4">
								<b>
									<div>
										<a href="<?php echo BASE_URL ?>?p=product&act=searchByCategories&sl=-o-choi&c=all"> <img src="public/images/clothes/do-choi-2-1.png" alt="">
										</a>
									</div>Đồ chơi cho bé
								</b>
							</h3>
							<ul>
								<li class="category4">
									<a href="" class="category-item"><span class="span">Đồ chơi bồn tắm</span></a>
								</li>
								<li class="category4">

									<a href="" class="category-item"><span class="span">Đồ chơi xúc sắc</span></a>
								</li>
								<li class="category4">
									<a href="" class="category-item"><span class="span">Xe mô hình</span></a>
								</li>
								<li class="category4">

									<a href="" class="category-item"><span class="span">Xe tập đi - Đai tập đi</span></a>
								</li>
								<li class="category4">

									<a href="" class="category-item"><span class="span">Đồ chơi kéo đẩy</span></a>
								</li>
								<li class="category4">

									<a href="" class="category-item"><span class="span">Phao bơi - Áo bơi</span></a>
								</li>
								<li class="category4">

									<a href="" class="category-item"><span class="span">Lều bóng - Nhà phao</span></a>
								</li>
								<li style="text-align: center;" >

									<a href="" style="color: red" >Xem thêm</a>
								</li>
								<li>
									<img style="width: 253px;height: 231px" src="public/images/di-boi-cung-be.png">
								</li>

							</ul>
							<div class="white-box">

							</div>
						</div>

					</div>
					<!-- //cuisine -->
					<!-- deals -->
					<div class="deal-leftmk left-side">

					</div>
					<!-- //deals -->
				</div>
				<!-- //product left -->
				<!-- product right -->
				<div class="agileinfo-ads-display col-md-9" >
					<div class="wrapper">
						<!-- first section (nuts) -->
						<div class="product-sec1" style="background-color: white" >

							<?php foreach ($toys as $item) : ?>
								<div class="col-md-3 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item">
											<img height="160px" width="160px" src="<?php echo $item['cover_image']  ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?p=product&act=productDetail&sl=<?php echo $item['slug'].'-'. $item['id']?>" class="link-product-add-cart">Chi Tiết</a>
												</div>
											</div>
											<span class="product-new-top">Mới</span>
										</div>
										<div class="item-info-product ">
											<h4>
												<a href="single.php"><?php echo substr($item['name'],0,16)  ?></a>
											</h4>
											<div class="info-product-price">
												<span class="item_price"><?php echo number_format($item['price'])  ?></span>
												<?php if($item['origin_price'] != 0 ) echo '<del>'.number_format($item['origin_price']).'</del>'  ?>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?p=cart&act=add" method="post">
													<fieldset>

														<input type="hidden" name="slug" value="<?php echo $item['slug'] ?>" />
														<input type="hidden" name="quantity" value="1" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="name"
														value="<?php echo $item['name']  ?>" />
														<input type="hidden" name="origin_price"
														value="<?php echo number_format($item['origin_price']) ?>" />
														<input type="hidden" name="price"
														value="<?php echo number_format($item['price']) ?>" />
														<input type="hidden" name="currency_code" value="VND" />
														<input type="hidden" name="cover_image"
														value="<?php echo $item['cover_image'] ?>" />
														<input type="hidden" name="id"
														value="<?php echo $item['id'] ?>" />

														<input type="submit" name="add" value="Thêm vào giỏ hàng"
														class="buttona " />
													</fieldset>
												</form> 
											</div>

										</div>
									</div>
								</div>
							<?php endforeach ?>
							<div class="clearfix"></div>
						</div>


						<!-- //fourth section (noodles) -->
					</div>
				</div>
			</div>
			<img style = "width:1125px; height:100px; margin-bottom: 15px" class="product-sec-img" src="public/images/banner-uu-dai-mua-he.png" alt="">
			<div class="clearfix"></div>
			<div class="box-inner">
				<div class="side-bar col-md-3">
					<div class="left-side">
						<div style="height: 660px">
							<h3 style="text-align: center; font-size: 14px" class="agileits-sear-head2">
								<b>
									<div>
										<a href="<?php echo BASE_URL ?>?p=product&act=searchByCategories&sl=ta-bim&c=all"><img src="public/images/clothes/ve-sinh-cho-be-2-1.png" alt=""></a>
									</div> Vệ sinh cho bé
								</b>
							</h3>
							<ul>
								<li class="category3">
									<a href="" class="category-item"><span class="span">Bỉm Bobby - Tã Bobby</span></a>
								</li>
								<li class="category3">

									<a href="" class="category-item"><span class="span">Bỉm Merries - Tã Merries</span></a>
								</li>
								<li class="category3">
									<a href="" class="category-item"><span class="span">Bỉm Pampers - Tã Pampers</span></a>
								</li>
								<li class="category3">

									<a href="" class="category-item"><span class="span">Bỉm Moony - Tã Moony </span></a>
								</li>
								<li class="category3">

									<a href="" class="category-item"><span class="span">Khăn quấn</span></a>
								</li>
								<li class="category3">

									<a href="" class="category-item"><span class="span">Khăn giấy ướt</span></a>
								</li>
								<li class="category3">

									<a href="" class="category-item"><span class="span">Khăn giấy khô</span></a>
								</li>

								<li style="text-align: center;" >

									<a href="" style="color: red" >Xem thêm</a>
								</li>
								<li>
									<img style="width: 253px;height: 231px" src="public/images/373x423.png">
								</li>

							</ul>
							<div class="white-box">

							</div>
						</div>

					</div>
					<div class="deal-leftmk left-side">

					</div>
					<!-- //deals -->
				</div>
				<!-- //product left -->
				<!-- product right -->
				<div class="agileinfo-ads-display col-md-9" >
					<div class="wrapper">
						<!-- first section (nuts) -->
						<div class="product-sec1" style="background-color: white" >

							<?php foreach ($toiletries as $item) : ?>
								<div class="col-md-3 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item">
											<img height="160px" width="160px" src="<?php echo $item['cover_image']  ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?p=product&act=productDetail&sl=<?php echo $item['slug'].'-'. $item['id']?>" class="link-product-add-cart">Chi Tiết</a>
												</div>
											</div>
											<span class="product-new-top">Mới</span>
										</div>
										<div class="item-info-product ">
											<h4>
												<a href="single.php"><?php echo substr($item['name'],0,16)  ?></a>
											</h4>
											<div class="info-product-price">
												<span class="item_price"><?php echo number_format($item['price'])  ?></span>
												<?php if($item['origin_price'] != 0 ) echo '<del>'.number_format($item['origin_price']).'</del>'  ?>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?p=cart&act=add" method="post">
													<fieldset>

														<input type="hidden" name="slug" value="<?php echo $item['slug'] ?>" />
														<input type="hidden" name="quantity" value="1" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="name"
														value="<?php echo $item['name']  ?>" />
														<input type="hidden" name="origin_price"
														value="<?php echo number_format($item['origin_price']) ?>" />
														<input type="hidden" name="price"
														value="<?php echo number_format($item['price']) ?>" />
														<input type="hidden" name="currency_code" value="VND" />
														<input type="hidden" name="cover_image"
														value="<?php echo $item['cover_image'] ?>" />
														<input type="hidden" name="id"
														value="<?php echo $item['id'] ?>" />

														<input type="submit" name="add" value="Thêm vào giỏ hàng"
														class="buttona " />
													</fieldset>
												</form> 
											</div>

										</div>
									</div>
								</div>
							<?php endforeach ?>
							<div class="clearfix"></div>
						</div>


						<!-- //fourth section (noodles) -->
					</div>
				</div>
			</div>

			<!-- //product right -->
		</div>
	</div>
	<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
	<!-- //top products -->