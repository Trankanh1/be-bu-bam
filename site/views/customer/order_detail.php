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
        <li>Quản lí đơn hàng</li>
      </ul>
    </div>
  </div>
</div>

<div class="privacy" style="font-size: 13px; background-color: #f9f9f9;">
  <div class="container">

    <div class="col-md-12" style="margin: 10px 0px">
      <div class="col-md-3">
        <?php include VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'sidebar.php';?>
      </div>
      <div class="col-md-9" style="border-radius: 9px;">

        <p class="title-detail" style="padding-bottom: 10px">ĐỊA CHỈ NGƯỜI NHẬN</p>
        <div>
          <div style="background-color: #f9f9f9;margin-bottom: 10px; padding: 10px;border-radius: 5px;background-color: white" >
            <p>Khách hàng: <?php echo $order[0]['customer_name'] ?></p>
            <p>Địa chỉ:  <?php echo $order[0]['customer_add'] ?></p>
            <p>Điện thoại: <?php echo $order[0]['customer_phone'] ?></p>
          </div>
        </div>
        <div class="table-responsive" style=" background-color: white;">          
          <table class="table">
            <thead>
              <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <!-- <th>Sản phẩm</th> -->
                <th>Số lượng</th>
                <th>Thành tiền</th>

              </tr>
            </thead>
            <tbody>
              <?php if (count($orderDetail) > 0) :?>
                <?php foreach ($orderDetail as $item) :?>
                  <tr>
                    <td><?php echo $item['product_name'] ?></td>
                    <td><?php echo number_format($item['product_price']) ?></td>               
                    <td><?php echo number_format($item['quantity']) ?></td>
                    <td>
                     <?php echo number_format($item['product_price']* $item['quantity'])  ?>

                   </td>
                 </tr>

               <?php  endforeach; endif?>
             </tbody>
           </table>
           <?php if(is_null($order[0]['status'])) :?>
             <div style="float: right;">  <a class="btn btn-danger" href="<?php echo BASE_URL ?>?p=customer&act=removeMyOrder&id=<?php echo $order[0]['id'] ?>&st=3">Hủy đơn hàng </a></div>
           <?php endif?>
         </div>

       </div>
       
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