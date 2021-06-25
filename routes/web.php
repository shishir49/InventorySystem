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
    return view('welcome');
});

Route::get('/all-products','App\Http\Controllers\Master@products');

Route::get('/all-products/{id}','App\Http\Controllers\Master@singleProduct');

Route::get('/product','App\Http\Controllers\Master@product');

Route::get('/admin/categories','App\Http\Controllers\Master@categories');

Route::get('/admin/products','App\Http\Controllers\Master@admin_products');

Route::get('admin/delete/{id}','App\Http\Controllers\Master@destroy');

Route::get('admin/add-product','App\Http\Controllers\Master@addProduct');

Route::post('admin/submit-product','App\Http\Controllers\Master@insertProduct');

Route::get('admin/edit-product/{id}','App\Http\Controllers\Master@product_update');

Route::post('admin/update-product/{id}','App\Http\Controllers\Master@edit_product');

Route::get('admin-login','App\Http\Controllers\Account@login')->name('admin-login');

Route::post('login','App\Http\Controllers\Account@authenticate');

Route::get('admin-registration','App\Http\Controllers\Account@registration');

Route::post('registration','App\Http\Controllers\Account@doRegister');

Route::get('testrelation','App\Http\Controllers\Master@testrelation');

Route::post('logout','App\Http\Controllers\Account@logout');

Route::get('reset-password','App\Http\Controllers\Account@getEmail');

Route::post('reset-password','App\Http\Controllers\Account@postEmail');

Route::get('tests','App\Http\Controllers\Master@tests');

Route::get('action','App\Http\Controllers\Master@action')->name('action');

Route::get('pagnation','App\Http\Controllers\Master@pagination');

Route::get('pagi','App\Http\Controllers\Master@pagination');

Route::get('pagi/fetch','App\Http\Controllers\Master@paginationr')->name('fetch');

Route::get('testAjax','App\Http\Controllers\Master@testAjax');

Route::get('testAjax/testAjaxAction','App\Http\Controllers\Master@testAjaxAction');

Route::get('verification','App\Http\Controllers\Master@verification');

Route::post('verify','App\Http\Controllers\Master@verify');


Route::get('details', function (Request $request) {
  $ip = request()->ip();
  // $ip = '50.90.0.1';
    $data = \Location::get($ip);
    dd($data);
   
});

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp',
        'foot' => 'Thats Great!'
    ];
   
    \Mail::to('ks.azim@yahoo.com')->send(new \App\Mail\MyTestMail($details));


     // Mail::send('index',$details, function($message) {
     //     $message->to('ks.azim@yahoo.com', 'Tutorials Point');
     //     $message->from('xyz@gmail.com','Virat Gandhi');
     //  });
   
    dd("Email is Sent.");
});

Route::get('send-mail','App\Http\Controllers\Master@Mail');

Route::post('send-email','App\Http\Controllers\Master@sendMail');



Route::group(['middleware'=>'admin_auth'],function(){

    Route::get('admin','App\Http\Controllers\Master@admin_welcome');

    Route::get('admin/add-category','App\Http\Controllers\Master@addCategory')->name('add-category');

    Route::post('admin/add-category','App\Http\Controllers\Master@insertCat')->name('add-category');

    Route::get('/admin/categories','App\Http\Controllers\Master@categories')->name('categories');

    Route::get('admin/edit-category/{id}','App\Http\Controllers\Master@category_update');

    Route::post('admin/update-category/{id}','App\Http\Controllers\Master@edit_cateogry');

    Route::get('admin/cat-delete/{id}','App\Http\Controllers\Master@cat_delete');

    Route::get('/admin/products','App\Http\Controllers\Master@admin_products')->name('products');

  	Route::get('admin/delete/{id}','App\Http\Controllers\Master@destroy');

  	Route::get('admin/add-product','App\Http\Controllers\Master@addProduct')->name('add-product');

  	Route::post('admin/submit-product','App\Http\Controllers\Master@insertProduct');

  	Route::get('admin/edit-product/{id}','App\Http\Controllers\Master@product_update');

  	Route::post('admin/update-product/{id}','App\Http\Controllers\Master@edit_product');

    Route::get('admin/import/supplies','App\Http\Controllers\Master@supplies')->name('supplies');

    Route::get('admin/import/create-pdf','App\Http\Controllers\Master@createPDF')->name('create-pdf');

    Route::get('admin/import/add-supply','App\Http\Controllers\Master@addSupply')->name('add-supply');

    Route::post('admin/import/add-supply','App\Http\Controllers\Master@insertSupply')->name('add-supply');

    Route::get('admin/import/sdelete/{id}','App\Http\Controllers\Master@delete_supply');

    Route::get('admin/import/update-supply/{id}','App\Http\Controllers\Master@update_supply');

    Route::post('admin/import/update-supply/{id}','App\Http\Controllers\Master@editSupply');

    Route::get('admin/import/add-supplier','App\Http\Controllers\Master@addSupplier')->name('add-supplier');

    Route::post('admin/import/add-supplier','App\Http\Controllers\Master@insertSupplier')->name('add-supplier');

    Route::get('admin/import/suppliers','App\Http\Controllers\Master@suppliers')->name('suppliers');

    Route::get('admin/import/edit-supplier/{id}','App\Http\Controllers\Master@supplier_update');

    Route::post('admin/import/update-supplier/{id}','App\Http\Controllers\Master@edit_supplier');

    Route::get('admin/import/delete-supplier/{id}','App\Http\Controllers\Master@supplier_delete');

    Route::get('admin/verification','App\Http\Controllers\Master@verificationAdminView')->name('verification');

    Route::get('admin/make-payment','App\Http\Controllers\Master@make_payment');
    
    Route::get('logout',function(){
       session()->forget('ADMIN_LOGIN');
       session()->forget('ADMIN_ID');
       session()->flash('error','logout successful');
       return redirect('admin-login');
    })->name('logout');
});
 







