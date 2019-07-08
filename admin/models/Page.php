<?php 

Class Page extends BaseModel {

	public $name = 'name';
	public $content = 'content';
	protected $table = 'pages';
	public function getAll()
	{
		return parent::all($this->table);
	}
	public function addPage($data)
	{
		return parent::addItem($this->table,$data );
	}
	public function findPageById($select,$where)
	{
		return parent::findOne($select, $this->table, $where);
	}
	public function updatePage($data, $id) 
	{
		return parent::updateData($this->table, $data, $id);
	}
	public function deletePage($where)
	{
		return parent::deleteData($this->table, $where);
	}
}