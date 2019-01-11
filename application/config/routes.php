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
$route['default_controller'] = 'login';
$route['asesor/pagina/(:num)'] = 'asesor/index/$1';
$route['asesor'] = "asesor";
$route['acta/pagina/(:num)'] = 'acta/index/$1';
$route['acta'] = "acta";
$route['infavance/pagina/(:num)'] = 'infavance/index/$1';
$route['infavance'] = "infavance";
$route['institucion/pagina/(:num)'] = 'institucion/index/$1';
$route['institucion'] = "institucion";
$route['anuncio/pagina/(:num)'] = 'anuncio/index/$1';
$route['anuncio'] = "anuncio";
$route['plan/pagina/(:num)'] = 'plan/index/$1';
$route['plan'] = "plan";
$route['listanuncio/pagina/(:num)'] = 'listanuncio/index/$1';
$route['listanuncio'] = "listanuncio";
$route['practica/pagina/(:num)'] = 'practica/index/$1';
$route['practica'] = "practica";
$route['infinal/pagina/(:num)'] = 'infinal/index/$1';
$route['infinal'] = "infinal";
$route['revisor/pagina/(:num)'] = 'revisor/index/$1';
$route['revisor'] = "revisor";
$route['descarga/pagina/(:num)'] = 'descarga/index/$1';
$route['descarga'] = "descarga";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
