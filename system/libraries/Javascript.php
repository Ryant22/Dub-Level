<?php

class Javascript extends Controller{
	public $o   = '';
	public $c   = '';

	public function AJAXRequest(){
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			return true;
		}
	}


	public function __construct(){
		//parent::__construct();
		$this->o = "<script type=\"text/javascript\">";
		$this->c = "</script>";
	}


	public function alert($text){
		return "alert($text);";
	}

	public function addConsole($text){
		return "console.log('$text');";
	}



}