<?php
/* Bootrap file : Require the required files */
require(SYS . 'registry.php');
//Default extending Controller:
require(SYS . 'bootstrap/Controller.php');

/* Frame file : Setup all classes etc.. */
//$registry = Registry::singleton();
require_once (APP . CONFIG . 'configuration.php');
require_once (APP . CONFIG . 'autoload.php');
require_once (APP . CONFIG . 'routes.php');

//Now load them into the registry:
Registry::addSetting($configuration, null, true);
Registry::addLibrary($autoload, null, true);
Registry::addRoutes($routes, null, true);

//Load the libraries:
foreach($autoload['libraries'] as $library){
	//echo $library;
	$$library = Registry::createObject($library, SYS . 'libraries/' . $library . '.php');
}
//Now load the load class:
$load = Registry::createObject('load', SYS . 'load.php');
//Now get the router:
$Router->page_controller();