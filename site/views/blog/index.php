
<?php
include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php';
?>
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index.php">Home</a>
					<i>></i>
				</li>
				<li>
					<a href="index.php">Tin tức</a>

				</li>
				<!-- <li><a href="index.php"><?php echo $categoryName[0]['name']; ?></a></li> -->
			</ul>
		</div>
	</div>
</div>

<!-- //page -->
<!-- checkout page -->
<div class="privacy">
	<div class="container">
		<div class="col-md-3">

			<!-- cuisine -->
			<div class="left-side blog-side-menu">
				<div>
					<b><h3>Danh mục sản phẩm</h3></b>

					<ul>

						<li style="margin: 15px" >
							<a href="<?php echo BASE_URL ?>?p=home" class="category-item"><span class="span">Trang chủ</span></a>
						</li>
						<li style="margin: 15px">
							<a href="<?php echo BASE_URL ?>?p=product&act=searchByCategories&sl=quan-o&c=all" class="category-item"><span class="span">Quần áo</span></a>
						</li>
						<li style="margin: 15px">
							<a href="<?php echo BASE_URL ?>?p=product&act=searchByCategories&sl=-o-an&c=all" class="category-item"><span class="span">Đồ ăn</span></a>
						</li>
						<li style="margin: 15px">
							<a href="<?php echo BASE_URL ?>?p=product&act=searchByCategories&sl=-o-choi&c=all" class="category-item"><span class="span">Đồ chơi</span></a>
						</li>
						<li style="margin: 15px">
							<a href="<?php echo BASE_URL ?>?p=product&act=searchByCategories&sl=ta-bim&c=all" class="category-item"><span class="span">Tã- Bỉm</span></a>
						</li>
					</ul>
				</div>
				<div class="aside-item">
					<b><h3>Tin liên quan</h3></b>
					<?php if(count($blogs) > 0) :?>
						<?php foreach ($blogs as $blog) : ?>
							<div class="blog-item row"  >
								<div style="margin-top: 20px">
									<div class="col-md-4">
										<a href="<?php echo BASE_URL ?>?p=blog&act=blogDetail&sl=<?php echo $blog['slug'] ?>">
											<img style="height: 63px;width: 88px" src="<?php echo $blog['cover_image'] ?>">
										</a>
									</div>
									<div class="col-md-8">
										<small><?php echo $blog['name'] ?></small>
									</div>
								</div>

							</div>
							<hr>
						<?php endforeach; endif ?>

					</div>

				</div>

				<!-- //deals -->
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div style="margin-top: 20px;" class="agileinfo-ads-display col-md-9">
				<h3>Tin tức</h3>
				<hr>
				<?php if(count($blogs) > 0) :?>
					<?php foreach ($blogs as $blog) : ?>

						<div class="row" style="margin: 20px">
							<div class="col-md-6">
								<a href="<?php echo BASE_URL ?>?p=blog&act=blogDetail&sl=<?php echo $blog['slug'] ?>">
									<img height="265px" width="349px"src="<?php echo $blog['cover_image'] ?>">
								</a>
							</div>
							<div class="col-md-6">
								<b><p><?php echo $blog['name'] ?></p></b>
								<span ><i class="fa fa-clock-o"></i>Thứ Hai, <?php echo date('d-m-Y',strtotime($blog['created_at'])) ?></span>        
								<span style="margin: 10px"><i class="fa fa-user"></i> Đăng bởi: Bé bụ bẫm</span>
								<div class="description" style="margin-top: 20px">
									<span>
										<?php echo substr($blog['content'],0, 160).'...' ?>
									</span><br>
									<div style="margin-top: 10px">
										<a href="<?php echo BASE_URL ?>?p=blog&act=blogDetail&sl=<?php echo $blog['slug'] ?>" class="btn btn-info">Đọc tiếp</a>
									</div>
								</div>

							</div>

						</div>

					<?php endforeach; endif ?>
				</div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->
	<?php include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
	<script src="public/js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="public/js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
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
	<!--quantity-->
	<script>
		$('.value-plus').on('click', function() {
			var divUpd = $(this).parent().find('.value'),
			newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function() {
			var divUpd = $(this).parent().find('.value'),
			newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--remove cart -->
<script src="public/js/map-api.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYCBaznJBEE-MTOXkq1FhUw0bNpHxIFbo&callback=myMap"></script>
	<!--quantity-->
	<script>
    // for (let i = 1; )
    // $(document).ready(function (c) {
    // 	$('.close').on('click', function (c) {
    // 		$('.rem').fadeOut('slow', function (c) {
    // 			$('.rem').remove();
    // 		});
    // 	});
    // });

    // let closeButtons = document.querySelectorAll(".rem>.close");
    // for (let button of Array.from(closeButtons)) {
    //     button.addEventListener("click", () => {
    //         let id = button.firstElementChild.innerHTML;

    //         button.parentElement.parentElement.parentElement.remove();
    //         let xmlhttp = new XMLHttpRequest();

    //         xmlhttp.onreadystatechange = () => {
    //             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    //                 console.log(xmlhttp.responseText);
    //                 // document.getElementById("demo").innerText = xmlhttp.responseText;
    //             }
    //         };
    //         xmlhttp.open("GET", '/lap-trinh-web/index.php?p=cart&act=delete&id=1', true);
    //         xmlhttp.send();
    //     })
    // }
</script>

<!--//quantity-->

<!-- password-script -->
<script>
	window.onload = function() {
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

<!-- smoothscroll -->
<script src="public/js/SmoothScroll.min.js"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="public/js/move-top.js"></script>
<script src="public/js/easing.js"></script>
<script>
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event) {
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
	$(document).ready(function() {
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

<!-- for bootstrap working -->

<!-- //for bootstrap working -->
<!-- //js-files -->

</body>

</html>