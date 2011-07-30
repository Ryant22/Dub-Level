<?php
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you chadsfdsfnge these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL & ~E_NOTICE);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}
error_reporting(E_ALL & ~E_NOTICE);
/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
	$system_folder = 'system';
	define('system_folder', $system_folder);

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.  If
 * you do, use a full server path. For more info please see the user guide:
 *
 * NO TRAILING SLASH!
 *
 */
$application_folder = 'application';
define('application_folder', $application_folder);

// Let's start the session
session_start();


//Config path:
define('CONFIG', 'config/');
define('CONTROLLER', 'controller/');
define('VIEW', 'view/');
define('MODEL', 'model/');
//Defining our files extension.
define('EXT', '.php');

// Defininf our absolute base path.
define('BASEPATH', dirname(realpath(__FILE__)));
// Apps Path
define('APP', BASEPATH . '/' . $application_folder . '/');
// Define the system path 
define('SYS', BASEPATH . '/' . $system_folder . '/');


/* Requiring the Configuration file:
 *  Getting the Full Path.
 *  */
require(APP . 'config/configuration.php');
/* 
 * Defining The Full Path
 * 
 */
define('SITE_PATH', $config['site_path']);
/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */
require(SYS . 'bootstrap.php');
/* End of file index.php */
/* Location: ./index.php */

