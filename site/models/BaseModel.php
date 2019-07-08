<?php
include DB_PATH . DIRECTORY_SEPARATOR . 'Database.php';
class BaseModel
{
    protected $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
        return $this->db;
    }
    public function select($select, $table, $where, $limit = null,$orderBy = '')
    {
        $sql = sprintf("SELECT %s  FROM %s where 1=1  %s %s %s  ", $select, $table, $where, $orderBy, $limit);
     
        $query = $this->db->query($sql);
 
        if ($query) {

            return $query->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }
    public function addItem($table, $data)
    {
        $keys = $value = [];
        foreach ($data as $key => $value) {
            $keys[] = (string)$key;
            $values[] = "'" . $value . "'";
        }
        $keys = implode(',', $keys);
        $values = implode(',', $values);
        $sql = sprintf("INSERT INTO %s(%s) values(%s) ", $table, $keys, $values);
        $query = $this->db->query($sql);
        if ($query)
            return $this->db->insert_id;
        return null;
    }

    public function all($table, $orderBy = '', $limit = '')
    {
        if($limit != '') $limit = ' LIMIT '.$limit;
        if($orderBy != '') $orderBy = ' ORDER BY '.$orderBy. ' DESC';
        $sql = sprintf("SELECT * FROM %s where 1=1 %s  %s", $table,$orderBy,$limit);
        $query = $this->db->query($sql);
        if ($query) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }
    public function getDataByCategory($select = '',$table, $joins = [], $where = [], $limit = '')
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
            $joinType = strtoupper($join['TYPE']);
            $_joins  .= $joinType . ' JOIN ' . $join['TABLE'] . ' ON ' . $join['ON'] . ' ';
        }
        $sql = sprintf("SELECT %s FROM %s %s WHERE 1=1 %s order by %s.created_at desc %s" , $select, $table, $_joins, $_where, $table, $limit);

        $query = $this->db->query($sql);

        if ($query) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }
    public function allImages($table)
    {
        $sql = sprintf("SELECT * FROM %s where 1=1 LIMIT 6", $table);

        $query = $this->db->query($sql);
        if ($query) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }
    public function findOne($select, $table, $where ='') 
    {
        $where = explode('=', $where);
        if($where != '') $where = $where[0].'='."'$where[1]'";
        $sql = sprintf("SELECT %s from %s where 1=1 %s LIMIT 1", $select, $table, $where);

        $query = $this->db->query($sql);
        if($query) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }
    public function itemDetail($where, $table)
    {
        $sql = sprintf("SELECT * FROM %s where 1=1 %s LIMIT 6", $table, $where );

        $query = $this->db->query($sql);

        if ($query) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }
    public function updateData($table, $data, $where)
    {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = $key . "=" . "'" . $value . "'";
        }
        $set = implode(',', $set);
        $sql = sprintf("UPDATE %s set %s where %s", $table, $set, $where);

        $query = $this->db->query($sql);
        if ($query) {
            return true;
        }
        return false;
    }

}
