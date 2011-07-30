<?php

class load extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	public function view($view){
		$view = file_get_contents(SITE_PATH . application_folder . '/' . VIEW . 'welcome.php');
		return $view;
	}

}