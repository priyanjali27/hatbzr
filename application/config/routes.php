<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
$route['privacy-policy'] = "privacypolicy";
$route['contact'] = "contact";
$route['video'] = "video";
$route['home'] = "home";
$route['admin'] = "admin";
$route['category/(:any)'] = "category/tag/$1";
$route['category/(:any)/page'] = "category/tag/$1";
$route['category/(:any)/page/(:any)'] = "category/tag/$1";
$route['page/(:any)'] = "home/index/$1";
$route['php-tutorial'] = "phptutorial/index";
$route['php-tutorial/(:any)'] = "phptutorial/index/$1";
$route['php-example/(:any)']  = "phpexample/index/$1";
$route['page'] = "home";
// for post
$route['(:any)'] = "post/slug/$1";*/

require_once( BASEPATH .'database/DB.php');
$db =& DB();
$db->select('category_title');
$query = $db->get( 'hatbazar_category' );
$data = $query->result();
if($data){
	foreach($data as $catslug){
		$route[str_replace(' ','-', strtolower(trim($catslug->category_title)))] = 'category/index';
		$route[str_replace(' ','-', strtolower(trim($catslug->category_title))).'/(:any)'] = 'category/index/$1';
	}
}

//print_r($data);
$route['default_controller'] = 'home';
$route['detail'] = 'productdetail';
$route['varify/(:any)'] = 'varify/index/$1';
$route['detail/(:any)'] = 'productdetail/$1';
//$route['detail/(:any)'] = 'productdetail/index/$2';

$route['login'] = 'login/index/';
$route['login/login'] = 'login/login/';
$route['cart'] = 'cart/index/';
$route['checkout'] = 'checkout/index/';
$route['checkout/login'] = 'checkout/login/';
$route['agent'] = 'agent/index/';
$route['dashboard'] = 'dashboard/index/';
$route['profile'] = 'profile/index/';
$route['profile-edit'] = 'profile/edit/';
$route['logout'] = 'logout/index/';

$route['admin'] = 'admin/admin_login/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['(:any)'] = 'productdetail/index/$1';
$route['(:any)/(\d+)'] = 'productdetail/index/$1/$2';