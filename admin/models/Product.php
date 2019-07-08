<?php

class Product extends BaseModel {

    public $name = "name";
    public $slug = "slug";
    public $cover_image = 'cover_image';
    public $description = "description";
    public $unit = "unit";
    public $content = "content";
    public $origin_price = "origin_price";
    public $price = "price";
    public $stock_status = "stock_status";
    public $status = "status";
    public $meta_keyword = "meta_keyword";
    public $meta_title = "meta_title";
    public $meta_description = "meta_description";
    public $created_at = "created_at";
    public $updated_at = "updated_at";

    protected $table = 'products';  

    public  function addProduct($data)
    { 
        return parent::addItem($this->table,$data);
    }
    public  function getAll()
    {
        return parent::all($this->table);
    }
    public function getProductByCategory($select, $joins, $where)
    {
        return parent::getDataByCategory($select, $this->table, $joins, $where);
    }
    public  function getImages()
    {
        return parent::allImages('product_images');
    }
    public function updateProduct($data, $where)
    {
        return parent::updateData($this->table,$data,$where);
    }
    public function findProductById($select, $where)
    {
        return parent::findOne($select, $this->table,$where);
    }
    public function deleteProduct($where)
    {
        return parent::deleteData($this->table, $where);
    }
}