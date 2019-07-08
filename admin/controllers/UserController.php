<?php
include ADMIN_MODEL_PATH . DIRECTORY_SEPARATOR . 'User.php';
class UserController
{
    public function index()
    {
        $users = new User();
        $users = $users->getAll();
        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.'index.php';
    }
    public function login()
    {

        if (isset($_POST['submit'])) {
            $email  =  isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? md5($_POST['password']) : '';
            $errors = [];
            if ($email == '') {
                $errors[] = "Nhập email";
            }
            if ($password == '') {
                $errors[] = "Nhập password";
            }
            if (count($errors) == 0) {
                $user = new User();
                $where = "and email = '" . $email . "'and password = '" . $password . "'";
                $user = $user->select("*", 'users', $where);
                if (!$user) {
                    $errors[] = "Thông tin đăng nhập không chinh xác!";
                }
                if (count($errors) == 0) {
                    $_SESSION['user'] = [
                        'user_id' => $user[0]['id'],
                        'user_name' => $user[0]['name'],
                        'user_email' => $user[0]['email'],
                        'user_password' => $user[0]['password'],
                        'user_level' => $user[0]['level'],
                        'user_anh' => $user[0]['anh'],
                        'user_gender' => $user[0]['gender'],
                    ];
                    header("Location: " . BASE_URL . "admin.php?p=home&act=index");
                } else
                require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'login.php';
            } 
        }else
        require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'login.php';
    }
    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header("Location: " . BASE_URL . "admin.php?p=user&act=index&role=admin");
    }
    public function register()
    {
        if (isset($_POST['regsiter'])) {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $email  =  isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? md5($_POST['password']) : "";
            $check = isset($_POST['check']) ? $_POST['check'] : '';
            $pattern = "/^[A-Za-z0-9]{6,32}@([a-zA-Z]{2,12}).com/";
            $errors = [];
            if(!preg_match($pattern,$email, $matchs)){
                $errors[]= "Bạn vừa nhập vào một địa chỉ Email không  hợp lệ!";
            }
            $partten1 = "/^([A-Z]){1}([\w_]+){5,31}$/";
            
            if(!preg_match($partten1 ,$password, $matchs)){
               $errors[] ="Mật khẩu bạn vừa nhập không đúng định dạng ";}
               if ($name == '') {
                $errors[] = "Nhập tên";
            }
            if ($email == '') {
                $errors[] = "Nhập email";
            }
            if ($password =="")  {
                $errors[] = "Nhập password";
            } 
            if ($check == "") {
                $errors[] = "Ấn check";
            } 
            else {
                $user = new User();
                //check if email exist
                $checkEmail = $user->select("email", 'users', "email = '" .$email. "'");
                if ($checkEmail) {
                    $errors[] = "Email này đã tồn tai";
                }
            }
            if (count($errors) == 0) {
                $data = [
                    $user->name => $name,
                    $user->email => $email,
                    $user->passwrod => $password,
                    
                ];
                //insert data into db
                $user = $user->addUser($data);
                if ($user) {
                    session_start();
                    $_SESSION['success-registeration'] = "Đăng ký tài khoản thành công!";
                    header('Location:' . BASE_URL . 'admin.php?p=user&act=login');
                }
            } else {
                require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'register.php';
            }
        } else require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'register.php';
    }
    public function create()
    {
        require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'create_user.php';
    }
    public function created()
    {
        if (isset($_GET['id'])) {
            //get id 
            $userId = intval($_GET['id']);
            if ($userId) {
                $user = new User();
                $user = $user->findUserById("*", "and id = $userId");

                // if product id exist 
                if ($user) {
                    require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'account.php';
                } else require '404.php';
            }
        }
    }
    public function store()
    {
        if (isset($_POST['submit'])) {
            $userName = isset($_POST['name']) ? $_POST['name'] : '';
            $userEmail= isset($_POST['email']) ? $_POST['email'] : '';
            $userPassword = isset($_POST['password']) ? md5($_POST['password']) : '';
            $userLevel = isset($_POST['level']) ? $_POST['level'] : '';
            $userGender = isset($_POST['gender']) ? $_POST['gender'] : '';
            $userAnh = $_FILES['anh']['name'];
            if(move_uploaded_file($_FILES['anh']['tmp_name'], 'public/admin/images/'.$userAnh)){  
            }
            $errors = [];
            if(!$userName)
            {
                $errors[] = "Phai nhap ten";
            }
            if(!$userEmail)
            {
                $errors[] = "Phai nhap Email";
            }
            if(!$userPassword )
            {
                $errors[] = "Phai nhap mật khẩu";
            }
            if (count($errors) == 0) {
                //create slug by category name
                $user = new User();
                $data = [
                    'name' => $userName,
                    'email' => $userEmail,
                    'level' =>$userLevel,
                    'password '=>  $userPassword ,
                    'gender '=>  $userGender ,
                    'anh '=>  'public/admin/images/'.$userAnh ,
                ];
                $userInsertId = $user->addUser($data);
                if ($userInsertId) {
                    $_SESSION['success'] = "Them mới thành cong!";
                    header('Location:' . BASE_URL . 'admin.php?p=user&act=index');
                } else
                $errors[] = 'Thêm mới thất bại';
            }
        }
    }
    public function edit()
    {
        if (isset($_GET['id'])) {
            //get id 
            
            $userId = intval($_GET['id']);
            if ($userId) {
                $user = new User();
                $user = $user->findUserById("*", "and id = $userId");
                
                // if product id exist 
                if ($user) {
                    require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR . 'edit.php';
                } else require '404.php';
            }
        }
    }
    public function update()
    {
        if (isset($_GET['id'])) {
            //get id 
            $userId = intval($_GET['id']);
            if ($userId) {
                $user = new User();
                $user= $user->findUserById("*", "and id= $userId");
                // if user id exist 
                if ($user) {
                    $userName = isset($_POST['name']) ? $_POST['name'] : '';
                    $userEmail= isset($_POST['email']) ? $_POST['email'] : '';
                    $userPassword = isset($_POST['password']) ? md5($_POST['password']) : '';
                    $userLevel = isset($_POST['level']) ? $_POST['level'] : '';
                    $usergender = isset($_POST['gender']) ? 1 : '';
                    $userAnh = $_FILES['anh']['name'];
                    
                    if(move_uploaded_file($_FILES['anh']['tmp_name'],'public/admin/images/'.$userAnh)){  
                    }
                    $errors = [];
                    if(!$userName)
                    {
                        $errors[] = "Phai nhap ten";
                    }
                    if(!$userEmail)
                    {
                        $errors[] = "Phai nhap Email";
                    }
                    if(!$userPassword )
                    {
                        $errors[] = "Phai nhap mật khẩu";
                    }
                    if (count($errors) == 0) {
                        $user = new User();
                        $data = [
                            'name' => $userName,
                            'email' => $userEmail,
                            'level' =>$userLevel,
                            'password '=>$userPassword ,
                            'gender '=>$usergender ,
                            'anh '=>  'public/admin/images/'.$userAnh,
                        ];
                        print_r($data);
                        $userInsertId = $user->updateUser($data, " id = $userId");
                        if ($userInsertId) {
                            session_start();
                            $_SESSION['success'] = "Sửa thành công!";
                            header('Location:' . BASE_URL . 'admin.php?p=user&act=index');
                        }
                    } else
                    $errors[] = 'Sửa thất bại';
                }
            }
        }
    }
    public function updated()
    {
        if (isset($_GET['id'])) {
            //get id 
            $userId = intval($_GET['id']);
            if ($userId) {
                $user = new User();
                $user= $user->findUserById("*", "and id= $userId");
                // if product id exist 
                if ($user) {
                    $userName = isset($_POST['name']) ? $_POST['name'] : '';
                    $userEmail= isset($_POST['email']) ? $_POST['email'] : '';
                    $userPassword = isset($_POST['password']) ? md5($_POST['password']) : '';
                    $userLevel = isset($_POST['level']) ? $_POST['level'] : '';
                    $usergender = isset($_POST['gender']) ? $_POST['gender'] : '';
                    $userAnh = $_FILES['anh']['name'];
                    if(move_uploaded_file($_FILES['anh']['tmp_name'], 'public/admin/images/'.$userAnh)){  
                    }
                    $errors = [];
                    if(!$userName)
                    {
                        $errors[] = "Phai nhap ten";
                    }
                    if(!$userEmail)
                    {
                        $errors[] = "Phai nhap Email";
                    }
                    if(!$userPassword )
                    {
                        $errors[] = "Phai nhap mật khẩu";
                    }
                    if (count($errors) == 0) {
                        $user = new User();
                        $data = [
                            'name' => $userName,
                            'email' => $userEmail,
                            'level' =>$userLevel,
                            'password '=>$userPassword ,
                            'gender '=>$usergender ,
                            'anh '=>  $userAnh ,
                        ];
                        $userInsertId = $user->updateUser($data, " id = $userId");
                        if ($userInsertId) {
                            session_start();
                            $_SESSION['success'] = "Sửa thành công!";
                            header('Location:' . BASE_URL . 'admin.php?p=home&act=index');
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
                $user = new User();
                $select = "*";
                $user = $user->findUserById("*", "and id= $id");
                if ($user) {    
                 
                    $user = new User();
                    session_start();
                    if ($user->deleteUser('id ='.$id)) {

                        $_SESSION['success'] = "Xóa thành công!";
                    } else {
                        $_SESSION['error'] = "Xóa thất bại!";
                    }
                    header('Location:' . BASE_URL . 'admin.php?p=user&act=index');
                } else require '404.php';
            }
        }
    }
}