<?php
class ProductImage extends BaseModel {

    public $product_id = 'product_id';
    public $image = 'image';
    public $position = 'position';

    protected $table = "product_images";

    public function getAll()
    {
        return parent::all($this->table);
    }
    public function addProductImage($data)
    {
        return parent::addItem($this->table, $data);
    }
    public function deleteProductImage($where)
    {
        return parent::deleteData($this->table, $where);
    }
    public function updateProductImage($data, $where)
    {
        return parent::updateData($this->table, $data, $where);
    }
     public function join($select = '',$table, $joins = [], $where)
    {
        $_where = '';
        $_joins = '';
        foreach ($where as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    $_where .= ' AND ' . $key . ' ' . $k . ' ' . $v;
                }
            } else {
                $_where .= ' AND ' . $key . '=' . $value;
            }
        }
        foreach ($joins as $join) {
            $joinType = strtoupper($join['type']);
            $_joins  .= $joinType . ' JOIN ' . $join['TABLE'] . ' ON ' . $join['ON'] . ' ';
        }
        $sql = sprintf("SELECT %s FROM %s %s WHERE 1=1 %s order by %s.id desc" , $select, $table, $_joins, $_where, $table);
        $query = $this->db->query($sql);
        if ($query) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }
}
