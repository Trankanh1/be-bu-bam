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

<div class="privacy" style="font-size: 13px;background-color: #f9f9f9;">
  <div class="container">

    <div class="col-md-12">
      <div class="col-md-3">
        <?php include VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'sidebar.php';?>
      </div>
      <div class="col-md-9" style="margin: 10px 0px;background-color: white;" >


       <?php if (count($listOrder) > 0) {?>
        <b>Đơn hàng của tôi</b>
        <div class="table-responsive">          
          <table class="table table-hover ">
            <thead>
              <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày mua</th>
                <!-- <th>Sản phẩm</th> -->
                <th>Tổng tiền</th>
                <th>Trạng thái đơn hàng</th>

              </tr>
            </thead>
            <tbody>

              <?php foreach ($listOrder as $item) :?>
                <tr>
                  <td><a href="<?php echo BASE_URL ?>?p=customer&act=viewOrderDetail&id=<?php echo $item['id'] ?>" ><?php echo 'MHD90'.$item['id'] ?></a></td>
                  <td><?php echo date('d/m/Y',strtotime($item['created_at'])) ?></td>               
                  <td><?php echo number_format($item['total_price']) ?></td>
                  <td>
                   <?php if($item['status'] == '') echo 'Chờ xác nhận'?>
                   <?php if($item['status'] == 1) echo 'Đã xác nhận'?>
                   <?php if($item['status'] == 2) echo 'Giao hàng thành công'?>
                   <?php if($item['status'] == 3) echo 'Đã hủy'?>

                 </td>
               </tr>

             <?php  endforeach;?>
           </tbody>
         </table>
       </div>
     <?php } else echo '<p>Bạn chưa có đơn hàng nào</p>' ?>

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