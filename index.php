<?
	function __autoload($className) 
	{ 
      if (file_exists($className . '.php')) { 
          include $className . '.php'; 
       } 
 	} 
	if($_GET['p']=='application') $appl = new c_application();
	if(!empty($_GET['id']))
	{
		$arr=$appl->m_app->read($_GET['id']);
		$appl->make_xml($arr);
	}