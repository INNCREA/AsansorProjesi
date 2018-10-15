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
$route['default_controller'] = 'anasayfa';
$route['404_override'] = '';
$route['sifremi-unuttum'] = 'sifremiunuttum';
$route['translate_uri_dashes'] = FALSE;

$route['sifre-sifirla/(:any)'] = 'sifremiunuttum/reset/$1';

$route['asansorler'] = 'asansor';
$route['asansor/(:num)'] = 'asansor/view/$1';
$route['asansor/ekle'] = 'asansor/add';
$route['asansor/sil/(:num)'] = 'asansor/delete/$1';
$route['asansor/duzenle/(:num)'] = 'asansor/edit/$1';
$route['rapor/(:any)'] = 'rapor/index/$1';
$route['ariza/(:num)'] = 'ariza/view/$1';
$route['musteriler'] = 'musteri';
$route['ariza-al/(:any)'] = 'ariza/take/$1';
$route['ariza-olustur'] = 'ariza/create';
$route['ariza-olustur/(:num)'] = 'ariza/create/$1';
$route['ariza-iptal/(:any)'] = 'ariza/drop/$1';
$route['ajax/get-stock'] = 'ariza/get_stock';
$route['ajax/add-stock/(:num)'] = 'ariza/add_stock/$1';
$route['ajax/get-items/(:num)'] = 'ariza/get_items/$1';
$route['ajax/delete-stock'] = 'ariza/delete_stock';
$route['ariza/guncelle'] = 'ariza/update';

/*  Modülden gelecek arıza ve bakımlar buradan kayıt için controllerlara yönlendirilecek.

$route['api/ariza/(:any)'] = 'ariza';
$route['api/bakim/(:any)'] = 'bakim';

*/

$route['bakim/(:num)'] = 'bakim/detay/$1';
$route['cari-detay/(:num)'] = 'cari/detay/$1';