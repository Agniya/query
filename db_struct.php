<?
	include 'db_config.php';
	class db_struct
	{
		public $db;
		private static $instance;	
		public static function Instance()
		{
			if (self::$instance == null)
				self::$instance = new db_struct();
				
			return self::$instance;
		}
		public function __construct()
		{
			$this->db = DB_NAME;
			$db_server = mysql_connect(DB_HOST,DB_USER,DB_PASS);
			if(!$db_server) die("Невозможно подключиться к MySQL: ". mysql_error());
			if($this->check_db($this->db)== false) 
				mysql_query("CREATE DATABASE $this->db")or die("Невозможно создать базу данных: ".mysql_error());
			mysql_select_db($this->db)or die("Невозможно выбрать базу данных: ". mysql_error());	
		}
		private function check_db($database_name)
		{
			$result = mysql_query("SHOW DATABASES");
			$list = mysql_fetch_array($result);
			do{if($list['Database'] == $database_name) return true;}while($list = mysql_fetch_array($result));
		}
		public function check_tb($tb_name)
		{
			$result = mysql_query("SHOW TABLES FROM $this->db");
			$list = mysql_fetch_array($result);
			if($list != false){foreach($list as $k=>$v){if($v == $tb_name)return false;}}
			else return true;
		}
	}