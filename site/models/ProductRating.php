<?php
class ProductRating extends BaseModel {

    public $product_id = 'product_id';
    public $rating = 'rating';
    protected $table = "product_ratings";

    public function getProductRelated()
    {
        return parent::all($this->table);
    }
    public function addProductRating($data)
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