<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["prefix" => "v1"], function () {
    /** Cache */
    Route::get('/clear-cache', function () {
        Artisan::call('optimize:clear');
        return "Cache is cleared";
    });

    Route::get('/sort/vendor/messagesdatedesc', 'v1\Filter\SortController@vendormessagesDateDesc');
    Route::get('/sort/vendor/messagesdateasc', 'v1\Filter\SortController@vendormessagesDateAsc');
    Route::get('/sort/vendor/messagesalpha', 'v1\Filter\SortController@vendormessagesAlpha');


    Route::get('/sort/vendor/orderspricedesc', 'v1\Filter\SortController@vendorordersPriceDesc');
    Route::get('/sort/vendor/orderspriceasc', 'v1\Filter\SortController@vendorordersPriceAsc');
    Route::get('/sort/vendor/ordersdateasc', 'v1\Filter\SortController@vendorordersDateAsc');
    Route::get('/sort/vendor/ordersdatedesc', 'v1\Filter\SortController@vendorordersDateAsc');
    Route::get('/sort/vendor/ordersalpha', 'v1\Filter\SortController@vendorordersAlpha');


    Route::get('/sort/vendor/productspricedesc', 'v1\Filter\SortController@vendorproductsPriceDesc');
    Route::get('/sort/vendor/productspriceasc', 'v1\Filter\SortController@vendorproductsPriceAsc');
    Route::get('/sort/vendor/productsdateasc', 'v1\Filter\SortController@vendorproductsDateAsc');
    Route::get('/sort/vendor/productsdatedesc', 'v1\Filter\SortController@vendorproductsDateAsc');
    Route::get('/sort/vendor/productsalpha', 'v1\Filter\SortController@vendorproductsAlpha');





    Route::post('/exportproduct', 'v1\Filter\SortController@exportProduct');
    Route::post('/exportproductexcel', 'v1\Filter\SortController@exportProductExcel');
    Route::post('/exportorderexcel', 'v1\Filter\SortController@exportOrderExcel');
    Route::post('/exportcustomerexcel', 'v1\Filter\SortController@exportCustomerExcel');
    Route::post('/exportexcel', 'v1\Filter\SortController@exportExcel');

    //
    Route::get('/sort/productspricedesc', 'v1\Filter\SortController@productsPriceDesc');
    Route::get('/sort/productspriceasc', 'v1\Filter\SortController@productsPriceAsc');
    Route::get('/sort/productsdateasc', 'v1\Filter\SortController@productsDateAsc');
    Route::get('/sort/productsdatedesc', 'v1\Filter\SortController@productsDateAsc');
    Route::get('/sort/productsalpha', 'v1\Filter\SortController@productsAlpha');
    //
    Route::get('/sort/messagesdatedesc', 'v1\Filter\SortController@messagesDateDesc');
    Route::get('/sort/messagesdateasc', 'v1\Filter\SortController@messagesDateAsc');
    Route::get('/sort/messagesalpha', 'v1\Filter\SortController@messagesAlpha');
    Route::get('/sort/vendorsdatedesc', 'v1\Filter\SortController@merchantsDateDesc');
    Route::get('/sort/vendorsdateasc', 'v1\Filter\SortController@merchantsDateAsc');
    Route::get('/sort/vendorsalpha', 'v1\Filter\SortController@merchantsAlpha');
    Route::get('/sort/customersdatedesc', 'v1\Filter\SortController@customersDateDesc');
    Route::get('/sort/customersdateasc', 'v1\Filter\SortController@customersDateAsc');
    Route::get('/sort/customersalpha', 'v1\Filter\SortController@customersAlpha');
    Route::get('/sort/orderspricedesc', 'v1\Filter\SortController@ordersPriceDesc');
    Route::get('/sort/orderspriceasc', 'v1\Filter\SortController@ordersPriceAsc');
    Route::get('/sort/ordersdateasc', 'v1\Filter\SortController@ordersDateAsc');
    Route::get('/sort/ordersdatedesc', 'v1\Filter\SortController@ordersDateAsc');
    Route::get('/sort/ordersalpha', 'v1\Filter\SortController@ordersAlpha');
    Route::get('/sort/categoriesdateasc', 'v1\Filter\SortController@categoriesDateAsc');
    Route::get('/sort/categoriesdatedesc', 'v1\Filter\SortController@categoriesDateDesc');
    Route::get('/sort/categoriesalpha', 'v1\Filter\SortController@categoriesAlpha');

    Route::get('/sort/subcategoriesdateasc', 'v1\Filter\SortController@subcategoriesDateAsc');
    Route::get('/sort/subcategoriesdatedesc', 'v1\Filter\SortController@subcategoriesDateDesc');
    Route::get('/sort/subcategoriesalpha', 'v1\Filter\SortController@subcategoriesAlpha');


    Route::post('/filter/vendorproducts', 'v1\Filter\FilterController@vendorproductsFilter');
    Route::post('/filter/vendororders', 'v1\Filter\FilterController@vendorordersFilter');

    Route::post('/filter/orders', 'v1\Filter\FilterController@ordersFilter');
    Route::post('/filter/products', 'v1\Filter\FilterController@productsFilter');
    Route::post('/filter/vendors', 'v1\Filter\FilterController@merchantsFilter');
    Route::post('/filter/customers', 'v1\Filter\FilterController@customersFilter');
    Route::post('/filter/categories', 'v1\Filter\FilterController@categoriesFilter');
    Route::post('/filter/subcategories', 'v1\Filter\FilterController@subCategoriesFilter');


    Route::post('vendor/product/report', 'v1\Report\ReportController@vendorproductReport')->middleware('auth:api');
    Route::post('vendor/order/report', 'v1\Report\ReportController@vendororderReport')->middleware('auth:api');


    // authentication
    Route::group(['prefix' => 'auth', "namespace" => "v1\Auth"], function () {

        Route::post('signup', 'RegisterController@register');
        Route::post('vendor/signup', 'RegisterController@vendorRegister');
        Route::get('/email/verification/{code}', 'VerificationController@verifyUser');
        Route::post('/email/resend-verification', 'RegisterController@resendCode');
        Route::post('login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->middleware("auth:api");
        Route::post('recover', 'ForgotPasswordController@recover');
        Route::post('reset/password', 'ForgotPasswordController@reset');
        // update password
        Route::post('update/password', 'AccountSettingsController@updatePassword')->middleware("auth:api");
        // social signup
        // Route::post('/social/signup', 'SocialAuthController@socialAuth');
    });

    // Guest Routes
    Route::group(['prefix' => 'guest', "namespace" => "v1"], function () {
        Route::get('/products', 'GuestController@index');
        Route::get('/vendors', 'GuestController@vendors');
        Route::post('/products/recommendation', 'GuestController@recommendProducts');
        Route::get('products/search', 'GuestController@searchProduct');
        Route::post('products/filter', 'GuestController@filterProduct');
        Route::get('/products/{id}', 'GuestController@show');
        Route::get('/categories/other', 'GuestController@categoriesWithProducts');
        Route::get('categories/{id}', 'GuestController@catProduct');
        Route::get('/categories', 'GuestController@categories');
        Route::get('subcategory/{id}', 'GuestController@subcatProduct');
        Route::post('/contact', 'GuestController@contact');
    });

    // paystack webhook
    // Route::post("/paystack/webhook", "v1\Customer\OrderController@webhooks");

    // customer routes
    Route::group(["prefix" => "users", "namespace" => "v1\Customer", "middleware" => ["auth:api", "customer"]], function () {
        Route::get("profile", "ProfileController@profile");
        Route::post("profile", "ProfileController@update");
        // Route::

        /*** Wishlist ROUTE ***/
        Route::group(['prefix' => 'wishlist'], function () {
            Route::get('/', 'WishlistController@index');
            Route::post('/', 'WishlistController@store');
            Route::delete('/product/{id}', 'WishlistController@destroy');
        });
        /*** Carts Route ***/
        Route::group(['prefix' => 'carts'], function () {
            Route::get('/', 'CartController@index');
            Route::post('/', 'CartController@store');
            Route::put('/{id}', 'CartController@update');
            Route::post('/transfer', 'CartController@transferCart');
            Route::delete('/{id}', 'CartController@destroy');
        });
        /*** Order Route ***/
        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'OrderController@index');
            Route::post('/', 'OrderController@store');
            Route::get('/checkstock', 'OrderController@checkStock');
            Route::get('/{id}', 'OrderController@orderdetails');
        });
    });

    // merchant routes
    Route::group(["prefix" => "vendors", "middleware" => ["auth:api", "merchant"], "namespace" => "v1\Vendor"], function () {
        Route::get('/dashboard', 'VendorController@dashboard');
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


    // admin routes
    Route::group(["prefix" => "admin", "middleware" => ["auth:api", "admin"], "namespace" => "v1\Admin"], function () {
        Route::get('/dashboard', 'AdminController@dashboard');

        // vendors
        Route::group(["prefix" => "vendors"], function () {
            Route::get('/', 'VendorController@index');
            Route::get('/stats', 'VendorController@vendorStat');
            Route::get('/{id}', 'VendorController@show');
            Route::post('/search', 'VendorController@searchVendor');
            Route::put('/{id}/activate', 'VendorController@activate');
            Route::put('/{id}/deactivate', 'VendorController@deactivate');
        });

        /*** Brand Route  ***/
        Route::group(['prefix' => 'brand'], function () {
            Route::get('/', 'BrandController@index');
            Route::post('/', 'BrandController@store');
            Route::post('/search', 'BrandController@searchBrand');
            Route::get('/{id}', 'BrandController@show');
            Route::delete('/{id}', 'BrandController@destroy');
        });


        /*** Category Route  ***/
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@index');
            Route::get('all', 'CategoryController@getAllCategory');
            Route::post('/', 'CategoryController@store');
            Route::post('/search', 'CategoryController@searchCategory');
            Route::get('/{id}', 'CategoryController@show');
            Route::delete('/{id}', 'CategoryController@destroy');
            Route::put('/{id}', 'CategoryController@update');
            Route::put('/{id}/activate', 'CategoryController@activate');
            Route::put('/{id}/deactivate', 'CategoryController@deactivate');
        });

        /*** Sub Category Route ***/
        Route::group(['prefix' => 'subcategories'], function () {
            Route::get('/', 'SubCategoryController@index');
            Route::get('all', 'SubCategoryController@getAllSubCategory');
            Route::get('{id}/by-category', 'SubCategoryController@getSubCatByCatId');
            Route::post('/', 'SubCategoryController@store');
            Route::post('/search', 'SubCategoryController@searchCategory');
            Route::get('/{id}', 'SubCategoryController@show');
            Route::put('/{id}', 'SubCategoryController@update');
            Route::delete('/{id}', 'SubCategoryController@destroy');
            Route::put('/{id}/activate', 'SubCategoryController@activate');
            Route::put('/{id}/deactivate', 'SubCategoryController@deactivate');
        });

        /*** Children Category Route ***/
        Route::group(['prefix' => 'childrencategories'], function () {
            Route::get('/', 'ChildrenController@index');
            Route::get('all', 'ChildrenController@getAllChildCategory');
            Route::get('{id}/by-sub-category', 'ChildrenController@getChildCatBySubCatId');
            Route::post('/', 'ChildrenController@store');
            Route::post('/search', 'ChildrenController@searchChildCategory');
            Route::get('/{id}', 'ChildrenController@show');
            Route::put('/{id}', 'ChildrenController@update');
            Route::delete('/{id}', 'ChildrenController@destroy');
            Route::put('/{id}/activate', 'ChildrenController@activate');
            Route::put('/{id}/deactivate', 'ChildrenController@deactivate');
        });

        /*** Banner Route ***/
        Route::group(['prefix' => 'banner'], function () {
            Route::get('/', 'BannerController@index');
            Route::get('/{id}', 'BannerController@show');
            Route::put('/{id}', 'BannerController@update');
            Route::delete('/{id}', 'BannerController@destroy');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UserController@index');
            Route::get('/stats', 'UserController@customerStat');
            Route::get('/recent', 'UserController@recentCustomers');
            Route::post('/search', 'UserController@searchCustomer');
            Route::get('/{id}', 'UserController@show');
            Route::delete('/{id}', 'UserController@destroy');
            Route::put('/{id}/activate', 'UserController@activate');
            Route::put('/{id}/deactivate', 'UserController@deactivate');
        });

        //Products
        Route::group(['prefix' => 'products'], function () {

            Route::get('/', 'ProductController@listAllProducts');
            Route::post('/', 'ProductController@store');
            Route::get('/download', 'ProductController@getDownload');
            Route::post('/import', 'ProductController@importProducts');
            Route::get('/stats', 'ProductController@productStat');
            Route::get('/status/{status}', 'ProductController@productByStatus');
            Route::get('adminproduct', 'ProductController@adminProducts');
            // Route::get('/trendingproducts', 'ProductController@popularProduct');
            // Route::get('/newproducts', 'ProductController@newProducts');
            Route::get('/{id}', 'ProductController@show');
            Route::put('/{id}', 'ProductController@update');
            Route::delete('/{id}', 'ProductController@destroy');
            Route::put('/{id}/activate', 'ProductController@activate');
            Route::put('/{id}/deactivate', 'ProductController@deactivate');
            Route::post('/search', 'ProductController@searchProduct');
        });

        /*** Order Route ***/
        Route::group(['prefix' => 'orders'], function () {
            Route::get('/', 'OrderController@index');
            Route::get('{id}/show', 'OrderController@show');
            Route::get('/stats', 'OrderController@orderStats');
            Route::post('userorder', 'OrderController@userorder');
            Route::put('/{id}', 'OrderController@update');
            Route::get('/cancelled', 'OrderController@cancelledorder');
            Route::get('/pending', 'OrderController@pendingorder');
            Route::get('/shipped', 'OrderController@shippedorder');
            Route::get('/received', 'OrderController@receivedorder');
            Route::delete('/{id}', 'OrderController@destroy');
        });
    });


    Route::group(['prefix' => 'report'], function ($router) {
        Route::post('/orders', 'v1\Report\ReportController@orderReport');
        Route::post('/customer', 'v1\Report\ReportController@customerReport');
        Route::post('/vendors', 'v1\Report\ReportController@vendorReport');
        Route::post('/products', 'v1\Report\ReportController@productReport');
        // Route::post('/orders/export', 'v1\Report\ReportController@orderReportExport');
    });

    /*** MESSAGE ROUTE ***/
    Route::group(["prefix" => "message",  "middleware" => ["auth:api", "customer"], "namespace" => "v1\Message"], function () {
        Route::get('/', 'MessageController@index');
        Route::post('store/', 'MessageController@store');
        Route::get('/sent/{userid}', 'MessageController@sendMessage');
        Route::get('/receive/{userid}', 'MessageController@receivedMessage');
    });
});

/**
 * THIS SHOULD ALWAYS BE THE ENDING OF THIS PAGE
 */
Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'Route not exist',
        'data' => null
    ], 404);
});
