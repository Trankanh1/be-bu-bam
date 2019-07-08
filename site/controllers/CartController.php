<?php
include MODEL_PATH . DIRECTORY_SEPARATOR . 'Product.php';
include MODEL_PATH . DIRECTORY_SEPARATOR . 'Order.php';
include MODEL_PATH . DIRECTORY_SEPARATOR . 'OrderDetail.php';
session_start();

class CartController
{   
    public function checkout()
    {     
        if(isset($_COOKIE['ViewdProducts'])) $viewedProducts = json_decode($_COOKIE['ViewdProducts'], true);
        require VIEW_PATH . DIRECTORY_SEPARATOR . 'cart' . DIRECTORY_SEPARATOR . 'index.php';
    }
    public function add()
    {
        if(isset($_POST['add'])) {  
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $quantity = isset($_POST['id']) ? (int)$_POST['quantity'] : 1;
            if(!empty($id)){
                $product = new Product();
                $product = $product->findProductById('*','and id='.$id); 
                if($product){ // if product exist in DB
                   $newProduct = [
                    'id' => $product[0]['id'],
                    'slug' => $product[0]['slug'],
                    'cover_image' => $product[0]['cover_image'],
                    'price' =>$product[0]['price'],
                    'sub_total' => $quantity*$product[0]['price'] ,
                    'name' => $product[0]['name'],
                    'quantity' => $quantity,
                ];
                    $check = false; //check if product  exist in cart
                    if(isset($_SESSION['products'])) {
                        foreach($_SESSION['products'] as $product){
                            if($id == $product['id']) {
                                $check = true;
                                $rowId = $product['row_id'];
                                break;   
                            }
                        }
                    }
                    if($check == false) {
                        $newProduct['row_id'] = isset($_SESSION['products'])?   max(array_keys($_SESSION['products']))+ 1: 0;
                         //if doesnt exist add new product to cart
                        $_SESSION['products'][] = $newProduct;
                    }
                    else  //if exist  ,quantity increasing 1
                    {
                        $_SESSION['products'][$rowId]['quantity']++;
                    }
                    header('Location: '.BASE_URL.'?p=cart&act=checkout');
                }
            }         
        }
    }
    public function update()
    {
        $rowId = $_POST['row_id'];
        $qty = $_POST['quantity'];
        $_SESSION['products'][$rowId]['quantity'] = $qty;
        $dataResponse = [
            'status' => 200,
        ];
        print_r(json_encode($dataResponse));
    }
    public function remove()
    {
        if(isset($_SESSION['products'])) {
            $row_id = isset($_REQUEST['rowId'])? $_REQUEST['rowId']: '';     
            if(!is_null($row_id)) {
                unset($_SESSION['products'][$row_id]);
                header('Location: '.BASE_URL.'?p=cart&act=checkout');
            }
        }
    }
}
