<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Les Controlleurs qui vont gérer nos pages sur le la plateforme web
Route::get('/', [PagesController::class, 'index'])->name('front.index');
Route::get('/shop', [PagesController::class, 'shop'])->name('front.shop');
Route::get('/cart', [PagesController::class, 'cart'])->name('front.cart');
Route::get('/checkout', [PagesController::class, 'checkout'])->name('front.checkout');
Route::get('/testimonial', [PagesController::class, 'testimonial'])->name('front.testimonial');
Route::get('/contact', [PagesController::class, 'contact'])->name('front.contact');


// Routes pour la gestion des utilisateurs ou clients
Route::get('/client/login', [ClientController::class, 'login' ])->name('client.login');

Route::get('/client/register', [ClientController::class, 'register'])->name('client.register');



