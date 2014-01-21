<?
class c_application
	{
		public $m_app;
		public function __construct()
		{
			$this->m_app = new m_application;
			//создание записи в таблице для теста
			$this->m_app->create_item(array('name'=>'fwaeger','content'=>'agretth'));
		}
		
		public function make_xml($arr)
		{
			if(count($arr) > 0)
			{
				foreach($arr as $k=>$v)
				{
					$xmlstr = "
					<XML>
						<title>Application ". $arr['id'] ."</title> 
							<item>
								<name>". $arr['name'] ."</name> 
								<content>". $arr['content'] ."</content> 
							</item>
					</XML>";
				}
				echo $xmlstr;
			}
		}
	}	