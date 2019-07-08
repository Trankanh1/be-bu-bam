<?php 
/**
 * 
 */
class Pagination
{
	protected $db;

	public function __construct()
	{
		$database = new Database();
		$this->db = $database->connect();
		return $this->db;
	}
	public function paginate($select, $table, $limit, $offset, $where = '')
	{
		$sql = sprintf("SELECT %s from %s where 1=1 %s LIMIT %s OFFSET %s", $select, $table, $where, $limit, $offset);
		$query = $this->db->query($sql);
		if($query) {
			return $query->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}
}