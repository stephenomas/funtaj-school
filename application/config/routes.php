<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['authme/process'] = 'authme/process';
$route['default_controller'] = 'welcome';

/* student portal routes */
$route['student-portal'] = 'portal/index';
$route['student-portal/school-fees'] = 'SchoolFees/index';
$route['student-portal/school-fees/pay'] = 'SchoolFees/pay';
$route['student-portal/store'] = 'portal/store';
$route['student-portal/store/cart'] = 'portal/cart';
$route['student-portal/store/product-detail/(:num)']       = 'portal/single/$1';
$route['student-portal/school-fees/schoolFees/addFees'] = 'SchoolFees/addFees';
$route['student-portal/school-fees/pay/confirm'] = 'SchoolFees/confirm';
$route['student-portal/store/checkout/confirm'] = 'Portal/confirm_checkout';
$route['remove/cart'] = 'portal/remove_cart';
$route['update/cart'] = 'portal/update_cart';
$route['student-portal/store/checkout'] = 'portal/checkout';
$route['student-portal/logout'] = 'portal/logout';
$route['save/cart'] = 'portal/save_cart';
$route['student-portal/cart'] = 'portal/cart';
$route['student-portal/orders'] = 'portal/orders';
$route['student-portal/results'] = 'portal/results';
$route['student-portal/results/midterm'] = 'portal/midterm_result';
$route['student-portal/results/midterm-report'] = 'portal/midterm_report';
$route['student-portal/results/endofterm'] = 'portal/endofterm_result';
$route['student-portal/results/endofterm-report'] = 'portal/endofterm_report';
$route['student-portal/results/endofyear'] = 'portal/endofyear';
$route['student-portal/results/endofyear-report'] = 'portal/endofyear_report';

/* student portal routes */


/* administrator portal routes */
//midterm report
$route['midterm'] = 'Edittermreports/midterm';
$route['midterm/class']       = 'Edittermreports/single';
$route['midterm/class/single']       = 'Edittermreports/midterm_detail';
//end midterm report

///endofterm reports routes
$route['endofterm'] = 'Edittermreports/endofterm';
$route['endofterm/class'] = 'Edittermreports/endofterm_single';
$route['endofterm/class/single'] = 'Edittermreports/endofterm_detail';
/////end endofterm

// year report routes
$route['endofyear'] = 'Edittermreports/endofyear';
$route['endofyear/class'] = 'Edittermreports/endofyear_single';
$route['endofyear/class/single'] = 'Edittermreports/endofyear_detail';
// end year report

// term scores route
//midterm term scores
$route['termscores/midterm'] = 'Termscores/midterm';
$route['termscores/midterm/single'] = 'Termscores/midterm_single';
//end 
// end term scores

//shop routes
$route['store/product/(:any)'] = 'store/single/$1';
$route['store/cart'] = 'store/cart';
//end shop routes

/* administrator portal routes */

//$route['tutor'] = 'tutor/index';
$route['dashboard'] = 'welcome/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


