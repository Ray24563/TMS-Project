<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Login and Registration Routes
$routes->get('layouts/login', 'PagesController::login');
$routes->post('layouts/loginCheck', 'PagesController::loginCheck');
$routes->get('layouts/logout', 'PagesController::logout');
$routes->get('layouts/user_registration', 'PagesController::registration');
$routes->post('layouts/user_registration', 'PagesController::registerUser');

// Admin Panel Dashboard
$routes->get('layouts/home', 'DashboardController::index', ['filter' => 'auth']);

// Admin Panel User
$routes->get('layouts/add_user', 'UserController::add', ['filter' => 'auth']);
$routes->get('layouts/manage_user', 'UserController::index', ['filter' => 'auth']);
$routes->post('user/save', 'UserController::save', ['filter' => 'auth']);
$routes->get('user/edit/(:num)', 'UserController::edit/$1', ['filter' => 'auth']);
$routes->post('user/update', 'UserController::update', ['filter' => 'auth']);
$routes->get('user/delete/(:num)', 'UserController::delete/$1', ['filter' => 'auth']);
$routes->get('user/getUsers', 'UserController::getUsers', ['filter' => 'auth']);

// Admin Panel Task
$routes->get('layouts/add_task', 'TaskController::add', ['filter' => 'auth']);
$routes->get('layouts/manage_task', 'TaskController::index', ['filter' => 'auth']);
$routes->post('task/save', 'TaskController::save', ['filter' => 'auth']);
$routes->get('task/edit/(:num)', 'TaskController::edit/$1', ['filter' => 'auth']);
$routes->post('task/update', 'TaskController::update', ['filter' => 'auth']);
$routes->get('task/delete/(:num)', 'TaskController::delete/$1', ['filter' => 'auth']);
$routes->get('task/getTaskDetail/(:num)', 'TaskController::getTaskDetail/$1', ['filter' => 'auth']);

// Admin Panel About 
$routes->get('layouts/about', 'PagesController::about', ['filter' => 'auth']);

// ------------------------------------------------------------------------------------------------------------ //

// Profile Picture and User Panel Dashboard
$routes->post('upload-profile-picture', 'PagesController::uploadProfilePicture', ['filter' => 'auth']);
$routes->get('layouts/home_user', 'PagesController::homeUser', ['filter' => 'auth']);

// User Panel Task
$routes->get('layouts/task_view', 'UserPanelTaskController::index', ['filter' => 'auth']);
$routes->get('task/getTaskDetail/(:num)', 'UserPanelTaskController::getTaskDetail/$1', ['filter' => 'auth']);

// User Panel About
$routes->get('layouts/about_user', 'PagesController::userAbout', ['filter' => 'auth']);