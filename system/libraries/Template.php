<?php

class Template extends Controller{
	function __construct(){
		parent::__construct();
	}
	public function strip($view, $tags){
		if(is_array($tags)){
			foreach($tags as $key => $value){
				$tagsToReplace = $this->settings['tags']['open'] . $key . $this->settings['tags']['close'];
				$view = str_replace($tagsToReplace, $value, $view);
			}
			return $view;
		} else {
			throw new Exception("The variable <b>$tags</b> is not an array.");
		}
	}
	
	
	
}