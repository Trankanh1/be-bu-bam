<?php 
class Order extends  BaseModel {

    protected $table = 'orders';
    public function getOrders()
    {
        return parent::all($this->table);
    }
    public function findOrderById($id)
    {
    	return parent::findOne('*', $this->table, 'and id ='.$id);
    }
    public function updateOrderStatus($data, $where)
    {
    	return parent::updateData($this->table, $data, $where);
    }
}