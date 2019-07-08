<?php
class Order extends BaseModel {
	
	public  $customer_name = 'customer_name';
	public $customer_phone = 'customer_phone';
	public  $customer_email = 'customer_email';
	public $customer_add = 'customer_add';
	public $customer_id = 'customer_id';
	public $total = 'total_price';
	public $created_at = 'created_at';
	protected $table = 'orders';

	public function addOrder($data)
	{
		return parent::addItem($this->table,$data);
	}
	public function getAll()
	{
		return parent::all($this->table);
	}
	 public function findOrderById($select,$where)
    {
        return parent::findOne($select,$this->table,$where);
    }
     public function updateOrderStatus($data, $where)
    {
    	return parent::updateData($this->table, $data, $where);
    }


}
?>