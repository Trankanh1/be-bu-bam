<?php
require MODEL_PATH . 'Product.php';
require MODEL_PATH . 'Category.php';

session_start();

class HomeController {

	public function index()
	{
		$select = 'products.id as id, products.name as name, products.slug as slug, products.description as description, origin_price, price, products.cover_image as cover_image';
		$join1 = [
			'TYPE' => 'INNER',
			'TABLE' => 'product_categories',
			'ON' => 'products.id = product_categories.product_id',
		];
		$join2 = [
			'TYPE' => 'INNER',
			'TABLE' => 'categories',
			'ON' => 'product_categories.category_id = categories.id',
		];
		$joins[] = $join1;
		$joins[] = $join2;
		$where = [
			'categories.parent_id' => 19,
		];
		$limit = 8;

		$products = new Product();
		$foods = $products->getProductByCategory($select, $joins, $where, $limit);
		//get clothes
		$where = [
			'categories.parent_id' => 20,
		];
		$limit = 8;
		$products = new Product();
		$clothes = $products->getProductByCategory($select, $joins, $where, $limit);
		//get toys
		$where = [
			'categories.parent_id' => 22,
		];
		$limit = 8;
		$products = new Product();
		$toys = $products->getProductByCategory($select, $joins, $where, $limit);
		//get toiletries
		$where = [
			'categories.parent_id' => 21,
		];
		$limit = 8;
		$products = new Product();
		$toiletries = $products->getProductByCategory($select, $joins, $where, $limit);
		//get list categories of food
		$listFoodCate = new Category();
		$listFoodCate = $listFoodCate->select('*','categories','and parent_id = 19','LIMIT 7');
		

		require VIEW_PATH.DIRECTORY_SEPARATOR.'home'.DIRECTORY_SEPARATOR.'index.php';
	}  
}