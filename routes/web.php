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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/admin/members', App\Http\Controllers\Admin\MembersController::class);
Route::resource('/admin/company', App\Http\Controllers\Admin\CompaniesController::class);

Route::resource('/admin/loans', App\Http\Controllers\Admin\LoansController::class);
Route::get('/findMembers', [App\Http\Controllers\Admin\LoansController::class, 'getMember']);
Route::get('/getAccounts', [App\Http\Controllers\Admin\AccountsController::class, 'getAccounts']);
Route::get('/getProduct', [App\Http\Controllers\Admin\ProductsController::class, 'getProduct']);
Route::resource('/admin/branch', App\Http\Controllers\Admin\branch_locationsController::class);
Route::resource('/admin/orders', App\Http\Controllers\Admin\OrdersController::class);
Route::resource('/admin/withdrawers', App\Http\Controllers\Admin\withdrawersContoller::class);
Route::resource('/admin/deposit', App\Http\Controllers\Admin\depositsController::class);
Route::resource('/admin/receipt', App\Http\Controllers\Admin\receiptsController::class);
Route::resource('/admin/payments', App\Http\Controllers\Admin\paymentsController::class);
Route::resource('/admin/accounts', App\Http\Controllers\Admin\AccountsController::class);
Route::resource('/admin/products', App\Http\Controllers\Admin\ProductsController::class);
Route::resource('/admin/prod_category', App\Http\Controllers\Admin\Product_categoryController::class);
Route::resource('/admin/users', App\Http\Controllers\Admin\UsersController::class);
Route::resource('/admin/roles', App\Http\Controllers\Admin\RolesController::class);

//Route::get('/users1', [App\Http\Controllers\UsersController::class,'index'])->name('index');
Route::get('/users-list', [App\Http\Controllers\UsersController::class, 'usersList'])->name('usersList');

Route::get('search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('autocomplete', [App\Http\Controllers\SearchController::class, 'autocomplete'])->name('autocomplete');

Route::get('admin/invoice/create',[App\Http\Controllers\InvoiceController::class,'create'])->name('create');
Route::get('admin/api/product', [App\Http\Controllers\InvoiceController::class, 'getAutocompleteData'])->name('product');


Route::get('/admin', function () {
    return view('layouts/admin');
});

Route::get('/user', function () {
    return view('layouts/admin');
});
