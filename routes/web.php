<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It is a breeze. Simply tell Lumen the URIs it should respond to
 * | and give it the Closure to call when that URI is requested.
 * |
 */
$router->get('/checkout', 'CheckoutController@all');
$router->post('/checkout/', 'CheckoutController@post');
$router->put('/checkout/{id}', 'CheckoutController@put');

$router->get('/medicines', 'MedicinesController@all');
$router->get('/pharmacy', 'PharmacyController@all');
$router->get('/pharmacy/{id}', 'PharmacyController@get');
