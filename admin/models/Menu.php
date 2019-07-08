<?php

class Menu extends BaseModel {

	protected $table = 'menu';

	public function save($data)
	{
		return parent::addItem($this->table, $data);
	}
	public function getMenu($where = '')
	{
		return parent::all($this->table,$where);
	}
	  public function findMenuById($id)
    {
    	return parent::findOne('*', $this->table, 'and id ='.$id);
    }
      public function deleteMenu($where)
    {
        return parent::deleteData($this->table, $where);
    }
}

