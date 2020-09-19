<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@Index');
//Index page
Route::get('/Index', 'HomeController@Index')->name('index');
//Product page
Route::get('/product', 'ProductController@Product')->name('product');
//Single page
Route::get('/product-details', 'ProductController@Single')->name('product_details');
//Faqs page
Route::get('/fast-answer-question', 'SupportController@Faqs')->name('faqs');
//About us page
Route::get('/about-us', 'SupportController@About')->name('about');
//Checkout page
Route::get('/check-out', 'CheckoutController@Checkout')->name('check-out');
//Contact page
Route::get('/contact-us', 'SupportController@Contact')->name('contact');
//Privacy page
Route::get('/privacy', 'SupportController@Privacy')->name('privacy');
//Sign in
Route::post('/sign-in', 'AccountController@SignIn')->name('sign-in');
//Send mail sign up
Route::post('send-mail-signup','MailSend@SignUp')->name('send-mail-signup');
Route::get('sign-up','AccountController@SignUp')->name('sign-up');
Route::get('log-out','AccountController@Logout')->name('log-out');
//Cart
Route::post('add-to-cart','CartController@AddToCart')->name('add-to-cart');
Route::post('minus-cart','CartController@MinusQuantity')->name('minus-cart');
Route::post('delete-cart','CartController@DeleteCart')->name('delete-cart');
Route::post('plus-cart','CartController@PlusQuantity')->name('plus-cart');
Route::post('change-quantity','CartController@ChangeQuantity')->name('change-quantity');
//payment
Route::post('pay-cod','PaymentController@MakeCODPayment')->name('pay-cod');
