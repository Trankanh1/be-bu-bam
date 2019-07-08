<?php
include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php';
?>
<div class="container-contact100">
		<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="public/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

		<div class="wrap-contact100">
			<span class="contact100-form-symbol">
				<img src="public/icons/symbol-01.png" alt="SYMBOL-MAIL">
			</span>

			<form class="contact100-form validate-form flex-sb flex-w">
				<span class="contact100-form-title">
					Email cho chúng tôi
				</span>

				<div class="wrap-input100 rs1 validate-input" data-validate = "Name is required">
					<input class="input100" type="text" name="name" placeholder="Tên">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 rs1 validate-input" data-validate = "Email is required: e@a.z">
					<input class="input100" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea class="input100" name="message" placeholder="Nội dung liên hệ..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Gửi
					</button>
				</div>
			</form>
		</div>
	</div>
<?php
include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php';
?>

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
	<!--remove cart -->
	<script>
		$(document).ready(function(){
			$(window).scroll(function () {
				if ($(this).scrollTop() > 50) {
					$('#back-to-top').fadeIn();
				} else {
					$('#back-to-top').fadeOut();
				}
			});
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
        	$('#back-to-top').tooltip('hide');
        	$('body,html').animate({
        		scrollTop: 0
        	}, 800);
        	return false;
        });
        
        $('#back-to-top').tooltip('show');

    });

</script>
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
<script src="public/js/map-api.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYCBaznJBEE-MTOXkq1FhUw0bNpHxIFbo&callback=myMap"></script>
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