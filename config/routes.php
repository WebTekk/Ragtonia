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

// Routes for Contact
$routes->add('/contact_submit', route('POST', "/contact", 'App\Controller\ContactController:submit'));
$routes->get('/contact_submit')->addDefaults(['_auth' => false]);
$routes->add('/contact', route('GET', "/contact", 'App\Controller\ContactController:index'));
$routes->get('/contact')->addDefaults(['_auth' => false]);

// Routes for About_me
$routes->add('/about_me', route('GET', "/about_me", 'App\Controller\AboutController:index'));
$routes->get('/about_me')->addDefaults(['_auth' => false]);

// Routes for Login
$routes->add('/login_submit', route('POST', '/login', 'App\Controller\LoginController:submit'));
$routes->get('/login_submit')->addDefaults(['_auth' => false]);

// Routes for Logout
$routes->add('/logout', route('GET', '/logout', 'App\Controller\LogoutController:index'));
$routes->get('/logout')->addDefaults(['_auth' => false]);

// Routes for Error
$routes->add('/error', route('GET', "/error", 'App\Controller\ErrorController:index'));

return $routes;
