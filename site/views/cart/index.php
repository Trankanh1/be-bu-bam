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
                    <a href="index.php">Đặt hàng</a>
                    
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
        <div class="col-md-8">
            <!-- //tittle heading -->
            <div class="checkout-right">

                <span class="checkout-title">THÔNG TIN SẢN PHẨM</span>

                <div class="clearfix"> </div>
                <div class="table-responsive">

                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Số lượng</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                                <th>Remove</th>
                            </tr>
                        </thead>

                        <tbody>
                          <?php if(!isset($_SESSION['products'])) :?>  <td colspan="6">Your cart is empty</td> <?php endif ?>
                          <?php if(isset($_SESSION['products'])) : $total = 0;?>
                            <?php foreach ($_SESSION['products'] as $product) : $total = $total + $product['price']*($product['quantity'])?>

                                <tr class="rem1" id="row_<?php echo $product['row_id'] ?>">
                                    <td class="invert-image">
                                      <a href="?p=product&act=productDetail&sl=<?php echo $product['slug'].'-'. $product['id']?>" class="link-product-add-cart">
                                        <img style="height: 40px;width: 40px" src="<?php echo $product['cover_image'] ?>" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus product-qty" data-row=<?php echo $product['row_id'] ?> >&nbsp;</div>
                                            <div class="entry value"  id="qt_<?php echo $product['row_id'] ?>">
                                              <?php echo $product['quantity'] ?>
                                          </div>
                                          <div data-row=<?php echo $product['row_id'] ?>  class="entry value-plus product-qty active">&nbsp;</div>
                                      </div>
                                  </div>
                              </td>
                              <td class="invert"><?php echo substr($product['name'], 0,25).'...' ?></td>
                              <td class="invert" id="price_<?php echo $product['row_id']?>"><?php echo  number_format($product['price']) ?></td>
                              <td class="invert" id="subtt_<?php echo $product['row_id'] ?>" ><?php echo number_format($product['price']*($product['quantity']))?></td>
                              <td class="invert">
                                <div class="rem"> <a  href="<?php echo BASE_URL?>?p=cart&act=remove&rowId=<?php echo$product['row_id']; ?>">
                                    <div class="close">

                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach;endif ?>
                <?php if(isset($_SESSION['products'])) : ?> <tr><td colspan="6">Tổng tiền: <?php echo number_format($total); ?></td></tr> <?php endif ?>
            </tbody>
        </table>

        <div class="col-md-8" style="margin-top: 40px">
            <label>Hình thức thanh toán: COD</label>
            <p>Thanh toán khi nhận được hàng</p>
            <input type="checkbox" checked disabled="disabled" name="">
        </div>
        <!--  <div class="col-md-8"> <button class="submit check_out">Cập nhật đơn hàng</button></div> -->
    </div>
</div>
</div>

<div class="col-md-4">
    <div class="checkout-left">
        <form method="post" action="<?php echo BASE_URL ?>?p=customer&act=placeOrder">
            <div class="address_form_agile">
                <span class="checkout-title">
                    THÔNG TIN MUA HÀNG
                </span>
                <input type="hidden" name="total" value="<?php  if(isset($_SESSION['products'])) echo number_format($total);?>">
                <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                    <div class="information-wrapper">
                        <div class="first-row">
                            <div class="controls">
                                <input class="billing-address-name" type="text" name="name" placeholder="Họ và tên" value="<?php if(isset($_SESSION['customer'])) echo $_SESSION['customer']['name'] ?>" required="">
                            </div>
                            <div class="w3_agileits_card_number_grids">
                                <div class="w3_agileits_card_number_grid_left">
                                    <div class="controls">
                                        <input type="text" value="<?php if(isset($_SESSION['customer'])) echo $_SESSION['customer']['phone'] ?>" placeholder="Số điện thoại giao hàng" name="phone" required="">
                                    </div>
                                </div>
                                <div class="w3_agileits_card_number_grid_left">
                                    <div class="controls">
                                        <input type="text" value="<?php if(isset($_SESSION['customer'])) echo $_SESSION['customer']['email'] ?>" placeholder="Email" name="email" >
                                    </div>
                                </div>


                                <div class="clear"> </div>
                            </div>


                            <div class="w3_agileits_card_number_grid_left">
                                <div class="controls">
                                    <input type="text" value="<?php if(isset($_SESSION['customer'])) echo $_SESSION['customer']['address'] ?>" placeholder="Số nhà, tòa nhà, đường, xã phường" name="address" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="checkout-right-basket">
                    <button type="submit" name="submit" style="margin-bottom: 20px" class="btn btn-primary"> Đặt hàng
                        <span class="fa fa-hand-o-right" aria-hidden="true"></span></button> 
                    </div>
                </div>
            </form>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
</div>
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

<!-- //checkout page -->
<?php include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
<script src="public/js/jquery-2.1.4.min.js"></script>
<!-- //jquery -->
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
<!-- popup modal (for signin & signup)-->
<script src="public/js/jquery.magnific-popup.js"></script>
<script type="text/javascript">
    $(document).on('click','.product-qty', function(e){

        var rowId = parseFloat($(this).data('row'));
        var qty = parseFloat($('#qt_'+rowId).text())
        var price = $('#price_'+rowId).text();
        price = parseFloat(price.replace(',',''));
        var subtotal = price*qty;

        $.ajax({
            url: '?p=cart&act=update',
            method: 'POST',
            data: {
                row_id: rowId,
                quantity: qty,
            },
            dataType: 'json',
            success: function(res){
                if(res.status) {
                  $('#subtt_'+rowId).text(addCommas(subtotal));
                  toastr.success('Successfully');
              }
          }
      })

    });

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
    <script src="public/js/map-api.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYCBaznJBEE-MTOXkq1FhUw0bNpHxIFbo&callback=myMap"></script>
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
                if(value == 'all') location.replace('http://bebubam.com?p=product&act=index');
                else location.replace('http://bebubam.com?p=product&act=searchByCategories&c=all&sl='+value);
            })
    })
</script>
<!-- //smooth-scrolling-of-move-up -->
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
<!-- for bootstrap working -->
<script src="public/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- //js-files -->

</body>

</html>