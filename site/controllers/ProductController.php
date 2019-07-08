<?php
require MODEL_PATH . 'Product.php';
require MODEL_PATH . 'Category.php';
require MODEL_PATH . 'Pagination.php';
require MODEL_PATH . 'ProductReview.php';
require MODEL_PATH . 'ProductImage.php';
require MODEL_PATH . 'ProductRelated.php';
require MODEL_PATH . 'ProductRating.php';
session_start();

class ProductController extends Product
{
	public  function index()
	{  
		//get top seller products
		$product = new Product();
		$limitTopSeller = 'LIMIT 8';
		$topProducts = $product->select('*','products','and top_seller = 1', $limitTopSeller);
		//get all products
		$product = new Product();
		$getAllproducts =  $product->select('*','products','and status = 1');
		
		$limit = 20;
		$totalPage = ceil(count($getAllproducts)/$limit);
		$currentPage = isset($_GET['page'])? (int)$_GET['page'] :'';
		if($currentPage) {
			$offset = ($currentPage - 1)*$limit +1;
		} else $offset = 1;
		$totalFiveStar = new ProductRating();
		$totalFiveStar = count($totalFiveStar->select('*','product_ratings','and rating = 5'));
		$totalFourStar = new ProductRating();
		$totalFourStar = count($totalFourStar->select('*','product_ratings','and rating = 4'));
		$totalThreeStar = new ProductRating();
		$totalThreeStar = count($totalThreeStar->select('*','product_ratings','and rating = 3'));
		$totalTwoStar = new ProductRating();
		$totalTwoStar = count($totalTwoStar->select('*','product_ratings','and rating = 2'));
		$totalOneStar = new ProductRating();
		$totalOneStar = count($totalOneStar->select('*','product_ratings','and rating = 1'));
		$paginate = new Pagination();
		$getLimitProducts = $paginate->paginate('*','products', $limit, $offset);
		$products= $getLimitProducts ;

		require VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'index.php';
	}
	public function setViewedProduct($product)
	{
			// setcookie('ViewdProducts','');
		// exit;
		if(!isset($_COOKIE['ViewdProducts'])) {
			$newProduct[] = $product;
			setcookie("ViewdProducts",json_encode($newProduct), time()+(86400*2));
		} else {
			$getData = json_decode($_COOKIE['ViewdProducts'],true);
			$check = false;
			foreach ($getData as $value) {
				if($value['id'] == $product['id']) {
					$check = true;
					break;
				}
			} 
			if($check == false) {
				array_push($getData, $product);

				setcookie("ViewdProducts",json_encode($getData), time()+ (86400*2));
			}
		}
		
	}
	public function productDetail()
	{

		$productSlug = isset($_GET['sl'])? $_GET['sl']: '' ;
		if ($productSlug !== '') {
			$data =  explode('-', $productSlug);
			$productId =  $data[count($data)-1];
			$productSlug = rtrim(str_replace('-'.$productId,'',$productSlug));
			$where = 'and slug = "'.$productSlug.'"';
			$product = $this->getDetail($where);
			if($product) {
				$data = [
					'id' => $product[0]['id'],
					'slug' => $product[0]['slug'],
					'cover_image' => $product[0]['cover_image'],
					'price' =>$product[0]['price'],
					'origin_price' =>$product[0]['origin_price'],
					'name' => $product[0]['name'],
				];
				$this->setViewedProduct($data);
				$where = 'and product_id ='.$productId;
				$findProductRelateds = new ProductRelated();
				$findProductRelateds = $findProductRelateds->select('product_related_id','product_related','and product_id ='.$productId);
				if($findProductRelateds) {

					foreach ($findProductRelateds as $findProductRelateId) {
						$productRelateId[] = $findProductRelateId['product_related_id'];
					};
					$data = implode(',',$productRelateId);
        			//get product related 
					$productRelateds= new Product();
					$productRelateds = $productRelateds->select('*','products','and id IN('.$data.')');
				}
        		//get product review
				$findReview = new ProductReview();
				$reviews = $findReview->select('*','product_reviews', 'and product_id='.$productId);
				//get viewed product
				if(isset($_COOKIE['ViewdProducts'])) $viewedProducts = json_decode($_COOKIE['ViewdProducts'], true);
				//get total rating 
				$fiveStarRating = new ProductRating();
				$fiveStarRating = $fiveStarRating->select('*','product_ratings','and product_id ='.$productId.' and rating =5');
				$totalfiveStarRating = count($fiveStarRating);
			}
		}
        //get product images
		$productImages = new productImage();
		$productImages = $productImages->findImagesByProductId($where);
		require VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'product_detail.php';
	}
	public function postProductReview()
	{			
		$customerName = isset($_POST['customer_name'])? $_POST['customer_name']:'';
		$customerEmail = isset($_POST['customer_email'])? $_POST['customer_email']:'';
		$comment = isset($_POST['comment'])? $_POST['comment']:'';
		$productId = isset($_GET['id'])? $_GET['id']:'';
		$parentCmtId = isset($_POST['parent_id'])? $_POST['parent_id']:'';
		$rating = isset($_POST['rating'])? $_POST['rating']:'';
		if(!empty($comment) && $productId && !empty($customerName) && !empty($customerEmail)) {

			$now = new DateTime();
			$CURRENT_TIME = $now->format('Y-m-d H:i:s');
			$productReview = new ProductReview();
			$data = [
				$productReview->customer_name => $customerName,
				$productReview->customer_email => $customerEmail,
				$productReview->comment => $comment,
				$productReview->product_id => $productId,
				$productReview->created_at => $CURRENT_TIME,
			];
			if(!empty($parentCmtId)) {
				$data[$productReview->parent_id] = $parentCmtId ;
				}//insert product review
				$productReviewInsertId =  $productReview->addProductReview($data);
				//insert product rating
				if(is_numeric($rating)) {
					$productRating = new ProductRating();
					$data = [
						$productRating->product_id => $productId,
						$productRating->rating => $rating,
					];
					$productRatingInsertId = $productRating->addProductRating($data);
				}
				if($productReviewInsertId) {
					$returnUrl = $_SERVER['HTTP_REFERER'];
					echo "<script>alert('Bình luận thành công')</script>";
					header('Location:'.$returnUrl);
				}
			} else echo "Thông tin bình luận chưa đầy đủ";

		}
		public function search()
		{
			$product = new Product();
			$limit = 'LIMIT 8';
			$topProducts = $product->select('*','products','and top_seller = 1',$limit);

			if (isset($_REQUEST['submit'])) {
				$search = addslashes($_REQUEST['search']);
				if (empty($search)) {
					echo "Yeu cau nhap du lieu vao o trong";
				} else {
					$products = new Product();
					$products = $products->select("*", "products","and name like '%$search%'");	
					require VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'index.php';
				}

			}

		}
		public function searchByCategories()
		{
			$slug = isset($_GET['sl'])? trim($_GET['sl']): '';
			if($slug) {
				$findCate = new Category();
				$where = [
					'slug' => $slug,
				];
				$findCate = $findCate->findCategoryById('id',"and slug=$slug");
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
				if(isset($_GET['c']) && $_GET['c'] == 'all')
					$where = [
						'categories.parent_id' => $findCate[0]['id'],
					];
					else $where = [
						'categories.id' => $findCate[0]['id'],
					];

					$products = new Product();
					$products = $products->getProductByCategory($select, $joins, $where);
					require VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'index.php';
				}

			}

			public function searchName()
			{
				$key = isset($_POST['key']) ?explode('-', $_POST['key']):'';
				if (empty($key )) {
					echo "Yeu cau chọn du lieu ";
				} else {
					$products = new Product();
					$products = $products->select("*", "products",' order by '.$key[0].' '.$key[1]);
					if ($products) {
						require VIEW_PATH . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR . 'index.php';
					}
					else echo "khong có danh mục này";
				}
			}
			public function asynSearch()
			{
				$rating = isset($_GET['rating'])? $_GET['rating']:'';
				$firstPrice = isset($_GET['first_price'])? $_GET['first_price']:'';
				$secondPrice = isset($_GET['second_price'])? $_GET['second_price']:'';

				if($rating) {

					$productRating = new Product();
					$productRatings = $productRating->select('product_id','product_ratings','and rating ='.$rating);

					if($productRatings) {
						foreach ($productRatings as $productRating) {
							$productRatingId[] = $productRating['product_id'];
						};
						$data = implode(',',$productRatingId);
						$where = 'and id IN('.$data.')';
					}

				}
				if( $secondPrice) {
					$where = 'and price BETWEEN '.$_GET['first_price'].' AND '.$_GET['second_price'];
				}
				$product = new Product();
				$products = $product->select('*','products',$where);
				if(count($products) > 0) {
					foreach ($products as $product) {

						echo '<div class="col-md-3 product-men">
						<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
						<img height="160px" width="160px" src="'.$product['cover_image'].'" alt="">
						<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
						<a href="?p=product&act=productDetail&sl='.$product['slug'].'-'. $product['id'].'" class="link-product-add-cart">Chi Tiết</a>
						</div>
						</div>
						<span class="product-new-top">Mới</span>
						</div>
						<div class="item-info-product ">
						<h4 >
						<a href="#">'.substr($product['name'],0,30).'</a>
						</h4>
						<div class="info-product-price">
						<span class="item_price">'.number_format($product['price']).'</span>

						<del>'.number_format($product['origin_price']).'</del>'.'

						</div>
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="?p=cart&act=add" method="post">
						<fieldset>

						<input type="hidden" name="slug" value="'.$product['slug'].'" />
						<input type="hidden" name="quantity" value="1" />
						<input type="hidden" name="add" value="1" />
						<input type="hidden" name="business" value=" " />
						<input type="hidden" name="name"
						value="'.$product['name'].'" />
						<input type="hidden" name="origin_price"
						value="'.number_format($product['origin_price']).'" />
						<input type="hidden" name="price"
						value="'.number_format($product['price']).'" />
						<input type="hidden" name="currency_code" value="VND" />
						<input type="hidden" name="cover_image"
						value="'. $product['cover_image'].'" />
						<input type="hidden" name="id"
						value="'.$product['id'].'" />
						<input type="hidden" name="cover_image"
						value="public/images/clothes/0001aothun.jpg" />
						<input type="submit" name="add" value="Thêm vào giỏ hàng"
						class="buttona " />
						</fieldset>
						</form> 
						</div>

						</div>
						</div>
						</div>';
					}
				}
			}
		}
