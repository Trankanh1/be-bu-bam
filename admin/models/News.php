<?php
Class Blog extends BaseModel {

	public $title = 'title';
	public $content = 'content';
	protected $table = 'news';
	public function getAll()
	{
		return parent::all($this->table);
	}
	public function addNews($data)
	{
		return parent::addItem($this->table,$data );
	}
}

?>
