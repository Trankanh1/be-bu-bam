<?php 
include ADMIN_MODEL_PATH.'Order.php';
include HELPER . 'flash_message.php';
class OrderController {
    public function index()
    {
        $orders = new Order();
        $orders = $orders->getOrders();

        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'order'.DIRECTORY_SEPARATOR.'index.php';
    }
    public function create()
    {
        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'order'.DIRECTORY_SEPARATOR.'create_order.php';
    }  
    public function updateStatus()
    {
        $id = isset($_GET['id'])?$_GET['id']:'';
        $status = isset($_GET['st'])?$_GET['st']:'';

        if(!empty($id) && empty(!$status)) {
            $where = 'id = '.$id;
            $order = new Order();
            $order = $order->findOrderById($id);
            if($order) {
                $updateOrder = new Order();
                $data = [
                    'status' => $status,
                ];
                $updateProductId = $updateOrder->updateOrderStatus($data, $where);
                if($updateProductId) {
                  session_start();
                  $_SESSION['success'] = "Trạng thái đơn hàng đã được cập nhật!";
                  header('Location:' . BASE_URL . 'admin.php?p=order&act=index');
              }
          }
      }
  }
}