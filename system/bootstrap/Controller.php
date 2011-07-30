<?php

class Controller{
	public $settings;
	public $libraries;
	public $registry;
	public $library = array();

	function __construct(){
		/* TOP CONTROLLER AND CLASS: */
		//echo count(Registry::getObject('all'));
		foreach(Registry::$_objects as $key => $value){
			if(!isset($this->{$key})){
				$this->{$key} = $value;
			}
		}
		$this->settings = Registry::getAllSettings();
		$this->libraries = Registry::getAllLibraries();
		$this->routes = Registry::getAllRoutes();
		//The RegisterData:
		$this->registry = Registry::singleton();
		//URI:
		if(is_object($this->URI)){
			$this->controller = $this->URI->controller();
			$this->method = $this->URI->method();
			//$this->param = $this->URI->param();
		}

	}


}