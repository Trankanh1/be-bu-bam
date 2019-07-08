<?php
class Customer extends BaseModel {

    public $name = 'name';
    public $email = 'email';
    public $passwrod = 'password';
    public $address ='address';
    public $gender ='gender';
    protected $table = 'customers';

    public function addCustomer( $data)
    {
        return parent::addItem($this->table, $data);
    }
    public function findCustomerById($select, $where)
    {
        return parent::findOne($select, 'customers',$where);
    }
    public function updateCustomer($data, $id)
    {
        return parent::updateData('customers',$data,$id);
    }
    public function getAll()
    {
        return parent::all('customer');
    }
    public function getCustomerById($where)
    {
        return parent::findOne('*',$this->table, $where);
    }
    public function editCustomer($data, $id)
    {
        return parent::editData('customer',$data,$id);
    }
}
?>