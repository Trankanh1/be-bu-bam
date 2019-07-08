<?php 
include MODEL_PATH.DIRECTORY_SEPARATOR.'Customer.php';
include MODEL_PATH.DIRECTORY_SEPARATOR.'Order.php';
include MODEL_PATH . DIRECTORY_SEPARATOR . 'OrderDetail.php';
session_start();

class CustomerController {
    public function register()
    {
        if (isset($_POST['submit'])) {
            $name = isset($_POST['name']) ? rtrim($_POST['name']) : '';
            $email  =  isset($_POST['email']) ? rtrim($_POST['email']) : '';
            $password = isset($_POST['password']) ? md5(rtrim($_POST['password'])) : '';
            $errors = [];
            if ($name == '') {
                $errors[] = "Nhập tên";
            }
            if ($email == '') {
                $errors[] = "Nhập email";
            }
            if ($password == '') {
                $errors[] = "Nhập password";
            } else {
                $customer = new Customer();
                //check if email exist
                $checkEmail = $customer->select("email", 'customers', " and email = '" . $email . "'");
                if ($checkEmail) {
                   echo '<script type="text/javascript">alert("Email này đã tồi tại! Vui lòng nhập email khác");</script>';
                   exit;
               }
           }
           if (count($errors) == 0) {
            $data = [
                $customer->name => $name,
                $customer->email => $email,
                $customer->passwrod => $password,
            ];
            $customerInsertId = $customer->addCustomer($data);
            if ($customerInsertId) {
                $customer= new Customer();
                $customer= $customer->findCustomerById("*", "and id=$customerInsertId");
                $_SESSION['customer'] = [
                    'id' => $customer[0]['id'],
                    'name' => $customer[0]['name'],
                    'email' => $customer[0]['email'],
                    'phone' => $customer[0]['phone'],
                    'address' => $customer[0]['address'],
                ];
                header('Location:'.BASE_URL.'?p=product&act=index');
            }  
        }    else echo '<script type="text/javascript">alert("Thông tin đăng ký không hợp lệ!");</script>';
    } 
}

public function login()
{

    $email  =  isset($_REQUEST['email']) ? rtrim($_REQUEST['email']) : '';
    $password = isset($_REQUEST['password']) ? md5(rtrim($_REQUEST['password'])) : '';
    $errors = [];
    if ($email == '') {
        $errors[] = "Nhập email";
    }
    if ($password == '') {
        $errors[] = "Nhập password";
    }
    if (count($errors) == 0) {
        $customer = new Customer();
        $where = "and email = '" . $email . "'and password = '" . $password . "'";
        $customer = $customer->select("*", 'customers', $where);
        if (!$customer) {
            $errors['errors'] = "Thông tin đăng nhập không chinh xác!";
        }
    }
    if (count($errors) == 0) {
        $_SESSION['customer'] = [
            'id' => $customer[0]['id'],
            'name' => $customer[0]['name'],
            'email' => $customer[0]['email'],
            'phone' => $customer[0]['phone'],
            'address' => $customer[0]['address'],
        ];
        print_r(json_encode(['status'=>200]));
            // header("Location: " . BASE_URL . "index.php?p=home");
    } 

}
public function edit()
{
    if (isset($_GET['id'])) {
            //get id 
        $customerId = intval($_GET['id']);
        if ($customerId) {
            $customer = new Customer();
            $customer = $customer->findCustomerById("*", "and id = $customerId");
                // if product id exist 
            if ($customer) {
                require VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'edit_info.php';
            } else require '404.php';
        }
    }
}
public function update()
{
    if(isset($_POST['update'])) {

        if (isset($_GET['id'])) 
            $customerId = intval($_GET['id']);
        if ($customerId) {
            $customer = new Customer();
            $customer = $customer->findCustomerById("*", "and id=$customerId");
            if ($customer) {
                $customerEmail = $_SESSION['customer']['email'];
                $customerName = isset($_POST['name']) ? trim($_POST['name']) : '';
                $customerPhone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
                $customerAddress = isset($_POST['address']) ? trim($_POST['address']) : '';
                $currentPassword = isset($_POST['old_password']) ? md5(trim($_POST['old_password'])) : '';
                $newPassword = isset($_POST['new_password']) ? md5(trim($_POST['new_password'])): '';
                $confirmPassword = isset($_POST['con_password']) ? md5(trim($_POST['con_password'])): '';
                $errors = [];

                if(!$customerName)
                {
                    $errors[] = "Phai nhap ten";
                }
                if(isset($_POST['change_pass']) && $_POST['change_pass'] == 1) {
                    if(!empty($currentPassword) && !empty( $confirmPassword) && $confirmPassword != $currentPassword&& $newPassword == $confirmPassword && $currentPassword == $customer[0]['password']) {
                       //reset password
                        $acceptPassword =  $confirmPassword ;
                    } else  {
                        $errors[] = "Mật khẩu không đúng";
                    }
                }
                if (count($errors) == 0) {

                    $customer = new Customer();
                    $data = [
                        'name' => $customerName,
                        'phone' =>$customerPhone,
                        'address'=>  $customerAddress ,
                    ];
                    if(isset($acceptPassword)) $data['password'] = $acceptPassword;

                    $customerUpdate = $customer->updateCustomer($data, " id = $customerId");

                    if ($customerUpdate) {

                        $_SESSION['customer']['name'] = $data['name'];
                        $_SESSION['customer']['phone'] = $data['phone'];
                        $_SESSION['customer']['address'] = $data['address'];
                        
                    }
                } require VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'index.php';
            }
        }
    }

}


public function logout()
{
    if (isset($_SESSION['customer'])) {
        unset($_SESSION['customer']);
        header('Location:'.BASE_URL.'?p=home');
    }
}
public function index()
{  if(isset($_SESSION['customer'])) {
    require VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'index.php';
} else require '404.php';
}
public function myOrders()
{
    if(isset($_SESSION['customer'])) {
        $customerOrder = new Order();
        $listOrder = $customerOrder->select('*','orders','and customer_id='.$_SESSION['customer']['id'],'order by id DESC');
        require VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'myorders.php';
    } else require '404.php';
}
public function placeOrder() 
{
    if(isset($_POST['submit'])) {
        $customerName = isset($_POST['name'])? $_POST['name']:'';
        $customerPhone = isset($_POST['phone'])? $_POST['phone']:'';
        $customerEmail = isset($_POST['email'])? $_POST['email']:'';
        $customerAddress = isset($_POST['address'])? $_POST['address']:'';
        $total = isset($_POST['total'])? $_POST['total']:'';
        $errors = [];
        $now = new DateTime();
        $CURRENT_TIME = $now->format('Y-m-d H:i:s');
        if(empty($customerPhone)) {
            $errors[] = "Khách hàng phải số điện thoại";
        }
        if(empty($customerAddress)) {
            $errors[] = "Khách hàng phải nhập tên";
        }
        if(empty($customerName)) {
            $errors[] = "Khách hàng phải nhập tên";
        }
        if(count($errors) == 0) {
            $order = new Order();
            $data = [
                $order->customer_name => $customerName,
                $order->customer_phone => $customerPhone,
                $order->customer_email => $customerEmail,
                $order->customer_add => $customerAddress,
                $order->created_at => $CURRENT_TIME,
                $order->total => str_replace(',', '', $total),
            ];
            if(isset($_SESSION['customer'])) $data[$order->customer_id] = $_SESSION['customer']['id'];
            $orderInsertId = $order->addOrder($data);
            if($orderInsertId) {
                foreach ($_SESSION['products'] as $product) {
                    $orderDetail = new OrderDetail();
                    $data = [
                        'order_id' => $orderInsertId,
                        'product_id' => $product['id'],
                        'product_name' => $product['name'],
                        'product_price' => $product['price'],
                        'quantity' => $product['quantity'],
                        'sub_total' => $product['quantity']*$product['price'],
                    ];
                    $orderDetail->addOrderDetail($data);
                }
                unset($_SESSION['products']);
                require VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'order_success.php';
            }
        }
    }
}
public function removeMyOrder()
{
    if(isset($_SESSION['customer'])) {
        $orderId = isset($_GET['id'])?$_GET['id']:'';
        $status = isset($_GET['st'])?$_GET['st']:'';

        if(!empty($orderId) && !empty($status)) {
            $where = 'and id='.$orderId;
            $order = new Order();
            $order = $order->findOrderById('*',$where);
            if($order) {
                $updateOrder = new Order();
                $data = [
                    'status' => $status,
                ];
                $updateProductId = $updateOrder->updateOrderStatus($data,'id='.$orderId);
                if($updateProductId) {
                  session_start();
                  $_SESSION['success'] = "Trạng thái đơn hàng đã được cập nhật!";
                  header('Location:' . BASE_URL . '?p=customer&act=myOrders');
              }
          } 
      }
  }  else require '404.php';
}
public function viewOrderDetail()
{
   if(isset($_SESSION['customer'])) {

    $orderId = isset($_GET['id'])? intval($_GET['id']):''; 
    if(!empty($orderId)) {
        $order = new Order();
        $order = $order->findOrderById('*','and id ='.$orderId);
        if($order){
            $orderDetail = new OrderDetail();
            $orderDetail = $orderDetail->select('*','order_details','and order_id ='.  $orderId );

            require VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'order_detail.php';
        }
    }
}  require '404.php';


}
}