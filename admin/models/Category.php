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
        return parent::addItem('categories',$data);
    }
    public  function getAll()
    {
        return parent::all('categories');
    }
    public function updateCategory($data, $id)
    {
      
        return parent::updateData('categories',$data,$id);
    }
    public function findCategoryById($select, $where)
    {
        return parent::findOne($select, 'categories',$where);
    }
    public function deleteCategory($where)
    {
        return parent::deleteData('categories', $where);
    }

    // public function findOne($field,$where)
    // {
    //     return parent::findOne($field, 'categories', $where);
    // }

}