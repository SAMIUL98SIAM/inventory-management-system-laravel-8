<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontent.home');
Route::get('/gallary', [App\Http\Controllers\Frontend\FrontendController::class, 'gallary'])->name('frontent.gallary');

Auth::routes();

Route::group(['middleware'=>['auth','admin']],function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('users')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.view');
        Route::get('/create',[\App\Http\Controllers\Admin\UserController::class,'create'])->name('users.create');
        Route::post('/create',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('users.store');
        Route::put('/update/{id}',[\App\Http\Controllers\Admin\UserController::class,'update'])->name('users.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'destroy'])->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\ProfileController::class,'index'])->name('profiles.view');
        Route::get('/edit',[\App\Http\Controllers\Admin\ProfileController::class,'edit'])->name('profiles.edit');
        Route::post('/update',[\App\Http\Controllers\Admin\ProfileController::class,'update'])->name('profiles.update');
        Route::get('/change-password',[\App\Http\Controllers\Admin\ProfileController::class,'passworView'])->name('profiles.change-password');
        Route::post('/change-password/update',[\App\Http\Controllers\Admin\ProfileController::class,'passworUpdate'])->name('profiles.change-password.update');
    });

    Route::prefix('logos')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\LogoController::class,'index'])->name('logos.view');
        Route::get('/create',[\App\Http\Controllers\Admin\LogoController::class,'create'])->name('logos.create');
        Route::post('/create',[\App\Http\Controllers\Admin\LogoController::class,'store'])->name('logos.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\LogoController::class,'edit'])->name('logos.edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\LogoController::class,'update'])->name('logos.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\LogoController::class,'destroy'])->name('logos.delete');
    });

    Route::prefix('sliders')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\SliderController::class,'index'])->name('sliders.view');
        Route::get('/create',[\App\Http\Controllers\Admin\SliderController::class,'create'])->name('sliders.create');
        Route::post('/create',[\App\Http\Controllers\Admin\SliderController::class,'store'])->name('sliders.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\SliderController::class,'edit'])->name('sliders.edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\SliderController::class,'update'])->name('sliders.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\SliderController::class,'destroy'])->name('sliders.delete');

        Route::get('/activate/{id}',[App\Http\Controllers\Admin\SliderController::class,'activate'])->name('sliders.activate');
        Route::get('/unactivate/{id}',[App\Http\Controllers\Admin\SliderController::class,'unactivate'])->name('sliders.unactivate');
    });

    Route::prefix('contacts')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\ContactController::class,'index'])->name('contacts.view');
        Route::post('/create',[\App\Http\Controllers\Admin\ContactController::class,'store'])->name('contacts.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\ContactController::class,'edit'])->name('contacts.edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\ContactController::class,'update'])->name('contacts.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\ContactController::class,'destroy'])->name('contacts.delete');
    });

    Route::prefix('abouts')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\AboutController::class,'index'])->name('abouts.view');
        Route::get('/create',[\App\Http\Controllers\Admin\AboutController::class,'create'])->name('abouts.create');
        Route::post('/create',[\App\Http\Controllers\Admin\AboutController::class,'store'])->name('abouts.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\AboutController::class,'edit'])->name('abouts.edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\AboutController::class,'update'])->name('abouts.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\AboutController::class,'destroy'])->name('abouts.delete');
    });

    Route::prefix('suppliers')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\SupplierController::class,'index'])->name('suppliers.view');
        Route::post('/create',[\App\Http\Controllers\Admin\SupplierController::class,'store'])->name('suppliers.store');
        Route::put('/update/{id}',[\App\Http\Controllers\Admin\SupplierController::class,'update'])->name('suppliers.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\SupplierController::class,'destroy'])->name('suppliers.delete');
    });

    Route::prefix('customers')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\CustomerController::class,'index'])->name('customers.view');
        Route::post('/create',[\App\Http\Controllers\Admin\CustomerController::class,'store'])->name('customers.store');
        Route::put('/update/{id}',[\App\Http\Controllers\Admin\CustomerController::class,'update'])->name('customers.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\CustomerController::class,'destroy'])->name('customers.delete');
    });

    Route::prefix('units')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\UnitController::class,'index'])->name('units.view');
        Route::post('/create',[\App\Http\Controllers\Admin\UnitController::class,'store'])->name('units.store');
        Route::put('/update/{id}',[\App\Http\Controllers\Admin\UnitController::class,'update'])->name('units.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\UnitController::class,'destroy'])->name('units.delete');
    });

    Route::prefix('categories')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('categories.view');
        Route::post('/create',[\App\Http\Controllers\Admin\CategoryController::class,'store'])->name('categories.store');
        Route::put('/update/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('categories.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('categories.delete');
    });

    Route::prefix('products')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('products.view');
        Route::post('/create',[\App\Http\Controllers\Admin\ProductController::class,'store'])->name('products.store');
        Route::put('/update/{id}',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('products.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('products.delete');
    });

    Route::prefix('purchases')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\PurchaseController::class,'index'])->name('purchases.view');
        Route::get('/create',[\App\Http\Controllers\Admin\PurchaseController::class,'create'])->name('purchases.create');
        Route::post('/create',[\App\Http\Controllers\Admin\PurchaseController::class,'store'])->name('purchases.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\PurchaseController::class,'edit'])->name('purchases.edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\PurchaseController::class,'update'])->name('purchases.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\PurchaseController::class,'destroy'])->name('purchases.delete');

        Route::get('/pending',[\App\Http\Controllers\Admin\PurchaseController::class,'pending'])->name('purchases.pending');
        Route::get('/approve/{id}',[\App\Http\Controllers\Admin\PurchaseController::class,'approve'])->name('purchases.approve');
    });


    Route::prefix('invoices')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\InvoiceController::class,'index'])->name('invoices.view');
        Route::get('/create',[\App\Http\Controllers\Admin\InvoiceController::class,'create'])->name('invoices.create');
        Route::post('/create',[\App\Http\Controllers\Admin\InvoiceController::class,'store'])->name('invoices.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\InvoiceController::class,'edit'])->name('invoices.edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\InvoiceController::class,'update'])->name('invoices.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\InvoiceController::class,'destroy'])->name('invoices.delete');

        Route::get('/pending',[\App\Http\Controllers\Admin\InvoiceController::class,'pending'])->name('invoices.pending');
        Route::get('/approve/{id}',[\App\Http\Controllers\Admin\InvoiceController::class,'approve'])->name('invoices.approve');
        Route::post('/approve/store/{id}',[\App\Http\Controllers\Admin\InvoiceController::class,'approve_store'])->name('invoices.approve.store');
        Route::get('/invoice/print/list',[\App\Http\Controllers\Admin\InvoiceController::class,'printList'])->name('invoices.print.list');
        Route::get('/invoice/print/{id}',[\App\Http\Controllers\Admin\InvoiceController::class,'printInvoice'])->name('invoices.print');

        Route::get('/daily/inoice/report',[\App\Http\Controllers\Admin\InvoiceController::class,'dailyInvoiceReport'])->name('daily.invoice.report');

        Route::get('/daily/inoice/print',[\App\Http\Controllers\Admin\InvoiceController::class,'dailyReport'])->name('daily.invoice.pdf');

    });


    Route::prefix('stocks')->group(function(){
        Route::get('/report',[\App\Http\Controllers\Admin\StockController::class,'report'])->name('stocks.report');
        Route::get('/download',[\App\Http\Controllers\Admin\StockController::class,'download'])->name('stocks.download');
    });

    Route::get('/get-category',[\App\Http\Controllers\Admin\DefaultController::class,'getCategory'])->name('get-category');
    Route::get('/get-product',[\App\Http\Controllers\Admin\DefaultController::class,'getProduct'])->name('get-product');
    Route::get('/check-product-stock',[\App\Http\Controllers\Admin\DefaultController::class,'getProductStock'])->name('check-product-stock');


});
