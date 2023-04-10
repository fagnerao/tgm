<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Admin\Painel');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Front/Home::index');
$routes->add('/pagamento/(:any)', 'Admin/Pedidos::pagamento');


$routes->resource('admin/api');
$routes->resource('front/events');


// custom routes
$routes->get('/admin', 'Front/SignupController::index');
$routes->get('/cadastro', 'Front/SignupController::index');
$routes->get('/login', 'Front/SigninController::index');
$routes->get('/logout', 'Front/SigninController::logout');
//$routes->add('/admin/*', 'Front/ProfileController::index',['filter' => 'authGuard']);

$routes->match(['get'],'/pagina/(:any)','Front/Pagina::index');
$routes->add('/email', 'Front/Home::sendEmail');
$routes->get('/', 'Front/Home::index');
$routes->add('/chat', 'Front/Chat::index');
$routes->match(['get'],'/chatWith/(:any)','Front/Chat::chatWith');
$routes->add('/telefones', 'Front/Telefones::index');
$routes->add('/documentos', 'Front/Documentos::index');
$routes->add('/suporte', 'Admin/Suporte::index');
$routes->add('/noticias', 'Front/Pagina::Allnews');
$routes->add('/pesquisa', 'Front/Pesquisa::index');
$routes->add('/ouvidoria', 'Front/Home::contato');

$routes->add('/categorias/todas', 'Front/Shop/Categoria::todas');
$routes->match(['get'],'/categoria/(:any)','Front/Categoria::index');
$routes->match(['get'],'/produtos/(:any)','Front/Shop/Produtos::index');
$routes->match(['get'],'/visualizar/(:any)','Front/Documentos::detalhes');

//API

$routes->add('/register', 'Front/Api::RegisterApi');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
