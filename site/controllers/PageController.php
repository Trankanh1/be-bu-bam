<?php
require MODEL_PATH . 'Product.php';
require MODEL_PATH . 'Page.php';
require MODEL_PATH . 'Blog.php';
session_start();

class PageController {
	public function index()
	{
		$blogs = new Blog();
		$blogs = $blogs->getAll();
		require VIEW_PATH.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.'index.php';
	}  
	public function pageDetail()
	{
		$pageSlug = isset($_GET['sl'])? $_GET['sl']:'';
		if (!empty($pageSlug)) {
			$product = new Product();
			$limitTopSeller = 'LIMIT 8';
			$topProducts = $product->select('*','products','and top_seller = 1', $limitTopSeller);
			$page = new Page();
			$page = $page->select('*','pages',' and slug="'.$pageSlug.'"');
			if($page) {
				require VIEW_PATH.DIRECTORY_SEPARATOR.'page'.DIRECTORY_SEPARATOR.'detail.php';
			}
		}
	}
}