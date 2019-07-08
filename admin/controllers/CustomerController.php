<?php 
include ADMIN_MODEL_PATH.'Customers.php';
class CustomerController {
    public function index()
    {
        $Customers = new Customers();
        $Customers = $Customers->getAll();
        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'customer'.DIRECTORY_SEPARATOR.'index.php';
    }
    public function edit()
    {
        if (isset($_GET['id'])) {            
            $CustomerId = intval($_GET['id']);
            if ($CustomerId) {
                $Customers = new Customers();
                $Customers = $Customers->findCustomerById("*", "and id = $CustomerId");
                if ($Customers) {
                    require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'customer' . DIRECTORY_SEPARATOR . 'edit.php';
                } else require '404.php';
            }
        }
    }
    public function update()
    {
        if (isset($_GET['id'])) {
            $CustomersId = intval($_GET['id']);
            if ($CustomersId) {
                $Customers = new Customers();
                $Customers= $Customers->findCustomerById("*", "and id= $CustomersId");
                if ($Customers) {
                    $CustomerName = isset($_POST['name']) ? $_POST['name'] : '';
                    $CustomerPhone= isset($_POST['phone']) ? $_POST['phone'] : '';
                    $CustomerBirthday = isset($_POST['birthday']) ? ($_POST['birthday']) : '';
                    $CustomerAddress = isset($_POST['address']) ? $_POST['address'] : '';
                    $CustomerEmail = isset($_POST['email']) ? $_POST['email'] : '';
                    $CustomerGender = isset($_POST['gender']) ? $_POST['gender'] : '';
                    $CustomerPassword = isset($_POST['password']) ? md5($_POST['password']) : '';
                    if(!$CustomerName)
                    {
                        $errors[] = "Phai nhap ten";
                    }
                    if (count($errors) == 0) {
                        $Customers = new Customers();
                        $data = [
                            'name' => $CustomerName,
                            'phone' => $CustomerPhone,
                            'birthday' =>$CustomerBirthday,
                            'address '=>$CustomerAddress ,
                            'gender '=>$CustomerGender ,
                            'password '=>$CustomerPassword , 
                            'email'=>$CustomerEmail , 
                        ];
                        $CustomersInsertId = $Customers->updateCustomer($data, " id = $CustomersId");
                        if ($CustomersInsertId) {
                            $_SESSION['success'] = "Sửa thành công!";
                            header('Location:' . BASE_URL . 'admin.php?p=customer&act=index');
                        }
                    } else
                    $errors[] = 'Sửa thất bại';
                }
            }
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            if ($id) {
                $Customers = new Customers();
                $select = "*";
                $Customers = $Customers->findCustomerById("*", "and id= $id");
                if ($Customers) { 
                    $Customers = new Customers();
                    if ($Customers->deleteCustomer('id ='.$id)) {
                        $_SESSION['success'] = "Xóa thành công!";
                    } else {
                        $_SESSION['error'] = "Xóa thất bại!";
                    }
                    header('Location:' . BASE_URL . 'admin.php?p=customer&act=index');
                } else require '404.php';
            }
        }
    }
}
