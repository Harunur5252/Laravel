<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/karma/Home',[
   'uses'=>'MainController@index',
   'as'=>'Home'
]);
Route::get('/karma/Category',[
   'uses'=>'MainController@category',
   'as'=>'category'
]);



    Route::post('/Category/save',[
        'uses'=>'CategoryController@categorySave',
        'as'=>'new-category',

    ]);
    Route::get('/Category/manage',[
        'uses'=>'CategoryController@manageCategory',
        'as'=>'view-category'
    ]);


    Route::get('/category/unpublished/{id}',[
        'uses'=>'CategoryController@unpublishedCategory',
        'as'=>'unpublished-category'
    ]);
    Route::get('/category/published/{id}',[
        'uses'=>'CategoryController@publishedCategory',
        'as'=>'published-category'
    ]);
    Route::get('/category/edit/{id}',[
        'uses'=>'CategoryController@editCategory',
        'as'=>'edit-category'
    ]);
    Route::post('/category/update',[
        'uses'=>'CategoryController@updateCategory',
        'as'=>'update-category'
    ]);
    Route::get('/category/delete/{id}',[
        'uses'=>'CategoryController@deleteCategory',
        'as'=>'delete-category'
    ]);

    Route::get('/product/add',[
        'uses'=>'ProductController@index',
        'as'=>'add-product'
    ]);
    Route::post('/product/save',[
        'uses'=>'ProductController@store',
        'as'=>'new-product'
    ]);
    Route::get('/product/manage',[
        'uses'=>'ProductController@show',
        'as'=>'view-product'
    ]);


Route::group(['middleware' => ['superAdmin']], function () {
    Route::get('/user/add',[
        'uses' => 'UserController@addUser',
        'as' => 'add-user',
        //'middleware' => 'superAdmin'
    ]);

    Route::post('/user/new',[
        'uses' => 'UserController@newUser',
        'as' => 'new-user',
    ]);


});


Route::get('/prodcut/published/{id}',[
   'uses'=>'ProductController@productPublished',
   'as'=>'published-product'
]);
Route::get('/prodcut/unpublished/{id}',[
    'uses'=>'ProductController@productUnpublished',
    'as'=>'unpublished-product'
]);
Route::get('/prodcut/edit/{id}',[
    'uses'=>'ProductController@editProduct',
    'as'=>'edit-product'
]);
Route::post('/prodcut/update',[
    'uses'=>'ProductController@updateProduct',
    'as'=>'update-product'
]);
Route::get('/prodcut/delete/{id}',[
    'uses'=>'ProductController@deleteProduct',
    'as'=>'delete-product'
]);
