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

Route::prefix('admin')->group(function () {
    Route::middleware('adminGuest')->group(function () {
        Route::get('/login', 'Back\LoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Back\LoginController@login')->name('admin.login.check');
    });
    Route::middleware('adminAuth')->group(function () {
        Route::get('/', 'Back\HomeController@index')->name('admin.home');
        Route::get('/back/logout', 'Back\LoginController@logout')->name('admin.logout');
        Route::get('/admins/index', 'Back\AdminController@index')->name('admins.index');
        Route::post('/admins/store', 'Back\AdminController@store')->name('admins.store');
        Route::get('/admins/edit/{admin}', 'Back\AdminController@edit')->name('admin.edit');
        Route::get('/admins/delete/{admin}', 'Back\AdminController@delete')->name('admin.delete');

        Route::get('/changepassword', 'Back\ProfileController@ChangePassword')->name('admin.changepassword');
        Route::patch('/updatepassword', 'Back\ProfileController@UpdatePassword')->name('admin.updatepassword');
        Route::get('/editprofile', 'Back\ProfileController@EditProfile')->name('admin.editprofile');
        Route::patch('/update', 'Back\ProfileController@update')->name('admin.update');
        Route::get('forgetpassword/get/','Front\UserpasswordController@forgetpassword')->name('forgetpassword.index');
       

        /*------------------------Roles------------------------------*/
    Route::post('role/store','Back\RoleController@store')->name('role.store');
    Route::patch('role/update/{role}','Back\RoleController@update')->name('role.update');
    Route::get('role/delete/{role}','Back\RoleController@delete')->name('role.delete');
    Route::get('permission/delete/{permission}','Back\PermissionController@delete')->name('permission.delete');
    Route::post('permission/store','Back\PermissionController@store')->name('permission.store');
     

    /*--------------------------Category--------------------------*/
    Route::get('/category','Back\CategoryController@index')->name('category.index');
    Route::post('/category/store','Back\CategoryController@store')->name('category.store');
    Route::patch('/category/update/{category}','Back\CategoryController@update')->name('category.update');
    Route::get('/category/status/{category}/{status}','Back\CategoryController@status')->name('cat.status');
    Route::get('/category/delete/{category}','Back\CategoryController@delete')->name('cat.delete');


    /*--------------------------Brand--------------------------*/
        Route::get('/catalog/Brands','Back\BrandController@indexbrand')->name('catalog.brand');
        Route::post('/catalog/Brands/store','Back\BrandController@store')->name('brand.store');
        Route::get('/Brands/{brand}/edit','Back\BrandController@edit')->name('brand.edit');
        Route::patch('/Brands/{brand}','Back\BrandController@update')->name('brand.update');
        Route::get('/catalog/brands/delete/{brand}','Back\BrandController@delete')->name('brand.delete');
        Route::get('/brand/status/{brand}/{status}','Back\BrandController@status')->name('brand.status');
    
    
    /*--------------------------Social Media--------------------------*/
    Route::get('/socialmedia','Back\SocialmediaController@index')->name('socialmedia');
    Route::post('/socialmedia/store','Back\SocialmediaController@store')->name('socialmedia.store');
    Route::get('/socialmedia/{socialmedia}/edit','Back\SocialmediaController@edit')->name('socialmedia.edit');
    Route::patch('/socialmedia/{socialmedia}','Back\SocialmediaController@update')->name('socialmedia.update');
    Route::get('/socialmedia/delete/{socialmedia}','Back\SocialmediaController@delete')->name('socialmedia.delete');
    Route::get('/socialmedia/status/{socialmedia}/{status}','Back\SocialmediaController@status')->name('socialmedia.status');
     
    /*----------------------------Products-------------------------------------------*/
    Route::get('/seller/products','Back\ProductController@seller')->name('sellerproduct');
    Route::get('/catalog/products','Back\ProductController@index')->name('product.index');
    Route::get('/catalog/addproducts','Back\ProductController@productpage')->name('addproduct');
    Route::get('/product/create','Back\ProductController@create')->name('product.create');
   
    Route::get('/product/{product}/edit','Back\ProductController@edit')->name('product.edit');
    Route::patch('/product/update/{product}','Back\ProductController@update')->name('admin.product.update');
    Route::get('/product/delete/{product}/admin','Back\ProductController@delete')->name('admin.product.delete');
    Route::get('/gallery/delete/{gallery}','Back\ProductController@gallerydelete')->name('admin.gallery.delete');
    Route::get('/gallery/status/{gallery}/{status}','Back\ProductController@gallerystatus')->name('galery.status');
    Route::get('/product/status/{product}/{status}','Back\ProductController@status')->name('product.status');
    Route::get('/product/verification/{product}/{status}','Back\ProductController@verification')->name('product.verification');
     Route::post('/product','Back\ProductController@store')->name('product.store');
  
     Route::get('/product/attribute/{product}','Back\ProductController@addAttribute')->name('attribute.product');
    Route::post('/product/attribute/store','Back\ProductController@attributestore')->name('attribute.store');
    Route::get('/product/attribute/edit/{attribute}','Back\ProductController@attributeEdit')->name('attribute.edit');
    Route::patch('/product/attribute/update/{attribute}','Back\ProductController@attributeUpdate')->name('attribute.update');
    Route::get('/product/attribute/delete/{attribute}', 'Back\ProductController@attributeDelete')->name('attribute.delete');

     Route::get('/product/images/{product}','Back\ProductController@addImage')->name('image.product');
    Route::post('/product/images/store','Back\ProductController@imagestore')->name('image.store');

    /*------------------------------------Sliders-----------------------------------*/
    Route::get('/slider','Back\SliderController@index')->name('slider');
    Route::post('/slider/store','Back\SliderController@store')->name('slider.store');
    Route::get('/slider/delete/{slider}','Back\SliderController@delete')->name('image.delete');
    Route::get('/slider/status/{slider}/{status}','Back\SliderController@status')->name('slider.status');

    /*------------------------------------Ads-----------------------------------*/
    Route::get('/ads','Back\AdsController@index')->name('ads');
    Route::post('/ads/store','Back\AdsController@store')->name('ads.store');
    Route::get('/ads/delete/{ads}','Back\AdsController@delete')->name('ads.delete');
    Route::get('/ads/publish/{ads}/{atatus}','Back\AdsController@status')->name('ads.publish');

       /*---------------------------------Company Details---------------------------------------*/
       Route::get('/Company/details','Back\CompanyController@index')->name('company.index');
       Route::patch('/Company/details/{company}','Back\CompanyController@update')->name('company.update');


       /*--------------------------loadmore----------------------------------*/
         Route::post('load/more','Back\LoadController@loaddata');


    /*------------------------------Message-----------------------------**/
    Route::get('question/index', 'Front\MessageController@index')->name('admin.question');
    Route::get('view/message/{message}/{status}', 'Front\MessageController@view')->name('view.message');
    Route::get('view/message/{message}', 'Front\MessageController@delete')->name('admin.message.delete');



    Route::get('/user/customer','Front\HomeController@user')->name('admin.users');
    Route::get('/user/customer/{user}','Front\HomeController@delete')->name('users.delete');

    Route::post('/completeprofile','Front\HomeController@completeProfile')->name('completeprofile');

    });
});

Auth::routes();
// Route::get('/',function(){
//  return view('front.index');
// });
Route::get('all-product/by/{value}','Front\HomeController@productpage')->name('productpage');
Route::get('login/{provider}', 'Back\LoginController@redirect');
Route::get('login/{provider}/callback','Back\LoginController@Callback');
Route::get('/store/fingerprint/{uid}', 'Front\HomeController@fingerprint');
Route::post('admins/password/recovery','Front\UserpasswordController@adminrecovery')->name('password.recovery.admin');
Route::get('/product/category/{category}', 'Front\HomeController@productCategory')->name('product.category');
Route::get('/','Front\HomeController@index')->name('home');
Route::get('/search/product','Back\SearchController@index')->name('search');
Route::get('/details/{product}','Front\DetailController@index')->name('detail');

/*----------------------Password Recovery----------------------------------------*/
Route::post('password/recovery/user','Front\UserpasswordController@recovery')->name('password.recovery');
Route::post('email/verify','Front\UserpasswordController@emailVerify')->name('email.verification');
Route::get('user/register/', 'Back\LoginController@registerpage')->name('registerpage');

/*-------------------------------Billing*/
Route::post('BillingAddress','Front\CheckoutController@billing')->name('billing');
Route::post('question/send', 'Front\HomeController@questionsend')->name('question.send');

/*-------------------------------Email Verify---------------------------------*/
Route::get('verify/{userid}/{number}', 'Front\UserpasswordController@verifyUser');
Route::get('/filter/brand', 'Front\FilterController@brand')->name('hello');
Route::get('/filter/category/{category}', 'Front\FilterController@category');
Route::get('/filter/price/{value}/{max}/{min}', 'Front\FilterController@price');
Route::get('/privacypolicy/page', 'Front\HomeController@privacypolicy')->name('privacypolicy.page');
Route::get('/termsofsale/page', 'Front\HomeController@termsofsale')->name('termsofsale.page');
Route::get('/about/page', 'Front\HomeController@about')->name('about.page');
Route::get('/category/front','Front\HomeController@category')->name('front.category');
Route::get('Category/product/{category}','Front\HomeController@product')->name('category.product');


Route::middleware('auth')->group(function () {
Route::get('/user', 'Front\UserController@index')->name('front.user');
Route::get('manageprofile', 'Front\HomeController@manageprofile')->name('manageprofile');
Route::get('myproduct', 'Front\HomeController@myproduct')->name('myproduct');
Route::get('mywishlist', 'Front\HomeController@mywishlist')->name('mywishlist');
Route::get('addimages/{id}', 'Front\HomeController@addimages')->name('addimage');
Route::post('profiles/store','Front\UserpasswordController@store')->name('profile.store');
Route::patch('profile/update/{user}','Front\UserpasswordController@change')->name('password.change');
Route::get('wishlist/delete/{id}', 'Front\WishlistController@delete')->name('wishlist.delete');
Route::get('wishlist/{id}', 'Front\WishlistController@store')->name('wishlist');
Route::post('/seller/product', 'Seller\ProductController@store')->name('seller.product.store');
Route::get('/product/status/{product}/{status}', 'Seller\ProductController@status')->name('seller.product.status');
Route::patch('seller/product/update/{product}', 'Seller\ProductController@update')->name('seller.product.update');
Route::get('/product/delete/{product}', 'Back\ProductController@delete')->name('seller.product.delete');
Route::post('/product/images/store', 'Seller\ProductController@imagestore')->name('seller.image.store');
Route::get('seller/message/', 'Front\MessageController@sellermessage')->name('seller.message');
Route::get('seller/view/message/{message}/{status}', 'Front\MessageController@frontview')->name('view.message.front');
Route::get('seller/view/message/{message}', 'Front\MessageController@frontdelete')->name('front.message.delete');



});
