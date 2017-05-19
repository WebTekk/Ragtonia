<?php
use Symfony\Component\Routing\RouteCollection;


//
// Defines routes
//
// Controller must be a callable e.g. \Namespace\MyClass::method
//
$routes = new RouteCollection();

// Routes for Index
$routes->add('/index', route('GET', "/", 'App\Controller\IndexController:index'));
$routes->get('/index')->addDefaults(['_auth' => false]);

// Routes for Language
$routes->add('/language', route('GET', "/language", 'App\Controller\LanguageController:language'));
$routes->get('/language')->addDefaults(['_auth' => false]);

$routes->add('/games', route('GET', "/games", 'App\Controller\GamesController:index'));
$routes->get('/games')->addDefaults(['_auth' => false]);

// Routes for About_me
$routes->add('/about', route('GET', "/about", 'App\Controller\AboutController:index'));
$routes->get('/about')->addDefaults(['_auth' => false]);

// Routes for Error
$routes->add('/error', route('GET', "/error", 'App\Controller\ErrorController:index'));

return $routes;
