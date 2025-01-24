<?php

namespace In3050Inm428WebDev\PhpMvc;

use In3050Inm428WebDev\PhpMvc\Controllers\HomeController;
use In3050Inm428WebDev\PhpMvc\Controllers\MenuController;
use In3050Inm428WebDev\PhpMvc\Controllers\ContactController;
use In3050Inm428WebDev\PhpMvc\Controllers\ReviewsController;
use In3050Inm428WebDev\PhpMvc\Controllers\DashboardController;
use In3050Inm428WebDev\PhpMvc\Controllers\StaffDashboardController;
use In3050Inm428WebDev\PhpMvc\Controllers\DinerDashboardController;
use In3050Inm428WebDev\PhpMvc\Controllers\GuestDashboardController;
use In3050Inm428WebDev\PhpMvc\Router;

$router = new Router();

// Directing to pages
$router->get('/', HomeController::class, 'index');
$router->get('/menu', MenuController::class, 'index');
$router->get('/reviews', ReviewsController::class, 'index');
$router->get('/contact', ContactController::class, 'index');
$router->get('/dashboard', DashboardController::class, 'index');
$router->get('/dashboard/staff', StaffDashboardController::class, 'index');
$router->get('/dashboard/diner', DinerDashboardController::class, 'index');
$router->get('/dashboard/guest', GuestDashboardController::class, 'index');

// Login/Register/Logout/getUserRole dashboard
$router->post('/dashboard/register', DashboardController::class, 'register');
$router->post('/dashboard/authenticate', DashboardController::class, 'authenticate');
$router->post('/logout', DashboardController::class, 'logout');
$router->post('/dashboard/getUserRole', DashboardController::class, 'getUserRole');
$router->post('/dashboard/emailConfirmation', DashboardController::class, 'emailConfirmation');

// Staff
$router->post('/dashboard/staff/getStaff', StaffDashboardController::class, 'getStaff');
$router->post('/dashboard/staff/getCurrentBookings', StaffDashboardController::class, 'getCurrentBookings');
$router->post('/dashboard/staff/getUpcomingBookings', StaffDashboardController::class, 'getUpcomingBookings');
$router->post('/dashboard/staff/getUpcomingServices', StaffDashboardController::class, 'getUpcomingServices');
$router->post('/dashboard/staff/createService', StaffDashboardController::class, 'createService');
$router->post('/dashboard/staff/getService', StaffDashboardController::class, 'getService');
$router->post('/dashboard/staff/editService', StaffDashboardController::class, 'editService');
$router->post('/dashboard/staff/deleteService', StaffDashboardController::class, 'deleteService');
$router->post('/dashboard/staff/getBookingsForUpcomingService', StaffDashboardController::class, 'getBookingsForUpcomingService');

// Diner
$router->post('/dashboard/diner/getDiner', DinerDashboardController::class, 'getDiner');
$router->post('/dashboard/diner/getBookings', DinerDashboardController::class, 'getBookings');
$router->post('/dashboard/diner/cancelReservation', DinerDashboardController::class, 'cancelReservation');
$router->post('/dashboard/diner/getLatestBooking', DinerDashboardController::class, 'getLatestBooking');
$router->post('/dashboard/diner/bookReservation', DinerDashboardController::class, 'bookReservation');
$router->post('/dashboard/diner/getBookingsByServiceId', DinerDashboardController::class, 'getBookingsByServiceId');
$router->post('/dashboard/diner/addToCalendar', DinerDashboardController::class, 'addToCalendar');
$router->post('/dashboard/diner/emailConfirmation', DinerDashboardController::class, 'emailConfirmation');
$router->post('/dashboard/diner/changePassword', DinerDashboardController::class, 'changePassword');


$router->dispatch();

?>