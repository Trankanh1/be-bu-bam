<?php 
include ADMIN_CONTROLLER_PATH . DIRECTORY_SEPARATOR . 'BaseController.php';
include ADMIN_MODEL_PATH. DIRECTORY_SEPARATOR.'Menu.php';
include ADMIN_MODEL_PATH. DIRECTORY_SEPARATOR.'Category.php';
include ADMIN_MODEL_PATH. DIRECTORY_SEPARATOR.'Product.php';
include ADMIN_MODEL_PATH. DIRECTORY_SEPARATOR.'Page.php';
include ADMIN_MODEL_PATH. DIRECTORY_SEPARATOR.'Blog.php';
/**
 * 
 */
class MenuController  extends BaseController
{ 
	
	public function index() 
	{
		$menu = new Menu();
		$menu= $menu->getMenu();
		require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'menu'.DIRECTORY_SEPARATOR.'index.php';
	}
	public function create() 
	{

		require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'menu'.DIRECTORY_SEPARATOR.'create_menu.php';
	} 
	public function store()
	{
		var_dump($_POST['links']);
		exit;
		if (isset($_POST['submit'])) {
			$menuName = isset($_POST['name']) ? $_POST['name'] : '';
			$parentId = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
			$slug =  $this->create_slug($this->convert_vi_to_en($menuName));
			foreach ($menuName as $value) {
				$data = [
					'name' => $value,
				];
				if(!empty($parentId)) {

				}
				$data['parent_id'] = $parentId;
				$menu = new Menu();
				$insertMenu = $menu->save($data);
			}
			if($insertMenu) {
				header('Location:'.BASE_URL.'admin.php?p=menu&act=index');
			}
		}
	}
	public function createSubmenu()
	{
		require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'menu'.DIRECTORY_SEPARATOR.'create_menu.php';
	}
	public function searchCategory()
	{
		$keySearch = isset($_GET['key'])? $_GET['key']: '';
		
		if($keySearch){
			if($keySearch == 'home') {
				$data['key'] = $keySearch;
				print_r(json_encode($data));

			} else {
				$model = ucfirst($keySearch);
				$data = new $model();
				$data = $data->getAll();
				$data['key'] = $keySearch;
				print_r(json_encode($data));
			}
		}	
	}
	public function editMenu()
	{
		if(isset($_GET['sub']) && $_GET['sub'] == true ) {
			if(isset($_GET['id']) && !empty($_GET['id'])) {
				$menu = new Menu();
				$menu= $menu->getMenu('and parent_id ='.$_GET['id']);
				require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'menu'.DIRECTORY_SEPARATOR.'edit_main_menu.php';
			}
			
		} else {
			$menu = new Menu();
			$menu= $menu->getMenu('and parent_id is null');
			require ADMIN_VIEW_PATH.DIRECTORY_SEPARATOR.'menu'.DIRECTORY_SEPARATOR.'edit_main_menu.php';
		}
	}

	public function updateMenu()
	{

	}
	public function delete()
	{

		$returnUrl = $_SERVER['HTTP_REFERER'];
		$menuId = isset($_GET['id'])? intval($_GET['id']) :'';
		if (!empty($menuId)) {
			$findMenu = new Menu();
			$findMenu = $findMenu->findMenuById($menuId);
			if ($findMenu) {
				$delMenu = new Menu();
				$delMenu = $delMenu->deleteMenu('id='.$menuId);
				if ($delMenu) {

					header('Location:'.$returnUrl);
				}
			}
		}
	}

}