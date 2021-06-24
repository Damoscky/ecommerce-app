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

Route::get('/', 'v1\GuestController@index')->name('pages.index');

// authentication
Route::group(['prefix' => 'auth', "namespace" => "v1\Auth"], function () {

    Route::post('signup', 'RegisterController@register')->name('auth.register');
    Route::post('vendor/signup', 'RegisterController@vendorRegister')->name('auth.vendor.register');
    Route::get('/email/verification/{code}', 'VerificationController@verifyUser');
    Route::post('/email/resend-verification', 'RegisterController@resendCode')->name('auth.resend.verification');
    Route::post('login', 'LoginController@login')->name('auth.login');
    Route::get('logout', 'LoginController@logout')->name('auth.logout');
    Route::post('recover', 'ForgotPasswordController@recover');
    Route::post('reset/password', 'ForgotPasswordController@reset');
    // update password
    Route::post('update/password', 'AccountSettingsController@updatePassword')->middleware("auth:api");
});

//Admin Route
Route::group(['prefix' => 'admin', "namespace" => "v1\Admin", "middleware" => ["auth:web", "admin"],], function () {

    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@listAllProducts')->name('admin.allproducts');
        Route::get('/activated', 'ProductController@listActivatedProducts')->name('admin.activatedproducts');
        Route::get('/deactivated', 'ProductController@listDeactivatedProducts')->name('admin.deactivatedproducts');
        Route::post('/', 'ProductController@store');
        Route::get('/download', 'ProductController@getDownload');
        Route::post('/import', 'ProductController@importProducts');
        Route::get('/stats', 'ProductController@productStat');
        Route::get('/status/{status}', 'ProductController@productByStatus');
        Route::get('adminproduct', 'ProductController@adminProducts');
        Route::get('/{id}', 'ProductController@show');
        Route::put('/{id}', 'ProductController@update');
        Route::delete('/{id}', 'ProductController@destroy');
        Route::put('/{id}/activate', 'ProductController@activate');
        Route::put('/{id}/deactivate', 'ProductController@deactivate');
        Route::post('/search', 'ProductController@searchProduct');
    });

    /*** Category Route  ***/
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('admin.categories');
        Route::get('create/', 'CategoryController@createCategory')->name('admin.create.category');
        Route::post('/', 'CategoryController@store')->name('admin.store.category');
        Route::post('/{id}', 'CategoryController@destroy')->name('admin.delete.category');
        Route::put('/{id}', 'CategoryController@update')->name('admin.update.category');
        Route::put('/{id}/activate', 'CategoryController@activate')->name('admin.activate.category');
        Route::put('/{id}/deactivate', 'CategoryController@deactivate')->name('admin.deactivate.category');
    });

    /*** Sub Category Route ***/
    Route::group(['prefix' => 'subcategories'], function () {
        Route::get('/', 'SubCategoryController@index')->name('admin.subcategories');
        Route::get('create/', 'SubCategoryController@createSubCategory')->name('admin.create.subcategories');
        Route::get('{id}/by-category', 'SubCategoryController@getSubCatByCatId')->name('admin.category.subcategories');
        Route::post('/', 'SubCategoryController@store')->name('admin.store.subcategories');
        Route::get('/{id}', 'SubCategoryController@show')->name('admin.show.subcategories');
        Route::put('/{id}', 'SubCategoryController@update')->name('admin.update.subcategories');
        Route::post('/{id}', 'SubCategoryController@destroy')->name('admin.delete.subcategories');
        Route::put('/{id}/activate', 'SubCategoryController@activate')->name('admin.activate.subcategories');
        Route::put('/{id}/deactivate', 'SubCategoryController@deactivate')->name('admin.deactivate.subcategories');
    });

    /*** Children Category Route ***/
    Route::group(['prefix' => 'childrencategories'], function () {
        Route::get('/', 'ChildrenController@index');
        Route::get('create/', 'ChildrenController@createChildCategory')->name('admin.create.childcategories');
        Route::get('all', 'ChildrenController@getAllChildCategory');
        Route::get('{id}/by-sub-category', 'ChildrenController@getChildCatBySubCatId');
        Route::post('/', 'ChildrenController@store')->name('admin.store.childcategories');
        Route::post('/search', 'ChildrenController@searchChildCategory');
        Route::get('/{id}', 'ChildrenController@show');
        Route::put('/{id}', 'ChildrenController@update');
        Route::delete('/{id}', 'ChildrenController@destroy');
        Route::put('/{id}/activate', 'ChildrenController@activate');
        Route::put('/{id}/deactivate', 'ChildrenController@deactivate');
    });
});


// merchant routes
Route::group(["prefix" => "vendors", "middleware" => ["auth:web", "merchant"], "namespace" => "v1\Vendor"], function () {
    Route::get('/dashboard', 'VendorController@dashboard')->name('vendor.dashboard');
    Route::post('update', 'VendorController@update');
    Route::post("/subscribe", "SubscriptionController@subscribe");

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@vendorProducts');
        Route::post('/', 'ProductController@store');
        Route::get('/download', 'ProductController@getDownload');
        Route::post('/import', 'ProductController@importProducts');
        Route::get('/status/{status}', 'ProductController@productByStatus');
        Route::get('/stats', 'ProductController@vendorProductStat');
        // Route::get('/trendingproducts', 'ProductController@popularvendorProduct');
        Route::get('/{id}', 'ProductController@show');
        Route::put('/{id}', 'ProductController@update');
        Route::delete('/{id}', 'ProductController@destroy');
        Route::put('/{id}/activate', 'ProductController@activate');
        Route::put('/{id}/deactivate', 'ProductController@deactivate');
        Route::post('search', 'ProductController@searchvendorProduct');
    });

    /*** Order Route ***/
    Route::group(['prefix' => 'orders'], function () {

        Route::get('/', 'OrderController@merchantOrders');
        Route::put('/{id}', 'OrderController@update');
        Route::get('/pending', 'OrderController@merchantPendingOrder');
        Route::get('/received', 'OrderController@merchantReceivedOrder');
        Route::get('/cancelled', 'OrderController@merchantCancelledOrder');
        Route::get('/shipped', 'OrderController@merchantShippedOrder');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
