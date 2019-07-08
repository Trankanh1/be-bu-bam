<?php
require MODEL_PATH . 'Blog.php';
session_start();

class BlogController {
	public function index()
	{
		$blogs = new Blog();
		$blogs = $blogs->getAll();

		require VIEW_PATH.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.'index.php';
	}  
	public function back()
	{
		header('Location: '.BASE_URL.'?p=blog');

	}
	public function blogDetail()
	{
		$blogSlug = isset($_GET['sl'])? $_GET['sl']:'';
		if (!empty($blogSlug)) {
			$blog = new Blog();
			$blog = $blog->select('*','blogs',' and slug="'.$blogSlug.'"');

			$blogRelateds = new Blog();
			$blogRelateds = $blogRelateds->getAll();
			if($blog) {
				require VIEW_PATH.DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR.'detail.php';
			}
		}
	}
}