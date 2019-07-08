<?php
Class Blog extends BaseModel {

	public $title = 'name';
	public $content = 'content';
	protected $table = 'blogs';
	
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
        return parent::findOne($select, 'blogs',$where);
    }
    public function updateBlog($data, $id)
    {
        return parent::updateData('blogs',$data,$id);
    }
    public function deleteBlog($where)
    {
        return parent::deleteData('blogs', $where);
    }

}
?>
