<?php
class ProductReview extends BaseModel {

    public $product_id = 'product_id';
    public $customer_id = 'customer_id';
    public $customer_name = 'customer_name';
    public $customer_email = 'customer_email';
    public $comment = 'comment';
    public $status = 'status';
    public $created_at = 'created_at';
    public $parent_id = 'parent_id';
    protected $table = "product_reviews";

    public function getProductRelated()
    {
        return parent::all($this->table);
    }
    public function addProductReview($data)
    {
        return parent::addItem($this->table, $data);
    }
    public function deleteProductCategory($where)
    {
        return parent::deleteData('product_categories', $where);
    }
    public function updateProductCategory($data, $where)
    {
        return parent::updateData($this->table, $data, $where);
    }
}