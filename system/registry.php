<?php

class Registry{
	//Instance of __CLASS__
	private static $_singleton;
	//Settings:
	private static $_settings = array();
	//Libraries:
	private static $_libraries = array();
	//Routes:
	private static $_routes = array();
	//Objects & Instances for classes:
	public static $_objects = array();
	/*
	 * Construct Function @Protected
	 */
	protected function __construct(){
		//So it doesn't get called!!
	}
	/*
	 * Singleton Function @Public
	 */
	public function singleton(){
		if(empty(self::$_singleton)){
			$obj = __CLASS__;
			self::$_singleton = new $obj;
			return self::$_singleton;
		}
	}
	
    public function __clone() {
        trigger_error('Cloning the registry is not permitted', E_USER_ERROR);
    }
	
	
	/*
	 * Adding Settings @Public
	 */
	public static function addSetting($key, $value = false, $array = false){
		if($array == true && is_array($key)){
			self::$_settings = array_merge(self::$_settings, $key);
		} else {
			self::$_settings[$key] = $value;
		}
	}
	
	public static function addLibrary($key, $value = false, $array = false){
		if($array == true){
			self::$_libraries = array_merge(self::$_libraries, $key);
		} else {
			self::$_libraries[$key] = $value;
		}
	}
	
	public static function addRoutes($key, $value = false, $array = false){
		if($array == true){
			self::$_routes = array_merge(self::$_routes, $key);
		} else {
			self::$_routes[$key] = $value;
		}
	}
	
	
	/* Create Objects @Public */
	public static function createObject($class, $path = false, $arg = array()){
		if(!empty($path)){
			require($path);
		}
        if (!isset(self::$_objects[$class])) {
            if(!empty($arg)){
                self::$_objects[$class] = new $class($arg);
            } else {
                self::$_objects[$class] = new $class;
            }
            
        } else {
        	throw new Exception("Cannot find <b>$class</b> object!</br>");
        }
        return self::$_objects[$class];
	}
	
	public static function getObject($key = ''){
	 	if (is_object(self::$_objects[$key])) {
            return self::$_objects[$key];
        }
        if ($key == 'all') {
            return self::$_objects;
        }
		
	}
	
	public static function getAllObjects(){
		return self::$_objects;
	}
	
	public static function getAllSettings(){
		return self::$_settings;
	}
	
	public static function getAllLibraries(){
		return self::$_libraries;
	}
	
	public static function getAllRoutes(){
		return self::$_routes;
	}
	
}