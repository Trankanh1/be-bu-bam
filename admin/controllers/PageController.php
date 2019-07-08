
<?php 
include ADMIN_MODEL_PATH . DIRECTORY_SEPARATOR . 'Page.php';
include HELPER . 'flash_message.php';

class PageController {

	public function index()
	{
		$pages = new Page();
		$pages = $pages->getAll();
		require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'page'.DIRECTORY_SEPARATOR.'index.php';
	}
	public function create()
	{
		require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'page'.DIRECTORY_SEPARATOR.'create.php';
	}
	public function store()
	{
		if(isset($_POST['submit'])) {

			$name = isset($_POST['name'])? $_POST['name'] :'';
			$content = isset($_POST['content'])? $_POST['content']:'';
			$errors = [];
			if(empty($name)) {
				$errors[] = "Nhập tiêu đề trang nội dung";
			}
			if(empty($content)) {
				$errors[] = "Nhập nội dung của trang";
			}
			if(count($errors) == 0) {
				$page = new Page();
				$data = [
					$page->name => $name,
					$page->content => $content,
				];

				$pageInsertId = $page->addPage($data);
				if($pageInsertId) {
					session_start();
					$_SESSION['success'] = "Thêm mới thành công!";
					header('Location:' . BASE_URL . 'admin.php?p=page&act=index');
				}
			}
		}
	}
	public function pageDetail()
	{
		if (isset($_GET['id'])) {
            //get id 

			$pageId = intval($_GET['id']);
			if ($pageId) {
				$page = new Page();
				$page = $page->findPageById("*", "and id = $pageId");

                // if page exist 
				if ($page) {
					require ADMIN_VIEW_PATH . DIRECTORY_SEPARATOR . 'page' . DIRECTORY_SEPARATOR . 'detail.php';
				} else require '404.php';
			}
		}
	}
	public function updatePage()
	{
		if(isset($_POST['edit'])) {
			$pageId = isset($_GET['id'])?intval($_GET['id']):'';
			if(!empty($pageId)) {
				$page = new Page();
				$page = $page->findPageById('*','and id='.$pageId);
				if($page){
					$name = isset($_POST['name'])? $_POST['name']: '';
					$content = isset($_POST['content'])? $_POST['content']: '';
					$where = 'id = '.$pageId;
					$data = [
						'name' => $name,
						'content' => $content,
					];
					$page = new Page();
					$updatePage = $page->updatePage($data, $where);
					if($updatePage){

					}
				}
				header('Location:'.BASE_URL.'/admin.php?p=page&act=index');
			}

		}
	}
	public function deletePage()
	{
		$pageId = isset($_GET['id'])?intval($_GET['id']):'';
		if(!empty($pageId)) {
			$page = new Page();
			$page = $page->findPageById('*','and id='.$pageId);
			if($page){
				$where ='id='.$pageId;
				$page = new Page();
				$deletePage = $page->deletePage($where);
				if($deletePage){
					$_SESSION['success'] = "Xóa thành công!";
				} else $_SESSION['error'] = "Xóa thất bại!";

			}
			
			header('Location:'.BASE_URL.'/admin.php?p=page&act=index');
		}

		
	}
}



