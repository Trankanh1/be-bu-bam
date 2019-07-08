
<?php 
include ADMIN_MODEL_PATH . DIRECTORY_SEPARATOR . 'Blog.php';
include ADMIN_MODEL_PATH . DIRECTORY_SEPARATOR . 'BlogCategory.php';
include HELPER . 'flash_message.php';

class BlogController {

    public function index()
    {
        $blogs = new Blog();
        $blogs = $blogs->getAll();
        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.'index.php';
    }
    public function indexCate()
    {
        $blogs = new BlogCategory();
        $blogs = $blogs->getAll();
        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.'indexcate.php';
    }
    public function create()
    {
        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.'create_blog.php';
    }
    public function createBlogCategory()
    {
        require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.'create_blog_category.php';
    }
    public function store()
    {
        if (isset($_POST['submit'])) {
                $name = isset($_POST['title'])? $_POST['title'] :'';
                $content = isset($_POST['description'])? $_POST['description']:'';
                $errors = [];
            if (empty($name)) {
                $errors[] = "Nhập tiêu đề trang nội dung";
            }
            if (empty($content)) {
                $errors[] = "Nhập nội dung của trang";
            }
            if (count($errors) == 0) {
                $blog = new BlogCategory();
                $data = [
                 'name' => $name,
                 'content' => $content,	
                ];
                $blogInsertId = $blog->addBlog($data);
                if ($blogInsertId) {
                     session_start();
                     $_SESSION['success'] = "Thêm mới thành công!";
                     header('Location:' . BASE_URL . 'admin.php?p=blog&act=indexcate');
                }
            }
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $blogCateId = intval($_GET['id']);
            if ($blogCateId) {
                $blogCate = new BlogCategory();
                $select = "*";
                $blogCate = $blogCate->findBlogById("*", "and id= $blogCateId");				
                if ($blogCate) { 
                    $blog = new Blog();
                    if ($blog->deleteBlog('blog_category_id ='.$blogCateId)) {
                        $blogCate =new BlogCategory();
                        $blogCate->deleteBlogCate('id='.$blogCateId);
                        $_SESSION['success'] = "Xóa thành công!";
                    } else {
                        $_SESSION['error'] = "Xóa thất bại!";
                    }
                    header('Location:' . BASE_URL . 'admin.php?p=blog&act=indexCate');
                } else require '404.php';
            }
        } 
    }
    public function deleteBlog()
    {
        $blogId = isset($_GET['id'])?intval($_GET['id']):'';
        if (!empty($blogId)) {
            $blog = new Blog();
            $blog = $blog->findBlogById('*','and id='.$blogId);
            if ($blog){
                $where ='id='.$blogId;
                $blog = new Blog();
                $deleteBlog = $blog->deleteBlog($where);
                if ($deleteBlog){
                    $_SESSION['success'] = "Xóa thành công!";
                } else $_SESSION['error'] = "Xóa thất bại!";
            }
            header('Location:'.BASE_URL.'/admin.php?p=blog&act=index');
        }
    }
    public function storeBlog()
    {
        if (isset($_POST['submit'])) {

            $name = isset($_POST['title'])? $_POST['title'] :'';
            $content = isset($_POST['description'])? $_POST['description']:'';
            $fileName = $_FILES['img']['name'];
            $tarFile = 'public/images/';
            if ($fileName) {
                move_uploaded_file($_FILES['img']['tmp_name'],  $tarFile.$fileName);
            }
            $errors = [];
            if (empty($name)) {
                $errors[] = "Nhập tiêu đề trang nội dung";
            }
            if (empty($content)) {
                $errors[] = "Nhập nội dung của trang";
            }

            if (count($errors) == 0) {
                $blog = new Blog();
                $data = [
                 'name' => $name,
                 'content' => $content,
                 'cover_image'=>  $tarFile.$fileName ,
                ];
                $blogInsertId = $blog->addBlog($data);
                if ($blogInsertId) {
                   $_SESSION['success'] = "Thêm mới thành công!";
                   header('Location:' . BASE_URL . 'admin.php?p=blog&act=index');
                }
            }
        }
    }
    public function editcate()
    {
        if (isset($_GET['id'])) {
            $blogcateId = intval($_GET['id']);
            if ($blogcateId) {
                $blogcate = new BlogCategory();
                $blogcate = $blogcate->findBlogById("*", "and id = $blogcateId");
                if ($blogcate) {
                    require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'blog' . DIRECTORY_SEPARATOR . 'edit_cate.php';
                } else require '404.php';
            }
        }
    }
    public function updatecate()
    {
        if (isset($_GET['id'])) {
              //get id 
            $blogcateId = intval($_GET['id']);
            if ($blogcateId) {
                $blogcate = new BlogCategory();
                $blogcate= $blogcate->findBlogById("*", "and id= $blogcateId");
                // if product id exist 
                if ($blogcate) {
                    $name = isset($_POST['title'])? $_POST['title'] :'';
                    $content = isset($_POST['description'])? $_POST['description']:'';
                    $errors = [];
                    if (!$name)
                    {
                        $errors[] = "Phai nhap ten";
                    }
                    if (!$content)
                    {
                        $errors[] = "Phai nhap nội dung";
                    }
                    if (count($errors) == 0) {
                        $blogcate = new BlogCategory();
                        $data = [
                          'name' => $name,
                          'content' => $content,
                        ];
                        $blogcateInsertId = $blogcate->updateBlog($data, " id = $blogcateId");
                        if ($blogcateInsertId) {
                         
                            $_SESSION['success'] = "Sửa thành công!";
                            header('Location:' . BASE_URL . 'admin.php?p=blog&act=indexcate	');
                        }
                    } else
                        $errors[] = 'Sửa thất bại';
                }
            }
        }
    }
    public function edit()
    {
        if (isset($_GET['id'])) {
            $blogId = intval($_GET['id']);
            if ($blogId) {
                $blog = new Blog();
                $blog = $blog->findBlogById("*", "and id = $blogId");
                  if ($blog) {
                      require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'blog' . DIRECTORY_SEPARATOR . 'edit.php';
                  } else require '404.php';
            }
        }
    }
    public function update()
    {
        if (isset($_GET['id'])) {
          $blogId = intval($_GET['id']);
          if ($blogId) {
              $blog = new Blog();
              $blog= $blog->findBlogById("*", "and id= $blogId");
              if ($blog) {
                   $name = isset($_POST['title'])? $_POST['title'] :'';
                   $content = isset($_POST['description'])? $_POST['description']:'';
                   $cover_img = $_FILES['img']['name'];
                  if (move_uploaded_file($_FILES['img']['tmp_name'], 'public/admin/images/'.$cover_img)){  
                  }
                   $errors = [];
                  if(!$name)
                  {
                      $errors[] = "Phai nhap ten";
                  }
                  if (!$content)
                  {
                      $errors[] = "Phai nhap nội dung";
                  }
                  if (count($errors) == 0) {
                      $blog = new Blog();
                      $data = [
                        'name' => $name,
                        'content' => $content,
                        'cover_image'=> $cover_img,
                      ];
                      $blogInsertId = $blog->updateBlog($data, " id = $blogId");
                      if ($blogInsertId) {
                     
                          $_SESSION['success'] = "Sửa thành công!";
                          header('Location:' . BASE_URL . 'admin.php?p=blog&act=index	');
                      }
                  } else
                      $errors[] = 'Sửa thất bại';
              }
          
          }

        }
    }
}