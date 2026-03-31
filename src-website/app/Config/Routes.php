<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Demo 1: Live Search
$routes->get('live-search', 'LiveSearch::index');
$routes->get('live-search/results', 'LiveSearch::results');

// Demo 2: Dynamic Form
$routes->get('dynamic-form', 'DynamicForm::index');
$routes->post('dynamic-form/validate-email', 'DynamicForm::validateEmail');
$routes->post('dynamic-form/submit', 'DynamicForm::submit');
// Tech Stack cascade — value passed as ?platform_id=X via hx-include
$routes->get('dynamic-form/languages',  'DynamicForm::languages');
$routes->get('dynamic-form/frameworks', 'DynamicForm::frameworks');
$routes->get('dynamic-form/tools',      'DynamicForm::tools');

// Demo 3: Todo CRUD
$routes->get('todo', 'Todo::index');
$routes->post('todo', 'Todo::store');
$routes->get('todo/(:num)/edit', 'Todo::edit/$1');
$routes->get('todo/(:num)/show', 'Todo::show/$1');
$routes->match(['PUT', 'POST'], 'todo/(:num)', 'Todo::update/$1');
$routes->match(['DELETE', 'POST'], 'todo/(:num)/delete', 'Todo::delete/$1');
$routes->match(['PATCH', 'POST'], 'todo/(:num)/toggle', 'Todo::toggle/$1');

// Demo 4: Infinite Scroll
$routes->get('infinite-scroll', 'InfiniteScroll::index');
$routes->get('infinite-scroll/page', 'InfiniteScroll::page');

// Demo 5: Form Validation
$routes->get('form-validation', 'FormValidation::index');
$routes->get('form-validation/reset', 'FormValidation::reset');
$routes->post('form-validation', 'FormValidation::submit');

// Demo 6: hx-boost
$routes->get('hx-boost', 'HxBoost::index');
$routes->post('hx-boost', 'HxBoost::submit');
