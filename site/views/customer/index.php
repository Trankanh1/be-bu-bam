<?php
include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php';
?>
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container ">
            <ul class="w3_short">
                <li>
                    <a href="index.php">Trang chủ</a>
                    <i>|</i>
                </li>
                <li>Hồ Sơ Người Dùng</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy" style="font-size: 14px;background-color: #f9f9f9;">
    <div class="container">

        <div class="col-md-2">
            <?php include VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'sidebar.php';?>
        </div>
        <div class="col-md-10">

            <form class="form-horizontal" method="post" action="<?php echo BASE_URL?>?p=customer&act=update&id=<?php echo $_SESSION['customer']['id'];?>" enctype="multipart/form-data" >

                <div  class="right-acc"  style="margin: 10px 0px 20px 70px;border-radius: 5px;background-color: white;">
                    <?php if(isset($errors) && count($errors) > 0) {?>

                     <div class="alter danger" style="border: 1px solid red;padding: 7px;margin: 15px 0 0;font-size: 13px;background-color: #fffbfb;border-color: #ff424e;color: #ff3b27;"><i class="fa fa-remove"></i>
                      Cập nhật tài khoản không thành công
                  </div>
              <?php } ?>
              <?php if(isset($errors) && count($errors) == 0) {?>
                <div style="border: 1px solid blue;padding: 7px;margin: 15px 0 0;font-size: 13px;background-color: #fffbfb;;"><i class="fa fa-check"></i>
                  Cập nhật tài khoản thành công
              </div>
          <?php } ?>
          <div class="box-info-acc"  >
            <span class="info-title fl-left" style="text-align: center;">THÔNG TIN CƠ BẢN</span>

            <div class="wrapper flex box-info-acc " >
                <div class="row"  style="margin-top: 10px;width: 99%">


                    <div class="form-group"  style="margin-bottom: 25px">
                        <label style="text-align: left;" class="control-label col-sm-3" >Họ và Tên</label>
                        <div class="col-sm-9">
                            <input style="border-radius: 5px" type="text" class="form-control" name="name" value="<?php echo  $_SESSION['customer']['name'];?> ">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 25px">
                        <label style="text-align: left;" class="control-label col-sm-3" >Địa chỉ:</label>
                        <div class="col-sm-9">
                            <input style="border-radius: 5px" type="text" class="form-control" name="address" value="<?php echo   $_SESSION['customer']['address'];?>" >
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 25px">
                        <label style="text-align: left;" class="control-label col-sm-3" >Email:</label>
                        <div class="col-sm-9">
                            <input disabled=""style="border-radius: 5px" type="email" class="form-control" name="email"  value="<?php echo   $_SESSION['customer']['email'];?>" >
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 25px">
                        <label style="text-align: left;" class="control-label col-sm-3" >Số điện thoại:</label>
                        <div class="col-sm-9">
                            <input style="border-radius: 5px" type="phone" class="form-control"  name="phone" value="<?php if(isset( $_SESSION['customer'])) echo   $_SESSION['customer']['phone']; else echo $_POST['phone'];?>">
                        </div>
                    </div>
                    <div style="margin-bottom: 20px"><a href="#"  >
                        <input name="change_pass" value="1" id="is_change_pass" <?php if(isset($_POST['change_pass'])) echo "checked" ?> type="checkbox" name=""> Thay đổi mật khẩu </a></div>
                        <div class="password-group" style="display: none;">
                         <div class="form-group" style="margin-bottom: 25px">
                            <label style="text-align: left;" class="control-label col-sm-3" >Mật khẩu cũ:</label>
                            <div class="col-sm-9">
                                <input id="old_password" style="border-radius: 5px" type="password" class="form-control" value="<?php echo @$_POST['old_password'];?>" name="old_password" placeholder="Nhập mật khẩu cũ">
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 25px">
                            <label style="text-align: left;"  class="control-label col-sm-3" >Mật khẩu mới:</label>
                            <div class="col-sm-9">
                                <input id="new_password" style="border-radius: 5px" type="password" id="password1"  class="form-control"  name="new_password" value="<?php echo @$_POST['new_password']  ?>" placeholder="Nhập mật mới">
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 25px">
                            <label style="text-align: left;" class="control-label col-sm-3" >Nhập lại:</label>
                            <div class="col-sm-9">
                                <input id="confirm_password" style="border-radius: 5px" type="password" id="password2"  class="form-control"  name="con_password" value="<?php echo @$_POST['confirm_password']?>" placeholder="Nhập lại mật khẩu mới">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="control-label col-sm-3" >Địa chỉ:</label>
                        <div class="col-sm-9">
                            <input style="border-radius: 5px" type="text" class="form-control" id="pwd">
                        </div>
                    </div> -->

                    

                </div>
            </div>
            <button style="margin-left: 300px"  name="update"  class="btn btn-primary"  >Cập nhật</button>
        </form>
    </div>

</div>
</div>

</div>

</div>
<?php include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php'; ?>


<script src="public/js/jquery-2.1.4.min.js"></script>
<!-- //jquery -->

<!-- popup modal (for signin & signup)-->
<script src="public/js/jquery.magnific-popup.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
     if($('#is_change_pass').is(':checked')) {
        $('.password-group').show();
        // var new_password = $('#new_password').va()  
      
        if($('#new_password').val() == '') $('#new_password').css('border','red 1px solid');
        if($('#old_password').val() == '' ) $('#old_password').css('border','red 1px solid') ;
        if($('#confirm_password').val() == '' ) $('#confirm_password').css('border','red 1px solid') ;
    } 
    $('#is_change_pass').on('change',function(e){
        e.preventDefault();
        $('.password-group').toggle();
    })
})
    
</script>
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