<?php

class welcome extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	
	function index(){
		//Now let's test ajax::::
		$view = $this->load->view('default');
		if($this->Javascript->AJAXRequest()){
		} else {
		echo $view;
		}
	}
	
	
	
}