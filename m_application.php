<?
	class m_application
	{
		private $db_struct;
		private $applications='applications';
		public function __construct()
		{
			$this->db_struct = db_struct::Instance();
			$this->create_table();
		}
		public function create_table()
		{
			if($this->db_struct->check_tb($this->applications)!= false){
				mysql_query("CREATE TABLE applications(
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				`name` CHAR(30) NOT NULL,
				`content` CHAR(30) NOT NULL,
				PRIMARY KEY(`id`))
				") or die(mysql_error());
			}
		}	
		public function create_item($inserts)
		{
			$values = array_map('mysql_real_escape_string', array_values($inserts));
			$keys = array_keys($inserts);       
			return mysql_query('INSERT INTO `'.$this->applications.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')');
		}
		public function read($id)
		{
			$t="id='%d'";
			$where=sprintf($t,$id);
			$result = mysql_query("SELECT*FROM $this->applications WHERE $where");
			if($result != false) $list = mysql_fetch_array($result);
			if($list != NULL) return $list;
		}
	}
?>