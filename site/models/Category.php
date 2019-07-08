<?php

class Category extends BaseModel {

    public $name = "name";
    public $slug = "slug";
    public $description = "description";
    public $content = "content";
    public $parent_id = "parent_id";
    public $status = "status";
    public $meta_keyword = "meta_keyword";
    public $meta_title = "meta_title";
    public $meta_description = "meta_description";
    protected $table = "categories";  

    public  function addCategory($data)
    { 
        return parent::addItem($this->table,$data);
    }
    public  function getAll()
    {
        return parent::all($this->table);
    }
    public function updateCategory($data, $id)
    {
        return parent::updateData($this->table,$data,$id);
    }
    public function findCategoryById($select, $where)
    {
        return parent::findOne($select, $this->table,$where);
    }
}