<?php


class ProductImage extends BaseModel {

    protected $table = 'product_images';  

    public function  findImagesByProductId($where)
    {
        $sql = sprintf("SELECT * FROM %s where 1=1 %s ", $this->table, $where);
        $query = $this->db->query($sql);
        if ($query) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }
}