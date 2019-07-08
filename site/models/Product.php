<?php

class Product extends BaseModel {

    protected $table = 'products';  

    public  function addProduct($data)
    { 
        return parent::addItem($this->table,$data);
    }
    public  function getProducts($orderBy = '',$limit = '')
    {
        return parent::all($this->table, $orderBy, $limit);
    }
    public function getProductByCategory($select, $joins, $where, $limit = '')
    {
        if(!empty($limit)) $limit = 'LIMIT '.$limit;
        return parent::getDataByCategory($select, $this->table, $joins, $where, $limit);
    }
    public function getDetail($where)
    {
        return parent::itemDetail($where, $this->table);
    }
    public  function getImages()
    {
        return parent::allImages('product_images');
    }
    public function findProductById($select, $where)
    {
        return parent::findOne($select, $this->table,$where);
    }
}