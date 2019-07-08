<?php
include ADMIN_CONTROLLER_PATH . DIRECTORY_SEPARATOR . 'BaseController.php';
include ADMIN_MODEL_PATH . DIRECTORY_SEPARATOR . 'Product.php';
include ADMIN_MODEL_PATH . DIRECTORY_SEPARATOR . 'Category.php';
include ADMIN_MODEL_PATH . DIRECTORY_SEPARATOR . 'ProductCategory.php';
include ADMIN_MODEL_PATH . DIRECTORY_SEPARATOR . 'ProductImage.php';
include ADMIN_MODEL_PATH . DIRECTORY_SEPARATOR . 'ProductRelated.php';
include HELPER . 'flash_message.php';
class ProductController extends BaseController
{
    public function index()
    {
        $products = new Product();
        $products = $products->getAll();

        require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'index.php';
    }
    public function create()
    {
        $categories = new Category();
        $categories = $categories->select("id,name", "categories");
        require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'create_product.php';
    }
    public function store()
    {

        if (isset($_POST['submit'])) {

            $productName = isset($_POST['name']) ? $_POST['name'] : '';
            $productDescription = isset($_POST['description']) ? $_POST['description'] : '';
            $productUnit = isset($_POST['unit']) ? $_POST['unit'] : '';
            $productContent = isset($_POST['content']) ? $_POST['content'] : '';
            $productOriginPrice = isset($_POST['origin_price']) ? $_POST['origin_price'] : '0';
            $productPrice = isset($_POST['price']) ? $_POST['price'] : '0';
            $productStockStatus = isset($_POST['stock_status']) ? $_POST['stock_status'] : '1';
            $productStatus = isset($_POST['status']) ? $_POST['status'] : '1';
            $categories = isset($_POST['categories_id']) ? $_POST['categories_id'] : '';
            $getProductImagesFromPost = isset($_POST['images']) ? explode(',', $_POST['images']) : '';
            $errors = [];

            if (empty($productOriginPrice)) {
                $productOriginPrice = 0;
            }
            if (empty($productPrice)) {
                $productPrice = 0;
            }
            if (empty($productName)) {
                $errors[] = "Nhap ten danh muc san pham";
            }

            if (count($errors) == 0) {
                //create slug by category name
                $productSlug = $this->create_slug($this->convert_vi_to_en($productName));
                $product = new Product();
                $data = [
                    $product->name => $productName,
                    $product->slug => $productSlug,
                    $product->unit => $productUnit,
                    $product->description =>  $productDescription,
                    $product->content => $productContent,
                    $product->origin_price => $productOriginPrice,
                    $product->price => $productPrice,
                    $product->stock_status => $productStockStatus,
                    $product->status => $productStatus,
                    $product->cover_image => $getProductImagesFromPost[0],
                ];

                $productInsertId = $product->addProduct($data);

                if ($productInsertId) {
                    //if categories not null
                    if (!empty($categories)) {

                        $product_categories = new ProductCategory();
                        foreach ($categories as $category_id) {
                            //insert product_id and category_id into product_categories table
                            $data = [
                                $product_categories->product_id => $productInsertId,
                                $product_categories->category_id => $category_id,
                            ];
                            $product_categories->addProductCategory($data);
                        }

                    }
                    if(!empty($getProductImagesFromPost)) {

                        $product_images = new ProductImage();
                        $position = 1;
                        foreach ($getProductImagesFromPost as $image) {
                            //insert product images into product_images table
                            $data = [
                                $product_images->product_id => $productInsertId,
                                $product_images->image => $image,
                                $product_images->position => $position,
                            ];
                            $product_images->addProductImage($data);
                            $position++;
                        }
                    }
                    session_start();
                    $_SESSION['success'] = "Them mới thành cong!";
                    header('Location:' . BASE_URL . 'admin.php?p=product&act=index');

                } else $errors[] = 'Thêm mới thất bại';
                
            }
        }
    }
    public function edit()
    {
        if (isset($_GET['id'])) {
            //get id 
            $productId = intval($_GET['id']);

            if ($productId) {

                $product = new Product();
                $product = $product->findProductById("*", "and id = $productId");
                // if product id exist 
                if ($product) {

                    $where['product_id'] =  $productId;
                    $joins = [];
                    $select = 'categories.id as category_id, categories.name as category_name';
                    $join1 = [
                        'type' => 'inner',
                        'TABLE' => 'categories',
                        'ON' => 'categories.id = product_categories.category_id',
                    ];
                    $joins[] = $join1;
                    $product_category = new ProductCategory();
                    // join product_categories to categories table to get category name
                    $productCategories = $product_category->join($select, 'product_categories', $joins, $where);

                    //get product images
                    $images = new ProductImage();
                    $images = $images->select('image','product_images','and product_id = '.$productId);
                    require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'edit_product.php';
                } else require '404.php';
            }
        }
    }
    public function update()
    {
        if (isset($_GET['id'])) {
            //get id 
            $productId = intval($_GET['id']);

            if ($productId) {

                $product = new Product();
                $product = $product->findProductById("*", "and id = $productId");
                // if product id exist 
                if ($product) {

                    $productName = isset($_POST['name']) ? $_POST['name'] : '';
                    $productDescription = isset($_POST['description']) ? $_POST['description'] : '';
                    $productUnit = isset($_POST['unit']) ? $_POST['unit'] : '';
                    $productContent = isset($_POST['content']) ? $_POST['content'] : '';
                    $productOriginPrice = isset($_POST['origin_price']) ? $_POST['origin_price'] : '0';
                    $productPrice = isset($_POST['price']) ? $_POST['price'] : '0';
                    $productStockStatus = isset($_POST['stock_status']) ? $_POST['stock_status'] : '1';
                    $productStatus = isset($_POST['status']) ? $_POST['status'] : '1';
                    $categories = isset($_POST['categories_id']) ? $_POST['categories_id'] : '';
                    $imagesFromEditProduct = isset($_POST['images']) ? explode(',', $_POST['images'] ): '';
                    $errors = [];

                    if (empty($productOriginPrice)) {
                        $productOriginPrice = 0;
                    }
                    if (empty($productPrice)) {
                        $productPrice = 0;
                    }
                    if (empty($productName)) {
                        $errors[] = "Nhap ten danh muc san pham";
                    }

                    if (count($errors) == 0) {
                        //create slug by category name
                        $productSlug = $this->create_slug($this->convert_vi_to_en($productName));
                        $product = new Product();
                        $data = [
                            $product->name => $productName,
                            $product->slug => $productSlug,
                            $product->unit => $productUnit,
                            $product->description =>  $productDescription,
                            $product->content => $productContent,
                            $product->origin_price => $productOriginPrice,
                            $product->price => $productPrice,
                            $product->stock_status => $productStockStatus,
                            $product->status => $productStatus,
                        ];

                        $productUpdate = $product->updateProduct($data, "id = $productId");
                        if ($productUpdate) {
                            //if categories not null
                            if (!empty($categories)) {

                                $product_categories = new ProductCategory();
                                foreach ($categories as $category_id) {
                                    //insert product_id and category_id into product_categories table
                                    $data = [
                                        $product_categories->product_id => $productInsertId,
                                        $product_categories->category_id => $category_id,
                                    ];
                                    $product_categories->updateProductCategory($data, "product_id = $productId");
                                }

                            }
                            //insert images
                            if (!empty($imagesFromEditProduct)) {
                              $pos = new ProductImage();
                              $pos = $pos->select('position','product_images','and product_id = '.$productId);
                              if($pos) {
                                $position = max($pos[0]);

                            } else $position = 1;
                            $product_images = new ProductImage();
                            foreach ($imagesFromEditProduct as $image) {
                            //insert product images into product_images table
                                if($position == 1) {

                                    $productUpdate = new Product();
                                    $data = [
                                        'cover_image' => $image,
                                    ];
                                    var_dump($data);
                                    $productUpdate =  $productUpdate->updateProduct($data, "id = $productId");

                                }
                                $data = [
                                   $product_images->product_id => $productId,
                                   $product_images->image => $image,
                                   $product_images->position => $position,
                               ];
                               $product_images->addProductImage($data);

                               $position++;

                           }
                       }
                       $_SESSION['success'] = "Thêm mới thành công!";
                       header('Location:' . BASE_URL . 'admin.php?p=product&act=index');
                   } else
                   $errors[] = 'Thêm mới thất bại';
               }
           }

       }
   }
}

public function delete()
{
    if (isset($_GET['id'])) {

        $productId = intval($_GET['id']);

        if ($productId) {

            $product = new Product();
            $where = "and id = $productId";
            $select = "*";
            $product = $product->findProductById($select, $where);
                        //delete product categories
            if ($product) { 

                $newProductCategory = new ProductCategory();
                $newProductCategories = $newProductCategory->select('*','product_categories', 'and product_id='.$productId);
                if ($newProductCategories) {
                    $productCategory = new ProductCategory();
                    $deleteProductCategory =  $productCategory->deleteProductCategory('product_id = '.$productId);

                }
                         //delete product images
                $productImage = new ProductImage();
                $newProductImages = $productImage ->select('*','product_images', 'and product_id='.$productId);
                if($newProductImages) {

                   $productImage = new ProductImage();
                   $deleteProductImages = $productImage->deleteProductImage('product_id = '.$productId);
               }
               $product = new Product();
               session_start();

               if ($product->deleteProduct('id='.$productId)) {

                $_SESSION['success'] = "Xóa thành công!";
            } else {
                $_SESSION['error'] = "Xóa thất bại!";
            }
            header('Location:' . BASE_URL . 'admin.php?p=product&act=index');
        } else require '404.php';
    }
}
}
public function uploadFiles()
{

    $targetFile = 'public/images/clothes/';
    echo 90;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile.$_FILES['file']['name'])) {

        echo json_encode(['filename'=> $targetFile.$_FILES['file']['name']]);
    }
}
public function createProductRelate()
{
  $products = new Product();
  $products =  $products->getAll();
  require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'create_product_related.php';
}
public function storeProductRelate()
{

    $productIds = isset($_POST['product_id'])? $_POST['product_id']:'';
    $productRelateds = isset($_POST['product_related_id'])? $_POST['product_related_id']:'';
    if(!empty($productRelateds) && !empty($productIds)) {

        foreach ($productIds as $productId) {

            foreach ($productRelateds as $productRelated) {
                $newProductRelated = new ProductRelated();
                $data = [
                    $newProductRelated->product_id => $productId,
                    $newProductRelated->product_related_id => $productRelated,
                ];
                $insertProductRelatedId = $newProductRelated->addProductRelated($data);
            }      
        }

    }
}
public function getTopSeller()
{
    $product = new Product();
    $products = $product->select('*','products','and top_seller is null');
    $product = new Product();
    $topProducts = $product->select('*','products','and top_seller = 1');
    require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'topseller_index.php';
}
public function storeTopSeller()
{
    if(isset($_POST['product'])) {

        $getProductIdFromPost = isset($_POST['product'])? implode(',', $_POST['product']): ''; 
        if(!empty($getProductIdFromPost)) { 
            $data = [ 'top_seller' => 1, ]; 
            $where = "id IN ($getProductIdFromPost)";
            $product = new Product();
            $updateProduct = $product->updateProduct($data, $where);
            if($updateProduct) { 
                $_SESSION['success'] = "Successfully!"; 
            } else $_SESSION['error'] = "Error..."; 
        } header('Location: '.BASE_URL.'admin.php?p=product&act=getTopSeller');
    }

    echo implode(',', $_POST['product']);
}

}
