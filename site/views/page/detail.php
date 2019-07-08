
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
					<a href="index.php"><?php echo @$page[0]['name'] ?></a>

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
			<div class="left-side page-side-menu">
				<div>
					<b><h4>Sản phẩm nổi bật</h4></b>
					<?php if(isset($topProducts) && $topProducts ) :?>
						<?php foreach ($topProducts as $item) : ?>
							<div class="page-item row"  >
								<div style="margin-top: 20px">
									<div class="col-md-4">
										<img style="height: 80px;width: 88px" src="<?php echo $item['cover_image'] ?>">
									</div>
									<div class="col-md-8">
										<small><?php echo $item['name'] ?></small>
									</div>
								</div>

							</div>
							<hr>
						<?php endforeach; endif ?>
					<!-- <b><h3>Danh mục tin tức</h3></b>

					<ul>

						<li style="margin: 15px" >
							<a href="" class="category-item"><span class="span">Trang chủ</span></a>
						</li>
						<li style="margin: 15px">
							<a href="" class="category-item"><span class="span">Quần áo</span></a>
						</li>
						<li style="margin: 15px">
							<a href="" class="category-item"><span class="span">Đồ chơi</span></a>
						</li>
						<li style="margin: 15px">
							<a href="" class="category-item"><span class="span">Tã- Bỉm</span></a>
						</li>
					</ul> -->
				</div>
				<div class="aside-item">
					<!-- <b><h3>Tin liên quan</h3></b> -->
					<!-- <?php if(count($topProductss) > 0) :?>
						<?php foreach ($topProductss as $topProducts) : ?>
							<div class="page-item row"  >
								<div style="margin-top: 20px">
									<div class="col-md-4">
										<img style="height: 63px;width: 88px" src="<?php echo $topProducts['cover_image'] ?>">
									</div>
									<div class="col-md-8">
										<small><?php echo $topProducts['name'] ?></small>
									</div>
								</div>

							</div>
							<hr>
						<?php endforeach; endif ?> -->

					</div>

				</div>

				<!-- //deals -->
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div style="margin-top: 10px;" class="agileinfo-ads-display col-md-9">
				
				<?php if(count($page) > 0) :?>
					<div class="row"   style="margin: 10px;text-align: justify;overflow: hidden;">
					
						<div class="description" style="margin-top: 20px">
							<span>
								<?php echo $page[0]['content'] ?>
							</span>
						</div>



					<?php endif ?>
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
	<!-- Large modal -->
<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->
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

<!--//quantity-->
<script src="public/js/map-api.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYCBaznJBEE-MTOXkq1FhUw0bNpHxIFbo&callback=myMap"></script>
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
<!-- //smooth-scrolling-of-move-up -->

<!-- for bootstrap working -->

<!-- //for bootstrap working -->
<!-- //js-files -->

</body>

</html>