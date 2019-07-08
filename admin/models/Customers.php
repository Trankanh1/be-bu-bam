<?php 
class Customers extends  BaseModel {

    public $name = 'name';
    public $phone = 'phone';
    public $birthday = 'birthday';
    public $address ='address';
    public $gender ='gender';
    protected $table = "customers";

    public function getCustomers()
    {
        return parent::all($this->table);
    }
    public function addCustomers($data)
    {
        return parent::addItem($this->table, $data);
    }
    public function getAll()
    {
        return parent::all($this->table);
    }
    public function findCustomerById($select, $where)
    {
        return parent::findOne($select, $this->table,$where);
    }
    public function updateCustomer($data, $id)
    {
        return parent::updateData($this->table,$data,$id);
    }
    public function deleteCustomer($where)
    {
        return parent::deleteData($this->table, $where);
    }

}