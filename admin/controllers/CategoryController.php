<?php 
include ADMIN_CONTROLLER_PATH . DIRECTORY_SEPARATOR . 'BaseController.php';
include ADMIN_MODEL_PATH. DIRECTORY_SEPARATOR.'Category.php';
include ADMIN_MODEL_PATH. DIRECTORY_SEPARATOR.'ProductCategory.php';
include HELPER . 'flash_message.php';

class CategoryController extends BaseController {

    public function index()
    {
        $products = new Category();
        $products = $products->getAll();
        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'category'.DIRECTORY_SEPARATOR.'index.php';
    }
    public function create()
    {
        $cateogories = new Category();
        $cateogories  = $cateogories ->getAll();
        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'category'.DIRECTORY_SEPARATOR.'create_category.php';
    }
    public function store()
    {
        if (isset($_POST['submit'])) {
            $categoryName = isset($_POST['name']) ? $_POST['name'] : '';
            $categoryDescription = isset($_POST['description']) ? $_POST['description'] : '';
            // $categoryContent = isset($_POST['content']) ? $_POST['content'] : '';
            $categoryParent = isset($_POST['parent_id']) ? $_POST['parent_id'] : '';
            $status =  isset($_POST['status']) ? $_POST['status'] : '';
            $errors = [];
            if (empty($categoryName)) {
                $errors[] = "Nhap ten danh muc san pham";
            }
            if (count($errors) == 0) {
                $categorySlug = $this->create_slug($this->convert_vi_to_en($categoryName));
                $category = new Category();
                $data = [
                    $category->name => $categoryName,
                    $category->slug =>  $categorySlug,
                    $category->description => $categoryDescription,
                    $category->content => $categoryContent,
                    // $category->parent_id => $categoryParent,
                ];
                if (!empty($categoryParent)) {
                    $data[$category->parent_id] = $categoryParent;
                }
                $categoryInsertId = $category->addCategory($data);
                if ($category) {
                    $category = new Category();
                    $category = $category->select("content","categories","id=9");
                    $_SESSION['success'] = "Them moi thanh cong!";
                    header('Location:' . BASE_URL . '?p=category&act=index');
                } else
                echo "Không thể thêm mới";
            }
        }
    }
    public function edit()
    {
        $categoryId = isset($_GET['id'])?$_GET['id']:"";
        if (!empty($categoryId)) {
           $category = new Category();
           $category= $category->findCategoryById("*", "and id = $categoryId");
           require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'category'.DIRECTORY_SEPARATOR.'edit_category.php';
       }
   }
   public function updatecateogory()
   {
        if (isset($_POST['edit'])) {
            $cateogoryId = isset($_GET['id'])?intval($_GET['id']):'';
            if (!empty($cateogoryId)) {
                $cateogory = new cateogory();
                $cateogory = $cateogory->findcateogoryById('*','and id='.$cateogoryId);
                if ($cateogory) {
                    $name = isset($_POST['name'])? $_POST['name']: '';
                    $content = isset($_POST['content'])? $_POST['content']: '';
                    $where = 'id = '.$cateogoryId;
                    $data = [
                        'name' => $name,
                        'content' => $content,
                    ];
                    $cateogory = new cateogory();
                    $updatecateogory = $cateogory->updatecateogory($data, $where);
                    if($updatecateogory) {
                        $_SESSION['success'] = "Update thành công!";
                    } else $_SESSION['error'] = "Update thất bại!";
                }
                header('Location:'.BASE_URL.'/admin.php?p=cateogory&act=index');
            }

        }
    }
    public function deleteCate()
    {
        $cateId = isset($_GET['id'])?intval($_GET['id']):'';
        if (!empty($cateId)) {
            $category = new Category();
            $cate = $category->findCategoryById('*','and id='.$cateId);
            if ($cate) {
                $where ='id='.$cateId;
                $cate = new Category();
                $deleteCate = $cate->deleteCategory($where);
                $findProductCate = new ProductCategory();
                $findProductCate = $findProductCate->deleteProductCategory('category_id ='.$cateId);
                if ($deleteCate) {
                   $_SESSION['success'] = "Xóa thành công!";
               } else $_SESSION['error'] = "Xóa thất bại!";
           }
           header('Location:'.BASE_URL.'/admin.php?p=category&act=index');
       }

    }

}