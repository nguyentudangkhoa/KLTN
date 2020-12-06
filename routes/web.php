<?php

use App\Http\Controllers\AdminIndexController;
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
Route::get('/product/{product_type}', 'ProductController@Product')->name('product');
//Product page sort price
Route::get('/product-price/{price}', 'SortPriceController@SortPrice')->name('product-price');
//History
Route::get('/history/{id?}', 'HistoryDetailController@ShowHistory')->name('history');
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
//Search product by name
Route::post('searchList','SearchController@fetch')->name('searchList');
Route::get('search-product','SearchController@SearchProduct')->name('search-product');
//User
Route::get('profile/{id}','ProfileController@ShowProfile')->name('profile')->middleware('check-login');
Route::put('change-profile','ProfileController@ChangeProfile')->name('change-profile');
//Change avatar
Route::put('/edit-avatar','ProfileController@EditAvatar')->name('edit-avatar');
//Add address
Route::post('/add-address','ProfileController@AddAddress')->name('add-address');
//rating
Route::post('/rating','HistoryDetailController@Rating')->name('rating');
//Admin index
Route::prefix('admin')->middleware('check-admin')->group(function () {
    //admin index page
    Route::get('/admin-index','AdminIndexController@index')->name('admin-index');
    //Product page
    Route::get('/products','AdminProductsController@ShowProduct')->name('products');
    Route::post('/add-products','AddProductCotroller@AddProduct')->name('add-products');
    Route::put('/update-products','UpdateProductController@UpdateProduct')->name('update-products');
    Route::put('/en-product','EnableController@EnableProduct')->name('en-product');
    Route::put('/update-image-product','UpdateProductController@UpdateImagesProduct')->name('update-image-product');    //category
    Route::put('/en-category','EnableController@EnableCategory')->name('en-category');
    Route::get('/categories','AdminCategoryController@ShowCategory')->name('categories');
    //root category
    Route::put('/en-root','EnableController@EnableRoot')->name('en-root');
    Route::get('/root-categories','AdminRootCategoryController@ShowRootCategory')->name('root-categories');
    Route::put('/update-root-category','UpdateRootController@UpdateRootCate')->name('update-root-categor');
    Route::post('/add-root','AddCategoryController@AddRoot')->name('add-root');
    Route::put('/delete-root','DeleteRootController@DelRoot')->name('delete-root');
    //unit
    Route::get('/units','AdminUnitController@ShowUnit')->name('units');
    Route::put('/disable-unit','DisableController@DisableUnit')->name('disable-unit');
    Route::put('/en-unit','EnableController@EnableUnit')->name('en-unit');
    Route::put('/update-unit','UpdateUnitController@UpdateUnit')->name('update-unit');
    Route::post('/add-unit','AddUnitController@AddUnit')->name('add-unit');
    //User task
    Route::get('/users','AdminUserController@ShowUser')->name('users');
    Route::put('/disable-user','DisableController@DisableUser')->name('disable-user');
    Route::put('/en-user','EnableController@EnableUser')->name('en-user');
    Route::delete('/delete-user','DeleteUserController@DeleteUser')->name('delete-user');
    //Bill
    Route::get('/bills','AdminBillController@ShowBill')->name('bills');
    Route::get('/show-bill/{id}','AdminBillController@ShowBillDetails')->name('show-bill');
    Route::put('/update-bill','UpdateBillController@UpdateBill')->name('update-bill');
    Route::put('/delete-bill','DeleteBillController@DeleteBill')->name('delete-bill');
    //disable
    Route::put('/disable','DisableController@Disable')->name('disable');
    Route::put('/disable-type','DisableController@DisableType')->name('disable-type');
    Route::put('/disable-group','DisableController@DeleteBill')->name('disable-group');
    //print PDF
    Route::get('/print-bills/{id}','AdminPDFController@PrintPDF')->name('print-bills');
    //category
    Route::put('/update-category','UpdateCategoryController@UpdateCategory')->name('update-category');
    Route::post('/add-category','AddCategoryController@AddCategory')->name('add-category');
    //user
    Route::put('/update-user','UpdateUserController@UpdateUser')->name('update-user');
    //quantity product
    Route::get('/quantity-product','AdminProductsController@ShowQuantity')->name('quantity-product');
    Route::get('/sole-product','AdminBillController@ShowSoleProduct')->name('sole-product');
    //dissable all
    Route::put('/dissable-all','DissAllController@dissAll')->name('dissable-all');
    //customer
    Route::get('/customer','CustomerController@Customer')->name('customer');
});

