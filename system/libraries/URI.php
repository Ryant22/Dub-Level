<?php

class URI extends Controller{
	public $url;
	public $raw_url;
	function __construct(){
		parent::__construct();
		$dir = $this->settings['dir'];
		$raw = $_SERVER['REQUEST_URI'];
		$this->raw_url = $raw;
		$raw_url = str_replace('/' . $dir, '', $raw);
		$raw_url = rtrim($raw_url);
		if(!$this->Javascript->AJAXRequest()){
			$url = explode('/', $raw_url);
	
			$this->url = $url;
			$this->url[0] = (empty($this->url[0])) ? $this->routes['default_controller'] : $this->url[0];
			$this->url[1] = (empty($this->url[1])) ? $this->routes['default_method'] : $this->url[1];
		} else {
			$this->url[0] = ($_POST['controller'] == "index") ? $this->routes['default_controller'] : $_POST['controller'];
			echo $this->url[0];
		}
	}

	public function controller()
	{
		return $this->url[0];
	}

	public function method()
	{
		return $this->url[1];
	}

	public function page_number()
	{
		// article/dirty/somekind-of-article
		// $this->article->category('somekind-of-article')
		// controller / method / param
		//For pagination:
		return end($this->uri);
	}

	public function set_controller($controller)
	{
		$this->url[0] = $controller;
	}

	public function set_method($method, $param = array())
	{
		$this->url[1] = $method;
		$this->method_param = $param;
	}


}