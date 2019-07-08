<?php
    class OrderDetail extends BaseModel {

        protected $table = 'order_details';

        public function addOrderDetail($data)
        {
            return parent::addItem($this->table,$data);
        }
        public function getOrderDetailByOrderId($where)
        {
        	return parent::findOne($this->table, $where);
        }
    }
?>