<?php
class ProductRelated extends BaseModel {

    public $product_id = 'product_id';
    public $product_related_id = 'product_related_id';
    protected $table = "product_related";

    public function getProductRelated()
    {
        return parent::all($this->table);
    }
    public function addProductRelated($data)
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