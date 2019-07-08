<?php
class ProductCategory extends BaseModel {

    public $product_id = 'product_id';
    public $category_id = 'category_id';
    protected $table = "product_categories";

    public function addProductCategory($data)
    {
        return parent::addItem($this->table, $data);
    }
    public function deleteProductCategory($where)
    {
        return parent::deleteData('product_categories', $where);
    }
    public function updateProductCategory($data, $where)
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