<?php

class Controller {
	
	public $model;
	public $view;
	function __construct()
	{
		$this->view = new View();

		if(!$_COOKIE["basket"])
		{
			$CoockieArr = [];
			setcookie("basket",serialize($CoockieArr),0,"/");
		}

	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}
}
