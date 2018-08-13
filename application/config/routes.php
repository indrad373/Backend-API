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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Testing API
| -------------------------------------------------------------------------
*/
$route['api/test']['GET'] = 'mobile/User/test';
/*
| -------------------------------------------------------------------------
| User Management API
| -------------------------------------------------------------------------
*/
$route['api/user-register']['POST'] = 'mobile/User/register';
$route['api/user-login']['POST'] = 'mobile/User/login';
$route['api/user-details']['POST'] = 'mobile/User/details';
$route['api/user-update-profile']['POST'] = 'mobile/User/updateProfile';
$route['api/user-update-password']['POST'] = 'mobile/User/updatePassword';
$route['api/user-delete']['POST'] = 'mobile/User/delete';
/*
| -------------------------------------------------------------------------
| Item API
| -------------------------------------------------------------------------
*/
$route['api/item-insert']['POST'] = 'mobile/Item/insert';
$route['api/item-update']['POST'] = 'mobile/Item/update';
$route['api/item-delete']['POST'] = 'mobile/Item/delete';
$route['api/item-details']['POST'] = 'mobile/Item/details';
$route['api/item-view-popular']['GET'] = 'mobile/Item/viewPopular';
$route['api/item-view-promo']['GET'] = 'mobile/Item/viewPromo';
/*
| -------------------------------------------------------------------------
| Store API
| -------------------------------------------------------------------------
*/
$route['api/store-insert']['POST'] = 'mobile/Store/insert';
$route['api/store-update']['POST'] = 'mobile/Store/update';
$route['api/store-delete']['POST'] = 'mobile/Store/delete';
$route['api/store-details']['POST'] = 'mobile/Store/details';
$route['api/store-all-item']['POST'] = 'mobile/Item/storeItem';
$route['api/store-all']['GET'] = 'mobile/Store/storeAll';
/*
| -------------------------------------------------------------------------
| Transaction API
| -------------------------------------------------------------------------
*/
$route['api/transaction-insert']['POST'] = 'mobile/Transaction/insert';
$route['api/transaction-status-update']['POST'] = 'mobile/Transaction/statusUpdate';