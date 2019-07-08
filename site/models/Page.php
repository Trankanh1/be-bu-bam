<?php
Class Page extends BaseModel {

	public $title = 'name';
	public $content = 'content';
	protected $table = 'blogs';
	
	public function getAll()
	{
		return parent::all($this->table);
	}
	public function findBlogById($select, $where)
    {
        return parent::findOne($select, 'blogs',$where);
    }
 
}
?>