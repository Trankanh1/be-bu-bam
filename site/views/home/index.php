<?php

include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php';
include 'banner.php';
include 'section_top_product.php';
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
<script type="text/javascript">
	$(function(){
		$('#agileinfo-nav_search').on('change',function(){
			var value = $(this).val();
			var baseUrl = window.location.origin;
				// console.log(value);
				if(value == 'all') location.replace(baseUrl+'?p=product&act=index');
				else location.replace(baseUrl+'?p=product&act=searchByCategories&c=all&sl='+value);
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