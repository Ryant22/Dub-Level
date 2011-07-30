<?php

$routes = array();


$routes['default_controller'] = 'welcome';
$routes['default_method'] = 'index';



$routes['url'] = array();
$routes['url']['logout'] = 'account/logout';
$routes['url']['login'] = 'account/login';
$routes['url']['register'] = 'account/register';
$routes['url']['article/[category]/[article]'] = 'index/article/([category], [article])';