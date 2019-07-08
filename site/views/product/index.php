<?php

include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php';?>
<!-- top Products -->
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
<div style="position: relative;left: 1100px;top: 2px">
 <form method="post" action="<?php echo BASE_URL ?>?p=product&act=searchName">
     <select name="key" style="padding: 3px">
        <option>--Tìm kiếm ngẫu nhiên--</option>
        <option value="price-asc">Giá tăng dần</option>
        <option value="price-desc">Giá giảm dần</option>
        <option value="name-asc">Tên A -> Z</option>
        <option value="name-desce" >Tên Z -> A</option>
    </select>
    <input type="submit" value="Sắp xếp" class="btn btn-default" name="">
</form>
</div>
<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <div class="side-bar col-md-3">
            <div class="search-hotel">
                <h3 class="agileits-sear-head">Tìm kiếm </h3>
                <form action="<?php echo BASE_URL?>?p=product&act=search" method="post">
                    <input name="search" style="width: 150px" type="search" placeholder="Nhập tên sản phẩm" name="search" required="">
                    <input name="submit" type="submit" value=" ">
                </form>
            </div>
            <!-- price range -->
            <div class="range">
                <h3 class="agileits-sear-head">Giá</h3>
                <i  id="submit" class="fa fa-caret-right btn btn-primary"></i>
                <ul class="dropdown-menu6">
                    <li>
                        <div id="slider-range"></div>

                        <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" /> 
                    </li>
                </ul>
            </div>
            <!-- //price range -->
            <!-- discounts -->

            <!-- //discounts -->
            <!-- reviews -->
            <div class="customer-rev left-side">

                <ul>
                    <?php if(isset($totalFiveStar) && $totalFiveStar > 0): ?>
                      <h3 class="agileits-sear-head">Đánh giá sản phẩm</h3>
                      <li>
                       <input name="rating" value="5"   type="checkbox" class="checked">
                       <a href="#">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <span>(<?php echo $totalFiveStar ?>)</span>
                    </a>
                </li>
            <?php endif ?>
            <?php if(isset($totalFourStar) && $totalFourStar  > 0): ?>
                <li>
                   <input name="rating" value="4" type="checkbox" class="checked">
                   <a href="#">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <span>(<?php echo $totalFourStar ?>)</span>
                </a>
            </li>
        <?php endif ?>
        <?php if(isset($totalThreeStar) && $totalThreeStar  > 0): ?>
            <li>
               <input name="rating"  value="3" type="checkbox" class="checked">
               <a href="#">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <span>(<?php echo $totalThreeStar ?>)</span>
            </a>
        </li>
    <?php endif ?>
    <?php if(isset($totalTwoStar) && $totalTwoStar  > 0): ?>
        <li>
           <input name="rating" value="2" type="checkbox" class="checked">
           <a href="#">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <span>(<?php echo $totalTwoStar ?>)</span>
        </a>
    </li>
<?php endif ?>
<?php if(isset($totalOneStar) && $totalOneStar > 0): ?>
  <li>
   <input type="checkbox" value="1" name="rating" class="checked">
   <a href="#">
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <i class="fa fa-star-o" aria-hidden="true"></i>
    <span>(<?php echo $totalOneStar ?>)</span>
</a>
</li>
<?php endif ?>
</ul>
</div>
<!-- //reviews -->
<!-- cuisine -->
<div class="left-side">
    <h3 class="agileits-sear-head">Thương hiệu</h3>
    <ul>
        <li>
            <input type="checkbox" class="checked">
            <span class="span">Bobby</span>
        </li>
        <li>
            <input type="checkbox" class="checked">
            <span class="span">Goon</span>
        </li>
        <li>
            <input type="checkbox" class="checked">
            <span class="span">Pampers</span>
        </li>
        <li>
            <input type="checkbox" class="checked">
            <span class="span">Momcare</span>
        </li>
    </ul>
</div>
<!-- //cuisine -->
<!-- deals -->
<div class="deal-leftmk left-side">
    <?php if(isset($topProducts) && count($topProducts) > 0): ?>
    <h3 class="agileits-sear-head">Sản phẩm bán chạy</h3>
    <?php foreach ($topProducts as $item): ?>
        <div class="special-sec1">
            <div class="col-xs-4 img-deals">
                <a href="?p=product&act=productDetail&sl=<?php echo $item['slug'].'-'. $item['id']?>"><img height="80px" width="70px" src="<?php echo $item['cover_image'] ?>" alt=""></a>
            </div>
            <div class="col-xs-8 img-deal1" >
                <p><?php echo substr($item['name'],0,30) ?></p>
                <a href="?p=product&act=productDetail&sl=<?php echo $item['slug'].'-'. $item['id']?>"><?php echo number_format($item['price']). ' đ' ?></a>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php endforeach;endif ?>
</div>
<!-- //deals -->
</div>
<div class="agileinfo-ads-display col-md-9" style="margin-bottom: 90px">
    <div class="wrapper">
        <!-- first section (nuts) -->
        <div id="product_search">
            <div class="product-sec1" >
                <?php if (isset($products) && !empty($products) ) {?>
                    <?php foreach ($products as $product) : ?>
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img height="160px" width="160px" src="<?php echo $product['cover_image']  ?>" alt="">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="?p=product&act=productDetail&sl=<?php echo $product['slug'].'-'. $product['id']?>" class="link-product-add-cart">Chi Tiết</a>
                                        </div>
                                    </div>
                                    <span class="product-new-top">Mới</span>
                                </div>
                                <div class="item-info-product ">
                                    <h4 >
                                        <a href="#"><?php echo substr($product['name'],0,30)  ?></a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price"><?php echo number_format($product['price'])  ?></span>

                                        <?php if($product['origin_price'] != 0 ) echo '<del>'.number_format($product['origin_price']).'</del>'  ?>

                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="?p=cart&act=add" method="post">
                                            <fieldset>

                                                <input type="hidden" name="slug" value="<?php echo $product['slug'] ?>" />
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="name"
                                                value="<?php echo $product['name']  ?>" />
                                                <input type="hidden" name="origin_price"
                                                value="<?php echo number_format($product['origin_price']) ?>" />
                                                <input type="hidden" name="price"
                                                value="<?php echo number_format($product['price']) ?>" />
                                                <input type="hidden" name="currency_code" value="VND" />
                                                <input type="hidden" name="cover_image"
                                                value="<?php echo $product['cover_image'] ?>" />
                                                <input type="hidden" name="id"
                                                value="<?php echo $product['id'] ?>" />
                                                <input type="hidden" name="cover_image"
                                                value="public/images/clothes/0001aothun.jpg" />
                                                <input type="submit" name="add" value="Thêm vào giỏ hàng"
                                                class="buttona " />
                                            </fieldset>
                                        </form> 
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php } else echo '<p style="text-align:center"> Không có sản phẩm nào được tìm thấy</p?'?>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //fourth section (noodles) -->
        <div id="panitate-section" style="position: absolute;right: 50px">
            <nav aria-label="Page navigation example">

                <?php  if ( isset($totalPage) && $totalPage ) :?>
                   <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php  for ($i = 1; $i <= $totalPage; $i++) :?>
                        <li class="page-item"><a class="page-link" href="<?php echo BASE_URL ?>?p=product&act=index&page=<?php echo $i ?>"><?php echo $i?></a></li>
                    <?php endfor?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            <?php endif?>

        </nav>
    </div>
</div>

</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
<!-- //product right -->
</div>
</div>
<!-- //top products -->
<?php include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php';
?>

<script src="public/js/jquery-2.1.4.min.js"></script>
<script src="public/js/jquery-ui.js"></script>
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
<script>
        //<![CDATA[ 
        $(window).load(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 2000000,
                values: [0, 500000],
                slide: function (event, ui) {
                    $("#amount").val(addCommas(ui.values[0]) + " - " + addCommas(ui.values[1]));
                }
            });
            $("#amount").val(addCommas($("#slider-range").slider("values", 0)) + " - " + addCommas($("#slider-range").slider("values", 1)));
            function addCommas(nStr) {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }

        }); //]]>
    </script>
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
    <script>
        $(document).ready(function() {
          $(document).on('click','#submit',function(){
            var rangePrice = $('#amount').val().split('-');
            var fPrice = $.trim(rangePrice[0].replace(',',''));
            var sPrice = $.trim(rangePrice[1].replace(',',''));
            $.ajax({
                url: '?p=product&act=asynSearch',
                method: 'GET',
                data: {
                    first_price: fPrice,
                    second_price: sPrice,
                },
                dataType: 'json',
                success: function(res){
                  // document.getElementById("searchresultdata").innerHTML = res;
                      // $('#product_search').html(res).show();
                      // console.log("OK");
                  },
                  error: function(res){
                    $('#product_search').html(res.responseText).show();
                    $('#panitate-section').empty();
                }
            });
        });
          $(document).on('change','.checked',function(){
           var rating = $(this).val();
           $('.checked').each(function(key,data){
            if(data.value != rating)
                data.checked = false;

        });
           $.ajax({
            url: '?p=product&act=asynSearch',
            method: 'GET',
            data: {
                rating: rating,
            },
            dataType: 'json',
            success: function(res){
                  // document.getElementById("searchresultdata").innerHTML = res;
                      // $('#product_search').html(res).show();
                      // console.log("OK");
                  },
                  error: function(res){
                    $('#product_search').html(res.responseText).show();
                    $('#panitate-section').empty();
                }
            });
       })
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
    <!--remove cart -->
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
    <!--quantity-->

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