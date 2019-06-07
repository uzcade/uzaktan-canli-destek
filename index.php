<?php 
	include 'helper.php';

	$path = trim( $_SERVER['REQUEST_URI'], '/' );
	//simple_routing/clean_routing/ (ROOT)
	$dirname=dirname($_SERVER['SCRIPT_NAME']);
	// current page name (Exp: index.php)
	$basename=basename($_SERVER['SCRIPT_NAME']);
	// segments (Exp: /contact/id/2)
	$request_uri = str_replace([$dirname, $basename], null, $_SERVER['REQUEST_URI']);

	define('BASE_URL', $dirname);

	$config['init'] = $_SERVER['DOCUMENT_ROOT'].BASE_URL."/config.php";

	// all url
	$url 			= parse_url($path, PHP_URL_PATH);
	$uri_path 		= parse_url($url, PHP_URL_PATH);
	$uri_segments 	= explode('/', $uri_path);
	
	$request_uri = trim($request_uri, '/');
	
	//echo $request_uri."<br>";

	$request_uri = parse_url($request_uri, PHP_URL_PATH);
	/*echo "root: ".$dirname."<br>";
	echo "root: ".$request_uri."<br>";
	echo BASE_URL;
	/
	/*
		* @page name(panel): $uri_segments[1]
		* @paramter key(exp: id): $uri_segments[2]
		* @parameter value (exp: 2) : $uri_segments[3]
	*/

	$routes = [
	  '' => 'landing/index.php',
	  'login' => 'landing/login.php',
	  'register' => 'landing/register.php',
	  'islem' => 'landing/islem.php',
	  'send/mail' => 'mail_sender.php',
	  'admin/islem' => 'admin-panel/production/islem.php',

  	  'panel/admin' => 'admin-panel/production/homepage.php',
  	  'panel/admin/support-team' => 'admin-panel/production/support-team.php',
  	  'panel/admin/customers' => 'admin-panel/production/customers.php',
  	  'panel/admin/assign' => 'admin-panel/production/assign-supporter-to-customer.php',
  	  'panel/admin/add/support-member' => 'admin-panel/production/add-support-member.php',
  	  'panel/admin/licence/keys' => 'admin-panel/production/licence_keys.php',

  	  'panel/supporter' => 'admin-panel/production/supporter.php',
	  'panel/supporter/all/customers' => 'admin-panel/production/customers.php',
	  'panel/supporter/requests' => 'admin-panel/production/requests.php',
	  'panel/supporter/chat' => 'admin-panel/production/chat.php',
	  'panel/supporter/edit/customer' => 'admin-panel/production/update-user-info.php',
	  'panel/supporter/request/detail' => 'admin-panel/production/request_detail.php',
	  'panel/supporter/room' => 'admin-panel/production/messages.php',
  	  
	  'panel/customer' => 'admin-panel/production/supporter.php',
	  'panel/customer/chat' => 'admin-panel/production/chat.php',
	  'panel/customer/requests' => 'admin-panel/production/create_request.php',
	  'panel/customer/all/requests' => 'admin-panel/production/my_requests.php',
	  'panel/customer/room' => 'admin-panel/production/messages.php',
	  'logout' => 'logout.php'
	];

	if (array_key_exists($request_uri, $routes) ) {
	  require $routes[$request_uri];
	}else {
	  require 'landing/not_found.php';
	}

?>