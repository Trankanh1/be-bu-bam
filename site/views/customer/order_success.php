<?php

include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'main.php';
?>
<div class="services-breadcrumb">
  <div class="agile_inner_breadcrumb">
    <div class="container">
      <ul class="w3_short">
        <li>
          <a href="index.php">Trang chủ</a>
          <i>|</i>
        </li>
        <li>Đặt hàng thành công</li>
      </ul>
    </div>
  </div>
</div>
<div class="privacy">
  <div class="container">
    <div class="alert alert-light" style="text-align: center;" role="alert">
      <!-- <h4 class="alert-heading">Thanh toán thành công</h4> -->
      <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Chúng tôi sẽ giao hành đến chỗ bạn nhanh nhất có thể.</p>
      <hr>
      <p class="mb-0">Nếu có bất kỳ sai sót này xin hãy liên hệ và chúng t sẽ giải quyết cho bạn trong vòng 24 giờ</p>
      <a class="btn btn-success" href="<?php echo BASE_URL?>?p=product">Tiếp tục mua hàng</a>
    </div>
  </div>
</div>
<?php include VIEW_PATH . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
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
    <script src="public/js/map-api.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYCBaznJBEE-MTOXkq1FhUw0bNpHxIFbo&callback=myMap"></script>