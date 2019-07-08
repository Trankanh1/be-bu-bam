<?php

include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php';
?>
<!-- page -->

<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index.php">Trang chủ</a>
					<i>|</i>
				</li>
				<li>Chi tiết sản phẩm</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- Single Page -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
		<div style = "margin-top:10px" class="col-md-5 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<ul class="slides" style="border: solid 1px #ccc;">
						<?php foreach ($productImages as $productImage) : ?>
							<li data-thumb="<?php echo $productImage['image'] ?>">
								<div class="thumb-image">
									<img src="<?php echo $productImage['image'] ?>" data-imagezoom="true" class="img-responsive" alt=""> 
								</div>
							</li>
						<?php endforeach ?>
					</ul>
					<div class="clearfix">
					</div>
				</div>
			</div>
		</div>
		<div style = "margin-top:12px" class="col-md-6 single-right-left simpleCart_shelfItem">
			<div>
				<h3><?php echo $product[0]['name'] ?></h3>
				<div  style = "float:left;position: relative;top: -18px" class="customer-rev left-side">

					<ul>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								
							</a>
						</li>

					</ul>
				</div>
				
				<div style = "display:inline-block; margin: 0px 0px 5px 20px">
					<span><?php echo @$totalfiveStarRating ?> <span>Đánh giá  | Mã sản phẩm: GDTE-734 </span></span>
				</div>
				<hr>
			</div>

			<table style="padding-left: 100px;">
				<tr>
					<td style="width: 150px;"><span class = "pdp-price_size_xl" > Giá </span>
					</td>
					<td>
						<b><span class="item_price"><?php echo number_format($product[0]['price']) ?> <u>đ</u></span></b>
						<del><?php echo number_format($product[0]['origin_price'])  ?> <u>đ</u></del>
						<span style = "border-radius:5px; background:orange; color:white" class="item-tk">Tiết kiệm <?php echo  number_format($product[0]['origin_price']-$product[0]['price']).'đ'  ?></span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<span color="black">Được áp dụng đến hết ngày 22/05/2019</span>
					</td>
				</tr>
				<tr>
					<td><span class = "pdp-price_size_xl" > Tình trạng</span>
					</td>
					<td>
						<p class = "item_price1">Còn hàng</p>
					</td>
				</tr>
				<tr>
					<td><span class = "pdp-price_size_xl" > Vận chuyển</span>
					</td>
					<td>
						<span> Miễn phí vận chuyển cho đơn hàng 100.000đ </span>
					</td>
				</tr>
				<tr>
					<td>
						<p></p>
					</td>
					<td>
						<span> Xem thêm Chính sách vận chuyển</span>
					</td>
				</tr>
			</table>
		</p>

		<div class="col-md-1"></div>
		
		<div class="product-single-w3l">
			<p><i class="fa fa-hand-o-right" aria-hidden="true"></i>Mô tả <label>sản phẩm</label></p>
			<ul>
				<?php echo $product[0]['description']?>

			</ul>
			<p><i class="fa fa-refresh" aria-hidden="true"></i>Tất cả sản phẩm đã nhận <label>không thể trả lại</label></p>
		</div>
		<div class="occasion-cart">
			<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

				
			</div>
			<div class="occasion-cart">
				<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
					<form action="?p=cart&act=add" method="post">
						<fieldset>
							<input type="hidden" name="id" value="<?php echo $product[0]['id'] ?>" />
							<input type="hidden" name="quantity" value="1" />
							<input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="add" value="1" />
							<input type="hidden" name="business" value=" " />
							<input type="hidden" name="item_name" value="<?php echo $product[0]['name'] ?>" />
							<input type="hidden" name="amount" value="<?php echo number_format($product[0]['price']) ?>" />
							<input type="hidden" name="discount_amount" value="1.00" />
							<input type="hidden" name="currency_code" value="USD" />
							<input type="hidden" name="return" value=" " />
							<input type="hidden" name="cancel_return" value=" " />
							<table>
								<tr><td><input type="submit" name="submit" value="MUA NGAY" style="color: white; background-color: #0171BB; border-radius: 5px; width: 250px; height: 50px;" /></td><td><input type="submit" name="submit" value="THÊM VÀO GIỎ HÀNG" style="color: white; background-color: orange; margin-left: 40px; border-radius: 5px; width: 250px; height: 50px;" /></td></tr>
							</table>
							<input type="hidden" name="cancel_return" value=" " />				
						</fieldset>
					</form>
				</div>
				<div style="margin-top: 20px;">Tổng đài mua hàng miễn cước 1800 6066 (Từ 8h00 đến 21h30 hàng ngày)
				</div>
				<table >
				</div>
				<div style="margin-top: 20px;">
					<tr>
						<td style="width: 170px;"><div style="float: left;"><img src="public/images/mienphivanchuyen.png" alt=""><span> Giao hàng toàn quốc</span></div></td>
						<td style="width: 170px;"><div style="display: inline-block;"><img src="public/images/hangchinhhang.png" alt=""><span> Hàng chính hãng</span></div></td>
						<td style="width: 200px;"><div style="float: right;"><img src="public/images/xemtruoc.png" alt=""><span> Xem trước khi nhận hàng</span></div></td>
					</tr>
					<tr>
						<td colspan="3"><img src="public/images/quet-ma-qrpay.png" alt="" style="width: 540px;height: auto; margin-top: 20px;"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="clearfix"> 
	</div>


</div>
<div class="pro-info-detail"  style="background-color:#f5f5f5">
	<div class = "container"  >
		<div class="col-md-1"></div>
		<div class="col-md-10" style="background-color: white" >
			<div class="product-info-detail">
				<header style="background: #F8F8F8;">
					<hr>
					<div class = "container1">
						<nav style="margin-bottom: 15px;">
							<ul>
								<li><a href = "#mota">Mô tả sản phẩm</a></li>
								<li><a href = "#dacdiem">Đặc điểm nổi bật</a></li>
								<li><a href = "#nhanxet">Nhận xét</a></li>
							</ul>
						</nav>
					</div>
				</header>
				<hr>
			</div>
			<div style="text-align: justify;"><?php echo $product[0]['content'] ?> </div>
			
			<div class="col-md-10" style="background: white;  border-radius: 3px;text-align: justify;">
				<hr> 
				<div style="margin: 0px 0px 20px 15px; font-size: 20px; width: 100%; color: coral;"> 
					Bình luận
				</div>
				<form action ="<?php echo BASE_URL ?>?p=product&act=postProductReview&id=<?php echo @$product[0]['id']?>" method = "POST">
					<div style="position: relative;left: 500px;bottom: 45px" class="">
						Đánh giá sản phẩm:
						<span class="starRating">
							<input id="rating5" checked="checked" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" >
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>

					<div style = "border: solid 1px; border-radius: 5px; margin: 0px 15px 20px 15px;">
						<div class = "border_cmt">
							
							<textarea name="comment" required="" cols = "85" rows = "6" style = "border: solid 0px;"></textarea>

							<div style = "text-align: center ;height: 60px; width: 100%; border-top: solid 1px;" class = "btn_flex">
								<div style="border: none;" class="form-control"><input style="padding: 6px;border-radius: 4px; margin-top: 7px;width: 250px" placeholder="Họ tên(bắt buộc)" type="text" required name="customer_name" value="<?php echo @$_SESSION['customer']['name'] ?>"></div>
								<div style="border: none;" class="form-control"><input placeholder="Email(bắt buộc)" type="email" required style="padding: 5px;border-radius: 4px;margin-top: 7px; width: 250px" name="customer_email" value="<?php  echo @$_SESSION['customer']['email'] ?>" ></div>
								<input type ="submit" name="submit" class = "btn_cmt" value = "Gửi" name="post">
							</div>
							
						</div>
					</div>
				</form>
				<div style="text-align: center; width: 100%"> <a name = "nhanxet"></a>
					<div style="float: left; width: 200px;">
						<?php  if($reviews) :?> <p style = "color: black;"><?php echo count($reviews) ?> Bình luận</p> <?php endif ?>
					</div>
					<div style="display: inline-block;  margin: 0 auto; width: 250px;">
						<input type = "checkbox">Xem bình luận có đánh giá
					</div>

				</div>
				<hr>
				<div style="margin: 10px 0px 0px 10px;">
					<?php if($reviews):?>
						<?php foreach($reviews as $review) :?>
							<?php if($review['parent_id'] == null): ?>
								<div class="customer_response" data-id="<?php echo $review['id'] ?>">
									<p><img src="public/images/user.png" alt="Avatar" class="fa fa-plus-circle" style="width:20px"><span style="margin-top: 5px; color: #5488c7;">    <?php echo $review['customer_name'] ?></span></p>

									<p style="color: black;"><?php echo $review['comment'] ?></p>

									<i class="fa fa-chevron-up"></i>	 <span class="reply" style="color: blue;cursor: pointer; margin-right: 20px;">Trả lời</span>
									<span style="color: blue; margin-right: 20px;">Thích (0)</span>
									<?php if(isset($_SESSION['user'])): ?>
										<a href="" style="color: red">Xóa</a>   
									<?php endif ?>
									<span><?php echo date('d-m-Y', strtotime($review['created_at'])) ?></span>
									<div class="reply-box" id="id_<?php echo $review['id'] ?>" style="margin-left: 20px;display: none;border-bottom:  1px #ccc solid  ;height: 150px">
										<form style="border: 1px solid #ccc;border-radius: 3px" action="<?php echo BASE_URL ?>?p=product&act=postProductReview&id=<?php echo @$product[0]['id'] ?>"  method="post" >
											<input type="hidden" name="parent_id" value="<?php echo $review['id'] ?>">
											<textarea name="comment" required="" style="border-radius: 10px" cols="85" rows="3"></textarea>
											<div style="text-align: center;">
												<input style="padding: 6px;border-radius: 1px; margin-top: 7px;width: 250px" placeholder="Họ tên(bắt buộc)" type="text" required name="customer_name" value="<?php echo @$_SESSION['customer']['name'] ?>">
												<input placeholder="Email(bắt buộc)" type="email" required style="padding: 5px;border-radius: 4px;margin-top: 7px;margin-left: 15px; width: 250px" name="customer_email" value="<?php  echo @$_SESSION['customer']['email'] ?>" >
												<div style="float: right;">
													<input  type="submit" style="margin-top: 7px;margin-left: 30px" value="Gửi" name="submit" class="btn btn-info">
												</div>
											</div>
										</form>
									</div>	
									<div>

									<?php endif ?>
									<div >

										<?php  foreach($reviews as $child) :?>
											<?php if($review['id'] == $child['parent_id']) : ?>
												<div style=" border-radius: 5px; margin: 0px 10px 1px 50px; background: #F8F8F8;">
													<p style="height: 45px"><img src="public/images/user.png" alt="Avatar" style="width:15px"><span style="; color:#5488c7;">    <?php echo $child['customer_name'] ?></span></p>
													<p style="color: black; margin-left: 10px;"><?php echo $child['comment'] .'       '. '<spap style="color:#ccc">'.date('d-m-Y',strtotime($child['created_at'])).'</span>'?>
												</p>
											</div>

										<?php endif; endforeach?>
									</div>

								</div>

							<?php endforeach;endif?>


						</div>

					</div>
				</div>

				<!-- //special offers -->	
				<!-- special offers -->

			</div>

			<div class="col-md-1"></div>
		</div>

	</p>
</span>
</p>

</div>

</div>
</div>
<div>

	<div class="featured-section" id="projects" style="background-color: #f5f5f5;"   >

		<div class="container" >
			
			<!-- tittle heading -->
			<?php if (isset($productRelateds) && count($productRelateds) > 0 ): ?>
			<p style="text-align: center;font-size: 20px;margin-top: 30px">Sản phẩm tương tự</p>
			<!-- //tittle heading -->
			<div class="content-bottom-in" style="background-color: white">
				<ul id="flexiselDemo2">

					<?php foreach ($productRelateds as  $item) :?>
						<li>
							<div class="w3l-specilamk">
								<div class="speioffer-agile">
									<a href="?p=product&act=productDetail&sl=<?php echo $item['slug'].'-'. $item['id']?>">
										<img height="160px" width="160px" src="<?php echo $item['cover_image'] ?>" alt="">
									</a>
								</div>
								<div style="text-align: center;" class="product-name-w3l">
									<h4 >
										<a href="single.php"><?php echo substr($item['name'],0, 30) ?></a>
									</h4>
									<div class="w3l-pricehkj">
										<h6><?php echo $item['price'] ?></h6>
										<del><p><?php echo $item['origin_price'] ?></p></del>
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
						</li>
					<?php endforeach;?>

				</ul>
			</div>
		<?php endif ?>
	</div>
</div>
</div>
<!-- Item slider--> 
<div class="featured-section" id="projects" style="background-color: #f5f5f5">
	<div class="container">
		
		<!-- //tittle heading -->
		<?php if (isset($viewedProducts) && count($viewedProducts) > 0 ): ?>
		<p style="text-align: center;font-size: 20px;    background-color: #f5f5f5;">Sản phẩm đã xem

		</p>
		<div class="content-bottom-in" style="background-color: white">
			<ul id="flexiselDemo1">
				<?php foreach ($viewedProducts as  $item) :?>
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="?p=product&act=productDetail&sl=<?php echo $item['slug'].'-'. $item['id']?>">
									<img  height="160px" width="160px"  src="<?php echo $item['cover_image'] ?>" alt="">
								</a>
							</div>
							<div class="product-name-w3l" style="text-align: center;">
								<h4>
									<a href="single.php"><?php echo  substr($item['name'],0, 30) ?></a>
								</h4>
								<div class="w3l-pricehkj">
									<h6><?php echo $item['price'] ?></h6>
									<del><p><?php echo $item['origin_price'] ?></p></del>
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
					</li>
				<?php endforeach ?>

			</ul>
		</div>
	<?php endif?>
</div>
</div>
<script type="text/javascript">
	$(function(){
		$('#agileinfo-nav_search').on('change',function(){
			var value = $(this).val();
			var baseUrl = window.location.origin;
                // console.log(value);
                if(value == 'all') location.replace(baseUrl + '?p=product&act=index');
                else location.replace(baseUrl + '?p=product&act=searchByCategories&c=all&sl='+value);

            })
	})
</script>
<!-- //special offers -->
<script src="public/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#registerl').on('click',function(){
			$('#myModal1').hide();
			$('.modal-backdrop').hide();
		})
		$('#log_submit').on('click',function(){
			var emailLogin = $('#log_email').val();
			var pswLogin = $('#log_psw').val();
			$.ajax({
				url: '?p=customer&act=login',
				method: 'POST',

				data: {
					email: emailLogin,
					password: pswLogin,
				},
				dataType: 'json',
				success: function(res){
					if(res.status) {
						location.reload();
					}
				},
				error:function(res){
					$('#error').text('Thông tin đăng nhập hoặc mật khẩu không chính xác!');
				},
			})
		})
	})
</script>
<script >
	$('.reply').on('click',function(){
					// $(this).('.reply-box').show();
					var rowId = $(this).parent().data('id');

					$('#id_'+rowId).show();
				})

			</script>
			<script type="text/javascript">
				
			</script>
			<!-- //jquery -->
			<?php include VIEW_PATH.DIRECTORY_SEPARATOR.'layouts'.DIRECTORY_SEPARATOR.'footer.php';?>
			<!-- popup modal (for signin & signup)-->

			<script src="public/js/jquery-2.1.4.min.js"></script>
			<script >
				$('.reply').on('click',function(){
					console.log("OK");
					// $(this).('.reply-box').show();
					var rowId = $(this).parent().data('id');
					$('#id_'+rowId).show();
				})

			</script>

			<!-- password-script -->
			<script>
				window.onload = function () {
					document.getElementById("password1").onchange = validatePassword;
					document.getElementById("password2").onchange = validatePassword;
				}

				function validatePassword() {
					var pass2 = document.getElementById("password2").value;
					var pass1 = document.getElementById("password1").value;
					if (pass1 != pass2)
						document.getElementById("password2").setCustomValidity("Passwords Don't Match");
					else
						document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	<script type="text/javascript">
		$(document).ready(function(){

			$('#itemslider').carousel({ interval: 3000 });

			$('.carousel-showmanymoveone .item').each(function(){
				var itemToClone = $(this);

				for (var i=1;i<6;i++) {
					itemToClone = itemToClone.next();

					if (!itemToClone.length) {
						itemToClone = $(this).siblings(':first');
					}

					itemToClone.children(':first-child').clone()
					.addClass("cloneditem-"+(i))
					.appendTo($(this));
				}
			});
		});

	</script>
	<!-- smoothscroll -->
	<script src="public/js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->
	<script src="public/js/map-api.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYCBaznJBEE-MTOXkq1FhUw0bNpHxIFbo&callback=myMap"></script>
	<!-- start-smooth-scrolling -->
	<script src="public/js/move-top.js"></script>
	<script src="public/js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- imagezoom -->
	<script src="public/js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- FlexSlider -->
	<script src="public/js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!-- flexisel (for special offers) -->
	<script src="public/js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
		$(window).load(function () {
			$("#flexiselDemo2").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<script type="text/javascript">
		$(function(){
			$('#agileinfo-nav_search').on('change',function(){
				var value = $(this).val();
				var baseUrl = window.location.origin;
				// console.log(value);
				if(value == 'all') location.replace('http://bebubam.com?p=product&act=index');
				else location.replace('http://bebubam.com?p=product&act=searchByCategories&c=all&sl='+value);
			})
		})
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- for bootstrap working -->
	<script src="public/js/bootstrap.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#registerl').on('click',function(){
				$('#myModal1').hide();
				$('.modal-backdrop').hide();
			})
			$('#log_submit').on('click',function(){
				var emailLogin = $('#log_email').val();
				var pswLogin = $('#log_psw').val();
				$.ajax({
					url: '?p=customer&act=login',
					method: 'POST',

					data: {
						email: emailLogin,
						password: pswLogin,
					},
					dataType: 'json',
					success: function(res){
						if(res.status) {
							location.reload();
						}
					},
					error:function(res){
						$('#error').text('Thông tin đăng nhập hoặc mật khẩu không chính xác!');
					},
				})
			})
		})
	</script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>