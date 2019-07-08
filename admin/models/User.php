<?php
class User extends BaseModel {

    public $name = 'name';
    public $email = 'email';
    public $passwrod = 'password';
    public $level ='level';
    public $anh ='anh';
    public $gender ='gender';
    protected $table = "users";

    public function addUser($data)
    {
        return parent::addItem($this->table, $data);
    }
    public function getAll()
    {
        return parent::all($this->table);
    }
    public function findUserById($select, $where)
    {
        return parent::findOne($select, $this->table,$where);
    }
    public function updateUser($data, $id)
    {
        return parent::updateData($this->table,$data,$id);
    }
    public function deleteUser($where)
    {
        return parent::deleteData($this->table, $where);
    }

}