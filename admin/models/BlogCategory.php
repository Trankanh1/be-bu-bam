<?php
Class BlogCategory extends BaseModel {
    public $title = 'name';
    public $content = 'content';
    protected $table = 'blog_categories';
    public function getAll()
    {
        return parent::all($this->table);
    }
    public function addBlog($data)
    {
        return parent::addItem($this->table,$data );
    }
    public function findBlogById($select, $where)
    {
        return parent::findOne($select, 'blog_categories',$where);
    }
    public function updateBlog($data, $id)
    {
        return parent::updateData('blog_categories',$data,$id);
    }
    public function deleteBlogCate($where)
    {
        return parent::deleteData('blog_categories', $where);
    }
}
?>